<?php

require_once 'globals.php';
require_once 'dc_tools.php';
global $dirSave;

// VMI file name
$target_vmi = isset($_GET["id"]) ? $_GET["id"] : false;
$directory = $dirSave . current( explode( "/", $target_vmi ) );
$file = end( explode( "/", $target_vmi ) );

// $type can be either 'i' for ".vmi" or 's' for ".VMS"
$type = isset($_GET["t"]) ? $_GET["t"] : false;

if( "s" == $type ) {
	// 's' exists and is VMS
} else {
	// Otherwise 'i' is set
	$type = "i";
}

// Check if save file name provided
if ( false === $target_vmi ) {

	$pageTitle = "VMU Download";
	include $homeDir . 'dc_header.php';
	echo "<p>No File Specified</p>";
	$from = "vmidl.php";
	include $homeDir . 'dc_footer.php';

} else {

	// Check that save file exists
	if ( !file_exists( $dirSave . $directory . $file ) ) {

		$pageTitle = "VMU Download";
		include $homeDir . 'dc_header.php';
		echo "<p>File $dirSave$directory$file Not Found</p>";
		$from = "vmidl.php";
		include $homeDir . 'dc_footer.php';

	} else {

		// Check if user wants vmi file
		if ( "i" == $type ) {
			// MIME Types for Dreamcast
			// VMI: application/x-dreamcast-vms-info
			// VMS: application/x-dreamcast-vms
			header("Content-disposition: attachment; filename=$file");
			header("Content-type: application/x-dreamcast-vms-info");
			readfile("$dirSave$directory$file");

		// User wants VMS file
		} else {
			$VMSname = getVMSnamefromVMI( $target_vmi );
			header("Content-disposition: attachment; filename=$VMSname");
			header("Content-type: application/x-dreamcast-vms");
			readfile("$dirSave$directory$VMSname");
		}
	}
}

?>
