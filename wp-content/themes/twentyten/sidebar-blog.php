<div class="small-box box-border add-margin-top-25 to-min-height add-bg-1">
	<h3 class="h1-world"><?php echo _("¿Cómo empiezo?") ?></h3>
	<p class="blued-text">Nos describís tu situación y realizamos un diagnóstico gratuito sin moverte de tu casa.</p>
</div>
<div class="small-box box-border add-margin-top-25 to-min-height add-bg-2">
	<h3 class="h1-world"><?php echo _("¿Qué necesito?") ?></h3>
	<p class="blued-text">Tramitamos toda la documentación necesaria. Sólo necesitás la decisión de empezar.</p>
</div>
<div class="small-box box-border add-margin-top-25 to-min-height add-bg-3">
	<h3 class="h1-world"><?php echo _("Tengo dudas") ?></h3>
	<p class="blued-text">Nuestra experiencia nos avala. Comunicate y visita nuestras oficinas. Despeja tus dudas!</p>
</div>
<div class="wide-box box-border add-margin-top add-margin-top-25 add-fix-1" >
	<?php $testimony = get_random_testimony() ;?>
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
<div class="small-box box-border">
	<p id="telephone" >
		<span class="first-t">Comunicate con nosotros</span><br>
		<span class="second-t">(011) <span class="l-blue ">4393-7070</span></span><br>
		<span class="third-t">Lun. a Vie. de 8 a 18hs - Líneas rotativas</span>
	</p>
</div>