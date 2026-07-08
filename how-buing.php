  <?php 
    // template Name: How-buying;
?>

<?php get_header(); ?>

<section class="s-header-title">
		<div class="container">
			<h1><?php the_title(); ?></h1>
			<ul class="breadcrambs">
				<li><a href="?php echo get_page_link(8); ?>">Главная</a></li>
				<li><?php the_title(); ?></li>
			</ul>
		</div>
	</section>

    <section class="single-shop-tabs">
		<div class="container">			
		    <?php the_content(); ?>							
		</div>
	</section>


 <?php get_footer(); ?>