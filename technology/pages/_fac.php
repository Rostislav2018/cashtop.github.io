    <!-- INTRO BEGIN -->
	<header id="blog-intro" class="intro-block bg-color3" >
		<div class="container">
			<h1 class="slogan">F.A.Q.</h1>
		</div>
		<div class="block-bg" data-stellar-ratio="0.5"></div>
	</header>
	<!-- INTRO END --> 
		
	<section id="blog">
	
	<?PHP

$db->Query("SELECT * FROM db_fac ORDER BY id DESC");

if($db->NumRows() > 0){

	while($fac = $db->FetchArray()){
		
	?>	
	
	<div class="container">
			<div class="row">
				<div id="shortcodes" class="col-md-12 single-content">
	
	<div class="panel"> <a class="panel-heading" data-toggle="collapse" href="#<?=$fac["id"]; ?>"><?=$fac["title"]; ?></a>
					<div id="<?=$fac["id"]; ?>" class="panel-collapse collapse">
						<div class="panel-body"><?=$fac["text"]; ?></div>
					</div>
				</div>
					
	</div>
	        </div>
			    </div>
					
					<br />
					
	<?PHP
	
	}

}else echo "<center>Вопросов нет.</center>";

?>

   </section>