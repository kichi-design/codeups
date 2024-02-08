<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<meta name="format-detection" content="telephone=no">
<meta name="robots" content="noindex">
<?php wp_head(); ?>
</head>
<body>
<header class="header js-header">
    <div class="header__inner">
    <h1 class="header__title">
        <a href="index.html" class="header__logo">
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
            <li class="sp-nav__item sp-subnav"><a class="sp-nav__title" href="page-campaign.html">キャンペーン</a>
                <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="#">ライセンス取得</a></li>
                <li class="sp-subnav__item"><a href="#">貸切体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="#">ナイトダイビング</a></li>
                </ul>
            </li>
            <li class="sp-nav__item sp-nav__item--about"><a class="sp-nav__title" href="page-about.html">私たちについて</a></li>
            <li class="sp-nav__item sp-nav__item--information sp-subnav"><a class="sp-nav__title" href="page-information.html">ダイビング情報</a>
                <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="#">ライセンス講習</a></li>
                <li class="sp-subnav__item"><a href="#">体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="#">ファンダイビング</a></li>
                </ul>
            </li>
            <li class="sp-nav__item sp-nav__item--blog"><a class="sp-nav__title" href="page-blog.html">ブログ</a></li>
            </ul>
            <ul class="sp-nav__items">
            <li class="sp-nav__item"><a class="sp-nav__title" href="page-voice.html">お客様の声</a></li>
            <li class="sp-nav__item sp-nav__item--price sp-subnav"><a class="sp-nav__title" href="page-price.html">料金一覧</a>
                <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="#">ライセンス講習</a></li>
                <li class="sp-subnav__item"><a href="#">体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="#">ファンダイビング</a></li>
                </ul>
            </li>
            <li class="sp-nav__item sp-nav__item--faq"><a class="sp-nav__title" href="page-faq.html">よくある質問</a></li>
            <li class="sp-nav__item sp-nav__item--policy"><a class="sp-nav__title" href="page-privacypolicy.html">プライバシー<br>ポリシー</a></li>
            <li class="sp-nav__item sp-nav__item--terms"><a class="sp-nav__title" href="page-terms.html">利用規約</a></li>
            <li class="sp-nav__item sp-nav__item--contact"><a class="sp-nav__title" href="page-contact.html">お問合せ</a></li>
            </ul>
        </div>
        </div>
    </nav>
    <!-- PCナビ -->
    <nav class="header__pc-nav pc-nav">
        <ul class="pc-nav__items">
        <li class="pc-nav__item"><a href="page-campaign.html">Campaign<span>キャンペーン</span></a></li>
        <li class="pc-nav__item"><a href="page-about.html">About us<span>私たちについて</span></a></li>
        <li class="pc-nav__item"><a href="page-information.html">Information<span>ダイビング情報</span></a></li>
        <li class="pc-nav__item"><a href="page-blog.html">Blog<span>ブログ</span></a></li>
        <li class="pc-nav__item"><a href="page-voice.html">Voice<span>お客様の声</span></a></li>
        <li class="pc-nav__item"><a href="page-price.html">Price<span>料金一覧</span></a></li>
        <li class="pc-nav__item"><a href="page-faq.html">FAQ<span>よくある質問</span></a></li>
        <li class="pc-nav__item"><a href="page-contact.html">Contact<span>お問合せ</span></a></li>
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