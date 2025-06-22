<?php
/**
 * Шаблон для отображения отдельных постов
 * 
 * @package Bankruptcy_Law_Pro
 */

get_header(); ?>

<main id="main" class="site-main">
    <div class="container">
        <div class="content-area">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                    <!-- Заголовок поста -->
                    <header class="entry-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        <?php endif; ?>
                        
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        
                        <div class="entry-meta">
                            <span class="posted-on">
                                <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            </span>
                            
                            <?php if (has_category()) : ?>
                                <span class="cat-links">
                                    <?php the_category(', '); ?>
                                </span>
                            <?php endif; ?>
                            
                            <?php if (has_tag()) : ?>
                                <span class="tags-links">
                                    <?php the_tags('', ', '); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <!-- Контент поста -->
                    <div class="entry-content">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . esc_html__('Страницы:', 'bankruptcy-law-pro'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>

                    <!-- Навигация по постам -->
                    <nav class="post-navigation">
                        <div class="nav-links">
                            <div class="nav-previous">
                                <?php previous_post_link('%link', '<span class="nav-subtitle">← Предыдущий</span> <span class="nav-title">%title</span>'); ?>
                            </div>
                            <div class="nav-next">
                                <?php next_post_link('%link', '<span class="nav-subtitle">Следующий →</span> <span class="nav-title">%title</span>'); ?>
                            </div>
                        </div>
                    </nav>

                    <!-- Автор -->
                    <?php if (get_the_author_meta('description')) : ?>
                        <div class="author-bio">
                            <div class="author-avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                            </div>
                            <div class="author-info">
                                <h3 class="author-name"><?php the_author(); ?></h3>
                                <p class="author-description"><?php echo esc_html(get_the_author_meta('description')); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Похожие посты -->
                    <?php
                    $categories = get_the_category();
                    if ($categories) {
                        $category_ids = array();
                        foreach ($categories as $category) {
                            $category_ids[] = $category->term_id;
                        }
                        
                        $related_posts = new WP_Query(array(
                            'category__in' => $category_ids,
                            'post__not_in' => array(get_the_ID()),
                            'posts_per_page' => 3,
                            'orderby' => 'rand',
                        ));
                        
                        if ($related_posts->have_posts()) :
                    ?>
                        <div class="related-posts">
                            <h3>Похожие статьи</h3>
                            <div class="related-posts-grid">
                                <?php while ($related_posts->have_posts()) : $related_posts->the_post(); ?>
                                    <article class="related-post">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="related-post-thumbnail">
                                                <a href="<?php the_permalink(); ?>">
                                                    <?php the_post_thumbnail('medium'); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        
                                        <div class="related-post-content">
                                            <h4 class="related-post-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h4>
                                            <div class="related-post-meta">
                                                <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                    <?php echo esc_html(get_the_date()); ?>
                                                </time>
                                            </div>
                                        </div>
                                    </article>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php
                        endif;
                        wp_reset_postdata();
                    }
                    ?>

                    <!-- Комментарии -->
                    <?php
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </article>
            <?php endwhile; ?>
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