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
    <?php
    // ライセンス講習料金表の表示
    $license_courses = SCF::get_option_meta('price-option', 'price-license-new');
    if (!empty($license_courses)) :
    ?>
        <div class="page-price__table price-table" id="license-course">
            <div class="price-table__head">
                <h2 class="price-table__title">ライセンス講習</h2>
            </div>
            <dl class="price-table__items">
                <?php foreach ($license_courses as $course): ?>
                <div class="price-table__item">
                    <dt class="price-table__course"><?php echo esc_html($course['license-course-new']); ?></dt>
                    <dd class="price-table__price"><?php echo esc_html($course['license-text-new']); ?></dd>
                </div>
                <?php endforeach; ?>
            </dl>
        </div>
    <?php endif; ?>

    <?php
    // 体験ダイビング料金表の表示
    $trial_courses = SCF::get_option_meta('price-option', 'price-trial-new');
    if (!empty($trial_courses)):
    ?>
        <div class="page-price__table price-table" id="trial-diving">
            <div class="price-table__head">
                <h2 class="price-table__title">体験ダイビング</h2>
            </div>
            <dl class="price-table__items">
                <?php foreach ($trial_courses as $course): ?>
                <div class="price-table__item">
                    <dt class="price-table__course"><?php echo esc_html($course['trial-course-new']); ?></dt>
                    <dd class="price-table__price"><?php echo esc_html($course['trial-text-new']); ?></dd>
                </div>
                <?php endforeach; ?>
            </dl>
        </div>
    <?php endif; ?>

    <?php
    // ファンダイビング料金表の表示
    $fun_courses = SCF::get_option_meta('price-option', 'price-fun-new');
    if (!empty($fun_courses)) :
    ?>
        <div class="page-price__table price-table" id="fun-diving">
            <div class="price-table__head">
                <h2 class="price-table__title">ファンダイビング</h2>
            </div>
            <dl class="price-table__items">
                <?php foreach ($fun_courses as $course): ?>
                <div class="price-table__item">
                    <dt class="price-table__course"><?php echo esc_html($course['fun-course-new']); ?></dt>
                    <dd class="price-table__price"><?php echo esc_html($course['fun-text-new']); ?></dd>
                </div>
                <?php endforeach; ?>
            </dl>
        </div>
    <?php endif; ?>

    <?php
    // スペシャルダイビング料金表の表示
    $special_courses = SCF::get_option_meta('price-option', 'price-special-new');
    if (!empty($special_courses)) :
    ?>
        <div class="page-price__table price-table" id="special-diving">
            <div class="price-table__head">
                <h2 class="price-table__title">スペシャルダイビング</h2>
            </div>
            <dl class="price-table__items">
                <?php foreach ($special_courses as $course): ?>
                <div class="price-table__item">
                    <dt class="price-table__course"><?php echo esc_html($course['special-course-new']); ?></dt>
                    <dd class="price-table__price"><?php echo esc_html($course['special-text-new']); ?></dd>
                </div>
                <?php endforeach; ?>
            </dl>
        </div>
    <?php endif; ?>
</div>

</section>

<?php get_footer(); ?>