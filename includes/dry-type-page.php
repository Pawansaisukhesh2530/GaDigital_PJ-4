<?php
/**
 * Shared renderer for the 8 VPI Dry Type product pages.
 * Each page sets $slug then includes this file.
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/dry-type-data.php';

$all = getDryTypeProducts();
if (!isset($all[$slug])) {
    http_response_code(404);
    exit('Product not found.');
}
$p = $all[$slug];

$pageTitle = $p['name'] . ' (VPI Dry Type)';
$pageDescription = mb_substr(strip_tags($p['p1']), 0, 155);
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/products.css">';

require_once __DIR__ . '/head.php';
require_once __DIR__ . '/header.php';
?>

<section class="page-banner page-banner--products">
    <div class="container">
        <h1>VPI Dry Type Transformers</h1>
    </div>
</section>

<section class="product-detail">
    <div class="container">
        <div class="product-detail-grid">
            <!-- Main -->
            <div class="product-detail-main" data-animation="fadeInUp">
                <div class="product-detail-head">
                    <span class="product-detail-icon">
                        <img src="<?php echo ASSETS_PATH; ?>/icons/products/<?php echo $p['icon']; ?>" alt="" width="42" height="42">
                    </span>
                    <h2><?php echo $p['name']; ?></h2>
                </div>

                <ul class="product-spec-row">
                    <li><span>Product Range</span><strong><?php echo $p['range']; ?></strong></li>
                    <li><span>Voltage</span><strong><?php echo $p['volt']; ?></strong></li>
                </ul>

                <p><?php echo $p['p1']; ?></p>
                <p><?php echo $p['p2']; ?></p>

                <h3 class="features-title">Key Features &amp; Benefits</h3>
                <ul class="features-list">
                    <?php foreach ($p['features'] as $f): ?>
                        <li><?php echo $f; ?></li>
                    <?php endforeach; ?>
                </ul>

                <figure class="product-detail-figure">
                    <img src="<?php echo ASSETS_PATH; ?>/images/products/<?php echo $p['image']; ?>"
                         alt="<?php echo $p['name']; ?> — VPI Dry Type" loading="lazy" decoding="async">
                </figure>

                <?php
                require_once __DIR__ . '/product-faqs.php';
                $allFaqs = getProductFaqs();
                if (isset($allFaqs[$slug]) && !empty($allFaqs[$slug])):
                ?>
                <div class="product-faq">
                    <h3>Frequently Asked Questions</h3>
                    <?php foreach ($allFaqs[$slug] as $i => $faq): ?>
                    <div class="faq-item">
                        <button class="faq-question" type="button" aria-expanded="false" aria-controls="faq-dry-<?php echo $i; ?>">
                            <span><?php echo $faq['q']; ?></span>
                            <span class="faq-icon" aria-hidden="true"></span>
                        </button>
                        <div class="faq-answer" id="faq-dry-<?php echo $i; ?>" role="region">
                            <p><?php echo $faq['a']; ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>

            <!-- Sidebar: sibling products -->
            <aside class="product-detail-side" data-animation="fadeInRight">
                <h3>VPI Dry Type Range</h3>
                <ul>
                    <?php foreach ($all as $s => $item): ?>
                        <li>
                            <a href="<?php echo $s; ?>.php" class="<?php echo $s === $slug ? 'active' : ''; ?>">
                                <?php echo $item['name']; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <a href="products.php" class="btn btn-outline-dark btn-block">All Products</a>
            </aside>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/clients-section.php'; ?>
<?php require_once __DIR__ . '/cta.php'; ?>
<?php require_once __DIR__ . '/footer.php'; ?>
<?php require_once __DIR__ . '/scripts.php'; ?>
