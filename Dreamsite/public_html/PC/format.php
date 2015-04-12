<?php
	//format.php

	// Used to alternate colors (ac) between the
	// two main ones for the rows of tables.
	function ac( &$cur ) {
		include 'pc_globals.php';

		if ( $cur == $C1 ) {
			$cur = $C2;
		} else {
			$cur = $C1;
		}
		return $cur;
	}

	function threeEntry( $one, $two, $three ) {
		global $col;
		echo "
            <tr bgcolor='" . ac($col) . "'>
                <td align='center'>$one</td>
                <td>$two</td>
                <td>$three</td>
            </tr>
        ";
    }

	function fiveEntry( $one, $two, $three, $four, $five ) {
		global $col;
        echo "
            <tr bgcolor='" . ac($col) . "'>
                <td>$one</td>
                <td><pre>$two</pre></td>
                <td align='center'>$three</td>
                <td>$four</td>
                <td>$five</td>
            </tr>
        ";
    }

	function memoryTable() {
		echo "
			<table cellpadding='3' cellspacing='1' border='0' style='max-width:640px;' bgcolor='#6E6E6E'>
				<tr bgcolor='#CCCCCC'>
					<th colspan='2'>Offset</th><th rowspan='2'>Size (bytes)</th><th rowspan='2'>Datatype</th><th rowspan='2' width='400px'>Contents</th>
				</tr>
				<tr bgcolor='#CCCCCC'>
					<th>Byte</th><th>Hex</th>
				</tr>
		";
	}

    function memoryEntry( $hex, $size, $type, $contents ) {
        fiveEntry( hexdec( $hex ), $hex, $size, $type, $contents );
    }

	function fourColorPalette() {
		echo "
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
		";
	}
?>
