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

<!-- page-contact -->
<div class="breadcrumb layout-breadcrumb">
    <div class="inner">
    <p>TOP&gt;お問い合わせ<span class="breadcrumb__error js-error-breadcrumb">&gt;お問い合わせエラー</span></p>
    </div>
</div>

<div class="page-contact layout-page">
    <div class="page-contact__inner inner">
    <div class="page-contact__content contact-form">
        <div class="page-contact__form-error js-error">
        <p>※必須項目が入力されていません。<br class="u-mobile">入力してください。</p>
        </div>
        <form action="page-thanks.html" method="post" id="form">
        <dl class="contact-form__item">
            <dt>
            お名前<span>必須</span>
            </dt>
            <dd>
            <input type="text" name="お名前" placeholder="沖縄　太郎" required>
            </dd>
        </dl>
        <dl class="contact-form__item">
            <dt>
            メールアドレス<span>必須</span>
            </dt>
            <dd>
            <input type="email" name="メールアドレス" placeholder="aaa000@ggmail.com" class="validate[]" required>
            </dd>
        </dl>
        <dl class="contact-form__item">
            <dt>
            電話番号<span>必須</span>
            </dt>
            <dd>
            <input type="tel" name="電話番号" placeholder="000-0000-0000" class="validate[]" required>
            </dd>
        </dl>
        <dl class="contact-form__item">
            <dt>
            お問合せ項目<span>必須</span>
            </dt>
            <dd class="contact-form__checkbox">
            <label>
                <input type="checkbox" name="お問い合せ項目" value="ダイビング講習について" checked>
                <span>ダイビング講習について</span>
            </label>
            <label>
                <input type="checkbox" name="お問い合せ項目" value="ファンデイビングについて">
                <span>ファンデイビングについて</span>
            </label>
            <label>
                <input type="checkbox" name="お問い合せ項目" value="体験ダイビングについて">
                <span>体験ダイビングについて</span>
            </label>
            </dd>
        </dl>
        <dl class="contact-form__item">
            <dt>
            キャンペーン
            </dt>
            <dd class="contact-form__select contact-form__select--adjustment">
            <select name="キャンペーン">
                <option value="" disabled selected>キャンペーン内容を選択</option>
                <option value="ライセンス取得">ライセンス取得</option>
                <option value="貸切体験ダイビング">貸切体験ダイビング</option>
                <option value="ナイトダイビング">ナイトダイビング</option>
                <option value="貸切ファンダイビング">貸切ファンダイビング</option>
            </select>
            </dd>
        </dl>
        <dl class="contact-form__item">
            <dt>
            お問合せ内容<span>必須</span>
            </dt>
            <dd>
            <textarea name="お問合せ内容" placeholder="" required></textarea>
            </dd>
        </dl>
        <div class="contact-form__agreement">
            <label>
            <input type="checkbox" id="agreementCheckbox" name="個人情報の取り扱いについて同意のうえ送信します。" required>
            <span>個人情報の取り扱いについて同意のうえ送信します。</span>
            </label>
        </div>

        <div class="contact-form__button">
            <button class="button button--contact-form" type="button">
            <span>Send</span>
            </button>
        </div>

        </form>
    </div>
    </div>
</div>

<?php get_footer(); ?>