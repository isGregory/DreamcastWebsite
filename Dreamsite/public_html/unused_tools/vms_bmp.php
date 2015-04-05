// File Header
// 14 Bytes
class BMPfileHeader {

	// The header field (Usually 'B', 'M')
	// 2 Bytes
	var $magic1;
	var $magic2;

	// The size of the BMP file in bytes
	// 4 Bytes
	var $fileSize;

	// First reserved value
	// 2 Bytes
	var $reservedOne;

	// Second reserved value
	// 2 Bytes
	var $reservedTwo;

	// Offset starting address,
	// in bytes, of the bitmap image
	// 4 Bytes
	var $offset;
}

// Info Header
// 40 Bytes
class BMPinfoHeader {
	// Size of this header (40 bytes)
	// 4 Bytes
	var $infoSize;

	// Width in pixels (signed int)
	// 4 Bytes
	var $width;

	// Width in pixels (signed int)
	// 4 Bytes
	var $height;

	// Number of color planes (must be 1)
	// 2 Bytes
	var $colorPlanes;

	// Number of bits per pixel
	// (Typical Values: 1, 4, 8, 16, 24, 32)
	// 2 Bytes
	var $bitsPerPixel;

	// Compression Method
	// 0  BI_RGB    none              Most Common
	// 1  BI_RLE8   RLE 8-bit/pixel   Only with 8-bit/pixel bitmaps
	// 2  BI_RLE4   RLE 4-bit/pixel   Only with 4-bit/pixel bitmaps
	// 4 Bytes
	var $compression;

	// Image Size
	// Byte size of raw bitmap data. A dummy '0' can
	// be given for BI_RGB(0) compression.
	// 4 Bytes
	var $imageSize;

	// Horizontal Resolution
	// Pixels per meter
	// 4 Bytes
	var $horizontalResolution;

	// Vertical Resolution
	// Pixels per meter
	// 4 Bytes
	var $verticalResolution;

	// Number of colors in the color palette
	// 0 to default to 2^n
	// 4 Bytes
	var $numColors;

	// Number of important colors
	// 0 when every color is important. Generally ignored.
	// 4 Bytes
	var $numImportant;
}

class BMP {

	var $fH;
	var $iH;

	function BMP() {
		$this->fH = new BMPfileHeader;
		$this->iH = new BMPinfoHeader;
	}

	function setShared() {

		// Establish it as a common bmp file.
		$this->fH->magicA = 'B';
		$this->fH->magicB = 'M';

		$this->fH->reservedOne = 0;
		$this->fH->reservedTwo = 0;

		// Info Header
		$this->iH->infoSize = 40;

		$this->iH->colorPlanes = 1;

		$this->iH->compression = 0;

		$this->iH->imageSize = 0;

		$this->iH->horizontalResolution = 2835;

		$this->iH->verticalResolution = 2835;

		$this->iH->numImportant = 0;
	}

	function setIconDefault() {

		// Set consistant bmp settings
		$this->setShared();

		// File Size
		// Headers:             54 Bytes
		// Color Palette:       64 Bytes
		// Pixel Content:     2016 Bytes
		$this->fH->fileSize = 2134;

		// Data Offset
		// BMP Header:          14 Bytes
		// Info Header:         40 Bytes
		// Color Palette:       64 Bytes
		$this->fH->offset = 118;

		// Set up the defaults for the picture info header
		$this->iH->width = 32;
		$this->iH->height = -32;
		$this->iH->bitsPerPixel = 4;
		$this->iH->numColors = 16;
	}

	function getBMP() {
		$this->setIconDefault();

		$binaryData = pack("CCVvvVVVVvvVVVVVV",
			ord($this->fH->magicA),
			ord($this->fH->magicB),
			$this->fH->fileSize,
			$this->fH->reservedOne,
			$this->fH->reservedTwo,
			$this->fH->offset,
			$this->iH->infoSize,
			$this->iH->width,
			$this->iH->height,
			$this->iH->colorPlanes,
			$this->iH->bitsPerPixel,
			$this->iH->compression,
			$this->iH->imageSize,
			$this->iH->horizontalResolution,
			$this->iH->verticalResolution,
			$this->iH->numColors,
			$this->iH->numImportant );

		return $binaryData;
	}

