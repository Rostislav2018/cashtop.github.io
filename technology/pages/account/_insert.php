<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_ref WHERE id = '$user_id'");
$balance = $db->FetchArray();
$login = $balance['login'];
?>

<div class="container">
<div class="page-content">

<?
include("inc/_user_menu.php");
?>

<h2>Вывод:</h2>

<br />

<center>
<div class="alert alert-info" role="alert">
<p><i class="fa fa-info-circle"></i> Вывод в проекте производятся в ручном режиме в течении 24 часов.<BR />Вывод от ... до ... рублей.</p> 
</div>
</center>

<?
            $db->Query("SELECT COUNT(*) FROM db_insert WHERE user_id = '$user_id' AND status = 0");
			if($db->FetchRow() == 0){
				
		    
				
if(isset($_POST['summa'])){
$summa = sprintf ("%01.2f", str_replace(',', '.', $_POST['summa']));
$time = time();
$status = 0;
$purse = $_POST['purse'];
$ps = $_POST['ps'];
	if($balance['money_ban'] < $summa) {
		echo "<center><b>Недостаточно средств на балансе.</b></center><BR />";
	} elseif ($summa < $min_summa) {
		echo "<center><b>Минимум для вывода ".$min_summa.".</b></center><BR />";
	} elseif ($summa > $max_summa) {
		echo "<center><b>Максимум для вывода ".$max_summa.".</b></center><BR />";
	} else {
		$db->Query("INSERT INTO db_insert (login, purse, user_id, summa, date, status, ps) 
			VALUES ('$login', '$purse', '$user_id', '$summa', '$time', '$status', '$ps') ");
			
			$db->Query("UPDATE db_users_ref SET money_ban = money_ban - '$summa' WHERE id = '$user_id' LIMIT 1");
			$db->Query("UPDATE db_stats SET all_inserts = all_inserts + '$summa' WHERE id = 1");
			
			echo "<center><b>Ваша заявка отправлена в очередь на выполнение!</b></center>";  

header("Location: /account/insert");      

	}


}

            }else echo "<center><b>У вас имеются необработанные заявки. Дождитесь их выполнения.</b></center><BR />";

?>

<br />

<div class="col-md-3 col-sm-3 col-xs-12">
</div>

<div class="col-md-6 col-sm-6 col-xs-12">

<div class="call-action call-action-boxed call-action-style2 clearfix">
<form method="POST">
<?
$db->Query("SELECT * FROM db_users_ref WHERE id = '$user_id'");
$balance = $db->FetchArray();
?>
</br>
Платежная система:
<br />
<select class="form-control" name="ps">
<option value="0"> - выберите платежную систему</option>
<option value="1">Qiwi Кошелек</option>
<option value="2">Payeer</option>
</select>
Кошелек:
<br />
<input class="form-control" type="text" name="purse">
<br />
Сумма:
<br />
<input class="form-control" type="text" name="summa">
<br />
<button class="btn btn-md btn-default" type="submit">Вывести</button>
</form>
</div>

</div>

<div class="col-md-3 col-sm-3 col-xs-12">
</div>

<table class="table table-striped">
<thead>
  <tr>
<th>ID</th>
<th>Дата</th>
<th>Кошелек</th>
<th>Сумма</th>
<th>Статус</th>
 </tr>
  </thead>
  <tbody>
    <tr>
	
<?
$db->Query("SELECT * FROM db_insert WHERE user_id = '$user_id'");
while($insert = $db->FetchArray() ) {
$id = $insert['id'];
$summa = $insert['summa'];
$purse = $insert['purse'];
$ps = $insert['ps'];
$login = $insert['login'];
$date = $insert['date'];
$status = $insert['status'];
?>

<td><?php echo $id; ?></td>
<td><?php echo date('d.m.Y', $date); ?></td>
<td><?php echo $purse; ?></td>
<td><?php echo str_replace('.00','',number_format($summa,2,'.',',')); ?> Руб.</td>
<?php
if($status == 0){ echo '<td><i class="fa fa-clock-o"></i></td>'; }
elseif ($status == 1) { echo '<td><i class="fa fa-check"></i></td>'; }
elseif ($status == 2) { echo '<td><i class="fa fa-times"></i></td>'; }
?>
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>