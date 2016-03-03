<div class="container-fluid whyme-wrapper">
	<div class="row">
		<div class="container">
			<article>
				<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					<?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>
			</article>
		</div>
	</div>
</div>