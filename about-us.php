<?php
require_once 'includes/config.php';
$pageTitle = 'About Us';
$pageDescription = 'Nani Electro Technics Pvt. Ltd. (NANI Transformers), established in 1995, is a trusted name in the design and manufacturing of high-quality transformers across capacities and configurations.';
$additionalCSS = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css">'
    . '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/about.css">';

require_once 'includes/head.php';
require_once 'includes/header.php';

$bolt = '<svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>';

// Why Choose us - order and copy exactly as on the live page
$whyItems = [
    ['icon' => 'why-legacy.svg',     'title' => 'Legacy of Trust and Expertise',        'text' => 'With over four decades of experience, we bring deep technical knowledge and proven performance to every project.'],
    ['icon' => 'why-quality.svg',    'title' => 'Quality Without Compromise',           'text' => 'Every transformer is engineered, manufactured, and tested to meet stringent national and international standards.'],
    ['icon' => 'why-custom.svg',     'title' => 'Custom-Built Solutions',               'text' => 'We design transformers tailored to the unique requirements of industries, infrastructure, and renewable energy projects.'],
    ['icon' => 'why-facility.svg',   'title' => 'Advanced Manufacturing Facility',      'text' => 'Our Hyderabad-based plant is equipped with world-class machinery and a skilled workforce dedicated to precision and reliability.'],
    ['icon' => 'why-delivery.svg',   'title' => 'Timely Delivery and Dependable Support', 'text' => 'We ensure projects are completed on schedule, backed by responsive after-sales service and maintenance assistance.'],
    ['icon' => 'why-innovation.svg', 'title' => 'Innovation and Sustainability',        'text' => 'Guided by continuous research and environmentally responsible practices, we are shaping the future of efficient power transformation.'],
];

$team = [
    [
        'photo' => 'raghavendra-rao.jpg',
        'name'  => 'Mr. S. Raghavendra Rao',
        'role'  => 'Founder &amp; Managing Director',
        'bio'   => 'brings over 40 years of industry experience and continues to guide the company with strategic vision and engineering precision.',
    ],
    [
        'photo' => 'sabareesh-sai.jpg',
        'name'  => 'Mr. S. Sabareesh Sai',
        'role'  => 'Director',
        'bio'   => 'represents the next generation of leadership, blending global exposure and modern energy expertise with the company\'s traditional strengths.',
    ],
];
?>
<!-- ============ PAGE BANNER ============ -->
<section class="page-banner page-banner--about">
    <div class="container">
        <h1 data-animation="fadeInUp">About Us</h1>
    </div>
</section>

<!-- ============ ABOUT + VISION / MISSION ============ -->
<section class="about-intro">
    <div class="container">
        <div class="about-intro-row">
            <!-- Left: About Us copy -->
            <div class="about-intro-text" data-animation="fadeIn">
                <div class="about-intro-heading">
                    <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
            <h2>About Us</h2>
                </div>
                <p>Nani Electro Technics Pvt. Ltd. (NANI Transformers), established in 1995, is a trusted name in the design and manufacturing of high-quality transformers across capacities and configurations. Founded by Mr. S. Raghavendra Rao (B.Tech &ndash; EEE), a visionary with over four decades of experience in the transformer industry, the company has built a legacy of engineering excellence, reliability, and commitment.</p>
                <p>Over the years, NANI Transformers has become a preferred supplier for leading industrial and infrastructure clients across India. From manufacturing robust oil-filled transformers to executing large-scale Railway Electrification Projects since 2003, our journey has been defined by quality, innovation, and an unwavering focus on customer satisfaction. With operations now expanding across <?php echo STAT_STATES_REACHED; ?> Indian states, we continue to power the nation&rsquo;s growth with superior technology and trusted performance.</p>
            </div>

            <!-- Right: Vision + Mission -->
            <div class="about-values">
                <div class="value-block" data-animation="fadeIn">
                    <div class="value-figure">
                        <img src="<?php echo ASSETS_PATH; ?>/images/about/vision.svg" alt="" width="301" height="501" loading="lazy">
                    </div>
                    <div class="value-body">
                        <h3>Our Vision</h3>
                        <p>To deliver innovative and reliable power solutions that exceed client expectations, ensuring uncompromising quality, safety, and timely execution across every project we undertake.</p>
                    </div>
                </div>

                <div class="value-block" data-animation="fadeIn">
                    <div class="value-figure">
                        <img src="<?php echo ASSETS_PATH; ?>/images/about/mission.svg" alt="" width="512" height="512" loading="lazy">
                    </div>
                    <div class="value-body">
                        <h3>Our Mission</h3>
                        <p>To design and manufacture world-class transformers that set new benchmarks in performance and durability.</p>
                        <ul class="mission-list">
                            <li>
                                <img src="<?php echo ASSETS_PATH; ?>/icons/about/bullet-tick.svg" alt="" width="16" height="16" loading="lazy">
                                <span>To consistently upgrade our technology and processes to meet evolving energy demands.</span>
                            </li>
                            <li>
                                <img src="<?php echo ASSETS_PATH; ?>/icons/about/bullet-tick.svg" alt="" width="16" height="16" loading="lazy">
                                <span>To nurture a culture of excellence, precision, and continuous learning within our organization.</span>
                            </li>
                            <li>
                                <img src="<?php echo ASSETS_PATH; ?>/icons/about/bullet-tick.svg" alt="" width="16" height="16" loading="lazy">
                                <span>To contribute to India&rsquo;s energy infrastructure through sustainable and scalable solutions.</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ============ OUR STORY ============ -->
