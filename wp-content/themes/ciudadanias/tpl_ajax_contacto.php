<?php
/**
 * Template Name: Ajax Contacto
 */





//==============================//
//        MODO DEVELOPER        //
//==============================//
define("Developer", false);
define("DeveloperAccount", 'zarco@gm2dev.com');

// ali@gm2dev.com
// jonathan@gm2dev.com





function getResponseBody( $post_id ){
  global $wpdb;

  $query = "
    SELECT wp_posts.*
    FROM wp_posts
    WHERE wp_posts.ID = %d ";

  $body = $wpdb->get_row( $wpdb->prepare($query, $post_id ), ARRAY_A );

  if( isset($body['post_content']) ){
    return $body['post_content'];
  }else{
    return false;
  }
} 

//--------------------------------------------
// ERRORS HANDLE
//--------------------------------------------
$result = array(
  'error' => 0,
  'success' => 0,
  'message' => null
);

$error_ascendencia = "No se seleccionó ninguna ascendencia";
$error_empresa     = "No se seleccionó ninguna empresa";
$success_message   = "Un consultor se contactará con vos. Gracias.";


// ids para respuesta simple ( ciudadania=>post_id )
$respuesta_simple = array(
  'italiana' => 687,
  'espanola' => 692,
  'francesa' => 691,
  'portuguesa' => 702,
  'polaca' => 700,
  'croata' => 701,
  'alemana' => 773,
  'otro' => 704,
  'pareja_italiana' => 703,
  'sefaradi' => 947
);


//--------------------------------------------
// CHECKING WEB BRANCH
//--------------------------------------------
// TRUE FOR ALL FORMS BUT NOT FOR LEGALES
// FALSE FOR LEGALES FORM
$esWebServicio =      $_GET['form-type'] === 'Web' && isset($_GET['servicio']);
$esWebAscendencias =  $_GET['form-type'] === 'Web' && isset($_GET['ascendencias']);

// Check if escendencias selected
$ascendencias = array();
if ( $esWebAscendencias ){
  if ( !isset( $_GET['ascendencias'] ) ){
    $result['error'] = 1;
    $result['message'] = $error_ascendencia;    
    echo json_encode( $result ); die;
  }
  $ascendencias = explode(',', $_GET['ascendencias']);
}

//--------------------------------------------
// CHECKING IF IS A BUSINESS
//--------------------------------------------
$caller = parse_url($_SERVER["HTTP_REFERER"]);
$esPaginaEmpresas = $caller["path"] == "/tramitamos-tu-ciudadania-europea-empresas/";
$esLegalesLanding = $caller["path"] == "/departamento_servicios_legales/";
$isDondeReciclo   = $caller["path"] == "/tramitamos-tu-ciudadania-europea-dondereciclo-org/";

// Check empresa elegida
if ( $esPaginaEmpresas ){
  if( isset($_GET['empresa']) || trim($_GET['empresa']) == '' ){
    $result['error'] = 1;
    $result['message'] = $error_empresa;
    echo json_encode( $result ); die;
  }
}


  
// Si tiene una ascendencia seleccionada
if( count($ascendencias) == 1 ){
  $post_id = $respuesta_simple[ $ascendencias[0] ];
}else{
  // Si tiene mas de una ascendencia seleccionada 
  //==============================================

  // 1 -> CUANDO 1 O MAS PAISES ES (ITALIA, POLONIA, PORTUGAL, CROACIA) -> ID 693
  // 2 -> CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE ESPAÑA -> ID 694
  // 3 -> CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE FRANCIA -> ID 695
  // 4 -> CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE ESPAÑA Y DE FRANCIA -> ID 696
  // 5 -> CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE UN 3ER PAIS + ESPAÑA // 3 ->ER PAIS + FRANCIA -> ID 705
  // 6 -> ITALIA POR MATRIMONIO + ESPAÑA -> ID 706 
  // 7 -> ITALIA POR MATRIMONIO + FRANCIA -> ID 707
  // 8 -> ITALIA POR MATRIMONIO + ESPAÑA Y FRANCIA -> ID 708 
  // 9 -> ITALIA POR MATRIMONIO + 3ER PAIS -> ID 709

  if ( !isset($_GET['servicio']) ){

    // ITALIA POR MATRIMONIO
    if( in_array( 'pareja_italiana', $ascendencias ) ){
      // ITALIA POR MATRIMONIO + 3ER PAIS
      if( in_array( 'otro', $ascendencias ) ){ $post_id = 709; }
      // ITALIA POR MATRIMONIO + ESPAÑA Y FRANCIA
      if( in_array( 'espanola', $ascendencias ) && in_array( 'francesa', $ascendencias ) ){ $post_id = 708; }
      // ITALIA POR MATRIMONIO + FRANCIA
      if( in_array( 'francesa', $ascendencias ) ){ $post_id = 707; }
      // ITALIA POR MATRIMONIO + ESPAÑA
      if( in_array( 'espanola', $ascendencias ) ){ $post_id = 706; }
    }

    // CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA)
    if( !in_array( 'italiana',$ascendencias ) && !in_array( 'polaca',$ascendencias ) && !in_array( 'portuguesa',$ascendencias ) && !in_array( 'croata',$ascendencias ) ){
      // Y SI TIENE ASCENDENCIA DE UN 3ER PAIS + ESPAÑA // 3ER PAIS + FRANCIA
      if( in_array( 'otro', $ascendencias ) && (in_array( 'espanola', $ascendencias ) || in_array( 'francesa', $ascendencias )) ){ $post_id = 705; }
      // Y SI TIENE ASCENDENCIA DE ESPAÑA Y DE FRANCIA
      if( in_array( 'espanola', $ascendencias ) && in_array( 'francesa', $ascendencias ) ){ $post_id = 696; }
    }

    // CUANDO 1 O MAS PAISES ES (ITALIA, POLONIA, PORTUGAL, CROACIA)
    if( in_array( 'italiana',$ascendencias ) || in_array( 'polaca',$ascendencias ) || in_array( 'portuguesa',$ascendencias ) || in_array( 'croata',$ascendencias ) ){ $post_id = 693; }

  } else {
    $post_id = 709;
  }
}

