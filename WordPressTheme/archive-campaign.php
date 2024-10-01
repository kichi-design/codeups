<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-campaign-mv.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-campaign-mv-sp.jpg" alt="魚" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Campaign</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>
<!-- IDはタブ切り替え時にページの特定の位置に移動させるため -->
<section class="page-campaign layout-page" id="campaign-tabs">
    <div class="inner">
        <!-- タブ生成: campaign_category タクソノミーに属する全てのタームを取得し、それぞれのタームに対してナビゲーションタブを生成します。 -->
        <!-- リンク生成: 各タームのリンクは get_term_link($term) 関数によって生成されます。この関数は指定されたタームのアーカイブページへのURLを返します。このURLは taxonomy-campaign_category.php テンプレートを使用する条件にマッチするため、クリックするとそのタームに基づいたページに遷移します。 -->
        <ul class="page-campaign__tab tabs">
            <li class="tabs__item <?php if (!is_tax('campaign_category')) echo 'active'; ?>">
                <a href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">ALL</a>
            </li>
            <?php
            $terms = get_terms([
                'taxonomy' => 'campaign_category',
                'hide_empty' => false,
            ]);
            $queried_object = get_queried_object();

            foreach ($terms as $term) {
                $class = ($queried_object instanceof WP_Term && $term->term_id === $queried_object->term_id) ? 'active' : '';
                ?>
                <li class="tabs__item <?php echo $class; ?>">
                    <a href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
        <div class="page-campaign__area tab-area">
            <ul class="tab-area__items">
            <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
                <li class="tab-area__item">
                    <div class="tab-area__wrapper campaign-wrapper">
                        <div class="campaign-wrapper__item campaign-card">
                            <div class="campaign-card__image">
                                <?php if ( has_post_thumbnail() ): ?>
                                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>のアイキャッチ画像" decoding="async">
                                <?php endif; ?>
                            </div>
                            <div class="campaign-card__wrapper campaign-card__wrapper--page-campaign">
                                <div class="campaign-card__info campaign-card__info--page-campaign">
                                    <?php
                                    $terms = get_the_terms(get_the_ID(), 'campaign_category');
                                    if ($terms && !is_wp_error($terms)) {
                                        foreach ($terms as $term) { ?>
                                            <div class="campaign-card__tag">
                                                <?php echo esc_html($term->name); ?>
                                            </div>
                                        <?php }
                                    }
                                    ?>
                                    <h3 class="campaign-card__title campaign-card__title--campaign-card-pc"><?php the_title(); ?></h3>
                                </div>
                                <div class="campaign-card__body campaign-card__body--page-campaign">
                                    <p class="campaign-card__price-title">全部コミコミ(お一人様)</p>
                                    <div class="campaign-card__price">
                                        <?php if (get_field('campaign_0')): ?>
                                            <p class="campaign-card__price-regular campaign-card__price-regular--page-campaign"><?php the_field('campaign_0'); ?></p>
                                        <?php endif; ?>
                                        <?php if (get_field('campaign_1')): ?>
                                            <p class="campaign-card__price-discount campaign-card__price-discount--page-campaign"><?php the_field('campaign_1'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                    <div class="campaign-card__pc u-desktop">
                                        <p class="campaign-card__text">
                                            <?php if (get_field('campaign_2')): ?>
                                                <?php the_field('campaign_2'); ?>
                                            <?php endif; ?>
                                        </p>
                                        <?php if (get_field('campaign_3')): ?>
                                            <p class="campaign-card__time"><?php the_field('campaign_3'); ?></p>
                                        <?php endif; ?>
                                        <p class="campaign-card__info-text">ご予約・お問い合わせはコチラ</p>
                                        <div class="campaign-card__button">
                                            <a href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>" class="button">
                                                <span>Contact us</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile; ?>
            <?php else : ?>
                <li>該当する投稿が見つかりません。</li>
            <?php endif; ?>
            </ul>
        </div>

        <!-- ページネーション -->
        <div class="blog-column__pagination">
        <?php wp_pagenavi(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>