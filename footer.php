<!--==================== FOOTER ====================-->
	<footer>
		<div class="container">
			<div class="row footer-item-cover">
				<div class="footer-subscribe col-md-7 col-lg-8">
					<h6>Подписка</h6>
					<p>Подпишитесь на новостную рассылку от <span style="background: rgba(255, 217, 16, 0.6);">inmi.by</span> </p>
					<form class="subscribe-form">
						<i class="fa fa-at" aria-hidden="true"></i>
						<input class="inp-form" type="email" name="subscribe" placeholder="E-mail">
						<button type="submit" class="btn btn-form"><span>Готово</span></button>
					</form>
				</div>
				<div class="footer-item col-md-5 col-lg-4">
					<h6>Главное</h6>
					<ul class="footer-list">
						<li><a href="http://inmi/requisites/">Реквезиты</a></li>
						<li><a href="http://inmi/">Главная</a></li>
						<li><a href="http://inmi/buying/">Как совершить покупку</a></li>
						<li><a href="http://inmi/yur-page/">Для юр лиц</a></li>	
						<li><a href="http://inmi/payment/">Оплата онлайн</a></li>											
						<li><a href="<?php echo get_page_link(8); ?>#fiz-prod">Для физ лиц</a></li>
						<li><a href="#">Карта сайта</a></li>	
						
											
					</ul>
				</div>
			</div>
			<div class="row footer-item-cover">
				<div class="footer-touch col-md-7 col-lg-8">
					<h6>Оставайтесь на связи</h6>
					<ul class="footer-soc social-list">
						<li><a target="_blank" href="https://invite.viber.com/?g2=AQBraLupPo8rSk2YPoN%2Bzo70k8QbxSBkOzKJG%2BMsZDnRDZS2JDAB2O%2FKSmRkYEkg&lang=ru"><i class="bi bi-tiktok" aria-hidden="true">Viber</i></a></li>
						<li><a target="_blank" href="https://t.me/inmi_by"><i class="bi bi-tiktok" aria-hidden="true">Telegram</i></a></li>
						<li><a target="_blank" href="https://www.tiktok.com/@inmi.by"><i class="bi bi-tiktok" aria-hidden="true">TikTok</i></a></li>						
						<li><a target="_blank" href="https://www.youtube.com/channel/UCRaPXjE_UVRXqRUXNbFH-ww"><i class="bi bi-tiktok" aria-hidden="true">YouTube</i></a></li>
					</ul>
					<div class="footer-autor">Остались вопросы? напишите нам: <a href="mailto:inmisale@mail.ru">inmisale@mail.ru</a></div>
				</div>
				<div class="footer-item col-md-5 col-lg-4">
					<h6>Реквизиты:</h6>
					<ul class="footer-list">
						
Государственное научное учреждение "Институт микробиологии Национальной академии наук Беларуси"
Юридический адрес: 220084, ул. Купревича,2
Минск, Республика Беларусь,
УНП - 100289066

В Едином государственном реестре юридических лиц и индивидуальных предпринимателей за №100289066, 15.08.2000, Мингорисполком.
						<!-- <li><a href="#">Road Bike</a></li>
						<li><a href="#">City Bike</a></li>
						<li><a href="#">Mountain Bike</a></li>
						<li><a href="#">Kids Bike</a></li>
						<li><a href="#">BMX Bike</a></li> -->
					</ul>
				</div>
			</div>
			<div class="footer-bottom">
				<div class="footer-copyright"><p>&copy; 2026 Институт микробиологии НАН Беларуси. Все права защищены.</p></div>
				<ul class="footer-pay">
					<!-- <li><a href="#"><img src="assets/img/footer-pay-1.png" alt="img"></a></li>
					<li><a href="#"><img src="assets/img/footer-pay-2.png" alt="img"></a></li>
					<li><a href="#"><img src="assets/img/footer-pay-3.png" alt="img"></a></li>
					<li><a href="#"><img src="assets/img/footer-pay-4.png" alt="img"></a></li> -->
				</ul>
			</div>
		</div>
	</footer>
	<!--================== FOOTER END ==================-->

	<!--===================== TO TOP =====================-->
	<a class="to-top" href="#home">
		<i class="fa fa-angle-double-up" aria-hidden="true"></i>
	</a>
	<!--=================== TO TOP END ===================-->
	<!--==================== SCRIPT	====================-->
	<script src="assets/js/jquery-2.2.4.min.js"></script>
	<script src="assets/js/slick.min.js"></script>
	<script src="assets/js/jquery.nice-select.js"></script>
	<script src="assets/js/wow.js"></script>
	<script src="assets/js/lazyload.min.js"></script>
	<script src="assets/js/data/fizProductData.js"></script>
	<script src="assets/js/my-js.js"></script>

	<script src="assets/js/scripts.js"></script>



	<?php get_template_part('template-yur-calculator'); ?>

    <?php wp_footer(); ?>
</body>
</html>