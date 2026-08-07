<?php
require_once 'includes/config.php';
$pageDescription = 'Nani Transformers - Over 30 years of excellence in transformer design, manufacturing, and electrification across India\'s major industries.';

// Preload only the banner actually used at this viewport so the hero
// background is discovered early without a wasted download.
$additionalCSS = '<link rel="preload" as="image" href="' . ASSETS_PATH . '/images/hero-banner-1.jpg" media="(min-width: 768px)">'
    . '<link rel="preload" as="image" href="' . ASSETS_PATH . '/images/hero-banner-mobile-1.jpg" media="(max-width: 767px)">'
    . '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">'
    . '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/homepage.css">';

require_once 'includes/head.php';
require_once 'includes/header.php';

// Bolt icon markup reused across section headers
$bolt = '<svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>';

// Client logo order, taken from the live carousel (51 slides)
$clientLogos = array_merge(
    array_map(function ($n) { return 'n11-' . $n . '.jpg'; },
        [31, 30, 29, 28, 27, 26, 20, 21, 22, 23, 24, 25, 19, 18, 17, 16, 15, 14, 8, 9, 10, 11, 13, 7, 6, 5, 4, 1, 2]),
    array_map(function ($n) { return 'n12-' . $n . '.jpg'; },
        [2, 3, 4, 5, 7, 8, 9, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 10, 11, 6])
);
?>

<!-- ============ HERO SLIDER ============
     <picture> swaps the artwork at 767px so the browser
     downloads only the version it needs, and height:auto
     keeps each banner uncropped at every width.
     Desktop art 1920x650, mobile art 680x400.
================================================ -->
<section class="hero-slider">
    <h1 class="sr-only">Nani Transformers &ndash; Powering Progress with Precision. Transformer manufacturing and electrification across India since 1995.</h1>
    <div class="swiper hero-swiper">
        <div class="swiper-wrapper">
            <?php
            $heroSlides = [
                ['n' => 1, 'href' => 'products.php', 'label' => 'View our products'],
                ['n' => 2, 'href' => 'products.php', 'label' => 'View our products'],
                ['n' => 3, 'href' => 'services.php', 'label' => 'View our services'],
            ];
            foreach ($heroSlides as $idx => $slide):
                $eager = ($idx === 0);
            ?>
            <div class="swiper-slide">
                <picture>
                    <source
                        media="(max-width: 767px)"
                        srcset="<?php echo ASSETS_PATH; ?>/images/hero-banner-mobile-<?php echo $slide['n']; ?>.jpg"
                        width="680" height="400">
                    <img
                        class="hero-img"
                        src="<?php echo ASSETS_PATH; ?>/images/hero-banner-<?php echo $slide['n']; ?>.jpg"
                        width="1920" height="650"
                        alt=""
                        <?php echo $eager ? 'fetchpriority="high" decoding="async"' : 'loading="lazy" decoding="async"'; ?>>
                </picture>
                <a class="swiper-slide-inner" href="<?php echo $slide['href']; ?>" aria-label="<?php echo $slide['label']; ?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>

<!-- ============ FEATURE CARDS ============ -->
<section class="section-features">
    <div class="container">
        <div class="features-grid" data-animation="fadeInUp">
            <div class="feature-card">
                <div class="feature-img">
                    <img src="<?php echo ASSETS_PATH; ?>/icons/trusted-expertise.gif" alt="" width="375" height="375" loading="lazy" decoding="async">
                </div>
                <div class="feature-content">
                    <h3>Trusted Expertise</h3>
                    <p>Over 30 years of excellence in transformer design, manufacturing, and electrification across India's major industries.</p>
                </div>
            </div>
            <div class="feature-card">
                <div class="feature-img">
                    <img src="<?php echo ASSETS_PATH; ?>/icons/advanced-manufacturing.gif" alt="" width="375" height="375" loading="lazy" decoding="async">
                </div>
                <div class="feature-content">
                    <h3>Advanced Manufacturing</h3>
                    <p>State-of-the-art facilities equipped to produce custom-built transformers up to 20 MVA / 33 KV with stringent quality standards.</p>
                </div>
            </div>
            <div class="feature-card feature-card--red">
                <div class="feature-img">
                    <img src="<?php echo ASSETS_PATH; ?>/icons/complete-power-solutions.gif" alt="" width="375" height="375" loading="lazy" decoding="async">
                </div>
                <div class="feature-content">
                    <h3>Complete Power Solutions</h3>
                    <p>End-to-end services — from transformer design and supply to repair, overhauling, and turnkey project execution.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHO WE ARE ============ -->
