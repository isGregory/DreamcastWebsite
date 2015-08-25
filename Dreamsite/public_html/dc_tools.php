<?php
//dc_tools.php

require_once 'GIFEncoder.class.php'; // For creating animated GIFs
require_once 'directories.php';

// $vms = VMS object
// Returns array of colors
function getVMSpalette( $vms, $image, $offset, $size ) {

	// Set up empty array
	$pal = [];

	// Write out the color palette
	for( $i = 0; $i < $size; $i++ ) {

		// Extract out the individual color components
		// using bitmasks and bitwise operators.
		// Each color is 4 bits.
		$Alpha = ( $vms->get( $offset + ( $i * 2 ) + 1 ) >> 4 ) & 0x0F;
		$Red   =   $vms->get( $offset + ( $i * 2 ) + 1 ) & 0x0F;
		$Green = ( $vms->get( $offset + ( $i * 2 ) )     >> 4 ) & 0x0F;
		$Blue  =   $vms->get( $offset + ( $i * 2 ) )     & 0x0F;

		// Modify the color value to the correct levels
		$Red   = ( $Red   << 4 ) & 0xFF;
		$Green = ( $Green << 4 ) & 0xFF;
		$Blue  = ( $Blue  << 4 ) & 0xFF;

		// Enter color into the palette array
		$pal[$i] = imagecolorallocate($image, $Red, $Green, $Blue);
	}

	// Return the palette
	return $pal;
}

// $sfile = VMS object
function iconcreatefromvms( $vms, $frameNum ) {

	// Define image parameters
	$width = 32;
	$height = 32;


	// Set up blank image
	$image = imagecreatetruecolor( $width, $height );

	// Palette Offset = 0x60
	// Palette Size = 16
	$pal = getVMSpalette( $vms, $image, 0x60, 16 );

	// Assemble the pixel data
	$frameSize = 512; //32x32 pixels, and 2 pixels per byte.
	$offset = 0x80 + ( $frameSize * $frameNum );

	$i = 0;
	for ( $y = 0; $y < $height; $y++ ) {

		// X moves forward by two as each byte is worth two pixels
		for ( $x = 0; $x < $width; $x += 2 ) {

			// Grab the next two pixels of data
			$next = $vms->get( $offset + $i );

			// Extract first pixel
			$p1 = ( ( $next >> 4 ) & 0x0F );

			// Extract second pixel
			$p2 = ( $next & 0x0F );

			// Set pixels to the image by
			// looking up their palette values
			imagesetpixel( $image, $x, $y, $pal[$p1] );
			imagesetpixel( $image, ( $x + 1 ), $y, $pal[$p2] );
			$i++;
		}
	}
	return $image;
}

// This function will get the specific icon frame
//
// $vms = VMS object
// $frameNum = which icon to get [ 0 - 2 ]
function getvmsframe( $vms, $frameNum ) {
	global $dirIcons;
	$imgName = $dirIcons . $vms->getIconHash();
	if ( $frameNum != 0 ) {
		$imgName .= "-" . $frameNum;
	}

	if ( !file_exists( $imgName . ".gif" ) ) {

		$img = iconcreatefromvms( $vms, $frameNum );
		imagegif( $img, $imgName . ".gif" );
		imagedestroy($img);
	}
	return $imgName . ".gif";
}

