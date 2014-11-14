<div class="small-box box-border add-margin-bottom">
	<p id="telephone" >
		<span class="first-t">Comunicate con nosotros</span>
		<span class="second-t">(011) <span class="l-blue ">4393-7070</span></span>
		<span class="third-t">Lun. a Vie. de 8 a 18hs - Líneas rotativas</span>
	</p>
</div>
<a href="/como-empiezo/" class="small-box box-border add-margin-top-25 to-min-height add-bg-1">
	<h3 class="h1-world"><?php echo _("¿Cómo empiezo?") ?></h3>
	<p class="blued-text">Nos describís tu situación y realizamos un diagnóstico gratuito sin moverte de tu casa.</p>
</a>
<a href="/que-necesito/" class="small-box box-border add-margin-top-25 to-min-height add-bg-2">
	<h3 class="h1-world"><?php echo _("¿Qué necesito?") ?></h3>
	<p class="blued-text">Tramitamos toda la documentación necesaria. Sólo necesitás la decisión de empezar.</p>
</a>
<a href="/tengo-dudas/" class="small-box box-border add-margin-top-25 to-min-height add-bg-3">
	<h3 class="h1-world"><?php echo _("Tengo dudas") ?></h3>
	<p class="blued-text">Nuestra experiencia nos avala. Comunicate y visita nuestras oficinas. Despeja tus dudas!</p>
</a>

<?php 
if ( get_post_type() != 'testimonio' && $post->ID != 279 /* 279 = testimonios list page */ ) {
	$testimony = get_random_testimony();
?>
<div class="wide-box box-border add-margin-top testimonio add-margin-top-25 add-fix-1" >
	<div class="wide-box-img">
		<?php echo $testimony['thumbnail']?>
		<span><?php echo $testimony["post_title"] ?></span>
		<br/><span class="profesion"><?php echo $testimony["profesion"] ?></span>
	</div>
	<div class="wide-box-content">
		<p class="this-italic"><?php echo trim($testimony["post_excerpt"])!=''?$testimony["post_excerpt"]:generar_excerpt($testimony["post_content"]) ?></p>
		<a class="more read-more" href="<?php echo get_permalink($testimony["ID"])?>"><span class="l-blue">+</span> <?php echo _("LEER MÁS") ?></a>
	</div>
	<div class="clear-both"></div>
	<a class="more view-all" href="/testimonios"><span class="l-blue">+</span> <?php echo _("VER MAS TESTIMONIOS") ?></a>
</div>
<?php 
} 
?>
