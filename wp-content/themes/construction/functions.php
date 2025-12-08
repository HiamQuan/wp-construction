<?php

/**
 * construction functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package construction
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function construction_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on construction, use a find and replace
		* to change 'construction' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('construction', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'construction'),
			'menu-2' => esc_html__('Header', 'construction'),
			'menu-3' => esc_html__('Footer', 'construction'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'construction_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'construction_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function construction_content_width()
{
	$GLOBALS['content_width'] = apply_filters('construction_content_width', 640);
}
add_action('after_setup_theme', 'construction_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function construction_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'construction'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'construction'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'construction_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function construction_scripts()
{
	wp_enqueue_style('construction-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('construction-style', 'rtl', 'replace');

	wp_enqueue_script('jquery');

	wp_enqueue_script(
		'owlcarousel',
		get_template_directory_uri() . '/libs/owlcarousel/dist/owl.carousel.min.js',
		array('jquery'),
		'2.3.4',
		true
	);

	wp_enqueue_script(
		'category-carousel',
		get_template_directory_uri() . '/js/category-carousel.js',
		array('jquery', 'owlcarousel'),
		_S_VERSION,
		true
	);

	wp_enqueue_script(
		'banner-carousel',
		get_template_directory_uri() . '/js/banner-carousel.js',
		array('jquery', 'owlcarousel'),
		_S_VERSION,
		true
	);

	wp_enqueue_script(
		'main',
		get_template_directory_uri() . '/js/main.js',
		array(),
		_S_VERSION,
		true
	);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'construction_scripts');

function construction_register_home_cpts()
{
	register_post_type(
		'construction_project',
		array(
			'labels'       => array(
				'name'          => __('project', 'construction'),
				'singular_name' => __('project', 'construction'),
				'add_new'       => __('Add project', 'construction'),
				'add_new_item'  => __('Add new project', 'construction'),
				'edit_item'     => __('Edit project', 'construction'),
				'all_items'     => __('All projects', 'construction'),
			),
			'public'       => true,
			'show_ui'      => true,
			'show_in_menu' => true,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
			'taxonomies'   => array('category', 'post_tag'),
			'has_archive'  => false,
			'rewrite'      => false,
			'show_in_rest' => true,
		)
	);
}
add_action('init', 'construction_register_home_cpts');


/**
 * Category thumbnail (image URL) meta for project categories.
 * Allows setting a separate image per category, independent of projects.
 */
function construction_category_add_thumbnail_field($taxonomy)
{
?>
	<div class="form-field term-group">
		<label for="construction_category_image"><?php esc_html_e('Category image URL', 'construction'); ?></label>
		<input type="hidden" id="construction_category_image" name="construction_category_image" value="" class="widefat" />
		<p>
			<button type="button" class="button construction-category-image-upload"><?php esc_html_e('Select image', 'construction'); ?></button>
		</p>
		<div class="construction-category-image-preview" style="margin-top:10px; display:none;">
			<img src="" alt="<?php esc_attr_e('Category preview', 'construction'); ?>" style="max-width:150px;height:auto;" />
		</div>
		<p class="description"><?php esc_html_e('Select image from Media Library or paste image URL to use as category thumbnail.', 'construction'); ?></p>
	</div>
<?php
}
add_action('category_add_form_fields', 'construction_category_add_thumbnail_field');

function construction_category_edit_thumbnail_field($term, $taxonomy)
{
	$image_url = get_term_meta($term->term_id, 'construction_category_image', true);
?>
	<tr class="form-field term-group-wrap">
		<th scope="row">
			<label for="construction_category_image"><?php esc_html_e('Category image URL', 'construction'); ?></label>
		</th>
		<td>
			<input type="hidden" id="construction_category_image" name="construction_category_image" value="<?php echo esc_attr($image_url); ?>" class="regular-text" />
			<p>
				<button type="button" class="button construction-category-image-upload"><?php esc_html_e('Select image', 'construction'); ?></button>
				<button type="button" class="button construction-category-image-remove"><?php esc_html_e('Remove image', 'construction'); ?></button>
			</p>
			<div class="construction-category-image-preview" style="margin-top:10px;<?php echo $image_url ? '' : ' display:none;'; ?>">
				<?php if ($image_url) : ?>
					<img src="<?php echo esc_url($image_url); ?>" alt="<?php esc_attr_e('Category preview', 'construction'); ?>" style="max-width:150px;height:auto;" />
				<?php else : ?>
					<img src="" alt="<?php esc_attr_e('Category preview', 'construction'); ?>" style="max-width:150px;height:auto;" />
				<?php endif; ?>
			</div>
			<p class="description"><?php esc_html_e('Select image from Media Library or paste image URL to use as category thumbnail.', 'construction'); ?></p>
		</td>
	</tr>
<?php
}
add_action('category_edit_form_fields', 'construction_category_edit_thumbnail_field', 10, 2);

