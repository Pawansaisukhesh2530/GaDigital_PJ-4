<?php
require_once 'includes/config.php';
$pageTitle = 'Contact Us';
$pageDescription = 'Get in touch with Nani Transformers. Let\'s power your project with precision and reliability. Contact us for transformer solutions.';
$additionalCSS = '<link rel="stylesheet" href="' . ASSETS_PATH . '/css/contact.css">';
require_once 'includes/head.php';
require_once 'includes/header.php';

$status = $_GET['status'] ?? '';
?>

<!-- Page Banner -->
<section class="page-banner page-banner--contact">
    <div class="container">
        <h1>Contact Us</h1>
    </div>
</section>

<!-- Contact intro + info boxes -->
<section class="contact-section">
    <div class="container">
        <div class="contact-intro" data-animation="fadeInUp">
            <h6>Get in touch</h6>
            <h2>Let&rsquo;s Power Your Project with Precision and Reliability.</h2>
        </div>

        <div class="contact-boxes">
            <div class="contact-box" data-animation="fadeInLeft">
                <span class="contact-box-icon"><i class="fas fa-map-marker-alt" aria-hidden="true"></i></span>
                <h5>Head Office</h5>
                <p>Flat 501, MIG 187, Opp. City Union Bank, Road No.1, Phase No. 1, KPHB Colony, Kukatpally, Hyderabad, 500072</p>
            </div>
            <div class="contact-box" data-animation="fadeInDown">
                <span class="contact-box-icon"><i class="far fa-envelope" aria-hidden="true"></i></span>
                <h5>Email Us</h5>
                <p><a href="mailto:<?php echo CONTACT_EMAIL; ?>"><?php echo CONTACT_EMAIL; ?></a></p>
            </div>
            <div class="contact-box" data-animation="fadeInRight">
                <span class="contact-box-icon"><i class="fas fa-phone-alt" aria-hidden="true"></i></span>
                <h5>Call Us</h5>
                <p>
                    MD - <a href="tel:<?php echo CONTACT_MD; ?>"><?php echo CONTACT_MD; ?></a><br>
                    Director - <a href="tel:<?php echo CONTACT_DIRECTOR; ?>"><?php echo CONTACT_DIRECTOR; ?></a><br>
                    Office - <a href="tel:<?php echo CONTACT_OFFICE; ?>"><?php echo CONTACT_OFFICE; ?></a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Message form -->
<section class="contact-form-section">
    <div class="container">
        <div class="contact-form-card" data-animation="fadeInRight">
            <h2>Send us a message</h2>
            <p class="contact-form-lead">Share your requirements below, and our technical team will get back to you with expert guidance and tailored support.</p>

            <?php if ($status === 'success'): ?>
                <div class="form-alert form-alert--success">Thank you for reaching out! Your message has been sent and our team will get back to you shortly.</div>
            <?php elseif ($status === 'error'): ?>
                <div class="form-alert form-alert--error">Sorry, something went wrong. Please check your details and try again.</div>
            <?php endif; ?>

            <form action="handlers/contact-form.php" method="POST" data-validate>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">First Name <span class="req">*</span></label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Email Address <span class="req">*</span></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone Number <span class="req">*</span></label>
                        <input type="tel" name="phone" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="5" maxlength="180"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">SUBMIT</button>
                <div class="form-message"></div>
            </form>
        </div>
    </div>
</section>

<!-- Map -->
<section class="contact-map-section" data-animation="fadeIn">
    <div class="contact-map">
        <iframe
            src="https://maps.google.com/maps?q=MIG%20187%2C%20Opp.%20City%20Union%20Bank%2C%20Road%20No.1%2C%20KPHB%20Colony&t=m&z=14&output=embed&iwloc=near"
            title="MIG 187, Opp. City Union Bank, Road No.1, KPHB Colony"
            aria-label="Nani Transformers location"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</section>

<?php
require_once 'includes/footer.php';
require_once 'includes/scripts.php';
?>
