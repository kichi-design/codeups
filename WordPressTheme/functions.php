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

//アーカイブの表示件数変更
function change_posts_per_page($query) {
    if ( is_admin() || ! $query->is_main_query() )
        return;
    if ( $query->is_archive('campaign') ) { //カスタム投稿タイプを指定
        $query->set( 'posts_per_page', '-1' ); //表示件数を指定 -1にする全部表示
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


