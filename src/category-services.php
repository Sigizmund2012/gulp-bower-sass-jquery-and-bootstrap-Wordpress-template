<?php get_header(); ?>

<?php if (have_posts()) :  ?>
	<div class="container-fluid services-heading_wrapper">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<div class="services-heading">
							<h1 class="services-heading__title">
								<?php echo single_cat_title( '', false ); ?>
							</h1>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid posts-services_wrapper">
	<div class="row">
	<div class="container">
	<?php while (have_posts()) : the_post(); ?>
		<div class="row post-services_general">
			<div class="col-md-5 col-sm-5">
				<?php the_post_thumbnail('services-thumb', array('class' => 'post-services__image')); ?>
			</div>
			<div class="col-md-7 col-sm-7">
				<section class="post-services">
					<h2 class="post-services__heading"><a class="post-services__heading_link" href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2>
					<div class="post-services_content"><?php the_excerpt (); ?></div>
					<div class="post-services__readmore"><a class="post-services__readmore_link" href="<?php the_permalink(); ?>">Продолжить чтение</a></div>
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
						<div class="services-navigation">
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