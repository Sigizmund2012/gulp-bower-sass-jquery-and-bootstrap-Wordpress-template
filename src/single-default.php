<?php get_header(); ?>

<div class="container-fluid single-default-category-heading_wrapper">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="single-default-category-heading">
						<span class="single-default-category-heading__title">
							<?php the_category( ', ' ) ?>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<article role="main">
		<div class="container-fluid single-default_content-general">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="single-default__heading">
								<?php the_title(); ?>
							</h1>
							<span class="single-default__date"><?php the_date( 'j F Y,' ); ?> </span>Автор:<span class="single-default__autor"><?php the_author(); ?></span>
							<div class="single-default__page-text">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>

	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
				?>
			</div>
		</div>
	</div>

<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
