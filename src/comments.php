<?php

if ( post_password_required() ) {
	return;
}
?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comments-title">
			Комментариев:
			<?php
				echo get_comments_number();
			?>
		</h3>

		<ul class="comments-list">
			<?php
				$comments_list_args = array(
					'style'       => 'ul',
					'max_depth'  => 3,
					'short_ping'  => true,
					'avatar_size' => 70,
					'callback' => smart_comment // Коллбек, формирующий список комментариев, находится в functions.php
				);
				wp_list_comments( $comments_list_args );
			?>
		</ul>

	<?php endif; ?>

	<?php
		// Если комментарии закрыты, добавляем текст об этом
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Комментарии закрыты.' ); ?></p>
	<?php endif; ?>

	<?php

	$commentator_fields =  array(

		'author' =>
			'<p>' .
			'<input class="comment-form__author" id="author" placeholder="Имя" name="author" type="text"
value="' . esc_attr( $commenter['comment_author'] ) .
			'" size="30"' . $aria_req . ' /></p>',

		'email' =>
			'<p>' .
			'<input class="comment-form__email" id="email" placeholder="e-mail" name="email"
type="email"
value="' . esc_attr(  $commenter['comment_author_email'] ) .
			'" size="30"' . $aria_req . ' /></p>',

		'url' =>
			'',
	);

	$form_args = array(
		'fields' => $commentator_fields,
		'class_submit' => 'comment-form__submit',
		'class_form' => 'comment-form',
		'comment_notes_before' => '',
		'comment_field' => '<p><textarea class="comment-form__comment" name="comment" aria-required="true"></textarea></p>',
		'label_submit' => 'Отправить'
	);
	comment_form( $form_args );

	?>