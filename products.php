<?php
require_once 'includes/config.php';
$pageTitle = 'Products';
$pageDescription = 'Oil Filled Transformers up to 20 MVA / 33 KV and VPI Dry Type Transformers up to 5 MVA / 33 KV — Distribution, Power, Inverter Duty, Converter Duty, Furnace Duty, Rectifier, Isolation, Lightning and Generator Transformers.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/products.css">';

require_once 'includes/head.php';
require_once 'includes/header.php';

$bolt = '<svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>';

// Oil Filled range - 9 products, all values from the live page
$oilFilled = [
    ['name' => 'Distribution Transformers',  'icon' => 'distribution.svg', 'img' => 'oil-distribution.jpg', 'link' => 'distribution-transformers-oil-filled.php'],
    ['name' => 'Power Transformers',         'icon' => 'power.svg',        'img' => 'oil-power.jpg',        'link' => 'power-transformers-oil-filled.php'],
    ['name' => 'Inverter Duty Transformers', 'icon' => 'inverter.svg',     'img' => 'oil-inverter.jpg',     'link' => 'inverter-duty-transformers-oil-filled.php'],
    ['name' => 'Converter Duty Transformers','icon' => 'converter.svg',    'img' => 'oil-converter.jpg',    'link' => 'converter-duty-transformers-oil-filled.php'],
    ['name' => 'Furnace Duty Transformers',  'icon' => 'furnace.svg',      'img' => 'oil-furnace.jpg',      'link' => 'furnace-duty-transformers-oil-filled.php'],
    ['name' => 'Rectifier Transformers',     'icon' => 'rectifier.svg',    'img' => 'oil-rectifier.jpg',    'link' => 'rectifier-transformers-oil-filled.php'],
    ['name' => 'Isolation Transformers',     'icon' => 'isolation.svg',    'img' => 'oil-isolation.jpg',    'link' => 'isolation-transformers-oil-filled.php'],
    ['name' => 'Lightning Transformers',     'icon' => 'lightning.svg',    'img' => 'oil-lightning.jpg',    'link' => 'lightning-transformers-oil-filled.php'],
    ['name' => 'Generator Transformers',     'icon' => 'generator.svg',    'img' => 'oil-generator.jpg',    'link' => 'generator-transformers-oil-filled.php'],
];

// VPI Dry Type range - 8 products
$dryType = [
    ['name' => 'Distribution Transformers',  'icon' => 'distribution.svg', 'img' => 'dry-distribution.jpg', 'link' => 'distribution-transformers-dry-type.php'],
    ['name' => 'Power Transformers',         'icon' => 'power.svg',        'img' => 'dry-power.jpg',        'link' => 'power-transformer-dry-type.php'],
    ['name' => 'Inverter Duty Transformer',  'icon' => 'inverter.svg',     'img' => 'dry-inverter.jpg',     'link' => 'inverter-duty-transformer-dry-type.php'],
    ['name' => 'Converter Duty Transformer', 'icon' => 'converter.svg',    'img' => 'dry-converter.jpg',    'link' => 'converter-duty-transformer-dry-type.php'],
    ['name' => 'Furnace Duty Transformers',  'icon' => 'furnace.svg',      'img' => 'dry-furnace.jpg',      'link' => 'furnace-duty-transformer-dry-type.php'],
    ['name' => 'Lightning Transformer',      'icon' => 'lightning.svg',    'img' => 'dry-lightning.jpg',    'link' => 'lightning-transformer-dry-type.php'],
    ['name' => 'Isolation Transformer',      'icon' => 'isolation.svg',    'img' => 'dry-isolation.jpg',    'link' => 'isolation-transformer-dry-type.php'],
    ['name' => 'Generator Transformers',     'icon' => 'generator.svg',    'img' => 'dry-generator.jpg',    'link' => 'generator-transformer-dry-type.php'],
];