<section class="section-about">
    <div class="container">
        <div class="about-row">
            <div class="about-col-text" data-animation="fadeInLeft">
                <div class="about-heading-row">
                    <span class="icon-bolt"><?php echo $bolt; ?></span>
                    <h2 class="about-title">WHO WE ARE</h2>
                </div>
                <div class="about-text-content">
                    <p><strong>Nani Electro Technics Pvt. Ltd. (NETPL)</strong> — branded as <strong>NANI Transformers</strong> — was <strong>founded in 1995 by Mr. Raghavendra Rao Surapaneni</strong>, who brings over 40 years of engineering expertise to the power sector. The company is now spearheaded by <strong>Mr. Sabareesh S. Surapaneni</strong>, continuing the legacy of innovation, quality, and customer trust that defines NANI Transformers.</p>
                    <p>With over <strong>30+ years of proven presence</strong>, NANI Transformers serves leading clients across Cement, Steel, Pharma, Research Laboratories, Power, and Infrastructure sectors.</p>
                    <p>With a world-class manufacturing facility in <strong>Hyderabad, India</strong>, Nani Transformers designs and delivers <strong>custom-built transformers up to 20 MVA / 33 KV class</strong> and <strong>VPI Dry Type Transformers up to 5 MVA / 33 KV class</strong>.</p>
                    <p>We are <strong>ISO 9001:2015 certified</strong> and <strong>BIS:1180 approved</strong>, backed by state-of-the-art design, manufacturing, and testing infrastructure. Over three decades, we've earned the trust of clients across sectors — <strong>Steel, Cement, Power, Pharma, and Infrastructure</strong> — with our commitment to quality, service, and innovation.</p>
                </div>
                <a href="about-us.php" class="btn btn-primary">Discover more</a>
            </div>

            <div class="about-col-image" data-animation="fadeInUp">
                <div class="masked-image">
                    <img src="<?php echo ASSETS_PATH; ?>/images/who-we-are.jpg" alt="Nani Transformers manufacturing facility" width="684" height="455" class="about-main-img" loading="lazy" decoding="async">
                </div>
                <div class="experience-badge" data-animation="bounceIn">
                    <span class="badge-number">30+</span>
                    <span class="badge-text">Years of Experience</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ STATS / COUNTERS ============ -->
<section class="section-stats">
    <div class="container">
        <div class="stats-text-area" data-animation="fadeInUp">
            <h2 class="stats-heading">Powering industries for over three decades with innovative and reliable transformer solutions.</h2>
            <p class="stats-subtext">Our numbers reflect our commitment to quality, performance, and nationwide excellence.</p>
        </div>
        <div class="stats-counters" data-animation="fadeIn">
            <div class="counter-item">
                <div class="counter-title">Railway Projects Completed</div>
                <div class="counter-number-wrap"><span class="counter" data-target="<?php echo (int) STAT_PROJECTS_COMPLETED; ?>">0</span>+</div>
            </div>
            <div class="counter-item">
                <div class="counter-title">Railway Projects Ongoing</div>
                <div class="counter-number-wrap"><span class="counter" data-target="<?php echo (int) STAT_PROJECTS_ONGOING; ?>">0</span>+</div>
            </div>
            <div class="counter-item">
                <div class="counter-title">Transformer Clients served</div>
                <div class="counter-number-wrap"><span class="counter" data-target="<?php echo (int) STAT_CLIENTS_SERVED; ?>">0</span>+</div>
            </div>
        </div>
    </div>
</section>

