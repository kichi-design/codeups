<?php get_header(); ?>

<main>
<!-- fv -->
<div class="fv">
    <!-- Swiper -->
    <div class="swiper fv__swiper js-fv-swiper">
    <div class="fv__header">
        <h2 class="fv__title">DIVING</h2>
        <p class="fv__subtitle">into the ocean</p>
    </div>
    <div class="swiper-wrapper">
    <?php
    $fv_slider_list = SCF::get_option_meta('fv-option', 'fv-slider');
    if ( is_array( $fv_slider_list ) ) {
        $count = 0; // カウンターの初期化
        foreach ( $fv_slider_list as $fv_slider_list_field ) {
            if ( $count >= 4 ) break; // 4枚表示したらループを抜ける
            
            $image_id = $fv_slider_list_field['fvsliderimage']; // 画像フィールドから画像のIDを取得
            $image_url = wp_get_attachment_image_src( $image_id, 'full' ); // 画像のURLを取得
            if ( !empty($image_url) ) {
                ?>
                <div class="swiper-slide">
                    <div class="fv__img">
                        <img class="fv__img-01" src="<?php echo esc_url( $image_url[0] ); ?>" alt="スライダー画像" />
                    </div>
                </div>
                <?php
            }
            $count++; // カウンターをインクリメント
        }
    }
    ?>
    </div>
</div>

</div>

<!-- campaign -->
<section class="campaign top-campaign">
    <div class="inner campaign__inner">
    <div class="campaign__section-header section-header">
        <h2 class="section-header__title">Campaign</h2>
        <div class="section-header__subtitle">キャンペーン</div>
    </div>
    <div class="campaign__items">
        <!-- Swiper -->
        <div class="swiper campaign__swiper js-campaign-slider">
            <div class="swiper-wrapper">
                <?php
                $args = array(
                    'post_type' => 'campaign', // カスタムポストタイプのスラッグ
                    'posts_per_page' => 10 // 表示したい投稿の数
                );

                $campaign_query = new WP_Query($args);

                if ($campaign_query->have_posts()) : 
                    while ($campaign_query->have_posts()) : $campaign_query->the_post(); 
                ?>
                <div class="swiper-slide">
                    <div class="campaign__wrapper campaign-wrapper">
                        <a href="<?php the_permalink(); ?>" class="campaign-wrapper__item campaign-card">
                            <div class="campaign-card__image">
                            <?php if(get_the_post_thumbnail()): ?>
                            <img src="<?php the_post_thumbnail_url("full"); ?>" alt="<?php the_title(); ?>のアイキャッチ画像" decoding="async">
                            <?php endif; ?>
                            </div>
                            <div class="campaign-card__wrapper">
                                <div class="campaign-card__info">
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
                                    <h3 class="campaign-card__title"><?php the_title(); ?></h3>
                                </div>
                                <div class="campaign-card__body">
                                    <div class="campaign-card__price-title">全部コミコミ(お一人様)</div>
                                    <div class="campaign-card__price">
                                        <?php if(get_field( 'campaign_0' )): ?>
                                        <p class="campaign-card__price-regular"><?php the_field('campaign_0'); ?></p>
                                        <?php endif; ?>
                                        <?php if(get_field( 'campaign_1' )): ?>
                                        <p class="campaign-card__price-discount"><?php the_field('campaign_1'); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
                    endwhile;
                    wp_reset_postdata(); // メインクエリのリセット
                endif;
                ?>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
        <div class="campaign__button">
        <a href="<?php echo get_post_type_archive_link('campaign'); ?>" class="button">
            <span>View more</span>
        </a>
        </div>
    </div>
</section>

<!-- about -->
<section class="about top-about">
    <div class="inner about__inner">
    <div class="about__section-header section-header">
        <h2 class="section-header__title">About us</h2>
        <div class="section-header__subtitle">私たちについて</div>
    </div>
    <div class="about__bg">
        <div class="about__bg-right">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean2.jpg" alt="魚" decoding="async">
        </div>
        <div class="about__bg-left">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean1.jpg" alt="シーサー" decoding="async">
        </div>
    </div>
    <div class="about__container">
        <div class="about__title">
        Dive into <br class="display-sp">the Ocean
        </div>
        <div class="about__body">
        <p class="about__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入りま
        </p>
        <div class="about__button">
            <a href="<?php echo get_permalink(get_page_by_path('about-us')->ID); ?>" class="button">
            <span>View more</span>
            </a>
        </div>
        </div>
    </div>
    </div>
</section>

