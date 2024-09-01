
document.addEventListener('DOMContentLoaded', function() {
    gsap.registerPlugin(ScrollTrigger);

    // Worksセクションのアニメーション
    const contentEl = document.querySelector('.works__content');
    const listEl = document.querySelector('.works__list');
    
    if (contentEl && listEl) {
        let xValue;
        let shouldAnimate = true;

        if (window.innerWidth >= 1440) {
            xValue = () => -(listEl.scrollWidth - contentEl.clientWidth);
        } else if (window.innerWidth < 1440 && window.innerWidth >= 768) {
            xValue = () => -(listEl.scrollWidth * 1.2 - contentEl.clientWidth);
        } else {
            shouldAnimate = false;
        }

        if (shouldAnimate) {
            gsap.to(listEl, {
                x: xValue,
                ease: 'sine.inOut',
                scrollTrigger: {
                    trigger: '.works',
                    start: 'center center',
                    end: () => `+=${listEl.scrollWidth - contentEl.clientWidth + 700}`,
                    scrub: true,
                    pin: true,
                    anticipatePin: 1,
                    invalidateOnRefresh: true,
                },
            });
        }
    }

    // 画像のフェードインアニメーション
    const items = document.querySelectorAll('.top__item');
    let loadedImagesCount = 0;
    const totalImages = items.length;

    items.forEach(item => {
        const img = item.querySelector('img');
        img.onload = handleImageLoad;
        img.onerror = handleImageLoad; // エラー処理も追加

        // キャッシュされた画像をサポートするために
        if (img.complete) {
            img.onload();
        }
    });

    function handleImageLoad() {
        loadedImagesCount++;
        if (loadedImagesCount === totalImages) {
            startFadeInAnimation();
        }
    }

    function startFadeInAnimation() {
        gsap.set(items, { autoAlpha: 0 });

        items.forEach(item => {
            gsap.to(item, {
                autoAlpha: 1,
                duration: 2.0,
                delay: Math.random() * 2.5 // ランダムなディレイ
            });
        });
    }

    // FadeInUpアニメーション
    document.querySelectorAll('.js-fadeInUp').forEach(fadeInUp => {
        gsap.to(fadeInUp, {
          duration: 1.5,
          opacity: 1,
          y: 0,
          ease: "power2.out",
          scrollTrigger: {
            trigger: fadeInUp,
            start: "top 80%", 
            toggleActions: "play none none none",
          }
        });
    });

    // Worksセクションのアイテムごとのアニメーション
    gsap.utils.toArray('.works__item').forEach((item, index) => {
        gsap.timeline({
            scrollTrigger: {
                trigger: item,
                start: "top 70%", 
                toggleActions: "play none none reverse", 
            }
        })
        .to(item.querySelector('.works__img img'), { 
            opacity: 1, 
            y: 0, 
            duration: 0.8, 
            delay: index * 0.8, 
            ease: "power1.inOut" 
        });
    });

    gsap.utils.toArray('.archive-works__item').forEach((item) => {
        gsap.timeline({
            scrollTrigger: {
                trigger: item,
                start: "top 80%", 
                toggleActions: "play none none reverse", 
            }
        })
        .to(item.querySelector('.archive-works__img img'), { 
            opacity: 1, 
            y: 0, 
            duration: 1, 
            ease: "power1.inOut", 
        });
    });

    // スライダー機能
    const slides = document.querySelectorAll('.slider__img');
    const navDots = document.querySelectorAll('.slider__nav-dot');
    let currentIndex = 0;
    const totalSlides = slides.length;
    let interval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            gsap.to(slide, { 
                opacity: i === index ? 1 : 0, 
                duration: 1, 
                ease: 'power1.inOut' 
            });
            slide.classList.toggle('active', i === index);
        });

        navDots.forEach((dot, i) => {
            gsap.to(dot, {
                opacity: i === index ? 1 : 0.5,
                backgroundColor: i === index ? '#4ea1d5' : '#fff',
                scale: i === index ? 1.2 : 1,
                duration: 1,
                ease: 'power1.inOut'
            });
        });
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % totalSlides;
        showSlide(currentIndex);
    }

    function startSlider() {
        interval = setInterval(nextSlide, 3000);
    }

    function stopSlider() {
        clearInterval(interval);
    }

    function resumeSlider() {
        startSlider();
    }

    showSlide(currentIndex);
    startSlider();

    navDots.forEach(dot => {
        dot.addEventListener('click', () => {
            stopSlider();
            const index = parseInt(dot.getAttribute('data-index'));
            currentIndex = index;
            showSlide(currentIndex);
            setTimeout(resumeSlider, 2000);
        });
    });

    // マウスストーカー
    function createMouseStalker(button, colorClass) {
        const stalker = document.createElement('div');
        stalker.className = `mouse-stalker ${colorClass}`;
        button.appendChild(stalker);

        button.addEventListener('mousemove', (e) => {
            const rect = button.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            gsap.to(stalker, {
                x: x,
                y: y,
                opacity: 0.5,
                duration: 0.3,
                ease: "power1.out"
            });
        });

        button.addEventListener('mouseleave', () => {
            gsap.to(stalker, {
                opacity: 0,
                duration: 0.3
            });
        });
    }

    document.querySelectorAll('.button__white').forEach(button => {
        createMouseStalker(button, 'mouse-stalker-white');
    });

    document.querySelectorAll('.button__blue').forEach(button => {
        createMouseStalker(button, 'mouse-stalker-blue');
    });

    // サイドバーリンクの設定
    const sidebarLinks = document.querySelectorAll('.toc_widget a');
    const contentLinks = document.querySelectorAll('#toc_container a');

    sidebarLinks.forEach((sidebarLink, index) => {
        const correspondingContentLink = contentLinks[index];
        if (correspondingContentLink) {
            const contentHref = correspondingContentLink.getAttribute('href');
            sidebarLink.setAttribute('href', contentHref);
        }
    });

    // ヘッダーの背景変更
    const header = document.getElementById("header");

    window.addEventListener("scroll", function () {
        const backgroundColor = window.scrollY > 80 ? "rgba(255, 255, 255, 0.9)" : "rgba(255, 255, 255, 0)";
        gsap.to(header, {
            backgroundColor: backgroundColor,
            duration: 0.3,
            ease: "power1.out"
        });
    });
});



const toTop = document.querySelector('.to-top');
const windowHeight = window.outerHeight
window.addEventListener('scroll', function () {
  if (window.scrollY > 700) {
    toTop.classList.add('js-fadeIn')
  } else {
    toTop.classList.remove('js-fadeIn')
  }
});

toTop.addEventListener('click', (e) => {
  e.preventDefault();
  window.scrollTo({
    top: 0,
    behavior: 'smooth',
  });
});