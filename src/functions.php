<?php // ==== ФУНКЦИИ ==== //

function is_login_page() {
    return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
}

// Минимальные настройки для работы темы
function voidx_setup() {

  // Загрузка языков
  load_theme_textdomain( 'voidx', trailingslashit( get_template_directory() ) . 'languages' );

  // Поддержка HTML5; подключаем здесь, чтобы избежать внедрения стилей WordPress по-умолчанию
  add_theme_support( 'html5', array( 'search-form', 'gallery' ) );

  // Автоматическое добавление ссылок на feed в <head>
  add_theme_support( 'automatic-feed-links' );

  // Добавляем основной файл стилей в <head>
  if( ! is_admin() and ! is_login_page() ){
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
  }
  // Подключаем основной файл скриптов в <head>
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', array(), false, true );

  // $content_width ограничивает максимальную ширину изображений, загружаемых через визуальный редактор
  // Должен быть установлен единожды; Ничего с ним не делайте, это часть ядра WordPress
  global $content_width;
  if ( !isset( $content_width ) || !is_int( $content_width ) )
    $content_width = (int) 960;
}

add_action( 'after_setup_theme', 'voidx_setup', 11 );

// Регистрируем меню
function register_my_menus() {
	register_nav_menus(
		array(
			'header-menu' => __( 'Header Menu' ),
			'footer-menu-services' => __( 'Footer Menu Services' ),
			'footer-menu-portfolio' => __( 'Footer Menu Portfolio' )
		)
	);
}
add_action( 'init', 'register_my_menus' );

// Добавляем поддержку миниатюр
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // Размер миниатюр по-умолчанию 150 на 150 пикселей
	// добавочные размеры картинок
	add_image_size( 'footer-blog-thumb', 70, 70 ); // для вывода в футере записей из блога
}