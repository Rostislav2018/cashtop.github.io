<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$prof_data = $db->FetchArray();
?>

<?PHP
$user_id = $_SESSION["user_id"];
$db->Query("SELECT * FROM db_users WHERE id = '$user_id'");
$user_info = $db->FetchArray();
?>

<!DOCTYPE html>

<html lang="en">
<head>

<!-- Html Page Specific -->
<meta charset="utf-8">
<title>...</title>
<meta name="description" content="...">
<meta name="author" content="...">

<!-- Mobile Specific -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">

<!--[if lt IE 9]>
    <script type="text/javascript" src="scripts/html5shiv.js"></script>
<![endif]-->

<!-- CSS -->
<link rel="stylesheet" href="/css/bootstrap.min.css"/>
<link rel="stylesheet" href="/css/animate.css"/>
<link rel="stylesheet" href="/css/simple-line-icons.css"/>
<link rel="stylesheet" href="/css/icomoon-soc-icons.css"/>
<link rel="stylesheet" href="/css/magnific-popup.css"/>
<link rel="stylesheet" href="/css/style.css"/>
<link rel="stylesheet" href="/css/style-red.css"/>

<!-- Favicons -->
<link rel="icon" href="/images/favicon.png">
<link rel="apple-touch-icon" href="/images/apple-touch-icon.png">
<link rel="apple-touch-icon" sizes="72x72" href="/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="/images/apple-touch-icon-114x114.png">
</head>

<body data-spy="scroll" data-target=".navMenuCollapse">

<!-- PRELOADER -->
<div id="preloader">
	<div class="battery inner">
		<div class="load-line"></div>
	</div>
</div>

<div id="wrap"> 

	<!-- NAVIGATION BEGIN -->
	<nav class="navbar navbar-fixed-top navbar-slide">
			<div class="container_fluid"> 
				<a class="navbar-brand goto" href="/"> <img src="./images/logo_nav.png" alt="..." height="27" width="56" /> </a>
				<a class="contact-btn icon-envelope" data-toggle="modal" data-target="#modalContact"></a>
				<button class="navbar-toggle menu-collapse-btn collapsed" data-toggle="collapse" data-target=".navMenuCollapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<div class="collapse navbar-collapse navMenuCollapse">
					<ul class="nav">
						<li><a href="/"><i class="icon icon-home"></i></a></li>
						<li><a href="#about">О Компании</a></li>
						<li><a href="/news">Новости</a></li>
						<li><a href="/fac">F.A.Q.</a></li>
						<li><a href="/reviews">Отзывы</a></li>
						<li><a href="/rules">Правила</a></li>
<?if(!isset($_SESSION['login'])):?>						
                        <li><a href="/login">Авторизироваться</a></li>
                        <li><a class="btn btn-cta btn-cta-secondary" href="/signup">Зарегистрироваться</a></li>
								<?endif?>
							<? if (isset($_SESSION['login'])) {
?>
                        <li><a class="btn-slide animation animated-item-2" href="/account">Аккаунт</a></li>
						<li><a class="btn-slide animation animated-item-3" href="/account/exit">Выйти</a></li>
								<? } ?>
					</ul>
				</div>
			</div>
	</nav>
	<!-- NAVIGAION END -->