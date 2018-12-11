<?php
/**
 * SAA functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SAA
 */

if ( ! function_exists( 'saa_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function saa_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on SAA, use a find and replace
	 * to change 'saa' to the name of your theme in all the template files.
	 */
	//load_theme_textdomain( 'saa', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'global' => esc_html__( 'グローバルメニュー', 'saa' ),
        'footer' => esc_html__( 'フッターメニュー', 'saa' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	/*
	 * カスタムヘッダー画像
	 */
    $custom_header_support = array(
      'width' => 1200,
      'flex-height' => true,
      'header-text' => false,
      'default-image' => get_template_directory_uri() . '/img/top1200w.jpg',
    );
    add_theme_support( 'custom-header', $custom_header_support );
}
endif;
add_action( 'after_setup_theme', 'saa_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function saa_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'saa' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<section id="%1$s" class="c-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="c-widget__title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'saa_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function saa_scripts() {
  wp_enqueue_style( 'saa-style', get_stylesheet_uri() );
  wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );
  wp_enqueue_script( 'saa-scripts', get_template_directory_uri() . '/js/saa-scripts.js', array( 'jquery' ), null, true );

  if ( is_front_page() ) {
    wp_register_script( 'saa-google-maps-api', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCDgti_h_PT9-IWJCqZdu_XlG7p7ZJg4dc', null, null, true );
    wp_enqueue_script( 'saa-initialize-map', get_template_directory_uri() . '/js/initialize-map.js', array( 'saa-google-maps-api' ), null, true );
  }
}
add_action( 'wp_enqueue_scripts', 'saa_scripts' );

/**
 * カスタム投稿タイプ
 */
function saa_create_post_type() {
  register_post_type( 'info',
    array(
      'labels' => array(
        'name' => 'info',
        'singular_name' => 'info',
      ),
      'public' => false,
      'show_ui' => true,
      'menu_position' => 5,
      'has_archive' => true,
      'supports' => array(
        'title',
        'editor',
      ),
    )
  );

  register_post_type( 'work',
    array(
      'labels' => array(
        'name' => 'work',
        'singular_name' => 'work',
      ),
      'public' => true,
      'menu_position' => 5,
      'has_archive' => true,
      'supports' => array(
        'title',
      ),
    )
  );
}
add_action( 'init', 'saa_create_post_type', 1 );

/**
 * カスタム分類
 */
function saa_create_taxonomies() {
  register_taxonomy( 'genre', array( 'work' ),
    array(
      'labels' => array(
        'name' => '作品ジャンル',
        'singular_name' => '作品ジャンル',
      ),
      'show_ui' => true,
      'show_admin_column' => true,
      'show_in_nav_menus' => true,
      'hierarchical' => true,
    )
  );
}
add_action( 'init', 'saa_create_taxonomies', 0 );

/**
 * ブログ個別ページのリンクから「#more-ID」を削除
 */
function saa_remove_more_link_scroll( $link ) {
  $link = preg_replace( '/#more-[0-9]+/', '', $link );
  return $link;
}
add_filter( 'the_content_more_link', 'saa_remove_more_link_scroll' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * テーマの自動更新を有効化
 */
add_filter( 'auto_update_theme', '__return_true' );

/**
 * プラグインの自動更新を有効化
 */
add_filter( 'auto_update_plugin', '__return_true' );
