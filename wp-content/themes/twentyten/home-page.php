<?php
/**
 * Template Name: Home page
 */

get_header(); ?>
		<div id="content-wraper">
			<div id="large-box-left">
				<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
						
				<?php the_content(); ?>
						
				<?php endwhile; // end of the loop. ?>
				<?php $test = get_random_testimony(2) ;
				foreach( $test as $key => $testimony ) {
				?>
				<div class="wide-box box-border <?php echo (($key%2) == 1) ? "box-floated-right" : "box-floated-left" ?>" >
					<div class="wide-box-img">
						<?php echo $testimony['thumbnail']?>
						<span><?php echo $testimony['nombre']?></span>
					</div>
					<div class="wide-box-content">
						<p>	&ldquo;<?php echo $testimony['resumen']?>&rdquo;</p>
						<a class="more" href="<?php echo $testimony['guid']?>"><span class="l-blue">+</span> <?php echo _("LEER MÁS") ?></a>
					</div>
					<div class="clear-both"></div>
				</div>
				<?php 
				}
				?>
				
			</div>
			<div id="small-box-right">
				<div class="small-box box-border" id="video-inst">
					<p>
						DISFRUTÁ DE NUESTRO NUEVO<br>
						<span class="l-blue-25">Video institucional</span>
					</p>
					<img src="<?php bloginfo('template_directory'); ?>/images/video-inst.png" alt="video institucional">
					<div class="clear-both"></div>
				</div>
				<div class="small-box box-border add-margin-top add-arg-bg">		
					<h2><?php echo _("Consultanos")?></h2>
					<form action="" method="post" id="send-form">
						<label for="name"><?php echo _("Nombre") ?> <span class="form-star">*</span></label><br>
						<input type="text" class="right-form-input" name="name" value="" >
						
						<label for="surname"><?php echo _("Apellido") ?> <span class="form-star">*</span></label><br>
						<input type="text" class="right-form-input" name="surname" value="" >
						
						<label for="email"><?php echo _("Email") ?> <span class="form-star">*</span></label><br>
						<input type="text" class="right-form-input" name="email" value="" >
						
						<label for="query"><?php echo _("Consulta") ?> <span class="form-star">*</span></label><br>
						<textarea class="right-form-textarea" name="query" value=""></textarea>
						
						<a href="" id="send-btn" ></a>
						
						<p class="p-ballon">
						Si tenés más de un <strong>ascendiente europeo</strong>, señalá cada linea por separado y evaluaremos la mejor opción.<br>
						Por ejemplo:<br>
						Bisabuelo italiano > Abuelo > Madre > Yo<br>
						Abuelo polaco > Padre > Yo
						</p>
					</form>
				</div>
				<a href="" id="online-btn"></a>
				<div class="small-box box-border">
					<p id="telephone" >
						<span class="first-t">Comunicate con nosotros</span><br>
						<span class="second-t">(011) <span class="l-blue ">4393-7070</span></span><br>
						<span class="third-t">Lun. a Vie. de 8 a 18hs - Líneas rotativas</span>
					</p>
				</div>
				
			</div>
			<div class="clear-both"></div>
		</div>

<?php get_footer(); ?>