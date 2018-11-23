<?
include("inc/_admin_menu.php");
?>


<div class="container">
<div class="page-content">

<?
if (isset($_POST['oid'])) {
$purse = $_POST['purse'];
$old = $_POST['oid'];
$user_id = $_POST['user_id'];
$summa = $_POST['summa'];

$db->Query("UPDATE db_insert SET status = 1 WHERE id = '$old'");
$db->Query("UPDATE db_stats SET all_inserts = all_inserts + '$summa' WHERE id = 1");
echo "<center><b>Заявка одобрена.</b></center>";
}

if(isset($_POST["id"])){

$id = intval($_POST["id"]);
$db->Query("SELECT * FROM db_insert WHERE status = '0' AND id = '{$id}'");

	if($db->NumRows() == 1){
	
	$data = $db->FetchArray();
	
	$user_id = $data["user_id"];
	$summa = $data["summa"];
		
		$db->Query("UPDATE db_users_ref SET money_ban = money_ban + '$summa' WHERE id = '$user_id'");
		$db->Query("UPDATE db_insert SET status = 2 WHERE id = '$id'");
		
		echo "<center><b>Заявка отменена, средства возвращены.</b></center><BR />";
		
	}else echo "<center><b>Заявка не найдена.</b></center><BR />";

}

?>

<table class="table table-striped">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Пользователь</th>
<th>Платежная система</th>
<th>Кошелек</th>
<th>Сумма</th>
<th>Одобрить</th>
<th>Отказать</th>
 </tr>
  </thead>
  <tbody>
    <tr>	
	<?
$db->Query("SELECT * FROM db_insert WHERE status = 0");
while($insert = $db->FetchArray() ) {
$id = $insert['id'];
$login = $insert['login'];
$user_id = $insert['user_id'];
$purse = $insert['purse'];
$ps = $insert['ps'];
$date = $insert['date'];
$summa = $insert['summa'];
?>
<td><?php echo $id; ?></td>
<td><?php echo date('d.m.Y', $date); ?></td>
<td><?php echo $login; ?></td>
<td><?php echo $ps; ?></td>
<td><?php echo $purse; ?></td>
<td><?php echo $summa; ?></td>
<td>
<form action="" method="post" id="confirm">
<input type="hidden" name="oid" value="<?=$id; ?>">
<input type="hidden" name="user_id" value="<?=$user_id; ?>">
<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('confirm')){ submit(); }"><i class="fa fa-check"></i></a>
</form>
</td>
<td>
<form method="post" action="" id="turndown">
<input type="hidden" name="id" value="<?=$id; ?>">
<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('turndown')){ submit(); }"><i class="fa fa-times"></i></a>
</form>
</td>
</tr>
<? } ?>
</tbody>
</table>

</div>
</div>