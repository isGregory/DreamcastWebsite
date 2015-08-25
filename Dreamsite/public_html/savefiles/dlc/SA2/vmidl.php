<?php
// vmidl.php
// This file should be just about the same in every
// directory except for where it specifies $root as.
// The dreamcast, due to how it looks up VMS files,
// needs the download call to be invoked in the
// directory where the VMS file is.
$root = "../../../";
require_once $root . 'directories.php';
require_once $root . 'format.php';
require_once $root . 'dc_tools.php';

// VMI file name
$target_vmi = isset($_GET["id"]) ? $_GET["id"] : false;

// Check if save file name provided
if ( false === $target_vmi ) {

	$pageTitle = "VMU Download";
	include $root . 'dc_header.php';
	echo "<p>No File Specified</p>";
	$from = "vmidl.php";
	include $root . 'dc_footer.php';
	exit;
}

// $type can be either 'i' for ".vmi" or 's' for ".VMS"
$type = isset($_GET["t"]) ? $_GET["t"] : false;

if( "s" == $type ) {
	// 's' exists and is VMS
} else {
	// Otherwise 'i' is set
	$type = "i";
}


// Check that save file exists
if ( !file_exists( $target_vmi ) ) {

	$pageTitle = "VMU Download";
	include $root . 'dc_header.php';
	echo '<p>File "' . $target_vmi . '" Not Found</p>';
	$from = "vmidl.php";
	include $root . 'dc_footer.php';
	exit;
}


// Check if user wants vmi file
if ( "i" == $type ) {
	// MIME Types for Dreamcast
	// VMI: application/x-dreamcast-vms-info
	// VMS: application/x-dreamcast-vms
	header("Content-disposition: attachment; filename=" . $target_vmi);
	header("Content-type: application/x-dreamcast-vms-info");
	readfile( $target_vmi );

// User wants VMS file
} else {
	$VMSname = getVMSnamefromVMI( $target_vmi );
	header("Content-disposition: attachment; filename=" . $VMSname);
	header("Content-type: application/x-dreamcast-vms");
	readfile( $VMSname );
}

?>
