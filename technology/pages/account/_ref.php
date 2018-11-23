<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$balance = $db->FetchArray();
?>

<div class="container">
<div class="page-content">


<?
include("inc/_user_menu.php");
?>

<h2>Партнерская программа:</h2>

<br />

<center>
<div class="alert alert-info" role="alert">
<p><i class="fa fa-info-circle"></i> Система очень простая: вы получаете 15% от каждой инвестиции вашего реферала, приведенного вами по уникальной ссылке, которую выполучаете после регистрации. Пользователь пришедший по вашей уникальной ссылке и создавший себе аккаунт, автоматически закрепляется за вами.</p> 
</div>
</center>

<br />

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="alert alert-success" role="alert">
Ваша реферальная ссылка: 
<input class="form-control" type="text"  value="http://<?=$_SERVER['HTTP_HOST']; ?>/?i=<?=$_SESSION["user_id"]; ?>" disabled>
</div>
</div>

<br />

<div class="col-md-12 col-sm-12 col-xs-12">
<h2>Рефералы:</h2>

<table class="table table-striped">
<thead>
  <tr>
<th>Пользователь</th>
<th>Дата регистрации</th>
<th>Доход от партнера</th>
 </tr>
  </thead>
  <tbody>
    <tr>
	
	
<?PHP
  $all_money = 0;
  $db->Query("SELECT db_users.login, db_users.date_reg, db_users_ref.to_referer FROM db_users, db_users_ref 
  WHERE db_users.id = db_users_ref.id AND db_users.referer_id = '$user_id' ORDER BY to_referer DESC");
  
	if($db->NumRows() > 0){
  
  		while($ref = $db->FetchArray()){
		
		?>

	
<td><i class="fa fa-user"></i> <?=$ref["login"]; ?></td>
<td><?=date("d.m.Y в H:i:s",$ref["date_reg"]); ?></td>
<td><?=$ref["to_referer"]; ?> Руб.</td>	
</tr>

<?PHP
		$all_money += $ref["to_referer"];
		}
		
		}else echo '<center><b>У вас нет рефералов.</b><center>'
  ?>
  
</tbody>
</table>

</div>

</div>
</div>