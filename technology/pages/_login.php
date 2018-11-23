 <!-- INTRO BEGIN -->
	<header id="blog-intro" class="intro-block bg-color3" >
		<div class="container">
			<h1 class="slogan">Авторизация</h1>
		</div>
		<div class="block-bg" data-stellar-ratio="0.5"></div>
	</header>
	<!-- INTRO END --> 
		
		<section class="bg-color2">
		
			<div class="container">

<div class="col-md-3">
</div>

                    <div class="col-md-6">
											
<?PHP

	if(isset($_POST["email"])){
	
	$lmail = $func->IsMail($_POST["email"]);
	
		if($lmail !== false){
		
			$db->Query("SELECT id, login, password, referer_id, banned FROM db_users WHERE email = '$lmail'");
			if($db->NumRows() == 1){
			
			$log_data = $db->FetchArray();
			
				if(strtolower($log_data["password"]) == strtolower($_POST["password"])){
				
					if($log_data["banned"] == 0){
						
						# Считаем рефералов
						$db->Query("SELECT COUNT(*) FROM db_users WHERE referer_id = '".$log_data["id"]."'");
						$refs = $db->FetchRow();
						
						$db->Query("UPDATE db_users SET referals = '$refs', date_login = '".time()."', ip = INET_ATON('".$func->UserIP."') WHERE id = '".$log_data["id"]."'");
						
						$_SESSION["user_id"] = $log_data["id"];
						$_SESSION["login"] = $log_data["login"];
						$_SESSION["referer_id"] = $log_data["referer_id"];
						Header("Location: /account");
						
					}else echo "<center><b>Аккаунт заблокирован.</b></center><BR />";
				
				}else echo "<center><b>E-Mail и/или Пароль указан неверно.</b></center><BR />";
			
			}else echo "<center><b>Указанный E-Mail не зарегистрирован в системе.</b></center><BR />";
			
		}else echo "<center><b>E-Mail указан неверно.</b></center><BR />";
	
	}

?>

											<form action="" id="" method="post">
										    <br>
											<input type="text" name="email" value="" class="form-control input-lg">
                                            <br>
											<input type="password" name="password" value="" class="form-control input-lg">
											<br>
											<input type="checkbox" id="rememberme" name="rememberme"> Запомнить меня?
											<br>
											<input type="submit" value="Авторизироваться" class="round-btn pull-right push-bottom" data-loading-text="Загрузка...">	
											</form>
										</div>
									</div>
							
<div class="col-md-3">
</div>

</div>