<?php get_header(); ?>
<!-- sub-mv -->
<div class="sub-mv">
    <div class="sub-mv__image">
    <picture>
        <source media="(min-width: 768px)" srcset="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-pc.jpg">
        <img src="<?php echo get_theme_file_uri(); ?>/assets/images/common/page-contact-sp.jpg" alt="海" decoding="async">
    </picture>
    </div>
    <div class="sub-mv-header">
    <h1 class="sub-mv-header__title">Contact</h1>
    </div>
</div>

<!-- パンくず -->
<?php get_template_part('parts/breadcrumb') ?>
<div id="thanks-text" class="page-thanks layout-page layout-page--thanks">
      <div class="page-thanks__inner inner">
        <div class="page-thanks__completion">
          <p>お問い合わせ内容を送信完了しました。</p>
        </div>
        <div class="page-thanks__text">
          <p>このたびは、お問い合わせ頂き<br class="u-mobile">誠にありがとうございます。<br>お送り頂きました内容を確認の上、<br
              class="u-mobile">3営業日以内に折り返しご連絡させて頂きます。<br>また、ご記入頂いたメールアドレスへ、<br class="u-mobile">自動返信の確認メールをお送りしております。
          </p>
        </div>
      </div>
    </div>


<?php get_footer(); ?>