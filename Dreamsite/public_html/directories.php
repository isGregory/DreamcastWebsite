<?php
	//directories.php

	if ( !isset( $root ) ) {
		$root = "";
	}

	// Directories
	$dirSave      = $root . "savefiles/";
	$dirDLC       = $dirSave . "dlc/";
	$dirImages    = $root . "images/";
	$dirIcons     = $dirImages . "icons/";
	$dirEC        = $dirImages . "eyecatch/";
	$dirPSO       = $dirImages . "psoscreenshots/";
	$dirTags      = $dirImages . "tags/";
	$dirTagAlpha  = $dirTags . "mask/";

	// Sub directories
	// For use with image sub directories
	// Such as $dirPSO and $dirEC
	$dirPC        = "PC/";
	$dirDC        = "DC/";
?>
