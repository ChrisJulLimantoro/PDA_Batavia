
document.addEventListener('DOMContentLoaded', function() {
    gsap.registerPlugin(ScrollTrigger);

    const tooltip = document.getElementById('map-tooltip');
    const mapContainer = document.querySelector('.map-container');

    const tooltipRegions = [
        'Aceh',
        'Papua',
        'Jawa Timur',
        'Jawa Tengah',
        'Jawa Barat',
        'Bali',
        'Maluku',
        'Kalimantan Selatan',
        'Kalimantan Tengah',
        'Kalimantan Utara',
        'Kalimantan Timur',
        'Kalimantan Barat',
        'Sulawesi Utara',
        'Sulawesi Tengah',
        'Sulawesi Tenggara',
        'Sulawesi Selatan',
        'Sulawesi Barat',
        'Sumatera Utara',
        'Sumatera Barat',
        'Sumatera Selatan',
        'Nusa Tenggara Barat',
        'Nusa Tenggara Timur',
    ];
    
    function handleSVGLoad() {
        const svg = document.querySelector('object[data*="indonesia.svg"]');
        if (!svg) return;
        
        svg.addEventListener('load', function() {
            const svgDoc = svg.contentDocument;
            const paths = svgDoc.querySelectorAll('path');
            
            paths.forEach(path => {
                const regionName = path.getAttribute('title');
                
                if (tooltipRegions.includes(regionName)) {
                    path.classList.add('region');
                    
                    path.addEventListener('mouseenter', function(e) {
                        tooltip.textContent = regionName;
                        const rect = mapContainer.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        tooltip.style.left = `${x + 200}px`;
                        tooltip.style.top = `${y + 300}px`;
                        tooltip.classList.add('show');
                        path.classList.add('active');
                    });

                    path.addEventListener('mousemove', function(e) {
                        const rect = mapContainer.getBoundingClientRect();
                        const x = e.clientX - rect.left;
                        const y = e.clientY - rect.top;
                        tooltip.style.left = `${x + 200}px`;
                        tooltip.style.top = `${y + 300}px`;
                    });
                    
                    path.addEventListener('mouseleave', function() {
                        tooltip.classList.remove('show');
                        path.classList.remove('active');
                    });
                }
            });
        });
    }
    
    handleSVGLoad();
    
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.addedNodes.length) {
                handleSVGLoad();
            }
        });
    });
    
    observer.observe(document.body, {
        childList: true,
        subtree: true
    });
    
    
    
    gsap.from(".region-path", {
        scrollTrigger: {
            trigger: "#indonesia-map",
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 0,
        scale: 0.9,
        duration: 1,
        stagger: 0.1,
        ease: "power2.out"
    });

    gsap.to('.hero-title', {
        y: 0,
        opacity: 1,
        duration: 1.2,
        ease: "power3.out"
    });
    
    gsap.to('.hero-subtitle', {
        y: 0,
        opacity: 1,
        duration: 1.2,
        delay: 0.3,
        ease: "power3.out"
    });
    
    gsap.to('.hero-form', {
        y: 0,
        opacity: 1,
        duration: 1.2,
        delay: 0.6,
        ease: "power3.out"
    });
    
    gsap.from('.category-grid a', {
        y: 50,
        opacity: 0,
        duration: 0.8,
        stagger: 0.1,
        delay: 0.5,
        ease: "back.out(1.7)"
    });
        gsap.to('.map-container', {
        scrollTrigger: {
            trigger: '.map-container',
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 1,
        y: 0,
        duration: 1,
        ease: "power2.out"
    });
    
    gsap.to('.banner-image', {
        scrollTrigger: {
            trigger: '.banner-container',
            scrub: true
        },
        yPercent: 10,
        scale: 1.05,
        ease: "none"
    });
    
    gsap.to('.section-title', {
        scrollTrigger: {
            trigger: '.section-title',
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "power2.out"
    });
    

    
    gsap.from('.heritage-card', {
        scrollTrigger: {
            trigger: '.heritage-section',
            start: "top 80%",
            toggleActions: "play none none none"
        },
        x: (index) => index === 0 ? -50 : 50,
        opacity: 0,
        duration: 1,
        stagger: 0.2,
        ease: "power3.out"
    });
    
    gsap.to('.partners-section', {
        scrollTrigger: {
            trigger: '.partners-section',
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 1,
        duration: 1,
        ease: "power2.out"
    });
    
    const partners = gsap.to('.partners-section img', {
        xPercent: -100,
        repeat: -1,
        duration: 20,
        ease: "linear"
    });
    gsap.utils.toArray('[class*="section-"]').forEach(section => {
        gsap.from(section, {
            scrollTrigger: {
                trigger: section,
                start: "top 80%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            y: 40,
            duration: 1,
            ease: "power3.out"
        });
    });
    
    gsap.utils.toArray('.product-card').forEach((card, i) => {
        gsap.from(card, {
            scrollTrigger: {
                trigger: card,
                start: "top 80%",
                toggleActions: "play none none none"
            },
            opacity: 0,
            y: 30,
            duration: 0.8,
            delay: i * 0.1,
            ease: "power3.out"
        });
    });
    

    tailwind.config = {
        theme: {
            extend: {
                animation: {
                    'loop-scroll': 'loop-scroll 50s linear infinite',
                },
                keyframes: {
                    'loop-scroll': {
                        from: { transform: 'translateX(0)' },
                        to: { transform: 'translateX(-50%)' },
                    },
                },
            },
        },
    };



        gsap.from('.showcase-container > div', {
            scrollTrigger: {
                trigger: '.showcase-container',
                start: "top 70%",
                toggleActions: "play none none none"
            },
            y: 50,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2,
            ease: "power2.out"
        });

        gsap.to('.bg-amber-100', {
            scrollTrigger: {
                trigger: '.showcase-container',
                scrub: true
            },
            x: -20,
            y: -20,
            duration: 1
        });

        gsap.to('.bg-amber-200', {
            scrollTrigger: {
                trigger: '.showcase-container',
                scrub: true
            },
            x: 20,
            y: 20,
            duration: 1
        });

    }); 

