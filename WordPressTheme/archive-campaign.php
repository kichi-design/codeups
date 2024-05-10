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
        <ul class="page-campaign__tab tabs">
        <li class="tabs__item <?php if(empty(get_query_var('term'))) echo 'active'; ?>"><a href="<?php echo esc_url(get_post_type_archive_link('campaign') . '#campaign-tabs'); ?>">ALL</a></li>

            <?php
            // カスタムタクソノミー 'campaign_category' のタームを取得
            $terms = get_terms([
                'taxonomy' => 'campaign_category',
                'hide_empty' => false, // 空のタームを含む
            ]);

            // 各タームに対するリンクを生成
            $selected_term_slug = get_query_var('term', '');
            foreach ($terms as $term) {
                // 選択されたタームに基づいて `active` クラスを付与
                $active_class = $term->slug == $selected_term_slug ? 'active' : '';
                echo '<li class="tabs__item ' . $active_class . '"><a href="' . esc_url(add_query_arg('term', $term->slug, get_post_type_archive_link('campaign') . '#campaign-tabs')) . '">' . esc_html($term->name) . '</a></li>';
            }
            ?>
        </ul>

        <div class="page-campaign__area tab-area">
            <ul class="tab-area__items">
                <?php
                // 選択されたタームに基づいてコンテンツを表示
                $selected_term_slug = get_query_var('term', '');

                if (!empty($selected_term_slug)) {
                    $args = [
                        'post_type' => 'campaign',
                        'tax_query' => [
                            [
                                'taxonomy' => 'campaign_category',
                                'field'    => 'slug',
                                'terms'    => $selected_term_slug,
                            ],
                        ],
                    ];
                } else {
                    // タームが選択されていない場合は、全ての投稿を表示
                    $args = [
                        'post_type' => 'campaign',
                        'posts_per_page' => -1,
                    ];
                }

                $query = new WP_Query($args);

                if ($query->have_posts()) : 
                    while ($query->have_posts()) : $query->the_post();
                        ?>
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
                    <?php
                    // タクソノミが選択された投稿に関連するタームを取得
                    $terms = get_the_terms(get_the_ID(), 'campaign_category');

                    // タームが存在する場合、その名前を使用してHTMLを生成し、ブラウザに表示
                    if ($terms && !is_wp_error($terms)) {
                        foreach ($terms as $term) {
                            echo '<div class="campaign-card__tag">' . esc_html($term->name) . '</div>';
                        }
                    }
                    ?>
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
                        <p class="campaign-card__info-text">ご予約・お問い合わせはコチラ</p>
                        <div class="campaign-card__button">
                            <a href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>" class="button">
                                <span>Contact us</span>
                            </a>
                        </div>

                        <!-- <?php if(get_field( 'campaign_4' )): ?>
                        <p class="campaign-card__info-text">ご予約・お問い合わせはコチラ</p>
                        <div class="campaign-card__button">
                            <a href="<?php echo esc_url(get_field('campaign_4')); ?>" class="button" target="_blank">
                                <span>Contact us</span>
                            </a>
                        </div>
                        <?php endif; ?> -->
                        </div>
                    </div>
                    </div>

                                </div>
                            </div>
                        </li>
                        <?php
                    endwhile;
                else :
                    echo '<li>該当する投稿が見つかりません。</li>';
                endif;

                wp_reset_postdata();
                ?>
            </ul>
        </div>
        <!-- ページネーション -->
        <div class="blog-column__pagination">
        <?php wp_pagenavi(); ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>