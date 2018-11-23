<?
include("inc/_admin_menu.php");
?>

<div class="container">
<div class="page-content">

<?

if(isset($_POST["id"])){



$id = intval($_POST["id"]);

$db->Query("SELECT * FROM db_pay WHERE status = '0' AND id = '{$id}'");



	if($db->NumRows() == 1){

	

	$data = $db->FetchArray();

	$user_id = $data["user_id"];

	$summa = $data["summa"];

		$db->Query("UPDATE db_stats SET all_payments = all_payments + '$summa'  WHERE id = 1");

		$db->Query("UPDATE db_users_ref SET money = money + '$summa' WHERE id = '$user_id'");

		$db->Query("UPDATE db_pay SET status = 1 WHERE id = '$id'");

		

		echo "<center><b>Заявка одобрена.</b></center><BR />";

		

	}else echo "<center><b>Заявка не найдена.</b></center><BR />";

}

?>

<?

if (isset($_POST['idd'])) {
$idd = $_POST['idd'];
$db->Query("UPDATE db_pay SET status = 2 WHERE id = '$idd'");
echo "<center><b>Отказано! </b></center>";
}


?>


<table class="table table-striped">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Пользователь</th>
<th>Платежная система</th>
<th>Код транзакции</th>
<th>Сумма</th>
<th>Одобрить</th>
<th>Отказать</th>
 </tr>
  </thead>
  <tbody>
    <tr>	

	<?

$db->Query("SELECT * FROM db_pay WHERE status = 0");

while($insert = $db->FetchArray() ) {

$id = $insert['id'];

$idd = $insert['idd'];

$login = $insert['login'];

$user_id = $insert['user_id'];

$code = $insert['code'];

$ps = $insert['ps'];

$date = $insert['date'];

$summa = $insert['summa'];

?>

<td><?php echo $id; ?></td>
<td><?php echo date('d.m.Y', $date); ?></td>
<td><?php echo $login; ?></td>
<td><?php echo $ps; ?></td>
<td><?php echo $code; ?></td>
<td><?php echo $summa; ?></td>
<td>
<form method="post" action="" id="confirm">
<input type="hidden" name="id" value="<?=$id; ?>">
<input type="hidden" name="user_id" value="<?=$user_id; ?>">
<input type="hidden" name="summa" value="<?php echo $summa; ?>">
<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('confirm')){ submit(); }"><i class="fa fa-check"></i></a>
</form>
</td>
<td>
<form method="post" action="" id="delete">
<input type="hidden" name="idd" value="<?=$id; ?>">
<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('delete')){ submit(); }"><i class="fa fa-times"></i></a>
</form>
</td>
</tr>
<? } ?>
</tbody>
</table>

</div>
</div>