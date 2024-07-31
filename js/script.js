

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



    window.addEventListener('load', function() {

    // 各画像の移動先位置を指定
    const targetPositions = [
        { top: '30%', left: '60%' }, // 1番目の画像
        { top: '70%', left: '60%' }, // 2番目の画像
        { top: '85%', left: '77%' }, // 3番目の画像
        { top: '43%', left: '85%' }, // 4番目の画像
        { top: '15%', left: '76%' },  // 5番目の画像
        { top: '56%', left: '63%' }  // 5番目の画像
    ];

    // アニメーションを設定する要素を選択
    const items = document.querySelectorAll('.top__item');



    // GSAPタイムライン
    items.forEach((item, index) => {
        // 新しいタイムラインを作成
        const tl = gsap.timeline({
            delay: 0.5 // ページ読み込み後の待機時間
        });

        // topとleftの移動を設定
        tl.to(item, {
            top: targetPositions[index].top,
            left: targetPositions[index].left,
            duration: 1.0, // アニメーションの持続時間
            ease: "power2.out"
        })
        .call(() => {
            // アニメーション終了後0.5秒後にgrayscaleを解除
            gsap.delayedCall(0.5, () => {
                item.style.filter = 'grayscale(0%)';
            });
        });
    });

    // スクロールに合わせてパララックスを適用
    window.addEventListener('scroll', function() {
        const scrollY = window.scrollY;
        items.forEach(item => {
            const speed = 0.2; // パララックスの速度
            const offset = scrollY * speed;
            item.style.transform = `translate(-50%, calc(-50% + ${offset}px)) rotate(45deg)`;
        });
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
