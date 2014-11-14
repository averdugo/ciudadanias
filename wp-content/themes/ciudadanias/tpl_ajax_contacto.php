<?php
/**
 * Template Name: Ajax Contacto
 */

function getResponseBody( $post_id ){
	global $wpdb;

	$query = "
		SELECT wp_posts.*
		  FROM wp_posts
		 WHERE wp_posts.ID = %d
	";

	$body = $wpdb->get_row( $wpdb->prepare($query, $post_id ), ARRAY_A );

	if( isset($body['post_content']) ){
		return $body['post_content'];
	}else{
		return false;
	}

}

// Result array
$result = array(
	'error' => 0,
	'success' => 0,
	'message' => null
);

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

// Check ascendencias
if( isset($_GET['ascendencias']) ){
	$ascendencias = explode(',', $_GET['ascendencias']);
}elseif( !isset($_GET['servicio']) ){
	$result['error'] = 1;
	$result['message'] = "No se seleccionó ninguna ascendencia";
}

$caller = parse_url($_SERVER["HTTP_REFERER"]);

$esPaginaEmpresas = $caller["path"] == "/tramitamos-tu-ciudadania-europea-empresas/";

if ( $esPaginaEmpresas ){
  // Check empresa elegida
  if( isset($_GET['empresa']) && trim($_GET['empresa'])!='' ){
    $empresa = $_GET['empresa'];
  }else{
    $result['error'] = 1;
    $result['message'] = "No se seleccionó ninguna empresa";
  }
}


