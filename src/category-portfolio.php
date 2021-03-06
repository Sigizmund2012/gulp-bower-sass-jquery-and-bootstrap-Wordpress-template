<?php get_header(); ?>

<?php if (have_posts()) :  ?>
	<div class="container-fluid portfolio-heading_wrapper">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="portfolio-heading">
							<h1 class="portfolio-heading__title">
								<?php echo single_cat_title( '', false ); ?>
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid posts-portfolio_wrapper">
	<div class="row">
	<div class="container">
	<?php while (have_posts()) : the_post(); ?>
		<div class="row post-portfolio_general">

			<div class="col-md-6 col-sm-6">
				<?php the_post_thumbnail('portfolio-thumb', array('class' => 'post-portfolio__image')); ?>
			</div>
			<div class="col-md-6 col-sm-6">
				<section class="post-portfolio">
					<h2 class="post-portfolio__heading"><a class="post-portfolio__heading_link" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
					<div class="post-portfolio__content"><?php the_excerpt (); ?></div>
					<div class="post-portfolio__links clearfix">
						<div class="post-portfolio__readmore"><a class="post-portfolio__readmore_link" href="<?php the_permalink(); ?>">Показать детали</a></div>
					</div>
				</section>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>
	</div>
	</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="portfolio-navigation">
							<?php
							the_posts_pagination( array(
								'mid_size'  => 2,
								'prev_text' => __( '', 'textdomain' ),
								'next_text' => __( '', 'textdomain' ),
							) );
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>