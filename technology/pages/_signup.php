<?PHP

if(isset($_SESSION["user_id"])){ Header("Location: /account"); return; }
?>

<!-- INTRO BEGIN -->
	<header id="blog-intro" class="intro-block bg-color3" >
		<div class="container">
			<h1 class="slogan">Регистрация</h1>
		</div>
		<div class="block-bg" data-stellar-ratio="0.5"></div>
	</header>
	<!-- INTRO END --> 
		
		<section class="bg-color2">
		
			<div class="container">

<div class="col-md-3">
</div>                               

<div class="col-md-6">

<br />

<?PHP
	
	# Регистрация

	if(isset($_POST["login"])){
	


	$login = $func->IsLogin($_POST["login"]);
	$password = $func->IsPassword($_POST["password"]);
	$rules = isset($_POST["rules"]) ? true : false;
	$time = time();
	$ip = $func->UserIP;
	
	$email = $func->IsMail($_POST["email"]);
	$referer_id = (isset($_COOKIE["i"]) AND intval($_COOKIE["i"]) > 0 AND intval($_COOKIE["i"]) < 1000000) ? intval($_COOKIE["i"]) : 1;
	$referer_name = "";
	if($referer_id != 1){
		$db->Query("SELECT login FROM db_users WHERE id = '$referer_id' LIMIT 1");
		if($db->NumRows() > 0){$referer_name = $db->FetchRow();}
		else{ $referer_id = 1; $referer_name = "demo"; }
	}else{ $referer_id = 1; $referer_name = "demo"; }
	
		if($rules){

			if($email !== false){
		
			if($login !== false){
			
				if($password !== false){
			
					if($password == $_POST["repassword"]){
						
						$db->Query("SELECT COUNT(*) FROM db_users WHERE login = '$login'");
						if($db->FetchRow() == 0){
						
						# Регаем пользователя
						$db->Query("INSERT INTO db_users (login, email, password, referer, referer_id, date_reg, ip) 
						VALUES ('$login','{$email}','$password','$referer_name','$referer_id','$time',INET_ATON('$ip'))");
						
						$lid = $db->LastInsert();
						
						$db->Query("INSERT INTO db_users_ref (id, login) VALUES ('$lid','$login')");
						
						# Вставляем статистику
						$db->Query("UPDATE db_stats SET all_users = all_users +1 WHERE id = '1'");
						
						echo "<center><b>Вы успешно зарегистрировались. Используйте форму для входа в аккаунт.</b></center><BR />";
						?>
						
						<?PHP
						return;
						}else echo "<center><b>Указанный логин уже используется.</b></center><BR />";
						
					}else echo "<center><b>Пароль и повтор пароля не совпадают.</b></center><BR />";
			
				}else echo "<center><b>Пароль заполнен неверно.</b></center><BR />";
			
			}else echo "<center><b>Логин заполнен неверно.</b></center><BR />";

		}else echo "<center><b>Email имеет неверный формат.</b></center>";

		}else echo "<center><b>Вы не подтвердили правила.</b></center><BR />";
	
	
	}
	
	
?>
		
                                            <form action="" id="" method="post">
													
													
											<input class="form-control" type="text" name="login" id="login" placeholder="Введите Ваш псевдоним">
											<br />		
                                            <input class="form-control" type="text" name="email" placeholder="Введите Ваш  E-Mail">
											<br />
											<input class="form-control" type="password" name="password" placeholder="Пароль">
											<br />
											<input class="form-control" type="password" name="repassword" placeholder="Пароль">
											<br />
											С <a href="/rules" target="_blank">правилами</a> проекта ознакомлен(а) и принимаю: <input name="rules" type="checkbox" />
											<br />
											<input type="submit" value="Зарегистрироваться" class="round-btn pull-right push-bottom" data-loading-text="Загрузка...">
											
											</form>	
</div>
					
<div class="col-md-3">
</div>

</div>

</section>