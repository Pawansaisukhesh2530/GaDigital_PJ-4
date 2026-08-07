<?php
require_once 'includes/config.php';
$pageTitle = 'Projects';
$pageDescription = 'Nani Transformers has successfully executed 40+ projects with over 30 ongoing, serving industries and infrastructure across India.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/projects.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';

$bolt = '<svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>';
?>

<section class="page-banner page-banner--projects">
    <div class="container">
        <h1>Projects</h1>
    </div>
</section>

<!-- Main content: two-column (left intro + right info cards) -->
<section class="projects-page">
    <div class="container">
        <div class="projects-two-col">
            <!-- Left column: intro text + image -->
            <div class="projects-left" data-animation="fadeIn">
                <div class="projects-intro-block">
                    <div class="projects-subtitle">
                        <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
                        <h6>HOW IT WORKS</h6>
                    </div>
                    <h2>Projects We Completed</h2>
                    <p>Nani Transformers has successfully executed <strong><?php echo STAT_PROJECTS_COMPLETED; ?> projects</strong> with over <strong><?php echo STAT_PROJECTS_ONGOING; ?> ongoing</strong>, serving industries and infrastructure across India.</p>
                    <p>Over the years <strong>NANI ELECTRO TECHNICS PVT. LTD.</strong> has expanded its operations to <?php echo STAT_RAILWAY_DIVISIONS; ?> Railway Divisions spread across <?php echo STAT_STATES_REACHED; ?> states.</p>
                </div>
                <figure class="projects-hero-media">
                    <video controls playsinline preload="metadata" class="projects-video" poster="<?php echo ASSETS_PATH; ?>/images/projects-we-completed.jpg">
                        <source src="<?php echo ASSETS_PATH; ?>/videos/projects-hero.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </figure>
            </div>

            <!-- Right column: stacked info cards -->
            <div class="projects-right" data-animation="fadeInRight">
                <div class="projects-summary-card">
                    <h5>Timely execution of the Projects</h5>
                    <p>NANI ELECTRO TECHNICS PVT. LTD. has stood strong diversifying its activities all over India and built a team of 250+ people for hassle free and timely execution of the Projects.</p>
                </div>
                <div class="projects-summary-card">
                    <h5>USP of NETPL.</h5>
                    <p>Quality and timely execution is the USP of NETPL.</p>
                </div>
                <div class="projects-summary-card">
                    <h5>Highly trained</h5>
                    <p>Highly trained and experienced technical personnel under the guidance of technically acclaimed Mr. S. Raghavendra Rao(M.D) and Mr. Sabareesh Surapaneni (Director), NETPL aims to play a major role in upgrading the Indian Railways Network from its 1x25KV to 2x25KV Transmission.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Our Notable Projects (overlay cards on images) -->
<section class="projects-notable">
    <div class="container">
        <div class="notable-header">
            <span class="icon-bolt icon-bolt--red"><?php echo $bolt; ?></span>
            <h2>Our Notable Projects</h2>
        </div>

        <div class="notable-grid">
            <!-- PSI -->
            <div class="notable-card">
                <img src="<?php echo ASSETS_PATH; ?>/images/projects/project-img-16.jpg" alt="PSI - Power Supply Installation" width="1024" height="683" loading="lazy" decoding="async">
                <div class="notable-card-overlay">
                    <h2>PSI</h2>
                    <p>South Central Railway, Southern Railway, RVNL, South Western Railway</p>
                    <a href="psi.php" class="btn btn-primary">KNOW MORE</a>
                </div>
            </div>

            <!-- OHE -->
            <div class="notable-card">
                <img src="<?php echo ASSETS_PATH; ?>/images/projects/project-img-17.jpg" alt="OHE - Overhead Electrification" width="1024" height="683" loading="lazy" decoding="async">
                <div class="notable-card-overlay">
                    <h2>OHE</h2>
                    <p>South Central Railway, Southern Railway, Western Railway, South Western Railway</p>
                    <a href="ohe.php" class="btn btn-primary">KNOW MORE</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section with background image -->
<section class="projects-cta">
    <div class="container">
        <div class="projects-cta-inner" data-animation="fadeInUp">
            <h2>Ready to Power Your Next Project?</h2>
            <p>Contact us for industry-leading transformer solutions and turnkey execution.</p>
            <a href="contact-us.php" class="btn btn-primary">CONTACT US</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php require_once 'includes/scripts.php'; ?>
