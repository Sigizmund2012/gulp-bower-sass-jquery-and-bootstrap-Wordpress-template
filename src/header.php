<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta charset="<?php bloginfo('charset'); ?>"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<title><?php wp_title('-', true, 'right'); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11"/>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>"/>
	<?php wp_head(); ?>
</head>
<body>
<header class="container-fluid header_general">
	<div class="row">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-3 col-md-3">
					<a href="<?php echo site_url(); ?>" class="logo"><span class="logo__smart">Smart</span><span
							class="logo__freelancer">freelancer</span></a>
				</div>
				<?php wp_nav_menu(array(
					'theme_location' => 'header-menu',
					'container_class' => 'col-xs-12 col-sm-8 col-md-8',
					'container' => 'nav',
					'menu_class' => 'nav nav-pills header-menu-custom',
					'menu_id' => 'topmenu'
				)); ?>
				<div class="col-xs-12 col-sm-1 col-md-1">
					<div class="search" data-toggle="modal" data-target="#modal-search"></div>
					<!-- Modal search -->
					<div class="modal fade" id="modal-search" tabindex="-1" role="dialog">
						<div class="modal-dialog modal-sm" role="document">
							<div class="modal-content">
								<div class="modal-body">
									<?php get_search_form(); ?>
								</div>
							</div>
						</div>
					</div>
					<!-- End Modal search -->
				</div>
			</div>
		</div>
	</div>
</header>
