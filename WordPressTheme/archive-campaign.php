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

<section class="page-campaign layout-page">
    <div class="inner">
    <ul class="page-campaign__tab tabs">
        <li class="tabs__item active"><a href="#">ALL</a></li>
        <li class="tabs__item"><a href="#">ライセンス講習</a></li>
        <li class="tabs__item"><a href="#">ファンダイビング</a></li>
        <li class="tabs__item"><a href="#">体験ダイビング</a></li>
    </ul>

    <div class="page-campaign__area tab-area">
        <ul class="tab-area__items">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li class="tab-area__item">
                <div class="tab-area__wrapper campaign-wrapper">
                <div class="campaign-wrapper__item campaign-card">
                    <div class="campaign-card__image">
                        <?php if(get_the_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php the_title(); ?>のアイキャッチ画像" decoding="async">
                        <?php endif; ?>
                    </div>
                    <div class="campaign-card__wrapper campaign-card__wrapper--page-campaign">
                    <div class="campaign-card__info campaign-card__info--page-campaign">

                    <!-- 単数選択の場合 -->
                    <?php
                    // カスタムフィールド 'campaign_5' から選択されたタームを取得
                    $selected_term = get_field('campaign_5');

                    // タームが存在する場合、その名前を表示
                    if ($selected_term) {
                        echo '<div class="campaign-card__tag">' . esc_html($selected_term->name) . '</div>';
                    }
                    ?>
                    
                    <!-- 複数選択の場合<?php
                    // カスタムフィールド 'campaign_5' から選択された全てのタームを取得
                    $selected_terms = get_field('campaign_5');
                    // タームが存在する場合、それらの名前を表示
                    if ($selected_terms) {
                        foreach ($selected_terms as $term) {
                            echo '<div class="campaign-card__tag">' . esc_html($term->name) . '</div>';
                        }
                    }
                    ?> -->


                    <h3 class="campaign-card__title campaign-card__title--campaign-card-pc"><?php the_title(); ?></h3>
                    </div>
                    <div class="campaign-card__body campaign-card__body--page-campaign">
                        <p class="campaign-card__price-title">全部コミコミ(お一人様)</p>
                        <div class="campaign-card__price">
                        <?php if(get_field( 'campaign_0' )): ?>
                        <p class="campaign-card__price-regular campaign-card__price-regular--page-campaign"><?php the_field('campaign_0'); ?></p>
                        <?php endif; ?>
                        <?php if(get_field( 'campaign_1' )): ?>
                        <p class="campaign-card__price-discount campaign-card__price-discount--page-campaign"><?php the_field('campaign_1'); ?></p>
                        <?php endif; ?>
                        </div>
                        <div class="campaign-card__pc u-desktop">
                        <p class="campaign-card__text">
                        <?php if(get_field( 'campaign_2' )): ?>
                        <?php the_field('campaign_2'); ?>
                        <?php endif; ?>
                        </p>
                        <?php if(get_field( 'campaign_3' )): ?>
                        <p class="campaign-card__time"><?php the_field('campaign_3'); ?></p>
                        <?php endif; ?>
                        <?php if(get_field( 'campaign_4' )): ?>
                        <p class="campaign-card__info-text">ご予約・お問い合わせはコチラ</p>
                        <div class="campaign-card__button">
                            <a href="<?php echo esc_url(get_field('campaign_4')); ?>" class="button" target="_blank">
                                <span>Contact us</span>
                            </a>
                        </div>
                        <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </li>
            <?php endwhile; endif; ?>
        </ul>
    </div>

        <!-- ページネーション -->
        <div class="blog-column__pagination">
        <?php wp_pagenavi(); ?>
        </div>
        </div>
</section>

<?php get_footer(); ?>