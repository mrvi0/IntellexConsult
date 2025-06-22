<?php
/**
 * Шаблон для отображения результатов поиска
 * 
 * @package intellex-consult
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <!-- Заголовок поиска -->
            <header class="search-header">
                <h1 class="search-title">
                    <?php printf(esc_html__('Результаты поиска для: %s', 'intellex-consult'), '<span>' . get_search_query() . '</span>'); ?>
                </h1>
                
                <!-- Форма поиска -->
                <div class="search-form-container">
                    <?php get_search_form(); ?>
                </div>
            </header>

            <?php if (have_posts()) : ?>
                <div class="search-results">
                    <p class="results-count">
                        <?php printf(esc_html__('Найдено результатов: %d', 'intellex-consult'), $wp_query->found_posts); ?>
                    </p>
                    
                    <div class="posts-grid">
                        <?php while (have_posts()) : the_post(); ?>
                            <article id="post-<?php the_ID(); ?>" <?php post_class('post-card search-result'); ?>>
                                <!-- Миниатюра поста -->
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="post-thumbnail">
                                        <a href="<?php the_permalink(); ?>">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>

                                <!-- Контент поста -->
                                <div class="post-content">
                                    <header class="entry-header">
                                        <h2 class="entry-title">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h2>
                                        
                                        <div class="entry-meta">
                                            <span class="posted-on">
                                                <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </time>
                                            </span>
                                            
                                            <span class="post-type">
                                                <?php
                                                $post_type_obj = get_post_type_object(get_post_type());
                                                echo esc_html($post_type_obj->labels->singular_name);
                                                ?>
                                            </span>
                                            
                                            <?php if (has_category()) : ?>
                                                <span class="cat-links">
                                                    <?php the_category(', '); ?>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </header>

                                    <div class="entry-summary">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <footer class="entry-footer">
                                        <a href="<?php the_permalink(); ?>" class="read-more">
                                            Читать далее
                                            <span class="arrow">→</span>
                                        </a>
                                    </footer>
                                </div>
                            </article>
                        <?php endwhile; ?>
                    </div>

                    <!-- Пагинация -->
                    <?php
                    the_posts_pagination(array(
                        'mid_size' => 2,
                        'prev_text' => '← Предыдущая',
                        'next_text' => 'Следующая →',
                    ));
                    ?>

                </div>

            <?php else : ?>
                <!-- Если результатов нет -->
                <div class="no-search-results">
                    <h2>Результаты не найдены</h2>
                    <p>К сожалению, по вашему запросу "<?php echo esc_html(get_search_query()); ?>" ничего не найдено.</p>
                    
                    <div class="search-suggestions">
                        <h3>Попробуйте:</h3>
                        <ul>
                            <li>Проверить правильность написания ключевых слов</li>
                            <li>Использовать более общие термины</li>
                            <li>Попробовать другие ключевые слова</li>
                            <li>Просмотреть наши популярные статьи</li>
                        </ul>
                    </div>
                    
                    <div class="popular-posts">
                        <h3>Популярные статьи</h3>
                        <?php
                        $popular_posts = new WP_Query(array(
                            'posts_per_page' => 5,
                            'meta_key' => 'post_views_count',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC',
                        ));
                        
                        if ($popular_posts->have_posts()) :
                        ?>
                            <div class="popular-posts-grid">
                                <?php while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
                                    <article class="popular-post">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="popular-post-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('thumbnail'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="popular-post-content">
                                            <h4 class="popular-post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <div class="popular-post-meta">
                                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </time>
                                            </div>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                        <?php
                        else :
                            // Если нет популярных постов, показываем последние
                            $recent_posts = new WP_Query(array(
                                'posts_per_page' => 5,
                                'post_status' => 'publish',
                            ));
                            
                            if ($recent_posts->have_posts()) :
                        ?>
                                <div class="popular-posts-grid">
                                    <?php while ($recent_posts->have_posts()) : $recent_posts->the_post(); ?>
                                        <article class="popular-post">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <div class="popular-post-thumbnail">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_post_thumbnail('thumbnail'); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            
                                            <div class="popular-post-content">
                                                <h4 class="popular-post-title">
                                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                </h4>
                                                <div class="popular-post-meta">
                                                    <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                        <?php echo esc_html(get_the_date()); ?>
                                                    </time>
                                                </div>
                                            </div>
                                        </article>
                                    <?php endwhile; ?>
                                </div>
                        <?php
                            endif;
                            wp_reset_postdata();
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <!-- Боковая панель -->
        <?php if (is_active_sidebar('sidebar-1')) : ?>
            <aside class="widget-area">
                <?php dynamic_sidebar('sidebar-1'); ?>
            </aside>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?> 