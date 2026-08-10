<?php
require_once 'includes/config.php';
$pageTitle = 'Careers';
$pageDescription = 'Join the Nani Transformers team. Explore current job openings and career opportunities in transformer manufacturing and engineering.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/careers.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';

// Current openings (exact content from the original careers page)
$openings = [
    [
        'title' => 'Graduate Engineer Trainee',
        'age' => '20-24',
        'qualification' => 'Bachelor of Engineering',
        'experience' => '0',
        'location' => 'Hyderabad',
        'note' => '"Excellent opportunity for freshers to kick start their career in Transformers industry"',
    ],
    [
        'title' => 'General Manager (Service Marketing) south India',
        'age' => '20-24',
        'qualification' => 'Bachelor of Engineering',
        'experience' => '0',
        'location' => 'Hyderabad',
        'note' => '"Excellent opportunity for freshers to kick start their career in Transformers industry"',
    ],
];

$status = $_GET['status'] ?? '';
?>

<!-- Page Banner -->
<section class="page-banner page-banner--careers">
    <div class="container">
        <h1>Careers</h1>
    </div>
</section>

<!-- Current Openings -->
<section class="careers-section">
    <div class="container">
        <h2 class="careers-title" data-animation="fadeInUp">Current Openings</h2>

        <div class="job-accordion" data-animation="fadeInUp">
            <?php foreach ($openings as $index => $job): ?>
            <details class="job-item" data-animation="fadeInUp"<?php echo $index === 0 ? ' open' : ''; ?>>
                <summary class="job-summary">
                    <span class="job-summary-title"><?php echo $job['title']; ?></span>
                    <span class="job-summary-icon" aria-hidden="true">
                        <i class="fas fa-chevron-down"></i>
                    </span>
                </summary>
                <div class="job-body">
                    <div class="job-meta">
                        <p><strong>Age</strong> : <?php echo $job['age']; ?></p>
                        <p><strong>Qualification :</strong> <?php echo $job['qualification']; ?></p>
                        <p><strong>Experience :</strong> <?php echo $job['experience']; ?></p>
                        <p><strong>Location :</strong> <?php echo $job['location']; ?></p>
                    </div>
                    <h5 class="job-note"><?php echo $job['note']; ?></h5>
                    <a href="#apply" class="btn btn-primary btn-sm job-apply">Apply</a>
                </div>
            </details>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Application Form + Image -->
<section class="careers-apply" id="apply">
    <div class="container">
        <div class="careers-apply-grid">
            <div class="careers-apply-form" data-animation="fadeInUp">
                <h2>Haven&rsquo;t found what you&rsquo;re looking for?</h2>

                <?php if ($status === 'success'): ?>
                    <div class="form-alert form-alert--success" data-animation="fadeIn">Thank you! Your application has been received. We'll be in touch soon.</div>
                <?php elseif ($status === 'error'): ?>
                    <div class="form-alert form-alert--error" data-animation="fadeIn">Sorry, something went wrong. Please check your details and try again.</div>
                <?php endif; ?>

                <form action="handlers/career-form.php" method="POST" enctype="multipart/form-data" data-validate>
                    <?php echo csrf_field(); ?>
                    <input type="text" name="website" class="hp-field" tabindex="-1" autocomplete="off" aria-hidden="true">
                    <div class="form-row">
                        <div class="form-group">
                            <input type="text" name="first_name" class="form-control" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" placeholder="Message" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Upload Resume</label>
                        <div class="file-upload">
                            <label class="file-upload-label">
                                <span class="choose-btn">CHOOSE FILE</span>
                                <span class="file-name">No file chosen</span>
                            </label>
                            <input type="file" name="resume" accept=".pdf,.doc,.docx" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">SUBMIT</button>
                    <div class="form-message"></div>
                </form>
            </div>

            <div class="careers-apply-image" data-animation="fadeInRight">
                <img src="<?php echo ASSETS_PATH; ?>/images/careers-1.jpg" alt="Careers at Nani Transformers" width="512" height="900" loading="lazy" decoding="async">
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
require_once 'includes/scripts.php';
?>