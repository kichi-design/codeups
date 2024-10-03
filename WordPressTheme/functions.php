<?php 
function my_theme_enqueue_scripts() {
    // Google Fonts の追加
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Gotu&family=Lato&family=Noto+Sans+JP:wght@400;500;700&family=Noto+Serif+JP:wght@400;500;700&display=swap', array(), null );

    // Swiper CSS の追加
    wp_enqueue_style( 'swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), null );

    // カスタムスタイルシートの追加
    wp_enqueue_style( 'my-theme-style', get_theme_file_uri( '/assets/css/style.css' ), array(), null );

    // Swiper JS（CDN）の追加
    wp_enqueue_script( 'swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array(), null, true );

    // JavaScript jQuery の追加
    wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.js', array(), null, true );

    // jQuery.cookie（プラグイン）の追加
    wp_enqueue_script( 'jquery-cookie', 'https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js', array('jquery'), null, true );

    // inview.js（プラグイン）の追加
    wp_enqueue_script( 'jquery-inview', get_theme_file_uri( '/assets/js/jquery.inview.min.js' ), array('jquery'), null, true );

    // カスタムスクリプトの追加
    wp_enqueue_script( 'my-theme-script', get_theme_file_uri( '/assets/js/script.js' ), array('jquery'), null, true );
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );

function my_setup() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'my_setup' );

// ---------------------------------------
//アーカイブの表示件数変更
// ---------------------------------------
//特定のカスタム投稿の記事一覧数を指定する
add_filter('parse_query', 'custom_per_page');
function custom_per_page($query)
{
    if (is_admin() || is_singular() || !$query->is_main_query()) {
        return;
    }

    if ($query->get('post_type') == 'campaign' || $query->is_tax('campaign_category')) {
        // campaign タイプの投稿、または campaign_category タクソノミーが関与する場合
        $query->set('posts_per_page', 2); // 1ページに2記事
    }

    if ($query->get('post_type') == 'voice') {
        // voice タイプの投稿の場合
        $query->set('posts_per_page', 2);
    }
}

// ---------------------------------------
// カスタム投稿campaignページ　詳細へのアクセスはアーカイブ一覧ページへリダイレクト
// ---------------------------------------
function create_campaign_posttype() {
    register_post_type( 
        'campaign',
        array(
            'public' => true,//投稿タイプをパブリックにするか（初期値：false）
            'has_archive' => true, //アーカイブを有効にするか（初期値：false）
            //'show_ui' => true, //UIを生成するか（初期値：public引数の値）
        )
    );
}

add_action( 'template_redirect', 'redirect_campaign_single_to_archive' );
function redirect_campaign_single_to_archive() {
    if(is_singular('campaign')){//caseの詳細ページへのアクセスの場合
        $url = home_url('/campaign/', 'http'); //caseの一覧へリダイレクト
        wp_safe_redirect( $url, 301 );
        exit();
    }
}

// ---------------------------------------
// カスタム投稿Voiceページ　詳細へのアクセスはアーカイブ一覧ページへリダイレクト
// ---------------------------------------
function create_voice_posttype() {
    register_post_type( 
        'voice',
        array(
            'public' => true,//投稿タイプをパブリックにするか（初期値：false）
            'has_archive' => true, //アーカイブを有効にするか（初期値：false）
            //'show_ui' => true, //UIを生成するか（初期値：public引数の値）
        )
    );
}

add_action( 'template_redirect', 'redirect_voice_single_to_archive' );
function redirect_voice_single_to_archive() {
    if(is_singular('voice')){//caseの詳細ページへのアクセスの場合
        $url = home_url('/voice/', 'http'); //caseの一覧へリダイレクト
        wp_safe_redirect( $url, 301 );
        exit();
    }
}

// ---------------------------------------
// それぞれのセクションに対してユニークなショートコードを作成（Price） SCFプラグインを使用したものをショートコードにした
// [display_prices_license] : ライセンス価格情報を表示
// [display_prices_trial] : トライアル価格情報を表示
// [display_prices_fun] : 楽しみ価格情報を表示
// [display_prices_special] : 特別価格情報を表示
// ---------------------------------------
function display_prices_license_shortcode() {
    ob_start(); // バッファリング開始
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
    return ob_get_clean(); // バッファの内容を取得し、バッファをクリア
}
add_shortcode('display_prices_license', 'display_prices_license_shortcode');

function display_prices_trial_shortcode() {
    ob_start();
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
    return ob_get_clean();
}
add_shortcode('display_prices_trial', 'display_prices_trial_shortcode');

function display_prices_fun_shortcode() {
    ob_start();
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
    return ob_get_clean();
}
add_shortcode('display_prices_fun', 'display_prices_fun_shortcode');

function display_prices_special_shortcode() {
    ob_start();
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
    return ob_get_clean();
}
add_shortcode('display_prices_special', 'display_prices_special_shortcode');

// ---------------------------------------
// 管理画面の「投稿」メニューの名前を「ブログ」に変更
// ---------------------------------------
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'ブログ'; // 「投稿」を「ブログ」に変更
    $submenu['edit.php'][5][0] = 'ブログ一覧';
    $submenu['edit.php'][10][0] = '新しいブログを追加';
    echo '';
}
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'ブログ';
    $labels->singular_name = 'ブログ';
    $labels->add_new = '新しいブログを追加';
    $labels->add_new_item = 'ブログを追加';
    $labels->edit_item = 'ブログを編集';
    $labels->new_item = '新しいブログ';
    $labels->view_item = 'ブログを表示';
    $labels->search_items = 'ブログを検索';
    $labels->not_found = 'ブログが見つかりませんでした';
    $labels->not_found_in_trash = 'ゴミ箱にブログはありません';
}
add_action( 'admin_menu', 'change_post_menu_label' );
add_action( 'init', 'change_post_object_label' );


