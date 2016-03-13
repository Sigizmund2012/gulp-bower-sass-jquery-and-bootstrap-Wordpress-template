<?php get_header(); ?>
<?php // Get number of results
$results_count = $wp_query->found_posts;
?>

	<div class="container-fluid">
		<div class="row">
			<div class="container">
				<h1 class="search__heading">Поиск <span>&laquo;<?php the_search_query(); ?>&raquo;</span></h1>
				<?php if ($results_count == '' || $results_count == 0) { // No Results ?>
					<p><span
							class="label label-danger"><?php _e('Совпадений не найдено'); ?></span>&nbsp; <?php _e('Попробуйте поискать что-нибудь другое.'); ?>
					</p>
				<?php } else { // Results Found ?>
					<p><span class="label label-success"><?php echo __('Результаты: ') . $results_count; ?></span></p>
				<?php } // end results check ?>
				<div class="row">
					<div class="col-xs-12">
						<?php get_search_form(); ?>
					</div>
				</div>
			</div> <!-- .container -->

			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<?php if (have_posts()) : // Results Found  ?>

						<h2 class="search__results-heading"><?php _e('Результаты поиска'); ?></h2>
						<?php while (have_posts()) : the_post(); ?>

							<article <?php post_class(); ?>>
								<h3 class="search__results-post-title" id="post-<?php the_ID(); ?>"><a
										href="<?php the_permalink() ?>"><?php the_title(); ?></a>
								</h3>
								<div class="entry">
									<p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
								</div>
							</article>

						<?php endwhile; ?>
					</div> <!-- .col-xs-12 -->

				</div> <!-- .row -->

				<?php else : // No Results ?>

					<div class="row">
						<div class="col-xs-12">
							<p class="search__sorry"><?php _e('Извините, по вашему запросу ничего не найдено, попробуйте поискать на страницах сайта или в записях рубрик ниже.'); ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="posts-from-categories">
								<h3 class="posts-from-categories__heading"><?php _e('Записи в рубриках'); ?></h3>
								<ul class="posts-from-categories__list">
									<?php
									$args = array(
										'numberposts' => '10',
										'post_status' => 'publish'
									);
									$recent_posts = wp_get_recent_posts($args);
									foreach ($recent_posts as $recent) {
										echo '<li class="posts-from-categories__list-item"><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li>';
									}
									?>
								</ul>
							</div>
						</div> <!-- .posts -->
						<div class="col-xs-12 col-sm-6">
							<div class="list-pages">
							<h3 class="list-pages__heading"><?php _e('Страницы'); ?></h3>
							<ul class="list-pages__list">
								<?php wp_list_pages( array(
									'post_status' => 'publish',
									'title_li' => null
								)); ?>
							</ul>
							</div>
						</div> <!-- .pages -->
					</div> <!-- .row -->

				<?php endif; ?>

			</div><!-- .container -->
		</div> <!-- .row -->
	</div> <!-- .container-fluid -->

<?php get_footer(); ?>