/** Render one product card. */
function productCard($p, $range, $volt, $eager = false) {
    $assets = ASSETS_PATH;
    $loading = $eager ? 'fetchpriority="high"' : 'loading="lazy"';
    ?>
    <article class="product-item">
        <div class="product-item-head">
            <span class="product-item-icon">
                <img src="<?php echo $assets; ?>/icons/products/<?php echo $p['icon']; ?>" alt="" width="42" height="42" loading="lazy">
            </span>
            <h3><?php echo $p['name']; ?></h3>
        </div>

        <div class="product-item-media">
            <img src="<?php echo $assets; ?>/images/products/<?php echo $p['img']; ?>"
                 alt="<?php echo $p['name']; ?>" <?php echo $loading; ?> decoding="async">
        </div>

        <ul class="product-item-specs">
            <li><span>Product Range</span><strong><?php echo $range; ?></strong></li>
            <li><span>Voltage</span><strong><?php echo $volt; ?></strong></li>
        </ul>

        <div class="product-item-foot">
            <a href="<?php echo $p['link']; ?>" class="btn btn-primary">Read more</a>
        </div>
    </article>
    <?php
}
?>

<!-- ============ PAGE BANNER ============ -->
<section class="page-banner page-banner--products">
    <div class="container">
        <h1>Products</h1>
    </div>
</section>

<!-- ============ PRODUCTS ============ -->
<section class="products-page">
    <div class="container">

        <div class="products-intro" data-animation="fadeInUp">
            <div class="intro-head">
                <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
                <h2>Our Transformer Range</h2>
            </div>
            <p>Custom-built transformers engineered for industry, infrastructure and renewable energy — available in Oil Filled and VPI Dry Type constructions.</p>
        </div>

        <!-- Tabs -->
        <div class="product-tablist" role="tablist" aria-label="Transformer types">
            <button class="product-tab-btn" id="tab-oil" role="tab"
                    aria-selected="true" aria-controls="panel-oil" tabindex="0">
                Oil Filled Transformers
                <span class="tab-count"><?php echo count($oilFilled); ?></span>
            </button>
            <button class="product-tab-btn" id="tab-dry" role="tab"
                    aria-selected="false" aria-controls="panel-dry" tabindex="-1">
                VPI Dry Type Transformers
                <span class="tab-count"><?php echo count($dryType); ?></span>
            </button>
        </div>

        <!-- Oil Filled panel -->
        <div class="product-panel" id="panel-oil" role="tabpanel" aria-labelledby="tab-oil" tabindex="0">
            <div class="product-grid">
                <?php foreach ($oilFilled as $i => $p): ?>
                    <?php productCard($p, 'Upto 20 MVA', 'Upto 33KV', $i < 3); ?>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- VPI Dry Type panel -->
        <div class="product-panel" id="panel-dry" role="tabpanel" aria-labelledby="tab-dry" tabindex="0" hidden>
            <div class="product-grid">
                <?php foreach ($dryType as $p): ?>
                    <?php productCard($p, 'Upto 5 MVA', 'Upto 33KV'); ?>
                <?php endforeach; ?>
            </div>
        </div>

    </div>
</section>

<!-- ============ CLIENTS ============ -->
<?php require_once 'includes/clients-section.php'; ?>

<?php require_once 'includes/cta.php'; ?>

<?php require_once 'includes/footer.php'; ?>

<script>
(function () {
    var tabs = Array.prototype.slice.call(document.querySelectorAll('.product-tab-btn'));
    if (!tabs.length) return;

    function select(tab) {
        tabs.forEach(function (t) {
            var selected = (t === tab);
            t.setAttribute('aria-selected', selected ? 'true' : 'false');
            t.tabIndex = selected ? 0 : -1;
            var panel = document.getElementById(t.getAttribute('aria-controls'));
            if (panel) panel.hidden = !selected;
        });
    }

    tabs.forEach(function (tab) {
        tab.addEventListener('click', function () { select(tab); });
    });

    // Left/Right arrow support, per WAI-ARIA tabs pattern
    document.querySelector('.product-tablist').addEventListener('keydown', function (e) {
        var i = tabs.indexOf(document.activeElement);
        if (i === -1) return;
        var next = null;
        if (e.key === 'ArrowRight') next = tabs[(i + 1) % tabs.length];
        if (e.key === 'ArrowLeft')  next = tabs[(i - 1 + tabs.length) % tabs.length];
        if (next) {
            e.preventDefault();
            select(next);
            next.focus();
        }
    });
})();
</script>

<?php require_once 'includes/scripts.php'; ?>
