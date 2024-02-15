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
            <img class="single-body__image" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/no-image.jpg" alt="<?php the_title(); ?>のアイキャッチ画像" decoding="async">
            <?php endif; ?>
            <div class="single-body__content">
            <?php the_content(); ?>
            </div>
            </div>
            <!-- ページネーション -->
            <div class="blog-column__pagination">
            <?php wp_pagenavi(); ?>
            </div>
        </div>
        </div>
        <!-- ２カラムのサイドバー -->
        <aside class="blog-column__sidebar sidebar">
        <!-- 人気記事 -->
        <div class="sidebar__contents sidebar-contents">
            <div class="sidebar-contents__header sidebar-header">
            <h2 class="sidebar-header__title">人気記事</h2>
            </div>
            <div class="sidebar-contents__wrapper">
            <div class="sidebar-contents__popular-body">
                <div class="sidebar-contents__popular-image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-card4.jpg" alt="魚" decoding="async">
                </div>
                <div class="sidebar-contents__popular-head">
                <time class="sidebar-contents__popular-date" datetime="2023-11-17">2023.11/17</time>
                <h3 class="sidebar-contents__popular-title">ライセンス取得</h3>
                </div>
            </div>
            </div>
            <div class="sidebar-contents__wrapper">
            <div class="sidebar-contents__popular-body">
                <div class="sidebar-contents__popular-image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-card2.jpg" alt="海亀" decoding="async">
                </div>
                <div class="sidebar-contents__popular-head">
                <time class="sidebar-contents__popular-date" datetime="2023-11-17">2023.11/17</time>
                <h3 class="sidebar-contents__popular-title">ウミガメと泳ぐ</h3>
                </div>
            </div>
            </div>
            <div class="sidebar-contents__wrapper">
            <div class="sidebar-contents__popular-body">
                <div class="sidebar-contents__popular-image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-card3.jpg" alt="カクレクマノミ" decoding="async">
                </div>
                <div class="sidebar-contents__popular-head">
                <time class="sidebar-contents__popular-date" datetime="2023-11-17">2023.11/17</time>
                <h3 class="sidebar-contents__popular-title">カクレクマノミ</h3>
                </div>
            </div>
            </div>
        </div>
        <!-- 口コミ -->
        <div class="sidebar__contents sidebar-contents">
            <div class="sidebar-contents__header sidebar-header">
            <h2 class="sidebar-header__title">口コミ</h2>
            </div>
            <div class="sidebar-contents__wrapper">
            <div class="sidebar-contents__review-body">
                <div class="sidebar-contents__review-image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/side-review.jpg" alt="カップル" decoding="async">
                </div>
                <p class="sidebar-contents__review-age">30代(カップル)</p>
                <h3 class="sidebar-contents__review-title">ここにタイトルが入ります。ここにタイトル</h3>
                <div class="sidebar-contents__review-button">
                <a href="#" class="button">
                    <span>View more</span>
                </a>
                </div>
            </div>
            </div>
        </div>
        <!-- キャンペーン -->
        <div class="sidebar__contents sidebar-contents">
            <div class="sidebar-contents__header sidebar-header">
            <h2 class="sidebar-header__title">キャンペーン</h2>
            </div>
            <a href="#" class="sidebar-contents__item sidebar-campaign-card">
            <div class="sidebar-campaign-card__image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign1.jpg" alt="ライセンス講習" decoding="async">
            </div>
            <div class="sidebar-campaign-card__wrapper">
                <div class="sidebar-campaign-card__info">
                <h3 class="sidebar-campaign-card__title">ライセンス取得</h3>
                </div>
                <div class="sidebar-campaign-card__body">
                <div class="sidebar-campaign-card__price-title">全部コミコミ(お一人様)</div>
                <div class="sidebar-campaign-card__price">
                    <div class="sidebar-campaign-card__price-regular">¥56,000</div>
                    <div class="sidebar-campaign-card__price-discount">¥46,000</div>
                </div>
                </div>
            </div>
            </a>
            <a href="#" class="sidebar-contents__item sidebar-campaign-card">
            <div class="sidebar-campaign-card__image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/campaign2.jpg" alt="ライセンス講習" decoding="async">
            </div>
            <div class="sidebar-campaign-card__wrapper">
                <div class="sidebar-campaign-card__info">
                <h3 class="sidebar-campaign-card__title">貸切体験ダイビング</h3>
                </div>
                <div class="sidebar-campaign-card__body">
                <div class="sidebar-campaign-card__price-title">全部コミコミ(お一人様)</div>
                <div class="sidebar-campaign-card__price">
                    <div class="sidebar-campaign-card__price-regular">¥24,000</div>
                    <div class="sidebar-campaign-card__price-discount">¥18,000</div>
                </div>
                </div>
            </div>
            </a>
            <div class="sidebar-contents__campaign-button">
            <a href="#" class="button">
                <span>View more</span>
            </a>
            </div>
        </div>
        <!-- アーカイブ -->
        <div class="sidebar__contents sidebar-contents">
            <div class="sidebar-contents__header sidebar-header">
            <h2 class="sidebar-header__title">アーカイブ</h2>
            </div>
            <div class="sidebar-contents__archive">
            <a href="" class="sidebar-contents__year">2023</a>
            <a href="" class="sidebar-contents__month">3月</a>
            <a href="" class="sidebar-contents__month">2月</a>
            <a href="" class="sidebar-contents__month">1月</a>
            <a href="" class="sidebar-contents__year sidebar-contents__year--right">2022</a>
            </div>
        </div>
        </aside>

    </div>
    </div>
</section>
<?php endwhile; endif; ?>

<?php get_footer(); ?>