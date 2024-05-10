<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="noindex">
<?php wp_head(); ?>
</head>
<body <?php body_class( is_404() ? 'bg-404' : '' ); ?>>
<header class="header js-header">
    <div class="header__inner">
    <h1 class="header__title">
        <a href="<?php echo esc_url(home_url()); ?>" class="header__logo">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps.svg" alt="ロゴ" decoding="async">
        </a>
    </h1>
    <button class="header__hamburger js-hamburger">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <!-- スマホナビ -->
    <nav class="header__sp-nav sp-nav js-drawer-menu">
        <div class="inner sp-nav__inner">
        <div class="sp-nav__container">
            <ul class="sp-nav__items">
            <li class="sp-nav__item sp-subnav"><a class="sp-nav__title" href="<?php echo get_post_type_archive_link('campaign'); ?>">キャンペーン</a>
                <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_license', get_post_type_archive_link('campaign'))); ?>">ライセンス取得</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_trial', get_post_type_archive_link('campaign'))); ?>">貸切体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_fun', get_post_type_archive_link('campaign'))); ?>">ナイトダイビング</a></li>
                </ul>
            </li>
            <li class="sp-nav__item sp-nav__item--about"><a class="sp-nav__title" href="<?php echo get_permalink(get_page_by_path('about-us')->ID); ?>">私たちについて</a></li>
            <li class="sp-nav__item sp-nav__item--information sp-subnav"><a class="sp-nav__title" href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>">ダイビング情報</a>
                <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=license-course">ライセンス講習</a></li>
                <li class="sp-subnav__item"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=experience-diving">体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=fun-diving">ファンダイビング</a></li>
                </ul>
            </li>
            <li class="sp-nav__item sp-nav__item--blog"><a class="sp-nav__title" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">ブログ</a></li>
            </ul>
            <ul class="sp-nav__items">
            <li class="sp-nav__item"><a class="sp-nav__title" href="<?php echo get_post_type_archive_link('voice'); ?>">お客様の声</a></li>
            <li class="sp-nav__item sp-nav__item--price sp-subnav"><a class="sp-nav__title" href="<?php echo get_permalink(get_page_by_path('price')->ID); ?>">料金一覧</a>
                <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#license-course'); ?>"">ライセンス講習</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#trial-diving'); ?>">体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#fun-diving'); ?>">ファンダイビング</a></li>
                </ul>
            </li>
            <li class="sp-nav__item sp-nav__item--faq"><a class="sp-nav__title" href="<?php echo get_permalink(get_page_by_path('faq')->ID); ?>">よくある質問</a></li>
            <li class="sp-nav__item sp-nav__item--policy"><a class="sp-nav__title" href="page-privacypolicy.html">プライバシー<br>ポリシー</a></li>
            <li class="sp-nav__item sp-nav__item--terms"><a class="sp-nav__title" href="page-terms.html">利用規約</a></li>
            <li class="sp-nav__item sp-nav__item--contact"><a class="sp-nav__title" href=<?php echo get_permalink(get_page_by_path('contact')->ID); ?>">お問合せ</a></li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- PCナビ -->
    <nav class="header__pc-nav pc-nav">
        <ul class="pc-nav__items">
        <li class="pc-nav__item"><a href="<?php echo get_post_type_archive_link('campaign'); ?>">Campaign<span>キャンペーン</span></a></li>
        <li class="pc-nav__item"><a href="<?php echo get_permalink(get_page_by_path('about-us')->ID); ?>">About us<span>私たちについて</span></a></li>
        <li class="pc-nav__item"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>">Information<span>ダイビング情報</span></a></li>
        <li class="pc-nav__item"><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">Blog<span>ブログ</span></a></li>
        <li class="pc-nav__item"><a href="<?php echo get_post_type_archive_link('voice'); ?>">Voice<span>お客様の声</span></a></li>
        <li class="pc-nav__item"><a href="<?php echo get_permalink(get_page_by_path('price')->ID); ?>">Price<span>料金一覧</span></a></li>
        <li class="pc-nav__item"><a href="<?php echo get_permalink(get_page_by_path('faq')->ID); ?>">FAQ<span>よくある質問</span></a></li>
        <li class="pc-nav__item"><a href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>">Contact<span>お問合せ</span></a></li>
        </ul>
    </nav>
    </div>
</header>
<!-- ローディングアニメーション -->
<div class="fv-animation">
    <div class="fv-animation__text">
    <h2 class="fv-animation__title">DIVING</h2>
    <p class="fv-animation__subtitle">into the ocean</p>
    </div>
    <div class="fv-animation__left">
    <img class="fadeUp-left" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/anime-left.jpg" alt="" decoding="async">
    </div>
    <div class="fv-animation__right">
    <img class="fadeUp-right" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/anime-right.jpg" alt="" decoding="async">
    </div>
</div>