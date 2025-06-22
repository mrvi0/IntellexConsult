<?php
/**
 * Главный файл темы Bankruptcy Law Pro
 * 
 * @package Bankruptcy_Law_Pro
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Главный экран -->
    <section class="hero bankruptcy-hero" id="home">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo get_theme_mod('hero_title', 'Intellex Consult - Эксперты в банкротстве'); ?></h1>
                <p><?php echo get_theme_mod('hero_subtitle', 'Команда профессионалов с 5-летним опытом в сфере банкротства. Взыскание задолженности, субсидиарная ответственность, защита арбитражных управляющих. 100% эффективность.'); ?></p>
                <div class="hero-buttons">
                    <a href="#contact" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        Получить бесплатную консультацию
                    </a>
                    <a href="#services" class="btn btn-outline">
                        <i class="fas fa-briefcase"></i>
                        Наши услуги
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- О нас -->
    <section class="section about" id="about">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('about_title', 'О нашей компании'); ?></h2>
                <p><?php echo get_theme_mod('about_subtitle', 'Мы специализируемся на банкротстве физических и юридических лиц с 2010 года'); ?></p>
            </div>
            <div class="about-content">
                <div class="about-text">
                    <?php 
                    $about_text = get_theme_mod('about_text', 'Intellex Consult - это команда профессионалов с многолетним опытом в сфере банкротства. Мы специализируемся на комплексном решении проблем, связанных с финансовыми трудностями физических и юридических лиц.

Наша миссия - помочь клиентам найти оптимальное решение в сложных финансовых ситуациях, защитить их интересы и минимизировать риски. Мы работаем как с должниками, так и с кредиторами, обеспечивая справедливое и законное разрешение споров.

За годы работы мы успешно провели сотни процедур банкротства, взыскали миллионы рублей задолженности и защитили интересы арбитражных управляющих. Наш опыт позволяет нам находить нестандартные решения даже в самых сложных случаях.');
                    
                    if ($about_text) {
                        echo '<div class="entry-content">' . wpautop($about_text) . '</div>';
                    } else {
                        // Fallback к контенту постов, если кастомный текст не задан
                        if (have_posts()) : while (have_posts()) : the_post(); ?>
                            <div class="entry-content">
                                <?php the_content(); ?>
                            </div>
                        <?php endwhile; endif;
                    }
                    ?>
                </div>
                <div class="about-image">
                    <?php 
                    $about_image = get_theme_mod('about_image');
                    if ($about_image) : ?>
                        <img src="<?php echo esc_url($about_image); ?>" alt="О нашей компании">
                    <?php else : ?>
                        <!-- Заглушка для изображения -->
                        <div class="about-image-placeholder">
                            <i class="fas fa-building" style="font-size: 120px; color: #e5e5e5; margin-bottom: 20px;"></i>
                            <p style="color: #999; font-size: 16px; text-align: center;">Загрузите изображение в настройках темы</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Услуги -->
    <section class="section services" id="services">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('services_title', 'Наши услуги'); ?></h2>
                <p><?php echo get_theme_mod('services_subtitle', 'Полный спектр услуг в сфере банкротства и взыскания задолженности'); ?></p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h3>Взыскание задолженности</h3>
                    <p>Досудебное урегулирование, подготовка исковых заявлений, представление в суде, сопровождение исполнительных производств.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('vzyskanie-zadolzhennosti')); ?>" class="read-more">Подробнее</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3>Предбанкротный анализ</h3>
                    <p>Комплексная оценка финансового состояния, анализ сделок, выявление рисков субсидиарной ответственности.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('predbankrotnyj-analiz')); ?>" class="read-more">Подробнее</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <h3>Банкротство физических лиц</h3>
                    <p>Полное юридическое сопровождение процедуры банкротства граждан. Защита интересов и минимизация рисков.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('bankrotstvo-fizicheskih-lic')); ?>" class="read-more">Подробнее</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <h3>Банкротство юридических лиц</h3>
                    <p>Профессиональное банкротство компаний и ИП. Защита интересов кредиторов и должников в арбитражном суде.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('bankrotstvo-yuridicheskih-lic')); ?>" class="read-more">Подробнее</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <h3>Субсидиарная ответственность</h3>
                    <p>Сопровождение споров о привлечении к субсидиарной ответственности. Защита контролирующих лиц.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('subsidiarnaya-otvetstvennost')); ?>" class="read-more">Подробнее</a>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Оспаривание сделок</h3>
                    <p>Сопровождение споров о признании сделок должника недействительными. Защита интересов сторон.</p>
                    <a href="<?php echo get_permalink(get_page_by_path('osparivanie-sdelok')); ?>" class="read-more">Подробнее</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section class="section bankruptcy-features">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('features_title', 'Почему выбирают Intellex Consult'); ?></h2>
                <p><?php echo get_theme_mod('features_subtitle', 'Наши достижения и преимущества в сфере банкротства'); ?></p>
            </div>
            <div class="features-grid">
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="feature-content">
                        <h3>5 лет опыта</h3>
                        <p>Более 5 лет успешной работы в сфере банкротства. Глубокое знание законодательства и судебной практики.</p>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="feature-content">
                        <h3>100% эффективность</h3>
                        <p>С нами у вас эффективность 100%. Каждый проект доводим до успешного завершения.</p>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Сохранение имущества</h3>
                        <p>Успешно сохранили объекты имущества клиентов на значительные суммы.</p>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Взыскание задолженности</h3>
                        <p>Взыскали дебиторскую задолженность на крупные суммы для наших клиентов.</p>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Защита управляющих</h3>
                        <p>Спасли от убытков арбитражных управляющих. Защита от жалоб и претензий.</p>
                    </div>
                </div>
                
                <div class="feature-item">
                    <div class="feature-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="feature-content">
                        <h3>Нестандартные решения</h3>
                        <p>Благодаря опыту в крупных проектах, принимаем нестандартные решения для достижения результата.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Команда -->
    <section class="section team" id="team">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('team_title', 'Наша команда'); ?></h2>
                <p><?php echo get_theme_mod('team_subtitle', 'Профессиональные юристы по банкротству'); ?></p>
            </div>
            <div class="team-grid">
                <?php
                $team_query = new WP_Query(array(
                    'post_type' => 'team',
                    'posts_per_page' => 4,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));
                
                if ($team_query->have_posts()) :
                    while ($team_query->have_posts()) : $team_query->the_post();
                ?>
                    <div class="team-member">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium', array('class' => 'team-photo')); ?>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo get_post_meta(get_the_ID(), 'position', true); ?></p>
                        <div class="team-description">
                            <?php the_excerpt(); ?>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <!-- Заглушка для команды -->
                    <div class="team-member">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/team-placeholder.jpg" alt="Ведущий юрист">
                        <h3>Александр Петров</h3>
                        <p>Ведущий юрист по банкротству</p>
                        <div class="team-description">
                            <p>Опыт работы более 10 лет. Специализируется на сложных случаях банкротства.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Отзывы -->
    <section class="section testimonials" id="testimonials">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('testimonials_title', 'Отзывы клиентов'); ?></h2>
                <p><?php echo get_theme_mod('testimonials_subtitle', 'Что говорят о нас наши клиенты'); ?></p>
            </div>
            <div class="testimonials-slider">
                <?php
                $testimonials_query = new WP_Query(array(
                    'post_type' => 'testimonial',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'DESC'
                ));
                
                if ($testimonials_query->have_posts()) :
                    while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
                ?>
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p><?php the_content(); ?></p>
                        </div>
                        <div class="testimonial-author">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail', array('class' => 'testimonial-avatar')); ?>
                            <?php endif; ?>
                            <div class="testimonial-info">
                                <h4><?php the_title(); ?></h4>
                                <p><?php echo get_post_meta(get_the_ID(), 'position', true); ?></p>
                                <p><?php echo get_post_meta(get_the_ID(), 'company', true); ?></p>
                            </div>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <!-- Заглушка для отзывов -->
                    <div class="testimonial-item">
                        <div class="testimonial-content">
                            <p>"Обратился в Intellex Consult с проблемой банкротства. Профессиональный подход, четкие разъяснения всех этапов процедуры. Результат превзошел ожидания - успешно списали долги и сохранили имущество."</p>
                        </div>
                        <div class="testimonial-author">
                            <div class="testimonial-info">
                                <h4>Михаил Соколов</h4>
                                <p>Индивидуальный предприниматель</p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="section faq" id="faq">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('faq_title', 'Часто задаваемые вопросы'); ?></h2>
                <p><?php echo get_theme_mod('faq_subtitle', 'Ответы на самые популярные вопросы о процедуре банкротства'); ?></p>
            </div>
            <div class="faq-grid">
                <?php
                $faq_query = new WP_Query(array(
                    'post_type' => 'faq',
                    'posts_per_page' => 6,
                    'orderby' => 'menu_order',
                    'order' => 'ASC'
                ));

                if ($faq_query->have_posts()) :
                    while ($faq_query->have_posts()) : $faq_query->the_post();
                ?>
                        <div class="faq-item">
                            <div class="faq-question">
                                <h3><?php the_title(); ?></h3>
                                <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                            </div>
                            <div class="faq-answer">
                                <?php the_content(); ?>
                            </div>
                        </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3><?php echo get_default_faq_question(1); ?></h3>
                            <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p><?php echo get_default_faq_answer(1); ?></p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3><?php echo get_default_faq_question(2); ?></h3>
                            <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p><?php echo get_default_faq_answer(2); ?></p>
                        </div>
                    </div>
                    <div class="faq-item">
                        <div class="faq-question">
                            <h3><?php echo get_default_faq_question(3); ?></h3>
                            <div class="faq-toggle"><i class="fas fa-plus"></i></div>
                        </div>
                        <div class="faq-answer">
                            <p><?php echo get_default_faq_answer(3); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Контакты -->
    <section class="section contact" id="contact">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('contact_title', 'Свяжитесь с нами'); ?></h2>
                <p><?php echo get_theme_mod('contact_subtitle', 'Получите бесплатную консультацию по банкротству'); ?></p>
            </div>
            <div class="contact-content">
                <div class="contact-info">
                    <h3>Контактная информация</h3>
                    <div class="contact-details">
                        <?php if (get_theme_mod('contact_address')) : ?>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
                            <div class="contact-text">
                                <h4>Адрес</h4>
                                <p><?php echo esc_html(get_theme_mod('contact_address')); ?></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (get_theme_mod('contact_phone')) : ?>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-phone-alt"></i></div>
                            <div class="contact-text">
                                <h4>Телефон</h4>
                                <p><a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone')); ?>"><?php echo esc_html(get_theme_mod('contact_phone')); ?></a></p>
                            </div>
                        </div>
                        <?php endif; ?>

                        <?php if (get_theme_mod('contact_email')) : ?>
                        <div class="contact-item">
                            <div class="contact-icon"><i class="fas fa-envelope"></i></div>
                            <div class="contact-text">
                                <h4>Email</h4>
                                <p><a href="mailto:<?php echo esc_attr(get_theme_mod('contact_email')); ?>"><?php echo esc_html(get_theme_mod('contact_email')); ?></a></p>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="contact-form">
                    <h3>Оставьте заявку</h3>
                    <?php
                    $contact_form_shortcode = get_theme_mod('contact_form_shortcode');
                    if ($contact_form_shortcode) {
                        echo do_shortcode($contact_form_shortcode);
                    } else {
                        echo '<p>Ошибка: Контактная форма не найдена. Укажите шорткод в настройках темы.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 