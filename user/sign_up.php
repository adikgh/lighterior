<?php include "../config/core.php";

	//
	if ($user_id) header('location: /user/cours/');

	// site setting
	$menu_name = 'sign';
	$site_set['header'] = false;
	$site_set['menu'] = false;
	$site_set['footer'] = false;
	$site_set['footer'] = false;
	$css = ['user/sign'];
	$js = ['user/sign'];
?>
<?php include "../block/header.php"; ?>

	<div class="u_sign">
		<div class="bl_c">
			<div class="usign_c">

				<div class="usign_l">
					<div class="">
						<div class="">Already have an account? <a href="/user/sign.php">Login</a></div>
					</div>
				</div>
				<div class="usign_r">
					<div class="usign_cn">
	
						<div class="form_im form_im2 form_im_nm">
							<input type="text" class="form_im_txt name" data-lenght="2" data-sel="0" />
							<div class="form_placeholder">Ваш полный имя</div>
							<!-- <i class="far fa-user form_icon"></i> -->
						</div>
						<div class="form_im form_im2 form_im_ph">
							<input type="tel" class="form_im_txt fr_phone phone" data-lenght="11" data-sel="0" />
							<div class="form_placeholder">Номер</div>
							<!-- <i class="far fa-mobile form_icon"></i> -->
						</div>
						<div class="form_im form_im2 form_im_ps">
							<input type="password" class="form_im_txt password" data-lenght="6" data-sel="0" />
							<div class="form_placeholder">Пароль</div>
							<!-- <i class="far fa-lock form_icon"></i> -->
							<i class="far fa-eye-slash form_icon_pass"></i>
						</div>
						<div class="form_im form_im_btn">
							<button class="btn btn_sign_up">Зарегистрироваться</button>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>


<?php include "../block/footer.php"; ?>


