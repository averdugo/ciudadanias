<?php
/*
  Plugin Name: Widget Contacto Ciudadanias
  Description: Formulario contacto para ciudadanias ( Need jquery.validate.js )
  Version: 1.1
  Author: GM2DEV
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
  function widget($args, $instance){

    extract($args);
    global $post;
    
    $esPaginaempresas = $post->ID == 825;
    $esCiudadaniaPolacaEnIsrael = $post->ID == 889;

    $type = empty($instance['type'])? '' : $instance['type'];

    // Register script
    wp_register_script( 'jquery-ui', plugins_url('/js/jquery-ui-1.8.22.custom.min.js', __FILE__), false, "1.8.22", true );
    wp_print_scripts( 'jquery-ui' );
    wp_register_script( 'multiselect', plugins_url('/js/jquery.multiselect.js', __FILE__), false, "1.12", true );
    wp_print_scripts( 'multiselect' );
    wp_register_script( 'jquery-chosen', plugins_url('/js/chosen.jquery.min.js', __FILE__), false, false, true );
    wp_print_scripts( 'jquery-chosen' );
    wp_register_script( 'contacto-scripts', plugins_url('/js/ciudadanias-contacto-scripts.js?nocache=1234', __FILE__), false, false, true );
    wp_print_scripts( 'contacto-scripts' );

    echo $args["before_widget"];
    echo $args["before_title"] . '' . $args["after_title"];
    
    $mpresas = array( "ISIC","Full Benefits","Assist card","Santander","Asociart servicios","AEGIS","Swiss Medical","Telefonica","Movistar","Laser Med","ANSES","ENFASIS","Gran Cooperativa");

    ?>
    <div class="formWrapper">
      <form class="wpcf7-form" method="post" action="">
        <label for="name">Nombre y Apellido<span class="form-star">*</span></label><br/>
        <span class="wpcf7-form-control-wrap nombre">
          <input type="text" size="40" class="wpcf7-text wpcf7-validates-as-required right-form-input" value="" name="nombre">
        </span>

        <?php if( $type != 'CountryContact' && $type != 'Legales' ){ ?>
          <label for="telefono">Teléfono</label>
          <span class="wpcf7-form-control-wrap telefono"><input type="text" size="40" class="wpcf7-text right-form-input" value="" name="telefono"></span>
        <?php } ?>

        <?php if ( $esPaginaempresas ){ ?>
          <label>Empresa</label>
          <span class="wpcf7-form-control-wrap empresa">
            <select name="empresa" class="wpcf7-select right-form-select">
              <option></option>
              <?php
              foreach ( $mpresas as $e ){
                echo '<option value="'.$e.'">'.$e.'</option>';
              } 
              ?>
            </select>
          </span>


        <?php } else if( $type != 'CountryContact' && $type != 'Legales' ){ ?>
          <label>Ubicación</label>
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
        
        <?php if( $type != 'CountryContact' ){ ?>
          <div class="custom-wpcf7-localidad">
            <label for="email1">¿Qué localidad?</label><br/>
            <span class="wpcf7-form-control-wrap localidad"><input type="text" size="40" class="wpcf7-text right-form-input" value="" name="localidad" id="localidad" /></span>
          </div>
        <?php } ?>
        
        <label for="email1">Email <span class="form-star">*</span></label>
        <span class="wpcf7-form-control-wrap email1"><input type="text" size="40" class="wpcf7-text wpcf7-validates-as-email wpcf7-validates-as-required right-form-input" value="" name="email1" id="email1" /></span>
        <label for="email2">Confirmar Email <span class="form-star">*</span></label>
        <span class="wpcf7-form-control-wrap email2"><input type="text" size="40" class="wpcf7-text wpcf7-validates-as-email wpcf7-validates-as-required right-form-input" value="" name="email2"></span>

        <?php if( $type != 'CountryContact' ){ ?>
          <!-- Nuevo 1.1 -->


          <?php

            //if ( preg_match('/legales/',  get_query_var('pagename')) == 0 ) { ?>
          <?php if ( get_query_var('pagename') != "legales" ) { ?>
            <label class="ascendencia">
              ¿Qué ascendencia europea tenes? <span class="form-star">*</span><br/>
              <span class="font-min">(Clickear uno o mas)</span>
            </label>
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
                <? /*
                <div><input type="checkbox" name="ascendencia" value="sefaradi"><label>Sefarad&iacute;</label></div>
                */ ?>
              </div>
              <div style="clear:both;" ><input type="checkbox" name="ascendencia" value="otro"><label>De otro pais europeo</label></div>
              <div><input type="checkbox" name="ascendencia" value="pareja_italiana"><label>Mi esposo/a tiene ciudadania italiana</label></div>
            </span>
          <?php } else { ?>
            <label>Elije tu servicio</label>
            <span class="wpcf7-form-control-wrap clearfix">
              <select class="right-form-select" name="servicio">
                <option></option>
                <option>Sucesiones</option>
                <option>Divorcios</option>
              </select>
            </span>
          <?php } ?>
          
        <!-- Print country selector -->
        <?php } else { ?>
          <?php 
            $countries = array( "Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Armenia", "Arctic Ocean", "Aruba", "Ashmore and Cartier Islands", "Atlantic Ocean", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Baker Island", "Bangladesh", "Barbados", "Bassas da India", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegovina", "Botswana", "Bouvet Island", "Brazil", "British Virgin Islands", "Brunei", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Clipperton Island", "Cocos Islands", "Colombia", "Comoros", "Cook Islands", "Coral Sea Islands", "Costa Rica", "Cote d'Ivoire", "Croatia", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Democratic Republic of the Congo", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Europa Island", "Falkland Islands (Islas Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "French Guiana", "French Polynesia", "French Southern and Antarctic Lands", "Gabon", "Gambia", "Gaza Strip", "Georgia", "Germany", "Ghana", "Gibraltar", "Glorioso Islands", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard Island and McDonald Islands", "Honduras", "Hong Kong", "Howland Island", "Hungary", "Iceland", "India", "Indian Ocean", "Indonesia", "Iran", "Iraq", "Ireland", "Isle of Man", "Italy", "Jamaica", "Jan Mayen", "Japan", "Jarvis Island", "Jersey", "Johnston Atoll", "Jordan", "Juan de Nova Island", "Kazakhstan", "Kenya", "Kingman Reef", "Kiribati", "Kerguelen Archipelago", "Kosovo", "Kuwait", "Kyrgyzstan", "Laos", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia", "Midway Islands", "Moldova", "Monaco", "Mongolia", "Montenegro", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Navassa Island", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "North Korea", "North Sea", "Northern Mariana Islands", "Norway", "Oman", "Pacific Ocean", "Pakistan", "Palau", "Palmyra Atoll", "Panama", "Papua New Guinea", "Paracel Islands", "Paraguay", "Peru", "Philippines", "Pitcairn Islands", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Republic of the Congo", "Romania", "Russia", "Rwanda", "Saint Helena", "Saint Kitts and Nevis", "Saint Lucia", "Saint Pierre and Miquelon", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Serbia", "Seychelles", "Sierra Leone", "Singapore", "Slovakia", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "South Korea", "Spain", "Spratly Islands", "Sri Lanka", "Sudan", "Suriname", "Svalbard", "Swaziland", "Sweden", "Switzerland", "Syria", "Taiwan", "Tajikistan", "Tanzania", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tromelin Island", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "USA", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Viet Nam", "Virgin Islands", "Wake Island", "Wallis and Futuna", "West Bank", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
          ?>
          <label for="email1">Pais de residencia <span class="form-star">*</span></label><br/>
          <span class="wpcf7-form-control-wrap clearfix">
            <select class="right-form-select chosen-select" name="paisResidencia" data-placeholder="Elija una opci&oacute;n">
                <option value=""></option>
                <option value="Israel">Israel</option>
                <option value="Argentina">Argentina</option>
                <option disabled value="----------------">--</option>
              <?php
                foreach( $countries as $country ){
                  ?><option value="<?php echo $country; ?>"><?php echo $country; ?></option><?php
                }
              ?>
            </select>
          </span>
          <span class="ascendencia">
            <input type="checkbox" name="ascendencia" value="polaca" checked="checked" />
          </span>

          <? if ($esCiudadaniaPolacaEnIsrael) { ?>
            <label for="email1">Pais de nacimiento <span class="form-star">*</span></label><br/>
            <span class="wpcf7-form-control-wrap clearfix">
              <select class="right-form-select chosen-select" name="paisNacimiento" data-placeholder="Elija una opci&oacute;n">
                <option value=""></option>
                <option value="Israel">Israel</option>
                <option value="Argentina">Argentina</option>
                <option disabled value="----------------">--</option>
                <?php
                  foreach( $countries as $country ){
                    ?><option value="<?php echo $country; ?>"><?php echo $country; ?></option><?php
                  }
                ?>
              </select>
            </span>
          <? }
        }
        if( $type != 'CountryContact' ){ ?>
          <label class="ascendencia clearfix">Complet&aacute; el formulario y asesorate con uno de nuestros profesionales.</label>
        <?php } ?>

        <?php if( $type == 'Legales' ){ ?>
        <select name="servicio" style="display:block;" id="otrostramites" class="right-form-select chosen-select" data-placeholder="Seleccione un servicio">
          <option value="Sucesiones">Sucesiones</option>
          <option value="Divorcios">Divorcios</option>
          <option value="otros_tramites">Otros tr&aacute;mites</option>
        </select>
        <input type="text" name="otrostramites" id="otrostramites" style="display:none;">
        <div class="servicio" style="display:none;">
          <span class="servicio"><input name="servicio" type="radio" value="sucesion" class="servicio" checked />Sucesi&oacute;n</span>
          <span class="servicio"><input name="servicio" type="radio" value="divorcio" class="servicio" />Divorcio</span>
        </div>
        <?php } ?>

        <!--label for="query">Consulta</label>
        <span class="wpcf7-form-control-wrap consulta"><textarea rows="10" cols="40" class="wpcf7-validates-as-required right-form-textarea" name="consulta"></textarea></span><br/-->
        <input type="hidden" name="form-type" id="form-type" value="<?php echo ( isset($type) )? $type:'' ?>"/>
        <input type="submit" class="wpcf7-submit" id="send-btn" value="Enviar"><img src="http://www.ciudadaniaseuropeas.com/wp-content/plugins/contact-form-7/images/ajax-loader.gif" alt="Sending ..." style="visibility: hidden;" class="ajax-loader"><p></p>
        <!--p class="p-ballon">Si tenés más de un <strong>ascendiente europeo</strong>, señalá cada linea por separado y evaluaremos la mejor opción.<br>Por ejemplo:<br>Bisabuelo italiano &gt; Abuelo &gt; Madre &gt; Yo<br>Abuelo polaco &gt; Padre &gt; Yo</p-->
      </form>
    </div>
    <!-- Google Code for Lead Conversion Page -->
    <?php
    echo $args["after_widget"];
  }

}