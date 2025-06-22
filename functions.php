<?php
/**
 * Функции темы Bankruptcy Law Pro
 * 
 * @package Bankruptcy_Law_Pro
 */

// Предотвращение прямого доступа
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Настройка темы
 */
function bankruptcy_law_pro_setup() {
    // Поддержка переводов
    load_theme_textdomain('bankruptcy-law-pro', get_template_directory() . '/languages');
    
    // Поддержка автоматических ссылок на RSS
    add_theme_support('automatic-feed-links');
    
    // Поддержка заголовка страницы
    add_theme_support('title-tag');
    
    // Поддержка миниатюр постов
    add_theme_support('post-thumbnails');
    
    // Поддержка HTML5 разметки
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
    
    // Поддержка кастомного логотипа
    add_theme_support('custom-logo', array(
        'height'      => 60,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Поддержка кастомного фона
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ));
    
    // Поддержка кастомного заголовка
    add_theme_support('custom-header', array(
        'default-image' => '',
        'default-text-color' => '000000',
        'width' => 1200,
        'height' => 400,
        'flex-width' => true,
        'flex-height' => true,
    ));
    
    // Регистрация меню
    register_nav_menus(array(
        'primary' => esc_html__('Главное меню', 'bankruptcy-law-pro'),
        'footer' => esc_html__('Меню футера', 'bankruptcy-law-pro'),
    ));
    
    // Поддержка широкого и полного контента
    add_theme_support('align-wide');
    
    // Поддержка редактора стилей
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'bankruptcy_law_pro_setup');

/**
 * Подключение стилей и скриптов
 */
function bankruptcy_law_pro_scripts() {
    // Основные стили темы
    wp_enqueue_style('bankruptcy-law-pro-style', get_stylesheet_uri(), array(), '1.1.0');
    
    // Дополнительные стили
    wp_enqueue_style('bankruptcy-law-pro-main-style', get_template_directory_uri() . '/assets/css/main.css', array('bankruptcy-law-pro-style'), '1.1.0');
    
    // Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap', array(), null);
    
    // FontAwesome
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0');
    
    // Основные скрипты
    $theme_version = wp_get_theme()->get('Version');
    wp_enqueue_script('bankruptcy-law-pro-main-script', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version, true);
    
    // Комментарии
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'bankruptcy_law_pro_scripts');

/**
 * Регистрация виджетов
 */
