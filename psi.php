<?php
require_once 'includes/config.php';
$pageTitle = 'PSI - Power Supply Installation';
$pageDescription = 'Power Supply Installation projects - Design, Supply, Erection, Testing & Commissioning of Traction Sub-Stations across 8 railway divisions in 10+ states.';
$additionalCSS = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">'
    . '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/projects.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';

$bolt = '<svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>';

$psiPoints = [
    '1x25KV &amp; 2x25KV TSS, SP, SSP\'s experience.',
    'Faster Timelines in executing projects.',
    'Executed projects in busy railway lines.',
    'Have successfully upgraded and commissioned existing TSS, SP, SSP\'s in tough conditions such as no availability of approach roads and harsh weather conditions.',
];

// Each order paired 1:1 with its image (PSI-1 .. PSI-16 in document order)
$psiOrders = [
    ['railway' => 'South Central Railway', 'img' => 'PSI-1-Kazipet-1024x683.jpg', 'desc' => 'Balharshah – Kazipet Section: Design, Supply, Erection, Testing &amp; Commissioning of additions and modifications at Traction Sub-Stations (TSS) for the proposed 3rd line, enhancing power capacity and operational reliability.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-2-Vijayawada-1024x683.jpg', 'desc' => 'Vijayawada Division – Bapatla TSS: Repair and rewinding of 132/27 kV, 21.6 MVA Traction Transformer, restoring performance and extending asset life.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-3-Rjy-1024x683.jpg', 'desc' => 'Gudur, Bapatla &amp; Rajahmundry TSS: Upgradation of 25 kV, 50 Hz Single Phase AC Traction Sub-Stations by replacing existing 5/13.5 MVA transformers with 21.6/30.24 MVA Power Transformers, along with new switchgear and control systems.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-4-Nallapadu-1024x683.jpg', 'desc' => 'Nallapadu – Satuluru and Dhone – Pendekallu Sections: Modification of existing 132/25 kV traction substations and switching stations to support doubling and electrification of the line.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-5-Ammuguda-SP-1024x683.jpg', 'desc' => 'Ammuguda SP &amp; Budvel SSP: Construction of new 25 kV AC Single Phase switching stations including FP/Feeder Line modifications and additional TRD works at Sanathnagar TSS.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-6-Balharshah-1024x683.jpg', 'desc' => 'Balharshah – Kazipet – Vijayawada – Gunadala Section: Design &amp; commissioning of 5 new 2×25 kV switching stations, supporting the expanding 3rd line infrastructure.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-7-Renigunta-Rajampeta-TSS-1024x683.jpg', 'desc' => 'Renigunta &amp; Rajampeta TSS: Periodical Overhauling (POH) of traction power transformers, improving operational efficiency.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-8-Aler-1024x683.jpg', 'desc' => 'GNP, BPA &amp; ALER TSS: Comprehensive POH of three power transformers, followed by safe transportation and re-installation.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-9-Anakapalle-TSS-1024x683.jpg', 'desc' => 'Anakapalle TSS: Installation &amp; commissioning of 6600 KVAR at 40 kV power factor correction systems, including 13% series reactors for stable and efficient traction supply.'],
    ['railway' => 'South Central Railway', 'img' => 'PSI-10-Gunadala-1024x683.jpg', 'desc' => 'Design, Supply, Erection, Testing and Commissioning of new 2x25kV Switching Stations (5 No.) suitable for 3rd line section (excluding the provision of Auto Transformers) in Balharshah-Kazipet-Vijayawada-Gunadala section.'],
    ['railway' => 'Southern Railway', 'img' => 'PSI-11-Mettur-Dam-TSS-1024x683.jpg', 'desc' => 'Mettur Dam TSS, Salem Division: Augmentation of power supply through replacement of 12.5 MVA Traction Transformer with a 21.6/30.21 MVA transformer and associated equipment.'],
    ['railway' => 'Southern Railway', 'img' => 'PSI-12-Walajah-Road-1024x683.jpg', 'desc' => 'Walajah Road – Ranipet Section: Engineering and commissioning of OHE-compatible 2×25 kV feeding system including SSP modifications.'],
    ['railway' => 'South Eastern Central Railway', 'img' => 'PSI-13-Bilaspur-1024x683.jpg', 'desc' => 'Upgradation of PSI assets between Bilaspur – Durg, enhancing traction reliability and load handling.'],
    ['railway' => 'South Western Railway', 'img' => 'PSI-14-Wadi-1024x683.jpg', 'desc' => 'Installation of additional 110 kV/25 kV traction transformers at UBL TSS to increase supply capability.', 'items' => [
        'Sectioning &amp; Paralleling Post (SP) upgrades and modifications to support new bypass line construction near Wadi, Nalwar &amp; Sulehalli.',
        'HEB &amp; THSA (SBC Division): Creation of MWM SP including SP control &amp; battery room building, civil works, SCADA, TRD works, and conversion of existing SSPs to SPs.',
    ]],
    ['railway' => 'East Coast Railway', 'img' => 'PSI-15-Naupada-1024x683.jpg', 'desc' => 'Augmentation of 132 kV/25 kV Traction Transformer at Ponduru TSS, Waltair Division.', 'items' => [
        'Replacement of HT Capacitor Banks at Naupada, Simhachalam North, TPQ, DMK, KMSD, and KMX/TSS, improving system stability.',
        'PSI works for electrification of HPCL private siding at Visakhapatnam, Waltair Division.',
    ]],
    ['railway' => 'RVNL – Hyderabad Division', 'img' => 'PSI-16-Hyd-1024x683.jpg', 'desc' => 'Design, Supply, Erection, Testing &amp; Commissioning of a 132/27 kV Single Phase Railway Traction Sub-Station at Divitipalli under the RE Doubling Project (Umdanagar – Mahabubnagar).'],
];

$railwayClients = ['SouthCentralRailway-1.jpg','Southern-Railway-1.jpg','South-East-Central-Railway-1.jpg','South-Western-Railway.jpg','East-Coast-Railway.jpg','RVNL.jpg','West-Central-Railway.jpg','Western-Railway-1.jpg'];

// Project Gallery images (exact set + order from the original PSI page)
$galleryImages = [
    'Project-Img-18.jpg', 'Project-Img-11.jpg', 'Project-Img-12.jpg', 'Project-Img-13.jpg',
    'Project-Img-14.jpg', 'Project-Img-10.jpg', 'Project-Img-6.jpg', 'Project-Img-7.jpg',
    'Project-Img-8.jpg', 'Project-Img-9.jpg', 'Project-Img-10-1.jpg', 'Project-Img-5.jpg',
    'Project-Img-4.jpg', 'Project-Img-3.jpg', 'Project-Img-2.jpg', 'Project-Img-1.jpg',
];
?>

<section class="page-banner page-banner--projects">
    <div class="container">
        <h1>PSI</h1>
    </div>
</section>

<!-- Key Points timeline -->
<section class="project-detail-section">
    <div class="container">
        <div class="notable-header">
            <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
            <h2>PSI Key Points</h2>
        </div>
        <div class="key-points-timeline" data-animation="fadeIn">
            <?php foreach ($psiPoints as $i => $pt): ?>
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
            <?php foreach ($psiOrders as $i => $order): ?>
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
                    <img src="<?php echo ASSETS_PATH; ?>/images/projects/psi/<?php echo $order['img']; ?>" alt="<?php echo $order['railway']; ?> project" loading="lazy" decoding="async">
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
