<?php get_header(); ?>

	<div class="container-fluid services-wrapper">
		<div class="row">
			<div class="container">
				<div class="row">
					<?php
					$category_services = get_category(194); // My services category
					$url = home_url();
					?>
					<div class="col-xs-12">
							<div class="services-cat clearfix">
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
							</div>
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

	<div class="container-fluid whyme-wrapper">
		<div class="row">
			<div class="container">
				<div class="row">
					<div class="col-xs-12">
						<section class="whyme">
							<h3 class="whyme__heading">Почему вам стоит выбрать меня?</h3>
							<p class="whyme__description">
								Мои конкурентные преимущества по сравнению с другими исполнителями.
							</p>
						</section>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-4 col-md-3">
						<section class="choose-me">
							<h4 class="choose-me__heading">Преимущества</h4>
							<ul class="choose-me__list">
								<li class="choose-me__list-item">Чесность с клиентом. Я не берусь за работу, которую не могу выполнить</li>
								<li class="choose-me__list-item">Исполнительность. Работа будет выполнена, несмотря ни на что</li>
								<li class="choose-me__list-item">Всегда на связи, не пропадаю</li>
								<li class="choose-me__list-item">Не усложняю. Если работу можно сделать просто и дёшево, она будет сделана просто и дёшево</li>
								<li class="choose-me__list-item">Шаблоны вестаю максимально точно, без отсебятины</li>
								<li class="choose-me__list-item">Люблю свою профессию</li>
							</ul>
						</section>
					</div>
					<div class="col-xs-12 col-sm-8 col-md-6">
						<section class="advantages">
							Lorem ipsum dolor sit amet, consectetur adipisicing elit. Recusandae expedita rem excepturi fugit quisquam quas tempora atque quasi, provident voluptas delectus quidem doloribus unde quae ad, vero voluptate ea repellendus eum reprehenderit. Laudantium esse harum, mollitia sint commodi ipsa accusantium. Deleniti reprehenderit pariatur quia sed ab excepturi quis quo voluptas! Incidunt ipsam explicabo voluptate molestiae, ut, quaerat iste pariatur veritatis sapiente, quia delectus ratione? Nulla omnis molestias aspernatur voluptas itaque accusantium nam iste perspiciatis neque. Ab illo quam earum eligendi inventore totam, reprehenderit. Consectetur dignissimos facilis et ex neque blanditiis ipsam, quis numquam aperiam consequuntur atque delectus. Similique accusantium, cum! Incidunt ipsam explicabo voluptate molestiae, ut, quaerat iste pariatur veritatis sapiente, quia delectus ratione? Nulla omnis molestias aspernatur voluptas itaque accusantium nam iste perspiciatis neque. Ab illo quam earum eligendi inventore totam, reprehenderit. Consectetur dignissimos facilis et ex neque blanditiis ipsam, quis numquam aperiam consequuntur atque delectus.
						</section>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-3">
						<section class="clients-say">
							<h4 class="clients-say__heading">Отзывы клиентов</h4>
							<div class="clients-say__mention">
								Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum in inventore ipsum labore laborum nobis quaerat quidem, quo rem tempora.
							</div>
						</section>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>