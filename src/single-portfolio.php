<?php get_header(); ?>

<div class="container-fluid single-portfolio-category-heading_wrapper">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="single-portfolio-category-heading">
						<span class="single-portfolio-category-heading__title">
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
		<div class="container-fluid single-portfolio_content-general">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="single-portfolio__heading">
								<?php the_title(); ?>
							</h1>
							<span class="single-portfolio__date"><?php the_date( 'j F Y,' ); ?> </span>Автор:<span class="single-portfolio__autor"><?php the_author(); ?></span>
							<div class="single-portfolio__page-text">
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

<?php get_footer(); ?>