<section class="about-story">
    <div class="container">
        <div class="story-top" data-animation="fadeIn">
            <div class="story-figure">
                <img src="<?php echo ASSETS_PATH; ?>/images/about-main.jpg" alt="Nani Transformers facility" width="596" height="600" loading="lazy" decoding="async">
            </div>
            <div class="story-intro">
                <div class="story-heading">
                    <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
                    <h2>Our Story</h2>
                </div>
                <p>Founded in 1995 with a clear purpose &mdash; to manufacture quality transformers that deliver reliable performance</p>
                <div class="story-logo">
                    <img src="<?php echo ASSETS_PATH; ?>/images/about/netpl-logo.svg" alt="Nani Electro Technics Pvt. Ltd." width="340" height="100" loading="lazy">
                </div>
            </div>
        </div>

        <div class="story-timeline">
            <div class="timeline-card" data-animation="fadeIn">
                <h4>Humble Beginnings</h4>
                <span class="btn btn-primary">1995</span>
                <p>Founded in 1995 with a clear purpose &mdash; to manufacture quality transformers that deliver reliable performance &mdash; NANI Transformers began as a small enterprise driven by passion and technical expertise. Under the leadership of Mr. S. Raghavendra Rao, the company quickly earned recognition for its commitment to quality and ethical business practices.</p>
            </div>
            <div class="timeline-card" data-animation="fadeIn">
                <h4>Expanding Horizons</h4>
                <span class="btn btn-primary">2003</span>
                <p>With consistent innovation and an expanding customer base, NANI Transformers ventured into Railway Electrification Projects in 2003, marking a major milestone in its growth. Today, with operations spanning <?php echo STAT_STATES_REACHED; ?> states, the company has evolved into a key player supporting infrastructure, renewable, and industrial sectors with cutting-edge transformer technology.</p>
            </div>
            <div class="timeline-card" data-animation="fadeIn">
                <h4>Innovating the Future</h4>
                <span class="btn btn-primary">Present</span>
                <p>Under the dynamic direction of Mr. S. Sabareesh Sai, a second-generation entrepreneur and alumnus of Arizona State University (M.S. in Electrical &amp; Electronics Engineering), NANI Transformers continues to pioneer modern transformer designs. His expertise in Renewable Energy Systems and Grid Integration Studies has infused fresh innovation into the company&rsquo;s operations, enabling the development of advanced transformers for solar, wind, and smart grid projects.</p>
            </div>
        </div>
    </div>
</section>

<!-- ============ WHY CHOOSE US ============ -->
<section class="about-why">
    <div class="container">
        <div class="why-header" data-animation="fadeInUp">
            <h2>Why Choose us</h2>
            <p>At Nani Transformers, our commitment goes beyond manufacturing products &mdash; it&rsquo;s about powering progress with precision, reliability, and purpose. With every transformer we build, we reinforce our promise of quality, trust, and innovation.</p>
        </div>

        <div class="why-grid" data-animation="fadeIn">
            <?php foreach ($whyItems as $item): ?>
            <div class="why-item">
                <div class="why-icon">
                    <img src="<?php echo ASSETS_PATH; ?>/icons/about/<?php echo $item['icon']; ?>" alt="" width="36" height="36" loading="lazy">
                </div>
                <div class="why-body">
                    <h3><?php echo $item['title']; ?></h3>
                    <p><?php echo $item['text']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- ============ MEET OUR TEAM ============ -->