<!-- ============ OUR PRODUCTS ============ -->
<section class="section-products">
    <div class="container">
        <div class="products-header" data-animation="fadeInUp">
            <span class="icon-bolt"><?php echo $bolt; ?></span>
            <h2>OUR PRODUCTS</h2>
        </div>
        <div class="products-cards">
            <div class="product-showcase-card" data-animation="fadeIn" style="background-image:url('<?php echo ASSETS_PATH; ?>/images/oil-filled-transformers.png');">
                <div class="product-showcase-inner">
                    <h3>Oil Filled Transformers</h3>
                    <p><strong>Product Range</strong>: Up to <strong>20 MVA</strong> | <strong>Voltage</strong>: Up to <strong>33 KV</strong></p>
                    <a href="products.php" class="btn btn-primary">See detail</a>
                </div>
            </div>
            <div class="product-showcase-card" data-animation="fadeIn" style="background-image:url('<?php echo ASSETS_PATH; ?>/images/vpi-dry-transformers.png');">
                <div class="product-showcase-inner">
                    <h3>VPI Dry Type Transformers</h3>
                    <p><strong>Product Range</strong>: Up to <strong>5 MVA</strong> | <strong>Voltage</strong>: Up to <strong>33 KV</strong></p>
                    <a href="products.php" class="btn btn-primary">See detail</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ OUR SERVICES ============ -->
<section class="section-services">
    <div class="container">
        <!-- row-reverse in CSS renders the icon to the left of the heading -->
        <div class="services-header" data-animation="fadeInUp">
            <h2>Our Services</h2>
            <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
        </div>

        <div class="services-grid" data-animation="fadeIn">
            <div class="service-home-card">
                <div class="service-home-icon">
                    <img src="<?php echo ASSETS_PATH; ?>/icons/service-repairing.svg" alt="" width="42" height="42" loading="lazy">
                    <span class="service-title">Repairing</span>
                </div>
                <img src="<?php echo ASSETS_PATH; ?>/images/services/repairing-2.jpg" alt="Transformer repairing" width="400" height="300" loading="lazy" decoding="async">
                <ul>
                    <li>Transformer Repair &amp; Refurbishment up to <strong>50 MVA / 132 KV</strong></li>
                    <li>Specialized in Power Transformers and OLTC Systems</li>
                </ul>
                <a href="repairing.php" class="btn btn-primary">Read more</a>
            </div>

            <div class="service-home-card">
                <div class="service-home-icon">
                    <img src="<?php echo ASSETS_PATH; ?>/icons/service-overhauling.svg" alt="" width="42" height="42" loading="lazy">
                    <span class="service-title">Periodic overhauling</span>
                </div>
                <img src="<?php echo ASSETS_PATH; ?>/images/services/periodic-overhauling.jpg" alt="Periodic overhauling service" width="1024" height="683" loading="lazy" decoding="async">
                <ul>
                    <li>Preventive maintenance and inspection for extended transformer life</li>
                    <li>Testing, oil filtration, and load performance checks</li>
                </ul>
                <a href="periodic-overhauling.php" class="btn btn-primary">Read more</a>
            </div>

            <div class="service-home-card">
                <div class="service-home-icon">
                    <img src="<?php echo ASSETS_PATH; ?>/icons/service-erection.svg" alt="" width="42" height="42" loading="lazy">
                    <span class="service-title">Transformer Erection</span>
                </div>
                <img src="<?php echo ASSETS_PATH; ?>/images/services/transformer-erection-2.jpg" alt="Transformer erection on site" width="800" height="600" loading="lazy" decoding="async">
                <ul>
                    <li>Complete on-site erection, testing, and commissioning of new installations</li>
                    <li>Expertise in Power Transformers and turnkey industrial setups</li>
                </ul>
                <a href="transformer-erection.php" class="btn btn-primary">Read more</a>
            </div>
        </div>
    </div>
</section>

<!-- ============ CLIENTS ============ -->
<section class="section-clients">
    <div class="container">
        <div class="clients-header">
            <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
            <h2>Our prestigious clientele includes</h2>
        </div>
        <div class="clients-swiper-wrap">
            <div class="swiper clients-swiper">
                <div class="swiper-wrapper">
                    <?php foreach ($clientLogos as $logo): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo ASSETS_PATH; ?>/images/clients/<?php echo $logo; ?>" alt="Client logo" loading="lazy" decoding="async">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>

