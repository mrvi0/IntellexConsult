/**
 * Основной JavaScript файл для темы Bankruptcy Law Pro
 * 
 * @package Bankruptcy_Law_Pro
 */

(function($) {
    'use strict';

    // Документ готов
    $(document).ready(function() {
        
        // Инициализация всех функций с проверками
        initMobileMenu();
        initSmoothScroll();
        initModal();
        initScrollAnimations();
        initHeaderScroll();
        initFormValidation();
        initLazyLoading();
        initTooltips();
        initFAQ();
        initNumberAnimation();
        initServiceFilter();
        initTestimonialsSlider();
        initParallax();
        initFadeInElements();
        
    });

    /**
     * Мобильное меню
     */
    function initMobileMenu() {
        const $mobileBtn = $('.mobile-menu-btn');
        const $navMenu = $('.nav-menu');
        const $navLinks = $('.nav-menu a');

        $mobileBtn.on('click', function() {
            $(this).toggleClass('active');
            $navMenu.toggleClass('active');
            $('body').toggleClass('menu-open');
        });

        // Закрыть меню при клике на ссылку
        $navLinks.on('click', function() {
            $mobileBtn.removeClass('active');
            $navMenu.removeClass('active');
            $('body').removeClass('menu-open');
        });

        // Закрыть меню при клике вне его
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.nav-menu, .mobile-menu-btn').length) {
                $mobileBtn.removeClass('active');
                $navMenu.removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }

    /**
     * Плавный скролл
     */
    function initSmoothScroll() {
        // Используем делегирование событий для всех ссылок, содержащих якорь
        $(document).on('click', 'a[href*="#"]', function(e) {
            // Убеждаемся, что ссылка ведет на текущую страницу
            const currentPath = window.location.pathname.replace(/^\//, '');
            const linkPath = this.pathname.replace(/^\//, '');

            if (currentPath !== linkPath) {
                // Это ссылка на другую страницу, ничего не делаем
                return;
            }

            const hash = this.hash;
            const $target = $(hash);

            // Убеждаемся, что якорь существует на странице
            if (hash && $target.length) {
                // Игнорируем ссылки, используемые для других компонентов (модальные окна, табы и т.д.)
                if ($(this).data('modal') || $(this).data('toggle') || $(this).data('slide')) {
                    return;
                }
                
                e.preventDefault();

                const headerHeight = $('.header').outerHeight() || 0;
                const targetPosition = $target.offset().top - headerHeight - 20; // Дополнительный отступ

                $('html, body').stop().animate({
                    scrollTop: targetPosition
                }, {
                    duration: 800,
                    easing: 'swing',
                    complete: function() {
                        // Обновляем URL в строке браузера
                        if (history.pushState) {
                            history.pushState(null, null, hash);
                        }
                    }
                });
            }
        });
    }

    /**
     * Модальные окна
     */
    function initModal() {
        const $modal = $('#request-modal');
        const $modalTriggers = $('[data-modal="request"]');
        const $modalClose = $('.modal-close');

        // Проверяем существование элементов
        if (!$modal.length) {
            console.log('Modal element not found, skipping modal initialization');
            return;
        }

        // Проверяем существование триггеров
        if ($modalTriggers.length) {
            $modalTriggers.on('click', function(e) {
                e.preventDefault();
                if ($modal.length) {
                    $modal.addClass('show');
                    $('body').addClass('modal-open');
                }
            });
        }

        // Проверяем существование кнопки закрытия
        if ($modalClose.length) {
            $modalClose.on('click', function() {
                if ($modal.length) {
                    $modal.removeClass('show');
                    $('body').removeClass('modal-open');
                }
            });
        }

        // Закрыть по клику вне модального окна
        if ($modal.length) {
            $modal.on('click', function(e) {
                if (e.target === this) {
                    $modal.removeClass('show');
                    $('body').removeClass('modal-open');
                }
            });
        }

        // Закрыть по Escape
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $modal.length && $modal.hasClass('show')) {
                $modal.removeClass('show');
                $('body').removeClass('modal-open');
            }
        });
    }

    /**
     * Анимации при прокрутке
     */
    function initScrollAnimations() {
        const $elements = $('.service-card, .team-member, .feature-item');
        
        // Проверяем существование элементов
        if (!$elements.length) return;

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate');
                }
            });
        }, observerOptions);

        // Наблюдаем за элементами
        $elements.each(function() {
            observer.observe(this);
        });
    }

    /**
     * Изменение хедера при прокрутке
     */
    function initHeaderScroll() {
        $(window).on('scroll', function() {
            const $header = $('.header');
            if ($(this).scrollTop() > 50) {
                $header.addClass('scrolled');
            } else {
                $header.removeClass('scrolled');
            }
        });
    }

    /**
     * Валидация форм
     */
    function initFormValidation() {
        $('form').on('submit', function(e) {
            const $form = $(this);
            const $requiredFields = $form.find('[required]');
            let isValid = true;

            $requiredFields.each(function() {
                const $field = $(this);
                const value = $field.val().trim();
                
                if (!value) {
                    $field.addClass('error');
                    isValid = false;
                } else {
                    $field.removeClass('error');
                }

                // Валидация email
                if ($field.attr('type') === 'email' && value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(value)) {
                        $field.addClass('error');
                        isValid = false;
                    }
                }

                // Валидация телефона
                if ($field.attr('type') === 'tel' && value) {
                    const phoneRegex = /^[\+]?[0-9\s\-\(\)]{10,}$/;
                    if (!phoneRegex.test(value)) {
                        $field.addClass('error');
                        isValid = false;
                    }
                }
            });

            if (!isValid) {
                e.preventDefault();
                showNotification('Пожалуйста, заполните все обязательные поля корректно', 'error');
            }
        });

        // Убрать ошибку при вводе
        $('input, textarea').on('input', function() {
            $(this).removeClass('error');
        });
    }

    /**
     * Ленивая загрузка изображений
     */
    function initLazyLoading() {
        const $images = $('img[data-src]');
        
        // Проверяем существование элементов
        if (!$images.length) return;

        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        $images.each(function() {
            imageObserver.observe(this);
        });
    }

    /**
     * Подсказки
     */
    function initTooltips() {
        const $tooltips = $('[data-tooltip]');
        
        // Проверяем существование элементов
        if (!$tooltips.length) return;

        $tooltips.on('mouseenter', function() {
            const tooltip = $(this).data('tooltip');
            $('<div class="tooltip">' + tooltip + '</div>')
                .appendTo('body')
                .css({
                    position: 'absolute',
                    left: $(this).offset().left + $(this).outerWidth() / 2,
                    top: $(this).offset().top - 30,
                    background: '#000',
                    color: '#fff',
                    padding: '5px 10px',
                    borderRadius: '3px',
                    fontSize: '12px',
                    zIndex: 1000
                });
        }).on('mouseleave', function() {
            $('.tooltip').remove();
        });
    }

    /**
     * Показать уведомление
     */
    function showNotification(message, type = 'info') {
        const $notification = $('<div class="notification notification-' + type + '">' + message + '</div>');
        $('body').append($notification);
        
        setTimeout(function() {
            $notification.addClass('show');
        }, 100);
        
        setTimeout(function() {
            $notification.removeClass('show');
            setTimeout(function() {
                $notification.remove();
            }, 300);
        }, 3000);
    }

    /**
     * AJAX отправка форм
     */
    function initAjaxForms() {
        $('.ajax-form').on('submit', function(e) {
            e.preventDefault();
            
            const $form = $(this);
            const $submitBtn = $form.find('[type="submit"]');
            const originalText = $submitBtn.text();
            
            $submitBtn.prop('disabled', true).text('Отправка...');
            
            $.ajax({
                url: $form.attr('action'),
                method: 'POST',
                data: $form.serialize(),
                success: function(response) {
                    showNotification('Сообщение успешно отправлено!', 'success');
                    $form[0].reset();
                },
                error: function() {
                    showNotification('Произошла ошибка при отправке. Попробуйте еще раз.', 'error');
                },
                complete: function() {
                    $submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });
    }

    /**
     * Анимация чисел
     */
    function initNumberAnimation() {
        const $counters = $('.number-counter, .counter');
        
        // Проверяем существование элементов
        if (!$counters.length) return;

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const $counter = $(entry.target);
                    const target = parseInt($counter.data('count') || $counter.text());
                    const duration = 2000;
                    const step = target / (duration / 16);
                    let current = 0;
                    
                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        $counter.text(Math.floor(current));
                    }, 16);
                    
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        $counters.each(function() {
            observer.observe(this);
        });
    }

    /**
     * Фильтрация услуг
     */
    function initServiceFilter() {
        const $filters = $('.service-filter');
        const $serviceCards = $('.service-card');
        
        // Проверяем существование элементов
        if (!$filters.length || !$serviceCards.length) return;

        $filters.on('click', function(e) {
            e.preventDefault();
            
            const $this = $(this);
            const category = $this.data('category');
            
            $filters.removeClass('active');
            $this.addClass('active');
            
            if (category === 'all') {
                $serviceCards.show();
            } else {
                $serviceCards.hide();
                $('.service-card[data-category="' + category + '"]').show();
            }
        });
    }

    /**
     * Слайдер отзывов
     */
    function initTestimonialsSlider() {
        const $slider = $('.testimonials-slider');
        
        // Проверяем существование слайдера и доступность Slick
        if (!$slider.length || typeof $.fn.slick === 'undefined') return;

        $slider.slick({
            dots: true,
            arrows: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 5000,
            responsive: [
                {
                    breakpoint: 768,
                    settings: {
                        dots: false
                    }
                }
            ]
        });
    }

    /**
     * Параллакс эффект
     */
    function initParallax() {
        $(window).on('scroll', function() {
            const scrolled = $(this).scrollTop();
            
            $('.parallax').each(function() {
                const $this = $(this);
                const speed = $this.data('speed') || 0.5;
                const yPos = -(scrolled * speed);
                
                $this.css('transform', 'translateY(' + yPos + 'px)');
            });
        });
    }

    /**
     * Плавное появление элементов
     */
    function initFadeInElements() {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        });

        $('.fade-in').each(function() {
            this.style.opacity = '0';
            this.style.transform = 'translateY(30px)';
            this.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(this);
        });
    }

    /**
     * FAQ аккордеон
     */
    function initFAQ() {
        const $faqQuestions = $('.faq-question');
        
        // Проверяем существование элементов FAQ
        if (!$faqQuestions.length) {
            console.log('FAQ elements not found, skipping FAQ initialization');
            return;
        }

        $faqQuestions.on('click', function() {
            const $faqItem = $(this).closest('.faq-item');
            
            // Проверяем существование родительского элемента
            if ($faqItem.length) {
                // Закрываем все остальные элементы
                $('.faq-item').not($faqItem).removeClass('active');
                
                // Переключаем текущий элемент
                $faqItem.toggleClass('active');
            }
        });
    }

    // Дополнительные функции при необходимости
    if (typeof window.bankruptcyLawPro === 'undefined') {
        window.bankruptcyLawPro = {
            showNotification: showNotification,
            initServiceFilter: initServiceFilter
        };
    }

    // Анимация при прокрутке
    const scrollElements = document.querySelectorAll('.scroll-animation');
    
    const elementInView = (el, offset = 150) => {
        const elementTop = el.getBoundingClientRect().top;
        return (
            elementTop <= (window.innerHeight || document.documentElement.clientHeight) - offset
        );
    };
    
    const displayScrollElement = (element) => {
        element.classList.add('active');
    };
    
    const hideScrollElement = (element) => {
        element.classList.remove('active');
    };
    
    const handleScrollAnimation = () => {
        scrollElements.forEach((el) => {
            if (elementInView(el)) {
                displayScrollElement(el);
            } else {
                hideScrollElement(el);
            }
        });
    };
    
    // Первичная проверка элементов при загрузке
    window.addEventListener('load', () => {
        handleScrollAnimation();
    });
    
    // Проверка при скролле
    window.addEventListener('scroll', () => {
        handleScrollAnimation();
    });

    // Анимация счетчиков статистики
    function animateCounters() {
        const counters = document.querySelectorAll('.stat-number');
        
        // Проверяем существование счетчиков
        if (!counters.length) {
            console.log('Counter elements not found, skipping counter animation');
            return;
        }
        
        counters.forEach(counter => {
            // Проверяем наличие атрибута data-count
            if (!counter.hasAttribute('data-count')) {
                console.log('Counter missing data-count attribute, skipping');
                return;
            }
            
            const target = parseInt(counter.getAttribute('data-count'));
            
            // Проверяем валидность числа
            if (isNaN(target) || target <= 0) {
                console.log('Invalid counter target value:', target);
                return;
            }
            
            const duration = 2000; // 2 секунды
            const step = target / (duration / 16); // 60 FPS
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);
            }, 16);
        });
    }
    
    // Запуск анимации счетчиков при появлении в поле зрения
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        });
        
        observer.observe(statsSection);
    }

})(jQuery); 