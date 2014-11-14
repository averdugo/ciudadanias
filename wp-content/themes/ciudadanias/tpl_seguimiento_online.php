<?php
/**
* Template Name: Seguimiento Online
*/

define(SISTEMA_MYSQL_USER,"ciudadanias");
define(SISTEMA_MYSQL_PASS,"C1ud4d4n14s");
define(SISTEMA_MYSQL_HOST,"localhost");
define(SISTEMA_MYSQL_DB,"ciudadanias");

define(SISTEMA_WEB_DOMAIN,"serverciudadanias.com.ar");

get_header();

$errores = array();
$success = false;
$carpeta = null;

if ( isset($_POST["entrando"]) ){
	
	$_POST["usuario"] = trim($_POST["usuario"]);
	$_POST["clave"] = trim($_POST["clave"]);
	
	if ( empty($_POST["usuario"]) ){
		$errores["usuario"] = "Debe ingresar un usuario";
	}
	if ( empty($_POST["clave"]) ){
		$errores["clave"] = "Debe ingresar una clave";
	}
	
	if ( count($errores) == 0){
		
		$db1 = mysql_connect( SISTEMA_MYSQL_HOST, SISTEMA_MYSQL_USER, SISTEMA_MYSQL_PASS ) or die( mysql_error() );  
		$sel1 = mysql_select_db( SISTEMA_MYSQL_DB ) or die( mysql_error() );
		mysql_set_charset('utf8',$db1); 
		
		$query = "SELECT * FROM carpetas WHERE usuario_nombre = '".mysql_real_escape_string($_POST["usuario"])."' ;";
		$res1 = mysql_query( $query, $db1 );
		
		while ( $carp = mysql_fetch_array( $res1 ) ){
		
			if ( $carp["usuario_clave"] == $_POST["clave"] ){
				
				$success = true;
				$carpeta = $carp;
				
				//busco las partidas escaneadas
				$query = "
					SELECT PA.adjunto_nombre, PA.adjunto_ext, PA.adjunto_nombre_fisico,
						   P.nombres, P.fecha, P.categoria, P.lugar, P.provincia, P.tipo_partida,
						   PT.nombre AS planilla_tipo 
					  FROM planillas_adjuntos PA 
					 INNER JOIN planillas P on P.id = PA.planilla_id
					 INNER JOIN planilla_tipos PT on PT.id = P.planilla_tipo_id 
					 WHERE P.carpeta_id = $carp[id]
				";
				$res2 = mysql_query( $query, $db1 );
				$planilas = array();
				while ( $plan = mysql_fetch_array( $res2 ) ){
					$planilas[] = $plan;
				}
				
			}
		
		}
		if ( !$success ){
			$errores["ingreso"] = "Usuario o contraseña incorrecto";
		}		
		
	}
	
}

?>

<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/jquery.jqzoom.css" type="text/css" media="screen" />

<div id="content-wraper">
	<div id="large-box-left" class="normal-pages">
		
	<? if ( !$success ){ ?>
		
		<div class="small-box box-border add-padding mceContentBody">
			<h2>Ingresá con tu usuario y contraseña</h2>
			<form method="post" action="" class="formulario">
				<input type="hidden" name="entrando" value="true" />
				<label for="usuario">Usuario</label>
				<input type="text" size="40" class="form-input" name="usuario" id="usuario" value="<? if ( count($errores) ) echo $_POST["usuario"]; ?>" >
				<? if ( isset($errores["usuario"]) ) echo '<span class="error">'.$errores["usuario"].'</span>' ?>
				<label for="clave">Contraseña</label>
				<input type="password" size="40" class="form-input" name="clave" id="clave" value="<? if ( count($errores) ) echo $_POST["clave"]; ?>" >
				<? if ( isset($errores["clave"]) ) echo '<span class="error">'.$errores["clave"].'</span>' ?>
				<div class="submit">
					<input type="image" src="<?php bloginfo('template_directory'); ?>/images/boton_entrar.png" />
					<? if ( isset($errores["ingreso"]) ) echo '<span class="error">'.$errores["ingreso"].'</span>' ?>
				</div>
			</form>
		</div>
		
	<? } else { ?>
		
		<div class="mceContentBody">
			<h2>Bienvenido: <?= $carpeta["nombre"]." ".$carpeta["apellido"] ?></h2>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque aliquet pharetra sapien vitae condimentum. In vel hendrerit nulla. Maecenas fermentum lacus non justo scelerisque id fermentum urna pretium. Proin sit amet tempor nunc. Cras aliquam magna ac metus porta at faucibus nulla lobortis. Pellentesque ut sem lorem, non tincidunt arcu. Etiam consectetur accumsan mi, vitae pellentesque magna condimentum vel. </p>
			<br/>	
			<? if ( !empty( $carpeta["usuario_mensaje"] ) ){ ?>
			<div class="small-box box-border add-padding mensaje">
				<h3>Mensaje del equipo de Ciudadanías Europeas</h3>
				<p class="to-small-text"><?=$carpeta["usuario_mensaje"]?></p>
			</div>
			<? } ?>
		</div>
		
		<? if ( count($planilas)>0 ){ ?>
		<div class="partidas">
			<div class="mceContentBody">
				<h2>Partidas tramitadas</h2>
				<p class="to-small-text">ZOOM: Pasá el mouse sobre cada imágen para ampliar.</p>
			</div>
			<div class="imagenes">
				<? foreach($planilas as $plan) { ?>
				<div class="row">
					<a href="http://<?= SISTEMA_WEB_DOMAIN ?>/img/planillas/<?= $plan["adjunto_nombre_fisico"]."_800_1321_0.".$plan["adjunto_ext"] ?>" class="zoom-image" title="<?= $plan["planilla_tipo"] ?>">  
						<img class="chica" src="http://<?= SISTEMA_WEB_DOMAIN ?>/img/planillas/<?= $plan["adjunto_nombre_fisico"]."_61_100_0.".$plan["adjunto_ext"] ?>" alt="<?= $plan["adjunto_nombre"] ?>" >
					</a>
				</div>
				<? } ?>
			</div>
		</div>
		<div class="clear-both"></div>
		<? } else { ?>
		<div class="partidas">
			<div class="mceContentBody">
				<h2>No hay partidas tramitadas</h2>
				<p class="to-small-text">Todavía no hay partidas disponibles.</p>
			</div>
		</div>
		<? } ?>
		
		<div class="mceContentBody br">
			<p><br/></p>
			<a href="<? the_permalink() ?>">&laquo; salir</a>
		</div>
		
	<? } ?>
		
	</div>
	<div id="small-box-right">
		<?php get_sidebar("contacto"); ?>
	</div>
	<div class="clear-both"></div>
</div>	

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.jqzoom-core-pack.js"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
	if(jQuery(".zoom-image").length){
		jQuery(".zoom-image").jqzoom({
	        zoomType: 'standard',
	        alwaysOn: false,
	        zoomWidth: 500,
	        zoomHeight: 500,
	        position: 'right',
	        xOffset: 10,
	        yOffset: -1,
	        showEffect: 'fadein',
	        hideEffect: 'hide',
	        preloadText: 'Cargando el zoom',
	        preloadImages: true
	    });
	}
});
</script>

<?php get_footer(); ?>



 
 