<?php
/**
 * Product Detail Template
 * Variables expected: $productName, $productDescription1, $productDescription2, $productFeatures1, $productFeatures2, $productImages (optional array)
 */
?>

<!-- Page Banner -->
<section class="page-banner">
    <div class="container">
        <h1>Transformers</h1>
    </div>
</section>

<!-- Product Detail -->
<section class="service-detail">
    <div class="container">
        <div class="fade-in-up">
            <h3><?php echo $productName; ?></h3>
            <p><?php echo $productDescription1; ?></p>
            <p><?php echo $productDescription2; ?></p>

            <h5 style="margin-top: 30px; margin-bottom: 16px;">Key Features & Benefits</h5>
            <div class="features-list">
                <?php foreach ($productFeatures1 as $feature): ?>
                    <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
                <?php foreach ($productFeatures2 as $feature): ?>
                    <li><?php echo $feature; ?></li>
                <?php endforeach; ?>
            </div>

            <?php if (!empty($productImages)): ?>
                <div class="product-gallery">
                    <?php foreach ($productImages as $image): ?>
                        <img src="<?php echo ASSETS_PATH; ?>/images/products/<?php echo $image['src']; ?>" alt="<?php echo $image['alt']; ?>">
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Clients Section -->
<?php require_once 'includes/clients-section.php'; ?>