<!-- ============ PROJECTS WE COMPLETED ============ -->
<section class="section-projects">
    <div class="container">
        <div class="projects-col-left" data-animation="fadeIn">
            <div class="projects-heading-row">
                <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
                <h2>Projects We Completed</h2>
            </div>
            <p class="projects-intro">Nani Transformers has successfully executed <strong><?php echo STAT_PROJECTS_COMPLETED; ?> projects</strong> with over <strong><?php echo STAT_PROJECTS_ONGOING; ?> ongoing</strong>, serving industries and infrastructure across India.</p>
            <div class="projects-image masked-image">
                <img src="<?php echo ASSETS_PATH; ?>/images/projects-we-completed.jpg" alt="Completed railway electrification project" width="768" height="512" loading="lazy" decoding="async">
            </div>
        </div>

        <div class="projects-col-right">
            <div class="project-card" data-animation="fadeInRight">
                <div class="project-card-body">
                    <h5>Railway Projects</h5>
                    <p>Our major contributions include <strong>Railway Electrification Projects</strong> spanning <strong><?php echo STAT_RAILWAY_DIVISIONS; ?> railway divisions across <?php echo STAT_STATES_REACHED; ?> states</strong>, covering:</p>
                    <ul>
                        <li><strong>132kV / 220kV Traction Substations</strong></li>
                        <li><strong>25kV Overhead Electrification (OHE)</strong></li>
                        <li><strong>Sectioning and Paralleling Posts (SP/SSP)</strong></li>
                    </ul>
                </div>
                <div class="project-card-action">
                    <a href="psi.php" class="btn btn-primary">Read more</a>
                </div>
            </div>

            <div class="project-card" data-animation="fadeInRight">
                <div class="project-card-body">
                    <h5>Power Supply Installation</h5>
                    <p>a. 220KV/132KV/110KV Traction Substations,</p>
                    <p>b. 25 KV Sectioning Paralleling Posts,</p>
                    <p>c. 25 KV Sub Sectioning Paralleling Posts.</p>
                </div>
                <div class="project-card-action">
                    <a href="psi.php" class="btn btn-primary">Read more</a>
                </div>
            </div>

            <div class="project-card" data-animation="fadeInRight">
                <div class="project-card-body">
                    <h5>Over Head Electrification</h5>
                    <p>1 x 25 KV Overhead Traction System, 2 x 25 KV Overhead Traction System,</p>
                </div>
                <div class="project-card-action">
                    <a href="ohe.php" class="btn btn-primary">Read more</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/cta.php'; ?>

<?php require_once 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
<script>
window.addEventListener('load', function () {
    if (typeof Swiper === 'undefined') return;

    // Hero: 5000ms autoplay / 500ms slide, matching the original.
    // autoHeight lets the wrapper follow the uncropped image height.
    var instances = [
        new Swiper('.hero-swiper', {
            loop: true,
            speed: 500,
            effect: 'slide',
            autoHeight: true,
            autoplay: { delay: 5000, disableOnInteraction: true, pauseOnMouseEnter: true },
            keyboard: { enabled: true },
            a11y: { enabled: true },
            observer: true,
            observeParents: true,
            navigation: {
                nextEl: '.hero-swiper .swiper-button-next',
                prevEl: '.hero-swiper .swiper-button-prev'
            }
        })
    ];

    // Clients: 5 up, 80px gap, 1000ms autoplay / 500ms slide, arrows + dots
    instances.push(new Swiper('.clients-swiper', {
        loop: true,
        speed: 500,
        slidesPerView: 5,
        spaceBetween: 80,
        autoplay: { delay: 1000, disableOnInteraction: true, pauseOnMouseEnter: true },
        a11y: { enabled: true },
        navigation: {
            nextEl: '.clients-swiper .swiper-button-next',
            prevEl: '.clients-swiper .swiper-button-prev'
        },
        pagination: {
            el: '.clients-swiper .swiper-pagination',
            clickable: true,
            dynamicBullets: true
        },
        breakpoints: {
            0:    { slidesPerView: 2, spaceBetween: 24 },
            576:  { slidesPerView: 3, spaceBetween: 32 },
            768:  { slidesPerView: 4, spaceBetween: 48 },
            1025: { slidesPerView: 5, spaceBetween: 80 }
        }
    }));

    var t;
    window.addEventListener('resize', function () {
        clearTimeout(t);
        t = setTimeout(function () {
            instances.forEach(function (sw) {
                if (sw && typeof sw.update === 'function') sw.update();
            });
        }, 200);
    });
});
</script>

<?php require_once 'includes/scripts.php'; ?>
