<!-- ２カラムのサイドバー -->
<aside class="blog-column__sidebar sidebar">
    <!-- 人気記事 -->
    <div class="sidebar__contents sidebar-contents">
        <div class="sidebar-contents__header sidebar-header">
        <h2 class="sidebar-header__title">人気記事</h2>
        </div>
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