// $vms = VMS object
function createVMSicons( $vms ) {
	require_once 'format.php'; // For $dreamBrowser
	global $dirIcons, $dreamBrowser;

	$fc = $vms->getNumFrames();
	$imgName = $dirIcons . $vms->getIconHash();

	if ( !file_exists( $imgName . ".gif" ) ) {

		$img = iconcreatefromvms( $vms, 0 );
		imagegif( $img, $imgName . ".gif" );
		imagedestroy($img);
	}
	$toReturn = $imgName . ".gif";

	if ( $fc > 1 ) {
		if ( !file_exists( $imgName . "-a.gif" ) ) {
			$speed = $vms->getAniSpeed();
			unset($frames);
			unset($framed);
			for ( $f = 0; $f < $fc; $f++ ){
				$img = iconcreatefromvms( $vms, $f );
				ob_start();
				imagegif($img);
				$frames[]=ob_get_contents(); // Frame
				$framed[]=( 3 * $speed );   // Delay
				ob_end_clean();
				imagedestroy($img);
			}

			// Generate the animated gif and output to screen.
			$gif = new GIFEncoder( $frames, $framed, 0, 2, 0, 0, 0, 'bin' );

			$fp = fopen( $imgName . "-a.gif", 'w' );
			fwrite( $fp, $gif->GetAnimation() );
			fclose( $fp );

		}

		if ( !$dreamBrowser ) {
			$toReturn = $imgName . "-a.gif";
		}
	}
	return $toReturn;
}

function eyecatchcreatefromvms( $vms ) {

	// Look up the graphic eyecatch mode
	$ecMode = $vms->getEyecatchMode();

	// If there is no Eyecatch we return.
	// Otherwise we define the number of
	// bytes in each respective section
	// of either the palette or image.
	if ( $ecMode == 0 ) {

		return;

	} else if ( $ecMode == 1 ) {

		$paletteSize = 4032;
		$imageSize = 0;

	} else if ( $ecMode == 2 ) {

		$paletteSize = 256;
		$imageSize = 4032;

	} else if ( $ecMode == 3 ) {

		$paletteSize = 16;
		$imageSize = 2016;

	} else {

		// Unknown Eyecatch Type
		return;
	}

	// Check the number of frames so we can get the
	// necessary offset to the start of the eyecatch graphic.
	$numFrames = $vms->getNumFrames();

	// 96 for header, 32 for Icon Palette = 128.
	$paletteOffset = 128 + ( 512 * $numFrames );

	// Define image parameters
	$width = 72;
	$height = 56;

	// Set up blank image
	$image = imagecreatetruecolor( $width, $height );

	// Grab the color palette
	$pal = getVMSpalette( $vms, $image, $paletteOffset, $paletteSize );

	// Palette Size is the number of colors in the palette
	// Each palette color is two bytes long.
	$imageOffset = $paletteOffset + (2 * $paletteSize);

	// Mode 1
	// Each pixel is stored in palette form, taking two bytes.
	// So we just translate the palette to the canvas.
	if ( $ecMode == 1 ) {

		$i = 0;
		for ( $y = 0; $y < $height; $y++ ) {
			for ( $x = 0; $x < $width; $x++ ) {

				// Set pixels to the image by
				// looking up their palette values
				imagesetpixel( $image, $x, $y, $pal[$i] );
				$i++;
			}
		}

	// Mode 2
	// Palette of 256 colors
	// Pixel information follows the palette and each byte
	// of pixel information represents a single pixel.
	} else if ( $ecMode == 2 ) {


		$i = 0;
		for ( $y = 0; $y < $height; $y++ ) {
			for ( $x = 0; $x < $width; $x++ ) {

				// Grab the next pixel of data
				$next = $vms->get( $imageOffset + $i );

				// Set pixel to the image by
				// looking up its palette value
				imagesetpixel( $image, $x, $y, $pal[$next] );
				$i++;
			}
		}

	// Mode 3
	// Palette of 16 colors
	// Pixel information follows the palette and each byte
	// of pixel information represents two pixels.
	} else if ( $ecMode == 3 ) {

		$i = 0;
		for ( $y = 0; $y < $height; $y++ ) {

			// X moves forward by two as each byte is worth two pixels
			for ( $x = 0; $x < $width; $x += 2 ) {

				// Grab the next two pixels of data
				$next = $vms->get( $imageOffset + $i );

				// Extract first pixel
				$p1 = ( ( $next >> 4 ) & 0x0F );

				// Extract second pixel
				$p2 = ( $next & 0x0F );

				// Set pixels to the image by
				// looking up their palette values
				imagesetpixel( $image, $x, $y, $pal[$p1] );
				imagesetpixel( $image, ( $x + 1 ), $y, $pal[$p2] );
				$i++;
			}
		}
	}

	return $image;
}

