$(document).ready(function() {


	// 
	$('.menu_clc').on('click', function() {
		$('.menuc').addClass('menuc_act')
		$('#html').addClass('ovr_h')
	})
	$('.menu_back').on('click', function() {
		$('.menuc').removeClass('menuc_act')
		$('#html').removeClass('ovr_h')
	})



	// скрол
	let scroll = $(window).scrollTop()
	if (scroll > 64) $('.navh').addClass('navh_act')
	else $('.navh').removeClass('navh_act')
	$(window).scroll(function() {
		scroll = $(window).scrollTop()
		if (scroll > 64) $('.navh').addClass('navh_act')
		else $('.navh').removeClass('navh_act')
	})






	// 
	var swiper_bl23 = new Swiper(".swiper_bl23", {
		slidesPerView: "auto",
		// navigation: {
		// 	nextEl: ".swiper_next_bl23",
		// 	prevEl: ".swiper_prev_bl23",
		// },
	});










	// add cart
	$('html').on('click', '.add_cart', function() {
		btn = $(this)
		$.ajax({
			url: "/shoppingcart/get.php?add_cart",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){
				mess(data)
			},
			beforeSend: function(){ },
			error: function(data){ }
		})
	})
	// delete cart
	$('html').on('click', '.delete_cart', function() {
		btn = $(this)
		$.ajax({
			url: "/shoppingcart/get.php?delete_cart",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){
				// mess(data)
				btn.parents('.carts_i').remove();
			},
			beforeSend: function(){ },
			error: function(data){ }
		})
	})
	// minus cart
	$('html').on('click', '.minus_cart', function() {
		btn = $(this)
		quantity = btn.parent().attr('data-quantity') - 1
		price = btn.parent().attr('data-price')
		if (quantity == 0) {
			 
		} else {
			$.ajax({
				url: "/shoppingcart/get.php?minus_cart",
				type: "POST",
				dataType: "html",
				data: ({ id: btn.parent().attr('data-id'), }),
				success: function(data){
					// mess(data); console.log(data);
					btn.parent().attr('data-quantity', quantity)
					btn.siblings('.uc_uin_calc_q').val(quantity + ' шт')
					btn.parents('.carts_iz_calc').siblings('.carts_iz').children('.item_price').children('span').html(quantity * price)
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		}
	})
	// plus cart
	$('html').on('click', '.plus_cart', function() {
		btn = $(this)
		quantity = parseInt(btn.parent().attr('data-quantity')) + 1
		price = btn.parent().attr('data-price')
		// if (q == 1) {
			 
		// } else {
			$.ajax({
				url: "/shoppingcart/get.php?plus_cart",
				type: "POST",
				dataType: "html",
				data: ({ id: btn.parent().attr('data-id'), }),
				success: function(data){
					btn.parent().attr('data-quantity', quantity)
					btn.siblings('.uc_uin_calc_q').val((quantity) + ' шт')
					btn.parents('.carts_iz_calc').siblings('.carts_iz').children('.item_price').children('span').html(quantity * price)
					// mess(data); console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		// }
	})
	// quantity cart
	$('html').on('input', '.quantity_cart', function() {
		btn = $(this)
		quantity = btn.attr('data-val')
		price = btn.parent().attr('data-price')

		// if (q == 1) {
			 
		// } else {
			$.ajax({
				url: "/shoppingcart/get.php?quantity_cart",
				type: "POST",
				dataType: "html",
				data: ({ 
					id: btn.parent().attr('data-id'),
					quantity: quantity,
				}),
				success: function(data){
					btn.parent().attr('data-quantity', quantity)
					btn.parents('.carts_iz_calc').siblings('.carts_iz').children('.item_price').children('span').html(quantity * price)
					// mess(data); console.log(data);
				},
				beforeSend: function(){ },
				error: function(data){ }
			})
		// }
	})
	





	




	// add favorites
	$('html').on('click', '.add_favorites', function() {
		btn = $(this)
		$.ajax({
			url: "/favorites/get.php?add_favorites",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){
				if (data == 'ins') btn.addClass('item_favorites_act')
				else if (data == 'del') btn.removeClass('item_favorites_act')
				else mess(data)
			},
			beforeSend: function(){ },
			error: function(data){ }
		})
	})
	// add favorites 2
	$('html').on('click', '.add_favorites2', function() {
		btn = $(this)
		$.ajax({
			url: "/favorites/get.php?add_favorites",
			type: "POST",
			dataType: "html",
			data: ({ id: btn.attr('data-id'), }),
			success: function(data){
				if (data == 'del') {
					btn.parents('.item').remove();
				} else mess(data)
			},
			beforeSend: function(){ },
			error: function(data){ }
		})
	})


















	// СМС
	$('.disb_zab').click(function(){
		$('.fr').addClass('pop_bl_act');
		$('#html').addClass('ovr_h');
	})
	$('.zabr_back').click(function(){
		$('.fr').removeClass('pop_bl_act');
		$('#html').removeClass('ovr_h');
	})

	$('.orderSend').on('click', function() {
		var name = $(this).parent().siblings().children('.name')
		var phone = $(this).parent().siblings().children('.phone')
		if (name.attr('data-pr') != 1 || phone.attr('data-pr') != 1) { mess('Введите свой данный') }
		else {
			$.ajax({
				url: "/send/?mess",
				type: "POST",
				dataType: "html",
				data: ({name: name.val(), phone: phone.val()}),
				success: function(data){
					if (data == 'yes') mess('Сәтті жіберілді')
					else mess('Қайта кіріуіңізді сұраймын!')
				},
				beforeSend: function(){ mess('Отправка..') },
				error: function(data){ mess('Ошибка..') }
			})
		}
	})



	$('.orderSend2').on('click', function() {
		var name = $(this).parent().siblings().children('.name')
		var phone = $(this).parent().siblings().children('.phone')
		if (name.attr('data-sel') != 1 || phone.attr('data-sel') != 1) mess('Форманы толтырыңыз')
		else {
			$.ajax({
				url: "/config/send.php?mess2",
				type: "POST",
				dataType: "html",
				data: ({
					name: name.val(),
					phone: phone.val()
				}),
				success: function(data){
					if (data == 'yes') location.href = '/cours/maksat-and-motivation2/video.php';
					else mess('Қайта кіріуіңізді сұраймын!')
				},
				beforeSend: function(){},
				error: function(data){}
			})
		}
	})
	










	


   // $('.progress_ring_c').each(function() {
   //    radius = $(this).attr('r');
   //    precent = $(this).attr('data-precent')
   //    circumference = 2 * Math.PI * radius;
   //    $(this).css('strokeDasharray', circumference + ' ' + circumference)
   //    $(this).css('strokeDashoffset', circumference - precent / 100 * circumference)
   // });


	// 
	// var swiper = new Swiper(".swiper_catalog", {
	// 	slidesPerView: "auto",
	// 	navigation: {
	// 	  nextEl: ".swiper-button-next1",
	// 	  prevEl: ".swiper-button-prev1",
	// 	},
	// });
	// var swiper = new Swiper(".swiper_catalog2", {
	// 	slidesPerView: "auto",
	// 	navigation: {
	// 	  nextEl: ".swiper-button-next2",
	// 	  prevEl: ".swiper-button-prev2",
	// 	},
	// });













	

	// var slide_min = new Swiper('.slide_min', {
 //      	slidesPerView: 'auto',
 //      	pagination: {
	//         el: '.slide_min_pag',
	//         type: 'progressbar',
	// 	},
 //    });
 //    var slide_max = new Swiper('.slide_max', {
 //      	slidesPerView: 'auto',
 //      	pagination: {
	//         el: '.slide_max_pag',
	//         type: 'progressbar',
	// 	},
	// 	navigation: {
	// 		nextEl: '.slide_max_next',
	// 		prevEl: '.slide_max_prev',
	// 	},
 //    });
 //    var home_cours_cat_c = new Swiper('.home_cours_cat_c', {
 //      	slidesPerView: 'auto',
 //      	pagination: {
	//         el: '.home_cours_cat_c_pag',
	//         type: 'progressbar',
	// 	},
 //    });



	// var galleryThumbs = new Swiper('.gallery-thumbs', {
	//     slidesPerView: 'auto',
	//     freeMode: true,
	//     watchSlidesVisibility: true,
	//     watchSlidesProgress: true,
 //    });
 //    var galleryTop = new Swiper('.gallery-top', {
 //    	autoHeight: true,
	// 	loop:true,
 //      	thumbs: { swiper: galleryThumbs }
 //    });


    // кaрусел
	// var galleryThumbs = new Swiper('.gallery-thumbs', {
	// 	loop:true,
	// 	slidesPerView: 3,
	// 	allowTouchMove: false,
	// 	freeMode: true,
	// 	watchSlidesVisibility: true,
	// 	watchSlidesProgress: true,
	// 	breakpoints: {
	//         360: {
	//           	slidesPerView: 2,
	// 			allowTouchMove: true,
	//         },
	//     }
	// })
	// var galleryTop = new Swiper('.gallery-top', {
	// 	autoplay: {
	//     	delay: 5000,
	//   	},
	//   	speed: 500,
	// 	loop: true,
	// 	navigation: {
	// 		nextEl: '.swiper-button-next',
	// 		prevEl: '.swiper-button-prev',
	// 	},
	// 	thumbs: {
	// 		swiper: galleryThumbs,
	// 	},
	// })





	$('.bq_cipcni').on('click', function () { 
		$(this).siblings('.bq_cipcni').removeClass('bq_cipcni_act');
		$(this).addClass('bq_cipcni_act');
		$(this).parent().siblings('p').html($(this).attr('data-price'))
	})

	$('.btn_ukl').click(function (e) { 
      e.preventDefault();
      $('.oko').addClass('oko_act')
   });
   $('.oko_close').click(function (e) { 
      e.preventDefault();
      $('.oko').removeClass('oko_act')
   });



	// $('.lazy_rev').lazy({effect:"fadeIn",effectTime:500,threshold:0})
	// var mySwiper5 = new Swiper(".mySwiper5", {
	//    slidesPerView: 1,
	// 	autoHeight: true,
	// 	navigation: {
	// 		nextEl: ".swiper-button-next5",
	// 		prevEl: ".swiper-button-prev5",
	// 	},
	// 	on:{
	// 		slideChange:function(){
	// 			$('.lazy_rev').lazy({effect:"fadeIn",effectTime:500,threshold:0})
	// 		}
	// 	},
	// });






})