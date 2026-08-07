<?php
require_once 'includes/config.php';
$pageTitle = 'Periodic Overhauling Services';
$pageDescription = 'Comprehensive transformer overhauling services including inspection, cleaning, oil testing, and performance evaluation to extend life and efficiency.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/services-detail.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';
?>

<section class="page-banner">
    <div class="container">
        <h1>Periodic Overhauling</h1>
    </div>
</section>

<section class="service-page">
    <div class="container">
        <div class="service-page-grid">
            <div class="service-page-main" data-animation="fadeInUp">
                <h2>Periodic Overhauling Services</h2>

                <p>Regular maintenance and overhauling are key to extending the life and efficiency of any transformer. Our periodic overhauling services involve comprehensive inspection, cleaning, oil testing, and performance evaluation to detect early signs of wear or failure.</p>

                <p>We follow a preventive approach&mdash;upgrading insulation, tightening connections, and optimizing cooling systems to ensure stable, safe, and uninterrupted performance. With timely overhauling, we help clients avoid unexpected breakdowns and maintain peak operational reliability.</p>

                <p>Schedule your transformer&rsquo;s next overhaul and ensure uninterrupted power and long-term reliability.</p>

                <div class="service-gallery service-gallery--2">
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/periodic-overhauling-1.jpg" alt="Periodic overhauling inspection" loading="lazy" decoding="async"></figure>
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/periodic-overhauling-2.jpg" alt="Transformer maintenance work" loading="lazy" decoding="async"></figure>
                </div>
            </div>

            <aside class="service-page-side" data-animation="fadeInRight">
                <h3>Other Services</h3>
                <ul>
                    <li><a href="repairing.php">Repairing Services</a></li>
                    <li><a href="periodic-overhauling.php" class="active">Periodic Overhauling Services</a></li>
                    <li><a href="transformer-erection.php">Transformer Erection Services</a></li>
                </ul>
            </aside>
        </div>
    </div>
</section>

<?php require_once 'includes/clients-section.php'; ?>
<?php require_once 'includes/cta.php'; ?>
<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
