 <!-- INTRO BEGIN -->
	<header id="blog-intro" class="intro-block bg-color3" >
		<div class="container">
			<h1 class="slogan">Админ Центр</h1>
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
if(isset($_SESSION["admin"])){ Header("Location: /admin"); return; }

if(isset($_POST["adminlogin"])){

	$db->Query("SELECT * FROM db_admin WHERE id = 1 LIMIT 1");
	$data_log = $db->FetchArray();
	
	if(strtolower($_POST["adminlogin"]) == strtolower($data_log["login"]) AND strtolower($_POST["adminpassword"]) == strtolower($data_log["password"]) ){
	
		$_SESSION["admin"] = true;
		Header("Location: /admin");
		return;
	}else echo "<center><b>Неверно введен логин и/или пароль</b></center><BR />";
	
}

?>
				
											<form action="" id="" method="post">
										    <br>
											<input type="text" name="adminlogin" value="" class="form-control input-lg">
                                            <br>
											<input type="password" name="adminpassword" value="" class="form-control input-lg">
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