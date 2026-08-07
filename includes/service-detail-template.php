<?php
/**
 * Service Detail Template
 * Variables expected: $serviceName, $serviceDescription (array of paragraphs), $serviceImages (optional array)
 */
?>

<!-- Page Banner -->
<section class="page-banner">
    <div class="container">
        <h1><?php echo $serviceName; ?></h1>
    </div>
</section>

<!-- Service Detail -->
<section class="service-detail">
    <div class="container">
        <div class="service-detail-content">
            <div class="service-detail-main fade-in-left">
                <h2><?php echo $serviceName; ?> Services</h2>
                <?php foreach ($serviceDescription as $paragraph): ?>
                    <p><?php echo $paragraph; ?></p>
                <?php endforeach; ?>

                <?php if (!empty($serviceImages)): ?>
                    <div class="product-gallery" style="margin-top: 30px;">
                        <?php foreach ($serviceImages as $image): ?>
                            <img src="<?php echo ASSETS_PATH; ?>/images/services/<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>">
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
            <div class="services-sidebar fade-in-right">
                <h3>Other Services</h3>
                <ul>
                    <li><a href="repairing.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'repairing.php' ? 'active' : ''; ?>">Repairing Services</a></li>
                    <li><a href="periodic-overhauling.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'periodic-overhauling.php' ? 'active' : ''; ?>">Periodic Overhauling Services</a></li>
                    <li><a href="transformer-erection.php" class="<?php echo basename($_SERVER['PHP_SELF']) === 'transformer-erection.php' ? 'active' : ''; ?>">Transformer Erection Services</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Clients Section -->
<?php require_once 'includes/clients-section.php'; ?>
