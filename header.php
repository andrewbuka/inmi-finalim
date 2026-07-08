<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title><?php echo isset($GLOBALS['inmi_custom_title']) ? esc_html($GLOBALS['inmi_custom_title']) : 'SugarSite'; ?></title>

    <?php wp_head() ?>
	<!-- =================== META =================== -->
	<meta name="keywords" content="">
	<meta name="description" content="<?php echo isset($GLOBALS['inmi_custom_description']) ? esc_attr($GLOBALS['inmi_custom_description']) : ''; ?>">
	<meta name="format-detection" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="assets/img/sgr.png">
	<!-- =================== STYLE =================== -->
	
</head>

<body id="home" class="inner-scroll">

	<header class="header">
		<a href="#" class="nav-btn">
			<span></span>
			<span></span>
			<span></span>
		</a>
		<div class="top-panel">
			<div class="container">
				<div class="top-panel-cover">
					<ul class="header-cont">
						<li><a href="tel:+375447507890"><i class="fa fa-phone"></i>+375 (44) 750-78-90</a></li>
						<li><a href="mailto:inmisale@mail.ru"><i class="fa fa-envelope" aria-hidden="true"></i>inmisale@mail.ru</a></li>
					</ul>
					<ul class="icon-right-list">
						</a></li>
						<li><a class="header-like header-cart" href="http://inmi/basket"><i class="fa fa-shopping-cart" aria-hidden="true"><span class="count-prod">0</span></i></a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="header-menu">
			<div class="container">
				<a href="<?php echo get_page_link(8); ?>" class="logo"><img class="logo-inmi" src="<?php the_field('logo', 8) ?>" alt="logo"></a>
				<nav class="nav-menu">
					<ul class="nav-list">
						<li>
							<a href="<?php echo get_page_link(8); ?>">Главная</a>							
						</li>
						<li><a target="_blank" href="https://mbio.bas-net.by/">Сайт Института</a></li>
						<li><a href="<?php echo get_page_link(8); ?>#fiz-prod">физ. лица</a></li>
						<li><a href="http://inmi/yur-page/"><strong>Препараты для юр. лиц</strong></a></li>
						<li><a href="<?php echo get_page_link(8); ?>#contacts">Контакты</a></li>
					</ul>
				</nav>
			</div>
		</div>
	</header>
	<!-- =============== HEADER END =============== -->
