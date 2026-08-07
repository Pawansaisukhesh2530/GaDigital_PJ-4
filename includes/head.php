<?php require_once __DIR__ . '/config.php'; ?>
<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script>document.documentElement.className += ' js';</script>
    <title><?php echo isset($pageTitle) ? $pageTitle . ' - Nanitransformers' : 'Nanitransformers – Powering Progress with Precision.'; ?></title>
    <meta name="description" content="<?php echo isset($pageDescription) ? $pageDescription : 'Nani Transformers - Over 30 years of excellence in transformer design, manufacturing, and electrification across India\'s major industries.'; ?>">
    <meta name="keywords" content="transformers, power transformers, distribution transformers, transformer manufacturer, Hyderabad, India, NANI Transformers">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle . ' - Nanitransformers' : 'Nanitransformers – Powering Progress with Precision.'; ?>">
    <meta property="og:description" content="<?php echo isset($pageDescription) ? $pageDescription : 'Over 30 years of excellence in transformer design, manufacturing, and electrification across India\'s major industries.'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
    
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
