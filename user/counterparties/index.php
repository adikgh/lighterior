<?php include "../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/sign.php');
	// else header('location: /user/acc');

	// site setting
	$menu_name = 'counterparties';

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

					<? include "umenu2.php"; ?>

					<div class="">

					</div>
					
				</div>

			</div>
		</div>

	</div>

<? include "../../block/footer.php"; ?>