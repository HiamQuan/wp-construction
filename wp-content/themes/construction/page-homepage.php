<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package construction
 */

get_header();
?>

<div class="top-page">
    <section class="banner-section">
        <?php
        $banner_slides = get_field('banner_slide');
        $slide_count = is_array($banner_slides) ? count($banner_slides) : 0;
        if (have_rows('banner_slide')) : ?>
            <div class="banner-carousel owl-carousel owl-theme" id="banner-carousel" data-slide-count="<?php echo esc_attr($slide_count); ?>">
                <?php
                while (have_rows('banner_slide')) : the_row();
                    $banner_media = get_sub_field('banner_slide_img');
                    $banner_title = get_sub_field('banner_slide_title');
                    $banner_subtitle = get_sub_field('banner_slide_subtitle');

                    $banner_img_url = '';
                ?>
                    <div class="banner-slide item">
                        <div class="banner-background" aria-hidden="true">
                            <?php
                            if ($banner_media && !empty($banner_media['url'])) {
                                $mime_type = isset($banner_media['mime_type']) ? $banner_media['mime_type'] : '';

                                if (strpos($mime_type, 'video') !== false) {
                                    echo '<video class="banner-background__video" autoplay muted loop playsinline preload="auto">';
                                    echo '<source src="' . esc_url($banner_media['url']) . '" type="' . esc_attr($mime_type) . '">';
                                    echo '</video>';
                                } else {
                                    echo '<img src="' . esc_url($banner_media['url']) . '" alt="" loading="lazy" class="banner-background__image" />';
                                }
                            }
                            ?>
                        </div>
                        <div class="banner-content">
                            <?php if ($banner_title) : ?>
                                <h1><?php echo wp_kses_post($banner_title); ?></h1>
                            <?php endif; ?>
                            <?php if ($banner_subtitle) : ?>
                                <div class="banner-content__subtitle"><?php echo wp_kses_post($banner_subtitle); ?></div>
                            <?php endif; ?>
                            <div class="contact">
                                <a href="#" class="btn btn-primary">Liên hệ ngay</a>
                                <a href="#" class="btn btn-secondary">Xem dự án</a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                ?>
            </div>
        <?php endif; ?>
    </section>
    <section class="service-section">
        <div class="service-content">
            <h2>Dịch vụ của chúng tôi</h2>
            <p>Hoàng Nhật Minh cung cấp đa dạng các dịch vụ thiết kế và thi công, đáp ứng mọi nhu cầu của khách hàng với chất lượng cao nhất.</p>
        </div>
        <div class="service-list">
            <div class="service-item">
                <div class="service-item-img">
                    <img src="<?php bloginfo('template_directory'); ?>/images/service-1.png" alt="Thiết kế kiến trúc">
                </div>
                <div class="service-item-icon">
                    <div class="service-item-icon-box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/icon/icon-service-1.png" alt="icon thiết kế kiến trúc">
                    </div>
                </div>
                <h3>Thiết kế kiến trúc</h3>
                <p>Thiết kế kiến trúc chuyên nghiệp, sáng tạo và phù hợp với nhu cầu, phong cách của từng khách hàng.</p>
                <a href="#">Tìm hiểu thêm <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="service-item">
                <div class="service-item-img">
                    <img src="<?php bloginfo('template_directory'); ?>/images/service-2.png" alt="Thi công xây dựng">
                </div>
                <div class="service-item-icon">
                    <div class="service-item-icon-box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/icon/icon-service-2.png" alt="icon thi công xây dựng">
                    </div>
                </div>
                <h3>Thi công xây dựng</h3>
                <p>Thi công chuyên nghiệp, đảm bảo tiến độ, chất lượng và an toàn cho mọi công trình từ nhỏ đến lớn.</p>
                <a href="#">Tìm hiểu thêm <i class="fa-solid fa-arrow-right"></i></a>
            </div>
            <div class="service-item">
                <div class="service-item-img">
                    <img src="<?php bloginfo('template_directory'); ?>/images/service-3.png" alt="Thiết kế nội thất">
                </div>
                <div class="service-item-icon">
                    <div class="service-item-icon-box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/icon/icon-service-3.png" alt="icon thiết kế nội thất">
                    </div>
                </div>
                <h3>Thiết kế nội thất</h3>
                <p>Thiết kế nội thất tinh tế, sang trọng, tối ưu công năng và không gian sống cho gia đình bạn.</p>
                <a href="#">Tìm hiểu thêm <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <section class="category-section">
        <div class="category-content">
            <h2>Dự án</h2>
            <p>Khám phá các dự án nổi bật mà Hoàng Nhật Minh thực hiện cho khách hàng.</p>
        </div>
        <div class="category-list-wrapper">
            <?php
            $project_categories = get_terms(
                array(
                    'taxonomy'   => 'category',
                    'hide_empty' => false,
                )
            );
            ?>
            <div class="owl-carousel owl-theme category-carousel" id="category-swiper">
                <?php if (!empty($project_categories) && !is_wp_error($project_categories)) : ?>
                    <?php foreach ($project_categories as $term) : ?>
                        <?php
                        $image_url = get_term_meta($term->term_id, 'construction_category_image', true);

                        if (empty($image_url)) {
                            $term_project = new WP_Query(
                                array(
                                    'post_type'      => 'construction_project',
                                    'posts_per_page' => 1,
                                    'tax_query'      => array(
                                        array(
                                            'taxonomy' => 'category',
                                            'field'    => 'term_id',
                                            'terms'    => $term->term_id,
                                        ),
                                    ),
                                )
                            );

                            if ($term_project->have_posts()) {
                                $term_project->the_post();
                                $image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                                wp_reset_postdata();
                            }
                        }

                        $title = $term->name;
                        $desc  = $term->description ? $term->description : '';
                        if (empty($desc)) {
                            $desc = sprintf(__('Các dự án thuộc danh mục %s', 'construction'), $term->name);
                        }
                        ?>
                        <div class="item">
                            <div class="category-item">
                                <div class="category-item-img">
                                    <?php if ($image_url) : ?>
                                        <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($title); ?>">
                                    <?php else : ?>
                                        <img src="<?php bloginfo('template_directory'); ?>/images/category-1.png" alt="<?php echo esc_attr($title ? $title : 'Dự án'); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="category-item-content">
                                    <?php if ($title) : ?>
                                        <h3><?php echo esc_html($title); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($desc) : ?>
                                        <p><?php echo esc_html($desc); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="item">
                        <div class="category-item">
                            <div class="category-item-img">
                                <img src="<?php bloginfo('template_directory'); ?>/images/category-1.png" alt="Dự án 1">
                            </div>
                            <div class="category-item-content">
                                <h3>Dự án 1</h3>
                                <p>Mô tả ngắn về dự án tiêu biểu của Hoàng Nhật Minh.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="category-item">
                            <div class="category-item-img">
                                <img src="<?php bloginfo('template_directory'); ?>/images/category-2.png" alt="Dự án 2">
                            </div>
                            <div class="category-item-content">
                                <h3>Dự án 2</h3>
                                <p>Mô tả ngắn về dự án tiêu biểu của Hoàng Nhật Minh.</p>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="category-item">
                            <div class="category-item-img">
                                <img src="<?php bloginfo('template_directory'); ?>/images/category-3.png" alt="Dự án 3">
                            </div>
                            <div class="category-item-content">
                                <h3>Dự án 3</h3>
                                <p>Mô tả ngắn về dự án tiêu biểu của Hoàng Nhật Minh.</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="category-btn">
            <a href="#" class="btn btn-primary">Xem tất cả dự án</a>
        </div>
    </section>
    <?php get_template_part('template-parts/project-consultation'); ?>
    <section class="featured-project-section">
        <div class="featured-project-content">
            <span class="featured-project-label">Dự án tiêu biểu</span>
            <h2>Những công trình đã thực hiện</h2>
            <p>Chúng tôi tự hào với hơn 200 dự án đã hoàn thành, đáp ứng đúng yêu cầu và vượt trên mong đợi của khách hàng.</p>
        </div>
        <?php
        $featured_projects = new WP_Query(
            array(
                'post_type'      => 'construction_project',
                'posts_per_page' => 3,
                'orderby'        => 'menu_order',
                'order'          => 'ASC',
            )
        );
        ?>
        <div class="featured-project-list owl-carousel owl-theme" id="featured-project-swiper">
            <?php if ($featured_projects->have_posts()) : ?>
                <?php while ($featured_projects->have_posts()) : $featured_projects->the_post(); ?>
                    <?php
                    $fp_image_url = get_the_post_thumbnail_url(get_the_ID(), 'large');
                    $fp_title     = get_the_title();

                    // Get category and location from meta boxes
                    $fp_tag_name = get_post_meta(get_the_ID(), 'featured_project_category', true);
                    $fp_location = get_post_meta(get_the_ID(), 'featured_project_location', true);

                    // Fallback: if category meta is empty, use first post_tag
                    if (empty($fp_tag_name)) {
                        $project_tags = get_the_terms(get_the_ID(), 'post_tag');
                        if (!is_wp_error($project_tags) && !empty($project_tags)) {
                            $fp_tag_name = $project_tags[0]->name;
                        }
                    }

                    // Fallback: if location meta is empty, use excerpt or content
                    if (empty($fp_location)) {
                        $fp_location = get_the_excerpt();
                        if (empty($fp_location)) {
                            $fp_location = wp_trim_words(wp_strip_all_tags(get_the_content('')), 15, '...');
                        }
                    }
                    ?>
                    <div class="item">
                        <div class="featured-project-item">
                            <div class="featured-project-item-img">
                                <?php if ($fp_image_url) : ?>
                                    <img src="<?php echo esc_url($fp_image_url); ?>" alt="<?php echo esc_attr($fp_title); ?>">
                                <?php else : ?>
                                    <img src="<?php bloginfo('template_directory'); ?>/images/featured-project-1.png" alt="<?php echo esc_attr($fp_title); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="featured-project-item-content">
                                <?php if ($fp_tag_name) : ?>
                                    <span class="featured-project-category"><?php echo esc_html($fp_tag_name); ?></span>
                                <?php endif; ?>
                                <?php if ($fp_title) : ?>
                                    <h3><?php echo esc_html($fp_title); ?></h3>
                                <?php endif; ?>
                                <?php if ($fp_location) : ?>
                                    <p><?php echo esc_html($fp_location); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="item">
                    <div class="featured-project-item">
                        <div class="featured-project-item-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/featured-project-1.png" alt="Dự án 1">
                        </div>
                        <div class="featured-project-item-content">
                            <span class="featured-project-category">Tòa nhà văn phòng</span>
                            <h3>Tòa nhà HNM Tower</h3>
                            <p>Hà Nội, Việt Nam</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="featured-project-item">
                        <div class="featured-project-item-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/featured-project-2.png" alt="Dự án 2">
                        </div>
                        <div class="featured-project-item-content">
                            <span class="featured-project-category">Chung cư cao cấp</span>
                            <h3>Minh Residence</h3>
                            <p>TP. Hồ Chí Minh, Việt Nam</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="featured-project-item">
                        <div class="featured-project-item-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/featured-project-3.png" alt="Dự án 3">
                        </div>
                        <div class="featured-project-item-content">
                            <span class="featured-project-category">Trung tâm thương mại</span>
                            <h3>HNM Plaza</h3>
                            <p>Đà Nẵng, Việt Nam</p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="featured-project-btn">
            <a href="#" class="btn btn-primary">Xem tất cả dự án</a>
        </div>
    </section>
    <section class="about-us-section">
        <?php
        $introduce_banner = get_field('introduce_banner');
        $introduce_banner_badge = get_field('introduce_banner_badge');
        $introduce_label = get_field('introduce_label');
        $introduce_title = get_field('introduce_title');
        $introduce_desc = get_field('introduce_desc');
        $introduce_items = get_field('introduce_item');
        ?>
        <div class="about-container">
            <div class="about-media">
                <div class="about-media-inner">
                    <div class="about-media-wrapper">
                        <?php
                        if ($introduce_banner && is_array($introduce_banner)) {
                            $mime_type = isset($introduce_banner['mime_type']) ? $introduce_banner['mime_type'] : '';
                            $banner_url = isset($introduce_banner['url']) ? $introduce_banner['url'] : '';
                            if ($banner_url) {
                                if (strpos($mime_type, 'video') !== false) {
                                    echo '<video class="about-media-video" autoplay muted loop playsinline preload="auto">';
                                    echo '<source src="' . esc_url($banner_url) . '" type="' . esc_attr($mime_type) . '">';
                                    echo '</video>';
                                } else {
                                    $banner_alt = isset($introduce_banner['alt']) && $introduce_banner['alt'] ? $introduce_banner['alt'] : 'Về chúng tôi';
                                    echo '<img src="' . esc_url($banner_url) . '" alt="' . esc_attr($banner_alt) . '">';
                                }
                            }
                        } else {
                            echo '<img src="' . get_template_directory_uri() . '/images/about.png" alt="Về chúng tôi">';
                        }
                        ?>
                    </div>
                    <?php if ($introduce_banner_badge) : ?>
                        <div class="about-badge">
                            <?php echo wp_kses_post($introduce_banner_badge); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="about-content">
                <?php if ($introduce_label) : ?>
                    <span class="about-label"><?php echo esc_html($introduce_label); ?></span>
                <?php endif; ?>
                <?php if ($introduce_title) : ?>
                    <h2><?php echo esc_html($introduce_title); ?></h2>
                <?php endif; ?>
                <?php if ($introduce_desc) : ?>
                    <p><?php echo esc_html($introduce_desc); ?></p>
                <?php endif; ?>
                <?php if (is_array($introduce_items) && !empty($introduce_items)) : ?>
                    <div class="about-features">
                        <?php foreach ($introduce_items as $item) :
                            $item_icon = isset($item['introduce_item_icon']) ? $item['introduce_item_icon'] : '';
                            $item_title = isset($item['introduce_item_title']) ? $item['introduce_item_title'] : '';
                            $item_desc = isset($item['introduce_item_desc']) ? $item['introduce_item_desc'] : '';
                        ?>
                            <div class="about-feature">
                                <div class="about-feature-box">
                                    <?php if ($item_icon && is_array($item_icon) && isset($item_icon['url'])) : ?>
                                        <span class="about-feature-icon">
                                            <img src="<?php echo esc_url($item_icon['url']); ?>" alt="<?php echo esc_attr(isset($item_icon['alt']) && $item_icon['alt'] ? $item_icon['alt'] : ($item_title ? $item_title : '')); ?>">
                                        </span>
                                    <?php endif; ?>
                                </div>
                                <div class="about-feature-text">
                                    <?php if ($item_title) : ?>
                                        <strong><?php echo esc_html($item_title); ?></strong>
                                    <?php endif; ?>
                                    <?php if ($item_desc) : ?>
                                        <span><?php echo esc_html($item_desc); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <a href="#" class="about-link">Tìm hiểu thêm <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <section class="about-info">
        <div class="about-info-inner">
            <div class="about-info-item">
                <div class="about-info-number"><span class="count" data-target="200" data-duration="1500">1</span><span class="suffix">+</span></div>
                <div class="about-info-label">Dự án hoàn thành</div>
            </div>
            <div class="about-info-item">
                <div class="about-info-number"><span class="count" data-target="50" data-duration="1300">1</span><span class="suffix">+</span></div>
                <div class="about-info-label">Chuyên gia</div>
            </div>
            <div class="about-info-item">
                <div class="about-info-number"><span class="count" data-target="10" data-duration="1100">1</span><span class="suffix">+</span></div>
                <div class="about-info-label">Năm kinh nghiệm</div>
            </div>
            <div class="about-info-item">
                <div class="about-info-number"><span class="count" data-target="30" data-duration="1200">1</span><span class="suffix">+</span></div>
                <div class="about-info-label">Đối tác tin cậy</div>
            </div>
        </div>
    </section>
    <section class="testimonials-section">
        <?php
        $evaluate_label = get_field('evaluate_label');
        $evaluate_title = get_field('evaluate_title');
        $evaluate_desc = get_field('evaluate_desc');
        $evaluate_items = get_field('evaluate_item');
        ?>
        <div class="testimonials-content">
            <?php if ($evaluate_label) : ?>
                <span class="testimonials-label"><?php echo esc_html($evaluate_label); ?></span>
            <?php endif; ?>
            <?php if ($evaluate_title) : ?>
                <h2><?php echo esc_html($evaluate_title); ?></h2>
            <?php endif; ?>
            <?php if ($evaluate_desc) : ?>
                <p><?php echo esc_html($evaluate_desc); ?></p>
            <?php endif; ?>
        </div>
        <?php if (is_array($evaluate_items) && !empty($evaluate_items)) : ?>
            <div class="testimonials-list">
                <?php foreach ($evaluate_items as $item) :
                    $item_star = isset($item['evaluate_item_star']) ? intval($item['evaluate_item_star']) : 5;
                    $item_quote = isset($item['evaluate_item_quote']) ? $item['evaluate_item_quote'] : '';
                    $item_avatar = isset($item['evaluate_item_avatar']) ? $item['evaluate_item_avatar'] : '';
                    $item_name = isset($item['evaluate_item_name']) ? $item['evaluate_item_name'] : '';
                ?>
                    <div class="testimonial-item">
                        <div class="testimonial-rating">
                            <?php
                            $star_count = min(max($item_star, 0), 5);
                            for ($i = 0; $i < 5; $i++) :
                                $star_class = $i < $star_count ? 'fa-solid' : 'fa-regular';
                            ?>
                                <i class="<?php echo esc_attr($star_class); ?> fa-star"></i>
                            <?php endfor; ?>
                        </div>
                        <?php if ($item_quote) : ?>
                            <p class="testimonial-quote"><?php echo esc_html($item_quote); ?></p>
                        <?php endif; ?>
                        <div class="testimonial-author">
                            <?php if ($item_avatar && is_array($item_avatar) && isset($item_avatar['url'])) : ?>
                                <img src="<?php echo esc_url($item_avatar['url']); ?>" alt="<?php echo esc_attr(isset($item_avatar['alt']) && $item_avatar['alt'] ? $item_avatar['alt'] : ($item_name ? $item_name : '')); ?>" class="author-avatar">
                            <?php endif; ?>
                            <?php if ($item_name) : ?>
                                <div class="author-meta">
                                    <strong><?php echo esc_html($item_name); ?></strong>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </section>
    <section class="process-section">
        <div class="process-content">
            <h2>Quy trình làm việc</h2>
            <p>Quy trình làm việc chuyên nghiệp, minh bạch giúp dự án của bạn được thực hiện đúng tiến độ và chất lượng.</p>
        </div>
        <div class="process-list">
            <div class="process-item">
                <div class="process-item-icon">
                    <div class="process-item-icon-bg"></div>
                    <div class="process-item-icon-inner"><i class="fa-solid fa-comments"></i></div>
                </div>
                <div class="process-step">1</div>
                <h3>Tư vấn & Khảo sát</h3>
                <p>Gặp gỡ, trao đổi về nhu cầu và khảo sát thực tế để đưa ra giải pháp tối ưu</p>
            </div>
            <div class="process-item">
                <div class="process-item-icon">
                    <div class="process-item-icon-bg"></div>
                    <div class="process-item-icon-inner"><i class="fa-solid fa-drafting-compass"></i></div>
                </div>
                <div class="process-step">2</div>
                <h3>Thiết kế & Dự toán</h3>
                <p>Thiết kế phương án và lập dự toán chi tiết, minh bạch cho dự án</p>
            </div>
            <div class="process-item">
                <div class="process-item-icon">
                    <div class="process-item-icon-bg"></div>
                    <div class="process-item-icon-inner"><i class="fa-solid fa-hammer"></i></div>
                </div>
                <div class="process-step">3</div>
                <h3>Thi công</h3>
                <p>Thi công theo đúng thiết kế, chất lượng và tiến độ đã cam kết</p>
            </div>
            <div class="process-item">
                <div class="process-item-icon">
                    <div class="process-item-icon-bg"></div>
                    <div class="process-item-icon-inner"><i class="fa-solid fa-clipboard-check"></i></div>
                </div>
                <div class="process-step">4</div>
                <h3>Nghiệm thu & Bàn giao</h3>
                <p>Kiểm tra, nghiệm thu và bàn giao công trình hoàn thiện</p>
            </div>
        </div>
    </section>
    <section class="contact-section">
        <div class="contact-header">
            <h2>Liên hệ với chúng tôi</h2>
            <p>Hãy để lại thông tin, chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>
        </div>
        <div class="contact-grid">
            <?php echo do_shortcode('[contact-form-7 id="2b633c3" title="Contact form 1"]'); ?>
            <aside class="contact-info">
                <h3>Thông tin liên hệ</h3>
                <ul class="contact-info-list">
                    <li>
                        <span class="info-icon"><i class="fa-solid fa-location-dot"></i></span>
                        <div>
                            <strong>Địa chỉ</strong>
                            <p>123 Đường Nguyễn Văn Linh, Quận 7, TP. Hồ Chí Minh</p>
                        </div>
                    </li>
                    <li>
                        <span class="info-icon"><i class="fa-solid fa-phone"></i></span>
                        <div>
                            <strong>Điện thoại</strong>
                            <p>+84 123 456 789</p>
                        </div>
                    </li>
                    <li>
                        <span class="info-icon"><i class="fa-solid fa-envelope"></i></span>
                        <div>
                            <strong>Email</strong>
                            <p>info@hoangnhatminh.com</p>
                        </div>
                    </li>
                    <li>
                        <span class="info-icon"><i class="fa-solid fa-clock"></i></span>
                        <div>
                            <strong>Giờ làm việc</strong>
                            <p>Thứ Hai - Thứ Bảy: 8:00 - 17:30</p>
                        </div>
                    </li>
                </ul>
                <div class="contact-social">
                    <p class="contact-social-title">Kết nối với chúng tôi</p>
                    <div class="social-list">
                        <a href="#" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fa-brands fa-youtube"></i></a>
                        <a href="#" aria-label="Tiktok"><i class="fa-brands fa-tiktok"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </aside>
        </div>
    </section>
</div>
<script>
    (function() {
        function animateCount(el, target, duration) {
            var start = 1;
            var startTime = null;

            function step(timestamp) {
                if (!startTime) startTime = timestamp;
                var progress = Math.min((timestamp - startTime) / duration, 1);
                var value = Math.floor(progress * (target - start) + start);
                el.textContent = value;
                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            }
            requestAnimationFrame(step);
        }

        function runCounts(container) {
            var counts = container.querySelectorAll('.count');
            counts.forEach(function(el) {
                var target = parseInt(el.getAttribute('data-target'), 10) || 0;
                var duration = parseInt(el.getAttribute('data-duration'), 10) || 1400;
                if (target <= 1) {
                    el.textContent = target;
                    return;
                }
                animateCount(el, target, duration);
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var about = document.querySelector('.about-info');
            if (!about) return;
            if ('IntersectionObserver' in window) {
                var obs = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            runCounts(entry.target);
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.3
                });
                obs.observe(about);
            } else {
                runCounts(about);
            }
        });
    })();
</script>

<?php
get_footer();
