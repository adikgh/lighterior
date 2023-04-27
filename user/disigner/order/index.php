<?php include "../../../config/core.php";

	// Қолданушыны тексеру
	if (!$user_id) header('location: /user/sign.php');
	// else header('location: /user/acc');

	// site setting
	$menu_name = 'disigner_order';

	$css = ['user/main'];
	$js = ['user/main'];
?>
<? include "../../../block/header.php"; ?>

	<div class="user">

		<div class="bl_c">
			<div class="user_p">

				<? include "../../umenu.php"; ?>

				<div class="user_sn">

					<div class="head_c head_c1">
						<h4>Друзья и их заказ</h4>
					</div>
					<div class="user_snl">
						<div class="user_snlс">
							<a class="user_snli " href="/user/disigner/">Список друзей</a>
							<a class="user_snli user_snli_act" href="/user/disigner/order/">Заказы</a>
						</div>
						<div class=""></div>
					</div>

					<div class="">

					</div>
					
				</div>

			</div>
		</div>

	</div>

<? include "../../../block/footer.php"; ?>