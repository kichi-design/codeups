<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-sp.jpg" alt="海" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Contact</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>
<div class="page-contact layout-page">
    <div class="page-contact__inner inner">
      <div class="page-contact__content contact-form">
        <div class="page-contact__form-error js-error">
          <p>※必須項目が入力されていません。<br class="u-mobile">入力してください。</p>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <?php echo do_shortcode('[contact-form-7 id="1ce0f08" title="お問い合わせ"]'); ?>
        <?php endwhile; endif; ?>

      </div>
    </div>
  </div>


<?php get_footer(); ?>