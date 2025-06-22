/**
 * Основной JavaScript файл для темы Bankruptcy Law Pro
 * 
 * @package Bankruptcy_Law_Pro
 */

(function($) {
    'use strict';

    // Документ готов
    $(document).ready(function() {
        
        // Инициализация всех функций
        initMobileMenu();
        initSmoothScroll();
        initBackToTop();
        initModal();
        initScrollAnimations();
        initHeaderScroll();
        initFormValidation();
        initLazyLoading();
        initTooltips();
        initFAQ();
        initNumberAnimation();
        
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
        $('a[href^="#"]').on('click', function(e) {
            e.preventDefault();
            
            const href = $(this).attr('href');
            
            // Пропускаем пустые ссылки
            if (href === '#') {
                return;
            }
            
            const target = $(href);
            if (target.length) {
                const headerHeight = $('.header').outerHeight() || 0;
                const targetPosition = target.offset().top - headerHeight - 20; // Дополнительный отступ
                
                $('html, body').animate({
                    scrollTop: targetPosition
                }, {
                    duration: 800,
                    easing: 'easeInOutCubic'
                });
                
                // Обновляем URL без перезагрузки страницы
                if (history.pushState) {
                    history.pushState(null, null, href);
                }
            }
        });
    }

    /**
     * Кнопка "Наверх"
     */
    function initBackToTop() {
        const $backToTop = $('#back-to-top');
        
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 300) {
                $backToTop.addClass('show');
            } else {
                $backToTop.removeClass('show');
            }
        });

        $backToTop.on('click', function(e) {
            e.preventDefault();
            
            // Плавный скролл наверх
            $('html, body').animate({
                scrollTop: 0
            }, {
                duration: 800,
                easing: 'easeInOutCubic'
            });
        });
    }

    /**
     * Модальные окна
     */
    function initModal() {
        const $modal = $('#request-modal');
        const $modalTriggers = $('[data-modal="request"]');
        const $modalClose = $('.modal-close');

        $modalTriggers.on('click', function(e) {
            e.preventDefault();
            $modal.addClass('show');
            $('body').addClass('modal-open');
        });

        $modalClose.on('click', function() {
            $modal.removeClass('show');
            $('body').removeClass('modal-open');
        });

        // Закрыть по клику вне модального окна
        $modal.on('click', function(e) {
            if (e.target === this) {
                $modal.removeClass('show');
                $('body').removeClass('modal-open');
            }
        });

        // Закрыть по Escape
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $modal.hasClass('show')) {
                $modal.removeClass('show');
                $('body').removeClass('modal-open');
            }
        });
    }

    /**
     * Анимации при прокрутке
     */
    function initScrollAnimations() {
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
        $('.service-card, .team-member, .feature-item').each(function() {
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
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            $('img[data-src]').each(function() {
                imageObserver.observe(this);
            });
        }
    }

    /**
     * Подсказки
     */
    function initTooltips() {
        $('[data-tooltip]').on('mouseenter', function() {
            const $this = $(this);
            const tooltipText = $this.data('tooltip');
            
            const $tooltip = $('<div class="tooltip">' + tooltipText + '</div>');
            $('body').append($tooltip);
            
            const rect = this.getBoundingClientRect();
            $tooltip.css({
                position: 'fixed',
                top: rect.top - $tooltip.outerHeight() - 10,
                left: rect.left + (rect.width / 2) - ($tooltip.outerWidth() / 2),
                zIndex: 10000
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
     * Анимация чисел при прокрутке (объединенная функция)
     */
    function initNumberAnimation() {
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const $counter = $(entry.target);
                    const countTo = parseInt($counter.data('count'), 10);
                    const duration = 2000;
                    
                    if (isNaN(countTo)) {
                        return;
                    }
                    
                    $({ countNum: 0 }).animate({
                        countNum: countTo
                    }, {
                        duration: duration,
                        easing: 'swing',
                        step: function() {
                            $counter.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $counter.text(this.countNum.toLocaleString('ru-RU'));
                        }
                    });
                    
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.5
        });

        $('.number-counter, .counter').each(function() {
            observer.observe(this);
        });
    }

    /**
     * Фильтрация услуг
     */
    function initServiceFilter() {
        $('.service-filter').on('click', function(e) {
            e.preventDefault();
            
            const $this = $(this);
            const category = $this.data('category');
            
            $('.service-filter').removeClass('active');
            $this.addClass('active');
            
            if (category === 'all') {
                $('.service-card').show();
            } else {
                $('.service-card').hide();
                $('.service-card[data-category="' + category + '"]').show();
            }
        });
    }

    /**
     * Слайдер отзывов
     */
    function initTestimonialsSlider() {
        if ($('.testimonials-slider').length) {
            $('.testimonials-slider').slick({
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
        $('.faq-question').on('click', function() {
            const $faqItem = $(this).closest('.faq-item');
            const $answer = $faqItem.find('.faq-answer');
            
            // Закрываем все остальные элементы
            $('.faq-item').not($faqItem).removeClass('active');
            $('.faq-item').not($faqItem).find('.faq-answer').slideUp(300);
            
            // Переключаем текущий элемент
            $faqItem.toggleClass('active');
            
            if ($faqItem.hasClass('active')) {
                $answer.slideDown(300);
            } else {
                $answer.slideUp(300);
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

})(jQuery); 