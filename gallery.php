<?php
$pageTitle = 'Gallery';
$pageDescription = 'Watch videos of Nani Transformers manufacturing processes including Generator, Furnace, and Rectifier Transformers.';
require_once 'includes/head.php';
require_once 'includes/header.php';
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
            <div class="gallery-video-item" data-animation="fadeInUp">
                <video class="gallery-video" controls preload="metadata" controlslist="nodownload">
                    <source src="https://nanitransformers.com/wp-content/uploads/2025/11/Generator-Transformer.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="gallery-video-item" data-animation="fadeInUp">
                <video class="gallery-video" controls preload="metadata" controlslist="nodownload">
                    <source src="https://nanitransformers.com/wp-content/uploads/2025/11/Furnace-Transformer.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="gallery-video-item" data-animation="fadeInUp">
                <video class="gallery-video" controls preload="metadata" controlslist="nodownload">
                    <source src="https://nanitransformers.com/wp-content/uploads/2025/11/Rectifier-Transformer.mov" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section>

<?php
require_once 'includes/footer.php';
require_once 'includes/scripts.php';
?>