<section class="about-team">
    <div class="container">
        <div class="team-header" data-animation="fadeInUp">
            <h6>Meet our team</h6>
            <p>Behind every transformer we build is a team of dedicated engineers, designers, and technicians who share a passion for excellence.</p>
        </div>

        <div class="team-grid" data-animation="fadeIn">
            <?php foreach ($team as $member): ?>
            <div class="team-card">
                <div class="team-photo">
                    <img src="<?php echo ASSETS_PATH; ?>/images/<?php echo $member['photo']; ?>" alt="<?php echo $member['name']; ?>" width="600" height="600" loading="lazy" decoding="async">
                </div>
                <h3><?php echo $member['name']; ?></h3>
                <p class="team-role"><?php echo $member['role']; ?></p>
                <p class="team-bio"><?php echo $member['bio']; ?></p>
                <?php
                $memberSocials = [
                    ['href' => SOCIAL_FACEBOOK, 'label' => 'Facebook', 'icon' => 'fab fa-facebook-f'],
                    ['href' => SOCIAL_LINKEDIN, 'label' => 'LinkedIn', 'icon' => 'fab fa-linkedin-in'],
                    ['href' => SOCIAL_TWITTER, 'label' => 'Twitter', 'icon' => 'fab fa-twitter'],
                ];
                $hasSocial = array_filter(array_column($memberSocials, 'href'));
                ?>
                <?php if ($hasSocial): ?>
                <div class="team-social">
                    <?php foreach ($memberSocials as $s): if ($s['href'] === '') continue; ?>
                    <a href="<?php echo $s['href']; ?>" aria-label="<?php echo $s['label']; ?>" rel="noopener"><i class="<?php echo $s['icon']; ?>"></i></a>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="team-footnote" data-animation="fadeInUp">
            <p>Our technical and production teams are skilled professionals who ensure every product meets the highest performance and safety standards.</p>
            <p>Together, we are united by one goal &mdash; to power the future with quality, trust, and innovation.</p>
        </div>
    </div>
</section>

<!-- ============ TRUSTED CLIENTS ============ -->
<section class="clients-section about-clients">
    <div class="container">
        <div class="clients-header">
            <h2>Trusted by <?php echo STAT_CLIENTS_SERVED; ?> world-class brands and organizations of all sizes.</h2>
        </div>
        <div class="clients-swiper-wrap">
            <div class="swiper about-clients-swiper">
                <div class="swiper-wrapper">
                    <?php $logos = getClientLogos(); ?>
                    <?php foreach ($logos as $logo): ?>
                        <div class="swiper-slide">
                            <img src="<?php echo ASSETS_PATH; ?>/images/clients/<?php echo $logo; ?>" alt="Client logo" loading="lazy" decoding="async">
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            <div class="about-clients-pagination"></div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
require_once 'includes/scripts.php';
?>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js" defer></script>
<script>
window.addEventListener('load', function () {
    if (typeof Swiper === 'undefined') return;
    new Swiper('.about-clients-swiper', {
        loop: true,
        speed: 500,
        slidesPerView: 5,
        spaceBetween: 80,
        autoplay: { delay: 1000, disableOnInteraction: true, pauseOnMouseEnter: true },
        a11y: { enabled: true },
        navigation: {
            nextEl: '.about-clients-swiper .swiper-button-next',
            prevEl: '.about-clients-swiper .swiper-button-prev'
        },
        pagination: {
            el: '.about-clients-pagination',
            clickable: true
        },
        breakpoints: {
            0:    { slidesPerView: 2, spaceBetween: 24 },
            576:  { slidesPerView: 3, spaceBetween: 32 },
            768:  { slidesPerView: 4, spaceBetween: 48 },
            1025: { slidesPerView: 5, spaceBetween: 80 }
        }
    });
});
</script>
