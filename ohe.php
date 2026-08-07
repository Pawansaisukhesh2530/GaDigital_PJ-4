<?php
require_once 'includes/config.php';
$pageTitle = 'OHE - Overhead Electrification';
$pageDescription = 'Overhead Electrification projects - Major yard modifications, tunnel OHE, retractable OHE works, and 1x25KV & 2x25KV transmission projects.';
$additionalCSS = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">'
    . '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/projects.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';

$bolt = '<svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>';

$ohePoints = [
    'Major Yard Modifications.',
    'Pit Line Stabling Lines.',
    'Tunnel OHE Modification works.',
    'Retractable OHE Works.',
    '1X25KV &amp; 2x25KV Transmission projects fastest execution timelines.',
];

// Each order paired 1:1 with its image, in document order
$oheOrders = [
    ['railway' => 'South Central Railway', 'img' => 'OHE-Images-1-1024x683.jpg', 'desc' => 'Proposed replacement of worn-out and failure-prone catenary and contact wire to improve system reliability and enhance operational safety on high-density suburban and intercity routes.'],
    ['railway' => 'South Central Railway', 'img' => 'OHE-Images-2-1024x683.jpg', 'desc' => 'Design, Supply, Erection, Testing &amp; Commissioning of 25 kV, 50 Hz Single Phase AC OHE system with:', 'items' => ['65 sq.mm catenary wire', '107 sq.mm HDG copper contact wire']],
    ['railway' => 'South Central Railway', 'img' => 'OHE-Images-3-1024x683.jpg', 'desc' => 'LT supply transformer stations executed in line with proposed yard rearrangements for expanding traffic capacity. End-to-end TRD arrangements including OHE modifications, electrification, and yard re-engineering to support electrification of:', 'items' => ['Vijayawada Diesel Loco Shed', 'Moula Ali Diesel Loco Shed', 'Kazipet Diesel Loco Shed', 'Guntakal Diesel Loco Shed', 'Gooty Diesel Loco Shed']],
    ['railway' => 'South Central Railway', 'img' => 'OHE-Images-4-1024x683.jpg', 'desc' => 'OHE modifications for 8.20 km of multi-tracking and yard connectivity, enabling higher throughput and enhanced operational flexibility.'],
    ['railway' => 'Southern Railway', 'img' => 'OHE-Images-5-1024x683.jpg', 'desc' => 'OHE designed and commissioned for 2×25 kV AT feeding system on a new BG line, supporting improved power quality and future traffic growth.'],
    ['railway' => 'Southern Railway', 'img' => 'OHE-Images-6-1024x683.jpg', 'desc' => 'Installation of 2×25 kV AT-fed OHE with modifications to existing OHE/SSP at Walajah Road to enhance traction efficiency.'],
    ['railway' => 'Southern Railway', 'img' => 'OHE-Images-7-1024x683.jpg', 'desc' => 'Design &amp; commissioning of 25 kV Single Phase OHE, including construction of new switching posts.'],
    ['railway' => 'Southern Railway', 'img' => 'OHE-Images-8-1024x683.jpg', 'desc' => 'Modification of OHE and PSI arrangements to support upgradation for Vande Bharat Train Set operations, offering improved speed and maintenance flexibility.'],
    ['railway' => 'Southern Railway', 'img' => 'OHE-Images-9-1024x683.jpg', 'desc' => 'OHE installation and modification works for Tambaram yard expansion, ensuring seamless integration with new operational layouts.'],
    ['railway' => 'Western Railway', 'img' => 'Project-Img-17-1024x683.jpg', 'desc' => 'Provision and installation of Retractable OHE System, enabling safe maintenance of rakes under overhead equipment.'],
    ['railway' => 'South East Central Railway', 'img' => 'Project-Img-15-1024x683.jpg', 'desc' => 'Replacement of AAA catenary with higher-grade copper catenary to enhance system durability and reliability across major trunk routes.'],
];

$railwayClients = ['SouthCentralRailway-1.jpg','Southern-Railway-1.jpg','South-East-Central-Railway-1.jpg','South-Western-Railway.jpg','East-Coast-Railway.jpg','RVNL.jpg','West-Central-Railway.jpg','Western-Railway-1.jpg','Central-Railway.jpg','DMRC.jpg'];

// Project Gallery images (exact set + order from the original OHE page)
$galleryImages = [
    'Project-Img-16.jpg', 'Project-Img-17.jpg', 'Project-Img-15.jpg', 'Project-Img-20.jpg',
];
?>

<section class="page-banner page-banner--projects">
    <div class="container">
        <h1>OHE</h1>
    </div>
</section>

<!-- Key Points timeline -->
<section class="project-detail-section">
    <div class="container">
        <div class="notable-header">
            <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
            <h2>OHE Key Points</h2>
        </div>
        <div class="key-points-timeline" data-animation="fadeIn">
            <?php foreach ($ohePoints as $i => $pt): ?>
            <div class="kp-item">
                <div class="kp-card">
                    <span class="kp-label">Point <?php echo $i + 1; ?></span>
                    <p><?php echo $pt; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Orders Executed - zig-zag -->
<section class="orders-section">
    <div class="container">
        <h2>List of Our Orders Executed</h2>
        <div class="orders-zigzag">
            <?php foreach ($oheOrders as $i => $order): ?>
            <?php
                // Alternating slide-in: text and image enter from opposite
                // sides, and the direction flips on every other row.
                $textAnim = ($i % 2 === 0) ? 'fadeInLeft' : 'fadeInRight';
                $mediaAnim = ($i % 2 === 0) ? 'fadeInRight' : 'fadeInLeft';
            ?>
            <div class="order-row">
                <div class="order-text" data-animation="<?php echo $textAnim; ?>">
                    <h3><?php echo $order['railway']; ?></h3>
                    <p><?php echo $order['desc']; ?></p>
                    <?php if (isset($order['items'])): ?>
                        <ul>
                            <?php foreach ($order['items'] as $item): ?>
                                <li><?php echo $item; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <div class="order-media" data-animation="<?php echo $mediaAnim; ?>">
                    <img src="<?php echo ASSETS_PATH; ?>/images/projects/ohe/<?php echo $order['img']; ?>" alt="<?php echo $order['railway']; ?> project" loading="lazy" decoding="async">
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once 'includes/project-gallery.php'; ?>

<!-- Railway Clients -->
<section class="railway-clients">
    <div class="container">
        <div class="notable-header">
            <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
            <h2>Our Clients</h2>
        </div>
        <div class="railway-clients-grid">
            <?php foreach ($railwayClients as $logo): ?>
            <div class="railway-client-logo">
                <img src="<?php echo ASSETS_PATH; ?>/images/projects/clients/<?php echo $logo; ?>" alt="Railway client" loading="lazy">
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once 'includes/cta.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
<script>
    window.addEventListener('load', function () {
        if (typeof Swiper === 'undefined') return;
        new Swiper('.project-gallery-swiper', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            autoplay: { delay: 3000, disableOnInteraction: false },
            navigation: { nextEl: '.project-gallery-swiper .swiper-button-next', prevEl: '.project-gallery-swiper .swiper-button-prev' },
            pagination: { el: '.project-gallery-swiper .swiper-pagination', clickable: true },
            breakpoints: {
                640: { slidesPerView: 2, spaceBetween: 10 },
                1025: { slidesPerView: 3, spaceBetween: 10 }
            }
        });
    });
</script>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
