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
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <div class="entry-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endwhile; endif; ?>
                </div>
                <div class="about-image">
                    <?php if (get_theme_mod('about_image')) : ?>
                        <img src="<?php echo esc_url(get_theme_mod('about_image')); ?>" alt="О нашей компании">
                    <?php else : ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-placeholder.jpg" alt="О нашей компании">
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
    <section class="section testimonials">
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
                <h2>Часто задаваемые вопросы</h2>
                <p>Ответы на самые популярные вопросы о банкротстве</p>
            </div>
            <div class="faq-grid">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Сколько длится процедура банкротства?</h3>
                        <span class="faq-toggle">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>Многие думают, что дело о банкротстве длится 6 месяцев, но на практике это не всегда так. Сроки процедуры банкротства зависят от множества факторов: активности кредиторов, загруженности судов, наличия ликвидного имущества, уровня дохода (для физического лица) и др. В связи с этим прогнозировать сроки рассмотрения дела о банкротстве со 100%-й вероятностью затруднительно. Однако, обращаясь к нам, вы можете быть уверены, что работа будет выполняться максимально эффективно.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Какие последствия процедуры банкротства?</h3>
                        <span class="faq-toggle">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p><strong>Для граждан:</strong></p>
                        <ul>
                            <li>освобождение/неосвобождение от долгов;</li>
                            <li>в течение пяти лет с момента завершения процедуры банкротства при оформлении кредитов и займов необходимо указывать на факт своего банкротства;</li>
                            <li>в течение трех лет нельзя занимать должность в органах управления юридического лица;</li>
                            <li>в течение десяти лет нельзя участвовать в управлении кредитными организациями;</li>
                            <li>в течение пяти лет нельзя подавать заявление о собственном банкротстве.</li>
                        </ul>
                        <p><strong>Для юридических лиц:</strong></p>
                        <ul>
                            <li>исключение юридического лица из ЕГРЮЛ.</li>
                        </ul>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>При какой сумме долга можно банкротиться?</h3>
                        <span class="faq-toggle">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>Для граждан сумма долга должна составлять не менее 500 000 рублей. Для юридических лиц сумма долга должна составлять не менее 2 000 000 рублей. Указанные пороговые значения распространяются на заявления конкурсных кредиторов, уполномоченных органов, а также работников, бывших работников должника. Ограничения по пороговому значению не применяются в отношении заявлений должника о собственном банкротстве.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Смогу ли я сохранить свое жилье?</h3>
                        <span class="faq-toggle">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>Все имущество должника включается в конкурсную массу для его дальнейшей реализации и распределения полученных денежных средств между кредиторами. Иммунитет распространяется на единственное жилье должника, то есть оно не включается в конкурсную массу и не реализуется на торгах. Однако оно не должно являться роскошным. Особому риску подвергается недвижимое имущество, которое находится в залоге. По общему правилу залоговое жилье, даже если оно является единственным, подлежит продаже. Однако существуют инструменты, позволяющие сохранить за должником и такое имущество.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Сколько стоит сопровождение процедуры банкротства?</h3>
                        <span class="faq-toggle">
                            <i class="fas fa-plus"></i>
                        </span>
                    </div>
                    <div class="faq-answer">
                        <p>Стоимость услуг по сопровождению процедуры банкротства определяется в индивидуальном порядке по итогам проведения первой консультации.</p>
                    </div>
                </div>
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
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Адрес</h4>
                                <p><?php echo get_theme_mod('contact_address', 'г. Москва, ул. Тверская, д. 12, офис 342'); ?></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Телефон</h4>
                                <p><a href="tel:<?php echo get_theme_mod('contact_phone', '+74951234567'); ?>"><?php echo get_theme_mod('contact_phone', '+7 (495) 123-45-67'); ?></a></p>
                            </div>
                        </div>
                        <div class="contact-item">
                            <div class="contact-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="contact-text">
                                <h4>Email</h4>
                                <p><a href="mailto:<?php echo get_theme_mod('contact_email', 'info@bankruptcy-law.ru'); ?>"><?php echo get_theme_mod('contact_email', 'info@bankruptcy-law.ru'); ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <h3>Оставьте заявку</h3>
                    <?php echo do_shortcode('[contact-form-7 id="1" title="Контактная форма"]'); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 