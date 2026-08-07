/**
 * Nani Transformers - Main JavaScript
 * Vanilla JS, no dependencies.
 */
(function () {
    'use strict';

    var TABLET_BREAKPOINT = 1024;
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    document.addEventListener('DOMContentLoaded', function () {

        /* ------------------------------------------------
           Mobile navigation drawer
           ------------------------------------------------ */
        var toggle = document.getElementById('mobileToggle');
        var nav = document.getElementById('mainNav');
        var body = document.body;
        var overlay = null;

        if (toggle && nav) {
            overlay = document.createElement('div');
            overlay.className = 'nav-overlay';
            body.appendChild(overlay);

            var openNav = function () {
                toggle.classList.add('active');
                nav.classList.add('active');
                overlay.classList.add('active');
                toggle.setAttribute('aria-expanded', 'true');
                body.style.overflow = 'hidden';
            };

            var closeNav = function () {
                toggle.classList.remove('active');
                nav.classList.remove('active');
                overlay.classList.remove('active');
                toggle.setAttribute('aria-expanded', 'false');
                body.style.overflow = '';
            };

            toggle.addEventListener('click', function () {
                if (nav.classList.contains('active')) {
                    closeNav();
                } else {
                    openNav();
                }
            });

            overlay.addEventListener('click', closeNav);

            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && nav.classList.contains('active')) {
                    closeNav();
                    toggle.focus();
                }
            });

            // Close on navigation. Without this, body stays
            // overflow:hidden for in-page links and the drawer
            // lingers over the destination on a slow load.
            nav.addEventListener('click', function (e) {
                var link = e.target.closest('a[href]');
                if (link && !link.closest('.submenu-toggle')) {
                    closeNav();
                }
            });

            // Reset state when resizing up to desktop
            var resizeTimer;
            window.addEventListener('resize', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    if (window.innerWidth > TABLET_BREAKPOINT) {
                        closeNav();
                        document.querySelectorAll('.has-dropdown.open').forEach(function (item) {
                            item.classList.remove('open');
                            var btn = item.querySelector('.submenu-toggle');
                            if (btn) btn.setAttribute('aria-expanded', 'false');
                        });
                    }
                }, 150);
            });
        }

        /* ------------------------------------------------
           Submenu accordion (tablet/mobile)
           The label stays a normal link; only the chevron
           toggles, so Products/Services remain reachable.
           ------------------------------------------------ */
        document.querySelectorAll('.submenu-toggle').forEach(function (btn) {
            btn.addEventListener('click', function (e) {
                if (window.innerWidth > TABLET_BREAKPOINT) return;
                e.preventDefault();
                e.stopPropagation();

                var item = btn.closest('.has-dropdown');
                if (!item) return;

                var isOpen = item.classList.toggle('open');
                btn.setAttribute('aria-expanded', isOpen ? 'true' : 'false');

                // Accordion: close siblings
                if (isOpen) {
                    document.querySelectorAll('.has-dropdown.open').forEach(function (other) {
                        if (other !== item) {
                            other.classList.remove('open');
                            var otherBtn = other.querySelector('.submenu-toggle');
                            if (otherBtn) otherBtn.setAttribute('aria-expanded', 'false');
                        }
                    });
                }
            });
        });

        /* ------------------------------------------------
           Sticky header shadow, rAF-throttled
           ------------------------------------------------ */
        var header = document.getElementById('mainHeader');
        var ticking = false;

        function onScroll() {
            if (header) {
                header.classList.toggle('scrolled', window.pageYOffset > 100);
            }
            ticking = false;
        }

        if (header) {
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    ticking = true;
                    window.requestAnimationFrame(onScroll);
                }
            }, { passive: true });

            onScroll();
        }

        /* ------------------------------------------------
           Scroll reveal animations
           ------------------------------------------------ */
        var animated = document.querySelectorAll('[data-animation]');

        if (animated.length) {
            if (reduceMotion || !('IntersectionObserver' in window)) {
                animated.forEach(function (el) { el.classList.add('animated'); });
            } else {
                var revealObserver = new IntersectionObserver(function (entries, obs) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('animated');
                            obs.unobserve(entry.target);
                        }
                    });
                }, { rootMargin: '0px 0px -60px 0px', threshold: 0.1 });

                animated.forEach(function (el) { revealObserver.observe(el); });
            }
        }

        /* ------------------------------------------------
           Counters
           ------------------------------------------------ */
        var counters = document.querySelectorAll('.counter');

        function runCounter(el) {
            var target = parseInt(el.getAttribute('data-target'), 10) || 0;

            if (reduceMotion) {
                el.textContent = target.toLocaleString('en-US');
                return;
            }

            var duration = 2000;
            var start = null;

            function step(timestamp) {
                if (start === null) start = timestamp;
                var progress = Math.min((timestamp - start) / duration, 1);
                // ease-out so the count decelerates instead of stopping dead
                var eased = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.floor(eased * target).toLocaleString('en-US');
                if (progress < 1) {
                    window.requestAnimationFrame(step);
                } else {
                    el.textContent = target.toLocaleString('en-US');
                }
            }

            window.requestAnimationFrame(step);
        }

        if (counters.length) {
            if (!('IntersectionObserver' in window)) {
                counters.forEach(runCounter);
            } else {
                var counterObserver = new IntersectionObserver(function (entries, obs) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            runCounter(entry.target);
                            obs.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });

                counters.forEach(function (c) { counterObserver.observe(c); });
            }
        }

        /* ------------------------------------------------
           Product tabs
           ------------------------------------------------ */
        var tabs = document.querySelectorAll('.product-tab');
        var panels = document.querySelectorAll('.tab-content');

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                var targetId = tab.getAttribute('data-tab');

                tabs.forEach(function (t) { t.classList.remove('active'); });
                panels.forEach(function (p) { p.classList.remove('active'); });

                tab.classList.add('active');
                var panel = document.getElementById(targetId);
                if (panel) panel.classList.add('active');
            });
        });

        /* ------------------------------------------------
           Form validation
           ------------------------------------------------ */
        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        document.querySelectorAll('form[data-validate]').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                var valid = true;
                var firstInvalid = null;

                form.querySelectorAll('[required]').forEach(function (field) {
                    if (!field.value.trim()) {
                        valid = false;
                        field.style.borderColor = '#D31F0D';
                        if (!firstInvalid) firstInvalid = field;
                    } else {
                        field.style.borderColor = '';
                    }
                });

                form.querySelectorAll('input[type="email"]').forEach(function (field) {
                    if (field.value && !emailPattern.test(field.value)) {
                        valid = false;
                        field.style.borderColor = '#D31F0D';
                        if (!firstInvalid) firstInvalid = field;
                    }
                });

                var msg = form.querySelector('.form-message');

                if (!valid) {
                    if (msg) {
                        msg.className = 'form-message error';
                        msg.textContent = 'Please complete the highlighted fields.';
                    }
                    if (firstInvalid) firstInvalid.focus();
                    return;
                }

                if (msg) {
                    msg.className = 'form-message success';
                    msg.textContent = 'Thank you! Your message has been sent successfully.';
                }
                form.reset();
                form.querySelectorAll('.file-name').forEach(function (el) {
                    el.textContent = 'No file chosen';
                });
            });
        });

        document.querySelectorAll('.form-control').forEach(function (field) {
            field.addEventListener('input', function () {
                field.style.borderColor = '';
            });
        });

        /* ------------------------------------------------
           File upload filename display
           ------------------------------------------------ */
        document.querySelectorAll('input[type="file"]').forEach(function (input) {
            input.addEventListener('change', function () {
                var wrap = input.closest('.file-upload');
                if (!wrap) return;
                var label = wrap.querySelector('.file-name');
                if (label) {
                    label.textContent = input.files && input.files[0]
                        ? input.files[0].name
                        : 'No file chosen';
                }
            });
        });

        /* ------------------------------------------------
           FAQ Accordion
           ------------------------------------------------ */
        document.querySelectorAll('.faq-question').forEach(function (btn) {
            btn.addEventListener('click', function () {
                var expanded = btn.getAttribute('aria-expanded') === 'true';
                var answer = btn.nextElementSibling;

                // Close all siblings in same .product-faq
                var parent = btn.closest('.product-faq');
                if (parent) {
                    parent.querySelectorAll('.faq-question').forEach(function (other) {
                        if (other !== btn) {
                            other.setAttribute('aria-expanded', 'false');
                            other.nextElementSibling.classList.remove('open');
                        }
                    });
                }

                // Toggle current
                btn.setAttribute('aria-expanded', expanded ? 'false' : 'true');
                answer.classList.toggle('open', !expanded);
            });
        });

        /* ------------------------------------------------
           Smooth anchor scrolling
           ------------------------------------------------ */
        document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
            anchor.addEventListener('click', function (e) {
                var id = anchor.getAttribute('href');
                if (!id || id === '#') return;

                var target = document.querySelector(id);
                if (!target) return;

                e.preventDefault();
                target.scrollIntoView({
                    behavior: reduceMotion ? 'auto' : 'smooth',
                    block: 'start'
                });
            });
        });

    });
})();
