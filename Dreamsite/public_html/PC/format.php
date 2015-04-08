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

    function memoryEntry( $hex, $size, $type, $contents ) {
        fiveEntry( hexdec( $hex ), $hex, $size, $type, $contents );
    }
?>
