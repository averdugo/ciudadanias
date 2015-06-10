$(document).ready(function(){
  // Remove disabled att
  $('#send-btn').removeAttr('disabled');

  $.validator.setDefaults({ ignore: ":hidden:not(select)" })
  // Validate
  $(".contactoCiudadanias form").validate({
    onfocusout: false,
    onkeyup: false,
    onclick: false,
    focusInvalid: false,
    rules: {
      nombre: 'required',
      'ascendencia': 'required',
      email1: {
        required: true,
        email: true
      },
      email2: {
        equalTo: '#email1'
      },
      'lugar-residencia': 'required',
      servicio: 'required',
      'otro-tramite': 'required'
    },
    messages:{
      nombre: 'Por favor completa este campo.',
      email1: {
        required: 'Por favor completa este campo.',
        email: 'Por favor ingresa un email válido.'
      },
      email2: {
        equalTo: 'El email no coincide.'
      },
      ascendencia: {
        required: 'Por favor elige al menos una opcion de ascendencia.'
      },
      servicio: 'Por favor completa este campo.',
      'otro-tramite': 'Por favor completa este campo.'
    },
    errorPlacement: function(error, element) {
      if ( element.attr("name") == "ascendencia" )
          $("span.ascendencia").append( error );
        else
            error.insertAfter(element);
    },
    submitHandler: function(){
      // Remove message box
      $("#submitMsgBox").remove();
      // Ajax loader
      $('.contactoCiudadanias .ajax-loader').css("visibility","visible");
      $('#send-btn').attr('disabled','disabled');
      $('#send-btn').addClass('disabled');
      // Serialize form data
      var formData = $(".contactoCiudadanias form").serialize();
      // format ascendencias
      var ascendenciaE = $(".contactoCiudadanias form .ascendencia input:checkbox:checked");
      $.each( ascendenciaE, function( index,value ){
        if( index == 0 ){
          formData += '&ascendencias=';
        }else{
          formData += ',';
        }
        formData += $(value).val();
      });
      // Ajax call
      $.ajax({
        url: '/ajax-contacto/',
        data: formData,
        dataType: 'json',
        success: function(result){
            
          // Incluir conversion code en landing y que no sea la de facebook.
          

          if (result.formType == 'Legales') {
            //Deprecated
            //var google_conversion_language = "en";
            //var google_conversion_format = "1";
            //var google_conversion_color = "666666";
            //var google_conversion_label = "OovZCLnXPhDz4of_Aw";
            //var googleCodeUrl = 'https://www.googleadservices.com/pagead/conversion/'+google_conversion_id+'/?value='+google_conversion_value+'&label='+google_conversion_label+'&guid=ON&script=0';
            
            var google_conversion_value = 0;
            var google_conversion_id = 969797741;
            var google_custom_params = window.google_tag_params;
            var google_remarketing_only = true;

            $.getScript( "https://www.googleadservices.com/pagead/conversion.js" );
            var googleCodeUrl = 'https://googleads.g.doubleclick.net/pagead/viewthroughconversion/' + google_conversion_id + '/?value=' + google_conversion_value + '&amp;guid=ON&amp;script=0'
            
            //$("body").append('<img scr="'+googleCodeUrl+'" height="1" width="1" border="0"/>');
            $('<img/>')[0].src = googleCodeUrl;

            console.log('Convertion Code Active: ' + googleCodeUrl);
          }
          
          //oculto el loader
          $('.contactoCiudadanias .ajax-loader').css("visibility","hidden");
          //muestro em mensaje de ok del form
          $(".contactoCiudadanias form").append('<div id="submitMsgBox" class="wpcf7-response-output wpcf7-display-none wpcf7-mail-sent-ok" style="display: block;">'+result.message+'</div>');
          
        },
        error: function( errorStr ){
          $('#send-btn').removeAttr('disabled');
          $('#send-btn').removeClass('disabled');
          //muestro em mensaje de ok del form
          alert('Error al enviar, por favor intente nuevamente.');
        }
      });
    }
  });

  // Mostrar localidad si esta seleccionado el radio de GBA.
  if( $("input[name=ubicacion]:checked").val() == "Gran Buenos Aires" ){
    $(".contactoCiudadanias .custom-wpcf7-localidad").show();
  }

  // Events
  $("#submitMsgBox, .contactoCiudadanias form label.error").live({
    mouseover: function(){
      $(this).fadeOut("normal", function(){
        $(this).remove();
      });
    }
  });
  $(".contactoCiudadanias input, .contactoCiudadanias textarea").live({
    focus: function(){
      $(this).parent().find('label.error').fadeOut("normal", function(){
        $(this).remove();
      });
    }
  });
  $(".contactoCiudadanias .ascendencia input:checkbox").live({
    click: function(){
      $(".contactoCiudadanias .ascendencia label.error").fadeOut("normal", function(){
        $(this).remove();
      });
    }
  });
  $(".contactoCiudadanias .ubicacion input").click(function(){
    if( $(this).val() == "Gran Buenos Aires" ){
      $(".contactoCiudadanias .custom-wpcf7-localidad").slideDown();
    }else{
      $(".contactoCiudadanias .custom-wpcf7-localidad").slideUp();
    }
  });
  
  // Chosen
  $(".chosen-select").chosen({ disable_search_threshold: 10 });
});