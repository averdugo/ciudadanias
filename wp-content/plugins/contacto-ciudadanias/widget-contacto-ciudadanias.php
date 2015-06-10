<?php
/*
  Plugin Name: Widget Contacto Ciudadanias
  Description: Formulario contacto para ciudadanias ( Need jquery.validate.js )
  Version: 1.1
  Author: GM2DEV
*/


/*VARIANTE EMPRESA
|   SE CONFIGURA EN WORDPRESS DENTRO DE LA PAGE EN CAMPOS PERSONALIZADOS
|   BAJO EL NOMBRE form-variant
*/

/*LISTADO DE FORMULARIOS ACTIVOS (DICIEMBRE 2014)
    http://www.ciudadaniaseuropeas.com/tramitamos-tu-ciudadania-europea-empresas/
    http://www.ciudadaniaseuropeas.com/tramitamos-tu-ciudadania-polaca-en-israel/
    http://www.ciudadaniaseuropeas.com/tramitamos-tu-ciudadania-europea/
    http://www.ciudadaniaseuropeas.com/departamento_servicios_legales/
    http://www.ciudadaniaseuropeas.com/tramitamos-tu-ciudadania-facebook/
    http://www.ciudadaniaseuropeas.com/tramitamos-tu-ciudadania-europea-dondereciclo-org/
    http://www.ciudadaniaseuropeas.com/
    http://www.ciudadaniaseuropeas.com/servicios/
    http://www.ciudadaniaseuropeas.com/ventajas/
    http://www.ciudadaniaseuropeas.com/legales/
*/

/*
  //contact-form-legales

  //Ultima revision Diciembre 2014
  -> SE ELIMINO CAMPO UBICACION (SOLICITADO POR EL CLIENTE)
  -> PREGUNTAR POR LUGAR DE RESIDENCIA EN LEGALES (QUIZAS AL IGUAL QUE UBICACION TAMBIEN DEBA SER ELIMINADO)
  -> PREGUNTAR POR CAMPO OCULTO EN FORMULARIO LINEA 627
*/



add_action('widgets_init', 'widget_contactoCiudadanias_init');

function widget_contactoCiudadanias_init(){
  // Register widget
  register_widget( 'Widget_contactoCiudadanias' );
  // Register style
  wp_register_style( 'contacto-style', plugins_url('/css/style.css', __FILE__) );
  wp_enqueue_style( 'contacto-style' );
  wp_register_style( 'ui-style', plugins_url('/css/jquery-ui-1.8.22.custom.css', __FILE__) );
  wp_enqueue_style( 'ui-style' );
  wp_register_style( 'chosen-style', plugins_url('/css/chosen.css', __FILE__) );
  wp_enqueue_style( 'chosen-style' );
}

// Clase Widget_homeBlogs
class Widget_contactoCiudadanias extends WP_Widget {

  function Widget_contactoCiudadanias() {
    /* Widget settings. */
    $widget_ops = array( 'classname' => 'contactoCiudadanias', 'description' => 'Formulario de contacto ( Need jquery.validate.js )' );

    /* Create the widget. */
    $this->WP_Widget( 'contacto-ciudadanias', 'Contacto Ciudadanias', $widget_ops );
  }

  
  function update( $new_instance, $old_instance ){
    $instance = $old_instance;
      $instance['type'] = $new_instance['type'];
      return $instance;
  }

  function form( $instance ) {
    if ( isset( $instance[ 'type' ] ) ) {
      $type = $instance[ 'type' ];
    }else{
      $type = "";
    }
    ?>
    <p>
      <label for="tipo">Tipo</label>
      <select id="<?php echo $this->get_field_id( 'type' ); ?>" name="<?php echo $this->get_field_name( 'type' ); ?>">
        <option value="">Seleccionar</option>
        <option value="Web" <?php echo ( esc_attr( $type ) == "Web" )? 'selected="selected"':''; ?>>Web</option>
        <option value="Landing" <?php echo ( esc_attr( $type ) == "Landing" )? 'selected="selected"':''; ?>>Landing</option>
        <option value="CountryContact" <?php echo ( esc_attr( $type ) == "CountryContact" )? 'selected="selected"':''; ?>>Selección de país</option>
        <option value="Facebook" <?php echo ( esc_attr( $type ) == "Facebook" )? 'selected="selected"':''; ?>>Facebook</option>
        <option value="Legales" <?php echo ( esc_attr( $type ) == "Legales" )? 'selected="selected"':''; ?>>Legales</option>
      </select>
    </p>
    <?php
  }
  

