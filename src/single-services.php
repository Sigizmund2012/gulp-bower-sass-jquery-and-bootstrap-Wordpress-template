<?php get_header(); ?>

<div class="container-fluid single-services-category-heading_wrapper">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="single-services-category-heading">
						<span class="single-services-category-heading__title">
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
		<div class="container-fluid single-services_content-general">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="single-services__heading">
								<?php the_title(); ?>
							</h1>
							<div class="single-services__page-text">
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