// ---------------------------------------
// ビュー数を追跡して、それに基づいて読まれた回数が多い上位3件の記事を表示する処理
// ---------------------------------------

function get_top_viewed_posts() {
    $args = array(
        'posts_per_page' => 3,
        'meta_key' => 'post_views_count',
        'orderby' => 'meta_value_num',
        'order' => 'DESC'
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $img_url = get_the_post_thumbnail_url(get_the_ID(),'full') ?: get_theme_file_uri('/assets/images/common/default-image.jpg');
            $date = get_the_date('Y.m/d');
            $title = get_the_title();
            $permalink = get_permalink();
            ?>
            <!-- リンクを追加 -->
            <a href="<?php echo esc_url($permalink); ?>" class="sidebar-contents__wrapper-link">
                <div class="sidebar-contents__wrapper">
                    <div class="sidebar-contents__popular-body">
                        <div class="sidebar-contents__popular-image">
                            <img src="<?php echo esc_url($img_url); ?>" alt="<?php echo esc_attr($title); ?>" decoding="async">
                        </div>
                        <div class="sidebar-contents__popular-head">
                            <time class="sidebar-contents__popular-date" datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo esc_html($date); ?></time>
                            <h3 class="sidebar-contents__popular-title"><?php echo esc_html($title); ?></h3>
                        </div>
                    </div>
                </div>
            </a>
            <?php
        }
        wp_reset_postdata();
    } else {
        echo '<p>人気の記事はありません。</p>';
    }
}

// ---------------------------------------
// 記事の読まれた回数をカウントして管理画面に表示
// ---------------------------------------

