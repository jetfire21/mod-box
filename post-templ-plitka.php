<?php
/*
WP Post Template: Шаблон-Плитка
dark-blue background (это шаблон записи)
*/
?>

<?php

get_header(); ?>
	<div class="head-center margin-top-block">
		<div class="container">
			<div class="hc-top">
				<!-- Морские контейнеры -->
				<?php
				$cats = get_the_category();
				// echo $cats[0]->name;
				$cat_slug = $cats[0]->slug;
				?>
				Тротуарная плитка
			</div>
			<div class="hc-bottom l-height-31">
<!-- 				Сухогрузные контейнеры предназначены для транспортировки и хранения груза. Перевозка товара может осуществляться по международному или внутреннему маршруту. Транспортное оборудование успешно используется для смешанных перевозок, не нарушая целостности перевозимого груза. -->
				 <?php echo $cats[0]->description;?>
				 <?php // print_r($cats);?>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</header>


<section class="content" id="plitka">
<!-- 	<object type="image/svg+xml" class="c-bg" data="<?php echo get_template_directory_uri(); ?>/images/content/comb_bg.svg" fill="#f00" alt="The image wasn't found"></object> -->
<div class="bg-kvadratiki"></div>
	<div class="container">
		<div class="content-left-menu">

			<div class="cl-text">
				<div class="cl-logo">
					<img src="<?php echo get_template_directory_uri();?>/images/content/comp-logo.png" alt=""/><span>ОАО «Ленстройдеталь»</span>
				</div>
				<!-- <img src="images/content/pic-vn.jpg" alt="" /> -->
				<?php echo the_post_thumbnail();?>
				<p class="left-text">
<!-- 
					Плитка <a href="#">компании «Ленстройдеталь»</a> обладает уникальными эксплуатационными свойствами. Так, в климатических условиях Санкт-Петербурга срок эксплуатации нашей плитки более 20 лет, а способность выдерживать большие нагрузки низкая истираемость обеспечивают особую износостойкость и механическую прочность.
					<br/><br/>
					В настоящее время ОАО «Ленстройдеталь» производит плитку 12форм, 12 цветов, трех фактур, а также бортовые камни 3 видов, два из которых могут быть цветными.
					<br/><br/>
					Кроме того, освоено производство блоков подпорных стен для армогрунтовых насыпей, широко используемых в дорожном строительстве.

 -->				
				 <?php 
				    $left_text = rwmb_meta( "rw_left_colum_text");
				    $left_text = str_replace("<p>", "", $left_text);
				    echo $left_text = str_replace("</p>", "<br><br>", $left_text);
				  ?>
 				</p>
			</div>
				
				
		</div>
		<div class="content-right-info">
            <!-- 
			<div class="cr-title">
				<h1>Аренда техники</h1>
				<div class="clear"></div>
			</div>
			
			<div class="cr-text">

				<p>
					<img src="images/content/info-pic.jpg" alt=""/>
					Здания модульного типа применяются в самых различных областях, начиная от организации удобного проживания при кратковременных или вахтовых работах на коммерческих предприятиях до использования в качестве постов охраны и отдельных помещений на складских и промышленных территориях.
					<br/><br/>
					Конструкция строения позволяет использовать его в любых погодных условиях, а транспортировка возможна любыми доступными способами.
					<br/><br/>
					При заказе модульного здания следует обратить внимание на технологию производства и его эксплуатационные особенности.
				</p>
				<p>
					Цена модульного здания зависит, в частности, от общей площади строения, стоимости отделочных материалов и требований заказчика (толщина утеплителя, особенности внутренней планировки и т. д.).
				</p>
				
				<h4>Преимущества заказа модульных конструкций</h4>
				
				<ul class="preim-vn">
					<li><span>Экономичность. Изготовление модульного здания обходится намного дешевле аренды или строительства обычного.</span></li>
  					<li><span>Возможность удобной транспортировки.</span></li>
					<li><span>Быстрота возведения.</span></li>
					<li><span>Многофункциональность.</span></li>
					<li><span>Компактность.</span></li>
					<li><span>Возможность присоединения к различным инженерным коммуникациям.</span></li>
					<li><span>Доступная стоимость.</span></li>
				</ul>
				<p>
					Производители модульных зданий предлагают конструкции под ключ, с полной установкой электрики и сантехнических коммуникаций. Изготовление ведется с использованием надежных материалов, устойчивых к механическим повреждениям и коррозии. Отсутствие органических компонентов в составе утеплителя исключает появление плесени и сырости.
				</p>

			</div>
			 -->
			 
			<!-- все категории кроме каталога продукции -->
			  <?php
				$latest_cat_post = new WP_Query( array('posts_per_page' => 1, 'category__in' => array($cat_id)) );

				if( $latest_cat_post->have_posts() ) : 
					while( $latest_cat_post->have_posts() ) : $latest_cat_post->the_post();
			  ?>
				<div class="cr-title">
					<h1><?php echo the_title(); ?></h1>
					<a class="cr-but cr-but3" href="#"><i class="cr-calc"></i>Оформить заказ</a>
					<div class="clear"></div>
				</div>	
				<div class="cr-text">	    		 
		           <?php the_content(); ?>

		           <a class="cr-but clear marg-for-but cr-but3" href="#"><i class="cr-calc"></i>Оформить заказ</a>
		        </div>
				   <?php endwhile; ?>
			    <?php else: ?>
			       	<p>Контент еще не добавлен!</p>
			    <?php endif; ?>	 
			<!-- все категории кроме каталога продукции -->

		</div>

		<div class="clear"></div>
	</div>
</section>

<?php get_footer(); ?>


