<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package construction
 */

?>

<footer id="colophon" class="site-footer">
	<div class="footer-container">
		<div class="footer-grid">
			<div class="footer-col footer-branding">
				<div class="footer-logo">
					<img src="<?php bloginfo('template_directory'); ?>/images/logo.png" alt="logo">
					<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a></h1>
				</div>

				<p class="footer-description"><?php echo esc_html(get_bloginfo('description')); ?></p>

				<div class="footer-social">
					<a href="#" aria-label="Facebook" class="social-icon"><i class="fab fa-facebook-f"></i></a>
					<a href="#" aria-label="YouTube" class="social-icon"><i class="fab fa-youtube"></i></a>
					<a href="#" aria-label="Instagram" class="social-icon"><i class="fab fa-instagram"></i></a>
					<a href="#" aria-label="TikTok" class="social-icon"><i class="fab fa-tiktok"></i></a>
				</div>
			</div>

			<div class="footer-col footer-links">
				<h3 class="footer-title"><?php esc_html_e('Liên kết', 'construction'); ?></h3>
				<nav class="main-navigation">
					<?php wp_nav_menu(array('theme_location' => 'menu-2', 'container' => 'ul', 'menu_class' => 'navbar-nav')); ?>
				</nav>
			</div>

			<div class="footer-col footer-services">
				<h3 class="footer-title"><?php esc_html_e('Dịch vụ', 'construction'); ?></h3>
				<nav class="main-navigation">
					<?php wp_nav_menu(array('theme_location' => 'menu-3', 'container' => 'ul', 'menu_class' => 'navbar-nav')); ?>
				</nav>
			</div>

			<div class="footer-col footer-contact">
				<h3 class="footer-title"><?php esc_html_e('Liên hệ', 'construction'); ?></h3>
				<nav class="main-navigation">
					<ul class="navbar-nav">
						<li><i class="fas fa-map-marker-alt"></i> <span>123 Đường Nguyễn Văn Linh, Quận 7, TP. Hồ Chí Minh</span></li>
						<li><i class="fas fa-phone"></i> <a href="tel:+84123456789">+84 123 456 789</a></li>
						<li><i class="fas fa-envelope"></i> <a href="mailto:info@hoangnhatminh.com">info@hoangnhatminh.com</a></li>
					</ul>
				</nav>

			</div>
		</div>

		<hr class="footer-sep" />

		<div class="footer-bottom">
			<p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('Tất cả quyền được bảo lưu.', 'construction'); ?></p>
		</div>
	</div>
</footer>
</div>

<?php wp_footer(); ?>

</body>

</html>
