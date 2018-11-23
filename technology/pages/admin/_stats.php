<?
include("inc/_admin_menu.php");
?>

<div class="container">
<div class="page-content"> 

<div class="content-area col-md-3">
</div>

 <?    

 if(isset($_POST['all_users'])) {

   $all_users = floatval($_POST['all_users']);

   $all_inserts = floatval($_POST['all_inserts']);

   $all_payments = floatval($_POST['all_payments']);

   

   $db->Query("UPDATE db_stats SET all_users = '$all_users', all_inserts = '$all_inserts', all_payments = '$all_payments' WHERE id = 1"); 

   echo '<center><b>Статистика обновлена.</b></center>';

 }

 

 

   $db->Query("SELECT * FROM db_stats WHERE id = 1"); 

   $stats = $db->FetchArray();

 ?>

<div class="content-area col-md-6">
 
<form method="post" action="" id="save">

Пополнено:
<br />
<input class="form-control" type="text" name="all_payments" value="<?php echo $stats['all_payments']; ?>">
<br />
Выведено:
<br />
<input class="form-control" type="text" name="all_inserts" value="<?php echo $stats['all_inserts']; ?>">
<br />
Участников:
<br />
<input class="form-control" type="text" name="all_users" value="<?php echo $stats['all_users']; ?>">
<br />
Баланс:
<br />
<input class="form-control" type="text" value="{!ALL_BALANCE!} Руб." disabled>

<br />

<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('save')){ submit(); }">Сохранить</i></a>

</form>
</div>

<div class="content-area col-md-3">
</div>

</div>
</div>

<br />

<div class="container">
<div class="page-content"> 

<div class="content-area col-md-3">
</div>

 <?    

 if(isset($_POST['qiwi'])) {

   $qiwi = floatval($_POST['qiwi']);

   $pm = floatval($_POST['pm']);

   

   $db->Query("UPDATE db_admin SET qiwi = '$qiwi', pm = '$pm' WHERE id = 1"); 

   echo '<center><b>Кошельки обновлены.</b></center>';

 }

 

 

   $db->Query("SELECT * FROM db_admin WHERE id = 1"); 

   $ps = $db->FetchArray();

 ?>
 
<div class="content-area col-md-6">
 
<form method="post" action="" id="save2">

Qiwi Кошелек:
<br />
<input class="form-control" type="text" name="qiwi" value="<?php echo $ps['qiwi']; ?>">
<br />
Perfect Money:
<br />
<input class="form-control" type="text" name="pm" value="<?php echo $ps['pm']; ?>">

<br />

<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('save2')){ submit(); }">Сохранить</i></a>

</form>
</div>

<div class="content-area col-md-3">
</div>

</div>
</div>