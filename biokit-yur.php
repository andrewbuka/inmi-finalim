  <?php 
    // template Name: Biokit-yur;
?>
<?php get_header(); ?>


<!-- ================ HEADER-TITLE ================ -->
	<section class="s-header-title">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<ul class="breadcrambs">
				<li><a href="?php echo get_page_link(8); ?>">Главная</a></li>
				<li><?php the_title(); ?></li>
			</ul>
		</div>
	</section>
	<!-- ============== HEADER-TITLE END ============== -->

	<!-- ============== S-SINGLE-PRODUCT ============== -->
	<section class="s-single-product my-s-single-product">
		<div class="container">
			<div class="row ">
				<div class="col-12 col-md-4">
					<br>
					<br>
					<span style="background: rgba(255, 217, 16, 1);">
					Микробный препарат для очистки водных растворов от ксилола и толуола
					</span>

                    <div class="prod-yur-calc-box" style="margin-top: 20px;">
                        <button type="submit" class="btn btn-form"><span>Калькулятор расхода</span></button>
                        
                    </div>
				</div>
				<div class="col-12 col-md-3">
					<!--===== SLIDER-SINGLE-FOR =====-->
					<img style="max-width: 300px;" src="http://inmi/wp-content/uploads/2026/06/biokit-Photoroom.png" alt="img">
					
				</div>
				<div class="col-12 col-md-3 single-shop-left my-single-shop-left">
					<h2 class="title my-title"><?php the_title(); ?></h2>
					<label class="my-label"><?php the_field('description'); ?></label>

					<div class="single-price my-single-price">
						<div class="new-price">Цену и наличие уточняйте</div>
					</div>
					
					<div class="frame-size">
						<label>Форма выпуска:</label>
						<ul>
							<li class="active my-active">1-20л</li>
							
						</ul>
					</div>
				
					<div >
						<p class="">для заказа и консультаций:<br> <a href="tel:+375447507890">+375 (44) 750-78-90</a> / <a href="mailto:inmisale@mail.ru">inmisale@mail.ru</a></p>
					</div>

				</div>
				
			</div>
		</div>
	</section>
	<!-- ============ S-SINGLE-PRODUCT END ============ -->

	<!--=============== SINGLE-SHOP-TABS ===============-->
	<section class="single-shop-tabs">
		<div class="container">
			<div class="tab-wrap">
				<ul class="tab-nav product-tabs">
					<li class="item" rel="tab1"><span>Характеристика</span></li>
					<li class="item" rel="tab2"><span>Документы</span></li>
					<!-- <li class="item" rel="tab3"><span>Документы</span></li> -->
				</ul>
				<div class="tabs-content my-row">
					<div class="tab tab1">
						<div class="row">						
              				<div class="faq-item">
								<?php the_content(); ?>
							</div>		
						</div>
					</div>
					
					<div class="tab tab2">
						<div class="faq-item">						
							<h5 class="title"><span><a target="_blank" href="#">Инструкция по применению - открыть и скачать</a></span></h5>
							<h5 class="title"><span>Нормативно-технический документ - <i>ТУ РБ 100289066.162-2020</i></span></h5>
					</div>
				</div>
			</div>
		</div>
	</section>


 <?php get_footer(); ?>