// Si encontre el id de la respuesta automatica hago la consulta para obtener el body del mail.
if( $post_id ){
  // Send mail to user
  $message = getResponseBody( $post_id );

  if( $message ){
    $message = strip_tags( nl2br($message), '<strong><a><br>');
    $body ='<body marginheight="0" marginwidth="0" topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0">
              <table cellpadding="0" cellspacing="0" border="0" width="100%">
                <tr>
                  <td align="center">
                    <table cellpadding="0" cellspacing="0" border="0" width="552">
                      <tr><td align="center" valign="top" height="184"><img src="http://www.ciudadaniaseuropeas.com/img/mail_header_3.jpg" height="184" width="552" border="0" style="display:block;" /></td></tr>
                      <tr><td align="left" valign="top" height="10">&nbsp;</td></tr>
                      <tr><td align="left" valign="top" style="font-size:12px;line-height:16px;color:#808080;font-family:verdana;">'.$message.'</td></tr>
                      <tr>
                        <td align="left" valign="top">
                          <div>
                            <font style="letter-spacing:normal;text-transform:none;white-space:normal;word-spacing:0px;" size="6"><span style="color:rgb(153,153,153)">................</span></font>
                          </div>
                          <div>
                            <span style="font-family:arial, sans-serif;font-size:13px;line-height:14px;"><b><span style="line-height:12px;font-family:Verdana;color:rgb(51,51,51);font-size:8.5pt" ><span style="color:rgb(0,204,204)"><span style="color:rgb(0,0,153)"><span style="color:rgb(0,0,102)">Ciudadaniaseuropeas</span><span style="color:rgb(153,153,153)"><span style="color:rgb(0,0,102)">.</span>com</span></span></span></span></b></span>
                          </div>
                          <div>
                            <span style="line-height:14px;"><a style="color:rgb(0,0,204)" href="http://www.facebook.com/ciudadanias.europeas" target="_blank"><u><span style="line-height:12px;font-family:Verdana;color:rgb(51,51,51);font-size:8.5pt"><img src="http://www.ciudadaniaseuropeas.com/img/mail_facebook.png" height="15" width="15"></span></u></a></span>
                            <span style="line-height:14px;"><span style="line-height:12px;font-family:Verdana;color:rgb(51,51,51);font-size:8.5pt">Seguinos en Facebook</span></span>
                          </div>
                          <div>
                            <span style="color:rgb(102,102,102);font-family:Verdana;font-size:11px;line-height:11px;">
                              Av. Córdoba 838 Piso 7 Oficina 13.<br/>
                              C1054AAU. CABA. Argentina.<br/>
                              Tel.&nbsp; 4393-7070 Líneas rotativas.<br/>
                              Skype:</span> ciudadaniaseuropeas.com
                            </span>
                          </div>
                          <div>
                            <span style="line-height:14px;"><u><span style="line-height:12px;font-family:Verdana;color:rgb(102,102,102);font-size:8.5pt" >Solicitar entrevista previa</span></u></span>
                          </div>
                          <div style="margin-top:3px;">
                            <span style="color:#006600;font-size:10px;line-height:14px;font-family:Verdana;">+ Antes de imprimir, piense en el medio ambiente.</span>
                          </div>
                        </td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>
            </body>';

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $to = $_GET['email1'];

    $subject = 'Consulta enviada por ' . $_GET['nombre'];

    // agregar ubicacion
    if( isset($_GET['ubicacion']) && !empty($_GET['ubicacion']) ){
      $subject .= " - " . $_GET['ubicacion'];
      if( $_GET['ubicacion'] == "Gran Buenos Aires" && isset($_GET['localidad']) && !empty($_GET['localidad']) ){
        $subject .= " (".$_GET['localidad'].")";
      }
    }

    //$envio = wp_mail( $to, $subject, $body, $headers );
    //$envio = mail( "info@ciudadaniaseuropeas.com", $subject, $body, $headers ); //TEST ONLY
    //$envio = mail( "gescribano@gm2dev.com", $subject, $body, $headers ); //TEST ONLY
    
    $envio = true; //Forzado en true para evitar ERROR

    if( $envio ){
      $result['error'] = 0;
      $result['success'] = 1;
      //$result['message'] = "Tu mensaje ha sido enviado exitosamente. Revisá tu casilla en algunos minutos.";
      $result['message'] = "Un consultor se contactará con vos. Gracias.";
    }else{
      $result['error'] = 1;
      $result['message'] = "Error al intentar enviar.";
    }

  }else{

    $result['error'] = 1;
    $result['message'] = "Error al intentar enviar.";

  }
  // Send mail to ciudadanias
  $to_ce = "info@ciudadaniaseuropeas.com, ciudadanias.mailings@gmail.com";
}


