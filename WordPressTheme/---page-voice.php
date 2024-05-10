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
        <li class="tabs__item active"><a href="">ALL</a></li>
        <li class="tabs__item"><a href="#">ライセンス講習</a></li>
        <li class="tabs__item"><a href="#">ファンダイビング</a></li>
        <li class="tabs__item"><a href="#">体験ダイビング</a></li>
    </ul>

    <div class="page-voice__area tab-area">
        <ul class="tab-area__item voice-cards">
        <li class="voice-cards__item voice-card">
            <div class="voice-card__header">
            <div class="voice-card__header-title">
                <div class="voice-card__info">
                <p class="voice-card__agegender">20代(女性)</p>
                <p class="voice-card__tag">ライセンス講習</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
            </div>
            <div class="voice-card__image colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice1.jpg" alt="女性" decoding="async">
            </div>
            </div>
            <p class="voice-card__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。
            </p>
        </li>
        <li class="voice-cards__item voice-card">
            <div class="voice-card__header">
            <div class="voice-card__header-title">
                <div class="voice-card__info">
                <p class="voice-card__agegender">30代(男性)</p>
                <p class="voice-card__tag">ファンダイビング</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
            </div>
            <div class="voice-card__image colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice2.jpg" alt="男性" decoding="async">
            </div>
            </div>
            <p class="voice-card__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。
            </p>
        </li>
        <li class="voice-cards__item voice-card">
            <div class="voice-card__header">
            <div class="voice-card__header-title">
                <div class="voice-card__info">
                <p class="voice-card__agegender">30代(女性)</p>
                <p class="voice-card__tag">体験ダイビング</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
            </div>
            <div class="voice-card__image colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice03.jpg" alt="女性" decoding="async">
            </div>
            </div>
            <p class="voice-card__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。
            </p>
        </li>
        <li class="voice-cards__item voice-card">
            <div class="voice-card__header">
            <div class="voice-card__header-title">
                <div class="voice-card__info">
                <p class="voice-card__agegender">20代(女性)</p>
                <p class="voice-card__tag">体験ダイビング</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
            </div>
            <div class="voice-card__image colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice04.jpg" alt="男性" decoding="async">
            </div>
            </div>
            <p class="voice-card__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。
            </p>
        </li>
        <li class="voice-cards__item voice-card">
            <div class="voice-card__header">
            <div class="voice-card__header-title">
                <div class="voice-card__info">
                <p class="voice-card__agegender">30代(カップル)</p>
                <p class="voice-card__tag">ファンダイビング</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
            </div>
            <div class="voice-card__image colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice05.jpg" alt="女性" decoding="async">
            </div>
            </div>
            <p class="voice-card__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。
            </p>
        </li>
        <li class="voice-cards__item voice-card">
            <div class="voice-card__header">
            <div class="voice-card__header-title">
                <div class="voice-card__info">
                <p class="voice-card__agegender">20代(女性)</p>
                <p class="voice-card__tag">ライセンス講習</p>
                </div>
                <h3 class="voice-card__title">ここにタイトルが入ります。ここにタイトル</h3>
            </div>
            <div class="voice-card__image colorbox">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/voice06.jpg" alt="男性" decoding="async">
            </div>
            </div>
            <p class="voice-card__text">
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
            ここにテキストが入ります。ここにテキストが入ります。
            </p>
        </li>
        </ul>
    </div>

    <!-- ページネーション -->
    <div class="page-voice__pagination">
        <ul class="pagination">
        <li class="pagination__item">
            <a class="pagination__link pagination__link-icon" href="#">
            <img class="Pagination__icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/pagination-prev.svg" alt="前への矢印"
                decoding="async">
            </a>
        </li>
        <li class="pagination__item">
            <a class="pagination__link is-active" href="#"><span>1</span></a>
        </li>
        <li class="pagination__item">
            <a class="pagination__link" href="#"><span>2</span></a>
        </li>
        <li class="pagination__item">
            <a class="pagination__link" href="#"><span>3</span></a>
        </li>
        <li class="pagination__item">
            <a class="pagination__link" href="#"><span>4</span></a>
        </li>
        <li class="pagination__item u-desktop">
            <a class="pagination__link" href="#"><span>5</span></a>
        </li>
        <li class="pagination__item u-desktop">
            <a class="pagination__link" href="#"><span>6</span></a>
        </li>
        <li class="pagination__item">
            <a class="pagination__link pagination__link-icon" href="#">
            <img class="Pagination__icon" src="<?php echo get_theme_file_uri(); ?>/assets/images/common/pagination-next.svg" alt="次への矢印"
                decoding="async">
            </a>
        </li>
        </ul>
    </div>
    </div>
</section>

<?php get_footer(); ?>