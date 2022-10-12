// start jquery
$(document).ready(function() {

	
	
	// sign in
	$('.btn_sign').on('click', function() {
		if ($('.phone').attr('data-sel') != 1 || $('.password').attr('data-sel') != 1) {
			if ($('.phone').attr('data-sel') != 1) mess('Вы не ввели номер')
			else if ($('.password').attr('data-sel') != 1) mess('Вы не ввели пароль')
		} else {
			$.ajax({
				url: "/user/get.php?sign",
				type: "POST",
				dataType: "html",
				data: ({ 
					phone: $('.phone').attr('data-val'),
					password: $('.password').attr('data-val')
				}),
				success: function(data){
					if (data == 'yes') location.reload();
					else if (data == 'code') mess('')
					else if (data == 'password') mess('Неправильный пароль')
					else if (data == 'phone') mess('Ваш номер нет в базе!')
					else console.log(data)
				},
				beforeSend: function(){ },
				error: function(data){ console.log(data) }
			})
		}
	});
	
	
	
	
	
	
	
	// sign up
	$('.btn_sign_up').on('click', function() {

		// form
		btn = $(this)
		phone = $('.phone')
		code = $('.code')
		sname = $('.name')
		password = $('.password')

		// 
		if (btn.attr('data-type') == 'phone') {
			if (phone.attr('data-sel') != 1) mess('Cіз телефен номеріңізді жазбапсыз')
			else {
				$.ajax({
					url: "/user/get.php?sign_up_phone",
					type: "POST",
					dataType: "html",
					data: ({ phone: phone.attr('data-val') }),
					success: function(data){
						if (data == 'phone') mess('Cіз базада тіркелмегенсіз, админмен байланысып көріңіз!')
						else if (data == 'password') mess('Cіз платформаға туркелгенсіз. <a href="sign_in.php">Кіру</a>')
						else if (data == 'code') {
							phone.attr('disabled', 'true')
							code.parent().removeClass('dsp_n')
							btn.attr('data-type', 'code')
						} else console.log(data)
					},
					beforeSend: function(){},
					error: function(data){console.log(data)}
				})
			}
		} else if (btn.attr('data-type') == 'code') {
			if (code.attr('data-sel') != 1) mess('Cіз сандарды жазбапсыз')
			else {
				$.ajax({
					url: "/user/get.php?sign_up_code",
					type: "POST",
					dataType: "html",
					data: ({
						phone: phone.attr('data-val'),
						code: code.attr('data-val')
					}),
					success: function(data){
						if (data == 'yes') {
							code.attr('disabled', 'true')
							sname.parent().removeClass('dsp_n')
							password.parent().removeClass('dsp_n')
							btn.attr('data-type', 'final')
						} else if (data == 'none') mess('Cіз жазған код қате, қайта жазып көріңіз')
						else console.log(data)
					},
					beforeSend: function(){},
					error: function(data){console.log(data)}
				})
			}
		} else if (btn.attr('data-type') == 'final') {
			if (sname.attr('data-sel') != 1 || password.attr('data-sel') != 1) mess('Форманы толық толтырыңыз')
			else {
				$.ajax({
					url: "/user/get.php?sign_up_final",
					type: "POST",
					dataType: "html",
					data: ({
						name: sname.attr('data-val'),
						password: password.attr('data-val')
					}),
					success: function(data){
						if (data == 'yes') location.reload();
						else console.log(data)
					},
					beforeSend: function(){},
					error: function(data){console.log(data)}
				})
			}
		}
	});





	// btn_sign_reset
	$('.btn_sign_reset').on('click', function() {
		btn = $(this)
		phone = $('.phone')
		code = $('.code')
		password = $('.password')

		// 
		if (btn.attr('data-type') == 'phone') {
			if (phone.attr('data-sel') != 1) mess('Cіз телефен номеріңізді жазбапсыз')
			else {
				$.ajax({
					url: "/user/get.php?reset_phone",
					type: "POST",
					dataType: "html",
					data: ({ phone: phone.attr('data-val') }),
					success: function(data){
						if (data == 'phone') mess('Cіз базада тіркелмегенсіз, админмен байланысып көріңіз!')
						else if (data == 'code') {
							phone.attr('disabled', 'true')
							code.parent().removeClass('dsp_n')
							btn.attr('data-type', 'code')
						} else console.log(data)
					},
					beforeSend: function(){},
					error: function(data){console.log(data)}
				})
			}
		} else if (btn.attr('data-type') == 'code') {
			if (code.attr('data-sel') != 1) mess('Cіз сандарды жазбапсыз')
			else {
				$.ajax({
					url: "/user/get.php?reset_code",
					type: "POST",
					dataType: "html",
					data: ({
						phone: phone.attr('data-val'),
						code: code.attr('data-val')
					}),
					success: function(data){
						if (data == 'yes') {
							code.attr('disabled', 'true')
							password.parent().removeClass('dsp_n')
							btn.attr('data-type', 'final')
						} else if (data == 'none') mess('Cіз жазған код қате, қайта жазып көріңіз')
						else console.log(data)
					},
					beforeSend: function(){},
					error: function(data){console.log(data)}
				})
			}
		} else if (btn.attr('data-type') == 'final') {
			if (password.attr('data-sel') != 1) mess('Форманы толық толтырыңыз')
			else {
				$.ajax({
					url: "/user/get.php?reset_final",
					type: "POST",
					dataType: "html",
					data: ({ password: password.attr('data-val') }),
					success: function(data){
						if (data == 'yes') location.reload();
						else console.log(data)
					},
					beforeSend: function(){},
					error: function(data){console.log(data)}
				})
			}
		}
	});










	// btn_pass_reset
	$('.btn_pass_reset').on('click', function() {
		
		// form
		this_btn = $(this)
		btn = $('.btn_sign_in')
		login = $('.login')
		password = $('.password')
		code = $('.code')
		
		// block
		cn_p = $('.usign_p')
		cn_h = $('.usign_h')
		cn_reset = $('.cn_reset')
		cn_reset_time = $('.cn_reset_time')

		$.ajax({
			url: "/user/get.php?pass_reset",
			type: "POST",
			dataType: "html",
			data: ({login: login.attr('data-val')}),
			success: function(data){
				if (data == 'yes') {
					password.parent().addClass('dsp_n')
					code.parent().removeClass('dsp_n')
					cn_reset.addClass('dsp_n')
					cn_p.html(cn_p.attr('data-reset-pass'))
					btn.attr('data-type', 'reset-pass')
				} else {console.log(data)}
				console.log(data);
			},
			beforeSend: function(){},
			error: function(data){console.log(data)}
		})
	});

















}) // end jquery