

document.addEventListener('DOMContentLoaded', function() {
    const contentEl = document.querySelector('.works__content');
    const listEl = document.querySelector('.works__list');
    const worksSection = document.querySelector('.works');

    gsap.registerPlugin(ScrollTrigger);
    
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


    const items = document.querySelectorAll('.top__item');
    
    // 画像がすべて読み込まれるのを待つ
    let loadedImagesCount = 0;
    const totalImages = items.length;

    items.forEach(item => {
        const img = item.querySelector('img');
        img.onload = () => {
            loadedImagesCount++;
            if (loadedImagesCount === totalImages) {
                startFadeInAnimation();
            }
        };

        // キャッシュされた画像をサポートするために、以下のようにしています
        if (img.complete) {
            img.onload();
        }
    });

    function startFadeInAnimation() {
        // 画像を一旦透明にしておく
        gsap.set(items, { autoAlpha: 0 });

        // 画像をランダムな順番でフェードイン
        items.forEach(item => {
            gsap.to(item, {
                autoAlpha: 1,
                duration: 1.5,
                delay: Math.random() * 2 // ランダムなディレイ
            });
        });
    }

    document.querySelectorAll('.js-fadeInUp').forEach(fadeInUp => {
        gsap.to(fadeInUp, {
          duration: 1.5,
          opacity: 1,
          y: 0,
          ease: "power2.out",
          scrollTrigger: {
            trigger: fadeInUp,
            start: "top 80%", // 各テキスト要素が画面の中央に来たら発火
            toggleActions: "play none none none",
          }
        });
      });


    gsap.utils.toArray('.works__item').forEach((item, index) => {
    gsap.timeline({
        scrollTrigger: {
        trigger: item,
        start: "top 70%", // Trigger the animation when the top of the item reaches the center of the viewport
        toggleActions: "play none none reverse", // Play animation when entering, and reverse when leaving
        }
    })
    .to(item.querySelector('.works__img img'), { 
        opacity: 1, 
        y: 0, 
        duration: 0.8, 
        delay: index * 0.8, // 各アイテムに対する遅延
        ease: "power1.inOut" // イージングを指定
    });
    });

    gsap.utils.toArray('.archive-works__item').forEach((item) => {
    gsap.timeline({
        scrollTrigger: {
        trigger: item,
        start: "top 80%", // Trigger the animation when the top of the item reaches the center of the viewport
        toggleActions: "play none none reverse", // Play animation when entering, and reverse when leaving
        }
    })
    .to(item.querySelector('.archive-works__img img'), { 
        opacity: 1, 
        y: 0, 
        duration: 1, 
        ease: "power1.inOut", // イージングを指定
    });
    });

});



document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slider__img');
    const navDots = document.querySelectorAll('.slider__nav-dot');
    let currentIndex = 0;
    const totalSlides = slides.length;
    let interval;
    let isAnimating = false;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                gsap.to(slide, { opacity: 1, duration: 1, ease: 'power1.inOut' });
                slide.classList.add('active');
            } else {
                gsap.to(slide, { opacity: 0, duration: 1, ease: 'power1.inOut' });
                slide.classList.remove('active');
            }
        });

        navDots.forEach((dot, i) => {
            if (i === index) {
                gsap.to(dot, {
                    opacity: 1,
                    backgroundColor: '#0068b7', // アクティブな色
                    scale: 1.2, // 少し大きくする
                    duration: 1,
                    ease: 'power1.inOut'
                });
            } else {
                gsap.to(dot, {
                    opacity: 0.5,
                    backgroundColor: '#fff', // デフォルトの色
                    scale: 1,
                    duration: 1,
                    ease: 'power1.inOut'
                });
            }
        });
    }

    function nextSlide() {
        if (!isAnimating) {
            currentIndex = (currentIndex + 1) % totalSlides;
            showSlide(currentIndex);
        }
    }

    function startSlider() {
        interval = setInterval(nextSlide, 3000); // スライドを3秒ごとに切り替え
    }

    function stopSlider() {
        clearInterval(interval); // スライダーの自動切り替えを停止
    }

    function resumeSlider() {
        startSlider(); // 自動切り替えを再開
    }

    // 初期スライドとナビゲーションを表示
    showSlide(currentIndex);
    startSlider(); // スライダーの自動切り替えを開始

    // ナビゲーションボタンのクリックイベント
    navDots.forEach(dot => {
        dot.addEventListener('click', () => {
            stopSlider(); // スライダーの自動切り替えを停止

            const index = parseInt(dot.getAttribute('data-index'));
            currentIndex = index;
            showSlide(currentIndex);

            // クリック後に2秒間の停止を行い、その後にスライダーの自動切り替えを再開
            setTimeout(() => {
                resumeSlider(); // 自動切り替えを再開
            }, 2000); // 2秒間の停止
        });
    });

});


// 共通の関数を作成
function createMouseStalker(button, colorClass) {
    const stalker = document.createElement('div');
    stalker.className = `mouse-stalker ${colorClass}`;
    button.appendChild(stalker);
  
    button.addEventListener('mousemove', (e) => {
      const rect = button.getBoundingClientRect();
      const x = e.clientX - rect.left - 10;
      const y = e.clientY - rect.top - 25;
  
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
  
  // 白色マウスストーカーを作成するボタン
  document.querySelectorAll('.button__white').forEach(button => {
    createMouseStalker(button, 'mouse-stalker-white');
  });
  
  // 青色マウスストーカーを作成するボタン
  document.querySelectorAll('.button__blue').forEach(button => {
    createMouseStalker(button, 'mouse-stalker-blue');
  });
  
  