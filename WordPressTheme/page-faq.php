<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-faq-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-faq-sp.jpg" alt="海" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">FAQ</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>

<div class="page-faq layout-page-faq">
    <div class="page-faq__inner inner">
    <div class="page-faq__items">
        <?php
        $faq_list = SCF::get_option_meta('faq-option', 'faq'); // オプションページの識別子とグループ名を使用
        if (!empty($faq_list)) {
            foreach ($faq_list as $faq_item) {
                ?>
                <div class="page-faq__item faq-item">
                    <div class="faq-item__question-wrapper">
                        <p class="faq-item__question"><?php echo esc_html($faq_item['faq-title']); ?></p>
                        <div class="faq-item__icon is-open">
                            <div class="faq-item__bar1"></div>
                            <div class="faq-item__bar2"></div>
                        </div>
                    </div>
                    <div class="faq-item__answer-wrapper">
                        <p class="faq-item__answer">
                            <?php echo esc_html($faq_item['faq-text']); ?>
                        </p>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
    </div>
</div>

<?php get_footer(); ?>