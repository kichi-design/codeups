<?php get_header(); ?>

<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-voice-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-voice-sp.jpg" alt="ダイビング" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Voice</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<section class="page-voice layout-page">
    <div class="inner">
        <ul class="page-voice__tab tabs">
            <li class="tabs__item"><a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">ALL</a></li>
                <?php
                // カスタムタクソノミー 'voice_category' のタームを取得
                $terms = get_terms([
                    'taxonomy' => 'voice_category',
                    'hide_empty' => false, // 空のタームを含む
                ]);

                // 各タームに対するリンクを生成
                foreach ($terms as $term) {
                    echo '<li class="tabs__item"><a href="' . esc_url(add_query_arg('term', $term->slug, get_post_type_archive_link('voice'))) . '">' . esc_html($term->name) . '</a></li>';
                }
                ?>
        </ul>

        <div class="page-voice__area tab-area">
            <ul class="tab-area__item voice-cards">
            <?php
            // 選択されたタームに基づいてコンテンツを表示
            $selected_term_slug = get_query_var('term', '');

            if (!empty($selected_term_slug)) {
                $args = [
                    'post_type' => 'voice',
                    'tax_query' => [
                        [
                            'taxonomy' => 'voice_category',
                            'field'    => 'slug',
                            'terms'    => $selected_term_slug,
                        ],
                    ],
                ];
            } else {
                // タームが選択されていない場合は、全ての投稿を表示
                $args = [
                    'post_type' => 'voice',
                    'posts_per_page' => -1,
                ];
            }

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>

                <li class="voice-cards__item voice-card">
                    <div class="voice-card__header">
                        <div class="voice-card__header-title">
                            <div class="voice-card__info">
                            <?php if(get_field( 'voice_1' )): ?>

                                <p class="voice-card__agegender"><?php the_field('voice_1'); ?></p>
                                <?php endif; ?>

                                <?php
                                // タクソノミが選択された投稿に関連するタームを取得
                                $terms = get_the_terms(get_the_ID(), 'voice_category');

                                // タームが存在する場合、その名前を使用してHTMLを生成し、ブラウザに表示
                                if ($terms && !is_wp_error($terms)) {
                                    foreach ($terms as $term) {
                                        echo '<div class="voice-card__tag">' . esc_html($term->name) . '</div>';
                                    }
                                }
                                ?>
                            </div>
                            <h3 class="voice-card__title"><?php the_title(); ?></h3>
                        </div>
                        <div class="voice-card__image colorbox">
                            <?php if(get_the_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php the_title(); ?>のアイキャッチ画像" decoding="async">
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="voice-card__text">
                    <?php the_content(); ?>
                    </p>
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