// ビュー数をカウントアップする関数
function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// 記事ページが読まれたらビュー数を増やす
function track_post_views($post_id) {
    if (!is_single()) return;
    if (empty($post_id)) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action('wp_head', 'track_post_views');

// 管理画面の投稿一覧にビュー数列を追加する関数
function add_views_column($columns) {
    $columns['post_views'] = 'ビュー数';
    return $columns;
}
add_filter('manage_posts_columns', 'add_views_column');

// ビュー数列に値を表示する関数
function display_views_in_admin_panel($column_name, $post_id) {
    if ($column_name == 'post_views') {
        $views = get_post_meta($post_id, 'post_views_count', true);
        echo $views;
    }
}
add_action('manage_posts_custom_column', 'display_views_in_admin_panel', 10, 2);

// ----------------------------------------
// メール送信完了後にthanksページへ遷移（contactform7）
// ----------------------------------------
// add_action('wp_footer', 'redirect_to_thanks_page');
// function redirect_to_thanks_page() {
// $homeUrl = home_url();
// echo <<< EOD
// <script>
//     document.addEventListener( 'wpcf7mailsent', function( event ) {
//     location = '{$homeUrl}/thanks/';
//     }, false );
// </script>
// EOD;
// }

add_action('wp_footer', 'redirect_and_scroll_to_thanks_page');
function redirect_and_scroll_to_thanks_page() {
    $homeUrl = home_url();
    echo <<<EOD
<script>
document.addEventListener('wpcf7mailsent', function() {
    console.log('Form sent event detected.');

    // リダイレクト先のページURL
    var thanksPage = '{$homeUrl}/thanks/';

    // スクロール実行をセッションに保存
    sessionStorage.setItem('scrollToThanks', 'true');
    console.log('Session storage set for scrollToThanks.');

    // リダイレクト
    window.location.href = thanksPage;
}, false);

window.addEventListener('load', function() {
    console.log('Page load event detected.');
    var scrollToThanks = sessionStorage.getItem('scrollToThanks');
    var currentPath = window.location.pathname;
    console.log('scrollToThanks:', scrollToThanks);
    console.log('currentPath:', currentPath);

    // パスが「/thanks」で終わるかどうかを確認
    if (scrollToThanks === 'true' && currentPath.includes('/thanks')) {
        console.log('scrollToThanks detected in session storage and path matches.');

        // スクロール対象の要素のIDを指定
        var element = document.getElementById('thanks-text');
        if (element) {
            console.log('Element found. Scrolling to it.');
            element.scrollIntoView({ behavior: 'smooth' });
            sessionStorage.removeItem('scrollToThanks');
            console.log('Session storage scrollToThanks removed.');
        } else {
            console.log('Element with ID "thanks-text" not found.');
        }
    } else {
        console.log('Condition for scrollToThanks not met.');
    }
});
</script>
EOD;
}

// ----------------------------------------
// Smart Custom Fields（SCF）プラグインを使用して、特定のオプションページを作成
// ----------------------------------------
//  * @param string $page_title ページのtitle属性値
//  * @param string $menu_title 管理画面のメニューに表示するタイトル
//  * @param string $capability メニューを操作できる権限（maange_options とか）
//  * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
//  * @param string|null $icon_url メニューに表示するアイコンの URL
//  * @param int $position メニューの位置

SCF::add_options_page(
	'codeups-new',
	'FVギャラリ',
	'manage_options',
	'fv-option',
	'dashicons-admin-generic',
	10
);

SCF::add_options_page(
	'codeups-new',
	'FVギャラリ(スマホ)',
	'manage_options',
	'fv-sp-option',
	'dashicons-admin-generic',
	11
);

SCF::add_options_page(
	'codeups-new',
	'AboutUsギャラリ',
	'manage_options',
	'about-us-option',
	'dashicons-admin-generic',
	12
);

SCF::add_options_page(
	'codeups-new',
	'FAQ',
	'manage_options',
	'faq-option',
	'dashicons-admin-generic',
	13
);

SCF::add_options_page(
	'codeups-new',
	'料金表',
	'manage_options',
	'price-option',
	'dashicons-admin-generic',
	14
);

// ----------------------------------------
// Voice、、Blogのタイトル文字数を制限
// ----------------------------------------

function voice_truncate_text($text, $limit = 20) {
    if (mb_strlen($text) > $limit) {
        return mb_substr($text, 0, $limit) . '...';
    }
    return $text;
};

function blog_truncate_text($text, $limit = 16) {
    if (mb_strlen($text) > $limit) {
        return mb_substr($text, 0, $limit) . '...';
    }
    return $text;
};

// ----------------------------------------
// デフォルト画像の追加
// ----------------------------------------
// オプションページを追加
add_action('admin_menu', function() {
    add_options_page('カスタム設定', 'カスタム設定', 'manage_options', 'custom-settings-page', 'custom_settings_page');
});

// 設定ページの内容
function custom_settings_page() {
    ?>
    <div class="wrap">
        <h1>カスタム設定</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom-settings-group');
            do_settings_sections('custom-settings-group');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">カスタム画像URL</th>
                    <td><input type="text" name="my_custom_image" value="<?php echo esc_attr(get_option('my_custom_image')); ?>" /></td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}

// 設定を登録
add_action('admin_init', function() {
    register_setting('custom-settings-group', 'my_custom_image');
});

// ----------------------------------------
// contact Form 7プラグインを使って、WordPressのカスタム投稿タイプ「campaign」のタイトルを動的に選択肢として取り入れる
// ----------------------------------------
add_filter('wpcf7_form_tag', function ($tag) {
    if ('menu-284' == $tag['name']) { // ここでフィールド名をチェック
        // 'campaign' カスタム投稿タイプの投稿を取得
        $args = array(
            'post_type' => 'campaign',
            'posts_per_page' => -1 // 全投稿を取得
        );
        $campaigns = get_posts($args);

        // 選択肢の初期値
        $tag['raw_values'][] = "キャンペーン内容を選択";
        $tag['values'][] = "キャンペーン内容を選択";
        $tag['labels'][] = "キャンペーン内容を選択";

        // 各カスタム投稿のタイトルを選択肢に追加
        foreach ($campaigns as $campaign) {
            $tag['raw_values'][] = $campaign->post_title;
            $tag['values'][] = $campaign->post_title;
            $tag['labels'][] = $campaign->post_title;
        }
    }
    return $tag;
}, 10, 1);


// ----------------------------------------
// 管理画面
// ----------------------------------------
// "price-option" ページ用のCSSを読み込む
function custom_admin_styles_for_price_option_page($hook_suffix) {
    if (isset($_GET['page']) && $_GET['page'] == 'price-option') {
        wp_enqueue_style('custom-admin-price-option-style', get_template_directory_uri() . '/assets/css/admin-price-option-style.css');
    }
}
add_action('admin_enqueue_scripts', 'custom_admin_styles_for_price_option_page');

// ----------------------------------------
// "faq-option" ページ用のCSSを読み込む
function custom_admin_styles_for_faq_option_page($hook_suffix) {
    if (isset($_GET['page']) && $_GET['page'] == 'faq-option') {
        wp_enqueue_style('custom-admin-faq-option-style', get_template_directory_uri() . '/assets/css/admin-faq-option-style.css');
    }
}
add_action('admin_enqueue_scripts', 'custom_admin_styles_for_faq_option_page');

// ----------------------------------------
// 管理画面ログインページのロゴ変更
function custom_login_logo() {
    ?>
    <style type="text/css">
    #login h1 a {
        display: block;
        background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/common/CodeUps.webp);
        background-size: contain;
        background-repeat: no-repeat;
        width: 320px; /* 適切な幅を指定 */
        height: 80px; /* 適切な高さを指定 */
        margin: 0 auto;
    }
    </style>
    <?php
}
add_action('login_head', 'custom_login_logo');

