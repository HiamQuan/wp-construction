<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package construction
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/libs/owlcarousel/dist/assets/owl.carousel.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/libs/owlcarousel/dist/assets/owl.theme.default.min.css" />
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/sass/main.css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<header class="site-header">
			<div class="header-wrapper">
				<div class="site-branding">
					<div class="logo">
						<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="logo">
					</div>
					<div class="site-title">
						<a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
					</div>
				</div>

				<nav class="main-navigation">
					<div class="menu-toggle" id="menu-toggle">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<?php wp_nav_menu(array('theme_location' => 'menu-2', 'container' => 'ul', 'menu_class' => 'navbar-nav')); ?>
				</nav>
			</div>
		</header>

		<script>
			const menuToggle = document.getElementById('menu-toggle');
			const navbarNav = document.querySelector('.navbar-nav');
			menuToggle.addEventListener('click', () => {
				const isActive = menuToggle.classList.toggle('active');
				if (navbarNav) {
					navbarNav.classList.toggle('open', isActive);
				}
			});
		</script>