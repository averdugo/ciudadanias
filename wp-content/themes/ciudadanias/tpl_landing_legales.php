<?php
/**
 * Template Name: Legales 2014
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
  <body <?php body_class(getBrowserClass()." legales-2014"); ?>>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        appId      : '301516146698591',
        xfbml      : true,
        version    : 'v2.1'
      });

      
      // ADD ADDITIONAL FACEBOOK CODE HERE

      /** /
      FB.ui({
        method: 'pagetab',
        redirect_uri: 'https://www.facebook.com/dialog/pagetab?app_id=301516146698591&redirect_uri=www.ciudadaniaseuropeas.com'
      }, function(response){});
      /**/

    };

    (function(d, s, id){
       var js, fjs = d.getElementsByTagName(s)[0];
       if (d.getElementById(id)) {return;}
       js = d.createElement(s); js.id = id;
       js.src = "//connect.facebook.net/en_US/sdk.js";
       fjs.parentNode.insertBefore(js, fjs);
     }(document, 'script', 'facebook-jssdk'));
  </script>
    <div class="main-wraper">
      <div class="home-header-bot israel-header">
        <img class="logo" src="http://www.ciudadaniaseuropeas.com/wp-content/themes/ciudadanias/images/legales-2014/logo-landings-new.png">
      </div>
      <div class="israel-wraper">
        <div id="content-wraper" class="israel-content-wraper">
          <div class="clearfix">
            <div class="col-izq">
              <ul>
                <li>
                  <h3>Sucesiones, Divorcios y otros tr&aacute;mites</h3>
                </li>
                <li>
                  <h3>No hace falta que residas en Capital Federal</h3>
                </li>
                <li>
                  <h3>M&aacute;s de 30.000 clientes ya confiaron <br />en nosotros.</h3>
                </li>
              </ul>
            </div>
            <div class="col-der">
              <div class="content">
                <div class="arrow-up"></div>
                <div class="center">
                  <?php 
                    $type = "Legales";
                    if ( is_active_sidebar( 'contact-form-legales' ) ){
                      dynamic_sidebar( 'contact-form-legales' );
                    }
                  ?>
                </div>
                <div class="arrow-down">
                  <p class="title">comunicate con nostros</p>
                  <p>
                    <span>(+54.11) 4393-7070<span><br/>
                    skype: ciudadaniaseuropeas.com<br/>
                    <a href="mailto:legales@ciudadaniaseuropeas.com" target="_blank">legales@ciudadaniaseuropeas.com</a>
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
          <a href="/legales/">Legales</a>
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