import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const revealElements = document.querySelectorAll('[data-reveal]');
const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Marquee logo merek: cukup grup untuk layar selebar apa pun, lalu hover
// hanya memperlambat putaran (bukan berhenti).
const brandMarquee = document.querySelector('.brand-marquee');

if (brandMarquee && !prefersReducedMotion) {
    const track = brandMarquee.querySelector('.brand-marquee-track');
    const baseGroup = track?.children[0];

    if (track && baseGroup) {
        const PIXELS_PER_SECOND = 22;
        let resizeFrame = 0;

        const fitMarquee = () => {
            const groupWidth = baseGroup.getBoundingClientRect().width;

            if (!groupWidth) {
                return;
            }

            // Satu putaran menggeser tepat selebar satu grup, jadi sambungannya
            // selalu mulus. Tambah grup hanya bila lebar layar melebihi sisa rel.
            const neededGroups = Math.ceil(brandMarquee.clientWidth / groupWidth) + 1;

            while (track.children.length < neededGroups) {
                const clone = baseGroup.cloneNode(true);
                clone.setAttribute('aria-hidden', 'true');
                track.appendChild(clone);
            }

            track.style.setProperty('--marquee-shift', `-${groupWidth}px`);
            track.style.animationDuration = `${(groupWidth / PIXELS_PER_SECOND).toFixed(2)}s`;
        };

        fitMarquee();

        window.addEventListener('resize', () => {
            cancelAnimationFrame(resizeFrame);
            resizeFrame = requestAnimationFrame(fitMarquee);
        });

        const animation = typeof track.getAnimations === 'function' ? track.getAnimations()[0] : null;

        if (animation) {
            const IDLE_RATE = 1;
            const HOVER_RATE = 0.3;
            let targetRate = IDLE_RATE;
            let currentRate = IDLE_RATE;
            let frame = 0;

            const easeRate = () => {
                currentRate += (targetRate - currentRate) * 0.12;

                if (Math.abs(targetRate - currentRate) < 0.003) {
                    currentRate = targetRate;
                    frame = 0;
                }

                animation.playbackRate = currentRate;

                if (frame) {
                    frame = requestAnimationFrame(easeRate);
                }
            };

            const setRate = (rate) => {
                targetRate = rate;

                if (!frame) {
                    frame = requestAnimationFrame(easeRate);
                }
            };

            if (window.matchMedia('(hover: hover) and (pointer: fine)').matches) {
                brandMarquee.addEventListener('pointerenter', () => setRate(HOVER_RATE));
                brandMarquee.addEventListener('pointerleave', () => setRate(IDLE_RATE));
            }

            brandMarquee.addEventListener('focusin', () => setRate(HOVER_RATE));
            brandMarquee.addEventListener('focusout', () => setRate(IDLE_RATE));
        }
    }
}

if (!prefersReducedMotion) {
    document.documentElement.classList.add('intro-ready');
}

if (revealElements.length && !prefersReducedMotion && 'IntersectionObserver' in window) {
    document.documentElement.classList.add('motion-ready');

    const revealObserver = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                entry.target.classList.toggle('is-visible', entry.isIntersecting);
            });
        },
        { threshold: 0.08, rootMargin: '0px 0px -8% 0px' },
    );

    revealElements.forEach((element) => revealObserver.observe(element));
}
