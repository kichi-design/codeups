<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-about-pc-mv.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-about-sp-mv.jpg" alt="魚" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">About us</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<div class="page-about layout-page">
    <div class="inner">
    <div class="page-about__bg">
        <div class="page-about__bg-right">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2.jpg" alt="魚" decoding="async">
        </div>
        <div class="page-about__bg-left">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1.jpg" alt="シーサー" decoding="async">
        </div>
    </div>
    <div class="page-about__container">
        <div class="page-about__title">
        Dive into <br class="display-sp">the Ocean
        </div>
        <div class="page-about__body">
        <p class="page-about__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
        </p>
        </div>
    </div>
    </div>
</div>

<!--  ギャラリー    -->
<section class="page-about-gallery layoout-page-about-gallery">
    <div class="inner page-about-gallery__inner">
    <div class="page-about-gallery__section-header section-header">
        <h2 class="section-header__title">Gallery</h2>
        <div class="section-header__subtitle">フォト</div>
    </div>
    <div class="modal-window-image"></div>
    <div class="page-about-gallery__container gallery">



    <?php
$gallerys = SCF::get('about_us_gallery');
foreach ($gallerys as $gallery) {
    $gallery_picture = wp_get_attachment_image_src($gallery['gallery_picture'], 'medium');
    if ($gallery_picture) {
        $gallery_picture_url = esc_url($gallery_picture[0]);
?>
        <div class="gallery__item">
            <img src="<?php echo $gallery_picture_url; ?>" decoding="async" alt="">
        </div>
<?php
    }
}
?>


        



    </div>
    </div>
</section>

<?php get_footer(); ?>