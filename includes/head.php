<?php require_once __DIR__ . '/config.php';

// Resolve per-page metadata. Empty $pageTitle (homepage) falls back to the brand title.
$metaTitle = (isset($pageTitle) && $pageTitle !== '')
    ? $pageTitle . ' | ' . SITE_NAME
    : SITE_NAME . ' – ' . SITE_TAGLINE;

$metaDescription = (isset($pageDescription) && $pageDescription !== '')
    ? $pageDescription
    : SITE_NAME . ' – ' . SITE_TAGLINE . '. ' . 'Transformer design, manufacturing, and electrification across India\'s major industries.';

// Canonical URL: home is the bare domain; everything else is the
// extensionless slug (served via .htaccess rewrite).
$scriptFile = basename($_SERVER['PHP_SELF']);
$pageSlug = pathinfo($scriptFile, PATHINFO_FILENAME);
if ($scriptFile === '' || $pageSlug === '' || $pageSlug === 'index') {
    $canonicalUrl = SITE_URL . '/';
} else {
    $canonicalUrl = SITE_URL . '/' . $pageSlug;
}

$ogImage = SITE_URL . '/' . ASSETS_PATH . '/images/hero-banner-1.jpg';
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.documentElement.className += ' js';</script>
    <title><?php echo $metaTitle; ?></title>
    <meta name="description" content="<?php echo $metaDescription; ?>">
    <meta name="robots" content="index, follow, max-image-preview:large">
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">

    <!-- Open Graph -->
    <meta property="og:site_name" content="<?php echo SITE_NAME; ?>">
    <meta property="og:title" content="<?php echo $metaTitle; ?>">
    <meta property="og:description" content="<?php echo $metaDescription; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo $canonicalUrl; ?>">
    <meta property="og:image" content="<?php echo $ogImage; ?>">
    <meta property="og:image:width" content="1920">
    <meta property="og:image:height" content="650">
    <meta property="og:locale" content="en_US">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo $metaTitle; ?>">
    <meta name="twitter:description" content="<?php echo $metaDescription; ?>">
    <meta name="twitter:image" content="<?php echo $ogImage; ?>">

    <!-- Favicon - SVG from live site -->
    <link rel="icon" href="<?php echo ASSETS_PATH; ?>/images/favicon.svg" sizes="32x32">
    <link rel="icon" href="<?php echo ASSETS_PATH; ?>/images/favicon.svg" sizes="192x192">
    <link rel="apple-touch-icon" href="<?php echo ASSETS_PATH; ?>/images/favicon.svg">

    <!-- Google Fonts - Exact fonts from live site -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&family=Raleway:wght@400;500;600;700;800&family=Roboto+Slab:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome 5 (same as live site) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/base.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/layout.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/header.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/footer.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/components.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/buttons.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/forms.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/animations.css">
    <link rel="stylesheet" href="<?php echo ASSETS_PATH; ?>/css/responsive.css">
    <?php if (isset($additionalCSS)) echo $additionalCSS; ?>
</head>
<body>