<?php if (!is_404() && !is_page('contact') && !is_page('thanks')): ?>
            <!-- contact -->
<section class="contact top-contact">
    <div class="inner contact__inner">
    <div class="contact__container">
        <div class="contact__company">
        <a href="<?php echo esc_url(home_url()); ?>" class="contact__logo">
            <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps-contact.svg" alt="ロゴ" decoding="async">
        </a>
        <div class="contact__company-body">
            <div class="contact__company-text">
            <p class="contact__company-address">沖縄県那覇市1-1</p>
            <p class="contact__company-tel">TEL:0120-000-0000</p>
            <p class="contact__company-opening">営業時間:8:30-19:00</p>
            <p class="contact__company-holiday">定休日:毎週火曜日</p>
            </div>
            <div class="contact__company-map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d57272.181443672234!2d127.6377350637618!3d26.21256990548366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e3!4m0!4m5!1s0x34e5697141a6b58b%3A0x2cd8aff616585e98!2z5rKW57iE55yM6YKj6KaH5biC!3m2!1d26.2125758!2d127.67902079999999!5e0!3m2!1sja!2sjp!4v1693771192401!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
            </div>
        </div>
        </div>
        <div class="contact__info">
        <div class="section-header section-header--contact">
            <h2 class="section-header__title section-header__title--contact">Contact</h2>
            <div class="section-header__subtitle section-header__subtitle--contact">お問い合わせ</div>
        </div>
        <p class="contact__info-text">ご予約・お問い合わせはコチラ</p>
        <div class="contact__button">
            <a href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>" class="button">
            <span>Contact us</span>
            </a>
        </div>

        </div>
    </div>
    </div>
</section>
<?php endif; ?>


<!-- footer -->
<footer class="footer l-footer">
<div class="inner footer-inner">
    <div class="footer__title">
    <a href="<?php echo esc_url(home_url()); ?>" class="footer__logo">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/CodeUps.svg" alt="ロゴ" decoding="async">
    </a>
    <div class="footer__sns footer-sns">
        <a href="<?php echo esc_url(home_url()); ?>" class="footer-sns__facebook">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/FacebookLogo.png" alt="Facebook" decoding="async">
        </a>
        <a href="<?php echo esc_url(home_url()); ?>" class="footer-sns__instagram">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/InstagramLogo.png" alt="Instagram" decoding="async">
        </a>
    </div>
    </div>
    <div class="footer__nav footer-nav">
        <div class="footer-nav__container">
        <ul class="footer-nav__items">
        <li class="footer-nav__item sp-subnav">
            <a class="footer-nav__title" href="<?php echo get_post_type_archive_link('campaign'); ?>">キャンペーン</a>
            <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_license', get_post_type_archive_link('campaign'))); ?>">ライセンス取得</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_trial', get_post_type_archive_link('campaign'))); ?>">体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(add_query_arg('term', 'campaign_fun', get_post_type_archive_link('campaign'))); ?>">ファンダイビング</a></li>
            </ul>
        </li>

            <li class="footer-nav__item footer-nav__item--adjustment"><a class="footer-nav__title" href="<?php echo get_permalink(get_page_by_path('about-us')->ID); ?>">私たちについて</a></li>
        </ul>
        <ul class="footer-nav__items">
            <li class="footer-nav__item footer-nav__item--information sp-subnav"><a class="footer-nav__title" href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>">ダイビング情報</a>
            <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=license-course">ライセンス講習</a></li>
                <li class="sp-subnav__item"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=experience-diving">体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="<?php echo get_permalink(get_page_by_path('information')->ID); ?>?id=fun-diving">ファンダイビング</a></li>
            </ul>
            </li>
            <li class="footer-nav__item footer-nav__item--adjustment"><a class="footer-nav__title" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">ブログ</a></li>
        </ul>
        </div>
        <div class="footer-nav__container">
        <ul class="footer-nav__items">
            <li class="footer-nav__item"><a class="footer-nav__title" href="<?php echo get_post_type_archive_link('voice'); ?>">お客様の声</a></li>
            <li class="footer-nav__item footer-nav__item--adjustment sp-subnav"><a class="footer-nav__title" href="<?php echo get_permalink(get_page_by_path('price')->ID); ?>">料金一覧</a>
            <ul class="sp-subnav__items">
                <li class="sp-subnav__item"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#license-course'); ?>">ライセンス講習</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#trial-diving'); ?>">体験ダイビング</a></li>
                <li class="sp-subnav__item"><a href="<?php echo esc_url(get_permalink(get_page_by_path('price')->ID) . '#fun-diving'); ?>">ファンダイビング</a></li>
            </ul>
            </li>
        </ul>
        <ul class="footer-nav__items">
            <li class="footer-nav__item footer-nav__item--faq"><a class="footer-nav__title" href="<?php echo get_permalink(get_page_by_path('faq')->ID); ?>">よくある質問</a></li>
            <li class="footer-nav__item footer-nav__item--adjustment"><a class="footer-nav__title" href="<?php echo esc_url(get_permalink(get_page_by_path('privacypolicy'))); ?>">プライバシー<br class="display__sp">ポリシー</a></li>
            <li class="footer-nav__item footer-nav__item--adjustment"><a class="footer-nav__title" href="<?php echo esc_url(get_permalink(get_page_by_path('terms-of-service'))); ?>">利用規約</a></li>
            <li class="footer-nav__item footer-nav__item--adjustment"><a class="footer-nav__title" href="<?php echo get_permalink(get_page_by_path('contact')->ID); ?>">お問い合わせ</a></li>
        </ul>
        </div>
    </div>
    <div class="footer__copyright">
        <p>Copyright © 2021 - 2023 CodeUps LLC. All Rights Reserved.</p>
    </div>
    </div>
</footer>
<!-- ページトップへ戻るボタン -->
<button class="pagetop"></button>
<?php wp_footer(); ?>
</body>
</html>
