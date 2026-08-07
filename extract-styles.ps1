# Nani Transformers - Style Extraction Script
# This script saves the full HTML source of each page so CSS values can be extracted.
# It also attempts to download the main Elementor CSS files.
# Usage: .\extract-styles.ps1

$baseUrl = "https://nanitransformers.com"
$outputDir = "_source-reference"

New-Item -ItemType Directory -Path $outputDir -Force | Out-Null

Write-Host "=== Extracting Page Sources & Stylesheets ===" -ForegroundColor Cyan

# --- PAGE SOURCES ---
$pages = @(
    @{ url = "$baseUrl/"; file = "homepage.html" },
    @{ url = "$baseUrl/about-us/"; file = "about-us.html" },
    @{ url = "$baseUrl/products/"; file = "products.html" },
    @{ url = "$baseUrl/gallery/"; file = "gallery.html" },
    @{ url = "$baseUrl/careers/"; file = "careers.html" },
    @{ url = "$baseUrl/contact-us/"; file = "contact-us.html" },
    @{ url = "$baseUrl/repairing/"; file = "repairing.html" },
    @{ url = "$baseUrl/periodic-overhauling/"; file = "periodic-overhauling.html" },
    @{ url = "$baseUrl/transformer-erection/"; file = "transformer-erection.html" },
    @{ url = "$baseUrl/distribution-transformers-oil-filled/"; file = "distribution-transformers.html" },
    @{ url = "$baseUrl/power-transformers-oil-filled/"; file = "power-transformers.html" }
)

Write-Host "`n[1/3] Downloading page sources..." -ForegroundColor Yellow
foreach ($page in $pages) {
    try {
        $response = Invoke-WebRequest -Uri $page.url -UseBasicParsing -ErrorAction Stop
        $response.Content | Out-File -FilePath "$outputDir/$($page.file)" -Encoding UTF8
        Write-Host "  Saved: $($page.file) ($([math]::Round($response.Content.Length / 1KB, 1)) KB)" -ForegroundColor Green
    } catch {
        Write-Host "  FAILED: $($page.url) - $($_.Exception.Message)" -ForegroundColor Red
    }
}

# --- EXTRACT CSS URLS FROM HOMEPAGE ---
Write-Host "`n[2/3] Extracting and downloading stylesheets..." -ForegroundColor Yellow
try {
    $homepageContent = Get-Content "$outputDir/homepage.html" -Raw -ErrorAction Stop
    
    # Find all CSS file URLs
    $cssPattern = 'href=["\''](https?://[^"'\'']*\.css[^"'\'']*)["\'']\s*'
    $matches = [regex]::Matches($homepageContent, $cssPattern)
    
    New-Item -ItemType Directory -Path "$outputDir/css" -Force | Out-Null
    $cssCount = 0
    
    foreach ($match in $matches) {
        $cssUrl = $match.Groups[1].Value
        $cssFilename = "stylesheet-$cssCount.css"
        
        # Try to get a meaningful name
        if ($cssUrl -match "elementor") { $cssFilename = "elementor-$cssCount.css" }
        elseif ($cssUrl -match "theme") { $cssFilename = "theme-$cssCount.css" }
        elseif ($cssUrl -match "global") { $cssFilename = "global-$cssCount.css" }
        elseif ($cssUrl -match "style") { $cssFilename = "style-$cssCount.css" }
        
        try {
            $cssResponse = Invoke-WebRequest -Uri $cssUrl -UseBasicParsing -ErrorAction Stop
            $cssResponse.Content | Out-File -FilePath "$outputDir/css/$cssFilename" -Encoding UTF8
            Write-Host "  Saved: css/$cssFilename (from $cssUrl)" -ForegroundColor Green
            $cssCount++
        } catch {
            Write-Host "  Failed to download: $cssUrl" -ForegroundColor Red
        }
    }
    
    if ($cssCount -eq 0) {
        Write-Host "  No CSS files found in HTML. The site may use inline styles." -ForegroundColor Yellow
    }
} catch {
    Write-Host "  Could not process homepage HTML: $($_.Exception.Message)" -ForegroundColor Red
}

# --- EXTRACT IMAGE URLS ---
Write-Host "`n[3/3] Extracting image URLs from pages..." -ForegroundColor Yellow
try {
    $allImageUrls = @()
    
    Get-ChildItem "$outputDir/*.html" | ForEach-Object {
        $content = Get-Content $_.FullName -Raw
        
        # Find img src attributes
        $imgPattern = 'src=["\''](https?://nanitransformers\.com/wp-content/uploads/[^"'\'']+)["\'']\s*'
        $imgMatches = [regex]::Matches($content, $imgPattern)
        
        foreach ($imgMatch in $imgMatches) {
            $allImageUrls += $imgMatch.Groups[1].Value
        }
        
        # Find background-image URLs
        $bgPattern = 'url\(["\''']?(https?://nanitransformers\.com/wp-content/uploads/[^"'\'')\s]+)["\''']?\)'
        $bgMatches = [regex]::Matches($content, $bgPattern)
        
        foreach ($bgMatch in $bgMatches) {
            $allImageUrls += $bgMatch.Groups[1].Value
        }
    }
    
    $uniqueUrls = $allImageUrls | Sort-Object -Unique
    
    Write-Host "`n  Found $($uniqueUrls.Count) unique image URLs:" -ForegroundColor White
    $uniqueUrls | ForEach-Object { Write-Host "    $_" }
    
    # Save to file for reference
    $uniqueUrls | Out-File "$outputDir/image-urls.txt" -Encoding UTF8
    Write-Host "`n  Saved URL list to: $outputDir/image-urls.txt" -ForegroundColor Green
    
    # Download all images
    New-Item -ItemType Directory -Path "$outputDir/images" -Force | Out-Null
    foreach ($imgUrl in $uniqueUrls) {
        $filename = Split-Path $imgUrl -Leaf
        try {
            Invoke-WebRequest -Uri $imgUrl -OutFile "$outputDir/images/$filename" -ErrorAction Stop
            Write-Host "  Downloaded: $filename" -ForegroundColor Green
        } catch {
            Write-Host "  FAILED: $filename" -ForegroundColor Red
        }
    }
    
} catch {
    Write-Host "  Error extracting image URLs: $($_.Exception.Message)" -ForegroundColor Red
}

Write-Host "`n=== Extraction Complete ===" -ForegroundColor Cyan
Write-Host @"

Next steps:
1. Check the '$outputDir' folder for HTML sources and stylesheets
2. Open homepage.html in a text editor to find:
   - Exact class names used by Elementor
   - Inline styles with exact pixel values
   - All image URLs
   - Font imports
3. Check '$outputDir/css/' for the actual stylesheets with exact values
4. Check '$outputDir/images/' for all downloaded images
5. Check '$outputDir/image-urls.txt' for the complete image URL list

Once you have these files, paste key sections into the chat
and I will update the CSS to match exactly.
"@
