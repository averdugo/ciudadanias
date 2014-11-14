<?php

require_once 'custom/settings.php';
require_once 'custom/utils.php';

require_once 'custom/widget.php';

require_once 'custom/post-type/staff.php';
require_once 'custom/post-type/testimonio.php';
require_once 'custom/post-type/respuesta_automatica.php';

add_filter('xmlrpc_enabled', '__return_false');
