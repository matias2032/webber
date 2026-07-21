// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect
    const navbar = document.querySelector('.navbar');
    
    if (navbar) {
        const onScroll = () => {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        };
        // run once and then on scroll
        onScroll();
        window.addEventListener('scroll', onScroll);
    }

    // Page transitions: fade in on load, fade out before navigation
    document.body.classList.add('page-fade-in');
    document.addEventListener('click', function (e) {
        const link = e.target.closest('a');
        if (!link) return;
        const href = link.getAttribute('href');
        const target = link.getAttribute('target');
        const download = link.hasAttribute('download');
        // Skip external, new tab, downloads, JS links, and in-page anchors
        const isHash = href && href.startsWith('#');
        const isJs = href && href.startsWith('javascript:');
        const isExternal = link.host && link.host !== window.location.host;
        if (isHash || isJs || isExternal || target === '_blank' || download) return;
        // Only intercept left-click without modifier keys
        if (e.defaultPrevented || e.button !== 0 || e.metaKey || e.ctrlKey || e.shiftKey || e.altKey) return;
        e.preventDefault();
        document.body.classList.add('page-fade-out');
        setTimeout(() => { window.location.href = link.href; }, 1500);
    }, true);

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 80,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = new bootstrap.Collapse(navbarCollapse, {toggle: false});
                    bsCollapse.hide();
                }
            }
        });
    });

    // Reveal-on-scroll animations (IntersectionObserver)
    const autoRevealSelectors = [
        '.feature-box', '.service-card', '.why-card', '.metric-card', '.card', '.service-pro', '.accent-card',
        '.page-header .container', 'section .container'
    ];
    // Mark common blocks if not already marked
    try {
        autoRevealSelectors.forEach(sel => {
            document.querySelectorAll(sel).forEach(el => {
                if (!el.classList.contains('reveal') && !el.classList.contains('animated')) {
                    el.classList.add('reveal');
                }
            });
        });
    } catch (_) {}

    const revealItems = document.querySelectorAll('.reveal, .animate-on-scroll');
    if ('IntersectionObserver' in window && revealItems.length) {
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animated');
                    obs.unobserve(entry.target);
                }
            });
        }, { root: null, rootMargin: '0px 0px -10% 0px', threshold: 0.15 });

        revealItems.forEach(el => observer.observe(el));
    } else {
        // Fallback: simple on-load reveal
        revealItems.forEach(el => el.classList.add('animated'));
    }

    // ==========================
    // Metrics: Count-up animation
    // ==========================
    (function initMetricCounters(){
        const counters = document.querySelectorAll('.metric-card .count');
        if (!counters.length) return;

        const animate = (el, target, duration=2000) => {
            const start = 0;
            const startTime = performance.now();
            const step = (now) => {
                const progress = Math.min((now - startTime) / duration, 1);
                const value = Math.floor(progress * (target - start) + start);
                el.textContent = value.toString();
                if (progress < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        };

        if ('IntersectionObserver' in window) {
            const once = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) return;
                    const card = entry.target;
                    card.querySelectorAll('.count').forEach(cnt => {
                        const target = parseInt(cnt.getAttribute('data-target')||'0', 10);
                        if (!cnt.dataset.done) {
                            animate(cnt, target);
                            cnt.dataset.done = '1';
                        }
                    });
                    once.unobserve(card);
                });
            }, { threshold: 0.35 });

            document.querySelectorAll('.metric-card').forEach(card => once.observe(card));
        } else {
            // Fallback: animate immediately
            counters.forEach(cnt => {
                const target = parseInt(cnt.getAttribute('data-target')||'0', 10);
                animate(cnt, target);
            });
        }
    })();

    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            
            form.classList.add('was-validated');
        }, false);
    });

    // Back to top button
    const backToTopButton = document.createElement('button');
    backToTopButton.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopButton.className = 'btn btn-primary btn-lg back-to-top';
    document.body.appendChild(backToTopButton);
    
    backToTopButton.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            backToTopButton.classList.add('show');
        } else {
            backToTopButton.classList.remove('show');
        }
    });

    // Initialize tooltips
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function(tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // Initialize popovers
    const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    popoverTriggerList.map(function(popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });

    // ==========================
    // Cookie Consent Logic
    // ==========================
    try {
        const banner = document.getElementById('cookie-consent');
        if (banner) {
            const acceptBtn = document.getElementById('cookie-accept');
            const declineBtn = document.getElementById('cookie-decline');
            const CONSENT_KEY = 'cookieConsent'; // values: 'accepted' | 'declined'

            const saved = localStorage.getItem(CONSENT_KEY);
            if (!saved) {
                banner.classList.remove('hidden');
            }

            const decide = (value) => {
                try { localStorage.setItem(CONSENT_KEY, value); } catch (e) {}
                banner.classList.add('hidden');
            };

            if (acceptBtn) acceptBtn.addEventListener('click', () => decide('accepted'));
            if (declineBtn) declineBtn.addEventListener('click', () => decide('declined'));
        }
    } catch (e) {
        console.warn('Cookie consent initialization failed', e);
    }
});

// Add Google Maps integration (example)
function initMap() {
    // This is a placeholder function for Google Maps integration
    // You'll need to get your own API key from Google Cloud Platform
    console.log('Map initialization function called');
    
    // Example coordinates (Sao Paulo, Brazil)
    const saoPaulo = { lat: -23.5505, lng: -46.6333 };
    
    // The map, centered at the specified location
    const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: saoPaulo,
        styles: [
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#444444"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#f2f2f2"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 45
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#46bcec"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            }
        ]
    });
    
    // The marker, positioned at the specified location
    const marker = new google.maps.Marker({
        position: saoPaulo,
        map: map,
        title: 'Nossa Localização',
        icon: 'assets/images/marker.png' // You can add a custom marker icon
    });
}
