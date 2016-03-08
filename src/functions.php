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
	add_image_size( 'blog-thumb', 300, 200 ); // для вывода записей из блога
	add_image_size( 'category-thumb', 300, 200 ); // для вывода записей из дефолтной рубрики
}

// Размер предисловия записи на странице рубрики
function smart_excerpt_length($length) {
	return 40; // 40 слов
}
add_filter('excerpt_length', 'smart_excerpt_length');

// Добавляем noindex,nofollow на 404 странице
function smart_404_noindex () {
	if (is_404()) {
		echo "".'<meta name="robots" content="noindex,nofollow" />'."\n";
	}
}
add_action('wp_head', 'smart_404_noindex', 3); // добавляем свой noindex,nofollow в head

// Функция, формирующая список комментариев
function smart_comment($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? 'comments-list__child' : 'comments-list__item' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comments-list__comment-body">
	<?php endif; ?>
	<div class="comments-list__author">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
		<?php printf( __( '<div class="comments-list__author-link">%s</div>' ), get_comment_author_link() ); ?>
		<div class="comments-list__commentmetadata hidden-xs"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
			?>
		</div>
		<div class="comments-list__reply">
			<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
		<em class="comments-list__awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
		<br />
	<?php endif; ?>

	<div class="comments-list__comment-text"><?php comment_text(); ?></div>

	<?php if ( 'div' != $args['style'] ) : ?>
		</div>
	<?php endif; ?>
	<?php
}
