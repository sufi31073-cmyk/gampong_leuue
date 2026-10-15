import './bootstrap';

// 1. Theme Management (Sunrise, Tourism, GoGreen, Classic, DarkMode)
document.addEventListener('DOMContentLoaded', () => {
    // A. Init Theme from localStorage
    const savedTheme = localStorage.getItem('desa_theme') || 'sawah';
    const isDark = localStorage.getItem('desa_dark_mode') === 'true';

    document.documentElement.setAttribute('data-theme', savedTheme);
    if (isDark) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }

    // B. Theme Switcher Buttons
    const themeButtons = document.querySelectorAll('[data-set-theme]');
    themeButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const theme = btn.getAttribute('data-set-theme');
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('desa_theme', theme);
            updateThemeActiveState(theme);
        });
    });

    function updateThemeActiveState(currentTheme) {
        themeButtons.forEach(btn => {
            if (btn.getAttribute('data-set-theme') === currentTheme) {
                btn.classList.add('ring-2', 'ring-white', 'scale-110');
            } else {
                btn.classList.remove('ring-2', 'ring-white', 'scale-110');
            }
        });
    }
    updateThemeActiveState(savedTheme);

    // C. Dark Mode Toggle
    const darkModeToggles = document.querySelectorAll('.dark-mode-toggle');
    darkModeToggles.forEach(toggle => {
        toggle.addEventListener('click', () => {
            const isCurrentlyDark = document.documentElement.classList.contains('dark');
            if (isCurrentlyDark) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('desa_dark_mode', 'false');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('desa_dark_mode', 'true');
            }
        });
    });

    // 2. Realtime Digital Clock & Indonesian Date
    const clockEl = document.getElementById('live-digital-clock');
    if (clockEl) {
        function updateClock() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            clockEl.textContent = `${hours}:${minutes}:${seconds} WIB`;
        }
        setInterval(updateClock, 1000);
        updateClock();
    }

    // 3. Floating WhatsApp CZM Chat Support
    const chatSupportBtn = document.getElementById('chat-support-button');
    const chatSupportPopup = document.getElementById('chat-support-popup');
    const chatSupportClose = document.getElementById('chat-support-close');

    if (chatSupportBtn && chatSupportPopup) {
        chatSupportBtn.addEventListener('click', () => {
            chatSupportPopup.classList.toggle('hidden');
            chatSupportPopup.classList.toggle('flex');
        });

        if (chatSupportClose) {
            chatSupportClose.addEventListener('click', () => {
                chatSupportPopup.classList.add('hidden');
                chatSupportPopup.classList.remove('flex');
            });
        }
    }

    // 4. Scroll To Top Button
    const scrollTopBtn = document.getElementById('scroll-to-top');
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.remove('opacity-0', 'pointer-events-none');
                scrollTopBtn.classList.add('opacity-100');
            } else {
                scrollTopBtn.classList.add('opacity-0', 'pointer-events-none');
                scrollTopBtn.classList.remove('opacity-100');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // 5. Mobile Drawer Menu Toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-toggle');
    const mobileDrawer = document.getElementById('mobile-drawer');
    const mobileDrawerClose = document.getElementById('mobile-drawer-close');
    const mobileDrawerOverlay = document.getElementById('mobile-drawer-overlay');

    if (mobileMenuBtn && mobileDrawer) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileDrawer.classList.remove('-translate-x-full');
            if (mobileDrawerOverlay) mobileDrawerOverlay.classList.remove('hidden');
        });

        const closeDrawer = () => {
            mobileDrawer.classList.add('-translate-x-full');
            if (mobileDrawerOverlay) mobileDrawerOverlay.classList.add('hidden');
        };

        if (mobileDrawerClose) mobileDrawerClose.addEventListener('click', closeDrawer);
        if (mobileDrawerOverlay) mobileDrawerOverlay.addEventListener('click', closeDrawer);
    }

    // 6. Interactive Hero Banner Carousel Slider
    const heroSlider = document.getElementById('hero-banner-carousel');
    if (heroSlider) {
        const slides = heroSlider.querySelectorAll('.hero-slider-slide');
        const prevBtn = heroSlider.querySelector('#hero-slider-prev');
        const nextBtn = heroSlider.querySelector('#hero-slider-next');
        const indicators = heroSlider.querySelectorAll('.hero-slider-indicator');
        const counterEl = heroSlider.querySelector('#hero-slide-counter');
        const progressBar = heroSlider.querySelector('#hero-slide-progress-bar');
        
        let currentIndex = 0;
        let autoPlayInterval = null;
        const totalSlides = slides.length;
        const autoPlayDuration = 5500;

        function showSlide(index) {
            if (index < 0) {
                currentIndex = totalSlides - 1;
            } else if (index >= totalSlides) {
                currentIndex = 0;
            } else {
                currentIndex = index;
            }

            slides.forEach((slide, idx) => {
                if (idx === currentIndex) {
                    slide.classList.add('active');
                } else {
                    slide.classList.remove('active');
                }
            });

            indicators.forEach((ind, idx) => {
                const innerBar = ind.querySelector('.indicator-bar');
                if (idx === currentIndex) {
                    ind.classList.add('bg-white', 'w-10');
                    ind.classList.remove('bg-white/40', 'w-3');
                    if (innerBar) {
                        innerBar.style.animation = 'none';
                        void innerBar.offsetWidth; // trigger reflow
                        innerBar.style.animation = `heroProgress ${autoPlayDuration}ms linear infinite`;
                    }
                } else {
                    ind.classList.remove('bg-white', 'w-10');
                    ind.classList.add('bg-white/40', 'w-3');
                    if (innerBar) innerBar.style.animation = 'none';
                }
            });

            if (counterEl) {
                counterEl.textContent = `0${currentIndex + 1} / 0${totalSlides}`;
            }

            resetAutoPlay();
        }

        function nextSlide() {
            showSlide(currentIndex + 1);
        }

        function prevSlide() {
            showSlide(currentIndex - 1);
        }

        function startAutoPlay() {
            if (autoPlayInterval) clearInterval(autoPlayInterval);
            autoPlayInterval = setInterval(nextSlide, autoPlayDuration);
        }

        function resetAutoPlay() {
            clearInterval(autoPlayInterval);
            startAutoPlay();
        }

        if (nextBtn) nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            nextSlide();
        });

        if (prevBtn) prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            prevSlide();
        });

        indicators.forEach((ind, idx) => {
            ind.addEventListener('click', (e) => {
                e.preventDefault();
                showSlide(idx);
            });
        });

        // Pause on Hover
        heroSlider.addEventListener('mouseenter', () => {
            clearInterval(autoPlayInterval);
        });

        heroSlider.addEventListener('mouseleave', () => {
            startAutoPlay();
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowRight') {
                const rect = heroSlider.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) nextSlide();
            } else if (e.key === 'ArrowLeft') {
                const rect = heroSlider.getBoundingClientRect();
                if (rect.top < window.innerHeight && rect.bottom > 0) prevSlide();
            }
        });

        // Touch Swipe Navigation for mobile
        let touchStartX = 0;
        let touchEndX = 0;

        heroSlider.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        heroSlider.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const swipeThreshold = 50;
            if (touchEndX < touchStartX - swipeThreshold) {
                nextSlide();
            }
            if (touchEndX > touchStartX + swipeThreshold) {
                prevSlide();
            }
        }

        // Initialize First Slide
        showSlide(0);
    }
});
