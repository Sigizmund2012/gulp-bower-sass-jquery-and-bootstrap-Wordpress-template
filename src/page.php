<?php get_header(); ?>

<?php
	if( is_front_page() ){
		get_sidebar( 'services' );
		get_sidebar( 'whyme' );
	}
	else{
?>

	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<article role="main">
					<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
						<h1><?php the_title(); ?></h1>
						<?php the_content(); ?>
					<?php endwhile; ?>
					<?php endif; ?>
				</article>
			</div>
		</div>
	</div>

	<?php } ?>

<?php get_footer(); ?>