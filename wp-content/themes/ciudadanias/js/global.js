$(document).ready(function(){

	//valido mails coinciden en form de contacto
	if ( $(".wpcf7-form input[name=email2]").length ){
	  
    $('.wpcf7-form input[name=email2]').bind("cut copy paste",function(e) {
      e.preventDefault();
    });

		$(".wpcf7-form input[name=email2]").keyup(function(){

			//Store the password field objects into variables ...
			var pass1 = $(".wpcf7-form input[name=email1]");
			var pass2 = $(".wpcf7-form input[name=email2]");
			//Set the colors we will be using ...
			var goodColor = "#66cc66";
			var badColor = "#ff6666";
			//get submit button
			var submitbutton = $(".wpcf7-form .wpcf7-submit");
			//Compare the values in the password field and the confirmation field
			if( pass1.val() == pass2.val() ){
				//The passwords match.
				//Set good color and inform user of correct password
				pass2.css("background-color",goodColor);
				submitbutton.attr("disabled",false);
			}
			else{
				//The passwords do not match.
				//Set bad color and notify the user.
				pass2.css("background-color",badColor);
				submitbutton.attr("disabled","disabled");
			}
			
		});
		
	}
	
});