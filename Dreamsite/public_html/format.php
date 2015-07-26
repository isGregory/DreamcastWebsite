<?php
	//format.php

	// Two colors for doing rows in tables
	$C1 = "#FFFFFF";
	$C2 = "#CEEBF5";
	$altC1 = "#FFFFFF";
	$altC2 = "#A6FFB2";

	// Currently used row color.
	$cur = $C1;
	$altCur = $altC1;

	// Table header color
	$tHead = "#CCCCCC";

	// Table background color
	$tBG = "#6E6E6E";

	// Index header color
	$indexHead = "#BBBBBB";

	// Index sub header color
	$indexSub = "#E0E0E0";

	$dcBGimg = "tile.png";

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

	// Used to alternate colors (ac) between the
	// two main ones for the rows of tables.
	function ac() {
		global $cur, $C1, $C2;

		if ( $cur == $C1 ) {
			$cur = $C2;
		} else {
			$cur = $C1;
		}
		return $cur;
	}

	// Used to alternate alternative colors (altc)
	// between alternative colors for rows of a table.
	function altc() {
		global $altCur, $altC1, $altC2;

		if ( $altCur == $altC1 ) {
			$altCur = $altC2;
		} else {
			$altCur = $altC1;
		}
		return $altCur;
	}

	function twoEntry( $one, $two ) {
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td align='center'><?php echo $one; ?></td>
				<td><?php echo $two; ?></td>
			</tr>
		<?php
	}

	function threeEntry( $one, $two, $three ) {
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td align='center'><?php echo $one; ?></td>
				<td><?php echo $two; ?></td>
				<td><?php echo $three; ?></td>
			</tr>
		<?php
	}

	function fiveEntry( $one, $two, $three, $four, $five ) {
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td><?php echo $one; ?></td>
				<td><pre><?php echo $two; ?></pre></td>
				<td align='center'><?php echo $three; ?></td>
				<td><?php echo $four; ?></td>
				<td><?php echo $five; ?></td>
			</tr>
		<?php
	}

	function convTable( $fC, $tC, $fH, $tH ) {
		?>
			<tr align='center' bgcolor="<?php echo ac(); ?>">
				<td><?php echo $fC; ?></td>
				<td><?php echo $tC; ?></td>
				<td><pre><?php echo $fH; ?></pre></td>
				<td><pre><?php echo $tH; ?></pre></td>
			</tr>
		<?php
	}

	function memoryTable() {
		?>
			<table cellpadding='3' cellspacing='1' border='0' style='max-width:640px;' bgcolor='<?php echo $tBG; ?>'>
				<tr bgcolor='<?php echo $tHead; ?>'>
					<th colspan='2'>Offset</th><th rowspan='2'>Size (bytes)</th><th rowspan='2'>Datatype</th><th rowspan='2' width='400px'>Contents</th>
				</tr>
				<tr bgcolor='<?php echo $tHead; ?>'>
					<th>Byte</th><th>Hex</th>
				</tr>
		<?php
	}

	function memoryCloseTable() {
		?>
			</table>
		<?php
	}

	function memoryEntry( $hex, $size, $type, $contents ) {
		fiveEntry( hexdec( $hex ), $hex, $size, $type, $contents );
	}

	function fourColorPalette() {
		global $tBG;
		?>
			<table cellpadding='3' cellspacing='1' border='0' bgcolor='<?php echo $tBG; ?>'>
				<tr>
					<td bgcolor='#CCCCCC'>15</td><td bgcolor='#CCCCCC'>14</td><td bgcolor='#CCCCCC'>13</td><td bgcolor='#CCCCCC'>12</td>
					<td bgcolor='#CC9595'>11</td><td bgcolor='#CC9595'>10</td><td bgcolor='#CC9595'>9</td><td bgcolor='#CC9595'>8</td>
					<td bgcolor='#95CCAA'>7</td><td bgcolor='#95CCAA'>6</td><td bgcolor='#95CCAA'>5</td><td bgcolor='#95CCAA'>4</td>
					<td bgcolor='#95B2CC'>3</td><td bgcolor='#95B2CC'>2</td><td bgcolor='#95B2CC'>1</td><td bgcolor='#95B2CC'>0</td>
				</tr>
				<tr>
					<td align='center' colspan='4' bgcolor='#FFFFFF'>Alpha</td>
					<td align='center' colspan='4' bgcolor='#F2B9AE'>Red</td>
					<td align='center' colspan='4' bgcolor='#B9F2AE'>Green</td>
					<td align='center' colspan='4' bgcolor='#CEEBF5'>Blue</td>
				</tr>
			</table>
		<?php
	}

	function dlcOpenTable() {
		global $dreamBrowser, $tHead, $tBG;
		$span = 2;
		if ( $dreamBrowser ) {
			$span = 1;
		}
		?>
			<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
				<tr bgcolor="<?php echo $tHead; ?>">
					<th colspan="<?php echo $span; ?>">Downloads</th><th width="65px" rowspan="2">Size<br>(Blocks)</th><th width="100px" rowspan="2">File Name</th><th rowspan="2">Description</th><th width="34px" rowspan="2">Icon</th>
				</tr>
				<tr bgcolor="<?php echo $tHead; ?>">
					<th width="34px">VMI</th>
					<?php if ( !$dreamBrowser ) { ?>
						<th width="34px">VMS</th>
					<?php } ?>
				</tr>
		<?php
	}

	// Formats DLC information taking in just a string filename.
	// This is seen on PC site game pages.
	// To load DLC file "ABC.vmi" $file would be "ABC"
	// $file     String of file name.
	function dlcEntry( $file ) {
		require_once dirname(__FILE__) . '/dc_tools.php';
		global $homeDir, $root, $dirDLC, $dirImages, $dreamBrowser;

		$filename = $homeDir . $dirDLC . $file . ".vmi";
		if ( ! file_exists( $filename ) ) {
			return;
		}
		$VMSname = getVMSnamefromVMI( $filename );
		$VMIfile = end( explode( "/", $filename ) );

		$vms = new VMS;
		$vms->load( $homeDir . $dirDLC . $VMSname );
		$imgName = createVMSicons( $vms );
		$blocks = $vms->getBlocks();

		require_once dirname(__FILE__) . '/savefile_lookup.php';
		$luSaves = new saveLookup();
		$luType = $luSaves->getType( $vms );
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td align="center">
					<a href="<?php echo $homeDir . $root . "vmidl.php?id=dlc/$VMIfile&t=i" ?>">
						<img src="<?php echo $homeDir . $dirImages . "save_vmi.png"?>">
					</a>
				</td>
				<?php
					if ( !$dreamBrowser ) {
				?>
					<td align="center">
						<a href="<?php echo $homeDir . $root . "vmidl.php?id=dlc/$VMIfile&t=s" ?>">
							<img src="<?php echo $homeDir . $dirImages . "save_vms.png"?>">
						</a>
					</td>
				<?php
					}
				?>
				<td align="center"><?php echo $blocks; ?></td>
				<td align="center"><?php echo $file; ?></td>
				<td><?php echo $luType; ?></td>
				<td align="center"><img src='<?php echo $imgName; ?>'></td>
			</tr>
		<?php
	}

	function dlcCloseTable() {
		?>
			</table>
		<?php
	}
?>
