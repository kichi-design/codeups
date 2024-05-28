<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-sp.jpg" alt="ダイビング" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Site MAP</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<div class="page-sitemap layout-page--sitemap">
    <div class="page-sitemap__inner inner">
    <div class="page-sitemap__content">
        <div class="page-sitemap__nav sitemap-nav">
        <ul class="sitemap-nav__items">
            <li class="sitemap-nav__item"><a class="sitemap-nav__title" href="<?php echo get_post_type_archive_link('campaign'); ?>">キャンペーン</a>
            <ul class="sitemap-nav__subitems">
                <li class="sitemap-nav__subitem"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_license', get_post_type_archive_link('campaign'))); ?>">ライセンス取得</a></li>
                <li class="sitemap-nav__subitem"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_trial', get_post_type_archive_link('campaign'))); ?>">貸切体験ダイビング</a></li>
                <li class="sitemap-nav__subitem"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_fun', get_post_type_archive_link('campaign'))); ?>">ナイトダイビング</a></li>
            </ul>
            </li>
            <li class="sitemap-nav__item sitemap-nav__item--adjustment"><a class="sitemap-nav__title"
                href="<?php echo get_permalink(get_page_by_path('about-us')->ID); ?>">私たちについて</a></li>
        </ul>
        <ul class="sitemap-nav__items">
            <li class="sitemap-nav__item sitemap-nav__item--information"><a class="sitemap-nav__title"
                href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>">ダイビング情報</a>
            <ul class="sitemap-nav__subitems">
                <li class="sitemap-nav__subitem"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=license-course"">ライセンス講習</a></li>
                <li class="sitemap-nav__subitem"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=experience-diving">体験ダイビング</a></li>
                <li class="sitemap-nav__subitem"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=fun-diving">ファンダイビング</a></li>
            </ul>
            </li>
            <li class="sitemap-nav__item sitemap-nav__item--adjustment"><a class="sitemap-nav__title" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">ブログ</a>
            </li>
        </ul>
        </div>
        <div class="page-sitemap__nav sitemap-nav">
        <ul class="sitemap-nav__items">
            <li class="sitemap-nav__item"><a class="sitemap-nav__title" href="<?php echo get_post_type_archive_link('voice'); ?>">お客様の声</a></li>
            <li class="sitemap-nav__item sitemap-nav__item--adjustment"><a class="sitemap-nav__title"
                href="<?php echo get_permalink(get_page_by_path('price')->ID); ?>">料金一覧</a>
            <ul class="sitemap-nav__subitems">
                <li class="sitemap-nav__subitem"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#license-course'); ?>">ライセンス講習</a></li>
                <li class="sitemap-nav__subitem"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#trial-diving'); ?>">体験ダイビング</a></li>
                <li class="sitemap-nav__subitem"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#fun-diving'); ?>">ファンダイビング</a></li>
                <li class="sitemap-nav__subitem"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#special-diving'); ?>">スペシャルダイビング</a></li>
            </ul>
            </li>
        </ul>
        <ul class="sitemap-nav__items">
            <li class="sitemap-nav__item sitemap-nav__item--faq"><a class="sitemap-nav__title" href="<?php echo get_permalink(get_page_by_path('faq')->ID); ?>">よくある質問</a>
            </li>
            <li class="sitemap-nav__item sitemap-nav__item--adjustment"><a class="sitemap-nav__title"
                href="<?php echo esc_url(get_permalink(get_page_by_path('privacypolicy'))); ?>">プライバシー<br class="display__sp">ポリシー</a></li>
            <li class="sitemap-nav__item sitemap-nav__item--adjustment"><a class="sitemap-nav__title"
                href="<?php echo esc_url(get_permalink(get_page_by_path('terms-of-service'))); ?>">利用規約</a></li>
            <li class="sitemap-nav__item sitemap-nav__item--adjustment"><a class="sitemap-nav__title"
                href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>">お問い合わせ</a></li>
            <li class="sitemap-nav__item sitemap-nav__item--adjustment"><a class="sitemap-nav__title"
                href="<?php echo get_permalink(get_page_by_path('sitemap')->ID); ?>">サイトマップ</a></li>
                
        </ul>
        </div>
    </div>
    </div>
</div>

<?php get_footer(); ?>