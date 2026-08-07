<?php
require_once 'includes/config.php';
$pageTitle = 'Repairing Services';
$pageDescription = 'Professional transformer repairing services for all types and capacities, ensuring quick restoration of performance and reliability.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/services-detail.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';
?>

<section class="page-banner">
    <div class="container">
        <h1>Repairing</h1>
    </div>
</section>

<section class="service-page">
    <div class="container">
        <div class="service-page-grid">
            <div class="service-page-main" data-animation="fadeInUp">
                <h2>Repairing Services</h2>

                <p>Even a minor transformer failure can lead to significant operational downtime and power disruption. At Nani Transformers, we provide professional repairing services for all types and capacities of transformers, ensuring quick restoration of performance and reliability.</p>

                <p>Our team of skilled engineers performs detailed fault diagnosis, rewinding, oil filtration, and component replacement using high-quality materials. Every repaired unit undergoes thorough testing to ensure it meets factory-grade standards before being re-commissioned.</p>

                <p>Contact us today to restore your transformer&rsquo;s performance with expert precision and trusted reliability.</p>

                <div class="service-gallery service-gallery--2">
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/repairing-1.jpg" alt="Transformer repairing work" loading="lazy" decoding="async"></figure>
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/repairing-2.jpg" alt="Transformer repair facility" loading="lazy" decoding="async"></figure>
                </div>
            </div>

            <aside class="service-page-side" data-animation="fadeInRight">
                <h3>Other Services</h3>
                <ul>
                    <li><a href="repairing.php" class="active">Repairing Services</a></li>
                    <li><a href="periodic-overhauling.php">Periodic Overhauling Services</a></li>
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
