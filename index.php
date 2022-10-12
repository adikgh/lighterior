<? include "config/core.php";

	// site setting
	$menu_name = 'home';

	$site_set['pmenu'] = true;
	$site_set['swiper'] = true;

	// header('location: /plug/');

?>
<? include "block/header.php"; ?>

	<!-- <div class="bl_c">
		<div class="bs"></div>
	</div> -->

	<div class="bl1">
		<div class="bl_c">
			<div class="head_c">
				<h4>Рекомендуемые категории</h4>
			</div>
			<div class="catalog catalog_fea">
				<? $catalog = db::query("select * from product_catalog where home_s is not null order by home_s asc limit 8"); ?>
				<? if (mysqli_num_rows($catalog)): ?>
					<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
						<? $cat_id = $cat_d['id']; ?>
						<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
							<div class="catalog_img">
								<div class="catalog_imgc lazy_img" data-src="/assets/uploads/catalog/<?=$cat_d['img']?>"></div>
								<div class="catalog_imgc2 lazy_img" data-src="/assets/uploads/catalog/<?=$cat_d['img_f']?>"></div>
							</div>
							<div class="catalog_in"><?=$cat_d['name_ru']?></div>
						</a>
					<? endwhile ?>
				<? endif ?>
			</div>
		</div>
	</div>

	<div class="bl21">
		<div class="bl_c">
			<div class="head_c">
				<h4>Услуги, которые помогут вам делать покупки</h4>
			</div>
			<div class="catalog bl21_c">
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-comment-exclamation"></i>
					<div class="bl21_csh">Часто задаваемые вопросы</div>
					<div class="bl21_csp">Новости о безопасных покупках в наших магазинах.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-credit-card"></i>
					<div class="bl21_csh">Способы оплаты</div>
					<div class="bl21_csp">Финансируйте дом своей мечты с помощью наших кредитных карт.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-truck"></i>
					<div class="bl21_csh">Доставка</div>
					<div class="bl21_csp">Покупайте не выходя из дома и получайте доставку на дом.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
				<a class="catalog_i" href="/products/cat/?id=<?=$cat_id?>">
					<i class="far fa-hard-hat"></i>
					<div class="bl21_csh">Сборка</div>
					<div class="bl21_csp">Найдите гибкие и доступные способы выполнения ваших задач.</div>
					<div class="btn btn_back">Учить больше</div>
				</a>
			</div>
			<div class="bl21_b">
				<div class="btn">Посмотреть все услуги</div>
			</div>
		</div>
	</div>

	<div class="bl22">
		<div class="bl_c">
			<div class="head_c">
				<h4>Притормози и создай пространство для себя</h4>
				<p>Восстановите связь с собой и создайте настроение для домашнего спа-дня с успокаивающими предметами, такими как вышитые кимоно, банные полотенца, корзины и многое другое. Все это часть новой коллекции VÅRANDE!</p>
			</div>
			<div class="">
				
			</div>
		</div>
	</div>

	<div class="bl23">
		<div class="bl_c">
			<div class="head_c">
				<h4>Вдохновение в дизайне и современные идеи для дома </h4>
			</div>
			<div class="bl23_c">
				<div class="swiper bl23_ct swiper_bl23">
					<div class="swiper-wrapper">
						<div class="swiper-slide bl23_ct_act" data-id="0">Все</div>
						<? $catalog = db::query("select * from product_catalog limit 5"); ?>
						<? if (mysqli_num_rows($catalog)): ?>
							<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
								<div class="swiper-slide" data-id="<?=$cat_d['id']?>"><?=$cat_d['name_ru']?></div>
							<? endwhile ?>
						<? endif ?>
					</div>
				</div>
				<div class="bl23_cs">
					<div class="bl23_csw">
						<div class="bl23_csw2">
							<div class=""></div>
							<div class=""></div>
							<div class=""></div>
							<div class=""></div>
							<div class=""></div>
							<div class=""></div>
							<div class=""></div>
							<div class=""></div>
							<div class=""></div>
						</div>
					</div>
					<div class="bl23_csb">
						<div class="btn">Загрузите еще - 12</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<? include "block/footer.php"; ?>