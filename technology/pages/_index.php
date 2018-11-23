<?
$db->Query("SELECT * FROM db_reviews ORDER BY id DESC LIMIT 1");
$reviews = $db->FetchArray();
?>

<?
$db->Query("SELECT * FROM db_stats WHERE id = 1");
$stats = $db->FetchArray();
?>

<center />

<!-- INTRO BEGIN -->
	<header class="" >
		<div class="container">
			<div class="row">
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
				<div class="col-md-12">
					<h1 style="color:#DCDCDC">Nano - Tehnology</h1>
					<a class="download-btn ios-btn" href="signup">
						<div class="btn-slide"></div>
						<div class="btn-content"><i class="icon icon-check"></i>Принять участие в проекте<b>Зарегистрироваться</b></div>
					</a>
				</div>
			<br>
			</div>
		</div>
		</div>
	</header>
	<!-- VideoBG -->
<video autoplay loop poster="images/1.jpg" id="video-on-bg">
    <source src="video/123.mp4" type="video/mp4">
</video>
<!--[if lt IE 9]>
<script>
    document.createElement('video');
</script>
<![endif]-->
<style type="text/css">
    video { display: block; }
    video#video-on-bg {
        background:url('      ') no-repeat center center fixed;
        -webkit-background-size: cover;
           -moz-background-size: cover;
            -ms-background-size: cover;
             -o-background-size: cover;
                background-size: cover;
        width: auto;
        height: auto !important;
        min-width:100%;
        min-height:100%;
        position:fixed;
        left: 0; /* прикрепить видео к левому краю или правому? (right:0;) */
        bottom: 0; /* прикрепить видео к нижнему краю или верхнему (top:0;) */
        z-index: -998;
    }
</style>
<!-- / VideoBG -->
	<!-- INTRO END -->
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br>
	<!-- FEATURES BEGIN -->
	<section id="about" class="img-block-3col">
		<div class="container">
			<div class="title">
				<h2>Почему  именно мы?</h2>
				<p>Это высокодходный инструмент, позволящий каждому человеку увеличить свой капитал в разумные сроки. Вам нужно лишь выбрать инвестиционный портфель. После этого вы будете получать до ...% чистой прибыли в сутки до тех пор, пока не решите вывести свой депозит.</p>
			</div>
			<div class="row">
				<div class="col-sm-4">
					<ul class="item-list-right item-list-big">
						<li class="wow fadeInLeft">
							<i class="icon icon-screen-desktop"></i>
							<p>Яркий интуитивно понятный интерфейс поможет вам быстрее заинтересовать партнера принять участие в проекте!</p>
						</li>
						<li class="wow fadeInLeft">
							<i class="icon icon-drop"></i>
							<h3></h3>
							<p>Мы постоянно проводим промоакции для посетителей нашего сайта!</p>
						</li>
						<li class="wow fadeInLeft">
							<i class="icon icon-clock"></i>
							<p>Ваш реферальный доход мы выплатим максимально быстро не создавая не оправданных, долгих и нудных задержек.</p>
						</li>
					</ul>
				</div>
				<div class="col-sm-4 col-sm-push-4">
					<ul class="item-list-left item-list-big">
						<li class="wow fadeInRight">
							<i class="icon icon-support"></i>
							<p>Адекватная служба поддержки ответит вам в течении 2 часов и подробно проконсультирует по всем вопросам!</p>
						</li>
						<li class="wow fadeInRight">
							<i class="icon icon-layers"></i>
							<p>В личном кабинете вам будут доступны баннеры и рекламные тексты для приглашений!<p>
						</li>
						<li class="wow fadeInRight">
							<i class="icon icon-credit-card"></i>
							<p>Мы выплачиваем реально высокие проценты от вклада вашего партнера.</p>
						</li>
					</ul>
				</div>
				<div class="col-sm-4 col-sm-pull-4">
					<div class="animation-box wow bounceIn">
					 	<img class="highlight-left wow" src="/images/light.png" height="192" width="48" alt="" />
						<img class="highlight-right wow" src="/images/light.png" height="192" width="48" alt="" />
						<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

<!-- VK Widget -->
<div id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 0, width: "300", height: "400", color1: 'FFFFFF', color2: '2B587A', color3: '5B7FA6'}, 43493607);
</script>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- FEATURES END -->

	<!-- PRICING TABLE BEGIN -->
	<section class="bg-color-grad">
		<div class="container">
			<div class="title">
				<center><h2>НАШИ ТАРИФНЫЕ ПЛАНЫ</h2>
				<p>Минимальная сумма вклада - 100 рублей. Максимальная сумма вклада - 100 000 рублей.</p>
				<ul class="pricing-table">
					<li class="wow flipInY">
						<h3>Standard</h3>
						<span> 50% <small>72 часа</small> </span>
						<ul class="benefits-list">
						<div class="stamp"><i class="icon icon-trophy"></i>Best choice</div>
							<li>Мин. вклад - 100 </li>
							<li>Макс. вклад - 999</li>
						</ul>
						<a href="signup" class="buy"> <i class="icon icon-check" ></i></a>
					</li>
					<li class="silver wow flipInY" data-wow-delay="0.2s">
						<h3>Sliver</h3>
						<span> 100% <small>96 часа</small> </span>
						<ul class="benefits-list">
							<li>Мин. вклад - 1000 </li>
							<li>Макс. вклад - 4999</li>
						</ul>
						<a href="signup" class="buy"> <i class="icon icon-check" ></i></a>
					</li>
					<li class="gold wow flipInY" data-wow-delay="0.4s">
						<h3>Gold</h3>
						<span> 150% <small>120 часа</small> </span>
						<ul class="benefits-list">
							<li>Мин. вклад - 5000 </li>
							<li>Макс. вклад - 100 000</li>
						</ul>
						<a href="signup" class="buy"> <i class="icon icon-check" ></i></a>
					</li>
					<li class="platinum wow flipInY" data-wow-delay="0.6s">
						<h3>Free</h3>
						<span> 0% <small>24 часа</small> </span>
						<ul class="benefits-list">
							<li>Благотворительный тариф</li>
						</ul>
						<a href="signup" class="buy"> <i class="icon icon-check" ></i></a>
					</li>
				</ul>
			</div>
		</div>
	</section>
	<!-- PRICING TABLE END -->

		<!-- SOCIAL BEGIN -->
	<section class="bg-color2">
		<div class="container-fluid">
			<div class="title">
				<center><h2>До старта проекта осталось</h2>
			</div>
			<script src="http://megatimer.ru/s/a489a643e80ef33a7b346f10eb74b353.js"></script>
			<ul class="soc-list wow flipInX">
			</ul>

		</div>
	</section>
	<!-- SOCIAL END -->