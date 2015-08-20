<?php
// format_dlc.php

	// Names defined in "lookup_game.php"
	function callDLCFunction( $name ) {
		global $dirDLC, $root;
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
			dlcEntry( 'EASTER1', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'EASTER2', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'EASTER3', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'FAMITSU2', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'FAMITSU3', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'LETTER1', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'LETTER2', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'RAREMAT1', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'RAREMAT2', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'RETIRED1', PHANTASY_STAR_ONLINE_V1 );
			dlcEntry( 'RETIRED2', PHANTASY_STAR_ONLINE_V1 );
		dlcCloseTable();
	}

	// DLC of Sonic Adventure 1
	function dlc_sa1() {
		dlcOpenTable();
			dlcEntry( 'SA1_V11', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V12', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V13', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V14', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V15', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V16', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V17', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V18', SONIC_ADVENTURE );
			dlcEntry( 'SA1_V19', SONIC_ADVENTURE );
			dlcEntry( 'SA1_000', SONIC_ADVENTURE );
			dlcEntry( 'SA1_002', SONIC_ADVENTURE );
			dlcEntry( 'SA1_003', SONIC_ADVENTURE );
			dlcEntry( 'SA1_135', SONIC_ADVENTURE );
			dlcEntry( 'SA1_501', SONIC_ADVENTURE );
			dlcEntry( 'SA1_502', SONIC_ADVENTURE );
			dlcEntry( 'SA1_503', SONIC_ADVENTURE );
			dlcEntry( 'SA1_504', SONIC_ADVENTURE );
			dlcEntry( 'SA1_505', SONIC_ADVENTURE );
			dlcEntry( 'SA1_506', SONIC_ADVENTURE );
			dlcEntry( 'SA1_507', SONIC_ADVENTURE );
			dlcEntry( 'SA1_508', SONIC_ADVENTURE );
			dlcEntry( 'SA1_509', SONIC_ADVENTURE );
			dlcEntry( 'SA1_510', SONIC_ADVENTURE );
			dlcEntry( 'SA1_511', SONIC_ADVENTURE );
			dlcEntry( 'SA1_511b', SONIC_ADVENTURE );
		dlcCloseTable();
	}

	// DLC of Sonic Adventure 2
	function dlc_sa2() {
		dlcOpenTable();
			dlcEntry( 'DOWN001', SONIC_ADVENTURE_2 );
			dlcEntry( 'DOWN002', SONIC_ADVENTURE_2 );
			dlcEntry( 'DOWN003', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME001', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME002', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME003', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME004', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME005', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME006', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME007', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME008', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME009', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME010', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME011', SONIC_ADVENTURE_2 );
			dlcEntry( 'THEME012', SONIC_ADVENTURE_2 );
		dlcCloseTable();
	}
?>
