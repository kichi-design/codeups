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

<section class="page-voice layout-page" id="voice-tabs">
    <div class="inner">
    <ul class="page-voice__tab tabs">
        <li class="tabs__item <?php if (!is_tax('voice_category')) echo 'active'; ?>"><a href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">ALL</a></li>
        <?php
        $terms = get_terms([
            'taxonomy' => 'voice_category',
            'hide_empty' => false,
        ]);
        $queried_object = get_queried_object();

        foreach ($terms as $term) {
            $class = ($queried_object instanceof WP_Term && $term->term_id === $queried_object->term_id) ? 'active' : '';
            echo "<li class='tabs__item {$class}'><a href='" . get_term_link($term) . "'>" . $term->name . "</a></li>";
        }
        ?>
    </ul>

        <div class="page-voice__area tab-area">
            <ul class="tab-area__item voice-cards">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li class="voice-cards__item voice-card">
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
                        <p class="voice-card__text"><?php the_content(); ?></p>
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