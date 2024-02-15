<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-price-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-price-sp.jpg" alt="ダイビング" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Price</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<section class="page-price layout-page">
    <div class="inner page-price__inner">
    <div class="page-price__table price-table">
        <div class="price-table__head">
        <h2 class="price-table__title">ライセンス講習</h2>
        </div>
        <dl class="price-table__items">
        <div class="price-table__item">
            <dt class="price-table__course">オープンウォーター<br class="u-mobile">ダイバーコース</dt>
            <dd class="price-table__price">¥50,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">アドバンスド<br class="u-mobile">オープンウォーターコース</dt>
            <dd class="price-table__price">¥60,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">レスキュー＋EFRコース</dt>
            <dd class="price-table__price">¥70,000</dd>
        </div>
        </dl>
    </div>
    <div class="page-price__table price-table">
        <div class="price-table__head">
        <h2 class="price-table__title">体験ダイビング</h2>
        </div>
        <dl class="price-table__items">
        <div class="price-table__item">
            <dt class="price-table__course">ビーチ体験ダイビング<br class="u-mobile">(半日)</dt>
            <dd class="price-table__price">¥7,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">ビーチ体験ダイビング<br class="u-mobile">(1日)</dt>
            <dd class="price-table__price">¥14,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">ボート体験ダイビング<br class="u-mobile">(半日)</dt>
            <dd class="price-table__price">¥10,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">ボート体験ダイビング<br class="u-mobile">(1日)</dt>
            <dd class="price-table__price">¥18,000</dd>
        </div>
        </dl>
    </div>
    <div class="page-price__table price-table">
        <div class="price-table__head">
        <h2 class="price-table__title">ファンダイビング</h2>
        </div>
        <dl class="price-table__items">
        <div class="price-table__item">
            <dt class="price-table__course">ビーチダイビング<br class="u-mobile">(2ダイブ)</dt>
            <dd class="price-table__price">¥14,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">ボートダイビング<br class="u-mobile">(2ダイブ)</dt>
            <dd class="price-table__price">¥18,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">スペシャルダイビング<br class="u-mobile">(2ダイブ)</dt>
            <dd class="price-table__price">¥24,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">ナイトダイビング<br class="u-mobile">(1ダイブ)</dt>
            <dd class="price-table__price">¥10,000</dd>
        </div>
        </dl>
    </div>
    <div class="page-price__table price-table">
        <div class="price-table__head">
        <h2 class="price-table__title">スペシャルダイビング</h2>
        </div>
        <dl class="price-table__items">
        <div class="price-table__item">
            <dt class="price-table__course">貸切ダイビング<br class="u-mobile">(2ダイブ)</dt>
            <dd class="price-table__price">¥24,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">1日ダイビング<br class="u-mobile">(3ダイブ)</dt>
            <dd class="price-table__price">¥32,000</dd>
        </div>
        <div class="price-table__item">
            <dt class="price-table__course">ナイトダイビング<br class="u-mobile">(2ダイブ)</dt>
            <dd class="price-table__price">¥14,000</dd>
        </div>
        </dl>
    </div>
    </div>
</section>

<?php get_footer(); ?>