//--------------------------------------------
//    UBICACION
//--------------------------------------------
$ubicacion = "";
if( isset($_GET['ubicacion']) && !empty($_GET['ubicacion']) ){
  $ubicacion .= "Ubicación: ";
  $ubicacion .= $_GET['ubicacion'];
  if( $_GET['ubicacion'] == "Gran Buenos Aires" && isset($_GET['localidad']) && !empty($_GET['localidad']) ){
    $ubicacion .= "<br/>Localidad: ".$_GET['localidad'];
  }
}



//--------------------------------------------
//    FORMATEANDO EMAIL ENVIADO A CIUDADANIAS
//--------------------------------------------
$subject_ce = ""; // ASUNTO DEL EMAIL
$body_ce = ""; // CUERPO DEL EMAIL

/*Completamos el asunto y el cuerpo del correo dependiendo del Form que envio el usuario */
switch( $_GET['form-type'] ){
  
  //FORM DE LA WEB DE CIUDADANIA
  case 'Web':

    if($_GET['form-origen'] == 'Facebook'){
      $subject_ce .= "[Facebook - Ciudadanias] ";
    }else{
      $subject_ce .= "[Web - Ciudadanias] ";
    }

    if ( isset($_GET['servicio']) ) {
      $subject_ce .= $_GET['nombre'] . " | " . $_GET['servicio'] . " | " . $_GET['otro-tramite'] . $_GET['otro-servicio'];
    } else {
      $subject_ce .= $_GET['nombre'];
    }

    $body_ce .= "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>
                Teléfono: ".$_GET['telefono']."<br/>"
                .$ubicacion."<br/>"
                ;
  break;

  //FORM DE LA LANDING CIUDADANIAS
  case 'Landing':
    if ( $isDondeReciclo ){

      $subject_ce .= "[Dondereciclo.org] " . $_GET['nombre'];

    } elseif ( $esPaginaEmpresas ){

      $subject_ce .= "[Landing Empresas] " . $_GET['empresa'];

    } else {

      if($_GET['form-origen'] == 'Facebook'){
          $subject_ce .= "[Facebook - Ciudadanias] ";
      }else{
        $subject_ce .= "[Landing - Ciudadanias] ";
      } 

      $subject_ce .= $_GET['nombre'];
    }

    $body_ce .= "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>";
                "Teléfono: ".$_GET['telefono']."<br/>
                ".$ubicacion;
  break;

  //FORM DE LA LANDING CIUDADANIAS EN FACEBOOK
  case 'Facebook':
    $subject_ce .= "[Facebook] ";

    $body_ce .= "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>";
                "Teléfono: ".$_GET['telefono']."<br/>
                ".$ubicacion;
  break;

  //FORM DE COUNTRY CONTACT
  case 'CountryContact':
    $subject_ce .= "[Landing CE Polaca] ";

    $body_ce .= "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>
                País de residencia: ".$_GET['paisResidencia'];
  break;

  //FORM DE LA LANDING LEGALES EN FACEBOOK (2014)
  case 'Legales':
    $subject_ce = "[Web - Legales - ";
    
    if($_GET['form-origen'] == 'Facebook'){
      $subject_ce = "[Facebook - Legales - ";
    }
    if($esLegalesLanding){
      $subject_ce = "[Landing - Legales - ";
    }
        

    $subject_ce.= $_GET["servicio"]. "] " . $_GET['nombre'] . " | " . $_GET['servicio'] . " | " . $_GET['otro-tramite'] . $_GET['otro-servicio'];

    $body_ce .= "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>
                Lugar de recidencia: ".$_GET['lugar-residencia'];
  break;

  //DEFAULT
  default:
    $subject_ce .= "[Web - Ciudadanias] ";

    $body_ce .= "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>";
                "Teléfono: ".$_GET['telefono']."<br/>
                ".$ubicacion;
  break;
}


