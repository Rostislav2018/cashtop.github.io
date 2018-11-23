<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$user_info = $db->FetchArray();
?>

<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users_ref WHERE id = '$user_id'");
$users_ref_info = $db->FetchArray();
?>
<div class="container">
<div class="page-content"> 

<?
include("inc/_user_menu.php");
?>

<br />

<h2>Аккаунт:</h2>

<br />

<center>
<div class="alert alert-info" role="alert">
<p>Добро пожаловать, <?=$user_info["login"]; ?>! Ваш IP - <?php echo $_SERVER['REMOTE_ADDR']; ?></p>
</div>
</center>

						<div class="col-md-2">
							<div class="basic pricing">
								<header>
									<h3>ID</h3>
									<p class="cost"><?=$user_info["id"]; ?></p>
                                <br />
								</header>
							</div><!-- end basic -->
						</div><!-- end col -->

                                              <div class="col-md-2">
							<div class="basic pricing">
								<header>
									<h3>Баланс для вывода</h3>
									<p class="cost"><?=$users_ref_info["money_ban"]; ?></p>
                                <br />
								</header>
							</div><!-- end basic -->
						</div><!-- end col -->

						<div class="col-md-2">
							<div class="basic pricing">
								<header>
									<h3>Баланс для вкладов</h3>
									<p class="cost">{!BALANCE!} Руб.</p>
                                <br />
								</header>
							</div><!-- end basic -->
						</div><!-- end col -->
						
						<div class="col-md-2">
							<div class="basic pricing">
								<header>
									<h3>Спонсор</h3>
									<p class="cost"><?=$user_info["referer"]; ?></p>
                                <br />
								</header>
							</div><!-- end basic -->
						</div><!-- end col -->
						
						<div class="col-md-2">
							<div class="basic pricing">
								<header>
									<h3>Реферальные</h3>
									<p class="cost">{!FROM_REFERALS!} Руб.</p>
                                <br />
								</header>
							</div><!-- end basic -->
						</div><!-- end col -->

					</div><!-- end content-area -->

				</div><!-- end row -->
			</div>

</div>
</div>