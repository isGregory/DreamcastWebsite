<?php
// format_dlc.php

	// Names defined in "lookup_game.php"
	function callDLCFunction( $name ) {
		global $dirDLC;
		require_once $root . 'dc_tools.php';
		validateVMIs( $dirDLC . $name . "/" );
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
			dlcEntry( 'PS0', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'Potato', PHANTASY_STAR_ONLINE_V1);
		dlcCloseTable();
	}

	// DLC of Sonic Adventure 1
	function dlc_sa1() {
		dlcOpenTable();
			dlcEntry( 'SA1', SONIC_ADVENTURE);
			dlcEntry( 'Potato', SONIC_ADVENTURE);
		dlcCloseTable();
	}

	// DLC of Sonic Adventure 2
	function dlc_sa2() {
		dlcOpenTable();
			dlcEntry( 'DOWN001', SONIC_ADVENTURE_2);
			dlcEntry( 'DOWN002', SONIC_ADVENTURE_2);
			dlcEntry( 'DOWN003', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME001', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME002', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME003', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME004', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME005', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME006', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME007', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME008', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME009', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME010', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME011', SONIC_ADVENTURE_2);
			dlcEntry( 'THEME012', SONIC_ADVENTURE_2);
		dlcCloseTable();
	}
?>
