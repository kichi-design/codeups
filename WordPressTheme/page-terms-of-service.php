<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/privacypolicy-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/privacypolicy-sp.jpg" alt="海" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Terms of Service</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<div class="page-privacypolicy layout-page">
    <div class="inner">
        <div class="page-privacypolicy__inner">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; endif; ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>