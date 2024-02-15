<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-information-mv-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-information-mv-sp.jpg" alt="ダイビング" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Information</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<section class="page-information layout-page">
    <div class="inner">
    <ul class="page-information__tab tabs-information">
        <li class="tabs-information__item"><a href="#license-course">ライセンス<br class="u-mobile">講習</a></li>
        <li class="tabs-information__item"><a href="#fun-diving">ファン<br class="u-mobile">ダイビング</a></li>
        <li class="tabs-information__item"><a href="#experience-diving">体験<br class="u-mobile">ダイビング</a></li>
    </ul>

    <div id="license-course" class="page-information__area tab-information-area">
        <ul class="tab-information-area__items">
        <li class="tab-information-area__item">
            <div class="tab-information-area__container">
            <div class="tab-information-area__body">
                <h2 class="tab-information-area__title">ライセンス講習</h2>
                <p class="tab-information-area__text">
                泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします！スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう！
                </p>
            </div>
            <div class="tab-information-area__image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/license.jpg" alt="" decoding="async">
            </div>
            </div>
        </li>
        </ul>
        <!--/tab-area-->
    </div>

    <div id="fun-diving" class="page-information__area tab-information-area">
        <ul class="tab-information-area__items">
        <li class="tab-information-area__item">
            <div class="tab-information-area__container">
            <div class="tab-information-area__body">
                <h2 class="tab-information-area__title">ファンダイビング</h2>
                <p class="tab-information-area__text">
                ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
            </div>
            <div class="tab-information-area__image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/fundiving.jpg" alt="" decoding="async">
            </div>
            </div>
        </li>
        </ul>
        <!--/tab-area-->
    </div>

    <div id="experience-diving" class="page-information__area tab-information-area">
        <ul class="tab-information-area__items">
        <li class="tab-information-area__item">
            <div class="tab-information-area__container">
            <div class="tab-information-area__body">
                <h2 class="tab-information-area__title">体験ダイビング</h2>
                <p class="tab-information-area__text">
                ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                </p>
            </div>
            <div class="tab-information-area__image">
                <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/diving.jpg" alt="" decoding="async">
            </div>
            </div>
        </li>
        </ul>
        <!--/tab-area-->
    </div>

    </div>
</section>

<?php get_footer(); ?>