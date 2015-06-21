<?php

$homeDir = "../";
require_once $homeDir . 'globals.php';
require_once $homeDir . 'dc_tools.php';
global $dirUp;

// VMI file name
$target_vmi = isset($_GET["id"]) ? $_GET["id"] : false;

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
	$from = $dirUp . "vmidl.php";
	include $homeDir . 'dc_footer.php';

} else {

	// Check that save file exists
	if ( !file_exists( $target_vmi ) ) {

		$pageTitle = "VMU Download";
		include $homeDir . 'dc_header.php';
		echo "<p>File $target_vmi Not Found</p>";
		$from = $dirUp . "vmidl.php";
		include $homeDir . 'dc_footer.php';

	} else {

		// Check if user wants vmi file
		if ( "i" == $type ) {
			// MIME Types for Dreamcast
			// VMI: application/x-dreamcast-vms-info
			// VMS: application/x-dreamcast-vms
			header("Content-disposition: attachment; filename=$target_vmi");
			header("Content-type: application/x-dreamcast-vms-info");
			readfile("$target_vmi");

		// User wants VMS file
		} else {
			$VMSname = getVMSnamefromVMI( $target_vmi );
			header("Content-disposition: attachment; filename=$VMSname");
			header("Content-type: application/x-dreamcast-vms");
			readfile("$VMSname");
		}
	}
}

?>
