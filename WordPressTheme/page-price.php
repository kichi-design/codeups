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
        <?php
            $prices_license = SCF::get('price-license');
            if ( is_array( $prices_license ) ) {
            foreach ( $prices_license as $price_license_field ) {
        ?>
            <div class="price-table__item">
                <dt class="price-table__course"><?php echo esc_html( $price_license_field['license-course'] ); ?></dt>
                <dd class="price-table__price"><?php echo esc_html( $price_license_field['license-text'] ); ?></dd>
            </div>
        <?php
            }
        }
        ?>


        </dl>
    </div>
    <div class="page-price__table price-table">
        <div class="price-table__head">
        <h2 class="price-table__title">体験ダイビング</h2>
        </div>
        <dl class="price-table__items">
        <?php
            $prices_trial = SCF::get('price-trial');
            if ( is_array( $prices_trial ) ) {
            foreach ( $prices_trial as $price_trial_field ) {
        ?>
            <div class="price-table__item">
                <dt class="price-table__course"><?php echo esc_html( $price_trial_field['trial-course'] ); ?></dt>
                <dd class="price-table__price"><?php echo esc_html( $price_trial_field['trial-text'] ); ?></dd>
            </div>
        <?php
            }
        }
        ?>
        </dl>
    </div>
    <div class="page-price__table price-table">
        <div class="price-table__head">
        <h2 class="price-table__title">ファンダイビング</h2>
        </div>
        <dl class="price-table__items">
        <?php
            $prices_fun = SCF::get('price-fun');
            if ( is_array( $prices_fun ) ) {
            foreach ( $prices_fun as $price_fun_field ) {
        ?>
            <div class="price-table__item">
                <dt class="price-table__course"><?php echo esc_html( $price_fun_field['fun-course'] ); ?></dt>
                <dd class="price-table__price"><?php echo esc_html( $price_fun_field['fun-text'] ); ?></dd>
            </div>
        <?php
            }
        }
        ?>
        </dl>
    </div>
    <div class="page-price__table price-table">
        <div class="price-table__head">
        <h2 class="price-table__title">スペシャルダイビング</h2>
        </div>
        <dl class="price-table__items">
        <?php
            $prices_special = SCF::get('price-special');
            if ( is_array( $prices_special ) ) {
            foreach ( $prices_special as $price_special_field ) {
        ?>
            <div class="price-table__item">
                <dt class="price-table__course"><?php echo esc_html( $price_special_field['special-course'] ); ?></dt>
                <dd class="price-table__price"><?php echo esc_html( $price_special_field['special-text'] ); ?></dd>
            </div>
        <?php
            }
        }
        ?>
        </dl>
    </div>
    </div>
</section>

<?php get_footer(); ?>