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
        'label' => __('Часы работы', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'text',
    ));
    
    // Второй номер телефона
    $wp_customize->add_setting('contact_phone_2', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_phone_2', array(
        'label' => __('Второй номер телефона (необязательно)', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'text',
    ));

    // Шорткод контактной формы
    $wp_customize->add_setting('contact_form_shortcode', array(
        'default' => '',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_form_shortcode', array(
        'label' => __('Шорткод контактной формы', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'description' => __('Вставьте сюда шорткод, например [contact-form-7 id="123" title="Контактная форма"]', 'bankruptcy-law-pro'),
        'type' => 'text',
    ));

    // Заголовок hero секции страницы контактов
    $wp_customize->add_setting('contact_hero_title', array(
        'default' => 'Свяжитесь с нами',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('contact_hero_title', array(
        'label' => __('Заголовок страницы контактов', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'text',
    ));

    // Подзаголовок hero секции страницы контактов
    $wp_customize->add_setting('contact_hero_subtitle', array(
        'default' => 'Мы всегда готовы ответить на ваши вопросы и помочь в решении любых юридических задач',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('contact_hero_subtitle', array(
        'label' => __('Подзаголовок страницы контактов', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'type' => 'textarea',
    ));

    // Код карты
    $wp_customize->add_setting('contact_map_embed', array(
        'default' => '',
        'sanitize_callback' => 'wp_kses_post',
    ));
    
    $wp_customize->add_control('contact_map_embed', array(
        'label' => __('Код карты (iframe)', 'bankruptcy-law-pro'),
        'section' => 'contact_settings',
        'description' => __('Вставьте код карты Google Maps или Яндекс.Карт', 'bankruptcy-law-pro'),
        'type' => 'textarea',
    ));

    // Заголовок hero секции страницы "О нас"
    $wp_customize->add_setting('about_hero_title', array(
        'default' => 'О нашей компании',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('about_hero_title', array(
        'label' => __('Заголовок страницы "О нас"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));

    // Подзаголовок hero секции страницы "О нас"
    $wp_customize->add_setting('about_hero_subtitle', array(
        'default' => 'Профессиональная команда юристов с многолетним опытом в сфере банкротства',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    
    $wp_customize->add_control('about_hero_subtitle', array(
        'label' => __('Подзаголовок страницы "О нас"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'textarea',
    ));

    // Заголовок hero секции страницы "Услуги"
    $wp_customize->add_setting('services_hero_title', array(
        'default' => 'Наши услуги',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('services_hero_title', array(
        'label' => __('Заголовок страницы "Услуги"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'text',
    ));
    // Подзаголовок hero секции страницы "Услуги"
    $wp_customize->add_setting('services_hero_subtitle', array(
        'default' => 'Комплексные решения в сфере банкротства физических и юридических лиц',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('services_hero_subtitle', array(
        'label' => __('Подзаголовок страницы "Услуги"', 'bankruptcy-law-pro'),
        'section' => 'homepage_settings',
        'type' => 'textarea',
    ));

    // Секция "Футер"
    $wp_customize->add_section('footer_settings', array(
        'title' => __('Футер', 'bankruptcy-law-pro'),
        'priority' => 50,
    ));

    // Ссылка на Политику конфиденциальности
    $wp_customize->add_setting('privacy_policy_page', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('privacy_policy_page', array(
        'label'       => __('Страница Политики конфиденциальности', 'bankruptcy-law-pro'),
        'section'     => 'footer_settings',
        'type'        => 'dropdown-pages',
        'settings'    => 'privacy_policy_page',
        'allow_addition' => true,
    ));

    // Ссылка на Условия использования
    $wp_customize->add_setting('terms_of_use_page', array(
        'default'           => 0,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('terms_of_use_page', array(
        'label'       => __('Страница Условий использования', 'bankruptcy-law-pro'),
        'section'     => 'footer_settings',
        'type'        => 'dropdown-pages',
        'settings'    => 'terms_of_use_page',
        'allow_addition' => true,
    ));

    // Социальные сети
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
            'name' => __('Услуги', 'bankruptcy-law-pro'),
            'singular_name' => __('Услуга', 'bankruptcy-law-pro'),
            'add_new_item' => __('Добавить новую услугу', 'bankruptcy-law-pro'),
            'edit_item' => __('Редактировать услугу', 'bankruptcy-law-pro'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-briefcase',
        'has_archive' => true,
        'rewrite' => array('slug' => 'services'),
        'supports' => array('title', 'editor', 'thumbnail'),
    ));

    // FAQ
    register_post_type('faq', array(
        'labels' => array(
            'name' => __('FAQ', 'bankruptcy-law-pro'),
            'singular_name' => __('Вопрос', 'bankruptcy-law-pro'),
            'add_new' => __('Добавить новый', 'bankruptcy-law-pro'),
            'add_new_item' => __('Добавить новый вопрос', 'bankruptcy-law-pro'),
            'edit_item' => __('Редактировать вопрос', 'bankruptcy-law-pro'),
            'new_item' => __('Новый вопрос', 'bankruptcy-law-pro'),
            'view_item' => __('Посмотреть вопрос', 'bankruptcy-law-pro'),
            'search_items' => __('Искать в FAQ', 'bankruptcy-law-pro'),
            'not_found' => __('Вопросов не найдено', 'bankruptcy-law-pro'),
            'not_found_in_trash' => __('В корзине вопросов не найдено', 'bankruptcy-law-pro'),
        ),
        'public' => true,
        'menu_icon' => 'dashicons-editor-help',
        'has_archive' => true,
        'rewrite' => array('slug' => 'faq'),
        'supports' => array('title', 'editor'),
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
 * Добавление метабоксов для команды
 */
function bankruptcy_law_pro_add_service_meta_boxes() {
    add_meta_box(
        'service_details',
        __('Детали услуги', 'bankruptcy-law-pro'),
        'bankruptcy_law_pro_service_meta_box_callback',
        'service',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'bankruptcy_law_pro_add_service_meta_boxes');

function bankruptcy_law_pro_service_meta_box_callback($post) {
    wp_nonce_field('bankruptcy_law_pro_save_service_meta', 'service_meta_nonce');

    $link = get_post_meta($post->ID, '_service_link', true);
    $icon = get_post_meta($post->ID, '_service_icon', true);

    echo '<p><label for="service_link">' . __('Ссылка на страницу услуги', 'bankruptcy-law-pro') . '</label>';
    echo '<input type="url" id="service_link" name="service_link" value="' . esc_url($link) . '" size="25" /></p>';

    echo '<p><label for="service_icon">' . __('Класс иконки (Font Awesome)', 'bankruptcy-law-pro') . '</label>';
    echo '<input type="text" id="service_icon" name="service_icon" value="' . esc_attr($icon) . '" size="25" placeholder="fas fa-briefcase" />';
    echo '<p class="description">' . __('Например: ', 'bankruptcy-law-pro') . '<code>fas fa-money-bill-wave</code></p>';
}

function bankruptcy_law_pro_save_service_meta($post_id) {
    if (!isset($_POST['service_meta_nonce']) || !wp_verify_nonce($_POST['service_meta_nonce'], 'bankruptcy_law_pro_save_service_meta')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['service_link'])) {
        update_post_meta($post_id, '_service_link', esc_url_raw($_POST['service_link']));
    }
    if (isset($_POST['service_icon'])) {
        update_post_meta($post_id, '_service_icon', sanitize_text_field($_POST['service_icon']));
    }
}
add_action('save_post', 'bankruptcy_law_pro_save_service_meta');

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