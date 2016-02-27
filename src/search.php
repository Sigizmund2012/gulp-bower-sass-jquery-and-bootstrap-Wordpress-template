<?php get_header(); ?>
<?php // Get number of results
$results_count = $wp_query->found_posts;
?>
<div class="jumbotron">
	<div class="container">
		<h1>Поиск <span class="keyword">&ldquo;<?php the_search_query(); ?>&rdquo;</span></h1>
		<?php if ($results_count == '' || $results_count == 0) { // No Results ?>
			<p><span class="label label-danger"><?php _e('Совпадений не найдено'); ?></span>&nbsp; <?php _e('Попробуйте поискать что-нибудь другое.'); ?>
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
</div> <!-- .jumbotron -->

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<?php if (have_posts()) : // Results Found ?>

				<h1><?php _e('Результаты поиска'); ?></h1>
				<?php while (have_posts()) : the_post(); ?>

					<article <?php post_class(); ?>>
						<h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
						</h2>
						<div class="entry">
							<p><?php echo wp_trim_words(get_the_excerpt(), 30, '...'); ?></p>
						</div>
					</article>
					<hr/>

				<?php endwhile; ?>
		</div> <!-- .col-xs-12 -->

	</div> <!-- .row -->
			<?php else : // No Results ?>

				<p><?php _e('Извините, по вашему запросу ничего не найдено, попробуйте поискать на страницах сайта или в записях блога ниже.'); ?></p>
				<div class="row">
					<div class="col-xs-12 col-sm-6">
						<h3><?php _e('Записи в блоге'); ?></h3>
						<ul>
							<?php
							$args = array(
								'numberposts' => '10',
								'post_status' => 'publish'
							);
							$recent_posts = wp_get_recent_posts($args);
							foreach ($recent_posts as $recent) {
								echo '<li><a href="' . get_permalink($recent["ID"]) . '">' . $recent["post_title"] . '</a></li>';
							}
							?>
						</ul>
					</div> <!-- .posts -->
					<div class="col-xs-12 col-sm-6">
						<h3><?php _e('Страницы'); ?></h3>
						<ul>
							<?php wp_list_pages('title_li=&sort_column=menu_order'); ?>
						</ul>
					</div> <!-- .pages -->
				</div> <!-- .row -->

			<?php endif; ?>

</div><!-- .container -->