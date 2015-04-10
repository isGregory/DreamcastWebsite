<?php
	//pc_globals.php

    // Two colors for doing rows in tables
    $C1 = "#FFFFFF";
    $C2 = "#CEEBF5";

    // Get browser information
    // Example. Planetweb 2.6 returns:
    // Mozilla/3.0 (Planetweb/2.606 JS SSL VoIP US; Dreamcast US)
    $browser = $_SERVER['HTTP_USER_AGENT'];

    // Check if their browser is dreamcast.
    // This allows us the option to serve pages
    // differently to dreamcast than we would to a PC
    if ( strpos( strtolower( $browser ), 'dreamcast' ) !== false ) {
        $dreamBrowser = true;
    } else {
        $dreamBrowser = false;
    }

    $root = "../";
    $dirUp     = $root . "uploads/";
	$dirImages = $root . "images/";
	$dirIcons  = $root . "images/icons/";
	$dirEC     = $root . "images/eyecatch/";
	$dirPSO    = $root . "images/psoscreenshots/";
    $dSA2 = "SonicAdventure2";
    $dPSOv2 = "PhantasyStarOnline";
    $dJGR = "JetGrindRadio";
    $d4X4 = "4x4Evolution";
?>
