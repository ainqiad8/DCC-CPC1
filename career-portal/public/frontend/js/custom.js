// custom dropdown menu 
(function () {

	const dropdownBtn = document.querySelectorAll('.dropdown-btn');
	const dropdownMenu = document.querySelectorAll('.dropdown-menu');
	dropdownBtn.forEach((btn) => {
		btn.addEventListener('click', (e) => {
			e.preventDefault();
			btn.nextElementSibling.classList.toggle('hidden');
			btn.lastElementChild.classList.toggle('rotate_180_icon');
		});
	});
	// for closing dropdown menu when click outside of it
	function closeDropdownMenu(event) {
		var dropdowns = document.querySelectorAll(".dropdown-menu");
		dropdowns.forEach((dropdown) => {
			if (!dropdown.classList.contains('hidden')) {
				dropdown.classList.add('hidden');
				dropdown.previousElementSibling.lastElementChild.classList.remove('rotate_180_icon')
			}
		});
		
	}

	// close dropdown menu when click outside of it
	window.onclick = function (event) {
		if (!event.target.closest('.dropdown')) {

			closeDropdownMenu(event);
		}
	}
})();

(function () {
	document.getElementById('navbar-btn').addEventListener('click', function (e) {
		e.preventDefault();
		document.getElementById('navbar').classList.toggle('hidden');
	});
})();

// initialize swipper 


(function () {
	const progressCircle = document.querySelector(".autoplay-progress svg");
	const progressContent = document.querySelector(".autoplay-progress span");
	var swiper = new Swiper(".langindPageSwipper", {
		spaceBetween: 30,
		centeredSlides: true,
		autoplay: {
			delay: 2500,
			disableOnInteraction: false
		},
		pagination: {
			el: ".swiper-pagination",
			clickable: true
		},
		navigation: {
			nextEl: ".swiper-button-next",
			prevEl: ".swiper-button-prev"
		},
		on: {
			autoplayTimeLeft(s, time, progress) {
				progressCircle.style.setProperty("--progress", 1 - progress);
				progressContent.textContent = `${Math.ceil(time / 1000)}s`;
			}
		}
	});
})();

