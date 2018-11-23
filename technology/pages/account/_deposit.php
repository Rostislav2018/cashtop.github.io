<?PHP

$user_id = $_SESSION["user_id"];

$db->Query("SELECT * FROM db_users_ref WHERE id = '$user_id'");

$balance = $db->FetchArray();
?> 

<div class="container">
<div class="page-content">

<?
include("inc/_user_menu.php");
?>

<h2>Вложить:</h2>

<br />

<center>
<div class="alert alert-info" role="alert">
<p><i class="fa fa-info-circle"></i> Для того, чтобы сделать вклад, Вам требуется выбрать тариф.</p> 
</div>
</center>

<?PHP

if ( isset($_POST['ps']) ) {

	$ps = intval($_POST['ps']);

	$summa = $_POST['summa'];

	if ($ps == 1) {

			$sum_tarif = $tarif1;

			$time_tarif = $srok1;

			$perc_tarif = $perc_tarif1;

			$count = $srok1;

			$sutki = $srok1;

			$percent = $perc_tarif1 / $sutki;

		} 
		
		if ($ps == 2) {

			$sum_tarif = $tarif2;

			$time_tarif = $srok2;

			$perc_tarif = $perc_tarif2;

			$count = $srok2;

			$sutki = $srok2;

			$percent = $perc_tarif2 / $sutki;

		}
		
		if ($ps == 3) {

			$sum_tarif = $tarif3;

			$time_tarif = $srok3;

			$perc_tarif = $perc_tarif3;

			$count = $srok3;

			$sutki = $srok3;

			$percent = $perc_tarif3 / $sutki;

		}
		
		if ($ps == 4) {

			$sum_tarif = $tarif4;

			$time_tarif = $srok4;

			$perc_tarif = $perc_tarif4;

			$count = $srok4;

			$sutki = $srok4;

			$percent = $perc_tarif4 / $sutki;

		}

		

		if($ps < 1 or $ps > 4) {

			echo '<center><b>Выберите тариф!</b></center>';

		} elseif ($summa < $sum_tarif) {

			echo '<center><b>Минимальная сумма для вклада '.$sum_tarif.'</b></center>';		

		} elseif ($balance['money'] < $summa) {

			echo "<center><b>Недостаточно средств на балансе!</b></center>";

		} elseif ($summa > 15000) {

			echo "<center><b>Максимальная сумма для вклада 15000 Руб.</b></center>";

		} else { 

			$db->Query("INSERT INTO db_deposit (user_id, login, date_start, date_end, summa, percent, count_full) 

			VALUES ('$user_id', '$login', '$time', '$last_time', '$summa', '$percent', '$count') ");

			$db->Query("UPDATE db_users_ref SET money = money - '$summa' WHERE id = '$user_id' LIMIT 1");

			$money_referer = $summa / 100 * $ref_percent;
				 
            $db->Query("SELECT login, referer_id FROM db_users WHERE id = '$user_id' LIMIT 1");
			$referer = $db->FetchArray();
            $referer_login = $referer["login"];
            $referer_id = $referer["referer_id"];
			
			$db->Query("UPDATE db_users_ref SET to_referer = to_referer + '$money_referer' WHERE id = '$user_id' LIMIT 1");
			
            $db->Query("UPDATE db_users_ref SET from_referals = from_referals + '$money_referer' WHERE id = '$referer_id'");
            
			$db->Query("UPDATE db_users_ref SET money = money + '$money_referer' WHERE id = '$referer_id'");
			
			echo "<center><b>Вклад успешно создан!</b></center>";

header("Location: /account/deposit");	

		}









}


if ($start_site == 1) {

?>

<BR />

<div class="col-md-3 col-sm-3 col-xs-12">
</div>

<div class="col-md-6 col-sm-6 col-xs-12">

<div class="call-action call-action-boxed call-action-style2 clearfix">
<form id="deposit" method="POST">
Тарифы:
<br />
<select class="form-control" name="ps">
<option value="0"> - выберите тариф</option>
<option value="1">Basic - <?=$perc_tarif1; ?>% на 24 часа, минимальный вклад <?=$tarif1; ?> Руб.</option>
<option value="2">Standerd - <?=$perc_tarif2; ?>% на 24 часа, минимальный вклад <?=$tarif2; ?> Руб.</option>
<option value="3">Premium - <?=$perc_tarif3; ?>% на 24 часа, минимальный вклад <?=$tarif3; ?> Руб.</option>
<option value="4">SAMARITAN - <?=$perc_tarif4; ?>% на 24 часа, минимальный вклад <?=$tarif4; ?> Руб.</option>
</select>
<br />
Сумма:
<br />
<input class="form-control" type="text" name="summa">

<br />

<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('deposit')){ submit(); }">Вложить</a>
</form>

<?

} else {

?>

Вклады будут доступны после старта проекта!

<?

}

?>

</div>
</div>

<div class="col-md-2 col-sm-2 col-xs-12">
</div>

</div>
</div>