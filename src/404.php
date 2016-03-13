<?php get_header(); ?>

<div class="container-fluid">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="not-found__title">К сожалению, вы попали на несуществующую страницу, воспользуйтесь формой поиска или списком страниц и записей ниже</h1>
					<?php get_search_form(); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-6">
					<div class="posts-from-categories">
						<h2 class="posts-from-categories__heading"><?php _e('Записи в рубриках'); ?></h2>
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
						<h2 class="list-pages__heading"><?php _e('Страницы'); ?></h2>
						<ul class="list-pages__list">
							<?php wp_list_pages( array(
								'post_status' => 'publish',
								'title_li' => null
							)); ?>
						</ul>
					</div>
				</div> <!-- .pages -->
			</div> <!-- .row -->
		</div>
	</div>
</div>

<?php get_footer(); ?>
