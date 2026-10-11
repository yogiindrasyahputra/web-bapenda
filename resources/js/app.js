import './bootstrap';
import { animate, stagger } from 'animejs';

const initializeAnimeAnimations = () => {
	if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

	const heroCopy = document.querySelector('.hero-copy');
	if (heroCopy) {
		animate(heroCopy, {
			opacity: [0, 1],
			translateY: [28, 0],
			duration: 900,
			ease: 'outExpo',
		});
	}

	const revealTargets = document.querySelectorAll('.news-card, .service-card, .quick-link');
	if (!revealTargets.length) return;

	const reveal = (targets) => {
		animate(targets, {
			opacity: [0, 1],
			translateY: [24, 0],
			delay: stagger(90),
			duration: 700,
			ease: 'outExpo',
		});
	};

	if (!('IntersectionObserver' in window)) {
		reveal(revealTargets);
		return;
	}

	const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) => {
			if (!entry.isIntersecting) return;
			observer.unobserve(entry.target);
			reveal(entry.target);
		});
	}, { threshold: 0.16 });

	revealTargets.forEach((target) => observer.observe(target));
};

document.addEventListener('DOMContentLoaded', () => {
	initializeAnimeAnimations();

	const navigationLinks = [...document.querySelectorAll('.nav-link')];
	const sections = navigationLinks
		.map((link) => document.querySelector(link.getAttribute('href')))
		.filter(Boolean);

	const setActiveLink = (sectionId) => {
		navigationLinks.forEach((link) => {
			link.classList.toggle('active', link.getAttribute('href') === `#${sectionId}`);
		});
	};

	navigationLinks.forEach((link) => {
		link.addEventListener('click', () => setActiveLink(link.getAttribute('href').slice(1)));
	});

	if ('IntersectionObserver' in window) {
		const sectionObserver = new IntersectionObserver((entries) => {
			const visibleSection = entries
				.filter((entry) => entry.isIntersecting)
				.sort((first, second) => second.intersectionRatio - first.intersectionRatio)[0];

			if (visibleSection) setActiveLink(visibleSection.target.id);
		}, { rootMargin: '-20% 0px -65% 0px', threshold: [0, .25, .5] });

		sections.forEach((section) => sectionObserver.observe(section));
	}

	const periodButton = document.querySelector('.period-button');
	if (periodButton) {
		const periods = ['Januari 2024', 'Desember 2023', 'November 2023'];
		let periodIndex = 0;

		periodButton.addEventListener('click', () => {
			periodIndex = (periodIndex + 1) % periods.length;
			periodButton.firstChild.textContent = `${periods[periodIndex]} `;
		});
		periodButton.setAttribute('aria-label', 'Ganti periode laporan');
	}

	const notification = document.querySelector('.notification');
	if (notification) {
		notification.setAttribute('role', 'button');
		notification.setAttribute('tabindex', '0');

		const clearNotifications = () => {
			const badge = notification.querySelector('i');
			if (badge) badge.hidden = true;
			notification.setAttribute('aria-label', 'Tidak ada notifikasi baru');
		};

		notification.addEventListener('click', clearNotifications);
		notification.addEventListener('keydown', (event) => {
			if (event.key === 'Enter' || event.key === ' ') {
				event.preventDefault();
				clearNotifications();
			}
		});
	}
});
