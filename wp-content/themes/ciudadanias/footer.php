	</div>	
	<div id="big-footer">
		<div id="big-inside-footer">
			<div class="footer-box blog-footer-box">
				<a href="/blog" class="h3">Blog</a>
				<?php 
				$last_entry = get_last_entry();
				if(!empty($last_entry) ) { 
				?>
				<div class="blog-entry">
					<small><?php echo date("d.m.Y", strtotime($last_entry['post_date']))?></small>
					<a href="<?= $last_entry['guid'] ?>" class="blog-resume"><?php echo $last_entry['post_title'] ?></a>
					<p class="blog-body">
					<?php 
					if(!empty($last_entry['post_excerpt'])){
						echo $last_entry['post_excerpt'];
					} else {
						echo $last_entry['post_content'];
					}
					?> 
					</p>
				</div>
				<?php
				}
				?>
			</div>
			<div class="footer-box">
				<div class="h3">Institucional</div>
				<div id="footer-cameras-icons">
					<a href="http://www.ccibaires.com.ar" target="_blank" title="Asociados a la Cámara de Comercio Italiana de la República Argentina"><img src="<?php bloginfo('template_directory'); ?>/images/camara_comercio_italiana.png" alt="Asociados a la Cámara de Comercio Italiana de la República Argentina"></a>
					<a href="http://www.camaraportuguesa.org" target="_blank" title="Socios de la Cámara Argentina Portuguesa de Comercio"><img src="<?php bloginfo('template_directory'); ?>/images/camara_comercio_portuguesa.png" alt="Socios de la Cámara Argentina Portuguesa de Comercio"></a>
				</div>
				<ul id="footer-menu-inst">
					<li><a href="<?php echo site_url()?>/"><?php echo _("Inicio") ?></a></li>
					<li><a href="<?php echo site_url()?>/empresa"><?php echo _("Quienes Somos") ?></a></li>
					<li><a href="<?php echo site_url()?>/servicio"><?php echo _("Nuestros Servicios") ?></a></li>
					<li><a href="<?php echo site_url()?>/argentinos-en-el-mundo"><?php echo _("Argentinos en el Mundo") ?></a></li>
				</ul>
				<p class="contact-p">
					<span class="email"><a href="mailto:info@ciudadaniaseuropeas.com">info@ciudadaniaseuropeas.com</a></span><br>
					Av. Córdoba 838, piso 7 depto 13<br>C1054AAU<br>
					Solicitar entrevista previa<br>
					de lunes a viernes de 8 a 18 hs.<br>
					<span style="color: #ffffff;">(011) 4393-7070</span> - Líneas rotativas<br>
					<span style="color:#3CF;font-style:italic;">Skype:</span> ciudadaniaseuropeas.com
				</p>
			</div>
			<div class="footer-box">
				<div class="h3">Social media</div>
				<div id="footer-social-icons">
					<a href="http://www.facebook.com/ciudadanias.europeas" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/facebook-shadow.png" alt="facebook"></a>
					<a href="http://www.linkedin.com/company/ciudadaniaseuropeas-com" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/linkedin-shadow.png" alt="linkedin"></a>
					<a href="http://www.facebook.com/ciudadanias.europeas" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/images/blogspot-shadow.png" alt="blogspot"></a>
				</div>
				<a href="#" id="logo-footer"><img src="<?php bloginfo('template_directory'); ?>/images/logo-footer.png" alt="Ciudadanias Europeas"> </a>
				<p id="rights">
				© 1997 - <?php echo @date("Y")?> ciudadaniaseuropeas.com <br>
				All rights reserved. <br>
				diseño: <a href="" style="vertical-align: top;" ><img src="<?php bloginfo('template_directory'); ?>/images/bluefever.png" alt="" ></a>
				</p>
			</div>
			<div class="clear-both"></div>
		</div>
	</div>


</div>

<?php wp_footer(); ?>

<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-8922785-1']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>

<!-- Google Code para etiquetas de remarketing -->
<!--------------------------------------------------
Es posible que las etiquetas de remarketing todavía no estén asociadas a la información de identificación personal o que estén en páginas relacionadas con las categorías delicadas. Para 
obtener más información e instrucciones sobre cómo configurar la etiqueta, consulte http://google.com/ads/remarketingsetup.
--------------------------------------------------->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 969797741;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/969797741/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>
