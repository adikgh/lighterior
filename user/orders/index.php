<?php include "../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/sign.php');
	// else header('location: /user/acc');

	// site setting
	$menu_name = 'orders';

	$css = ['user/main'];
	$js = ['user/main'];
?>
<? include "../../block/header.php"; ?>

	<div class="user">

		<!-- <div class="bl_c">
			<div class="multis">
				<a class="multis_i" href="/user/">Профиль</a>
				<span class="multis_i">Заказы</span>
			</div>
		</div> -->

		<div class="bl_c">
			<div class="user_p">

				<? include "../umenu.php"; ?>

				<div class="user_sn">
					<div class="head_c head_c1">
						<h4>Мои заказы</h4>
					</div>
					<div class="user_snl">
						<div class="user_snlс">
							<a class="user_snli user_snli_act" href="">Все заказы</a>
							<a class="user_snli" href="">В обработке</a>
							<a class="user_snli" href="">Доставка</a>
							<a class="user_snli" href="">Полученные</a>
							<a class="user_snli" href="">Возвраты</a>
						</div>
						<div class=""></div>
					</div>

				</div>

			</div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>