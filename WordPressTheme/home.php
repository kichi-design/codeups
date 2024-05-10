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
        <aside class="blog-column__sidebar sidebar">
        <!-- 人気記事 -->
        <div class="sidebar__contents sidebar-contents">
            <div class="sidebar-contents__header sidebar-header">
            <h2 class="sidebar-header__title">人気記事</h2>
            </div>
            <!-- <div class="sidebar-contents__wrapper">
            <div class="sidebar-contents__popular-body">
                <div class="sidebar-contents__popular-image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/blog-card4.jpg" alt="魚" decoding="async">
                </div>
                <div class="sidebar-contents__popular-head">
                <time class="sidebar-contents__popular-date" datetime="2023-11-17">2023.11/17</time>
                <h3 class="sidebar-contents__popular-title">ライセンス取得</h3>
                </div>
            </div>
            </div> -->
            <?php get_top_viewed_posts(); ?>
        </div>

        <!-- 口コミ -->
        <div class="sidebar__contents sidebar-contents">
    <div class="sidebar-contents__header sidebar-header">
        <h2 class="sidebar-header__title">口コミ</h2>
    </div>
    <div class="sidebar-contents__wrapper">
        <?php
        $args = array(
            'post_type' => 'voice', // カスタム投稿タイプのスラッグ
            'posts_per_page' => 1, // 表示する投稿数
            'orderby' => 'date', // 日付で並び替え
            'order' => 'DESC' // 降順で表示
        );

        $the_query = new WP_Query($args);

        if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
                $the_query->the_post();
                // ACFプラグインを使ってカスタムフィールド 'voice_1' の値を取得
                $voice_1_value = get_field('voice_1');
                ?>
                <div class="sidebar-contents__review-body">
                    <div class="sidebar-contents__review-image">
                        <!-- 投稿に設定されているアイキャッチ画像を表示 -->
                        <?php if (has_post_thumbnail()) : ?>
                            <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" decoding="async">
                        <?php endif; ?>
                    </div>
                    <p class="sidebar-contents__review-age"><?php echo esc_html($voice_1_value); ?></p>
                    <h3 class="sidebar-contents__review-title"><?php the_title(); ?></h3>
                    <div class="sidebar-contents__review-button">
                        <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="button">
                            <span>View more</span>
                        </a>
                    </div>
                </div>
                <?php
            }
            wp_reset_postdata();
        } else {
            echo '<p>お客様の声がありません。</p>';
        }
        ?>
    </div>
</div>
        <!-- キャンペーン -->
<div class="sidebar__contents sidebar-contents">
    <div class="sidebar-contents__header sidebar-header">
        <h2 class="sidebar-header__title">キャンペーン</h2>
    </div>
    <?php
    $args = array(
        'post_type' => 'campaign', // カスタム投稿タイプのスラッグ
        'posts_per_page' => 2, // 表示する投稿数
        'orderby' => 'date', // 日付で並び替え
        'order' => 'DESC' // 降順で表示
    );
    $campaign_query = new WP_Query($args);

    if ($campaign_query->have_posts()) {
        while ($campaign_query->have_posts()) {
            $campaign_query->the_post();
            ?>
            <a href="<?php the_permalink(); ?>" class="sidebar-contents__item sidebar-campaign-card">
                <div class="sidebar-campaign-card__image">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" decoding="async">
                    <?php endif; ?>
                </div>
                <div class="sidebar-campaign-card__wrapper">
                    <div class="sidebar-campaign-card__info">
                        <h3 class="sidebar-campaign-card__title"><?php the_title(); ?></h3>
                    </div>
                    <div class="sidebar-campaign-card__body">
                        <!-- ACFカスタムフィールドを利用した価格情報の表示 -->
                        <div class="sidebar-campaign-card__price-title">全部コミコミ(お一人様)</div>
                        <div class="sidebar-campaign-card__price">
                            <div class="sidebar-campaign-card__price-regular"><?php echo esc_html(get_field('campaign_0')); ?></div>
                            <div class="sidebar-campaign-card__price-discount"><?php echo esc_html(get_field('campaign_1')); ?></div>
                        </div>
                    </div>
                </div>
            </a>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<p>現在、キャンペーン情報はありません。</p>';
    }
    ?>
    <div class="sidebar-contents__campaign-button">
        <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="button">
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
            <?php
            global $wpdb;
            $years = $wpdb->get_col("SELECT DISTINCT YEAR(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");

            foreach($years as $year) : ?>
                <a href="<?php echo get_year_link($year); ?>" class="sidebar-contents__year"><?php echo $year; ?></a>
                <?php
                $months = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT MONTH(post_date) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND YEAR(post_date) = %d ORDER BY post_date DESC", $year));
                foreach($months as $month) : ?>
                    <a href="<?php echo get_month_link($year, $month); ?>" class="sidebar-contents__month"><?php echo date_i18n("F", mktime(0, 0, 0, $month, 1, $year)); ?></a>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>

        </aside>
    </div>
    </div>
</section>


<?php get_footer(); ?>