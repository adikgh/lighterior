<? include "../config/core.php"; ?>
   
   <? $id = strip_tags($_POST['id']); $i = 0; ?>

		<? $catalog = db::query("select * from rooms where parent_id = '$id'"); ?>
		<? if (mysqli_num_rows($catalog)): ?>
			<div class="swiper bl23_ct bl23_ct2 swiper_bl23">
				<div class="swiper-wrapper">
					<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
						<? // $i++; ?>
						<div class="swiper-slide <?=($i==1?'bl23_ct_act':'')?>" data-id="<?=$cat_d['id']?>"><?=$cat_d['name_ru']?></div>
					<? endwhile ?>
				</div>
			</div>
		<? endif; ?>
		
	<? exit(); ?>