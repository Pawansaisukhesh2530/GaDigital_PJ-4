/**
 * Nani Transformers - Main JavaScript
 * Vanilla JS, no dependencies.
 */
(function () {
    'use strict';

    var TABLET_BREAKPOINT = 1024;
    var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    var EMAIL_PATTERN = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

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
           Product tabs (Products page)
           WAI-ARIA tabs pattern: arrow-key navigation,
           aria-selected / tabindex / hidden panels.
           ------------------------------------------------ */
        var tabs = Array.prototype.slice.call(document.querySelectorAll('.product-tab-btn'));
        if (tabs.length) {
            var tablist = document.querySelector('.product-tablist');

            function selectTab(tab) {
                tabs.forEach(function (t) {
                    var selected = (t === tab);
                    t.setAttribute('aria-selected', selected ? 'true' : 'false');
                    t.tabIndex = selected ? 0 : -1;
                    var panel = document.getElementById(t.getAttribute('aria-controls'));
                    if (panel) panel.hidden = !selected;
                });
            }

            tabs.forEach(function (tab) {
                tab.addEventListener('click', function () { selectTab(tab); });
            });

            if (tablist) {
                tablist.addEventListener('keydown', function (e) {
                    var i = tabs.indexOf(document.activeElement);
                    if (i === -1) return;
                    var next = null;
                    if (e.key === 'ArrowRight') next = tabs[(i + 1) % tabs.length];
                    if (e.key === 'ArrowLeft') next = tabs[(i - 1 + tabs.length) % tabs.length];
                    if (next) {
                        e.preventDefault();
                        selectTab(next);
                        next.focus();
                    }
                });
            }
        }

        /* ------------------------------------------------
           Careers job accordion (single-open)
           ------------------------------------------------ */
        document.querySelectorAll('.job-accordion .job-item').forEach(function (item) {
            item.addEventListener('toggle', function () {
                if (item.open) {
                    document.querySelectorAll('.job-accordion .job-item').forEach(function (other) {
                        if (other !== item) other.open = false;
                    });
                }
            });
        });

        /* ------------------------------------------------
           Form validation + AJAX submission
           ------------------------------------------------ */
        function setFieldError(field, isError) {
            if (!field) return;
            field.style.borderColor = isError ? '#D31F0D' : '';
        }

        function showFormMessage(msg, type, text) {
            if (!msg) return;
            msg.className = 'form-message ' + type;
            msg.textContent = text;
            msg.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'nearest' });
        }

        function validateForm(form) {
            var valid = true;
            var firstInvalid = null;

            form.querySelectorAll('.form-control').forEach(function (field) {
                if (field.hasAttribute('required') && !field.value.trim()) {
                    valid = false;
                    setFieldError(field, true);
                    if (!firstInvalid) firstInvalid = field;
                } else {
                    setFieldError(field, false);
                }
            });

            form.querySelectorAll('input[type="email"]').forEach(function (field) {
                if (field.value && !EMAIL_PATTERN.test(field.value)) {
                    valid = false;
                    setFieldError(field, true);
                    if (!firstInvalid) firstInvalid = field;
                }
            });

            // Phone (optional on some forms, required on others via "required")
            form.querySelectorAll('input[type="tel"]').forEach(function (field) {
                var value = field.value.trim();
                if (value && !/^[0-9+\-\s()]{6,20}$/.test(value)) {
                    valid = false;
                    setFieldError(field, true);
                    if (!firstInvalid) firstInvalid = field;
                }
            });

            // Resume: extension + size client-side check
            form.querySelectorAll('input[type="file"]').forEach(function (field) {
                var file = field.files && field.files[0];
                if (file) {
                    var okExt = /\.(pdf|doc|docx)$/i.test(file.name);
                    if (!okExt || file.size > 5 * 1024 * 1024) {
                        valid = false;
                        setFieldError(field, true);
                        if (!firstInvalid) firstInvalid = field;
                    }
                }
            });

            if (firstInvalid) firstInvalid.focus();
            return valid;
        }

        function applyServerErrors(form, errors) {
            form.querySelectorAll('.form-control').forEach(function (field) {
                setFieldError(field, false);
            });
            Object.keys(errors || {}).forEach(function (name) {
                var field = form.querySelector('[name="' + name + '"]');
                setFieldError(field, true);
            });
        }

        document.querySelectorAll('form[data-validate]').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                // Prevent duplicate submissions
                if (form.getAttribute('data-submitting') === '1') return;
                if (!validateForm(form)) {
                    showFormMessage(form.querySelector('.form-message'), 'error', 'Please complete the highlighted fields.');
                    return;
                }

                form.setAttribute('data-submitting', '1');
                var btn = form.querySelector('[type="submit"]');
                if (btn) btn.disabled = true;

                var fd = new FormData(form);
                var msg = form.querySelector('.form-message');

                fetch(form.action, {
                    method: 'POST',
                    body: fd,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                }).then(function (res) {
                    return res.text().then(function (text) {
                        var data = null;
                        try { data = JSON.parse(text); } catch (e) {}
                        if (!data) {
                            var start = text.indexOf('{');
                            var end = text.lastIndexOf('}');
                            if (start >= 0 && end > start) {
                                try { data = JSON.parse(text.slice(start, end + 1)); } catch (e2) {}
                            }
                        }
                        return { status: res.status, data: data };
                    });
                }).then(function (r) {
                    var data = r.data;
                    if (data && data.ok) {
                        showFormMessage(msg, 'success', data.message || 'Thank you! Your submission has been received.');
                        form.reset();
                        form.querySelectorAll('.file-name').forEach(function (el) {
                            el.textContent = 'No file chosen';
                        });
                    } else if (data && data.errors) {
                        applyServerErrors(form, data.errors);
                        showFormMessage(msg, 'error', data.message || 'Please correct the highlighted fields.');
                    } else if (data && data.message) {
                        showFormMessage(msg, 'error', data.message || 'Something went wrong. Please try again.');
                    } else {
                        showFormMessage(msg, 'error', 'Something went wrong. Please try again.');
                    }
                }).catch(function () {
                    showFormMessage(msg, 'error', 'Network error. Please check your connection and try again.');
                }).finally(function () {
                    form.setAttribute('data-submitting', '');
                    if (btn) btn.disabled = false;
                });
            });
        });

        // Clear error highlight as the user types
        document.querySelectorAll('.form-control').forEach(function (field) {
            field.addEventListener('input', function () {
                setFieldError(field, false);
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
