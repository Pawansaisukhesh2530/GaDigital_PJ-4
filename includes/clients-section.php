<?php
/**
 * Shared clients strip for inner pages.
 *
 * The homepage uses the full Swiper carousel (arrows + dots) to match
 * the original widget exactly. Inner pages use this CSS-only marquee so
 * they don't have to pull in Swiper just for a logo strip.
 *
 * The track is duplicated once because the keyframe translates -50%.
 */
$logos = getClientLogos();
?>
<section class="clients-section">
    <div class="container">
        <div class="clients-header">
            <span class="icon-bolt icon-bolt--red">
                <svg aria-hidden="true" viewBox="0 0 320 512" xmlns="http://www.w3.org/2000/svg"><path d="M296 160H180.6l42.6-129.8C227.2 15 215.7 0 200 0H56C44 0 33.8 8.9 32.2 20.8l-32 240C-1.7 275.2 9.5 288 24 288h118.7L96.6 482.5c-3.6 15.2 8 29.5 23.3 29.5 8.4 0 16.4-4.4 20.8-12l176-304c9.3-15.9-2.2-36-20.7-36z"/></svg>
            </span>
            <h2>Our Clients</h2>
        </div>

        <div class="clients-carousel">
            <div class="clients-track">
                <?php foreach ($logos as $logo): ?>
                    <div class="client-logo">
                        <img src="<?php echo ASSETS_PATH; ?>/images/clients/<?php echo $logo; ?>" alt="Client logo" loading="lazy" decoding="async">
                    </div>
                <?php endforeach; ?>
                <?php // duplicate set so the -50% loop is seamless ?>
                <?php foreach ($logos as $logo): ?>
                    <div class="client-logo" aria-hidden="true">
                        <img src="<?php echo ASSETS_PATH; ?>/images/clients/<?php echo $logo; ?>" alt="" loading="lazy" decoding="async">
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