// $vms = VMS object
function createVMSeyecatch( $vms ) {
	global $dreamBrowser, $dirEC, $dirDC, $dirPC;
	$imgName = $vms->getIconHash() . "-EC";

	if ( $dreamBrowser ) {
		$fileType = ".jpg";
		$dirUse = $dirDC;
	} else {
		$fileType = ".png";
		$dirUse = $dirPC;
	}

	if ( !file_exists( $dirEC . $dirUse . $imgName . $fileType ) ) {

		$img = eyecatchcreatefromvms( $vms );
		imagepng( $img, $dirEC . $dirPC . $imgName . ".png" );
		imagejpeg( $img, $dirEC . $dirDC . $imgName . ".jpg" );
		imagedestroy($img);
	}
	return $dirEC . $dirUse . $imgName . $fileType;
}

// Returns image of Graffiti's alpha transparency data
// $vms = VMS object
function jgralphacreatefromvms( $vms ) {
	$imageHash = $vms->getIconHash();

	// Figure out the graffiti type
	if ( "ee87c2d9" === $imageHash ) {        // Small
		$width = 128;
	} else if ( "a101d800" === $imageHash ) { // Large
		$width = 256;
	} else if ( "4e7ecdf6" === $imageHash ) { // Xtra-Large
		$width = 512;
		//$buffer = 56; // Japan?
	} else { // Not graffiti so we exit
		return false;
	}

	$height = 128;
	$imageSize = ($width * $height) / 8;
	$buffer = 59;


	// Set up blank image
	$image = imagecreatetruecolor( $width, $height );

	$x = 0;
	$y = 0;
	// Where the transparency mask starts
	$alphaOffset = 128 + ( 512 * $vms->getNumFrames() ) + $buffer;
	for ( $i = 0; $i < $imageSize; $i++ ) {

		$byte = $vms->get( $i + $alphaOffset );

		for ( $b = 0; $b < 8; $b++ ) {

			$bit = ($byte & ( 1 << $b )) >> $b;

			if ( 0 === $bit ) {
				$next = 0;
			} else {
				$next = 0xFFFFFF;
			}

			imagesetpixel( $image, $x, $y, $next );

			$x++;
			if ( $x >= $width ) {
				$y++;
				$x = 0;
			}
		}
	}
	return $image;
}

// Extract graffiti alpha channel from a Jet Grind Radio file
// $vms = VMS object
function createVMSjgrALPHA( $vms ) {
	global $dirTagAlpha;

	$imgName = $dirTagAlpha . $vms->getFileHash() . ".gif";

	if ( !file_exists( $imgName ) ) {

		$img = jgralphacreatefromvms( $vms );
		if ( !$img ) {
			return false;
		}
		imagegif( $img, $imgName );
		imagedestroy($img);
	}
	return $imgName;
}

