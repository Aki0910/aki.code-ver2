

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


    function vw(v) {
        const maxWidth = 1600;
        const width = Math.min(window.innerWidth, maxWidth);
        return (v / 100) * width;
    }

    window.addEventListener('load', function() {
        const animations = [
            { x: vw(-100 / 1440 * 100), y: vw(-50 / 1440 * 100), xDuration: .7, yDuration: .7 },  // 1番目の画像
            { x: vw(-100 / 1440 * 100), y: vw(270 / 1440 * 100), xDuration: .7, yDuration: .7 },  // 2番目の画像
            { x: vw(120 / 1440 * 100), y: vw(390 / 1440 * 100), xDuration: .7, yDuration: .7 },   // 3番目の画像
            { x: vw(230 / 1440 * 100), y: vw(60 / 1440 * 100), xDuration: .7, yDuration: .7 }, // 4番目の画像
            { x: vw(120 / 1440 * 100), y: vw(-160 / 1440 * 100), xDuration: .7, yDuration: .7 },  // 5番目の画像
        ];

        const items = document.querySelectorAll('.top__item');

        // 各要素に対してアニメーションを設定
        items.forEach((item, index) => {
            // 新しいタイムラインを作成
            const tl = gsap.timeline({
                onComplete: function() {
                    // アニメーションが終了してから0.5秒後にfilterを変更
                    gsap.delayedCall(0.7, function() {
                        gsap.to(item, { 
                            filter: 'grayscale(0%)', 
                            duration: 1.5 // 1.5秒かけてgrayscaleを0%にする
                        });
                    });
                }
            });
            // x軸とy軸の移動を別々に設定
            tl.fromTo(item, 
                { 
                    x: 0, 
                    y: 0 
                }, 
                { 
                    x: animations[index].x, 
                    duration: animations[index].xDuration, 
                    ease: "power2.out" 
                }
            )
            .to(item, 
                { 
                    y: animations[index].y, 
                    duration: animations[index].yDuration, 
                    ease: "power2.out" 
                }
            );
        });

        // パララックス
        // items.forEach((item, index) => {
        //     const startY = animations[index].y;
        //     const endY = startY + vw(100 / 1440 * 100);
    
        //     gsap.fromTo(item,
        //         { y: startY }, 
        //         {
        //             y: endY, 
        //             ease: "none",
        //             scrollTrigger: {
        //                 trigger: item,
        //                 start: "top bottom", 
        //                 end: "bottom top", 
        //                 scrub: true, 
        //                 markers: false 
        //             }
        //         }
        //     );
        // });
    });
});





const stalker = document.getElementById('stalker');

//マウスに追従させる処理
document.addEventListener('mousemove', function (e) {
    stalker.style.transform = 'translate(' + e.clientX + 'px, ' + e.clientY + 'px)';
});

//リンクホバー時の処理
const linkElement = document.querySelectorAll('a:not(.inactive)');
for (let i = 0; i < linkElement.length; i++) {
    //マウスホバー時
    linkElement[i].addEventListener('mouseover', function (e) {
        //マウスストーカーにクラスをつける
        stalker.classList.add('mouseover');
    });
    
    //マウスホバー解除時
    linkElement[i].addEventListener('mouseout', function (e) {
        stalker.classList.remove('mouseover');
    });
}
