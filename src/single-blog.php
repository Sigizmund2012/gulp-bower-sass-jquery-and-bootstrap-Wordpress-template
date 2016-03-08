<?php get_header(); ?>

<div class="container-fluid single-blog-category-heading_wrapper">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="single-blog-category-heading">
						<span class="single-blog-category-heading__title">
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
		<div class="container-fluid single-blog_content-general">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="single-blog__heading">
								<?php the_title(); ?>
							</h1>
							<span class="single-blog__date"><?php the_date( 'j F Y,' ); ?> </span>Автор:<span class="single-blog__autor"><?php the_author(); ?></span>
							<div class="single-blog__page-text">
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