// Extract graffiti from a Jet Grind Radio file
// $vms = VMS object
function createVMSjgr( $vms ) {
	global $dreamBrowser, $dirTags, $dirDC, $dirPC;

	// For some reason the Dreamcast has trouble reading the
	// pure extracted image. There may be some data at the
	// end of the image that is being grabbed and causing
	// issues. However if we save the image as a gif or jpg
	// things work just fine. The downside is there is
	// additional compression that takes place. As a result,
	// and for purity, the system currently saves off an
	// image for use with just the dreamcast.
	if ( $dreamBrowser ) {
		$fileType = ".jpg";
		$dirUse = $dirDC;
	} else {
		$fileType = ".png";
		$dirUse = $dirPC;
	}
	$imgName = $vms->getFileHash();
	$targetLocation = $dirTags . $dirUse . $imgName . $fileType;

	if ( file_exists( $targetLocation ) ) {
		return $targetLocation;
	}

	$imageHash = $vms->getIconHash();

	// Figure out the graffiti type
	if ( "ee87c2d9" === $imageHash ) {        // Small
		$width = 128;
	} else if ( "a101d800" === $imageHash ) { // Large
		$width = 256;
	} else if ( "4e7ecdf6" === $imageHash ) { // Xtra-Large
		$width = 512;
		//$preBuffer = 56; // Japan?
	} else { // Not graffiti so we exit
		return;
	}

	$height = 128;
	$imageSize = ($width * $height) / 8;
	$preBuffer = 59;
	$postBuffer = 4;

	// Where the transparency mask starts
	// 128 header,
	// 512 frame,
	// $preBuffer - unknown - before alpha,
	// $imageSize alpha,
	// $postBuffer - unknown - after alpha
	$imageOffset = 128 + ( 512 * $vms->getNumFrames() )
		+ $imageSize + $postBuffer + $preBuffer;

	//$jpgFile = fopen( $dirTagPure . $imgName, 'wb' )
	//	or die("Can't create " . $dirTagPure . $imgName);
	$fileContents = "";
	$targetSize = $vms->getSize() - $imageOffset;
	for ( $i = 0; $i < $targetSize; $i++ ) {
		//$next = chr( $vms->get( $imageOffset + $i ) );
		$fileContents .= chr( $vms->get( $imageOffset + $i ) );
	//	fwrite( $jpgFile, $next );
	}
	$img = imagecreatefromstring( $fileContents );
	imagepng( $img, $dirTags . $dirPC . $imgName . ".png" );
	imagejpeg( $img, $dirTags . $dirDC . $imgName . ".jpg" );
	imagedestroy($img);
	//fclose( $jpgFile );

	return $targetLocation;
}

// Extract a Phantasy Star Online screenshot
// $vms = VMS object
function psocreatefromvms( $vms ) {
	// Define image parameters
	$width = 256;
	$height = 192;

	// Set up blank image
	$image = imagecreatetruecolor( $width, $height );

	// Image starts this far into the VMS file
	$offset = 0x284;

	// Read in the image data
	// Width        = 256
	// Height       = 192
	// Pixel Size   = 2 Bytes
	// Total Loops  = 49,152  (aka 256 x 192)
	// Total Bytes  = 98,304
	$i = 0;
	for ( $y = 0; $y < $height; $y++ ) {

		// X moves forward by two as each byte is worth two pixels
		for ( $x = 0; $x < $width; $x++ ) {

			// Set the two read bytes into a single 16-bit value
			// Note the "& 0x00FF" sets ( offset ) as unsigned.
			//      Without it, the operation can overright the
			//      higher bits with 1's all across where
			//      ( offset + 1 ) should be.
			$Color16 = ( $vms->get( $offset + $i + 1 ) << 8)
					| ( $vms->get( $offset + $i ) & 0x00FF);

			// Extract out the individual color components
			// using bitmasks and bitwise operators.
			// Red and Blue are 5 bits. Green is 6 bits.
			$Red   = ( $Color16 & 0xF800 ) >> 11;
			$Green = ( $Color16 & 0x07E0 ) >> 5;
			$Blue  =   $Color16 & 0x001F;

			// Modify the color value to the correct levels
			$Red   = $Red   << 3;
			$Green = $Green << 2;
			$Blue  = $Blue  << 3;

			// Create image color and set it to
			// the appropriate pixel location
			$Col = imagecolorallocate($image, $Red, $Green, $Blue);
			imagesetpixel( $image, $x, $y, $Col );

			// Increase Counter
			$i += 2;
		}
	}

	return $image;
}

// $vms = VMS object
// PSO images are defined by
// "PSO/SCREEN_IMAGE" at 0x00
function createVMSpso( $vms ) {
	global $dreamBrowser, $dirPSO, $dirDC, $dirPC;
	$imgName = $vms->getFileHash();

	if ( $dreamBrowser ) {
		$fileType = ".jpg";
		$dirUse = $dirDC;
	} else {
		$fileType = ".png";
		$dirUse = $dirPC;
	}

	if ( !file_exists( $dirPSO . $dirUse . $imgName . $fileType ) ) {

		$img = psocreatefromvms( $vms );
		imagepng( $img, $dirPSO . $dirPC . $imgName . ".png" );
		imagejpeg( $img, $dirPSO . $dirDC . $imgName . ".jpg" );
		imagedestroy($img);
	}
	return $dirPSO . $dirUse . $imgName . $fileType;
}

