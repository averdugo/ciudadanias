<?php
/**
 * Template Name: Php Page
 */

get_header(); ?>
<div id="content-wraper">
	<div id="large-box-left">
		<?php while ($wp_query->have_posts()) : $wp_query->the_post();?>
					
		<?php the_content(); ?>
				
		<?php endwhile; // end of the loop. ?>
	</div>
	<div id="small-box-right">
		<div class="small-box box-border add-arg-bg">		
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
		<?php $test = get_random_testimony() ;
		?>
		<div class="wide-box box-border add-margin-top add-fix-1" >
			<div class="wide-box-img">
				<?php echo $test['thumbnail']?>
				<span><?php echo $test['nombre']?></span>
			</div>
			<div class="wide-box-content">
				<p>	&ldquo;<?php echo $test['resumen']?>&rdquo;</p>
				<a class="more" href="<?php echo $test['guid']?>"><span class="l-blue">+</span> <?php echo _("LEER MÁS") ?></a>
			</div>
			<div class="clear-both"></div>
		</div>
		
	</div>
	<div class="clear-both"></div>
</div>	
<?php get_footer(); ?>