	function getColorPalette( &$toReturn, $sfile, $offset, $size ) {

		// Write out the color palette
		for( $i = 0; $i < ( $size * 2 ); $i += 2 ) {

			// Extract out the individual color components
			// using bitmasks and bitwise operators.
			// Each color is 4 bits.
			$Alpha = ( $sfile->get( $offset + $i + 1 ) >> 4 ) & 0x0F;
			$Red   =   $sfile->get( $offset + $i + 1 ) & 0x0F;
			$Green = ( $sfile->get( $offset + $i )     >> 4 ) & 0x0F;
			$Blue  =   $sfile->get( $offset + $i )     & 0x0F;

			// Modify the color value to the correct levels
			$Red   = ( $Red   << 4 ) & 0xFF;
			$Green = ( $Green << 4 ) & 0xFF;
			$Blue  = ( $Blue  << 4 ) & 0xFF;

			// Convert individual components to a single 32-bit color.
			$Color32 = ( ($Red << 16) | ($Green << 8) | $Blue ) & 0xFFFFFFFF;

			// Save the pixel to the BMP file.
			$toReturn .= pack( "V", $Color32 );
		}
	}

	function getVMSicon( $fname, $BMPname ) {
		if ( file_exists( $BMPname ) ) {
			return;
		}

		if ( !file_exists( $fname ) ) {
			return;
		}

		$frameNum = 0;

		$vmsFile = new VMS;
		$vmsFile->load( $fname );

		$package = $this->getBMP();
		$this->getColorPalette( $package, $vmsFile, 0x60, 16 );

		// Assemble the pixel data
		$frameSize = 512; //32x32 pixels, and 2 pixels per byte.
		$offset = 0x80 + ( $frameSize * $frameNum );

		for ( $i = 0; $i < $frameSize; $i++ ) {
			$next = $vmsFile->get( $offset + $i );
			$package .= pack( "C", $next );
		}

		$ascii = unpack("C*", $package );

		$bmp = fopen( $BMPname, 'wb' ) or die("can't open $BMPname");

		for ( $c = 1; $c <= count($ascii); $c++ ) {
			fwrite( $bmp, chr($ascii[$c]) );
		}
		fclose( $bmp );
	}
}

/////// GIF Not Working
/////// Can't get the LZW compression to work.
/*
// sfile - VMS object
// Offset for Icons is 0x60
// Size for Icons is 16
function getGIFPalette( &$toReturn, $sfile, $offset, $size ) {

	// Write out the color palette
	for( $i = 0; $i < ( $size * 2 ); $i += 2 ) {

		// Extract out the individual color components
		// using bitmasks and bitwise operators.
		// Each color is 4 bits.
		$Alpha = ( $sfile->get( $offset + $i + 1 ) >> 4 ) & 0x0F;
		$Red   =   $sfile->get( $offset + $i + 1 ) & 0x0F;
		$Green = ( $sfile->get( $offset + $i )     >> 4 ) & 0x0F;
		$Blue  =   $sfile->get( $offset + $i )     & 0x0F;

		// Modify the color value to the correct levels
		$Red   = ( $Red   << 4 ) & 0xFF;
		$Green = ( $Green << 4 ) & 0xFF;
		$Blue  = ( $Blue  << 4 ) & 0xFF;

		// Save the pixel to the GIF file.
		$toReturn .= pack( "C", $Red );
		$toReturn .= pack( "C", $Green );
		$toReturn .= pack( "C", $Blue );
	}
}

function getGIF( $fname, $GIFname ) {

	if ( !file_exists( $fname ) ) {
		return;
	}

	$vmsFile = new VMS;
	$vmsFile->load( $fname );

	$width = 32;
	$height = 32;

	$dataPack = pack("CCCCCCvvCCC",
		ord('G'),
		ord('I'),
		ord('F'),
		ord('8'),
		ord('9'),
		ord('a'),
		$width,
		$height,
		0xB3,
		0,
		0 );

	// Color Table
	getGIFPalette( $dataPack, $vmsFile, 0x60, 16 );

	$dataPack .= pack("CCCCvCCCvvvvC",
		0x21,
		0xF9,
		4,
		0,
		0,
		0,
		0,
		0x2C,
		0,
		0,
		$width,
		$height,
		0 );

	// Image Data
	$lzw = new LZW();

	// Assemble the pixel data
	$frameNum = 0;
	$frameSize = 512; //32x32 pixels, and 2 pixels per byte.
	$offset = 0x80 + ( $frameSize * $frameNum );

	$toComp = "";
	for ( $i = 0; $i < $frameSize; $i++ ) {
		$toComp .= $vmsFile->get( $offset + $i );
	}

	// This part doesn't work.
	$com = $lzw->compress($toComp);

	$dataPack .= pack("C*", $com);

	$dataPack .= pack("C", 0x3B);


	$ascii = unpack("C*", $dataPack );

	$gif = fopen( $GIFname, 'wb' ) or die("can't open $GIFname");

	for ( $c = 1; $c <= count($ascii); $c++ ) {
		fwrite( $gif, chr($ascii[$c]) );
	}
	fclose( $gif );
}*/
