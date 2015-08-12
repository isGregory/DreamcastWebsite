<?php
// lookup_game.php

	define( "JET_GRIND_RADIO", "JGR" );
	define( "PHANTASY_STAR_ONLINE_V1", "PSO_V1" );
	define( "PHANTASY_STAR_ONLINE_V2", "PSO_V2" );
	define( "SHENMUE", "shenmue" );
	define( "SONIC_ADVENTURE", "SA1" );
	define( "SONIC_ADVENTURE_2", "SA2" );

	define( "NOT_FOUND", "Not Found" );

	// Get a game's name based on truncated name.
	function getGameName( $name ) {
		if ( JET_GRIND_RADIO === $name ) {
			return "Jet Grind Radio";
		} else if ( PHANTASY_STAR_ONLINE_V1 === $name ) {
			return "Phantasy Star Online Ver. 1";
		} else if ( PHANTASY_STAR_ONLINE_V2 === $name ) {
			return "Phantasy Star Online Ver. 2";
		} else if ( SHENMUE === $name ) {
			return "Shenmue";
		} else if ( SONIC_ADVENTURE === $name ) {
			return "Sonic Adventure";
		}  else if ( SONIC_ADVENTURE_2 === $name ) {
			return "Sonic Adventure 2";
		} else {
			return NOT_FOUND;
		}
	}
?>
