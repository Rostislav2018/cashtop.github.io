    <!-- INTRO BEGIN -->
	<header id="blog-intro" class="intro-block bg-color3" >
		<div class="container">
			<h1 class="slogan">Новости</h1>
		</div>
		<div class="block-bg" data-stellar-ratio="0.5"></div>
	</header>
	<!-- INTRO END --> 
		
	<section id="blog">

<div class="container">

<?PHP

$db->Query("SELECT * FROM db_news ORDER BY id DESC");

if($db->NumRows() > 0){

	while($news = $db->FetchArray()){
	
	?>
							
        <div class="blog">
                    <div class="blog-item">
                        <div class="blog-content">
						
						    <h2><a href="#"><?=$news["title"]; ?></a></h2>
                            <p><?=$news["text"]; ?></p>
                        </div>
                    </div><!--/.blog-item-->
                </div>
									
	<?PHP
	
	}

}else echo "<center>Новостей нет.</center>";

?>

</div>

    </section>