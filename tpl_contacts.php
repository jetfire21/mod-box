<?php
/*
Template Name: Шаблон-Контакты
dark-blue background
*/
?>

<?php
	get_header(); ?>

		<div class="hc-left-full">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1998.5127477892263!2d30.390999269660902!3d59.940227027275434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4696319252cdb867%3A0xc7d0d56aee92bcd6!2z0J3QvtCy0LPQvtGA0L7QtNGB0LrQsNGPINGD0LsuLCAyMywgMTAzLCDQodCw0L3QutGCLdCf0LXRgtC10YDQsdGD0YDQsywg0KDQvtGB0YHQuNGPLCAxOTExMjQ!5e0!3m2!1sru!2s!4v1448188037849" width="100%" height="1080" frameborder="0" style="border:0" allowfullscreen></iframe>
<!-- 
			
			https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6705.719448727952!2d30.643587620650337!3d60.021336188878!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4697d32844208487%3A0x5eb72ae964d8c7a4!2z0JrQvtC70YLRg9GI0YHQutC-0LUg0YguLCDQktGB0LXQstC-0LvQvtC20YHQuiwg0JvQtdC90LjQvdCz0YDQsNC00YHQutCw0Y8g0L7QsdC7Lg!5e0!3m2!1sru!2sru!4v1449608103742
 -->	
		</div>


		<div class="hc-right-full">
			<div class="right-container">

				<?php if(have_posts() ): ?>
				<?php while(have_posts() ) : the_post();?>    
						<h2><?php echo the_title(); ?></h2>    
				       <!-- <?php the_content(); ?> -->
				<?php endwhile; ?>
				<?php else: ?>
				   	<p>Контент еще не добавлен!</p>
				<?php endif; ?>	 
					
				<p>
				<p>Телефон в Санкт-Петербурге: 408 01 11<br/>
				<span class="icon-email"> E-mail: </span><span class="e-mail-cont">myboxspb@mail.ru</span></p>
					<a class="cont-vn cur ofis" href="#">
						<i class="map-vn"></i>
						<span>Наш офис:</span>
					</a></br>
					<span class="cont-addr">г. Санкт-Петербург, Ул. Новгородская, л. 23 Лит А. офис 103</span>
				</p>
				<p>
					<a class="cont-vn ploshad" href="#">
						<i class="map-vn"></i>
						<span>Производственная площадка:</span>
					</a></br>
					<span class="cont-addr">5 км дороги из ЖК Новый оккервиль на Колутшское шоссе</span>		
				</p>
				
				<a class="write-but clear marg-for-but" href="#"><i class="write"></i>Напишите нам</a>
			</div>
		</div>			


		<div class="clear"></div>
	<!--</div>-->
	<div class="header-bg-img"></div>
</header>

<?php get_footer(); ?>