if ( !$result['error'] ){

  // Si tiene una ascendencia seleccionada
  if( count($ascendencias) == 1 ){
    $post_id = $respuesta_simple[ $ascendencias[0] ]; 
  }
  // Si tiene mas de una ascendencia seleccionada
  else{
    // 1 CUANDO 1 O MAS PAISES ES (ITALIA, POLONIA, PORTUGAL, CROACIA) -> ID 693
    // 2 CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE ESPAÑA -> ID 694
    // 3 CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE FRANCIA -> ID 695
    // 4 CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE ESPAÑA Y DE FRANCIA -> ID 696
    // 5 CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA) Y SI TIENE ASCENDENCIA DE UN 3ER PAIS + ESPAÑA // 3ER PAIS + FRANCIA -> ID 705
    // 6 ITALIA POR MATRIMONIO + ESPAÑA -> ID 706 
    // 7 ITALIA POR MATRIMONIO + FRANCIA -> ID 707
    // 8 ITALIA POR MATRIMONIO + ESPAÑA Y FRANCIA -> ID 708 
    // 9 ITALIA POR MATRIMONIO + 3ER PAIS -> ID 709
  
    if ( !isset($_GET['servicio']) ){

    // ITALIA POR MATRIMONIO
    if( in_array( 'pareja_italiana', $ascendencias ) ){
      // ITALIA POR MATRIMONIO + 3ER PAIS
      if( in_array( 'otro', $ascendencias ) ){
        $post_id = 709;
      }
      // ITALIA POR MATRIMONIO + ESPAÑA Y FRANCIA
      if( in_array( 'espanola', $ascendencias ) && in_array( 'francesa', $ascendencias ) ){
        $post_id = 708;
      }
      // ITALIA POR MATRIMONIO + FRANCIA
      if( in_array( 'francesa', $ascendencias ) ){
        $post_id = 707;
      }
      // ITALIA POR MATRIMONIO + ESPAÑA
      if( in_array( 'espanola', $ascendencias ) ){
        $post_id = 706;
      }
    }
    // CUANDO NINGUN DE LOS PAISES ES (ITALIA, POLONIA, PORTUGAL O CROACIA)
    if( !in_array( 'italiana',$ascendencias ) && !in_array( 'polaca',$ascendencias ) && !in_array( 'portuguesa',$ascendencias ) && !in_array( 'croata',$ascendencias ) ){
      // Y SI TIENE ASCENDENCIA DE UN 3ER PAIS + ESPAÑA // 3ER PAIS + FRANCIA
      if( in_array( 'otro', $ascendencias ) && (in_array( 'espanola', $ascendencias ) || in_array( 'francesa', $ascendencias )) ){
        $post_id = 705;
      }
      // Y SI TIENE ASCENDENCIA DE ESPAÑA Y DE FRANCIA
      if( in_array( 'espanola', $ascendencias ) && in_array( 'francesa', $ascendencias ) ){
        $post_id = 696;
      }
    }
    // CUANDO 1 O MAS PAISES ES (ITALIA, POLONIA, PORTUGAL, CROACIA)
    if( in_array( 'italiana',$ascendencias ) || in_array( 'polaca',$ascendencias ) || in_array( 'portuguesa',$ascendencias ) || in_array( 'croata',$ascendencias ) ){
      $post_id = 693;
    }
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
      $body = '<body marginheight="0" marginwidth="0" topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0">
               <table cellpadding="0" cellspacing="0" border="0" width="100%"><tr><td align="center">
                   <table cellpadding="0" cellspacing="0" border="0" width="552">
                       <tr><td align="center" valign="top" height="184"><img src="http://www.ciudadaniaseuropeas.com/img/mail_header_3.jpg" height="184" width="552" border="0" style="display:block;" /></td></tr>
                       <tr><td align="left" valign="top" height="10">&nbsp;</td></tr>
                       <tr><td align="left" valign="top" style="font-size:12px;line-height:16px;color:#808080;font-family:verdana;">'.$message.'</td></tr>
                       <tr><td align="left" valign="top">
                       
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
                 
                        </td></tr>
                     </table>
                 </td></tr></table>
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
      
      $envio = true; // lo fuerzo en true porque no se por que estaba asi
  
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
    $to_ce = "ciudadaniaseuropeas@gmail.com, ciudadanias.mailings@gmail.com";
    
    $ubicacion = "";
    if( isset($_GET['ubicacion']) && !empty($_GET['ubicacion']) ){
      $ubicacion .= "Ubicación: ";
      $ubicacion .= $_GET['ubicacion'];
      if( $_GET['ubicacion'] == "Gran Buenos Aires" && isset($_GET['localidad']) && !empty($_GET['localidad']) ){
        $ubicacion .= "<br/>Localidad: ".$_GET['localidad'];
      }
    }
  
    // Ascendencias
    $count = 0;
    if( isset($ascendencias) && count($ascendencias) > 0 ){
      $email_ascendencia = "Ascendencia: ";
      foreach( $ascendencias as $asc ){
        if( $count!=0 ){
          $email_ascendencia .= ', ';
        }
        $email_ascendencia .= $asc;
        $count ++;
      }
    }
  
    // Set subject
    $subject_ce = "";
    switch( $_GET['form-type'] ){
      case 'Web':
        if ( isset($_GET['servicio']) ) {
          $subject_ce .= "Consulta desde la WEB: " . $_GET['nombre'] . " | " . $_GET['servicio'];
        } else {
          $subject_ce .= "Consulta desde la WEB: " . $_GET['nombre'];
        }
        break;
      case 'Landing':
        if ( $caller["path"] == "/tramitamos-tu-ciudadania-europea-dondereciclo-org/" ){
          $subject_ce .= "Consulta recibida desde dondereciclo.org " . $_GET['nombre'];
        } elseif ( $esPaginaEmpresas ){
          $subject_ce .= "Consulta recibida desde Landing Empresas - " . $empresa;
        } else {
          $subject_ce .= "Consulta recibida desde Ciudadaniaseuropeas.com " . $_GET['nombre'];
        }
        break;
      case 'Facebook':
        $subject_ce .= "Consulta enviada desde Facebook ";
        break;
      case 'CountryContact':
        $subject_ce .= "Consulta enviada desde Landing CE Polaca";
        break;
      default:
        $subject_ce .= "Consulta Ciudadaniaseuropeas.com ";
        break;
      case 'Legales':
        if ($_GET["servicio"] && $_GET["servicio"] == "sucesion") {
          $subject_ce .= "[Legales - Sucesion] Consulta desde legales";
        } else if ($_GET["servicio"] && $_GET["servicio"] == "divorcio") {
          $subject_ce .= "[Legales - Divorcio] Consulta desde legales";
        } else {
          $subject_ce .= "[Legales - Otros tr&aacute;mites] Consulta desde legales";
        }
        break;
      default:
        $subject_ce .= "Consulta Ciudadaniaseuropeas.com ";
        break;
    }
  
    // agregar ascendencia
    if( $_GET['form-type'] != 'CountryContact' ){
      $subject_ce .= " | " . $email_ascendencia;
    }

    // agregar ubicacion
    if( isset($_GET['ubicacion']) && !empty($_GET['ubicacion']) ){
      $subject_ce .= " | " . $_GET['ubicacion'];
    }

    // Agregar el valor de origen enviado por url si viene en el referer 
    // EJ: http://www.ciudadaniaseuropeas.com/tramitamos-tu-ciudadania-espanola/?origen=GoogleDisplay
    if (isset($caller["query"]) ){
      $subject_ce .= " | " . $caller["query"];
    }
  

    // -- BODY --
    if( $_GET['form-type'] == 'CountryContact' ){
      $body_ce = "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>
                 País de residencia: ".$_GET['paisResidencia'];
    } else if( $_GET['form-type'] == 'Legales' ) {
      $body_ce = "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>";
    } else {
      $body_ce = "De: ".$_GET['nombre']." &lt;". $_GET['email1']. "&gt;<br/>
                 Teléfono: ".$_GET['telefono']."<br/>
                 ".$ubicacion;
    }
  
    // Ascendencia
    if( isset($email_ascendencia) && $_GET['form-type'] != 'CountryContact' ){
      $body_ce .= "<br/>".$email_ascendencia;
    }
  
    // Consulta
    $consulta = ( isset($_GET['consulta']) )? $_GET['consulta']:null;
    if( $consulta!=null ){
      $body_ce .= "<br/><br/>Consulta:<br/>".$consulta;
    }
    $body_ce .= "<br/><br/><strong>Este mail ya recibió respuesta de forma automática (AWSEDTN88QW)<strong><br/>";
    
    $headers_ce  = 'MIME-Version: 1.0' . "\r\n";
    $headers_ce .= 'From: '.$_GET['email1']. "\r\n";
    $headers_ce .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    if ( $esPaginaEmpresas ){
      $to_ce .= ", ccastanopellegrino@gmail.com"; 
    }

    if ( isset($_GET['servicio']) ) {
      $to_ce = "legales@ciudadaniaseuropeas.com";
    }

    if ( $_GET['form-type'] == 'Legales' ) {
      $to_ce = "legales@ciudadaniaseuropeas.com";
    }

    mail( $to_ce, $subject_ce, $body_ce, $headers_ce );
    mail( 'ciudadaniaseuropeas.adw@gmail.com', $subject_ce, $body_ce, $headers_ce );
    //mail( "ali@gm2dev.com", $subject_ce, $body_ce, $headers_ce ); //for test only
    $result['referer'] = $_GET['form-type'];

  }else{
    $result['error'] = 1;
    $result['message'] = "Error al intentar encontrar la respuesta automática.";
  }
  
}

// Return
echo json_encode( $result );