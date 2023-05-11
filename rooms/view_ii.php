<? include "../config/core.php"; 

	$id = strip_tags($_POST['id']); $i = 0;

	$ln = $id.', ';
	$rooms = db::query("select * from rooms where parent_id = '$id'");
	if (mysqli_num_rows($rooms)) {
		while ($rooms_d = mysqli_fetch_assoc($rooms)) $ln = $ln . $rooms_d['id'] . ', ';
	}
	$ln = substr($ln, 0, -2);

	$catalog = db::query("select * from rooms_item where rooms_id in ($ln) order by ins_dt desc limit 1, 6");
?>

		<? if (mysqli_num_rows($catalog)): ?>
			<? while ($cat_d = mysqli_fetch_assoc($catalog)): ?>
				<div class="lazy_img" data-src="/assets/uploads/rooms/<?=$cat_d['img']?>"></div>
			<? endwhile ?>
		<? endif ?>

	<? exit(); ?>