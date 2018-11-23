<?PHP
$usid = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$usid'");
$user_data = $db->FetchArray();
?>

<div class="container">
<div class="page-content">

<?
include("inc/_user_menu.php");
?>

<h2>Настройки:</h2>

<br />

<center>
<div class="alert alert-info" role="alert">
<p><i class="fa fa-info-circle"></i> Всегда держите свои данные актуальными. Неправильные или неполные данные могут негативно повлиять на обработку ваших вкладов.</p>
</div>
</center>

<br />

<div class="col-md-2 col-sm-2 col-xs-12">
</div>

<div class="col-md-6 col-sm-6 col-xs-12">

<?PHP
	if(isset($_POST["old"])){
	
		$old = $func->IsPassword($_POST["old"]);
		$oldd = $func->md5Password($old);
		$new = $func->IsPassword($_POST["new"]);
		$password = $func->md5Password($new);
		
			if($old !== false AND strtolower($oldd) == strtolower($user_data["password"])){
			
				if($new !== false){
				
					if( strtolower($new) == strtolower($_POST["re_new"])){
					
						$db->Query("UPDATE db_users SET password = '$password' WHERE id = '$usid'");
						
						echo "<center><b>Новый пароль успешно установлен.</b></center><BR />";
					
					}else echo "<center><b>Пароль и повтор пароля не совпадают.</b></center><BR />";
				
				}else echo "<center><b>Новый пароль имеет неверный формат.</b></center><BR />";
			
			}else echo "<center><b>Старый паполь заполнен неверно.</b></center><BR />";
		
	}
?>

<h4>Профиль:</h4>

<br />

<form id="new" method="POST">

Qiwi Кошелек:
<br />
<input class="form-control" type="text" value="<?=$prof_data['qiwi']; ?>" name="new_qiwi" />
								
								<?PHP
	if(isset($_POST["new_qiwi"])){
	
		$new_qiwi = ($_POST["new_qiwi"]);
		$qiwi = ($new_qiwi);

						$db->Query("UPDATE db_users SET qiwi = '$qiwi' WHERE id = '$usid'");
						
	}
?>

<br />

<form id="new" method="POST">

Perfect Money:
<br />
<input class="form-control" type="text" value="<?=$prof_data['pm']; ?>" name="new_pm" />
								
								<?PHP
	if(isset($_POST["new_pm"])){
	
		$new_pm = ($_POST["new_pm"]);
		$pm = ($new_pm);

						$db->Query("UPDATE db_users SET pm = '$p' WHERE id = '$usid'");
						
	}
?>


<?PHP
	if(isset($_POST["new_vk"])){
	
		$new_vk = ($_POST["new_vk"]);
		$vk = ($new_vk);

						$db->Query("UPDATE db_users SET vk = '$vk' WHERE id = '$usid'");
						
	}
?>

<br />
В Контакте:
<br />
<input class="form-control" type="text" value="<?=$prof_data['vk']; ?>" name="new_vk" />

<?PHP
	if(isset($_POST["new_firstname"])){
	
		$new_firstname = ($_POST["new_firstname"]);
		$firstname = ($new_firstname);

						$db->Query("UPDATE db_users SET firstname = '$firstname' WHERE id = '$usid'");

	}
?>

<br />
Имя:
<br />
<input class="form-control" type="text" value="<?=$prof_data['firstname']; ?>" name="new_firstname" />

<?PHP
	if(isset($_POST["new_lastname"])){
	
		$new_lastname = ($_POST["new_lastname"]);
		$lastname = ($new_lastname);

						$db->Query("UPDATE db_users SET lastname = '$lastname' WHERE id = '$usid'");

	}
?>

<br />
Фамилия:
<br />
<input class="form-control" type="text" value="<?=$prof_data['lastname']; ?>" name="new_lastname" />

<br />
E-Mail:
<br />
<input class="form-control" type="text"  value="<?=$prof_data['email']; ?>" disabled>

<?PHP
	if(isset($_POST["new_tel"])){
	
		$new_tel = ($_POST["new_tel"]);
		$tel = ($new_tel);

						$db->Query("UPDATE db_users SET tel = '$tel' WHERE id = '$usid'");

	}

?>

<br />
Телефон:
<br />
<input class="form-control" type="text" value="<?=$prof_data['tel']; ?>" name="new_tel" />

<br />
<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('new')){ submit(); }">Сохранить</a>

</form>

<br />

<h4>Сменить пароль:</h4>

<br />

<form id="newpassword" method="POST">
Старый пароль:
<br />
<input class="form-control" type="password" name="old" />
<br />
Новый пароль:
<br />
<input class="form-control" type="password" name="new" />
<br />
Повтор пароля:
<br />
<input class="form-control" type="password" name="re_new" />

<br />

<a class="btn btn-md btn-default" href="javascript:with(document.getElementById('newpassword')){ submit(); }">Сохранить</a>
</form>

</div>

<div class="col-md-2 col-sm-2 col-xs-12">
</div>

</div>
</div>