

document.addEventListener('DOMContentLoaded', function() {
    const contentEl = document.querySelector('.works__content');
    const listEl = document.querySelector('.works__list');
    const worksSection = document.querySelector('.works');

    if (contentEl && listEl) {
        gsap.registerPlugin(ScrollTrigger);

        gsap.to(listEl, {
            x: () => -(listEl.scrollWidth - contentEl.clientWidth),
            ease: 'sine.inOut',
            scrollTrigger: {
                trigger: '.works',
                start: 'center center',
                end: () => `+=${listEl.scrollWidth - contentEl.clientWidth}`,
                scrub: true,
                pin: true,
                anticipatePin: 1,
                invalidateOnRefresh: true,
            },
        });
    }
});
