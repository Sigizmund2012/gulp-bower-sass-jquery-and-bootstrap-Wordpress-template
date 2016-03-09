<?php get_header(); ?>

<div class="container-fluid single-default-category-heading_wrapper">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="single-default-category-heading">
						<span class="single-default-category-heading__title">
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
		<div class="container-fluid single-default_content-general">
			<div class="row">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<h1 class="single-default__heading">
								<?php the_title(); ?>
							</h1>
							<span class="single-default__date"><?php the_date( 'j F Y,' ); ?> </span>Автор:<span class="single-default__autor"><?php the_author(); ?></span>
							<div class="single-default__page-text">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</article>
	<!-- Social block -->
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<div class="social-block">
					<script type="text/javascript">(function() {
							if (window.pluso)if (typeof window.pluso.start == "function") return;
							if (window.ifpluso==undefined) { window.ifpluso = 1;
								var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
								s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
								s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
								var h=d[g]('body')[0];
								h.appendChild(s);
							}})();</script>
					<div class="pluso" data-background="transparent" data-options="medium,square,line,horizontal,nocounter,theme=08" data-services="vkontakte,odnoklassniki,facebook,twitter,google,moimir"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- Comments block -->
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
