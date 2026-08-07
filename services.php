<?php
require_once 'includes/config.php';
$pageTitle = 'Services';
$pageDescription = 'Nani Transformers offers comprehensive transformer services including Repairing, Periodic Overhauling, and Transformer Erection across India.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/services-detail.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';
?>

<section class="page-banner page-banner--services">
    <div class="container">
        <h1>Services</h1>
    </div>
</section>

<section class="service-page" style="padding: 5em 0 7em;">
    <div class="container">
        <h2 class="section-title" style="margin-bottom: 40px;">Our featured services</h2>
        <div class="services-listing-grid">
            <div class="service-listing-card" data-animation="fadeInUp">
                <h3>Repairing</h3>
                <p>Product Range : Upto 50 MVA, Voltage : Upto 132 KV</p>
                <a href="repairing.php" class="btn btn-primary">SEE DETAIL</a>
            </div>
            <div class="service-listing-card" data-animation="fadeInUp">
                <h3>Periodic overhauling</h3>
                <p>Power Transformers OLTC</p>
                <a href="periodic-overhauling.php" class="btn btn-primary">SEE DETAIL</a>
            </div>
            <div class="service-listing-card" data-animation="fadeInUp">
                <h3>Transformer Erection</h3>
                <p>Complete on-site erection, testing, and commissioning</p>
                <a href="transformer-erection.php" class="btn btn-primary">SEE DETAIL</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/clients-section.php'; ?>
<?php require_once 'includes/cta.php'; ?>
<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
