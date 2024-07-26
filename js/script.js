

document.addEventListener('DOMContentLoaded', function() {
    const contentEl = document.querySelector('.works__content');
    const listEl = document.querySelector('.works__list');
    const worksSection = document.querySelector('.works');

    if (contentEl && listEl) {
        gsap.registerPlugin(ScrollTrigger);

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