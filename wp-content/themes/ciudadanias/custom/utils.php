<?php

function get_random_testimony( $count = 1 ) {
	global $wpdb;
	
	//traigo los posts
	$querystr = "
		SELECT $wpdb->posts.*
		  FROM $wpdb->posts
		 WHERE $wpdb->posts.post_status = 'publish'
	       AND $wpdb->posts.post_type = 'testimonio'
		 ORDER BY RAND() LIMIT $count;
	";
	$rand_testimonies = $wpdb->get_results($querystr, ARRAY_A);
	
	foreach ($rand_testimonies as $key => $testimony ){
		
		//busco la profesion
		$custom = get_post_custom($testimony['ID']);
		$rand_testimonies[$key]["profesion"] = $custom["profesion"][0];	
		
		//busco la imagen
		$rand_testimonies[$key]['thumbnail'] = get_the_post_thumbnail( $testimony['ID'], "photo_player", array("class" => "border-img") );
		
	}
	if($count == 1) {
		return $rand_testimonies[0];
	} else {
		return $rand_testimonies;
	}	
}

function pra(){
     $numargs = func_num_args();
     if ($numargs > 0) {
         $arg_list = func_get_args();    
         foreach($arg_list as $arg) {        
        echo "<pre>";
        print_r($arg);
        echo "</pre>";
         }
     }   
}

function get_last_entry() {
	$posts_array = get_posts( array('numberposts' => 1, 'post_type' => 'post', 'orderby' => 'post_date', 'order' => 'DESC','post_status' => 'publish') );
	if(!empty($posts_array)) {
		return (array) $posts_array[0];
	} else {
		return array();
	}
}

function generar_excerpt($texto, $length=170){
	$texto = strip_tags($texto);
	$texto = substr($texto, 0, $length);
	return $texto."...";
}



/* generate browser dependant body class */
function getBrowser() {
    $u_agent = $_SERVER['HTTP_USER_AGENT'];
    $bname = 'Unknown';
    $platform = 'Unknown';
    $version= "";

    //First get the platform?
    if (preg_match('/linux/i', $u_agent)) {
        $platform = 'linux';
    }
    elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
        $platform = 'mac';
    }
    elseif (preg_match('/windows|win32/i', $u_agent)) {
        $platform = 'windows';
    }
   
    // Next get the name of the useragent yes seperately and for good reason
    if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Internet Explorer';
        $ub = "MSIE";
    }
    elseif(preg_match('/Firefox/i',$u_agent))
    {
        $bname = 'Mozilla Firefox';
        $ub = "Firefox";
    }
    elseif(preg_match('/Chrome/i',$u_agent))
    {
        $bname = 'Google Chrome';
        $ub = "Chrome";
    }
    elseif(preg_match('/Safari/i',$u_agent))
    {
        $bname = 'Apple Safari';
        $ub = "Safari";
    }
    elseif(preg_match('/Opera/i',$u_agent))
    {
        $bname = 'Opera';
        $ub = "Opera";
    }
    elseif(preg_match('/Netscape/i',$u_agent))
    {
        $bname = 'Netscape';
        $ub = "Netscape";
    }
   
    // finally get the correct version number
    $known = array('Version', $ub, 'other');
    $pattern = '#(?<browser>' . join('|', $known) .
    ')[/ ]+(?<version>[0-9.|a-zA-Z.]*)#';
    if (!preg_match_all($pattern, $u_agent, $matches)) {
        // we have no matching number just continue
    }
   
    // see how many we have
    $i = count($matches['browser']);
    if ($i != 1) {
        //we will have two since we are not using 'other' argument yet
        //see if version is before or after the name
        if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
            $version= $matches['version'][0];
        }
        else {
            $version= $matches['version'][1];
        }
    }
    else {
        $version= $matches['version'][0];
    }
   
    // check if we have a number
    if ($version==null || $version=="") {$version="?";}
   
    return array(
        'userAgent' => $u_agent,
        'name'      => $bname,
        'version'   => $version,
        'platform'  => $platform,
        'pattern'    => $pattern
    );
}
function getBrowserClass(){
	$brows = getBrowser();
	//print_r($brows);
	$resp = str_replace(" ","_",$brows["name"]);
	$resp = strtolower($resp);
	$vers = $resp.str_replace(".","",$brows["version"]);
	$os = $brows["platform"];
	return $resp." ".$vers." ".$os;
}