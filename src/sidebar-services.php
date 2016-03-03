<div class="container-fluid services-wrapper">
	<div class="row">
		<div class="container">
			<div class="row">
				<?php
				$category_services = get_category(194); // My services category
				$url = home_url();
				?>
				<div class="col-xs-12">
					<section class="services-cat clearfix">
						<div class="col-sm-9">
							<h1 class="services-cat__heading">Услуги, которые вы можете заказать у меня</h1>
							<p class="services-cat__description"><?php echo $category_services->description ?>
							</p>
						</div>
						<div class="col-sm-3">
							<div class="services-cat__link-wrapper">
								<a href="<?php echo $url . "/category/" . $category_services->slug . "/" ?>"
								   class="services-cat__link">Весь&nbsp;список
								</a>
							</div>
						</div>
					</section>
				</div>
			</div>
			<div class="row">
				<?php
				$args = array(
					'posts_per_page' => 4,
					'category' => 194 // My services category
				);
				$myposts = get_posts($args);
				$i = 0;
				?>

				<?php foreach ($myposts as $post) : setup_postdata($post); ?>

					<div class="col-xs-12 col-sm-6 col-md-3">
						<section class="post-service">
							<div class="post-service__icon post-service__icon_number_<?php echo ++$i ?>"></div>
							<h2 class="post-service__title">
								<?php echo $post->post_title ?>
							</h2>
							<div class="post-service__content">
								<?php
								$postcontent = $post->post_content;
								$string_width = 200; // limit of string characters
								if (strlen($postcontent) > $string_width) {
									$postcontent = wordwrap($postcontent, $string_width);
									$postcontent = substr($postcontent, 0, strpos($postcontent, "\n"));
								}
								echo $postcontent;
								?>
							</div>
							<div class="post-service__link">
								<a href="<?php the_permalink(); ?>" class="post-service__link-anchor">Подробнее</a>
							</div>
						</section>
					</div>

					<?php
				endforeach;
				wp_reset_postdata();
				?>
			</div>
		</div>
	</div>
</div>