// ----------------------------------------
// ダッシュボードに新規ウィジェットを追加
function add_dashboard_widgets() {
    wp_add_dashboard_widget(
        'plan_dashboard_widget', // ウィジェットのスラッグ名
        '設定一覧', // ウィジェットに表示するタイトル
        'dashboard_widget_function' // 実行する関数
    );
}
add_action( 'wp_dashboard_setup', 'add_dashboard_widgets' );

function dashboard_widget_function() {
    // 各オプションページへのリンクを作成
    $links = [
        'FVギャラリ' => admin_url('admin.php?page=fv-option'),
        'FVギャラリ(スマホ)' => admin_url('admin.php?page=fv-sp-option'),
        'AboutUsギャラリ' => admin_url('admin.php?page=about-us-option'),
        'FAQ' => admin_url('admin.php?page=faq-option'),
        '料金表' => admin_url('admin.php?page=price-option')
    ];

    // 各リンクをボタン形式で出力
    foreach ($links as $title => $url) {
        echo '<p>
                <a href="' . esc_url($url) . '" style="
                    display: inline-block;
                    padding: 10px 20px;
                    background-color: #408F95;
                    color: white;
                    text-decoration: none;
                    border-radius: 5px;
                    font-size: 14px;
                    margin-bottom: 10px;
                ">
                    ' . esc_html($title) . 'の設定はこちら
                </a>
              </p>';
    }
}



    

?>