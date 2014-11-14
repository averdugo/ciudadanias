<?php
/**
 * Template Name: Videos
 */

$videos = array(
	array(
		'ID' => 1,
		'type' => 'youtube',
		'nombre' => 'Video institucional',
		'url' => "http://www.youtube.com/embed/4mPHrvYgZ6M"
	),
	array(
		'ID' => 2,
		'type' => 'local',
		'nombre' => 'Descripción de nuestros servicios',
		'archivo' => "europeas_baja6_640x352",
		'formatos' => 'webmv, ogv, m4v'
	)
);
$videos = array();

if ( !$_GET["video"] ){
	$_GET["video"] = $videos[0]["ID"];
}

$video = null;
foreach ($videos as $v) {
	if ( $v["ID"] == $_GET["video"] ){
		$video = $v;
	}
}

get_header(); 

?>

<div id="content-wraper">
	<div id="large-box-left" class="normal-pages">
		
		<h1 class="normal"><?= $video["nombre"] ?></h1>
		
		<?php
		if ( $video["type"] == 'youtube' ){
		?>
		<div class="video">
			<iframe width="620" height="495" src="<?= $video["url"] ?>" frameborder="0" allowfullscreen></iframe>			
		</div>
		<?
		}
		elseif ( $video["type"] == 'local' ){
		?>
		<script type="text/javascript">
		//<![CDATA[
		$(document).ready(function(){
			$("#jquery_jplayer_1").jPlayer({
				ready: function () {
					$(this).jPlayer("setMedia", {<?
						foreach ( explode(",", $video["formatos"]) as $index=>$formato ){
							$formato = trim($formato);
							if ( $index > 0 ) echo ',';
							$extension = $formato;
							if ( $formato == "ogv" ) $extension = "theora.ogv";
							if ( $formato == "webmv" ) $extension = "webm";
							echo $formato.': "'.get_bloginfo('template_directory').'/videos/'.$video["archivo"].'.'.$extension.'"';
						}
						?>}).jPlayer("play");
				},
				swfPath: "<?php echo get_bloginfo('template_directory') ?>/js",
				supplied: '<?= $video["formatos"] ?>',
				solution: 'html, flash'
			})
		});
		//]]>
		</script>
		<div class="jp-video jp-video-360p">
			<div class="jp-type-single">
				<div id="jquery_jplayer_1" class="jp-jplayer" style="height:358px;"></div>
				<div id="jp_interface_1" class="jp-interface">
					<div class="jp-video-play"></div>
					<ul class="jp-controls">
						<li><a href="#" class="jp-play" tabindex="1">play</a></li>
						<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
						<li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
						<li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
						<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
					</ul>
					<div class="jp-progress">
						<div class="jp-seek-bar">
							<div class="jp-play-bar"></div>
						</div>
					</div>
					<div class="jp-volume-bar">
						<div class="jp-volume-bar-value"></div>
					</div>
					<div class="jp-current-time"></div>
					<div class="jp-duration"></div>
				</div>
			</div>
		</div>
		<?
		}
		?>
		<p>&nbsp;</p>
		<p>Nuevos videos en proceso<br><br></p>
		<p><?php echo date("d/m/Y") ?></p>
		<!-- <h2 class="normal">Más videos</h2> -->
		<ul class="lista">
		<?
		foreach ( $videos as $v ){
			if ( $v["ID"] != $_GET["video"] ){
			?>	
			<li><a href="/videos/?video=<?=$v["ID"]?>" class="l-blue"><?=$v["nombre"]?></a></li>
			<?
			}
		}
		?>
		</ul>
		
	</div>
	<div id="small-box-right">
		<?php get_sidebar("contacto"); ?>
	</div>
	<div class="clear-both"></div>
</div>	

<?php get_footer(); ?>



