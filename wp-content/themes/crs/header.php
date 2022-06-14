<?php
	global $post;
	$page_slug = $post->post_name;
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title><?php wp_title('|', true, 'right'); ?></title>

		<link rel="icon" href="<?php echo site_url(); ?>/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700;900&display=swap" rel="stylesheet">
		
		<?php wp_head(); ?>
		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
		<link rel="stylesheet" href="<?php print CSSROOT; ?>/wp-blocks.css">

		<script type="text/javascript" src="https://www.bugherd.com/sidebarv2.js?apikey=cf1xqgkxpunbxq8xwwpibq" async="true"></script>
	</head>
	<body class="pg_<?php echo $page_slug; ?>">
		<div id="page_wrap">
			<header>
				<div class="container">
					<div class="row">
						<div class="col-5 col-md-3">
							<a href="<?php echo site_url(); ?>" class="main-logo"><img src="<?php print IMAGES; ?>/crs-logo.svg" class="img-fluid" /></a>
						</div>
						<div class="col-7 col-md-9 top-btn-wrap">
							<?php if(get_field('customer_login', 'option')) { ?>
							<a href="<?php echo get_field('customer_login', 'option'); ?>" class="btn">Customer Login</a>
							<?php } ?>
						</div>

						<div id="menu-launcher" class="navbtn" @click="toggleNav()">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
				
			</header>
			
			<div id="popup-menu" class="mobile-nav" v-bind:class="[ navOpen === 1 ? 'open' : '' ]">
				<div id="menu-launcher" class="navbtn inside-menu open" @click="toggleNav()">
					<span></span>
					<span></span>
					<span></span>
				</div>
				<div class="inside">
					<div class="container">
						<div class="row">
							<div class="col-12 col-md-11 offset-md-1 col-lg-10 offset-lg-2">
								<?php
								wp_nav_menu( array(
									'theme_location'	=> 'header-menu',
									'depth'				=> 2,
									'container'			=> 'div',
									'container_class'	=> '',
									'container_id'		=> 'menu-wrap',
									'menu_class'		=> 'navbar-nav',
									'fallback_cb'		=> 'WP_Bootstrap_Navwalker::fallback',
									'walker'			=> new WP_Bootstrap_Navwalker())
								);
								?>

								<div class="mobile-login">
									<?php if(get_field('customer_login', 'option')) { ?>
									<a href="<?php echo get_field('customer_login', 'option'); ?>" class="btn">Customer Login</a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		