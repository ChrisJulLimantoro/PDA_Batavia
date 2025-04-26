document.addEventListener('DOMContentLoaded', function() {
    gsap.registerPlugin(ScrollTrigger);
    
    const tl = gsap.timeline();
    
    tl.to("#breadcrumb-anim", {
        opacity: 1,
        y: 0,
        duration: 0.6,
        ease: "power2.out"
    });
    
    tl.to("#gallery-anim", {
        opacity: 1,
        duration: 0.8,
        ease: "power2.out"
    }, "-=0.2");
    
    tl.to("#info-anim", {
        x: 0,
        opacity: 1,
        duration: 0.8,
        ease: "power2.out"
    }, "-=0.4");
    
    tl.to("#tabs-anim", {
        scrollTrigger: {
            trigger: "#tabs-anim",
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "power2.out"
    });
    
    tl.to("#related-anim", {
        scrollTrigger: {
            trigger: "#related-anim",
            start: "top 80%",
            toggleActions: "play none none none"
        },
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: "power2.out"
    });
    
    const mainImage = document.getElementById('main-product-image');
    if (mainImage) {
        mainImage.addEventListener('mousemove', (e) => {
            const { left, top, width, height } = mainImage.getBoundingClientRect();
            const x = (e.clientX - left) / width * 100;
            const y = (e.clientY - top) / height * 100;
            mainImage.style.transformOrigin = `${x}% ${y}%`;
        });
        
        mainImage.addEventListener('mouseenter', () => {
            gsap.to(mainImage, {
                scale: 1.05,
                duration: 0.5,
                ease: "power2.out"
            });
        });
        
        mainImage.addEventListener('mouseleave', () => {
            gsap.to(mainImage, {
                scale: 1,
                duration: 0.5,
                ease: "power2.out"
            });
        });
    }
});

function changeMainImage(src) {
    const mainImg = document.getElementById('main-product-image');
    if (mainImg) {
        gsap.to(mainImg, {
            opacity: 0,
            duration: 0.3,
            onComplete: () => {
                mainImg.src = src;
                gsap.to(mainImg, {
                    opacity: 1,
                    duration: 0.3
                });
            }
        });
        
        document.querySelectorAll('.image-gallery-thumbnail').forEach(thumb => {
            thumb.classList.remove('active');
        });
        event.currentTarget.classList.add('active');
    }
}