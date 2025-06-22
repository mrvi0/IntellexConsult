<?php
/**
 * Шаблон футера
 * 
 * @package Bankruptcy_Law_Pro
 */
?>

    </div><!-- #content -->

    <!-- Футер -->
    <footer class="footer" id="colophon">
        <div class="container">
            <div class="footer-content">
                <!-- О компании -->
                <div class="footer-column">
                    <h3>О компании</h3>
                    <p><?php echo get_theme_mod('footer_about', 'Мы специализируемся на банкротстве физических и юридических лиц с 2010 года. Успешно провели более 500 процедур банкротства.'); ?></p>
                    
                    <!-- Социальные сети -->
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

                <!-- Услуги -->
                <div class="footer-column">
                    <h3>Услуги</h3>
                    <ul class="footer-links">
                        <li><a href="<?php echo get_permalink(get_page_by_path('bankrotstvo-fizicheskih-lic')); ?>">Банкротство физических лиц</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('bankrotstvo-yuridicheskih-lic')); ?>">Банкротство юридических лиц</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('restrukturizatsiya-dolgov')); ?>">Реструктуризация долгов</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('zashchita-ot-kreditorov')); ?>">Защита от кредиторов</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('mirovoe-soglashenie')); ?>">Мировое соглашение</a></li>
                    </ul>
                </div>

                <!-- Быстрые ссылки -->
                <div class="footer-column">
                    <h3>Информация</h3>
                    <ul class="footer-links">
                        <li><a href="<?php echo get_permalink(get_page_by_path('o-kompanii')); ?>">О компании</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('komanda')); ?>">Наша команда</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('otzyvy')); ?>">Отзывы клиентов</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('blog')); ?>">Блог</a></li>
                        <li><a href="<?php echo get_permalink(get_page_by_path('kontakty')); ?>">Контакты</a></li>
                    </ul>
                </div>

                <!-- Контакты -->
                <div class="footer-column">
                    <h3>Контакты</h3>
                    <div class="footer-contacts">
                        <?php if (get_theme_mod('contact_address')) : ?>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <p><?php echo esc_html(get_theme_mod('contact_address')); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('contact_phone')) : ?>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <p><a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone')); ?>"><?php echo esc_html(get_theme_mod('contact_phone')); ?></a></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('contact_phone_2')) : ?>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <p><a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone_2')); ?>"><?php echo esc_html(get_theme_mod('contact_phone_2')); ?></a></p>
                            </div>
                        <?php endif; ?>

                        <?php if (get_theme_mod('contact_email')) : ?>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email')); ?>"><?php echo esc_html(get_theme_mod('contact_email')); ?></a></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if (get_theme_mod('contact_working_hours')) : ?>
                            <div class="contact-item">
                                <div class="contact-icon">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <p><?php echo esc_html(get_theme_mod('contact_working_hours')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Нижняя часть футера -->
            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="copyright">
                        © <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. Все права защищены.
                    </p>
                    
                    <div class="footer-bottom-links">
                        <?php
                        $privacy_policy_page_id = get_theme_mod('privacy_policy_page');
                        $terms_of_use_page_id = get_theme_mod('terms_of_use_page');

                        if ($privacy_policy_page_id) {
                            echo '<a href="' . esc_url(get_permalink($privacy_policy_page_id)) . '">' . esc_html(get_the_title($privacy_policy_page_id)) . '</a>';
                        } else {
                            // Fallback link
                            echo '<a href="#">Политика конфиденциальности</a>';
                        }

                        if ($terms_of_use_page_id) {
                            echo '<a href="' . esc_url(get_permalink($terms_of_use_page_id)) . '">' . esc_html(get_the_title($terms_of_use_page_id)) . '</a>';
                        } else {
                             // Fallback link
                            echo '<a href="#">Условия использования</a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<!-- Модальное окно для заявки -->
<div id="request-modal" class="modal">
    <div class="modal-content">
        <span class="modal-close">&times;</span>
        <h3>Получить консультацию</h3>
        <p>Оставьте заявку и мы свяжемся с вами в течение 15 минут</p>
        <?php echo do_shortcode('[contact-form-7 id="1" title="Модальная форма"]'); ?>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html> 