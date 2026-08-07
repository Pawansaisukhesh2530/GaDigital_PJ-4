# Nani Transformers - Asset Downloader
# Run this script from the project root to download all images from the live site.
# Usage: .\download-assets.ps1

$baseUrl = "https://nanitransformers.com"
$wpContent = "$baseUrl/wp-content/uploads"

# Create directories
$dirs = @(
    "assets/images/clients",
    "assets/images/products",
    "assets/images/gallery",
    "assets/images/services",
    "assets/images/banners",
    "assets/icons"
)
foreach ($dir in $dirs) {
    New-Item -ItemType Directory -Path $dir -Force | Out-Null
}

Write-Host "=== Downloading Nani Transformers Assets ===" -ForegroundColor Cyan

# --- LOGO ---
Write-Host "`n[1/5] Downloading Logo..." -ForegroundColor Yellow
try {
    # Try common logo paths
    $logoPaths = @(
        "$wpContent/2025/11/logo.png",
        "$wpContent/2025/10/logo.png",
        "$baseUrl/wp-content/themes/hello-elementor/assets/images/logo.png",
        "$wpContent/2025/11/nani-logo.png",
        "$wpContent/2025/10/nani-logo.png"
    )
    foreach ($logoPath in $logoPaths) {
        try {
            Invoke-WebRequest -Uri $logoPath -OutFile "assets/images/logo.png" -ErrorAction Stop
            Write-Host "  Downloaded logo from: $logoPath" -ForegroundColor Green
            break
        } catch {
            continue
        }
    }
} catch {
    Write-Host "  Logo not found at expected paths. Please download manually." -ForegroundColor Red
}

# --- CLIENT LOGOS ---
Write-Host "`n[2/5] Downloading Client Logos..." -ForegroundColor Yellow
$clientLogos = @(
    @{ url = "$wpContent/2025/11/Logo-27.jpg"; file = "assets/images/clients/logo-1.jpg" },
    @{ url = "$wpContent/2025/11/Logo-28.jpg"; file = "assets/images/clients/logo-2.jpg" },
    @{ url = "$wpContent/2025/11/Logo-29.jpg"; file = "assets/images/clients/logo-3.jpg" },
    @{ url = "$wpContent/2025/11/Logo-30.jpg"; file = "assets/images/clients/logo-4.jpg" },
    @{ url = "$wpContent/2025/11/Logo-31.jpg"; file = "assets/images/clients/logo-5.jpg" }
)
foreach ($logo in $clientLogos) {
    try {
        Invoke-WebRequest -Uri $logo.url -OutFile $logo.file -ErrorAction Stop
        Write-Host "  Downloaded: $($logo.file)" -ForegroundColor Green
    } catch {
        Write-Host "  FAILED: $($logo.url)" -ForegroundColor Red
    }
}

# --- SERVICE IMAGES ---
Write-Host "`n[3/5] Downloading Service Images..." -ForegroundColor Yellow
$serviceImages = @(
    @{ url = "$wpContent/2025/11/Transformer-Erection-1.jpg"; file = "assets/images/services/transformer-erection-1.jpg" },
    @{ url = "$wpContent/2025/11/Transformer-Erection-2.jpg"; file = "assets/images/services/transformer-erection-2.jpg" }
)
foreach ($img in $serviceImages) {
    try {
        Invoke-WebRequest -Uri $img.url -OutFile $img.file -ErrorAction Stop
        Write-Host "  Downloaded: $($img.file)" -ForegroundColor Green
    } catch {
        Write-Host "  FAILED: $($img.url)" -ForegroundColor Red
    }
}

# --- PRODUCT IMAGES ---
Write-Host "`n[4/5] Downloading Product Images..." -ForegroundColor Yellow
$productImages = @(
    @{ url = "$wpContent/2025/11/Converter-Duty-Transformers-3.jpg"; file = "assets/images/products/converter-duty-transformer-3.jpg" },
    @{ url = "$wpContent/2025/10/Converter-Duty-Transformer.jpg"; file = "assets/images/products/converter-duty-transformer-2.jpg" },
    @{ url = "$wpContent/2025/11/Auxiliary-_-Lightning-Transformer-1.jpg"; file = "assets/images/products/lightning-transformer-1.jpg" }
)
foreach ($img in $productImages) {
    try {
        Invoke-WebRequest -Uri $img.url -OutFile $img.file -ErrorAction Stop
        Write-Host "  Downloaded: $($img.file)" -ForegroundColor Green
    } catch {
        Write-Host "  FAILED: $($img.url)" -ForegroundColor Red
    }
}

# --- ATTEMPT TO FIND MORE IMAGES ---
Write-Host "`n[5/5] Attempting to discover additional images..." -ForegroundColor Yellow

# Common product image filename patterns to try
$productGuesses = @(
    "Distribution-Transformer",
    "Power-Transformer",
    "Inverter-Duty-Transformer",
    "Furnace-Duty-Transformer",
    "Rectifier-Transformer",
    "Isolation-Transformer",
    "Generator-Transformer",
    "distribution-transformer",
    "power-transformer"
)

$months = @("2025/10", "2025/11", "2025/09")
$extensions = @(".jpg", ".png", ".webp")

foreach ($name in $productGuesses) {
    foreach ($month in $months) {
        foreach ($ext in $extensions) {
            $url = "$wpContent/$month/$name$ext"
            $filename = ($name -replace " ", "-").ToLower() + $ext
            $filepath = "assets/images/products/$filename"
            try {
                $response = Invoke-WebRequest -Uri $url -OutFile $filepath -ErrorAction Stop -PassThru
                if ($response.StatusCode -eq 200) {
                    Write-Host "  FOUND: $url -> $filepath" -ForegroundColor Green
                }
            } catch {
                # silently skip
            }
        }
    }
}

# --- SUMMARY ---
Write-Host "`n=== Download Complete ===" -ForegroundColor Cyan
Write-Host "`nDownloaded files:" -ForegroundColor White
Get-ChildItem -Path "assets/images" -Recurse -File | ForEach-Object {
    $size = [math]::Round($_.Length / 1KB, 1)
    Write-Host "  $($_.FullName) ($size KB)"
}

Write-Host "`n=== MANUAL STEPS REQUIRED ===" -ForegroundColor Red
Write-Host @"

The following assets need to be downloaded manually from the live site:

1. LOGO: Open https://nanitransformers.com in Chrome
   - Right-click the logo in the header -> Save Image As
   - Save to: assets/images/logo.png

2. HERO IMAGE: Inspect the hero/banner section on the homepage
   - Look for background-image or <img> in the hero area
   - Save to: assets/images/hero-transformer.jpg

3. ABOUT IMAGE: Visit https://nanitransformers.com/ (homepage about section)
   - Right-click the image next to the "WHO WE ARE" text
   - Save to: assets/images/about-home.jpg

4. ABOUT PAGE IMAGE: Visit https://nanitransformers.com/about-us/
   - Save the main image to: assets/images/about-main.jpg

5. PRODUCT IMAGES: Visit https://nanitransformers.com/products/
   - Right-click each product card image and save to assets/images/products/
   - Name them: distribution-transformer.jpg, power-transformer.jpg, etc.

6. GALLERY IMAGES: Visit https://nanitransformers.com/gallery/
   - Right-click each gallery image and save to assets/images/gallery/
   - Name them: gallery-1.jpg, gallery-2.jpg, ... gallery-12.jpg

7. FAVICON: View page source, find the favicon link
   - Save to: assets/images/favicon.ico

"@

Write-Host "After downloading, re-run this script to verify all assets are in place." -ForegroundColor Yellow
