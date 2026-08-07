<?php
/**
 * Site Configuration
 * Nani Transformers - Static PHP Website
 */

// Never print PHP errors into pages or form responses (they would corrupt
// JSON output). Errors are still written to the server log.
ini_set('display_errors', '0');

// Session must be started before any output so CSRF tokens work on every page.
require_once __DIR__ . '/csrf.php';
csrf_start();

// Site Information
define('SITE_NAME', 'Nani Transformers');
define('SITE_TAGLINE', 'Powering Industries Since 1995');
define('SITE_URL', 'https://nanitransformers.com');

// Contact Information
define('CONTACT_EMAIL', 'nanitransformers@gmail.com');
define('CONTACT_OFFICE', '9666739333');
define('CONTACT_DIRECTOR', '9999792666');
define('CONTACT_MD', '9848093432');
define('WHATSAPP_DIRECTOR', '919999792666');
define('WHATSAPP_OFFICE', '919666739333');

// Address
define('ADDRESS', 'KPHB Colony, Kukatpally, Hyderabad');

// Social Media
// Leave empty to hide the icon. WhatsApp is live; the others need real
// profile URLs from the client before going live.
define('SOCIAL_FACEBOOK', '');
define('SOCIAL_LINKEDIN', '');
define('SOCIAL_TWITTER', '');
define('SOCIAL_WHATSAPP', 'https://wa.me/919999792666');

// Centralized company statistics (single source of truth).
// These values are displayed on Home, About, Projects and PSI pages.
define('STAT_YEARS', '30+');
define('STAT_PROJECTS_COMPLETED', '40+');
define('STAT_PROJECTS_ONGOING', '30');
define('STAT_CLIENTS_SERVED', '400+');
define('STAT_RAILWAY_DIVISIONS', '8');
define('STAT_STATES_REACHED', '10+');

// Paths
define('BASE_PATH', dirname(__DIR__));
define('INCLUDES_PATH', BASE_PATH . '/includes');
define('ASSETS_PATH', 'assets');
define('STORAGE_PATH', BASE_PATH . '/storage');
define('UPLOADS_PATH', BASE_PATH . '/uploads');
define('RESUMES_PATH', UPLOADS_PATH . '/resumes');

// Resume upload limits (bytes)
define('RESUME_MAX_SIZE', 5 * 1024 * 1024); // 5 MB
define('RESUME_ALLOWED_MIME', 'application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document');
define('RESUME_ALLOWED_EXT', 'pdf,doc,docx');

// Active Page Helper
function isActivePage($page) {
    $currentPage = basename($_SERVER['PHP_SELF'], '.php');
    return $currentPage === $page ? 'active' : '';
}

/**
 * Client logo filenames in the same order as the live carousel.
 * n11-* came from wp-content/uploads/2025/11, n12-* from 2025/12.
 * Single source of truth for the homepage carousel and the
 * shared clients strip used on inner pages.
 */
function getClientLogos() {
    $nov = [31, 30, 29, 28, 27, 26, 20, 21, 22, 23, 24, 25, 19, 18, 17, 16, 15, 14, 8, 9, 10, 11, 13, 7, 6, 5, 4, 1, 2];
    $dec = [2, 3, 4, 5, 7, 8, 9, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 10, 11, 6];

    $logos = [];
    foreach ($nov as $n) { $logos[] = 'n11-' . $n . '.jpg'; }
    foreach ($dec as $n) { $logos[] = 'n12-' . $n . '.jpg'; }

    return $logos;
}