function bankruptcy_law_pro_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__('Боковая панель', 'bankruptcy-law-pro'),
        'id'            => 'sidebar-1',
        'description'   => esc_html__('Добавьте виджеты сюда.', 'bankruptcy-law-pro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Футер 1', 'bankruptcy-law-pro'),
        'id'            => 'footer-1',
        'description'   => esc_html__('Виджеты для первой колонки футера.', 'bankruptcy-law-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Футер 2', 'bankruptcy-law-pro'),
        'id'            => 'footer-2',
        'description'   => esc_html__('Виджеты для второй колонки футера.', 'bankruptcy-law-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
    
    register_sidebar(array(
        'name'          => esc_html__('Футер 3', 'bankruptcy-law-pro'),
        'id'            => 'footer-3',
        'description'   => esc_html__('Виджеты для третьей колонки футера.', 'bankruptcy-law-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'bankruptcy_law_pro_widgets_init');

/**
 * Кастомизация темы
 */
function bankruptcy_law_pro_customize_register($wp_customize) {
    // Секция "Общие настройки"
    $wp_customize->add_section('general_settings', array(
        'title' => __('Общие настройки', 'bankruptcy-law-pro'),
        'priority' => 30,
    ));
    
    // Логотип сайта
    $wp_customize->add_setting('site_logo', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_logo', array(
        'label' => __('Логотип сайта', 'bankruptcy-law-pro'),
        'section' => 'general_settings',
        'settings' => 'site_logo',
    )));
    
    // Favicon
    $wp_customize->add_setting('site_favicon', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'site_favicon', array(
        'label' => __('Favicon', 'bankruptcy-law-pro'),
        'section' => 'general_settings',
        'settings' => 'site_favicon',
    )));
    
    // Описание сайта
    $wp_customize->add_setting('site_description', array(
        'default' => 'Профессиональная помощь в банкротстве физических и юридических лиц',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('site_description', array(
        'label' => __('Описание сайта', 'bankruptcy-law-pro'),
        'section' => 'general_settings',
        'type' => 'textarea',
    ));
    
    // Секция "Главная страница"
    $wp_customize->add_section('homepage_settings', array(
        'title' => __('Главная страница', 'bankruptcy-law-pro'),
        'priority' => 30,
    ));

    // Hero секция
    $wp_customize->add_setting('hero_title', array(
        'default' => 'Intellex Consult - Эксперты в банкротстве',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Заголовок Hero секции', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Команда профессионалов с 5-летним опытом в сфере банкротства. Взыскание задолженности, субсидиарная ответственность, защита арбитражных управляющих. 100% эффективность.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Подзаголовок Hero секции', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'textarea',
    ));

    // Раздел "О нас"
    $wp_customize->add_setting('about_title', array(
        'default' => 'О нашей компании',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_title', array(
        'label' => __('Заголовок раздела "О нас"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_subtitle', array(
        'default' => 'Мы специализируемся на банкротстве физических и юридических лиц с 2010 года',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_subtitle', array(
        'label' => __('Подзаголовок раздела "О нас"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_text', array(
        'default' => 'Intellex Consult - это команда профессионалов с многолетним опытом в сфере банкротства. Мы специализируемся на комплексном решении проблем, связанных с финансовыми трудностями физических и юридических лиц.

Наша миссия - помочь клиентам найти оптимальное решение в сложных финансовых ситуациях, защитить их интересы и минимизировать риски. Мы работаем как с должниками, так и с кредиторами, обеспечивая справедливое и законное разрешение споров.

За годы работы мы успешно провели сотни процедур банкротства, взыскали миллионы рублей задолженности и защитили интересы арбитражных управляющих. Наш опыт позволяет нам находить нестандартные решения даже в самых сложных случаях.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_text', array(
        'label' => __('Текст раздела "О нас"', 'bankruptcy-law-pro'),
        'description' => __('Основной текст, который будет отображаться в разделе "О нас"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'textarea',
        'input_attrs' => array(
            'rows' => 10,
        ),
    ));

    $wp_customize->add_setting('about_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label' => __('Изображение раздела "О нас"', 'bankruptcy-law-pro'),
        'description' => __('Загрузите изображение для раздела "О нас". Рекомендуемый размер: 600x400px', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
    )));

    // Раздел "Услуги"
    $wp_customize->add_setting('services_title', array(
        'default' => 'Наши услуги',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_title', array(
        'label' => __('Заголовок раздела "Услуги"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('services_subtitle', array(
        'default' => 'Полный спектр услуг в сфере банкротства и взыскания задолженности',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('services_subtitle', array(
        'label' => __('Подзаголовок раздела "Услуги"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Раздел "Преимущества"
    $wp_customize->add_setting('features_title', array(
        'default' => 'Почему выбирают Intellex Consult',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('features_title', array(
        'label' => __('Заголовок раздела "Преимущества"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('features_subtitle', array(
        'default' => 'Наши достижения и преимущества в сфере банкротства',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('features_subtitle', array(
        'label' => __('Подзаголовок раздела "Преимущества"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Раздел "Команда"
    $wp_customize->add_setting('team_title', array(
        'default' => 'Наша команда',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('team_title', array(
        'label' => __('Заголовок раздела "Команда"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('team_subtitle', array(
        'default' => 'Профессиональные юристы по банкротству',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('team_subtitle', array(
        'label' => __('Подзаголовок раздела "Команда"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Раздел "Отзывы"
    $wp_customize->add_setting('testimonials_title', array(
        'default' => 'Отзывы клиентов',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('testimonials_title', array(
        'label' => __('Заголовок раздела "Отзывы"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('testimonials_subtitle', array(
        'default' => 'Что говорят о нас наши клиенты',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('testimonials_subtitle', array(
        'label' => __('Подзаголовок раздела "Отзывы"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Раздел "Контакты"
    $wp_customize->add_setting('contact_title', array(
        'default' => 'Свяжитесь с нами',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_title', array(
        'label' => __('Заголовок раздела "Контакты"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_subtitle', array(
        'default' => 'Получите бесплатную консультацию по банкротству',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_subtitle', array(
        'label' => __('Подзаголовок раздела "Контакты"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Раздел "FAQ"
    $wp_customize->add_setting('faq_title', array(
        'default' => 'Часто задаваемые вопросы',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('faq_title', array(
        'label' => __('Заголовок раздела "FAQ"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    $wp_customize->add_setting('faq_subtitle', array(
        'default' => 'Ответы на самые популярные вопросы о банкротстве',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('faq_subtitle', array(
        'label' => __('Подзаголовок раздела "FAQ"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // FAQ вопросы (до 10 вопросов)
    for ($i = 1; $i <= 10; $i++) {
        // Вопрос
        $wp_customize->add_setting("faq_question_{$i}", array(
            'default' => get_default_faq_question($i),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("faq_question_{$i}", array(
            'label' => sprintf(__('FAQ Вопрос %d', 'bankruptcy-law-pro'), $i),
            'section' => 'homepage_settings',
            'type' => 'text',
        ));

        // Ответ
        $wp_customize->add_setting("faq_answer_{$i}", array(
            'default' => get_default_faq_answer($i),
            'sanitize_callback' => 'wp_kses_post',
        ));

        $wp_customize->add_control("faq_answer_{$i}", array(
            'label' => sprintf(__('FAQ Ответ %d', 'bankruptcy-law-pro'), $i),
            'section' => 'homepage_settings',
            'type' => 'textarea',
            'input_attrs' => array(
                'rows' => 6,
            ),
        ));

        // Активен ли вопрос
        $wp_customize->add_setting("faq_active_{$i}", array(
            'default' => $i <= 5, // Первые 5 вопросов активны по умолчанию
            'sanitize_callback' => 'rest_sanitize_boolean',
        ));

        $wp_customize->add_control("faq_active_{$i}", array(
            'label' => sprintf(__('FAQ Вопрос %d активен', 'bankruptcy-law-pro'), $i),
            'section' => 'homepage_settings',
            'type' => 'checkbox',
        ));
    }

    // Секция "Контакты"
    $wp_customize->add_section('contact_settings', array(
        'title' => __('Контакты', 'bankruptcy-law-pro'),
        'priority' => 40,
    ));
    
    // Адрес
    $wp_customize->add_setting('contact_address', array(
        'default' => 'г. Москва, ул. Тверская, д. 12, офис 342',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_address', array(
        'label' => __('Адрес', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'text',
    ));
    
    // Телефон
    $wp_customize->add_setting('contact_phone', array(
        'default' => '+7 (495) 123-45-67',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone', array(
        'label' => __('Телефон', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'text',
    ));
    
    // Email
    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@bankruptcy-law.ru',
        'sanitize_callback' => 'sanitize_email',
    ));
    
    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'email',
    ));
    
    // Время работы
    $wp_customize->add_setting('contact_working_hours', array(
        'default' => 'Пн-Пт: 9:00-18:00',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_working_hours', array(
        'label' => __('Время работы', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'text',
    ));
    
    // Секция "Социальные сети"
    $wp_customize->add_section('social_settings', array(
        'title' => __('Социальные сети', 'bankruptcy-law-pro'),
        'priority' => 45,
    ));
    
    // VK
    $wp_customize->add_setting('social_vk', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_vk', array(
        'label' => __('VK', 'bankruptcy-law-pro'),
        'section' => 'social_settings',
        'type' => 'url',
    ));
    
    // Telegram
    $wp_customize->add_setting('social_telegram', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_telegram', array(
        'label' => __('Telegram', 'bankruptcy-law-pro'),
        'section' => 'social_settings',
        'type' => 'url',
    ));
    
    // WhatsApp
    $wp_customize->add_setting('social_whatsapp', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    
    $wp_customize->add_control('social_whatsapp', array(
        'label' => __('WhatsApp', 'bankruptcy-law-pro'),
        'section' => 'social_settings',
        'type' => 'url',
    ));

    // Секция "Обновления темы"
    $wp_customize->add_section('theme_updates_settings', array(
        'title' => __('Обновления темы', 'bankruptcy-law-pro'),
        'priority' => 160,
    ));

    // Поле для GitHub PAT
    $wp_customize->add_setting('github_pat', array(
        'default' => '',
        'transport' => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('github_pat', array(
        'label' => __('GitHub Personal Access Token', 'bankruptcy-law-pro'),
        'description' => __('Введите ваш PAT для обновлений из приватного репозитория. Токен должен иметь права "repo".', 'bankruptcy-law-pro'),
        'section' => 'theme_updates_settings',
        'type' => 'password',
    ));

    // Информация о текущей версии
    $wp_customize->add_setting('theme_version_info', array(
        'default' => '',
        'sanitize_callback' => '__return_empty_string',
    ));

    $wp_customize->add_control('theme_version_info', array(
        'label' => __('Текущая версия темы', 'bankruptcy-law-pro'),
        'description' => wp_get_theme()->get('Version'),
        'section' => 'theme_updates_settings',
        'type' => 'hidden',
    ));

    // Кнопка проверки обновлений
    $wp_customize->add_setting('check_updates_button', array(
        'default' => '',
        'sanitize_callback' => '__return_empty_string',
    ));

    $wp_customize->add_control('check_updates_button', array(
        'label' => __('Проверить обновления', 'bankruptcy-law-pro'),
        'description' => __('Нажмите кнопку ниже, чтобы принудительно проверить наличие обновлений для темы.', 'bankruptcy-law-pro'),
        'section' => 'theme_updates_settings',
        'type' => 'button',
        'input_attrs' => array(
            'class' => 'button button-primary',
            'onclick' => 'window.open("' . admin_url('themes.php?page=intellex_consult_options') . '", "_blank");',
        ),
    ));
}
add_action('customize_register', 'bankruptcy_law_pro_customize_register');

/**
 * Регистрация кастомных типов постов
 */
function bankruptcy_law_pro_custom_post_types() {
    // Команда
    register_post_type('team', array(
        'labels' => array(
            'name' => 'Команда',
            'singular_name' => 'Сотрудник',
            'add_new' => 'Добавить сотрудника',
            'add_new_item' => 'Добавить нового сотрудника',
            'edit_item' => 'Редактировать сотрудника',
            'new_item' => 'Новый сотрудник',
            'view_item' => 'Просмотреть сотрудника',
            'search_items' => 'Искать сотрудников',
            'not_found' => 'Сотрудники не найдены',
            'not_found_in_trash' => 'В корзине нет сотрудников',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'team'),
    ));
    
    // Отзывы
    register_post_type('testimonial', array(
        'labels' => array(
            'name' => 'Отзывы',
            'singular_name' => 'Отзыв',
            'add_new' => 'Добавить отзыв',
            'add_new_item' => 'Добавить новый отзыв',
            'edit_item' => 'Редактировать отзыв',
            'new_item' => 'Новый отзыв',
            'view_item' => 'Просмотреть отзыв',
            'search_items' => 'Искать отзывы',
            'not_found' => 'Отзывы не найдены',
            'not_found_in_trash' => 'В корзине нет отзывов',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-format-quote',
        'rewrite' => array('slug' => 'testimonials'),
    ));
    
    // Услуги
    register_post_type('service', array(
        'labels' => array(
            'name' => 'Услуги',
            'singular_name' => 'Услуга',
            'add_new' => 'Добавить услугу',
            'add_new_item' => 'Добавить новую услугу',
            'edit_item' => 'Редактировать услугу',
            'new_item' => 'Новая услуга',
            'view_item' => 'Просмотреть услугу',
            'search_items' => 'Искать услуги',
            'not_found' => 'Услуги не найдены',
            'not_found_in_trash' => 'В корзине нет услуг',
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-admin-tools',
        'rewrite' => array('slug' => 'services'),
    ));
}
add_action('init', 'bankruptcy_law_pro_custom_post_types');

/**
 * Добавление мета-полей для команды
 */
function bankruptcy_law_pro_add_team_meta_boxes() {
    add_meta_box(
        'team_details',
        'Информация о сотруднике',
        'bankruptcy_law_pro_team_meta_box_callback',
        'team',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'bankruptcy_law_pro_add_team_meta_boxes');

function bankruptcy_law_pro_team_meta_box_callback($post) {
    wp_nonce_field('bankruptcy_law_pro_save_team_meta', 'bankruptcy_law_pro_team_meta_nonce');
    
    $position = get_post_meta($post->ID, 'position', true);
    $experience = get_post_meta($post->ID, 'experience', true);
    $phone = get_post_meta($post->ID, 'phone', true);
    $email = get_post_meta($post->ID, 'email', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="position">Должность</label></th>';
    echo '<td><input type="text" id="position" name="position" value="' . esc_attr($position) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="experience">Опыт работы</label></th>';
    echo '<td><input type="text" id="experience" name="experience" value="' . esc_attr($experience) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="phone">Телефон</label></th>';
    echo '<td><input type="text" id="phone" name="phone" value="' . esc_attr($phone) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="email">Email</label></th>';
    echo '<td><input type="email" id="email" name="email" value="' . esc_attr($email) . '" class="regular-text" /></td></tr>';
    echo '</table>';
}

function bankruptcy_law_pro_save_team_meta($post_id) {
    if (!isset($_POST['bankruptcy_law_pro_team_meta_nonce']) || 
        !wp_verify_nonce($_POST['bankruptcy_law_pro_team_meta_nonce'], 'bankruptcy_law_pro_save_team_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array('position', 'experience', 'phone', 'email');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'bankruptcy_law_pro_save_team_meta');

/**
 * Добавление мета-полей для отзывов
 */
function bankruptcy_law_pro_add_testimonial_meta_boxes() {
    add_meta_box(
        'testimonial_details',
        'Информация о клиенте',
        'bankruptcy_law_pro_testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'bankruptcy_law_pro_add_testimonial_meta_boxes');

function bankruptcy_law_pro_testimonial_meta_box_callback($post) {
    wp_nonce_field('bankruptcy_law_pro_save_testimonial_meta', 'bankruptcy_law_pro_testimonial_meta_nonce');
    
    $client_position = get_post_meta($post->ID, 'client_position', true);
    $client_company = get_post_meta($post->ID, 'client_company', true);
    $rating = get_post_meta($post->ID, 'rating', true);
    
    echo '<table class="form-table">';
    echo '<tr><th><label for="client_position">Должность клиента</label></th>';
    echo '<td><input type="text" id="client_position" name="client_position" value="' . esc_attr($client_position) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="client_company">Компания клиента</label></th>';
    echo '<td><input type="text" id="client_company" name="client_company" value="' . esc_attr($client_company) . '" class="regular-text" /></td></tr>';
    echo '<tr><th><label for="rating">Оценка (1-5)</label></th>';
    echo '<td><input type="number" id="rating" name="rating" value="' . esc_attr($rating) . '" min="1" max="5" class="small-text" /></td></tr>';
    echo '</table>';
}

function bankruptcy_law_pro_save_testimonial_meta($post_id) {
    if (!isset($_POST['bankruptcy_law_pro_testimonial_meta_nonce']) || 
        !wp_verify_nonce($_POST['bankruptcy_law_pro_testimonial_meta_nonce'], 'bankruptcy_law_pro_save_testimonial_meta')) {
        return;
    }
    
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }
    
    $fields = array('client_position', 'client_company', 'rating');
    
    foreach ($fields as $field) {
        if (isset($_POST[$field])) {
            update_post_meta($post_id, $field, sanitize_text_field($_POST[$field]));
        }
    }
}
add_action('save_post', 'bankruptcy_law_pro_save_testimonial_meta');

/**
 * Fallback меню
 */
function bankruptcy_law_pro_fallback_menu() {
    echo '<ul id="primary-menu" class="nav-menu">';
    echo '<li><a href="' . home_url() . '">Главная</a></li>';
    echo '<li><a href="#about">О нас</a></li>';
    echo '<li><a href="#services">Услуги</a></li>';
    echo '<li><a href="#team">Команда</a></li>';
    echo '<li><a href="#contact">Контакты</a></li>';
    echo '</ul>';
}

/**
 * Кастомизация excerpt
 */
function bankruptcy_law_pro_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'bankruptcy_law_pro_excerpt_length');

function bankruptcy_law_pro_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'bankruptcy_law_pro_excerpt_more');

/**
 * Добавление поддержки WooCommerce
 */
function bankruptcy_law_pro_woocommerce_support() {
    add_theme_support('woocommerce');
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'bankruptcy_law_pro_woocommerce_support');

/**
 * Оптимизация для SEO
 */
function bankruptcy_law_pro_seo_meta() {
    if (is_single()) {
        global $post;
        
        // Open Graph для постов
        echo '<meta property="og:type" content="article" />';
        echo '<meta property="og:title" content="' . esc_attr(get_the_title()) . '" />';
        echo '<meta property="og:description" content="' . esc_attr(wp_strip_all_tags(get_the_excerpt())) . '" />';
        echo '<meta property="og:url" content="' . esc_url(get_permalink()) . '" />';
        
        if (has_post_thumbnail()) {
            $img_src = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
            echo '<meta property="og:image" content="' . esc_url($img_src[0]) . '" />';
        }
        
        echo '<meta property="article:published_time" content="' . esc_attr(get_the_date('c')) . '" />';
        echo '<meta property="article:modified_time" content="' . esc_attr(get_the_modified_date('c')) . '" />';
    }
}
add_action('wp_head', 'bankruptcy_law_pro_seo_meta');

/**
 * Безопасность
 */
function bankruptcy_law_pro_security_headers() {
    // Удаление версии WordPress
    remove_action('wp_head', 'wp_generator');
    
    // Отключение XML-RPC
    add_filter('xmlrpc_enabled', '__return_false');
    
    // Скрытие информации о версии
    add_filter('the_generator', '__return_empty_string');
}
add_action('init', 'bankruptcy_law_pro_security_headers');

/**
 * Оптимизация производительности
 */
function bankruptcy_law_pro_performance_optimizations() {
    // Удаление лишних тегов из head
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Отключение emoji
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('admin_print_styles', 'print_emoji_styles');
}
add_action('init', 'bankruptcy_law_pro_performance_optimizations');

/****************************************************************/
/*              PRIVATE GITHUB THEME AUTO-UPDATER               */
/****************************************************************/

if (!class_exists('Bankruptcy_Law_Pro_GitHub_Updater')) {
    class Bankruptcy_Law_Pro_GitHub_Updater {
        private $theme_slug;
        private $version;
        private $repo_name;
        private $pat;

        public function __construct() {
            $theme = wp_get_theme();
            $this->theme_slug = 'intellex-consult-theme';
            $this->version = $theme->get('Version');
            $this->pat = get_theme_mod('github_pat');
            
            // ЗАМЕНИТЕ ЭТОТ URL!
            // Укажите здесь ваш приватный репозиторий в формате 'username/repo-name'.
            $this->repo_name = 'mrvi0/IntellexConsult'; // Пример: 'owner/my-theme-repo'

            add_filter('pre_set_site_transient_update_themes', array($this, 'check_for_update'));
            
            // Добавляем отладку
            add_action('admin_notices', array($this, 'debug_notice'));
        }

        public function check_for_update($transient) {
            // Добавляем отладку
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log('Intellex Consult Updater: Checking for updates');
                error_log('Intellex Consult Updater: Current version: ' . $this->version);
                error_log('Intellex Consult Updater: PAT set: ' . (!empty($this->pat) ? 'Yes' : 'No'));
            }

            if (empty($transient->checked) || empty($this->pat)) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: Skipping check - empty transient or no PAT');
                }
                return $transient;
            }

            $remote_release = $this->_get_latest_github_release();

            if (!$remote_release) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: No remote release found');
                }
                return $transient;
            }
            
            $remote_version = ltrim($remote_release->tag_name, 'v');

            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log('Intellex Consult Updater: Remote version: ' . $remote_version);
            }

            if (version_compare($this->version, $remote_version, '<')) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: Update available!');
                }
                
                $package_url = $this->get_redirected_zipball_url("https://api.github.com/repos/{$this->repo_name}/zipball/{$remote_release->tag_name}");

                if (!$package_url) {
                    if (defined('WP_DEBUG') && WP_DEBUG) {
                        error_log('Intellex Consult Updater: FAILED to resolve redirect URL. Aborting update availability.');
                    }
                    return $transient;
                }

                $transient->response[$this->theme_slug] = array(
                    'theme'       => $this->theme_slug,
                    'new_version' => $remote_version,
                    'url'         => $remote_release->html_url,
                    'package'     => $package_url,
                );
            } else {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: No update needed');
                }
            }

            return $transient;
        }

        private function get_redirected_zipball_url($url) {
            if (empty($this->pat)) {
                return false;
            }

            $args = [
                'timeout'   => 15,
                'headers'   => [
                    'Authorization' => "Bearer {$this->pat}",
                    'Accept'        => 'application/vnd.github+json',
                    'X-GitHub-Api-Version' => '2022-11-28'
                ],
                'method'    => 'HEAD'
            ];

            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log("Intellex Consult Updater: Requesting HEAD for redirect from {$url}");
            }
            
            $response = wp_remote_request($url, $args);

            if (is_wp_error($response)) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: WP Error on HEAD request: ' . $response->get_error_message());
                }
                return false;
            }

            $response_code = wp_remote_retrieve_response_code($response);
            
            if ($response_code === 302) {
                $redirect_url = wp_remote_retrieve_header($response, 'location');
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log("Intellex Consult Updater: Resolved redirect URL to: {$redirect_url}");
                }
                return $redirect_url;
            } else {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    $response_body = wp_remote_retrieve_body($response);
                    error_log("Intellex Consult Updater: Expected a 302 redirect but got {$response_code}.");
                    error_log('Intellex Consult Updater: Response body on HEAD: ' . $response_body);
                }
                return false;
            }
        }

        private function _get_latest_github_release() {
            $url = "https://api.github.com/repos/{$this->repo_name}/releases/latest";
            $args = ['timeout' => 15];
            
            if (!empty($this->pat)) {
                $args['headers'] = [
                    'Authorization' => "Bearer {$this->pat}",
                    'Accept' => 'application/vnd.github+json',
                    'X-GitHub-Api-Version' => '2022-11-28',
                    'User-Agent' => 'Intellex-Consult-Theme-Updater'
                ];
            }

            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log('Intellex Consult Updater: Requesting: ' . $url);
            }

            $response = wp_remote_get($url, $args);

            if (is_wp_error($response)) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: WP Error: ' . $response->get_error_message());
                }
                return false;
            }

            $response_code = wp_remote_retrieve_response_code($response);
            $response_body = wp_remote_retrieve_body($response);
            
            if ($response_code !== 200) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: HTTP Error: ' . $response_code);
                    error_log('Intellex Consult Updater: Response body: ' . $response_body);
                }
                
                // Проверяем конкретные ошибки
                if ($response_code === 404) {
                    error_log('Intellex Consult Updater: Repository not found. Check repository name: ' . $this->repo_name);
                } elseif ($response_code === 401) {
                    error_log('Intellex Consult Updater: Unauthorized. Check PAT token permissions.');
                } elseif ($response_code === 403) {
                    error_log('Intellex Consult Updater: Forbidden. Check PAT token scope (needs "repo" permission).');
                }
                
                return false;
            }

            $release = json_decode($response_body);

            if (empty($release) || !isset($release->tag_name)) {
                if (defined('WP_DEBUG') && WP_DEBUG) {
                    error_log('Intellex Consult Updater: Invalid release data');
                    error_log('Intellex Consult Updater: Response: ' . $response_body);
                }
                return false;
            }
            
            if (defined('WP_DEBUG') && WP_DEBUG) {
                error_log('Intellex Consult Updater: Release found: ' . $release->tag_name);
            }
            
            return $release;
        }

        // Отладочное уведомление
        public function debug_notice() {
            if (isset($_GET['page']) && $_GET['page'] === 'intellex_consult_options' && current_user_can('manage_options')) {
                $theme = wp_get_theme();
                $pat = get_theme_mod('github_pat');
                
                echo '<div class="notice notice-info is-dismissible">';
                echo '<h4>Отладочная информация Intellex Consult Updater:</h4>';
                echo '<p><strong>Тема:</strong> ' . esc_html($theme->get('Name')) . '</p>';
                echo '<p><strong>Текущая версия:</strong> ' . esc_html($theme->get('Version')) . '</p>';
                echo '<p><strong>Slug темы (фактический):</strong> ' . esc_html($theme->get_stylesheet()) . '</p>';
                echo '<p><strong>Slug темы (используемый):</strong> ' . esc_html($this->theme_slug) . '</p>';
                echo '<p><strong>Репозиторий:</strong> ' . esc_html($this->repo_name) . '</p>';
                echo '<p><strong>PAT настроен:</strong> ' . (!empty($pat) ? 'Да (' . substr($pat, 0, 8) . '...)' : 'Нет') . '</p>';
                
                // Проверяем последний релиз с подробной диагностикой
                if (!empty($pat)) {
                    echo '<hr style="margin: 15px 0; border: none; border-top: 1px solid #ddd;">';
                    echo '<h5>Диагностика GitHub API:</h5>';
                    
                    $url = "https://api.github.com/repos/{$this->repo_name}/releases/latest";
                    echo '<p><strong>URL запроса:</strong> ' . esc_html($url) . '</p>';
                    
                    $args = ['timeout' => 15];
                    $args['headers'] = [
                        'Authorization' => "Bearer {$pat}",
                        'Accept' => 'application/vnd.github+json',
                        'X-GitHub-Api-Version' => '2022-11-28',
                        'User-Agent' => 'Intellex-Consult-Theme-Updater'
                    ];
                    
                    $response = wp_remote_get($url, $args);
                    
                    if (is_wp_error($response)) {
                        echo '<p><strong>Ошибка WordPress:</strong> ' . esc_html($response->get_error_message()) . '</p>';
                    } else {
                        $response_code = wp_remote_retrieve_response_code($response);
                        $response_body = wp_remote_retrieve_body($response);
                        $response_headers = wp_remote_retrieve_headers($response);
                        
                        echo '<p><strong>HTTP код ответа:</strong> ' . esc_html($response_code) . '</p>';
                        echo '<p><strong>Заголовки ответа:</strong></p>';
                        echo '<pre style="background: #f5f5f5; padding: 10px; font-size: 12px; overflow-x: auto;">';
                        foreach ($response_headers as $header => $value) {
                            echo esc_html($header . ': ' . $value) . "\n";
                        }
                        echo '</pre>';
                        
                        if ($response_code !== 200) {
                            echo '<p><strong>Тело ответа (ошибка):</strong></p>';
                            echo '<pre style="background: #f5f5f5; padding: 10px; font-size: 12px; overflow-x: auto;">';
                            echo esc_html($response_body);
                            echo '</pre>';
                        } else {
                            $release = json_decode($response_body);
                            if ($release && isset($release->tag_name)) {
                                $remote_version = ltrim($release->tag_name, 'v');
                                echo '<p><strong>Последняя версия на GitHub:</strong> ' . esc_html($remote_version) . '</p>';
                                echo '<p><strong>Обновление доступно:</strong> ' . (version_compare($theme->get('Version'), $remote_version, '<') ? 'Да' : 'Нет') . '</p>';
                                echo '<p><strong>URL релиза:</strong> <a href="' . esc_url($release->html_url) . '" target="_blank">' . esc_html($release->html_url) . '</a></p>';
                                echo '<p><strong>URL для скачивания zipball:</strong> <a href="' . esc_url("https://api.github.com/repos/{$this->repo_name}/zipball/{$release->tag_name}") . '" target="_blank">' . esc_html("https://api.github.com/repos/{$this->repo_name}/zipball/{$release->tag_name}") . '</a></p>';
                            } else {
                                echo '<p><strong>Ошибка парсинга JSON:</strong> Неверный формат ответа</p>';
                                echo '<p><strong>Тело ответа:</strong></p>';
                                echo '<pre style="background: #f5f5f5; padding: 10px; font-size: 12px; overflow-x: auto;">';
                                echo esc_html($response_body);
                                echo '</pre>';
                            }
                        }
                    }
                }
                
                echo '</div>';
            }
        }

        // Геттеры для доступа к свойствам
        public function get_theme_slug() {
            return $this->theme_slug;
        }

        public function get_version() {
            return $this->version;
        }

        public function get_latest_github_release() {
            return $this->_get_latest_github_release();
        }
    }
    
    new Bankruptcy_Law_Pro_GitHub_Updater();
}

/****************************************************************/
/*                      THEME OPTIONS PAGE                      */
/****************************************************************/

// Добавление страницы настроек темы
function bankruptcy_law_pro_add_theme_options_page() {
    add_theme_page(
        'Настройки темы Intellex Consult', // Title of the page
        'Настройки темы',                  // Text to show on the menu
        'manage_options',                  // Capability requirement (изменено с edit_theme_options)
        'intellex_consult_options',        // Menu slug
        'bankruptcy_law_pro_render_options_page' // Callback function
    );
}
add_action('admin_menu', 'bankruptcy_law_pro_add_theme_options_page');

// Рендер страницы настроек
function bankruptcy_law_pro_render_options_page() {
    // Проверяем права доступа
    if (!current_user_can('manage_options')) {
        wp_die(__('У вас недостаточно прав для доступа к этой странице.'));
    }
    
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="card">
            <h2 class="title">Проверка обновлений</h2>
            <p>Нажмите на кнопку ниже, чтобы принудительно проверить наличие обновлений для темы. WordPress также проверяет обновления автоматически дважды в день.</p>
            <p>Если новая версия доступна, вы увидите уведомление в разделе "Внешний вид" -> "Темы" или "Консоль" -> "Обновления".</p>
            
            <?php
                $check_url = wp_nonce_url(
                    admin_url('themes.php?page=intellex_consult_options&action=check_theme_update'),
                    'check_updates_nonce',
                    'intellex_nonce'
                );
            ?>
            
            <a href="<?php echo esc_url($check_url); ?>" class="button button-primary">Проверить обновления</a>
        </div>
        
        <div class="card">
            <h2 class="title">Информация о теме</h2>
            <?php
            $theme = wp_get_theme();
            ?>
            <table class="form-table">
                <tr>
                    <th scope="row">Название темы:</th>
                    <td><?php echo esc_html($theme->get('Name')); ?></td>
                </tr>
                <tr>
                    <th scope="row">Версия:</th>
                    <td><?php echo esc_html($theme->get('Version')); ?></td>
                </tr>
                <tr>
                    <th scope="row">Автор:</th>
                    <td><?php echo esc_html($theme->get('Author')); ?></td>
                </tr>
                <tr>
                    <th scope="row">GitHub PAT настроен:</th>
                    <td><?php echo get_theme_mod('github_pat') ? 'Да' : 'Нет'; ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
}

// Обработчик ручной проверки обновлений
function bankruptcy_law_pro_manual_update_check() {
    if (isset($_GET['action']) && $_GET['action'] === 'check_theme_update') {
        // Проверка nonce для безопасности
        if (!isset($_GET['intellex_nonce']) || !wp_verify_nonce($_GET['intellex_nonce'], 'check_updates_nonce')) {
            wp_die('Проверка безопасности не пройдена!');
        }
        
        // Проверяем права доступа
        if (!current_user_can('manage_options')) {
            wp_die('У вас недостаточно прав для выполнения этого действия.');
        }
        
        // Удаляем кеш с информацией об обновлениях тем
        delete_site_transient('update_themes');
        
        // Принудительно вызываем проверку обновлений
        $updater = new Bankruptcy_Law_Pro_GitHub_Updater();
        
        // Создаем временный transient для проверки
        $transient = new stdClass();
        $transient->checked = array();
        $transient->checked[$updater->get_theme_slug()] = $updater->get_version();
        
        // Вызываем проверку обновлений
        $updated_transient = $updater->check_for_update($transient);
        
        // Сохраняем результат
        set_site_transient('update_themes', $updated_transient);

        // Перенаправляем обратно на страницу настроек с сообщением об успехе
        wp_redirect(admin_url('themes.php?page=intellex_consult_options&update-checked=true'));
        exit;
    }
}
add_action('admin_init', 'bankruptcy_law_pro_manual_update_check');

// Уведомление об успешной проверке
function bankruptcy_law_pro_update_checked_notice() {
    if (isset($_GET['update-checked']) && $_GET['update-checked'] === 'true') {
        echo '<div class="notice notice-success is-dismissible"><p>Проверка обновлений завершена. Если доступна новая версия, вы увидите уведомление.</p></div>';
    }
}
add_action('admin_notices', 'bankruptcy_law_pro_update_checked_notice');

/**
 * Получение значений по умолчанию для FAQ
 */
function get_default_faq_question($number) {
    $questions = array(
        1 => 'Сколько длится процедура банкротства?',
        2 => 'Какие последствия процедуры банкротства?',
        3 => 'При какой сумме долга можно банкротиться?',
        4 => 'Смогу ли я сохранить свое жилье?',
        5 => 'Сколько стоит сопровождение процедуры банкротства?',
        6 => 'Можно ли банкротиться повторно?',
        7 => 'Что происходит с имуществом при банкротстве?',
        8 => 'Как долго действуют ограничения после банкротства?',
        9 => 'Можно ли скрыть имущество от кредиторов?',
        10 => 'Какие документы нужны для банкротства?'
    );
    
    return isset($questions[$number]) ? $questions[$number] : '';
}

function get_default_faq_answer($number) {
    $answers = array(
        1 => 'Многие думают, что дело о банкротстве длится 6 месяцев, но на практике это не всегда так. Сроки процедуры банкротства зависят от множества факторов: активности кредиторов, загруженности судов, наличия ликвидного имущества, уровня дохода (для физического лица) и др. В связи с этим прогнозировать сроки рассмотрения дела о банкротстве со 100%-й вероятностью затруднительно. Однако, обращаясь к нам, вы можете быть уверены, что работа будет выполняться максимально эффективно.',
        
        2 => '<strong>Для граждан:</strong><br>
<ul>
<li>освобождение/неосвобождение от долгов;</li>
<li>в течение пяти лет с момента завершения процедуры банкротства при оформлении кредитов и займов необходимо указывать на факт своего банкротства;</li>
<li>в течение трех лет нельзя занимать должность в органах управления юридического лица;</li>
<li>в течение десяти лет нельзя участвовать в управлении кредитными организациями;</li>
<li>в течение пяти лет нельзя подавать заявление о собственном банкротстве.</li>
</ul>
<strong>Для юридических лиц:</strong><br>
<ul>
<li>исключение юридического лица из ЕГРЮЛ.</li>
</ul>',
        
        3 => 'Для граждан сумма долга должна составлять не менее 500 000 рублей. Для юридических лиц сумма долга должна составлять не менее 2 000 000 рублей. Указанные пороговые значения распространяются на заявления конкурсных кредиторов, уполномоченных органов, а также работников, бывших работников должника. Ограничения по пороговому значению не применяются в отношении заявлений должника о собственном банкротстве.',
        
        4 => 'Все имущество должника включается в конкурсную массу для его дальнейшей реализации и распределения полученных денежных средств между кредиторами. Иммунитет распространяется на единственное жилье должника, то есть оно не включается в конкурсную массу и не реализуется на торгах. Однако оно не должно являться роскошным. Особому риску подвергается недвижимое имущество, которое находится в залоге. По общему правилу залоговое жилье, даже если оно является единственным, подлежит продаже. Однако существуют инструменты, позволяющие сохранить за должником и такое имущество.',
        
        5 => 'Стоимость услуг по сопровождению процедуры банкротства определяется в индивидуальном порядке по итогам проведения первой консультации.',
        
        6 => 'Да, можно подать заявление о банкротстве повторно, но только по истечении пяти лет с момента завершения предыдущей процедуры банкротства. При этом необходимо учитывать, что повторное банкротство может повлечь более серьезные последствия и ограничения.',
        
        7 => 'При банкротстве все имущество должника включается в конкурсную массу и подлежит реализации. Исключение составляет имущество, на которое не может быть обращено взыскание (единственное жилье, предметы домашнего обихода, профессиональные инструменты и др.).',
        
        8 => 'Ограничения после банкротства действуют в течение 3-10 лет в зависимости от их характера. Например, запрет на занятие руководящих должностей - 3 года, запрет на участие в управлении кредитными организациями - 10 лет.',
        
        9 => 'Скрытие имущества от кредиторов является уголовно наказуемым деянием и может повлечь серьезные последствия, включая уголовную ответственность. Рекомендуется действовать честно и открыто.',
        
        10 => 'Для подачи заявления о банкротстве потребуются документы, подтверждающие наличие долга, документы о личности, справки о доходах и имуществе, а также другие документы в зависимости от конкретной ситуации. Полный список документов предоставляется на консультации.'
    );
    
    return isset($answers[$number]) ? $answers[$number] : '';
} 