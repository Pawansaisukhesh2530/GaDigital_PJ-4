<?php
require_once 'includes/config.php';
$pageTitle = 'Gallery';
$pageDescription = 'Watch videos of Nani Transformers manufacturing processes including Generator, Furnace, and Rectifier Transformers.';
require_once 'includes/head.php';
require_once 'includes/header.php';

$videos = [
    ['src' => 'Generator-Transformer.mp4', 'title' => 'Generator Transformer manufacturing'],
    ['src' => 'Furnace-Transformer.mp4', 'title' => 'Furnace Transformer manufacturing'],
    ['src' => 'Rectifier-Transformer.mp4', 'title' => 'Rectifier Transformer manufacturing'],
];
?>

<!-- Page Banner -->
<section class="page-banner page-banner--gallery">
    <div class="container">
        <h1>Gallery</h1>
    </div>
</section>

<!-- Gallery Section - Videos -->
<section style="padding: 60px 0 80px;">
    <div class="container">
        <div class="gallery-video-grid">
            <?php foreach ($videos as $v): ?>
            <div class="gallery-video-item" data-animation="fadeInUp">
                <video class="gallery-video" controls playsinline preload="metadata" controlslist="nodownload" title="<?php echo $v['title']; ?>">
                    <source src="<?php echo ASSETS_PATH; ?>/videos/<?php echo $v['src']; ?>" type="video/mp4">
                    Your browser does not support the video tag. Download the clip: <a href="<?php echo ASSETS_PATH; ?>/videos/<?php echo $v['src']; ?>"><?php echo $v['src']; ?></a>
                </video>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
require_once 'includes/scripts.php';
?>
