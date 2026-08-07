<?php
/**
 * Shared "Project Gallery" section for the PSI / OHE project pages.
 * Matches the original: a 3-up image slider with prev/next navigation,
 * pagination and autoplay (mirrors the EAE thumb-gallery on the live site).
 *
 * The including page must set $galleryImages (array of filenames in
 * assets/images/projects/gallery/). A default is used as a fallback.
 */
if (!isset($galleryImages) || empty($galleryImages)) {
    $galleryImages = [
        'Project-Img-18.jpg', 'Project-Img-11.jpg', 'Project-Img-12.jpg', 'Project-Img-13.jpg',
        'Project-Img-14.jpg', 'Project-Img-10.jpg', 'Project-Img-6.jpg', 'Project-Img-7.jpg',
        'Project-Img-8.jpg', 'Project-Img-9.jpg', 'Project-Img-10-1.jpg', 'Project-Img-5.jpg',
        'Project-Img-4.jpg', 'Project-Img-3.jpg', 'Project-Img-2.jpg', 'Project-Img-1.jpg',
    ];
}
$galleryBolt = '<svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>';
?>
<!-- ============ PROJECT GALLERY ============ -->
<section class="project-gallery">
    <div class="container">
        <div class="notable-header">
            <span class="icon-bolt icon-bolt--red"><?php echo $galleryBolt; ?></span>
            <h2>Project Gallery</h2>
        </div>

        <div class="swiper project-gallery-swiper">
            <div class="swiper-wrapper">
                <?php foreach ($galleryImages as $g): ?>
                <div class="swiper-slide">
                    <img src="<?php echo ASSETS_PATH; ?>/images/projects/gallery/<?php echo $g; ?>" alt="Project gallery image" loading="lazy" decoding="async">
                </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <button class="swiper-button-prev" type="button" aria-label="Previous"></button>
            <button class="swiper-button-next" type="button" aria-label="Next"></button>
        </div>
    </div>
</section>
