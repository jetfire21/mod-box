<?php
/*
WP Post Template: Шаблон-Аренда
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

				echo $cats[0]->name;
				 $cat_slug = $cats[0]->slug;
				?>
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


<section class="content">
<!-- 	<object type="image/svg+xml" class="c-bg" data="<?php echo get_template_directory_uri(); ?>/images/content/comb_bg.svg" fill="#f00" alt="The image wasn't found"></object> -->
<div class="bg-kvadratiki"></div>
	<div class="container">
		<div class="content-left-menu">
			<div class="info-menu">
<!-- 
				<ul>
					<li><a href="#" class="current">Аренда техники</a></li>
					<li><a href="#">Аренда продукции</a></li>
				</ul>
 -->				


					<?php 
					// print_r($wp_query->query_vars);
					//print_r(get_post(45));
					// echo $_GET['p'];
					// echo $_GET['post'];
						 // var_dump($cats);
					 ?>
				<?php
				// <!-- выводит все статьи категории -->
				echo $cats_in_post[0]->slug;
				echo $cats->slug;
				// print_r($cats);
				$post_cat = $cats[0]->slug;
				

				 	if(!is_category()) $slug = $post_cat;
					$query = new WP_Query( array( 'category_name' => $post_cat,'orderby' => 'date', 'order' => 'ASC' ) );
				  ?>
				 <?php $cur_post_id = get_the_ID();?>
			    <?php if($query->have_posts() ): ?>
				    <ul>
				    <?php while($query->have_posts() ) : $query->the_post();?>    
						<?php $nazv = get_post_meta($post->ID,"nazvanie_v_prav_kolonke",true); ?>
						<?php if($nazv):?>
							<li>
							<?php if( $cur_post_id == $post->ID ) { $cur_arenda = "current"; } else unset($cur_arenda);?>
							<a class="arenda-link <?php echo $cur_arenda;?>" data-post-id="<?php echo $post->ID;?>" href="<?php echo get_permalink();?>">
							<?php
							 // echo the_title();
								 echo $nazv;
							  ?>
							</a>										
							</li>
							<?php endif;?>
						<!-- Важно!!!! не удалять ,нужно для получения статей через ajax -->
						<?php $post_id .= $post->ID.",";?>		
				    <?php endwhile; ?>
				    <!-- </ul> -->
			    <?php else: ?>
			       	<p>Контент еще не добавлен!</p>
			    <?php endif; ?>	 
				<!-- выводит все статьи категории -->

				<?php 
				 $current_post_id = get_the_ID();
 				 $post_id = substr($post_id,0,-1);
				  ?>

				<script>	
				var post_id = '<?php echo serialize($post_id ); ?>';
				var cur_post_id = '<?php echo serialize($cur_post_id); ?>';
				</script>

			</div>
		</div>
		<div class="content-right-info">


<!-- 
			 <?php
				$query = new WP_Query( array( 'category_name' => $cat_slug ) );
			  ?>
			 <?php $cur_post_id = get_the_ID();?>
		    <?php if($query->have_posts() ): ?>
			    <ul>
			    <?php while($query->have_posts() ) : $query->the_post();?>    
						<li>
						<?php if( $cur_post_id == $post->ID ) { $cur_arenda = "current"; } else unset($cur_arenda);?>
						<a class="arenda-link <?php echo $cur_arenda;?>"  href="<?php echo get_permalink();?>"><?php echo the_title(); ?></a>
						</li>
			    <?php endwhile; ?>
			    </ul>
		    <?php else: ?>
		       	<p>Контент еще не добавлен!</p>
		    <?php endif; ?>	 
			</div>
		</div>

		<div class="content-right-info"> -->


		    <?php if(have_posts() ): ?>
		    <?php while(have_posts() ) : the_post();?>    
				<div class="cr-title">
					<h1><?php echo the_title(); ?></h1>
					<div class="clear"></div>
				</div>	
				<div class="cr-text">	    		 
		           <?php the_content(); ?>
		        </div>
		    <?php endwhile; ?>
		    <?php else: ?>
		       	<p>Контент еще не добавлен!</p>
		    <?php endif; ?>	


		</div>

		<div class="clear"></div>
	</div>
</section>

<?php get_footer(); ?>