// $vmiFile = location of VMI file
function getVMSnamefromVMI( $vmiFile ) {
	$fp = fopen($vmiFile, "r");
	fseek($fp, 0x50);
	$VMSname = fread( $fp, 8);
	fclose($fp);

	$arr = explode(chr(0), $VMSname);
	$arr = explode(chr(20), $arr[0]);
	$VMSname = $arr[0] . ".VMS";

	return $VMSname;
}

// This function will search for VMS's that don't have
// corresponding VMI files and then create them.
// $vmsFile = location of VMS file
function generateVMI( $vmsFile, $vmsDir ) {

	// Remove ".VMS"
	$resource_name = end( explode( "/", $vmsFile ) );
	$tmp_arr = explode( ".", $resource_name );
	$resource_name = $tmp_arr[0];

	// Load VMS file
	$vms = new VMS;
	$vms->load( $vmsFile );

	// Not sure the best way to handle this
	// as we don't have access to the name from
	// the VMU, but I'm not sure it's important.
	$fileName = $vms->readString( 0x00, 12 );

	// Get the size of the VMS file data
	$fileSize = $vms->getSize();

	// Generate a time field.
	date_default_timezone_set('UTC');
	$time = date( "YmdHisw", filectime( $vmsFile ) );

	// Reusing code from "upload.php"
	// Not the most efficient way to process this.
	$year = intval( substr( $time, 0, 4 ) );
	$month = intval( substr( $time, 4, 2 ) );
	$day = intval( substr( $time, 6, 2 ) );
	$hour = intval( substr( $time, 8, 2 ) );
	$min = intval( substr( $time, 10, 2 ) );
	$sec = intval( substr( $time, 12, 2 ) );
	// Day of the Week ( 0=sunday - 6=saturday )
	$weekday = intval( substr( $time, 14, 1 ) );


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
		$fileName,
		0, // Data File, and Copying is ok
		0,
		$fileSize );

	$output = unpack("C*", $headPack );

	$vmiFile = fopen( $vmsDir . $resource_name . ".vmi", 'wb' ) or die("Can't create $resource_name.vmi");

	for ( $c = 1; $c <= count( $output ); $c++ ) {
		fwrite( $vmiFile, chr( $output[$c] ) );
	}
	fclose( $vmiFile );
}

// This function will search through VMI's to see if
// the VMS files they link to exist or not
// If not it will rename them.
function validateVMIs( $vmsDir ) {
	$Ikey = "*.[vV][mM][iI]";
	$Skey = "*.[vV][mM][sS]";

	// Get list of all VMI files
	$Ifiles = glob( $vmsDir . $Ikey );

	// Get list of all VMS files
	$Sfiles = glob( $vmsDir . $Skey );

	// Go through all VMI files
	foreach ( $Ifiles as $filefound ) {

		// Make sure all VMI files are ".vmi"
		$filefix = substr( $filefound, 0, -3 ) . "vmi";
		if ( $filefix !== $filefound ) {
			rename( $filefound, $filefix );
		}
		$filefound = $filefix;

		// Extract the VMS file name from the VMI
		$VMSname = getVMSnamefromVMI( $filefound );

		// Check if VMS file exists
		if ( file_exists( $vmsDir . $VMSname ) ) {
			// Remove from list of VMS files.
			foreach($Sfiles as $key => $address) {

				// Check if the address contains the filename
				if(strpos($address, $VMSname) !== false) {
					// Remove Element

					unset($Sfiles[$key]);
					// Reset indexes
					$Sfiles = array_values($Sfiles);
				}
			}
		} else {
			// VMI doesn't point to a real file.
			// Move it to notify user.
			$VMIfile = end( explode( "/", $filefound ) );
			rename( $filefound, $vmsDir . "lost/" . $VMIfile );
		}
	}

	// Go through VMS files that have no VMI files pointing to them.
	foreach ( $Sfiles as $filefound ) {
		// Generate VMI file
		generateVMI( $filefound, $vmsDir );
	}
}

