	var swiper_1 = new Swiper(".mySwiper_1", {
		navigation: {
			nextEl: ".swiper_next_1",
			prevEl: ".swiper_prev_1",
		},
		scrollbar: {
			el: ".swiper_scrollbar",
			// hide: true,
		},
		breakpoints: {
			320: {
				slidesPerView: 1,
				spaceBetween: 20,
			},
			501: {
				slidesPerView: 2,
				spaceBetween: 30,
			},
			1025: {
				slidesPerView: 'auto',
				spaceBetween: 20,
			}
		}
	});


	var rbl4_c = new Swiper(".rbl4_c", {
		slidesPerView: "auto",
		navigation: {
			nextEl: ".swiper_next_1",
			prevEl: ".swiper_prev_1",
		},
	});