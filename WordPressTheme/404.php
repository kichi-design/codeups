<?php get_header(); ?>

<!-- パンくず -->
<main>
<?php get_template_part('parts/breadcrumb') ?>


<div class="page-404 layout-page layout-page--404">
    <div class="inner">
    <div class="page-404__body">
        <p class="page-404__title">404</p>
        <p class="page-404__text">申し訳ありません。<br>お探しのページが見つかりません。</p>
        <div class="page-404__button">
        <a href="<?php echo esc_url(home_url()); ?>" class="button button--white">
            <span>Page TOP</span>
        </a>
        </div>
    </div>
    </div>
</div>
</main>

<?php get_footer(); ?>