class VMS {

	var $fname;
	var $data;
	var $fileHash = false;

	function load( $fname ) {
		$this->fname = basename( $fname );
		$this->data = file_get_contents( $fname );
	}

	function getName() {
		return $this->fname;
	}

	// Return a hashcode that should match with all saves
	// of the same type from the same game based on the
	// VMS text and DC Boot Rom text.
	function getTypeHash() {

		// 'crc32' is a short hash that returns 8 bytes
		// Based on the limited number of dreamast games
		// there shouldn't be any collisions
		return hash( 'crc32',
			$this->getVMStext()
			. $this->getDCBootRomText() );
	}

	// Certain saves have the exact same VMS text and
	// DC Boot Rom text, but different images. This program
 	// saves all icons under a hash of their values
	// to save space. But this is also used to differentiate
	// certain saves when looking up game information on them
	// and when used to uniquely identify their type.
	function getIconHash() {

		$toGet = "";
		// Put the first icon's palette and data into a string.
		// 0x60 is where the color palette starts.
		// 512 is the size of an image.
		// 32 is the size of the color palette.
		for( $i = 0x60; $i < 0x60 + 512 + 32; $i++ ) {
			$toGet .= $this->get( $i );
		}
		// Encode the string and get a hash from it.
		return hash( 'crc32', base64_encode( $toGet ) );
	}

	// DLC for games such as Phantasy star online have the
	// exact same VMS text, DC Boot Rom text, and icon images.
	// In this case the only way to differentiate is by
	// hashing the whole file.
	function getFileHash() {

		// Variable to cut down on calculation time.
		if ( $this->fileHash ) {
			return $this->fileHash;
		}
		$toGet = "";
		$size = $this->getSize();
		for( $i = 0; $i < $size; $i++ ) {
			$toGet .= $this->get( $i );
		}
		// Encode the string and get a hash from it.
		$this->fileHash = hash( 'crc32', base64_encode( $toGet ) );
		return $this->fileHash;
	}

	function getSize() {
		return mb_strlen( $this->data );
	}

	function getBlocks() {
		return $this->getSize() / 512;
	}

	function getVMStext() {
		return $this->readString( 0x00, 16 );
	}

	function getDCBootRomText() {
		return $this->readString( 0x10, 32 );
	}

	function getAppID() {
		return $this->readString( 0x30, 16 );
	}

	function getNumFrames() {
		return $this->readInt_16( 0x40 );
	}

	function getAniSpeed() {
		return $this->readInt_16( 0x42 );
	}

	function getEyecatchMode() {
		return $this->readInt_16( 0x44 );
	}

	function get( $index ) {
		return ord( $this->data{$index} );
	}

	function readInt_16( $offset ) {
		return	( $this->get( $offset + 1 ) << 8 ) |
				( $this->get( $offset ) & 0x00FF );
	}

	function readInt_32( $offset ) {

		return	( ( $this->get( $offset + 3 ) << 24 ) & 0xFF000000 ) |
				( ( $this->get( $offset + 2 ) << 16 ) & 0x00FF0000 ) |
				( ( $this->get( $offset + 1 ) <<  8 ) & 0x0000FF00 ) |
				  ( $this->get( $offset )             & 0x000000FF );
	}

	function readString( $offset, $size ) {
		$toReturn = "";
		for ( $i = $offset; $i < $size; $i++ ) {
			$toReturn .= $this->data{$i};
			if ( ord($this->data{$i}) == 0 ) {
				return $toReturn;
			}
		}
		return $toReturn;
	}
}
?>
