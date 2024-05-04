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
function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    
    // campaignまたはvoiceのカスタム投稿タイプアーカイブの場合
    if ( $query->is_post_type_archive('campaign') || $query->is_post_type_archive('voice') ) {
        $query->set( 'posts_per_page', '-1' ); // 表示件数を無制限に設定
    }
}
add_action( 'pre_get_posts', 'change_posts_per_page' );



//アーカイブの表示件数変更 複数
// function change_posts_per_page($query) {
//     if ( is_admin() || ! $query->is_main_query() )
//         return;
//     if ( $query->is_archive(array('works','recruit')) ) { //カスタム投稿タイプを指定
//         $query->set( 'posts_per_page', '6' ); //表示件数を指定 -1にする全部表示
//     }
// }
// add_action( 'pre_get_posts', 'change_posts_per_page' );



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
add_action('wp_footer', 'redirect_to_thanks_page');
function redirect_to_thanks_page() {
$homeUrl = home_url(); // トップページのURLを取得
echo <<< EOD
<script>
    document.addEventListener( 'wpcf7mailsent', function( event ) {
    location = '{$homeUrl}/thanks/'; // トップページのURLをリダイレクト先に組み込み
    }, false );
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
	'AboutUsギャラリ',
	'manage_options',
	'about-us-option',
	'dashicons-admin-generic',
	11
);

SCF::add_options_page(
	'codeups-new',
	'FAQ',
	'manage_options',
	'faq-option',
	'dashicons-admin-generic',
	12
);

SCF::add_options_page(
	'codeups-new',
	'料金表',
	'manage_options',
	'price-option',
	'dashicons-admin-generic',
	13
);









?>