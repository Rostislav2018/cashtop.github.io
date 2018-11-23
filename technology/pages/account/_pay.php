<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
$login = $balance['login'];
?>

<?
include("inc/_user_menu.php");
?>

<?    

   $db->Query("SELECT * FROM db_admin WHERE id = 1"); 

   $ps = $db->FetchArray();

 ?>


<div class="container">
<div class="page-content">

<h2>Пополнение:</h2>

<br />

<center>
<div class="alert alert-info" role="alert">
<p><i class="fa fa-info-circle"></i> Пополнение происходит с помощью платежной системы Qiwi Кошелек и Payeer.<BR />Пополнение от ... до ... рублей.</p> 
</div>
</center>

<br />

<h2>Пополнение Qiwi Кошелек:</h2>

<div class="alert alert-success" role="alert"
<h4><i class="fa fa-info-circle"></i> Как пополнить аккаунт?</h4>
<li>Заходим в свой кошелёк на сайте <b>w.qiwi.com</b></li>
<li>Выбираем раздел "Перевод" . Выбираем слева тип перевода "На другой кошелек"</li>
<li>Вводим номер кошелька <b><?php echo $ps['qiwi']; ?></b></li>
<li>Вводим необходимую сумму от ... до ... Руб.</li>
<li>Нажимаем кнопку"Оплатить"</li>
<li>Подтверждаем покупку</li>
<li>В открывшемся окне переходим "Посмотреть статус платежа"</li>
<li>Копируем и вставляем номер транзакции (пример номера транзакции 999999900424093868)</li>
</div>

<br />

<h2>Пополнение Payeer:</h2>

<div class="alert alert-success" role="alert"
<h4><i class="fa fa-info-circle"></i> Как пополнить аккаунт?</h4>
<li>Номер кошелька <b><?php echo $ps['pm']; ?></b></li>
</div>

<?php	
if (isset($_POST['code'])) {
$time = time();
$summa = $_POST['summa'];
$code = $_POST['code'];
$ps = $_POST['ps'];
$status = 0; 
	if($batch !== false) {
			$db->Query("INSERT INTO db_pay (summa, user_id, login, date, status, code, ps) 
			VALUES ('$summa', '$user_id', '$login', '$time', '$status', '$code', '$ps') ");
			$lid = $db->LastInsert();
			
			echo "<center><b>Заявка отправлена!</b></center>";

header("Location: /account/pay");
			
	}else echo "<center><b>Код имеет неверное значение!</b></center>";

}

?>

<BR />

<div class="col-md-3 col-sm-3 col-xs-12">
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
<div class="call-action call-action-boxed call-action-style2 clearfix">
<form  action="" method="POST">
</br>
Платежная система:
<br />
<select class="form-control" name="ps">
<option value="0"> - выберите платежную систему</option>
<option value="1">Qiwi Кошелек</option>
<option value="2">Payeer</option>
</select>
Сумма:
</br>
<input class="form-control" type="text" name="summa">
Код транзакции:
</br>
<input class="form-control" type="text" name="code">

<div class="col-md-3 col-sm-3 col-xs-12">
</div>

</br>

<button class="btn btn-md btn-default" type="submit">Пополнить</button>
</div>
</form>
</div>

<table class="table table-striped">
<thead>
  <tr>
<th>Сумма</th>
<th>Код транзакции</th>
<th>Дата</th>
<th>Статус</th>
 </tr>
  </thead>
  <tbody>
    <tr>	
<?
$db->Query("SELECT * FROM db_pay WHERE user_id = '$user_id' ORDER BY id DESC");
while($pay = $db->FetchArray() ) {
$code = $pay['code'];
$ps = $pay['ps'];
$summa = $pay['summa'];
$date = $pay['date'];
$status = $pay['status'];
?>
<tr>
<td>
<?
if($summa == 0) { echo "-//-"; } else { echo $summa; } 
?>
</td>
<td><?php echo $code; ?></td>
<td><?php echo date('d-m-Y', $date); ?></td>

<?php
if($status == 0){ echo '<td><i class="fa fa-clock-o"></i></td>'; }
if($status == 1){ echo '<td><i class="fa fa-check"></i></td>'; }
if($status == 2){ echo '<td><i class="fa fa-dates"></i></td>'; }

?>
</td>
</tr>
<?php } ?>
</table>

</div>
</div>