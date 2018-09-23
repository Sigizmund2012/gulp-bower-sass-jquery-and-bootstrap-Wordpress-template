<!--noindex-->
<footer class="container-fluid footer-general">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-8">
					<section class="information">
						<div class="information__heading">
							<span class="information__smart">Smart</span>
							<span class="information__freelancer">freelancer</span>
						</div>
						<div class="information__text">
							Блог и портфолио фрилансера Smartfreelancer aka Sergey Segeda. Занимаюсь профессиональной вёрсткой сайтов и программированием интерфейсов, также интересуюсь js фреймворками и Node.js. Добро пожаловать!
						</div>
						<div class="information__email">
							<span class="information__email-text">e-mail:</span><span class="information__email-link">segeda823@mail.ru</span>
						</div>
					</section>
				</div>
				<div class="col-md-2 col-sm-4">
					<section class="footer-services">
						<div class="footer-services__heading">Услуги</div>
						<?php wp_nav_menu(array(
							'theme_location' => 'footer-menu-services',
							'container_class' => 'footer-services__nav-wrapper',
							'container' => 'nav',
							'menu_class' => 'footer-services__list',
							'menu_id' => 'footer-services'
						)); ?>
					</section>
				</div>
				<div class="col-md-2 col-md-push-0 col-sm-4 col-sm-push-8">
					<section class="footer-portfolio">
						<div class="footer-portfolio__heading">Портфолио</div>
						<?php wp_nav_menu(array(
							'theme_location' => 'footer-menu-portfolio',
							'container_class' => 'footer-portfolio__nav-wrapper',
							'container' => 'nav',
							'menu_class' => 'footer-portfolio__list',
							'menu_id' => 'footer-portfolio'
						)); ?>
					</section>
				</div>
				<div class="col-md-4 col-md-pull-0 col-sm-8 col-sm-pull-4">
					<section class="from-the-blog">
						<div class="from-the-blog__heading">
							<span class="from-the-blog__posts">записи из</span>
							<span class="from-the-blog__blog">блога</span>
						</div>
						<div class="from-the-blog__list">
							<?php
							$blog_args = array(
								'posts_per_page' => 2,
								'category' => 3 // My blog category
							);
							$blog_posts = get_posts($blog_args);
							?>

							<?php foreach ($blog_posts as $post) : setup_postdata($post); ?>
								<div class="row">
									<div class="col-md-3 col-sm-3 col-xs-4">
										<a href="<?php the_permalink(); ?>">
											<?php the_post_thumbnail('footer-blog-thumb', array('class' => 'from-the-blog__image')); ?>
										</a>
									</div>
									<div class="col-md-9 col-sm-9 col-xs-8">
										<div class="from-the-blog__title"><a
												href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
										<div class="from-the-blog__date">
											<?php echo get_the_date("j F, Y"); ?>
										</div>
									</div>
								</div>
								<?php
							endforeach;
							wp_reset_postdata();
							?>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
	<div class="row footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-2 col-sm-4 col-xs-6">
					<div class="footer-sitedata">
						<span class="footer-sitedata__year"><?php echo date("Y"); ?></span><span class="footer-sitedata__text">Smartfreelancer</span>
					</div>
				</div>
				<div class="col-md-2 col-md-offset-8 col-sm-4 col-sm-offset-4 col-xs-6 col-xs-offset-0">
					<div class="footer-social">
						<span class="footer-social__twitter"><a href=""></a></span>
						<span class="footer-social__rss"><a href="/feed/"></a></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!--/noindex-->

<!-- Search engine counters -->

<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-75336888-1', 'auto');
	ga('send', 'pageview');

</script>

<!-- Yandex.Metrika counter -->
<script type="text/javascript">
	(function (d, w, c) {
		(w[c] = w[c] || []).push(function() {
			try {
				w.yaCounter36219675 = new Ya.Metrika({
					id:36219675,
					clickmap:true,
					trackLinks:true,
					accurateTrackBounce:true,
					webvisor:true,
					trackHash:true
				});
			} catch(e) { }
		});

		var n = d.getElementsByTagName("script")[0],
			s = d.createElement("script"),
			f = function () { n.parentNode.insertBefore(s, n); };
		s.type = "text/javascript";
		s.async = true;
		s.src = "https://mc.yandex.ru/metrika/watch.js";

		if (w.opera == "[object Opera]") {
			d.addEventListener("DOMContentLoaded", f, false);
		} else { f(); }
	})(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/36219675" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->

<!-- End search engine counters -->

<?php wp_footer(); ?>
</body>
</html>