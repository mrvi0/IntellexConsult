<?php
/**
 * Шаблон для отображения страницы 404
 * 
 * @package Bankruptcy_Law_Pro
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="error-404 not-found">
            <!-- Заголовок ошибки -->
            <header class="page-header">
                <h1 class="page-title">404</h1>
                <h2 class="error-title">Страница не найдена</h2>
                <p class="error-description">
                    К сожалению, запрашиваемая страница не существует или была перемещена.
                </p>
            </header>

            <!-- Поиск -->
            <div class="error-search">
                <h3>Найти нужную информацию</h3>
                <p>Попробуйте найти то, что ищете:</p>
                <?php get_search_form(); ?>
            </div>

            <!-- Популярные страницы -->
            <div class="popular-pages">
                <h3>Популярные страницы</h3>
                <div class="pages-grid">
                    <div class="page-card">
                        <h4><a href="<?php echo home_url('/'); ?>">Главная страница</a></h4>
                        <p>Вернуться на главную страницу сайта</p>
                    </div>
                    
                    <div class="page-card">
                        <h4><a href="<?php echo get_permalink(get_page_by_path('o-kompanii')); ?>">О компании</a></h4>
                        <p>Узнать больше о нашей компании</p>
                    </div>
                    
                    <div class="page-card">
                        <h4><a href="<?php echo get_permalink(get_page_by_path('uslugi')); ?>">Услуги</a></h4>
                        <p>Наши услуги по банкротству</p>
                    </div>
                    
                    <div class="page-card">
                        <h4><a href="<?php echo get_permalink(get_page_by_path('kontakty')); ?>">Контакты</a></h4>
                        <p>Связаться с нами</p>
                    </div>
                </div>
            </div>

            <!-- Последние статьи -->
            <div class="recent-posts">
                <h3>Последние публикации</h3>
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 6,
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
                
                if ($recent_posts->have_posts()) :
                ?>
                    <div class="posts-grid">
                        <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                            <article class="post-card">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="post-content">
                                    <h4 class="post-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <div class="post-meta">
                                        <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                            <?php echo esc_html(get_the_date()); ?>
                                        </time>
                                    </div>
                                    <div class="post-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>
                <?php
                endif;
                wp_reset_postdata();
                ?>
            </div>

            <!-- Полезные ссылки -->
            <div class="useful-links">
                <h3>Полезные ссылки</h3>
                <div class="links-grid">
                    <div class="link-category">
                        <h4>Услуги по банкротству</h4>
                        <ul>
                            <li><a href="<?php echo get_permalink(get_page_by_path('bankrotstvo-fizicheskih-lic')); ?>">Банкротство физических лиц</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('bankrotstvo-yuridicheskih-lic')); ?>">Банкротство юридических лиц</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('restrukturizatsiya-dolgov')); ?>">Реструктуризация долгов</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('zashchita-ot-kreditorov')); ?>">Защита от кредиторов</a></li>
                        </ul>
                    </div>
                    
                    <div class="link-category">
                        <h4>Информация</h4>
                        <ul>
                            <li><a href="<?php echo get_permalink(get_page_by_path('o-kompanii')); ?>">О компании</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('komanda')); ?>">Наша команда</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('otzyvy')); ?>">Отзывы клиентов</a></li>
                            <li><a href="<?php echo get_permalink(get_page_by_path('blog')); ?>">Блог</a></li>
                        </ul>
                    </div>
                    
                    <div class="link-category">
                        <h4>Контакты</h4>
                        <ul>
                            <li><a href="<?php echo get_permalink(get_page_by_path('kontakty')); ?>">Контакты</a></li>
                            <li><a href="tel:<?php echo get_theme_mod('contact_phone', '+74951234567'); ?>">Позвонить нам</a></li>
                            <li><a href="mailto:<?php echo get_theme_mod('contact_email', 'info@bankruptcy-law.ru'); ?>">Написать письмо</a></li>
                            <li><a href="#contact" class="consultation-link">Получить консультацию</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Кнопка возврата -->
            <div class="back-to-home">
                <a href="<?php echo home_url('/'); ?>" class="btn btn-large">
                    Вернуться на главную
                </a>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?> 