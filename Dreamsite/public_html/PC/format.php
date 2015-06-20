<?php
	//format.php

	// Used to alternate colors (ac) between the
	// two main ones for the rows of tables.
	function ac() {
		require_once 'pc_globals.php';
		global $cur, $C1, $C2;

		if ( $cur == $C1 ) {
			$cur = $C2;
		} else {
			$cur = $C1;
		}
		return $cur;
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
				<td><?php echo $fH; ?></td>
				<td><?php echo $tH; ?></td>
			</tr>
		<?php
	}

	function memoryTable() {
		?>
			<table cellpadding='3' cellspacing='1' border='0' style='max-width:640px;' bgcolor='#6E6E6E'>
				<tr bgcolor='#CCCCCC'>
					<th colspan='2'>Offset</th><th rowspan='2'>Size (bytes)</th><th rowspan='2'>Datatype</th><th rowspan='2' width='400px'>Contents</th>
				</tr>
				<tr bgcolor='#CCCCCC'>
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
		?>
			<table cellpadding='3' cellspacing='1' border='0' bgcolor='#6E6E6E'>
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
?>
