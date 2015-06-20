<?php

include 'globals.php';
include 'dc_tools.php';

// VMI file name
$id = isset($_GET["id"]) ? $_GET["id"] : false;

// $t can be either 'i' for ".vmi" or 's' for ".VMS"
$t = isset($_GET["t"]) ? $_GET["t"] : false;

if( $t == "s" ) {
	// 's' exists and is VMS
} else {
	// Otherwise 'i' is set
	$t = "i";
}

// Check if vmi file name provided
if ( false === $id ) {

	$pageTitle = "VMU Download";
	include 'dc_header.php';
	echo "<p>No File Specified</p>";
	$from = "vmidl.php";
	include 'dc_footer.php';

} else {

	// Check that vmi file exists
	if ( !file_exists( $dirUp . $id ) ) {

		$pageTitle = "VMU Download";
		include 'dc_header.php';
		echo "<p>File $id Not Found</p>";
		$from = "vmidl.php";
		include 'dc_footer.php';

	} else {

		$target_file = $id . ".vmi";

		// Check if user wants vmi file
		if ( $t == "i" ) {
			// MIME Types for Dreamcast
			// VMI: application/x-dreamcast-vms-info
			// VMS: application/x-dreamcast-vms
			header("Content-disposition: attachment; filename=$target_file");
			header("Content-type: application/x-dreamcast-vms-info");
			readfile("$target_file");

		// User wants VMS file
		} else {
			$VMSname = getVMSnamefromVMI( $target_file );
			header("Content-disposition: attachment; filename=$VMSname");
			header("Content-type: application/x-dreamcast-vms");
			readfile("$VMSname");
		}
	}
}

?>
