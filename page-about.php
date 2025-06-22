<?php
/**
 * Шаблон страницы "О нас"
 * 
 * @package intellex-consult
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero секция -->
    <section class="hero about-hero">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo get_theme_mod('about_hero_title', 'О нашей компании'); ?></h1>
                <p><?php echo get_theme_mod('about_hero_subtitle', 'Профессиональная команда юристов с многолетним опытом в сфере банкротства'); ?></p>
            </div>
        </div>
    </section>

    <!-- О компании -->
    <section class="section about-section">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2><?php echo get_theme_mod('about_title', 'О нашей компании'); ?></h2>
                    <p class="about-subtitle"><?php echo get_theme_mod('about_subtitle', 'Мы специализируемся на банкротстве физических и юридических лиц с 2010 года'); ?></p>
                    
                    <?php 
                    $about_text = get_theme_mod('about_text', 'Intellex Consult - это команда профессионалов с многолетним опытом в сфере банкротства. Мы специализируемся на комплексном решении проблем, связанных с финансовыми трудностями физических и юридических лиц.

Наша миссия - помочь клиентам найти оптимальное решение в сложных финансовых ситуациях, защитить их интересы и минимизировать риски. Мы работаем как с должниками, так и с кредиторами, обеспечивая справедливое и законное разрешение споров.

За годы работы мы успешно провели сотни процедур банкротства, взыскали миллионы рублей задолженности и защитили интересы арбитражных управляющих. Наш опыт позволяет нам находить нестандартные решения даже в самых сложных случаях.');
                    
                    if ($about_text) {
                        echo '<div class="about-description">' . wpautop($about_text) . '</div>';
                    }
                    ?>
                </div>
                
                <div class="about-image">
                    <?php 
                    $about_image = get_theme_mod('about_image');
                    if ($about_image) : ?>
                        <img src="<?php echo esc_url($about_image); ?>" alt="О нашей компании">
                    <?php else : ?>
                        <div class="about-image-placeholder">
                            <i class="fas fa-building"></i>
                            <p>Загрузите изображение в настройках темы</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Статистика -->
    <section class="section stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item">
                    <div class="stat-number" data-count="500">0</div>
                    <div class="stat-label">Успешных процедур</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number" data-count="5">0</div>
                    <div class="stat-label">Лет опыта</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number" data-count="100">0</div>
                    <div class="stat-label">% эффективность</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number" data-count="1000">0</div>
                    <div class="stat-label">Довольных клиентов</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section class="section advantages-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('features_title', 'Почему выбирают Intellex Consult'); ?></h2>
                <p><?php echo get_theme_mod('features_subtitle', 'Наши достижения и преимущества в сфере банкротства'); ?></p>
            </div>
            
            <div class="advantages-grid">
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="advantage-content">
                        <h3>5 лет опыта</h3>
                        <p>Более 5 лет успешной работы в сфере банкротства. Глубокое знание законодательства и судебной практики.</p>
                    </div>
                </div>
                
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="advantage-content">
                        <h3>100% эффективность</h3>
                        <p>С нами у вас эффективность 100%. Каждый проект доводим до успешного завершения.</p>
                    </div>
                </div>
                
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="advantage-content">
                        <h3>Сохранение имущества</h3>
                        <p>Успешно сохранили объекты имущества клиентов на значительные суммы.</p>
                    </div>
                </div>
                
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="advantage-content">
                        <h3>Взыскание задолженности</h3>
                        <p>Взыскали дебиторскую задолженность на крупные суммы для наших клиентов.</p>
                    </div>
                </div>
                
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="advantage-content">
                        <h3>Защита управляющих</h3>
                        <p>Спасли от убытков арбитражных управляющих. Защита от жалоб и претензий.</p>
                    </div>
                </div>
                
                <div class="advantage-item">
                    <div class="advantage-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <div class="advantage-content">
                        <h3>Нестандартные решения</h3>
                        <p>Благодаря опыту в крупных проектах, принимаем нестандартные решения для достижения результата.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Команда -->
    <section class="section team-section">
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
                        <p class="member-position"><?php echo get_post_meta(get_the_ID(), 'position', true); ?></p>
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
                        <div class="team-photo-placeholder">
                            <i class="fas fa-user"></i>
                        </div>
                        <h3>Александр Петров</h3>
                        <p class="member-position">Ведущий юрист по банкротству</p>
                        <div class="team-description">
                            <p>Опытный юрист с более чем 5-летним стажем в сфере банкротства. Специализируется на сложных случаях и нестандартных решениях.</p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- CTA секция -->
    <section class="section cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Готовы начать работу?</h2>
                <p>Свяжитесь с нами для получения бесплатной консультации</p>
                <div class="cta-buttons">
                    <a href="<?php echo get_permalink(get_page_by_path('kontakty')); ?>" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        Связаться с нами
                    </a>
                    <a href="<?php echo get_permalink(get_page_by_path('uslugi')); ?>" class="btn btn-outline">
                        <i class="fas fa-briefcase"></i>
                        Наши услуги
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 