<?php
// format_dlc.php

	// Names defined in "lookup_game.php"
	function callDLCFunction( $name ) {
		if ( PHANTASY_STAR_ONLINE_V1 === $name ) {
			dlc_PSO_V1();
		} else if ( SONIC_ADVENTURE === $name ) {
			dlc_sa1();
		} else if ( SONIC_ADVENTURE_2 === $name ) {
			dlc_sa2();
		} else {
			return false;
		}
		return true;
	}

	// Print the entry for the index.
	function printDLCEntry( $name ) {
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td align='center'>
					<a href='dlc_list.php?n=<?php echo $name; ?>'
						style='text-decoration:none'>
						<?php echo getGameName( $name ); ?>
					</a>
				</td>
			</tr>
		<?php
	}

	// Website links of Phantasy Star Online
	function dlc_PSO_V1() {
		dlcOpenTable();
			dlcEntry('PS0');
			dlcEntry('Potato');
		dlcCloseTable();
	}

	// DLC of Sonic Adventure 1
	function dlc_sa1() {
		dlcOpenTable();
			dlcEntry('SA1');
			dlcEntry('Potato');
		dlcCloseTable();
	}

	// DLC of Sonic Adventure 2
	function dlc_sa2() {
		dlcOpenTable();
			dlcEntry('DOWN001');
			dlcEntry('Potato');
		dlcCloseTable();
	}
?>
