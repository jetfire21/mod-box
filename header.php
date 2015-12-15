<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>
    		wp_title( '', true, 'right' );

	// Add the blog name.
	if($_SERVER["REQUEST_URI"]=="" OR $_SERVER["REQUEST_URI"]=="/") { bloginfo( 'name' ); }
    	
    </title>
<meta name="description" content="<?php echo get_post_meta($post->ID, 'description', true); ?>" />
<meta name="keywords" content="<?php echo get_post_meta($post->ID, 'keywords', true); ?>" />
<meta name="format-detection" content="telephone=no">	
<?php wp_head(); ?>

		<link rel="icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
</head>
<body>

<!-- <header class="padd-block">  -->
		<?php
			$cats = get_category(get_query_var('cat'),false);
			 // print_r( $cats );
			$cat_id = $cats->cat_ID;
			$cat_slug = $cats->slug;
			$parent_cat = $cats->parent;
		?>
<?php if( is_page() or $cat_slug == "bani" or $cat_slug == "sadovye-domiki"):?>
	<header class="resized padd-block">
	 <div class="header-bg-img"></div>  
<? else:?>
<header class="padd-block">    
	<div class="header-bg-img"></div>
<? endif;?>
		<div class="head-top vn-white">
		<div class="container-1780">
			<div class="h-menu-but">
				<a href="#"><i class="fa fa-bars"></i><span>Меню</span></a>
			</div>
			<div class="h-logo-b">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/head/mdbx_logo_blue.svg" alt=""/>  -->

				<?php
					 $option= get_option('alex_upload_file_option');
					 if( !empty($option['url_file_bigres']) ) 
					 {
					 	echo $img_na_white = "<a href='/'><img src='" . $option['url_file_bigres'] . "' alt='logo' > </a> ";
					 }
					 //else echo "no logo image!";
					 else echo $img_na_white = "<a href='/'><img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_blue.svg' alt='logo'></a>";
				 ?>

			</div>
			<div class="h-logo">
				<!-- <img src="<?php echo get_template_directory_uri(); ?>/images/head/mdbx_logo_white.svg" alt=""/>  -->
				<?php
					if( is_front_page() ){

						 $option= get_option('alex_upload_file_option');
						 if( !empty($option['url_file']) ) 
						 {
						 	echo "<a href='/'><img src='" . $option['url_file'] . "' alt='logo' > </a> ";
						 }
						 //else echo "no logo image!";
						 else echo "<a href='/'><img src='" . get_template_directory_uri() ."/images/head/mdbx_logo_white.svg' alt='logo'></a>";
					}
					else echo $img_na_white;

				 ?>				
			</div>
			
			<div class="h-menu vn-h-menu-color">

<!-- 				
					<ul>
					<li><a href="#">Каталог продукции</a>
						<ul class="drop-menu">
							<li><a href="#">Блок-контейнеры</a></li>
							<li><a href="#">Модульные здания</a></li>
							<li><a href="#">Посты охраны</a></li>
							<li><a href="#">Садовые домики</a></li>
							<li><a href="#">Бани</a></li>
							<li><a href="#">Морские контейнеры</a></li>
							<li><a href="#">Благоустройство</a></li>
						</ul>
							
					</li>
					<li><a href="#">Аренда</a>
						<ul class="drop-menu">
							<li><a href="#">Аренда техники</a></li>
							<li><a href="#">Аренда продукции</a></li>
						</ul>
					</li>
					<li><a href="#">О компании</a></li>
					<li><a href="#">Условия доставки</a></li>
					<li><a href="#">Информация</a></li>
					<li><a href="#">Контакты</a></li>
					<div class="clear"></div>
				</ul>
 -->				
				<!-- modal menu -->
				<?php

					function change_submenu_class_b($menu) {  
					  $menu = preg_replace('/ class="sub-menu"/','/ class="drop-menu" /',$menu);  
					  return $menu;  
					}  
					add_filter('wp_nav_menu','change_submenu_class_b');

					$args = array(
					  'theme_location'  => 'header_menu',
					  'menu'            => 'main-menu', 
					  'container'       => '', 
					  'container_class' => '', 
					  'container_id'    => '',
					  'menu_class'      => '', 
					  'menu_id'         => '',
					  'echo'            => true,
					  'fallback_cb'     => 'wp_page_menu',
					  'before'          => '',
					  'after'           => '',
					  'link_before'     => '',
					  'link_after'      => '',
					  'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
					  'depth'           => 0
					);

					 wp_nav_menu( $args );
			    ?>
				<!-- modal menu -->	

			</div>
			
			<div class="h-phone-but">
				<a href="tel:
					<?php
					 $option = get_option('alex_upload_file_option');
					 if( !empty($option['phone']) ) echo $option['phone'];
				 ?>
				 "><i class="fa fa-phone"></i></a>

			</div>
			<div class="h-phone vn-h-phone">
				<!-- <span>+7 (812) 408 01 11</span> -->
				<img src="<?php echo get_template_directory_uri();?>/images/head/blue-phone.png">
				<span>
				<?php
					 $option = get_option('alex_upload_file_option');
					 if( !empty($option['phone']) ) echo $option['phone'];
				 ?>
				 </span>
			</div>

		</div>
	</div>

<!-- 
	<div class="header-bg-img"></div>
</header>

это закрывающая чась шапки
 -->