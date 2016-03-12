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
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<?php the_post_thumbnail('portfolio-category-thumb', array('class' => 'project-image')); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-md-8">
							<div class="single-portfolio__page-text">
								<h2 class="single-portfolio__page-text-title">Описание проекта</h2>
								<?php the_content(); ?>
							</div>
						</div>
						<div class="col-md-4">
							<section class="project-details">
								<h2 class="project-details__title">Детали проекта</h2>
								<div class="project-details__year clearfix"><span class="project-details__year-title">Дата релиза</span><span class="project-details__year-description"><?php echo get_post_meta($post->ID, 'portfolio_release_date', true); ?></span></div>
								<div class="project-details__tech clearfix"><span class="project-details__tech-title">Технологии</span><span class="project-details__tech-description"><?php echo get_post_meta($post->ID, 'portfolio_technologies', true); ?></span></div>
								<div class="project-details__url clearfix"><span class="project-details__url-title">Url проекта</span><span class="project-details__url-description"><a target="_blank" href="<?php echo get_post_meta($post->ID, 'portfolio_site_url', true); ?>">Открыть проект</a></span></div>
							</section>
						</div>
					</div>

				</div>
			</div>
		</div>
	</article>

<?php endwhile; ?>
<?php endif; ?>

	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<h4 class="recent-projects__title">Похожие проекты</h4>
					</div>
				</div>
				<aside class="row recent-projects">
					<?php global $post;
					$categories = get_the_category();
					foreach ($categories as $category) :
					?>

						<?php
						$posts = get_posts('numberposts=4&category='. $category->term_id . '&orderby=rand');
						foreach($posts as $post) :
							?>
							<div class="col-sm-6 col-md-3">
								<div class="recent-projects__content">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('portfolio-recent-project', array('class' => 'recent-projects__image')); ?>
									</a>
									<a class="btn btn-primary visible-xs visible-sm" href="<?php the_permalink(); ?>">
										<?php the_title() ?>
									</a>
									<a class="recent-projects__data" href="<?php the_permalink(); ?>">
										<div class="recent-projects__data-title">
											<?php the_title() ?>
										</div>
									</a>
								</div>
							</div>
						<?php endforeach; ?>

						<?php endforeach; ?>

				</aside>
			</div>
		</div>
	</div>

<?php get_footer(); ?>