//--------------------------
//    EXTENSION DEL SUBJECT
//--------------------------

// + ASCENDENCIA
if( $_GET['form-type'] != 'CountryContact' && $_GET['form-type'] != 'Legales' && $_GET['ascendencias'] != ''){
  $subject_ce .= " | " . $_GET['ascendencias'];
}

// + UBICACION
if( isset($_GET['ubicacion']) ){
  $subject_ce .= " | " . $_GET['ubicacion'];
}

// Agregar el valor de origen enviado por url si viene en el referer 
// EJ: http://www.ciudadaniaseuropeas.com/tramitamos-tu-ciudadania-espanola/?origen=GoogleDisplay
if ( isset($caller["query"]) ){
  $subject_ce .= " | " . $caller["query"];
}


//-----------------------
//    EXTENSION DEL BODY
//-----------------------

// + OTROS TRAMITES
$body_ce .= $_GET['otros-tramites']!=""?"<br/><br/><strong>Otro tramite: ".$_GET['otros-tramites']."<strong><br/>":"";

// + OTROS SERVICIOS
$body_ce .= $_GET['otro-servicio']!=""?"<br/><br/><strong>Otro servicio: ".$_GET['otro-servicio']."<strong><br/>":"";

// + ASCENDENCIA
if( isset($ascendencias) && $_GET['form-type'] != 'CountryContact' ){
  $body_ce .= "<br/>".$_GET['ascendencias'];
}


//---------------------------
//    ARMADO DE LA CONSULTA
//---------------------------

$consulta = ( isset($_GET['consulta']) )? $_GET['consulta']:null;

if( $consulta!=null ){
  $body_ce .= "<br/><br/>Consulta:<br/>".$consulta;
}

$body_ce .= "<br/><br/><strong>Este mail ya recibió respuesta de forma automática (AWSEDTN88QW)<strong><br/>";

$headers_ce  = 'MIME-Version: 1.0' . "\r\n";
$headers_ce .= 'From: '.$_GET['email1']. "\r\n";
$headers_ce .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Send mail to ciudadanias
$to_ce = "info@ciudadaniaseuropeas.com";

if ( $esPaginaEmpresas ){
  $to_ce .= ", ccastanopellegrino@gmail.com"; 
}

if ( isset($_GET['servicio']) ) {
  $to_ce = "legales@ciudadaniaseuropeas.com";
}

if ( $_GET['form-type'] == 'Legales' ) {
  $to_ce = "legales@ciudadaniaseuropeas.com";
}

// ENVIANDO CONSULTA
mail( $to_ce, $subject_ce, $body_ce, $headers_ce );

//Correo de backup para todas las consultas
mail( 'ciudadanias.mailings@gmail.com', $subject_ce, $body_ce, $headers_ce );
//mail( 'ciudadaniaseuropeas.adw@gmail.com', $subject_ce, $body_ce, $headers_ce ); -> Dejo de ser utilizado 07/12/2014

//Developers accounts (FOR TEST ONLY)
if (Developer){
  mail( DeveloperAccount, $subject_ce, $body_ce, $headers_ce );
}

$result['formType'] = $_GET['form-type'];

$result['error'] = 0;
$result['success'] = 1;
$result['message'] = $success_message;

echo json_encode( $result );