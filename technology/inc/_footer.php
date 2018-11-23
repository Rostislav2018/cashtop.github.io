<?
$db->Query("SELECT * FROM db_reviews ORDER BY id DESC LIMIT 1");
$reviews = $db->FetchArray();
?>

<?
$db->Query("SELECT * FROM db_stats WHERE id = 1");
$stats = $db->FetchArray();
?>

<center />

				<!-- FACTS BEGIN -->
	<section>
		<div class="container">
			<ul class="facts-list">
				<li class="wow bounceIn">
					<i class="icon icon-users"></i>
					<h3 class="wow"><?php echo $stats['all_users']; ?></h3>
					<h4>Участников</h4>
				</li>
				<li class="wow bounceIn" data-wow-delay="0.4s">
					<i class="icon icon-check"></i>
					<h3 class="wow"><?php echo $stats['all_payments']; ?></h3>
					<h4>Пополнили</h4>
				</li>
				<li class="wow bounceIn" data-wow-delay="0.8s">
					<i class="icon icon-reload"></i>
					<h3 class="wow"><?php echo $stats['all_inserts']; ?></h3>
					<h4>Вывели</h4>
				</li>
				<li class="wow bounceIn" data-wow-delay="1.2s">
					<i class="icon icon-diamond"></i>
					<h3 class="wow">{!ALL_BALANCE!}</h3>
					<h4>Баланс</h4>
				</li>
			</ul>
		</div>
	</section>
	<!-- FACTS END -->

	<!-- FOOTER BEGIN -->
	<footer id="footer">
		<div class="container">
			<a href="index.html#wrap" class="logo goto"> <img src="/images/logo.png" alt="..." height="35" width="72"/> </a>
			<p class="copyright">&copy; Copyright 2016. All Rights Reserved.<br></p>
		</div>
	</footer>
	<!-- FOOTER END -->

</div>


<!-- MODALS BEGIN-->

<!-- subscribe modal-->
<div class="modal fade" id="modalMessage" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 class="modal-title"></h3>
		</div>
	</div>
</div>

<!-- contact modal-->
<div class="modal fade" id="modalContact" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3 class="modal-title">Контакты</h3>
			<form action="/scripts/contact.php" role="form"  id="contact_form">
						<div class="form-group">
							<input type="text" class="form-control" id="contact_name" placeholder="Ф.И.О." name="name">
						</div>
						<div class="form-group">
							<input type="email" class="form-control" id="contact_email" placeholder="Ваш E-Mail" name="email">
						</div>
						<div class="form-group">
							<textarea class="form-control" rows="3" placeholder="Введите текст сообщения" id="contact_message" name="message"></textarea>
						</div>
						<button type="submit" id="contact_submit" data-loading-text="&bull;&bull;&bull;"> <i class="icon icon-paper-plane"></i></button>
					</form>
		</div>
	</div>
</div>

<!-- MODALS END-->


<!-- JavaScript -->
<script src="/scripts/jquery-1.8.2.min.js"></script>
<script src="/scripts/bootstrap.min.js"></script>
<script src="/scripts/owl.carousel.min.js"></script>
<script src="/scripts/jquery.validate.min.js"></script>
<script src="/scripts/wow.min.js"></script>
<script src="/scripts/smoothscroll.js"></script>
<script src="/scripts/jquery.smooth-scroll.min.js"></script>
<script src="/scripts/jquery.superslides.min.js"></script>
<script src="/scripts/placeholders.jquery.min.js"></script>
<script src="/scripts/jquery.magnific-popup.min.js"></script>
<script src="/scripts/jquery.stellar.min.js"></script>
<script src="/scripts/retina.min.js"></script>
<script src="/scripts/typed.js"></script>
<script src="/scripts/custom.js"></script>

<!--[if lte IE 9]>
	<script src="scripts/respond.min.js"></script>
<![endif]-->
</body>
</html>