function construction_save_category_thumbnail_meta($term_id)
{
	if (isset($_POST['construction_category_image'])) {
		$image_url = sanitize_text_field(wp_unslash($_POST['construction_category_image']));
		if ($image_url) {
			update_term_meta($term_id, 'construction_category_image', $image_url);
		} else {
			delete_term_meta($term_id, 'construction_category_image');
		}
	}
}
add_action('created_category', 'construction_save_category_thumbnail_meta', 10, 2);
add_action('edited_category', 'construction_save_category_thumbnail_meta', 10, 2);


/**
 * Admin scripts for category image picker.
 */
function construction_admin_category_media_scripts($hook)
{
	if ('edit-tags.php' !== $hook && 'term.php' !== $hook) {
		return;
	}

	$taxonomy = isset($_GET['taxonomy']) ? sanitize_key(wp_unslash($_GET['taxonomy'])) : '';
	if ('category' !== $taxonomy) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script(
		'construction-category-media',
		get_template_directory_uri() . '/js/category-media.js',
		array('jquery'),
		_S_VERSION,
		true
	);
}
add_action('admin_enqueue_scripts', 'construction_admin_category_media_scripts');


function construction_add_featured_project_meta_boxes()
{
	add_meta_box(
		'construction_featured_project_info',
		__('Thông tin dự án', 'construction'),
		'construction_render_featured_project_meta_box',
		'construction_project',
		'side',
		'default'
	);
}
add_action('add_meta_boxes', 'construction_add_featured_project_meta_boxes');

function construction_render_featured_project_meta_box($post)
{
	wp_nonce_field('construction_save_featured_project_meta', 'construction_featured_project_nonce');

	$category = get_post_meta($post->ID, 'featured_project_category', true);
	$location = get_post_meta($post->ID, 'featured_project_location', true);
?>
	<p>
		<label for="featured_project_category"><strong><?php esc_html_e('Loại dự án', 'construction'); ?></strong></label>
		<input type="text" id="featured_project_category" name="featured_project_category" class="widefat"
			value="<?php echo esc_attr($category); ?>" placeholder="<?php esc_attr_e('Ví dụ: Tòa nhà văn phòng', 'construction'); ?>">
	</p>
	<p>
		<label for="featured_project_location"><strong><?php esc_html_e('Địa điểm', 'construction'); ?></strong></label>
		<input type="text" id="featured_project_location" name="featured_project_location" class="widefat"
			value="<?php echo esc_attr($location); ?>" placeholder="<?php esc_attr_e('Ví dụ: Hà Nội, Việt Nam', 'construction'); ?>">
	</p>
<?php
}

function construction_save_featured_project_meta($post_id)
{
	if (!isset($_POST['construction_featured_project_nonce']) || !wp_verify_nonce($_POST['construction_featured_project_nonce'], 'construction_save_featured_project_meta')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return;
	}

	if (!current_user_can('edit_post', $post_id)) {
		return;
	}

	if (get_post_type($post_id) !== 'construction_project') {
		return;
	}

	$category = isset($_POST['featured_project_category']) ? sanitize_text_field(wp_unslash($_POST['featured_project_category'])) : '';
	$location = isset($_POST['featured_project_location']) ? sanitize_text_field(wp_unslash($_POST['featured_project_location'])) : '';

	update_post_meta($post_id, 'featured_project_category', $category);
	update_post_meta($post_id, 'featured_project_location', $location);
}
add_action('save_post_construction_project', 'construction_save_featured_project_meta');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}
