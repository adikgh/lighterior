<?php include "../../config/core.php";





	// site setting
	$menu_name = 'item';

	$css = [];
	$js = [];
?>
<?php include "../../block/header.php"; ?>

	<div class="">

      <div class="bl_c">
			<div class="multis">
				<a class="multis_i" href="/">Товары</a>
				<a class="multis_i" href="/">Категория</a>
				<span class="multis_i"><?=$_GET['id']?></span>
			</div>
		</div>


	</div>


<?php include "../../block/footer.php"; ?>