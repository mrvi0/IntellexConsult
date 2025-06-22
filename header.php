<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="<?php echo get_theme_mod('site_description', 'Intellex Consult - профессиональная помощь в банкротстве физических и юридических лиц. Опыт более 5 лет, 100% эффективность.'); ?>">
    <meta name="keywords" content="банкротство, взыскание задолженности, субсидиарная ответственность, арбитражный управляющий, юридические услуги">
    <meta name="author" content="Intellex Consult">
    
    <!-- Open Graph -->
    <meta property="og:title" content="<?php wp_title('|', true, 'right'); ?>">
    <meta property="og:description" content="<?php echo get_theme_mod('site_description', 'Intellex Consult - профессиональная помощь в банкротстве'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo esc_url(home_url('/')); ?>">
    
    <!-- Favicon -->
    <?php if (get_theme_mod('site_favicon')) : ?>
        <link rel="icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>">
    <?php endif; ?>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo">
                    <?php if (get_theme_mod('site_logo')) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url(get_theme_mod('site_logo')); ?>" alt="Intellex Consult" class="logo-image">
                        </a>
                    <?php else : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <span class="logo-text">Intellex</span><span class="logo-accent">Consult</span>
                        </a>
                    <?php endif; ?>
                </div>
                
                <nav>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class' => 'nav-menu',
                        'container' => false,
                        'fallback_cb' => 'bankruptcy_law_pro_fallback_menu',
                    ));
                    ?>
                </nav>
                
                <div class="header-contacts">
                    <a href="tel:<?php echo get_theme_mod('contact_phone', '+7 (495) 123-45-67'); ?>" class="header-phone">
                        <i class="fas fa-phone"></i>
                        <?php echo get_theme_mod('contact_phone', '+7 (495) 123-45-67'); ?>
                    </a>
                    <a href="#contact" class="btn btn-primary" data-modal="request">
                        <i class="fas fa-comments"></i>
                        Бесплатная консультация
                    </a>
                </div>
                
                <button class="mobile-menu-btn" aria-label="Открыть меню">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </header>

    <!-- Основной контент -->
    <div id="content" class="site-content"> 