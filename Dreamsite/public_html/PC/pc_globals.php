<?php
	//pc_globals.php

	// Two colors for doing rows in tables
	$C1 = "#FFFFFF";
	$C2 = "#CEEBF5";

	// Currently used row color.
	$cur = $C1;

	// Get browser information
	// Example. Planetweb 2.6 returns:
	// Mozilla/3.0 (Planetweb/2.606 JS SSL VoIP US; Dreamcast US)
	$browser = $_SERVER['HTTP_USER_AGENT'];

	// Check if their browser is dreamcast.
	// This allows us the option to serve pages
	// differently to dreamcast than we would to a PC
	if ( false !== strpos( strtolower( $browser ), 'dreamcast' ) ) {
		$dreamBrowser = true;
	} else {
		$dreamBrowser = false;
	}

	$root      = "../";
	$dirSave   = $root . "savefiles/";
	$dirImages = $root . "images/";
	$dirIcons  = $root . "images/icons/";
	$dirEC     = $root . "images/eyecatch/";
	$dirPSO    = $root . "images/psoscreenshots/";
	$pcBGimg   = "tile.png";

	// Game Directory Folder Names
	$dSA2   = "SonicAdventure2";
	$dShen  = "Shenmue";
	$dPSOv2 = "PhantasyStarOnline";
	$dJGR   = "JetGrindRadio";
	$d4X4   = "4x4Evolution";
?>
