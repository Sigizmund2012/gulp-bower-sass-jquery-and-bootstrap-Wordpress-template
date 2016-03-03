<?php get_header(); ?>

<?php
if (is_front_page()) {
	get_sidebar('services');
	get_sidebar('whyme');
} else {
	?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article role="main">
		<div class="container-fluid content-top">
		<div class="row">
		<div class="container">

		<div class="row">
			<div class="col-xs-12">
				<h1 class="content-top__heading"><?php the_title(); ?></h1>
			</div>
		</div>

	</div>
	</div>
	</div>

	<div class="container-fluid page-content-general">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
							<div class="page-text">
								<?php the_content(); ?>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		</article>
	<?php endwhile; ?>
	<?php endif; ?>

<?php } ?>

<?php get_footer(); ?>