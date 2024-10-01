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

<section class="page-blog layout-page">
    <div class="inner">
        <!-- ２カラム -->
        <div class="page-blog__container blog-column">
            <!-- ２カラムのメイン -->
            <div class="blog-column__main">
                <div class="blog-column__cards blog-cards blog-cards--2col">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <a href="<?php the_permalink(); ?>" class="blog-cards__item blog-card">
                        <div class="blog-card__image">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" decoding="async">
                            <?php else: ?>
                                <!-- アイキャッチ画像が設定されていない場合のデフォルト画像 -->
                                <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/images/common/default-image.jpg" alt="デフォルト画像" decoding="async">
                            <?php endif; ?>
                        </div>

                            <div class="blog-card__body">
                                <time class="blog-card__date" datetime="<?php the_time( 'c' );?>"><?php the_time('Y.m.d'); ?></time>
                                <h3 class="blog-card__title"><?php the_title(); ?></h3>
                                <div class="blog-card__text">
                                <?php echo wp_trim_words(get_the_content(), 70, '...'); ?>
                                </div>
                            </div>
                        </a>
                    <?php endwhile; endif; ?>
                </div>
                <!-- ページネーション -->
                <div class="blog-column__pagination">
                <?php wp_pagenavi(); ?>
                </div>
            </div>
            <!-- ２カラムのサイドバー -->
            <?php get_sidebar(); ?>
        </div>
    </div>
</section>


<?php get_footer(); ?>