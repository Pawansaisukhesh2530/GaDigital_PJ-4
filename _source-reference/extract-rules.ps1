# Extract Elementor rules for given element IDs WITH their @media context.
# Usage: .\extract-rules.ps1 -CssFile ..\post-124.css -Ids 31a68b4f,6f461f38
param(
    [string]$CssFile,
    [string[]]$Ids
)

$css = Get-Content $CssFile -Raw

# Walk the stylesheet tracking brace depth so we know when we are
# inside an @media block and which one.
$results = @()
$i = 0
$len = $css.Length
$mediaStack = @()
$depth = 0

while ($i -lt $len) {
    # detect @media at current position
    if ($css[$i] -eq '@' -and $css.Substring($i, [Math]::Min(6, $len - $i)) -eq '@media') {
        $braceAt = $css.IndexOf('{', $i)
        if ($braceAt -lt 0) { break }
        $cond = $css.Substring($i, $braceAt - $i).Trim()
        $mediaStack += @{ cond = $cond; depth = $depth }
        $depth++
        $i = $braceAt + 1
        continue
    }

    if ($css[$i] -eq '{') { $depth++; $i++; continue }

    if ($css[$i] -eq '}') {
        $depth--
        if ($mediaStack.Count -gt 0 -and $mediaStack[-1].depth -eq $depth) {
            $mediaStack = $mediaStack[0..([Math]::Max(0, $mediaStack.Count - 2))]
            if ($mediaStack.Count -eq 1 -and $mediaStack[0].depth -ne 0) { }
            if ($depth -eq 0) { $mediaStack = @() }
        }
        $i++
        continue
    }

    # at depth 0 (or inside media) a selector starts here
    $braceAt = $css.IndexOf('{', $i)
    $closeAt = $css.IndexOf('}', $i)
    if ($braceAt -lt 0) { break }
    if ($closeAt -ge 0 -and $closeAt -lt $braceAt) { $i = $closeAt; continue }

    $selector = $css.Substring($i, $braceAt - $i).Trim()
    $bodyEnd = $css.IndexOf('}', $braceAt)
    if ($bodyEnd -lt 0) { break }
    $body = $css.Substring($braceAt + 1, $bodyEnd - $braceAt - 1).Trim()

    foreach ($id in $Ids) {
        if ($selector -match "elementor-element-$id(?![0-9a-zA-Z])") {
            $ctx = if ($mediaStack.Count -gt 0) { ($mediaStack | ForEach-Object { $_.cond }) -join ' AND ' } else { 'DESKTOP' }
            $results += [PSCustomObject]@{
                Id       = $id
                Media    = $ctx
                Selector = $selector
                Body     = $body
            }
        }
    }

    $i = $bodyEnd + 1
}

foreach ($id in $Ids) {
    "############ $id ############"
    $rows = $results | Where-Object { $_.Id -eq $id }
    foreach ($r in $rows) {
        "--- [$($r.Media)]"
        "    $($r.Body)"
    }
    ""
}
