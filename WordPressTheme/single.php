<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
        <picture>
            <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv-pc.jpg">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-mv-sp.jpg" alt="魚群" decoding="async">
        </picture>
    </div>
    <div class="sub-mv-header">
        <h1 class="sub-mv-header__title">Blog</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<section class="page-single page-single--detail layout-single">
    <div class="inner">
        <div class="page-single__container blog-column">
            <div class="blog-column__main">
                <!-- ２カラムのメイン -->
                <div class="blog-column__single single-main">
                    <div class="single-main__body single-body">
                        <time class="single-body__time" datetime="<?php the_time( 'c' );?>"><?php the_time('Y.m.d'); ?></time>
                        <h2 class="single-body__title"><?php the_title(); ?></h2>
                        <?php if(get_the_post_thumbnail()): ?>
                        <img class="single-body__image" src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php the_title(); ?>のアイキャッチ画像" decoding="async">
                        <?php else: ?>
                        <img class="single-body__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/default-image.jpg" alt="<?php the_title(); ?>のアイキャッチ画像" decoding="async">
                        <?php endif; ?>
                        <div class="single-body__content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <!-- ページネーション -->
                    <div class="blog-column__pagination">
                        <div class="wp-pagenavi">
                        <?php if (get_previous_post()): ?>
                            <a class="previouspostslink" href="<?php echo get_permalink(get_previous_post()->ID); ?>" rel="prev" aria-label="Previous post: <?php echo get_the_title(get_previous_post()); ?>">＜</a>
                        <?php endif; ?>
                        <?php if (get_next_post()): ?>
                            <a class="nextpostslink" href="<?php echo get_permalink(get_next_post()->ID); ?>" rel="next" aria-label="Next post: <?php echo get_the_title(get_next_post()); ?>">＞</a>
                        <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ２カラムのサイドバー -->
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>