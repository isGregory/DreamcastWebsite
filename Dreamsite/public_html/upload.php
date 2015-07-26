<?php
// upload.php

// This upload method had some slight, but immensely important influence
// from an upload.cgi perl script v1.03 by Douglas Christensen, Jr.
// Which is where the translation table by Loren Peace comes from. It seems
// undoubtable that those who influenced that script had a lasting
// influence in this page, and as such, it seems fitting to put the
// thanks message from that script here as well.

		// From upload.cgi v1.03 [2001-7-27]:
		# Script by Douglas Christensen, Jr
		# With translation table by Loren Peace
		# Code additions by Tim Herr (tim@gaminginfinity.com)
		# and tons and tons of help from
		# all them cool guys (and girls) at
		# the console browsers Yahoo! group.
		#
		# VMU Uploading is now set free!

// Include to check if they're using a dreamcast web-browser
// and get the specified upload directory.
$homeDir = "";
require_once 'directories.php';
require_once 'format.php';


// Check if it is a Dreamcast
// that is trying to upload.
if ( $dreamBrowser ) {

	// Setup target file information
	$resource_name = $_POST["name"];
	$target_file = $dirSave . $resource_name;

	// Get Size for later if-statement check
	$size = (int) $_SERVER['CONTENT_LENGTH'];

	// Check that file name is valid; alphanumeric, and between 1 - 8 characters
	$nameLength = strlen( $resource_name );
	if ( !ctype_alnum( $resource_name )
		|| $nameLength > 9 || $nameLength < 1 ) {

		// Either characters chosen or name length is unacceptable
		$pageTitle = "Upload - Failed";
		include 'dc_header.php';
		echo "<p>The filename entered is unacceptable.</p>";
		$from = "upload.php";
		include 'dc_footer.php';

	// Check if the file exists already
	} else if ( file_exists( $target_file . ".vmi" ) ) {

		// File already exists
		$pageTitle = "Upload - Failed";
		include 'dc_header.php';
		echo "<p>The file '$resource_name' already exists.</p>";
		$from = "upload.php";
		include 'dc_footer.php';

	// Check that size of submitted content is over 500 bytes
	// ( as that's less than the minimum VMS header )
	// Otherwise they hit submit without selecting a file
	} else if ( $size < 500 ) {

		// Content size is unacceptable
		$pageTitle = "Upload - Failed";
		include 'dc_header.php';
		echo "<p>No file was selected.</p>";
		$from = "upload.php";
		include 'dc_footer.php';

	// Prerequisites are all good.
	} else {

		// Get the bytes that make up the save file
		$toParse = $_POST["upfile"];

		// Find new lines to break up the header from the save content
		$length = strlen( $toParse );
		$numNew = 0;
		for ( $i = 0; $i < $length; $i++ ) {

			// Check for newline
			if ( ord($toParse{$i}) == 10 ) {

				// Keep track of the number
				// of new lines we've seen
				$numNew++;

				if ( $numNew == 1 ) {
					// New Lines are preceeded by return characters
					// We want neither in our header so we go
					// to ($i - 1) in length.
					$header = substr( $toParse, 0, $i - 1 );

				// We could do an "else" here, but incase something
				// gets modified in the future, this is safer.
				} else if ( $numNew == 2 ) {
					// Start the content after the second new line
					$content = substr( $toParse, $i + 1 );

					// Stop going through the loop
					$i = $length;
				}
			}
		}



		//// Generate VMI File ////

		// Break up the header to get all the elements
		// sorted into an array of names and values.
		// Pairs are separated by "&" and each pair
		// separates their name and value with "=".
		$pairs = explode( "&", $header );
		$numPairs = count( $pairs );
		for ( $p = 0; $p < $numPairs; $p++ ) {
			$sub = explode( "=", $pairs[ $p ] );
			$headInfo[ $sub[ 0 ] ] = $sub[ 1 ];
		}

		// Get the time specified for the VMI
		// and break out its elements.
		$time = $headInfo['tm'];
		$year = intval( substr( $time, 0, 4 ) );
		$month = intval( substr( $time, 4, 2 ) );
		$day = intval( substr( $time, 6, 2 ) );
		$hour = intval( substr( $time, 8, 2 ) );
		$min = intval( substr( $time, 10, 2 ) );
		$sec = intval( substr( $time, 12, 2 ) );
		// Day of the Week ( 0=sunday - 6=saturday )
		$weekday = intval( substr( $time, 14, 1 ) );


		// Package up the VMI file components
		$headPack = pack("CCCCa32a32vCCCCCCvva8a12vvV",
			ord( $resource_name{0} & 0x53 ),
			ord( $resource_name{1} & 0x45 ),
			ord( $resource_name{2} & 0x47 ),
			ord( $resource_name{3} & 0x41 ),
			"Description",
			"Copyright",
			$year,
			$month,
			$day,
			$hour,
			$min,
			$sec,
			$weekday,
			0, // VMI Version
			1, // File Number
			$resource_name,
			$headInfo['filename'],
			0, // Data File, and Copying is ok
			0,
			$headInfo['fs'] );

		// Extract the package into an array of bytes
		$output = unpack("C*", $headPack );

		// Create the VMI file
		$vmiFile = fopen( $target_file . ".vmi", 'wb' )
			or die("Can't create $resource_name.vmi");

		// Write out the VMI bytes.
		for ( $c = 1; $c <= count( $output ); $c++ ) {
			fwrite( $vmiFile, chr( $output[$c] ) );
		}

		// Close the file
		fclose( $vmiFile );


		//// Generate VMS File ////

		// This table will be used to translate data
		// read-in to correct values for decoding
		$table = array(
			'=' => '=', // 0x3D => 0x3D
			'+' => 'y', // 0x2B => 0x79
			'/' => '/', // 0x2F => 0x2F
			'0' => '2', // 0x30 => 0x32
			'1' => '7', // 0x31 => 0x37
			'2' => '0', // 0x32 => 0x30
			'3' => 'P', // 0x33 => 0x50
			'4' => 'l', // 0x34 => 0x6C
			'5' => 'g', // 0x35 => 0x67
			'6' => 'M', // 0x36 => 0x4D
			'7' => 'e', // 0x37 => 0x65
			'8' => 'r', // 0x38 => 0x72
			'9' => 'T', // 0x39 => 0x54
			'A' => 'A', // 0x41 => 0x41
			'B' => 'X', // 0x42 => 0x58
			'C' => 's', // 0x43 => 0x73
			'D' => 'Z', // 0x44 => 0x5A
			'E' => 'I', // 0x45 => 0x49
			'F' => 'x', // 0x46 => 0x78
			'G' => '5', // 0x47 => 0x35
			'H' => '+', // 0x48 => 0x2B
			'I' => 'U', // 0x49 => 0x55
			'J' => 'p', // 0x4A => 0x70
			'K' => 'o', // 0x4B => 0x6F
			'L' => 'D', // 0x4C => 0x44
			'M' => 'k', // 0x4D => 0x6B
			'N' => 'F', // 0x4E => 0x46
			'O' => 'C', // 0x4F => 0x43
			'P' => 'L', // 0x50 => 0x4C
			'Q' => 'c', // 0x51 => 0x63
			'R' => 'w', // 0x52 => 0x77
			'S' => 'Q', // 0x53 => 0x51
			'T' => 'J', // 0x54 => 0x4A
			'U' => '4', // 0x55 => 0x34
			'V' => '1', // 0x56 => 0x31
			'W' => '9', // 0x57 => 0x39
			'X' => 'W', // 0x58 => 0x57
			'Y' => 'E', // 0x59 => 0x45
			'Z' => 'B', // 0x5A => 0x42
			'a' => 'i', // 0x61 => 0x69
			'b' => 'h', // 0x62 => 0x68
			'c' => 'N', // 0x63 => 0x4E
			'd' => 'G', // 0x64 => 0x47
			'e' => 'S', // 0x65 => 0x53
			'f' => 'b', // 0x66 => 0x62
			'g' => 'a', // 0x67 => 0x61
			'h' => 'Y', // 0x68 => 0x59
			'i' => 'O', // 0x69 => 0x4F
			'j' => 'q', // 0x6A => 0x71
			'k' => 'z', // 0x6B => 0x7A
			'l' => 'f', // 0x6C => 0x66
			'm' => 'K', // 0x6D => 0x4B
			'n' => 'H', // 0x6E => 0x48
			'o' => '6', // 0x6F => 0x36
			'p' => 'n', // 0x70 => 0x6E
			'q' => 'd', // 0x71 => 0x64
			'r' => 'm', // 0x72 => 0x6D
			's' => 'u', // 0x73 => 0x75
			't' => 'j', // 0x74 => 0x6A
			'u' => 't', // 0x75 => 0x74
			'v' => '8', // 0x76 => 0x38
			'w' => '3', // 0x77 => 0x33
			'x' => 'v', // 0x78 => 0x76
			'y' => 'V', // 0x79 => 0x56
			'z' => 'R', // 0x7A => 0x52
		);

		// Base-shift using table
		// Set up string to hold translated data
		$translated = "";
		$length = strlen( $content );
		for ( $i = 0; $i < $length; $i++ ) {

			// Sort over the content leaving new lines ( 10 )
			// and carriage returns ( 13 ) unchanged, while
			// translating the rest.
			$check = $content{$i};
			if ( ord($check) == 10 || ord($check) == 13 ) {
				$translated .= $check;
			} else {
				$translated .= $table[$check];
			}
		}

		// Use base64 to decode the information
		$decode = base64_decode( $translated );

		// Create the VMS file
		$fh = fopen($target_file . ".VMS", 'w+')
			or die("Can't create $resource_name.VMS");

		// Write out the decoded information to our VMS file
		fwrite($fh,$decode);

		// Close the file
		fclose($fh);


		// Notify user of successful upload.
		$pageTitle = "Upload - Success";
		include 'dc_header.php';
		echo "<p>$resource_name has been uploaded.</p>";
		$from = "upload.php";
		include 'dc_footer.php';
	}

// Not a Dreamcast so we treat
// it like a Computer uploading
} else {

	// Setup target file information
	$resource_name = basename($_FILES["upfile"]["name"]);
	$target_file = $dirSave . $resource_name;

	$fileType = pathinfo($target_file,PATHINFO_EXTENSION);

	// Check if file already exists
	if (file_exists($target_file)) {

		$pageTitle = "Upload - Failed";
		include 'dc_header.php';
		echo "<p>Sorry, file already exists.</p>";
		$from = "upload.php";
		include 'dc_footer.php';

	// Check file size
	// VMU's only have 128KB of space, so anything
	// larger than that won't fit. We give a little
	// bit of ceiling for odd cases.
	} else if ($_FILES["upfile"]["size"] > 150000) {

		$pageTitle = "Upload - Failed";
		include 'dc_header.php';
		echo "<p>Sorry, your file is too large.</p>";
		$from = "upload.php";
		include 'dc_footer.php';

	// Only alow certain file formats.
	} else if( strcasecmp( $fileType, "vms" ) != 0
		&& strcasecmp( $fileType, "vmi" ) != 0 ) {

		$pageTitle = "Upload - Failed";
		include 'dc_header.php';
		echo "<p>Sorry, only vmi & VMS files are allowed.</p>";
		$from = "upload.php";
		include 'dc_footer.php';

	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["upfile"]["tmp_name"], $target_file)) {

			$pageTitle = "Upload - Success";
			include 'dc_header.php';
			echo "<p>The file " . basename( $_FILES["upfile"]["name"])
				. " has been uploaded as $resource_name.</p>";
			$from = "upload.php";
			include 'dc_footer.php';

		} else {
			// Error moving temporary file
			$pageTitle = "Upload - Failed";
			include 'dc_header.php';
			echo "<p>Sorry, there was an error uploading your file.</p>";
			$from = "upload.php";
			include 'dc_footer.php';
		}
	}
}

?>
