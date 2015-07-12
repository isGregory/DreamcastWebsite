<?php

require_once 'directories.php';
require_once 'dc_tools.php';
global $dirSave, $homeDir;

// VMI file name
$target_vmi = isset($_GET["id"]) ? $_GET["id"] : false;
$tempArray = explode( "/", $target_vmi );
if ( 1 < count( $tempArray ) ) {
	$directory = $dirSave . current( $tempArray ) . "/";
	$file = end( explode( "/", $target_vmi ) );
} else {
	$directory = $dirSave . "/";
	$file = $target_vmi;
}

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
	if ( !file_exists( $directory . $file ) ) {

		$pageTitle = "VMU Download";
		include $homeDir . 'dc_header.php';
		echo "<p>File $directory$file Not Found</p>";
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
			readfile("$directory$file");

		// User wants VMS file
		} else {
			$VMSname = getVMSnamefromVMI( $directory . $file );
			header("Content-disposition: attachment; filename=$VMSname");
			header("Content-type: application/x-dreamcast-vms");
			readfile("$directory$VMSname");
		}
	}
}

?>
