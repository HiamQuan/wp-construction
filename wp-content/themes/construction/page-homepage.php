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
        <div class="banner-background">
            <img src="<?php bloginfo('template_directory'); ?>/images/banner.png" alt="">
        </div>
        <div class="banner-content">
            <h1>
                THIẾT KẾ <br>
                THI CÔNG XÂY <br>
                DỰNG
                <span class="text-primary">
                    TRỌN GÓI
                </span>
            </h1>
            <p>Chuyên nghiệp trong thi công, sáng tạo trong thiết kế và uy tín trong xây dựng</p>
            <div class="contact">
                <a href="#" class="btn btn-primary">Liên hệ ngay</a>
                <a href="#" class="btn btn-secondary">Xem dự án</a>
            </div>
        </div>
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
            <h2>Danh mục dự án</h2>
            <p>Khám phá các dự án nổi bật của Hoàng Nhật Minh trong các lĩnh vực thiết kế và thi công.</p>
        </div>
        <div class="category-list-wrapper">
            <div class="owl-carousel owl-theme category-carousel" id="category-swiper">
                <div class="item">
                    <div class="category-item">
                        <div class="category-item-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/category-1.png" alt="Nhà phố">
                        </div>
                        <div class="category-item-content">
                            <h3>Nhà phố</h3>
                            <p>Thiết kế và thi công nhà phố hiện đại, tiện nghi</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="category-item">
                        <div class="category-item-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/category-2.png" alt="Nội thất">
                        </div>
                        <div class="category-item-content">
                            <h3>Nội thất</h3>
                            <p>Thiết kế nội thất hiện đại, tinh tế</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="category-item">
                        <div class="category-item-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/category-3.png" alt="Phòng thờ">
                        </div>
                        <div class="category-item-content">
                            <h3>Phòng thờ</h3>
                            <p>Thiết kế phòng thờ trang nghiêm, thanh tịnh</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="category-item">
                        <div class="category-item-img">
                            <img src="<?php bloginfo('template_directory'); ?>/images/category-3.png" alt="Phòng thờ">
                        </div>
                        <div class="category-item-content">
                            <h3>Phòng thờ</h3>
                            <p>Thiết kế phòng thờ trang nghiêm, thanh tịnh</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="category-btn">
            <a href="#" class="btn btn-primary">Xem tất cả dự án</a>
        </div>
    </section>
    <section class="project-section">
        <div class="project-content">
            <h2>Bạn có dự án cần tư vấn?</h2>
            <p>Hãy liên hệ với chúng tôi ngay hôm nay để được tư vấn miễn phí và nhận báo giá chi tiết cho dự án của bạn.</p>
            <a href="#" class="btn btn-primary">Liên hệ ngay</a>
        </div>
    </section>
    <section class="featured-project-section">
        <div class="featured-project-content">
            <span class="featured-project-label">Dự án tiêu biểu</span>
            <h2>Những công trình đã thực hiện</h2>
            <p>Chúng tôi tự hào với hơn 200 dự án đã hoàn thành, đáp ứng đúng yêu cầu và vượt trên mong đợi của khách hàng.</p>
        </div>
        <div class="featured-project-list owl-carousel owl-theme" id="featured-project-swiper">
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
        </div>

        <div class="featured-project-btn">
            <a href="#" class="btn btn-primary">Xem tất cả dự án</a>
        </div>
    </section>
    <section class="about-us-section">
        <div class="about-container">
            <div class="about-media">
                <div class="about-media-inner">
                    <img src="<?php bloginfo('template_directory'); ?>/images/about.png" alt="Về chúng tôi">
                    <div class="about-badge">
                        <div class="about-badge-number">10+</div>
                        <div class="about-badge-text">Năm kinh nghiệm</div>
                    </div>
                </div>
            </div>
            <div class="about-content">
                <span class="about-label">Về chúng tôi</span>
                <h2>Công ty Hoàng Nhật Minh</h2>
                <p>Được thành lập từ năm 2013, Hoàng Nhật Minh đã trở thành một trong những đơn vị hàng đầu trong lĩnh vực thi công, xây dựng và thiết kế công trình tại Việt Nam. Chúng tôi tự hào mang đến những giải pháp xây dựng toàn diện, kết hợp giữa công nghệ hiện đại và kinh nghiệm dày dạn.</p>
                <div class="about-features">
                    <div class="about-feature">
                        <div class="about-feature-box">
                            <span class="about-feature-icon"><i class="fa-solid fa-shield"></i></span>
                        </div>
                        <div class="about-feature-text">
                            <strong>Chất lượng</strong>
                            <span>Đảm bảo tiêu chuẩn</span>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-box">
                            <span class="about-feature-icon"><i class="fa-solid fa-stopwatch"></i></span>
                        </div>
                        <div class="about-feature-text">
                            <strong>Đúng tiến độ</strong>
                            <span>Cam kết thời gian</span>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-box">
                            <span class="about-feature-icon"><i class="fa-solid fa-lightbulb"></i></span>
                        </div>
                        <div class="about-feature-text">
                            <strong>Sáng tạo</strong>
                            <span>Thiết kế độc đáo</span>
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature-box">
                            <span class="about-feature-icon"><i class="fa-solid fa-headset"></i></span>
                        </div>
                        <div class="about-feature-text">
                            <strong>Tư vấn tận tâm</strong>
                            <span>Hỗ trợ 24/7</span>
                        </div>
                    </div>
                </div>
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
        <div class="testimonials-content">
            <span class="testimonials-label">Khách hàng nói gì</span>
            <h2>Đánh giá từ khách hàng</h2>
            <p>Sự hài lòng của khách hàng là thước đo thành công của chúng tôi. Hãy xem những gì họ nói về dịch vụ của Hoàng Nhật Minh.</p>
        </div>
        <div class="testimonials-list">
            <div class="testimonial-item">
                <div class="testimonial-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-quote">"Hoàng Nhật Minh đã hoàn thành dự án tòa nhà văn phòng của chúng tôi đúng tiến độ và chất lượng vượt mong đợi. Đội ngũ chuyên nghiệp và tận tâm."</p>
                <div class="testimonial-author">
                    <img src="<?php bloginfo('template_directory'); ?>/images/avatar-1.png" alt="Nguyễn Văn An" class="author-avatar">
                    <div class="author-meta">
                        <strong>Nguyễn Văn An</strong>
                        <span>Giám đốc Công ty ABC</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-quote">"Tôi đánh giá cao sự sáng tạo và chuyên nghiệp của đội ngũ thiết kế Hoàng Nhật Minh. Họ đã biến ý tưởng của tôi thành hiện thực một cách hoàn hảo."</p>
                <div class="testimonial-author">
                    <img src="<?php bloginfo('template_directory'); ?>/images/avatar-2.png" alt="Trần Thị Mai" class="author-avatar">
                    <div class="author-meta">
                        <strong>Trần Thị Mai</strong>
                        <span>Chủ đầu tư Dự án XYZ</span>
                    </div>
                </div>
            </div>
            <div class="testimonial-item">
                <div class="testimonial-rating">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="testimonial-quote">"Làm việc với Hoàng Nhật Minh là một trải nghiệm tuyệt vời. Họ luôn lắng nghe ý kiến và đưa ra những giải pháp tối ưu cho dự án của chúng tôi."</p>
                <div class="testimonial-author">
                    <img src="<?php bloginfo('template_directory'); ?>/images/avatar-3.png" alt="Lê Minh Tuấn" class="author-avatar">
                    <div class="author-meta">
                        <strong>Lê Minh Tuấn</strong>
                        <span>Quản lý Dự án 123</span>
                    </div>
                </div>
            </div>
        </div>
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
                        <a href="#" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
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
