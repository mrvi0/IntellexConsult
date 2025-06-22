<?php
/**
 * Шаблон страницы "Услуги"
 * 
 * @package Bankruptcy_Law_Pro
 */

get_header(); ?>

<main id="main" class="site-main">
    <!-- Hero секция -->
    <section class="hero services-hero">
        <div class="container">
            <div class="hero-content">
                <h1><?php echo get_theme_mod('services_hero_title', 'Наши услуги'); ?></h1>
                <p><?php echo get_theme_mod('services_hero_subtitle', 'Комплексные решения в сфере банкротства физических и юридических лиц'); ?></p>
            </div>
        </div>
    </section>

    <!-- Основные услуги -->
    <section class="section services-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('services_title', 'Основные услуги'); ?></h2>
                <p><?php echo get_theme_mod('services_subtitle', 'Профессиональная помощь в процедурах банкротства'); ?></p>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="service-content">
                        <h3>Банкротство физических лиц</h3>
                        <p>Полное списание долгов через процедуру банкротства. Защита от кредиторов и сохранение имущества.</p>
                        <ul class="service-features">
                            <li>Списание всех долгов</li>
                            <li>Защита от коллекторов</li>
                            <li>Сохранение имущества</li>
                            <li>Снятие ограничений</li>
                        </ul>
                        <div class="service-price">
                            <span class="price">от 15 000 ₽</span>
                            <span class="period">в месяц</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card featured">
                    <div class="service-badge">Популярно</div>
                    <div class="service-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="service-content">
                        <h3>Банкротство юридических лиц</h3>
                        <p>Профессиональное сопровождение процедур банкротства компаний. Защита интересов собственников.</p>
                        <ul class="service-features">
                            <li>Ликвидация через банкротство</li>
                            <li>Защита от субсидиарной ответственности</li>
                            <li>Сохранение активов</li>
                            <li>Работа с кредиторами</li>
                        </ul>
                        <div class="service-price">
                            <span class="price">от 50 000 ₽</span>
                            <span class="period">за процедуру</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-balance-scale"></i>
                    </div>
                    <div class="service-content">
                        <h3>Защита арбитражных управляющих</h3>
                        <p>Правовая поддержка арбитражных управляющих. Защита от жалоб и претензий.</p>
                        <ul class="service-features">
                            <li>Защита от жалоб</li>
                            <li>Представление в суде</li>
                            <li>Консультации по процедурам</li>
                            <li>Документооборот</li>
                        </ul>
                        <div class="service-price">
                            <span class="price">от 30 000 ₽</span>
                            <span class="period">за дело</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div class="service-content">
                        <h3>Взыскание задолженности</h3>
                        <p>Эффективное взыскание дебиторской задолженности. Работа с должниками и судебные процедуры.</p>
                        <ul class="service-features">
                            <li>Досудебное взыскание</li>
                            <li>Судебные процедуры</li>
                            <li>Исполнительное производство</li>
                            <li>Работа с приставами</li>
                        </ul>
                        <div class="service-price">
                            <span class="price">от 20 000 ₽</span>
                            <span class="period">за дело</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-gavel"></i>
                    </div>
                    <div class="service-content">
                        <h3>Судебное представительство</h3>
                        <p>Профессиональное представительство в арбитражных судах. Защита интересов в спорах.</p>
                        <ul class="service-features">
                            <li>Подготовка документов</li>
                            <li>Участие в заседаниях</li>
                            <li>Обжалование решений</li>
                            <li>Исполнение решений</li>
                        </ul>
                        <div class="service-price">
                            <span class="price">от 25 000 ₽</span>
                            <span class="period">за дело</span>
                        </div>
                    </div>
                </div>
                
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-file-contract"></i>
                    </div>
                    <div class="service-content">
                        <h3>Консультации и аудит</h3>
                        <p>Правовой аудит и консультации по вопросам банкротства. Оценка рисков и рекомендации.</p>
                        <ul class="service-features">
                            <li>Правовой аудит</li>
                            <li>Оценка рисков</li>
                            <li>Консультации</li>
                            <li>Разработка стратегии</li>
                        </ul>
                        <div class="service-price">
                            <span class="price">от 10 000 ₽</span>
                            <span class="period">за консультацию</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Процесс работы -->
    <section class="section process-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('process_title', 'Как мы работаем'); ?></h2>
                <p><?php echo get_theme_mod('process_subtitle', 'Простые шаги к решению ваших проблем'); ?></p>
            </div>
            
            <div class="process-steps">
                <div class="process-step">
                    <div class="step-number">01</div>
                    <div class="step-content">
                        <h3>Консультация</h3>
                        <p>Бесплатная консультация по телефону или в офисе. Анализ ситуации и оценка перспектив.</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">02</div>
                    <div class="step-content">
                        <h3>Договор</h3>
                        <p>Заключение договора на оказание услуг. Определение стоимости и сроков работы.</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">03</div>
                    <div class="step-content">
                        <h3>Подготовка</h3>
                        <p>Сбор документов и подготовка заявления в суд. Подача документов в арбитражный суд.</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">04</div>
                    <div class="step-content">
                        <h3>Сопровождение</h3>
                        <p>Полное сопровождение процедуры банкротства. Участие во всех судебных заседаниях.</p>
                    </div>
                </div>
                
                <div class="process-step">
                    <div class="step-number">05</div>
                    <div class="step-content">
                        <h3>Результат</h3>
                        <p>Получение решения суда о банкротстве. Списание долгов и снятие ограничений.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section class="section benefits-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('benefits_title', 'Почему выбирают нас'); ?></h2>
                <p><?php echo get_theme_mod('benefits_subtitle', 'Наши преимущества в работе с банкротством'); ?></p>
            </div>
            
            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Быстрое решение</h3>
                        <p>Средний срок процедуры банкротства - 6-8 месяцев. Быстрое списание долгов.</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Полная защита</h3>
                        <p>Защита от кредиторов и коллекторов с момента подачи заявления в суд.</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Сохранение имущества</h3>
                        <p>Помогаем сохранить единственное жилье и необходимое имущество.</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-percentage"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>100% результат</h3>
                        <p>Гарантируем успешное завершение процедуры банкротства в 100% случаев.</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Поддержка 24/7</h3>
                        <p>Круглосуточная поддержка клиентов. Всегда на связи с вами.</p>
                    </div>
                </div>
                
                <div class="benefit-item">
                    <div class="benefit-icon">
                        <i class="fas fa-file-invoice-dollar"></i>
                    </div>
                    <div class="benefit-content">
                        <h3>Прозрачные цены</h3>
                        <p>Фиксированная стоимость услуг без скрытых доплат и комиссий.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ секция -->
    <section class="section faq-section">
        <div class="container">
            <div class="section-header">
                <h2><?php echo get_theme_mod('faq_title', 'Часто задаваемые вопросы'); ?></h2>
                <p><?php echo get_theme_mod('faq_subtitle', 'Ответы на популярные вопросы о банкротстве'); ?></p>
            </div>
            
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Сколько стоит процедура банкротства?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Стоимость процедуры банкротства физического лица составляет от 15 000 рублей в месяц. Для юридических лиц - от 50 000 рублей за процедуру. Точная стоимость зависит от сложности дела.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Сколько длится процедура банкротства?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Средний срок процедуры банкротства составляет 6-8 месяцев. В сложных случаях процедура может длиться до 12 месяцев.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Можно ли сохранить имущество при банкротстве?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Да, при банкротстве можно сохранить единственное жилье, предметы домашнего обихода, одежду и другие необходимые вещи. Мы поможем защитить ваше имущество.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Что происходит с долгами после банкротства?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>После завершения процедуры банкротства все долги списываются. Кредиторы больше не могут требовать их погашения.</p>
                    </div>
                </div>
                
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>Можно ли подать на банкротство повторно?</h3>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="faq-answer">
                        <p>Повторно подать на банкротство можно не ранее чем через 5 лет после завершения предыдущей процедуры.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA секция -->
    <section class="section cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Готовы начать процедуру банкротства?</h2>
                <p>Получите бесплатную консультацию и узнайте, как мы можем помочь</p>
                <div class="cta-buttons">
                    <a href="<?php echo get_permalink(get_page_by_path('kontakty')); ?>" class="btn btn-primary">
                        <i class="fas fa-phone"></i>
                        Получить консультацию
                    </a>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('phone_1', '+7 (999) 123-45-67')); ?>" class="btn btn-outline">
                        <i class="fas fa-phone-alt"></i>
                        Позвонить сейчас
                    </a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?> 