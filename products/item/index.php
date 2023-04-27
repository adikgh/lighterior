<? include "../../config/core.php";



	$item_id = $_GET['id'];

	// filter
	$item = db::query("select * from product_item where id = '$item_id'");
	$item_d = mysqli_fetch_assoc($item);

	$product = product::product($item_d['product_id']);
	$product_id = $product['id'];

	// site setting
	$menu_name = 'item';

	$css = [];
	$js = [];
?>
<? include "../../block/header.php"; ?>

	<div class="">

      <div class="bl_c">
			<div class="multis">
				<a class="multis_i" href="/">Товары</a>
				<a class="multis_i" href="/">Категория</a>
				<span class="multis_i"><?=$product['name_ru']?></span>
			</div>
		</div>

		<div class="bl_c">
			<div class="itc">
				<div class="itc_l">
					<div class="it_cm">
						<div class="it_cmi"><div class="lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img']?>"></div></div>
						<div class="it_cmi"><div class="lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$item_d['img_room']?>"></div></div>

						<? $img = db::query("select * from product_img where product_item_id = '$item_id' order by number asc"); ?>
						<? while ($img_d = mysqli_fetch_assoc($img)): ?>
							<div class="it_cmi"><div class="lazy_img" data-src="https://admin.lighterior.kz/assets/uploads/products/<?=$img_d['img']?>"></div></div>
						<? endwhile ?>

						<!-- <div class="it_cmi"><div class="lazy_img" data-src=""></div></div> -->
					</div>

					<div class="">
						<div class="head_c">
							<h4>Похожи товары</h4>
						</div>
					</div>

				</div>
				<div class="itc_r">
					<div class="itc_rt">
						<div class="itc_rt_name"><?=$product['name_ru']?></div>
						<div class="itc_rt_cat"><?=product::pr_catalog_name($product['catalog_id'], $lang)?></div>
						<div class="itc_rt_price"><div class="fr_price"><?=$item_d['price']?></div></div>
						<!-- <div class=""><?=$item_d['article']?></div> -->
						<div class="itc_rt_rec">
							<div class=""><i class="fal fa-info-circle"></i> Лампочка продается отдельно. Lighterior рекомендует светодиодную лампочку Е26 шарообразный опаловый белый.</div>
						</div>
					</div>


					<? $item_all = db::query("select * from product_item where product_id = '$product_id'"); ?>
					<? if (mysqli_num_rows($item_all) > 1): ?>
						<div class="itc_e">
							<div class="itc_eh">
								<div>Выберите цвет</div>
								<span><?=product::pr_color($item_d['color_id'])['name_ru']?></span>
							</div>
							<div class="itc_ec">
								<? while ($item_all_d = mysqli_fetch_assoc($item_all)): ?>
									<a class="itc_eci <?=($item_all_d['id']==$item_id?'itc_eci_act':'')?>" href="?id=<?=$item_all_d['id']?>">
										<div class="lazy_img" data-src="https://lighterior.kz/assets/uploads/products/<?=$item_all_d['img']?>"></div>
									</a>
								<? endwhile ?>
							</div>
						</div>
					<? endif ?>

					<div class="itc_o">
						<!-- <div class="btn add_cart" data-id="<?=$item_id?>">Добавить в корзину</div> -->
						<a href="https://api.paybox.money/payment.php?pg_merchant_id=549532&pg_amount=15000&pg_currency=KZT&pg_description=4567&pg_salt=5tLqjUnozyVl5ADC&pg_language=ru&pg_sig=308becc641ac0a2bf756aec2b150546e" class="btn add_cart" data-id="<?=$item_id?>">Добавить в корзину</a>
						<div class="btn btn_dd add_favorites" data-id="<?=$item_d['id']?>"><i class="fal fa-heart"></i></div>
					</div>
				</div>
			</div>

			<div class="">
				<div class="">
					<div class="head_c">
						<h4>Может вам понравиться</h4>
					</div>
				</div>

			</div>
		</div>


	</div>


<? include "../../block/footer.php"; ?>