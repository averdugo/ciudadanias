��    .      �  =   �      �     �  �        �     �     �     �          "     ;     U  Z   e     �  O   �  P   (     y  G     <   �  H     
   M  ?   X  #   �  $   �  Y   �  ^   ;     �     �     �     �     �     �     �     	     	  n    	     �	     �	  �   �	  �   �
     X  �   g  4   �       
   6  2   A     t  I  �     �  �   �     �     �  
   �                '      D     e  c     #   �  g     i   o     �  G   �  P   &  N   w     �  F   �  %     )   A  c   k  `   �  	   0     :     K     _     w     �     �     �     �  e   �     7     F  �   b  �   F     �  �     3   �     �       =        L            $              ,                       )      #   (         '              !                          %       .       	            -       
              &   "      *            +                           Administer site Alernately you can just check the box above and javascript will attempt to rearrange it for you, but editing the comments.php, moving the tag, and unchecking this box is the best solution. All registered users Audible Version of CAPTCHA Audio Version CAPTCHA Code (required) CAPTCHA Image CAPTCHA on Comment Form: CAPTCHA on Register Form: Captcha Options Change the display order of the catpcha input field on the comment form. (see note below). Comment Form Rearrange: Contact your web host and ask them why GD image support is not enabled for PHP. Contact your web host and ask them why imagepng function is not enabled for PHP. ERROR ERROR: si-captcha.php plugin says GD image support not detected in PHP! ERROR: si-captcha.php plugin says captcha_library not found. ERROR: si-captcha.php plugin says imagepng function not detected in PHP! Edit posts Edit your current theme comments.php file and locate this line: Enable CAPTCHA on the comment form. Enable CAPTCHA on the register form. Error: You did not enter a Captcha phrase. Press your browsers back button and try again. Error: You entered in the wrong Captcha phrase. Press your browsers back button and try again. Fix: Hide CAPTCHA for Moderate Comments Options saved. Please complete the CAPTCHA. Problem: Publish Posts Refresh Image Reload Image Sometimes the captcha image and captcha input field are displayed AFTER the submit button on the comment form. Submit Comment That CAPTCHA was incorrect. The best place to locate the tag is before the comment textarea, you may want to move it if it is below the comment textarea, or the captcha image and captcha code entry might display after the submit button. This tag is exactly where the captcha image and captcha code entry will display on the form, so move the line to BEFORE the comment textarea, uncheck the option box above, and the problem should be fixed. Update Options Why is it better to uncheck this and move the tag? because the XHTML will no longer validate on the comment page if it is checked. You do not have permissions for managing this option Your theme must have a registered tag inside your comments.php form. Most themes do. users who can: Project-Id-Version: 1.3
Report-Msgid-Bugs-To: http://wordpress.org/tag/si-captcha-for-wordpress
POT-Creation-Date: 2008-12-14 17:48+0000
PO-Revision-Date: 2009-01-08 00:55+0100
Last-Translator: Roger Sylte <roger@inro.net>
Language-Team: 
MIME-Version: 1.0
Content-Type: text/plain; charset=utf-8
Content-Transfer-Encoding: 8bit
 Administrer websted Eller du kan huke av sjekkboksen, noe som medfører at rekkefølgen blir forsøkt korrigert ved hjelp av JavaScript. Men redigering av comments.php, flytting av tag'en og fjerne hake i sjekkboksen over er den beste løsningen. Alle registrerte brukere Lydversjonen av CAPTCHA Lydversjon CAPTCHA kode (påkrevet) CAPTCHA Bilde CAPTCHA på kommentarskjema: CAPTCHA på registreringsskjema: Innstillinger for Captcha Endre visningsrekkefølgen for captcha inntastingsfelter i kommentarskjema. (se beskrivelse under). Omstrukturering av kommentarskjema: Kontakt administrator for webstedet ditt og spør dem hvorfor GD bildestøtte ikke er aktivert for PHP. Kontakt administrator for webstedet ditt og spør dem hvorfor funksjonen imagepng ikke er aktivert i PHP. FEIL FEIL: si-captcha.php plugin sier GD bildestøtte ikke ble funnet i PHP! FEIL: si-captcha.php plugin sier at biblioteket captcha_library ikke ble funnet. FEIL: si-captcha.php plugin sier at funksjonen imagepng ikke ble funnet i PHP! Endre innlegg Rediger filen comments.php i temaet ditt og lokaliser følgende linje: Skru på CAPTCHA på kommentarskjema. Skru på CAPTCHA på registreringsskjema. FEIL: Du skrev ikke inn en Captcha-frase. Trykk på tilbakeknappen i webleseren din og prøv igjen. Feil: Du skrev inn feil Captcha-frase. Trykk på tilbakeknappen i webleseren din og prøv igjen. Korriger: Gjem CAPTCHA for Moderer kommentarer Innstillinger er lagret Vennligst fullfør CAPTCHA Problem: Publiser innlegg Frisk Opp Bilde Last bildet på nytt Av og til vises captcha-bildet og inntastingsfeltene ETTER knappen for innsending av kommentarskjema. Send Kommentar Inntastet CAPTCHA var feil. Den beste plasseringen av tag'en er foran kommentarfeltet. Du ønsker kanskje å flytte tag'en dersom den er under kommentarfeltet, eller dersom captcha-bildet og inntastingsfeltene vises under knappen for innsending av skjema. Captcha-bildet og inntastingsfeltet vil vises der hvor denne tag'en finnes, så flytt linjen FORAN kommentarfeltet og fjern haken i sjekkboksen over. Problemet skal nå være løst. Oppdater Innstillinger Hvorfor er det å flytte tag'en og fjerne haken i sjekkboksen det beste valget? Fordi kommentarkoden ikke lenger validerer som korrekt XHTML hvis sjekkboksen er valgt. Du har ikke rettigheter til å gjøre endringer her Temaet ditt må ha registrerte tag inne i skjemaet i comments.php. De fleste temaer har det. brukere som kan: 