  // Metodo que se llamara cuando se visualize el Widget en pantalla
  function render_service_options( $esLandingLegales = false ){

    ?>    
        <?php if ($esLandingLegales == true) { ?>
          <label for="lugar-residencia">Lugar de residencia<span class="form-star">*</span></label>
          <span class="wpcf7-form-control-wrap lugar-residencia">
            <input type="text" size="40" class="wpcf7-text wpcf7-validates-as-required right-form-input" value="" name="lugar-residencia">
          </span>
        <?php } ?>
        
        <label>Elije tu servicio<span class="form-star">*</span></label>
          <span class="wpcf7-form-control-wrap clearfix">
            <select class="right-form-select <?php if ($esLandingLegales == true) { echo 'chosen-select'; }?>" id="otrostramites" name="servicio" data-placeholder="Seleccione un servicio">
              <option></option>
              <option value="Daños">Daños (Accidentes de tránsito - Mala Praxis).</option>
              <option value="Contratos">Contratos(Redacción - Asesoramiento - Incumplimiento).</option>
              <option value="Asesoramiento">Asesoramiento en materia de inmuebles.</option>
              <option value="Usucapion">Prescripción adquisitiva por el transcurso del tiempo - Usucapión.</option>
              <option value="Alquileres">Alquileres - Desalojo.</option>
              <option value="Tutela">Tutela y Curatela.</option>
              <option value="Adopciones">Adopciones.</option>
              <option value="Sucesiones">Sucesiones.</option>
              <option value="Testamentos">Testamentos.</option>
              <option value="Divorcio">Divorcio(Tenencia - Alimentos - Régimen de Visitas).</option>
              <option value="Divorcios en España">Divorcios en España.</option>
              <option value="Concubinato">Concubinato.</option>
              <option value="Juicio Filiacion">Juicios de filiación.</option>
              <option value="Juicio Ejecutivo">Juicios ejecutivos(expensas - contratos de alquiler - cheque - pagaré).</option>
              <option value="Defensa Consumidor">Defensa del Consumidor.</option>
              <option value="Jubilaciones">Jubilaciones y Pensiones</option>
              <option value="Rectificaciones">Rectificaciones de partidas</option>
              <option value="Notificaciones Internacionales">Notificaciones internacionales - Exhorto.</option>
              <option value="Inscripciones Nacimientos Matrimonios">Inscripciones de nacimientos y matrimonios extranjeros en Argentina. </option>
              <option value="Otros Tramites">Otros tr&aacute;mites</option>
            </select>
          </span>
        
        <label for="otro-servicio" class="hide">Ingresa otro servicio<span class="form-star">*</span></label>
        <span class="wpcf7-form-control-wrap otro-servicio hide">
          <input type="text" size="40" class="wpcf7-text wpcf7-validates-as-required right-form-input" value="" name="otro-servicio">
        </span>

        <label for="otro-tramite" class="hide">Ingresa otro tr&aacute;mite<span class="form-star">*</span></label>
        <span class="wpcf7-form-control-wrap otro-tramite hide">
          <input type="text" size="40" class="wpcf7-text wpcf7-validates-as-required right-form-input" value="" name="otro-tramite">
        </span>

        <script type="text/javascript">
          $(document).ready(function(){
            $('.right-form-select')
              .change(function(){

                var option = $(this).val();

                switch(option)
                {
                  case 'Otro Servicio':
                    $('label[for=otro-tramite] , .otro-tramite').fadeOut('slow', function(){
                        $('label[for=otro-servicio] , .otro-servicio').fadeIn('slow');
                        $('.col-der, .center').removeClass('opened').addClass('opened');
                    });
                    $('input[name=otro-servicio]').val('');
                  break;

                  case 'Otros Tramites':
                    $('label[for=otro-servicio] , .otro-servicio').fadeOut('slow', function(){
                        $('label[for=otro-tramite] , .otro-tramite').fadeIn('slow');
                        $('.col-der, .center').removeClass('opened').addClass('opened');
                    });
                    $('input[name=otro-tramite]').val('');
                  break;

                  default:
                    $('label[for=otro-servicio] , .otro-servicio, label[for=otro-tramite] , .otro-tramite').fadeOut('slow', function(){
                      $('.col-der, .center').removeClass('opened');
                    });
                  break;
                }
              });
          });
        </script>
    <?php
  }

