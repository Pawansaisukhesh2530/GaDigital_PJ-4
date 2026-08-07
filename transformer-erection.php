<?php
require_once 'includes/config.php';
$pageTitle = 'Transformer Erection Services';
$pageDescription = 'Complete transformer erection services from site preparation and foundation setup to final testing and energization.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/services-detail.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';
?>

<section class="page-banner">
    <div class="container">
        <h1>Transformer Erection</h1>
    </div>
</section>

<section class="service-page">
    <div class="container">
        <div class="service-page-grid">
            <div class="service-page-main" data-animation="fadeInUp">
                <h2>Transformer Erection Services</h2>

                <p>Proper erection and commissioning are critical for the safe and efficient functioning of transformers. At Nani Transformers, we undertake complete transformer erection services, from site preparation and foundation setup to final testing and energization.</p>

                <p>Our experienced field engineers ensure every installation complies with electrical and safety standards, delivering precise alignment, secure connections, and optimal performance from day one. We provide end-to-end support, ensuring your transformer is ready for seamless, long-term operation.</p>

                <p>Partner with us for professional transformer erection and assured operational excellence from day one.</p>

                <div class="service-gallery service-gallery--4">
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/transformer-erection-1.jpg" alt="Transformer erection on site" loading="lazy" decoding="async"></figure>
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/transformer-erection-2.jpg" alt="Transformer installation" loading="lazy" decoding="async"></figure>
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/transformer-erection-3.jpg" alt="Transformer commissioning" loading="lazy" decoding="async"></figure>
                    <figure><img src="<?php echo ASSETS_PATH; ?>/images/services/transformer-erection-4.jpg" alt="Completed transformer erection" loading="lazy" decoding="async"></figure>
                </div>
            </div>

            <aside class="service-page-side" data-animation="fadeInRight">
                <h3>Other Services</h3>
                <ul>
                    <li><a href="repairing.php">Repairing Services</a></li>
                    <li><a href="periodic-overhauling.php">Periodic Overhauling Services</a></li>
                    <li><a href="transformer-erection.php" class="active">Transformer Erection Services</a></li>
                </ul>
            </aside>
        </div>
    </div>
</section>

<?php require_once 'includes/clients-section.php'; ?>
<?php require_once 'includes/cta.php'; ?>
<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
