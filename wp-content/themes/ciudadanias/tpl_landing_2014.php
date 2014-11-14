<?php
/**
 * Template Name: Landing 2014
 */

$custom_fields = get_post_custom();

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <title><?php
      global $page, $paged;
      wp_title( '|', true, 'right' );
      bloginfo( 'name' );
    ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" ></link>
    <?php wp_head(); ?>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.6.1.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/global.js"></script>
  </head>
  <body <?php body_class(getBrowserClass()." landing-2014"); ?>>
    
    <div class="main-wraper">
      <div class="home-header-bot israel-header">
        <img class="logo" src="http://www.ciudadaniaseuropeas.com/wp-content/themes/ciudadanias/images/landing-2014/logo-landings-new.png">
        <h1>Tramitamos tu ciudadanía Polaca en Israel.</h1>
      </div>
      <div class="israel-wraper">
        <div id="content-wraper" class="israel-content-wraper">
          <div class="clearfix">
            <div class="col-izq">
              <ul>
                <li>
                  <h3>Aceleramos el trámite lo mas posible.</h3>
                </li>
                <li>
                  <h3>Evitá complicaciones en migraciones.</h3>
                </li>
                <li>
                  <h3>Viví y trabajá en Europa sin límite de tiempos.</h3>
                </li>
                <li>
                  <h3>Optá por un programa de Work & Travel evitando el cupo por nacionalidad.</h3>
                </li>
                <li>
                  <h3>Postulate a un posgrado como ciudadano comunitario (hasta el 75% de ahorro).</h3>
                </li>
              </ul>
            </div>
            <div class="col-der">
              <div class="content">
                <div class="arrow-up"></div>
                <div class="center">
                  <?php 
                    if ( is_active_sidebar( 'contact-form-polaca' ) ){
                      dynamic_sidebar( 'contact-form-polaca' );
                    }
                  ?>
                </div>
                <div class="arrow-down">
                  <p class="title">comunicate con nostros</p>
                  <p>
                    <span>(+54.11) 4393-7070<span><br/>
                    skype: ciudadaniaseuropeas.com<br/>
                    <a href="mailto:info@ciudadaniaseuropeas.com" target="_blank">info@ciudadaniaseuropeas.com</a>
                  </p>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>    
    </div>

    <?php wp_footer(); ?>
      <div id="big-footer">
        <div>
          <a href="/">Home</a>
          <a href="/empresa/">Empresa</a>
          <a href="/servicios/">Servicios</a>
          <a href="/ventajas/">Ventajas</a>
          <a href="/leyes/">Leyes</a>
          <a href="/blog/">Blog</a>
          <a href="/contacto/">Contacto</a>
        </div>
      </div>
    <?php //get_template_part( 'googlecode', 'remarketing' ); ?>
    
    <script type="text/javascript">
      //  var _gaq = _gaq || [];
      //  _gaq.push(['_setAccount', 'UA-8922785-1']);
      //  _gaq.push(['_trackPageview']);
      //  (function() {
      //    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        // ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        // var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
      //  })();
    </script>

  </body>
</html>