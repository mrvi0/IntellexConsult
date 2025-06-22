<?php
/**
 * Шаблон страницы контактов
 * 
 * @package intellex-consult
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero секция контактов -->
    <section class="hero contact-hero">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo get_theme_mod('contact_hero_title', 'Свяжитесь с нами'); ?></h1>
                <p><?php echo get_theme_mod('contact_hero_subtitle', 'Мы всегда готовы ответить на ваши вопросы и помочь в решении любых юридических задач'); ?></p>
            </div>
        </div>
    </section>

    <!-- Контактная информация -->
    <section class="section contact-info-section">
        <div class="container">
            <div class="section-header">
                <h2>Контактная информация</h2>
                <p>Выберите удобный для вас способ связи</p>
            </div>
            
            <div class="contact-grid">
                <!-- Адрес -->
                <?php if (get_theme_mod('contact_address')) : ?>
                <div class="contact-card">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Наш адрес</h3>
                            <p><?php echo wp_kses_post(get_theme_mod('contact_address')); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Основной телефон -->
                <?php if (get_theme_mod('contact_phone')) : ?>
                <div class="contact-card">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Основной телефон</h3>
                            <p><a href="tel:<?php echo esc_attr(str_replace([' ', '(', ')', '-'], '', get_theme_mod('contact_phone'))); ?>"><?php echo esc_html(get_theme_mod('contact_phone')); ?></a></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Второй телефон -->
                <?php if (get_theme_mod('contact_phone_2')) : ?>
                <div class="contact-card">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Дополнительный телефон</h3>
                            <p><a href="tel:<?php echo esc_attr(str_replace([' ', '(', ')', '-'], '', get_theme_mod('contact_phone_2'))); ?>"><?php echo esc_html(get_theme_mod('contact_phone_2')); ?></a></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Email -->
                <?php if (get_theme_mod('contact_email')) : ?>
                <div class="contact-card">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Email</h3>
                            <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email')); ?>"><?php echo esc_html(get_theme_mod('contact_email')); ?></a></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Часы работы -->
                <?php if (get_theme_mod('contact_working_hours')) : ?>
                <div class="contact-card">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Часы работы</h3>
                            <p><?php echo wp_kses_post(get_theme_mod('contact_working_hours')); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <!-- Социальные сети -->
                <div class="contact-card social-card">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <i class="fas fa-share-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h3>Мы в соцсетях</h3>
                            <div class="social-links">
                                <?php if (get_theme_mod('social_vk')) : ?>
                                    <a href="<?php echo esc_url(get_theme_mod('social_vk')); ?>" target="_blank" rel="noopener" class="social-link">
                                        <i class="fab fa-vk"></i>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if (get_theme_mod('social_telegram')) : ?>
                                    <a href="<?php echo esc_url(get_theme_mod('social_telegram')); ?>" target="_blank" rel="noopener" class="social-link">
                                        <i class="fab fa-telegram"></i>
                                    </a>
                                <?php endif; ?>
                                
                                <?php if (get_theme_mod('social_whatsapp')) : ?>
                                    <a href="<?php echo esc_url(get_theme_mod('social_whatsapp')); ?>" target="_blank" rel="noopener" class="social-link">
                                        <i class="fab fa-whatsapp"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Форма обратной связи -->
    <section class="section contact-form-section">
        <div class="container">
            <div class="contact-form-wrapper">
                <div class="form-content">
                    <h2>Оставьте заявку</h2>
                    <p>Заполните форму ниже, и мы свяжемся с вами в течение 15 минут</p>
                    
                    <?php
                    $contact_form_shortcode = get_theme_mod('contact_form_shortcode');
                    if ($contact_form_shortcode) {
                        echo do_shortcode($contact_form_shortcode);
                    } else {
                        echo '<p class="form-error">Ошибка: Контактная форма не найдена. Укажите шорткод в настройках темы.</p>';
                    }
                    ?>
                </div>
                
                <div class="form-info">
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Конфиденциальность</h3>
                        <p>Все данные строго конфиденциальны и не передаются третьим лицам</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3>Быстрый ответ</h3>
                        <p>Мы отвечаем на все обращения в течение 15 минут в рабочее время</p>
                    </div>
                    
                    <div class="info-card">
                        <div class="info-icon">
                            <i class="fas fa-gift"></i>
                        </div>
                        <h3>Бесплатная консультация</h3>
                        <p>Первая консультация абсолютно бесплатна и ни к чему не обязывает</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Карта -->
    <?php if (get_theme_mod('contact_map_embed')) : ?>
    <section class="section map-section">
        <div class="container">
            <div class="section-header">
                <h2>Как нас найти</h2>
                <p>Мы находимся в удобном месте в центре города</p>
            </div>
            
            <div class="map-wrapper">
                <?php echo wp_kses_post(get_theme_mod('contact_map_embed')); ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
</main>

<?php get_footer(); ?> 