  // Metodo que se llamara cuando se visualize el Widget en pantalla
  function widget($args, $instance){
    global $post;
    global $host;
    //Array empresas
    $empresas = array( 
      "ISIC",
      "Full Benefits",
      "Assist card",
      "Santander",
      "Asociart servicios",
      "AEGIS","Swiss Medical",
      "Telefonica",
      "Movistar",
      "Laser Med",
      "ANSES",
      "ENFASIS",
      "Gran Cooperativa"
    );

    //Array paises
    $paises = array( 
      "Afghanistan", 
      "Albania", 
      "Algeria", 
      "American Samoa", 
      "Andorra", 
      "Angola", 
      "Anguilla", 
      "Antarctica", 
      "Antigua and Barbuda", 
      "Armenia", 
      "Arctic Ocean", 
      "Aruba", 
      "Ashmore and Cartier Islands", 
      "Atlantic Ocean", 
      "Australia", 
      "Austria", 
      "Azerbaijan", 
      "Bahamas", 
      "Bahrain", 
      "Baker Island", 
      "Bangladesh", 
      "Barbados", 
      "Bassas da India", 
      "Belarus", 
      "Belgium", 
      "Belize", 
      "Benin", 
      "Bermuda", 
      "Bhutan", 
      "Bolivia", 
      "Bosnia and Herzegovina", 
      "Botswana", 
      "Bouvet Island", 
      "Brazil", 
      "British Virgin Islands", 
      "Brunei", 
      "Bulgaria", 
      "Burkina Faso", 
      "Burundi", 
      "Cambodia", 
      "Cameroon", 
      "Canada", 
      "Cape Verde", 
      "Cayman Islands", 
      "Central African Republic", 
      "Chad", 
      "Chile", 
      "China", 
      "Christmas Island", 
      "Clipperton Island", 
      "Cocos Islands", 
      "Colombia", 
      "Comoros", 
      "Cook Islands", 
      "Coral Sea Islands", 
      "Costa Rica", 
      "Cote d'Ivoire", 
      "Croatia", 
      "Cuba", 
      "Cyprus", 
      "Czech Republic", 
      "Denmark", 
      "Democratic Republic of the Congo", 
      "Djibouti", 
      "Dominica", 
      "Dominican Republic", 
      "East Timor", 
      "Ecuador", 
      "Egypt", 
      "El Salvador", 
      "Equatorial Guinea", 
      "Eritrea", 
      "Estonia", 
      "Ethiopia", 
      "Europa Island", 
      "Falkland Islands (Islas Malvinas)", 
      "Faroe Islands", 
      "Fiji", 
      "Finland", 
      "France", 
      "French Guiana", 
      "French Polynesia", 
      "French Southern and Antarctic Lands", 
      "Gabon", 
      "Gambia", 
      "Gaza Strip", 
      "Georgia", 
      "Germany", 
      "Ghana", 
      "Gibraltar", 
      "Glorioso Islands", 
      "Greece", 
      "Greenland", 
      "Grenada", 
      "Guadeloupe", 
      "Guam", 
      "Guatemala", 
      "Guernsey", 
      "Guinea", 
      "Guinea-Bissau", 
      "Guyana", 
      "Haiti", 
      "Heard Island and McDonald Islands", 
      "Honduras", 
      "Hong Kong", 
      "Howland Island", 
      "Hungary", 
      "Iceland", 
      "India", 
      "Indian Ocean", 
      "Indonesia", 
      "Iran", 
      "Iraq", 
      "Ireland", 
      "Isle of Man", 
      "Italy", 
      "Jamaica", 
      "Jan Mayen", 
      "Japan", 
      "Jarvis Island", 
      "Jersey", 
      "Johnston Atoll", 
      "Jordan", 
      "Juan de Nova Island", 
      "Kazakhstan", 
      "Kenya", 
      "Kingman Reef", 
      "Kiribati", 
      "Kerguelen Archipelago", 
      "Kosovo", 
      "Kuwait", 
      "Kyrgyzstan", 
      "Laos", 
      "Latvia", 
      "Lebanon", 
      "Lesotho", 
      "Liberia", 
      "Libya", 
      "Liechtenstein", 
      "Lithuania", 
      "Luxembourg", 
      "Macau", 
      "Macedonia", 
      "Madagascar", 
      "Malawi", 
      "Malaysia", 
      "Maldives", 
      "Mali", 
      "Malta", 
      "Marshall Islands", 
      "Martinique", 
      "Mauritania", 
      "Mauritius", 
      "Mayotte", 
      "Mexico", 
      "Micronesia", 
      "Midway Islands", 
      "Moldova", 
      "Monaco", 
      "Mongolia", 
      "Montenegro", 
      "Montserrat", 
      "Morocco", 
      "Mozambique", 
      "Myanmar", 
      "Namibia", 
      "Nauru", 
      "Navassa Island", 
      "Nepal", 
      "Netherlands", 
      "Netherlands Antilles", 
      "New Caledonia", 
      "New Zealand", 
      "Nicaragua", 
      "Niger", 
      "Nigeria", 
      "Niue", 
      "Norfolk Island", 
      "North Korea", 
      "North Sea", 
      "Northern Mariana Islands", 
      "Norway", 
      "Oman", 
      "Pacific Ocean", 
      "Pakistan", 
      "Palau", 
      "Palmyra Atoll", 
      "Panama", 
      "Papua New Guinea", 
      "Paracel Islands", 
      "Paraguay", 
      "Peru", 
      "Philippines", 
      "Pitcairn Islands", 
      "Poland", 
      "Portugal", 
      "Puerto Rico", 
      "Qatar", 
      "Reunion", 
      "Republic of the Congo", 
      "Romania", 
      "Russia", 
      "Rwanda", 
      "Saint Helena", 
      "Saint Kitts and Nevis", 
      "Saint Lucia", 
      "Saint Pierre and Miquelon", 
      "Saint Vincent and the Grenadines", 
      "Samoa", 
      "San Marino", 
      "Sao Tome and Principe", 
      "Saudi Arabia", 
      "Senegal", 
      "Serbia", 
      "Seychelles", 
      "Sierra Leone", 
      "Singapore", 
      "Slovakia", 
      "Slovenia", 
      "Solomon Islands", 
      "Somalia", 
      "South Africa", 
      "South Georgia and the South Sandwich Islands", 
      "South Korea", 
      "Spain", 
      "Spratly Islands", 
      "Sri Lanka", 
      "Sudan", 
      "Suriname", 
      "Svalbard", 
      "Swaziland", 
      "Sweden", 
      "Switzerland", 
      "Syria", 
      "Taiwan", 
      "Tajikistan", 
      "Tanzania", 
      "Thailand", 
      "Togo", 
      "Tokelau", 
      "Tonga", 
      "Trinidad and Tobago", 
      "Tromelin Island", 
      "Tunisia", 
      "Turkey", 
      "Turkmenistan", 
      "Turks and Caicos Islands", 
      "Tuvalu", 
      "Uganda", 
      "Ukraine", 
      "United Arab Emirates", 
      "United Kingdom", 
      "USA", 
      "Uruguay", 
      "Uzbekistan", 
      "Vanuatu", 
      "Venezuela", 
      "Viet Nam", 
      "Virgin Islands", 
      "Wake Island", 
      "Wallis and Futuna", 
      "West Bank", 
      "Western Sahara", 
      "Yemen", 
      "Yugoslavia", 
      "Zambia", 
      "Zimbabwe"
    );

    //REGISTRAMOS JS NECESARIOS
    wp_register_script( 'jquery-ui', plugins_url('/js/jquery-ui-1.8.22.custom.min.js', __FILE__), false, "1.8.22", true );
    wp_print_scripts( 'jquery-ui' );
    wp_register_script( 'multiselect', plugins_url('/js/jquery.multiselect.js', __FILE__), false, "1.12", true );
    wp_print_scripts( 'multiselect' );
    wp_register_script( 'jquery-chosen', plugins_url('/js/chosen.jquery.min.js', __FILE__), false, false, true );
    wp_print_scripts( 'jquery-chosen' );
    wp_register_script( 'contacto-scripts', plugins_url('/js/ciudadanias-contacto-scripts.js?nocache=1234', __FILE__), false, false, true );
    wp_print_scripts( 'contacto-scripts' );

    //OBTENEMOS EL TIPO DE FORMULARIO
    $type = empty($instance['type'])? '' : $instance['type'];

    //Comprobamos la variante de los forms
    $isEmpresa = get_post_meta( $post->ID, 'form-variant', true ) == 'empresa';
    $isLegales = get_post_meta( $post->ID, 'form-variant', true ) == 'legales';

    //INICIALIZAMOS LOS CAMPOS
    $nombre     = false;
    $email      = false;
    $ubicacion  = false;
    $residencia = false;
    $nacimiento = false;
    $servicios  = false;

    //WEB CUENTA CON LA VARIANTE EMPRESA Y ASCENDENCIAS [LEER LINEA 10]
    $empresa    = $isEmpresa?true:false;

    //Debido a que en web pueden haber muchas variantes realizamos las siguientes comprobaciones.
    $ascendencia= $isLegales?false:true; //Legales y Country Contact no llegan el campo ascendencia el resto de los formularios si
    $servicios  = $isLegales?true:false;
    $telefono   = $isLegales?false:true; //Legales y Country Contact no llegan el campo telefono el resto de los formularios si


    //DEPENDIENDO DEL TIPO DE FORMULARIO ACTIVAMOS LOS CAMPOS NECESARIOS
    switch( $type ){
      case 'CountryContact':
        $form_type  = $type;
        $nombre     = true;
        $email      = true;
        $residencia = true;
        $nacimiento = true;
      break;

      case 'Legales':
        $form_type  = $type; 
        $nombre     = true;
        $email      = true;
      break;

      case 'Facebook':
        $form_type  = $type;
        $nombre     = true;
        $email      = true;
      break;

      case 'Web':
        $form_type  = $type;
        $nombre     = true;
        $email      = true;
      break;

      case 'Landing':
        $form_type  = $type;
        $nombre     = true;
        $email      = true;
      break;

      default: 
        $form_type  = 'default';
        $nombre     = true;
        $email      = true;
      break;
    }
    

    //FORM TYPE DEFINITION
    //Definimos el tipo de formulario para luego enviar esta informacion a tpl_ajax_contacto.php
    //quien se encargara de preparar y enviar la consulta a ciudadanias
    if ($isLegales){
      $form_type  = 'Legales';
    }

    //PREGUNTAR POR ESTAS LINEAS QUE NO CONTINEN NADA
    echo $args["before_widget"];
    echo $args["before_title"] . '' . $args["after_title"];
  ?>

    <!-- OPEN FORM CONTAINER -->
    <div class="formWrapper">
      <form class="wpcf7-form" method="post" action="">
        
        <?php if($nombre){ ?>
          <!-- NOMBRE Y APELLIDO -->
          <label for="nombre">Nombre y Apellido<span class="form-star">*</span></label><br/>
          <span class="wpcf7-form-control-wrap nombre">
            <input type="text" name="nombre" id="nombre" size="40" class="wpcf7-text wpcf7-validates-as-required right-form-input">
          </span>
        <?php } ?>



        <?php if($telefono){ ?>
          <!-- TELEFONO -->
          <label for="telefono">Teléfono</label>
          <span class="wpcf7-form-control-wrap telefono">
            <input type="text" name="telefono" id=telefono"" size="40" class="wpcf7-text right-form-input">
          </span>
        <?php } ?>



        <?php if($empresa){ ?>
          <!-- EMPRESA -->
          <label for="empresa">Empresa</label>
          <span class="wpcf7-form-control-wrap empresa">
            <select name="empresa" class="wpcf7-select right-form-select">
              <option></option>
              <?php foreach ( $empresas as $e ){ echo '<option value="'.$e.'">'.$e.'</option>'; } ?>
            </select>
          </span>
        <?php } ?>



        <?php if($email){ ?>
          <!-- EMAIL -->
          <label for="email1">Email <span class="form-star">*</span></label>
          <span class="wpcf7-form-control-wrap email1"><input type="text" size="40" class="wpcf7-text wpcf7-validates-as-email wpcf7-validates-as-required right-form-input" value="" name="email1" id="email1" /></span>
         
          <label for="email2">Confirmar Email <span class="form-star">*</span></label>
          <span class="wpcf7-form-control-wrap email2"><input type="text" size="40" class="wpcf7-text wpcf7-validates-as-email wpcf7-validates-as-required right-form-input" value="" name="email2"></span>
        <?php } ?>
        


        <?php if($ubicacion){ ?>
          <!-- UBICACION -->
          <label class="hola">Ubicación</label>
          <span class="wpcf7-form-control-wrap ubicacion">
            <span class="wpcf7-radio">
              <span class="wpcf7-list-item">
                <input type="radio" value="Capital Federal" name="ubicacion">
                <span class="wpcf7-list-item-label">Capital Federal</span>
              </span>
              <span class="wpcf7-list-item">
                <input type="radio" value="Gran Buenos Aires" name="ubicacion">
                <span class="wpcf7-list-item-label">Gran Buenos Aires</span>
              </span>
              <span class="wpcf7-list-item">
                <input type="radio" value="Otros" name="ubicacion">
                <span class="wpcf7-list-item-label">Otros</span>
              </span>
            </span>
          </span>
        <?php } ?>



        <?php if($ascendencia){ ?>
          <!-- ASCENDENCIAS -->
          <label for="ascendencia" class="ascendencia">¿Qué ascendencia europea tenes? <span class="form-star">*</span><br/><span class="font-min">(Clickear uno o mas)</span></label>
          <span class="wpcf7-form-control-wrap ascendencia clearfix">
            <div class="column left">
              <div><input type="checkbox" name="ascendencia" value="italiana"><label>Italiana</label></div>
              <div><input type="checkbox" name="ascendencia" value="francesa"><label>Francesa</label></div>
              <div><input type="checkbox" name="ascendencia" value="polaca"><label>Polaca</label></div>
              <div><input type="checkbox" name="ascendencia" value="alemana"><label>Alemana</label></div>
            </div>

            <div class="column left">
              <div><input type="checkbox" name="ascendencia" value="espanola"><label>Española</label></div>
              <div><input type="checkbox" name="ascendencia" value="portuguesa"><label>Portuguesa</label></div>
              <div><input type="checkbox" name="ascendencia" value="croata"><label>Croata</label></div>
            </div>

            <div style="clear:both;"></div>

            <div><input type="checkbox" name="ascendencia" value="otro"><label>De otro país europeo</label></div>
            <div><input type="checkbox" name="ascendencia" value="pareja_italiana"><label>Mi esposo/a tiene ciudadania italiana</label></div>
          </span>
          
          <label class="ascendencia clearfix">Complet&aacute; el formulario y asesorate con uno de nuestros profesionales.</label>
        <?php } ?>



        <?php if($residencia){ ?>
          <!-- PAIS RESIDENCIA -->
          <label for="paisResidencia">Pais de residencia <span class="form-star">*</span></label><br/>
          <span class="wpcf7-form-control-wrap clearfix">
            <select class="right-form-select chosen-select" name="paisResidencia" data-placeholder="Elija una opci&oacute;n">
              <option value=""></option>
              <option value="Argentina">Argentina</option>
              <option disabled value="----------------">--</option>
              <?php foreach( $paises as $pais ){ ?>
                <option value="<?php echo $pais; ?>"><?php echo $pais; ?></option>
              <?php } ?>
            </select>
          </span>

          <!-- PREGUNTAR POR ESTA LINEA OCULTA -->
          <span class="ascendencia"><input type="checkbox" name="ascendencia" value="polaca" checked="checked" /></span>
        <?php } ?>



        <?php if($nacimiento){ ?>
          <!-- PAIS NACIMIENTO -->
          <label for="paisNacimiento">Pais de nacimiento <span class="form-star">*</span></label><br/>
          <span class="wpcf7-form-control-wrap clearfix">
            <select class="right-form-select chosen-select" name="paisNacimiento" data-placeholder="Elija una opci&oacute;n">
              <option value=""></option>
              <option value="Argentina">Argentina</option>
              <option disabled value="----------------">--</option>
              <?php foreach( $paises as $pais ){ ?>
                <option value="<?php echo $pais; ?>"><?php echo $pais; ?></option>
              <?php } ?>
            </select>
          </span>
        <?php } ?>
        
        <!-- SERVICIOS -->
        <?php if($servicios){ echo $this->render_service_options(true); } ?>

        <!-- FORM TYPE -->
        <input type="hidden" name="form-type" value="<?php echo (isset($form_type))? $form_type:'default' ?>"/>
        
        <!-- ORIGEN DEL FORMULARIO (FACEBOOK / WEB) -->
        <input type="hidden" name="form-origen"  value="<?php echo (isset($_GET['origen'])) ? $_GET['origen'] : 'Web' ?>"/> 
        
        <!-- SUBMIT -->
        <input type="submit" class="wpcf7-submit" id="send-btn" value="Enviar"><img src="http://www.ciudadaniaseuropeas.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;" class="ajax-loader"><p></p>
      </form><!-- CLOSE FORM -->
    </div> <!-- CLOSE FORM CONTAINER -->

  <?php
  echo $args["after_widget"];
  } 
}
