    <!-- INTRO BEGIN -->
	<header id="blog-intro" class="intro-block bg-color3" >
		<div class="container">
			<h1 class="slogan">Отзывы</h1>
		</div>
		<div class="block-bg" data-stellar-ratio="0.5"></div>
	</header>
	<!-- INTRO END --> 
		
	<section id="blog">

<div class="container">

<?PHP

if(isset($_POST['text'])) {
$text = $db->RealEscape($_POST['text']);

if(isset($_SESSION['login'])) {
if(!empty($text)) {
$login = $_SESSION['login'];
$date = time();
$db->Query("INSERT INTO db_reviews (name, date, text, status) VALUES ('$login', '$date', '$text', 0)");
echo '<center>Ваш отзыв успешно добавлен и появится после проверки модератором на наличие соблюдения правил!</center>';
header("Refresh: 2, /reviews");
}else echo '<center>Введите текст отзыва!</center>';
}else echo '<center>Для добавления отзыва необходимо авторизоваться!</center>';
}
?>
	
<?
	
$db->Query("SELECT * FROM db_reviews WHERE status = 1 ORDER BY id DESC");

if($db->NumRows() > 0){

	while($reviews = $db->FetchArray()){
	
	?>
	
	
	<blockquote><?=$reviews["text"]; ?> <small><?=$reviews["name"]; ?></small> </blockquote>
					
					<br />

	<?PHP
	
	}

}else echo "<center>Отзывов нет.</center>";
?>

<br />

<?if(!isset($_SESSION['login'])):?>

<center>Для добавления отзыва необходимо авторизоваться!</center>

<?endif?>

<?
if (isset($_SESSION['login'])) {
 ?>
 
<div class="content-area col-md-3">
</div>
 
<div class="content-area col-md-6">
 
<center>
<div class="alert alert-success" role="alert"
<p><i class="fa fa-info-circle"></i> Перед публикацией все отзывы проходят модерацию.</p>
</div>
</center>

<br />

<h3>Оставить отзыв:</h3>
<form method="post" action="" id="reviews">
<br />
<textarea class="form-control"name="text" required rows="5"></textarea>

<br />

<a class="btn btn-danger btn-lg" href="javascript:with(document.getElementById('reviews')){ submit(); }">Отправить</a>
</form>

</div>

<div class="content-area col-md-3">
</div>

<? } ?>

</div>

</section>