<!-- information -->
<section class="information top-information">
    <div class="inner information__inner">
    <div class="information__section-header section-header">
        <h2 class="section-header__title">Information</h2>
        <div class="section-header__subtitle">ダイビング情報</div>
    </div>
    <div class="information__wrapper">
        <div class="information__image colorbox">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/ocean3.jpg" alt="魚" decoding="async">
        </div>
        <div class="information__body">
        <h3 class="information__title">ライセンス講習</h3>
        <p class="information__text">
            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br>
            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
        </p>
        <div class="information__button">
            <a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>" class="button">
            <span>View more</span>
            </a>
        </div>
        </div>
    </div>
    </div>
</section>

<!-- blog -->
<section class="blog top-blog">
    <div class="inner blog__inner">
    <div class="blog__section-header section-header">
        <h2 class="section-header__title section-header__title--pc-white">Blog</h2>
        <div class="section-header__subtitle section-header__subtitle--pc-white">ブログ</div>
    </div>
    <div class="blog__items blog-cards">
        <?php
        $args = array(
            'post_type' => 'post', // 投稿タイプを指定
            'posts_per_page' => 3 // 表示する投稿数
        );

        $latest_posts_query = new WP_Query($args);

        if ($latest_posts_query->have_posts()) : 
            while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
        ?>
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
        <?php
            endwhile;
            wp_reset_postdata(); // メインクエリのリセット
        else : 
            echo '<p>No posts found.</p>';
        endif;
        ?>
    </div>
    <div class="blog__button">
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="button">
        <span>View more</span>
        </a>
    </div>
    </div>
</section>

<!-- voice -->
<section class="voice top-voice">
    <div class="inner voice__inner">
    <div class="voice__section-header section-header">
        <h2 class="section-header__title">Voice</h2>
        <div class="section-header__subtitle">お客様の声</div>
    </div>
    <div class="voice__items voice-cards">
    <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'voice',
                'posts_per_page' => 2,
                'paged' => $paged,
            ];
            if (!empty(get_query_var('term'))) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'voice_category',
                        'field'    => 'slug',
                        'terms'    => get_query_var('term'),
                    ],
                ];
            }

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
                ?>

        <a href="<?php the_permalink(); ?>" class="voice-cards__item voice-card">
            <div class="voice-card__header">
                <div class="voice-card__header-title">
                    <div class="voice-card__info">
                        <?php if(get_field('voice_1')): ?>
                            <p class="voice-card__agegender"><?php the_field('voice_1'); ?></p>
                        <?php endif; ?>
                        <?php
                        $terms = get_the_terms(get_the_ID(), 'voice_category');
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
                    <?php if(has_post_thumbnail()): ?>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" decoding="async">
                    <?php endif; ?>
                </div>
            </div>
            <p class="voice-card__text">
            <?php the_content(); ?>
            </p>
        </a>
        <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<li>該当する投稿が見つかりません。</li>';
            endif;
            ?>
    </div>
    <div class="voice__button">
        <a href="<?php echo get_post_type_archive_link('voice'); ?>" class="button">
        <span>View more</span>
        </a>
    </div>
    </div>
</section>

<!--price -->
<section class="price top-price">
    <div class="inner price__inner">
    <div class="price__section-header section-header">
        <h2 class="section-header__title">Price</h2>
        <div class="section-header__subtitle">料金一覧</div>
    </div>
    <div class="price__container">
    <div class="price__items">
        <?php
        $course_types = [
            'license' => 'ライセンス講習',
            'trial' => '体験ダイビング',
            'fun' => 'ファンダイビング',
            'special' => 'スペシャルダイビング'
        ];
        foreach ($course_types as $type_key => $type_name) {
            $course_data = SCF::get_option_meta('price-option', "price-{$type_key}");
            if (!empty($course_data)) {
                ?>
                <div class="price__item price-card">
                    <h3 class="price-card__title"><?php echo esc_html($type_name); ?></h3>
                    <dl class="price-card__body">
                        <?php foreach ($course_data as $course): ?>
                        <div class="price-card__text">
                            <dt><?php echo esc_html($course["{$type_key}-course"]); ?></dt>
                            <dd><?php echo esc_html($course["{$type_key}-text"]); ?></dd>
                        </div>
                        <?php endforeach; ?>
                    </dl>
                </div>
                <?php
            }
        }
        ?>
    </div>
    <div class="price__image colorbox">
        <picture>
            <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/price1.jpg">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/price2.jpg" alt="ウミガメ" decoding="async">
        </picture>
    </div>
</div>

    <div class="price__button">
        <a href="<?php echo get_permalink(get_page_by_path('price')->ID); ?>" class="button">
        <span>View more</span>
        </a>
    </div>
    </div>
</section>

</main>

<?php get_footer(); ?>