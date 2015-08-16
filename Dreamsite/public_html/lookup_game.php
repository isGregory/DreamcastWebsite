<?php
// lookup_game.php

	define( "_4X4_EVOLUTION", "4x4" );
	define( "JET_GRIND_RADIO", "JGR" );
	define( "PHANTASY_STAR_ONLINE_V1", "PSO_V1" );
	define( "PHANTASY_STAR_ONLINE_V2", "PSO_V2" );
	define( "SHENMUE", "shen" );
	define( "STARLANCER", "SL" );
	define( "SONIC_ADVENTURE", "SA1" );
	define( "SONIC_ADVENTURE_2", "SA2" );
	define( "QUAKE_3_ARENA", "Q3A" );

	define( "NOT_FOUND", "Not Found" );

	// Get a game's name based on truncated name.
	function getGameName( $name ) {
		if ( _4X4_EVOLUTION === $name ) {
			return "4x4 Evolution";
		} else if ( JET_GRIND_RADIO === $name ) {
			return "Jet Grind Radio";
		} else if ( PHANTASY_STAR_ONLINE_V1 === $name ) {
			return "Phantasy Star Online Ver. 1";
		} else if ( PHANTASY_STAR_ONLINE_V2 === $name ) {
			return "Phantasy Star Online Ver. 2";
		} else if ( SHENMUE === $name ) {
			return "Shenmue";
		} else if ( STARLANCER === $name ) {
			return "Starlancer";
		} else if ( SONIC_ADVENTURE === $name ) {
			return "Sonic Adventure";
		}  else if ( SONIC_ADVENTURE_2 === $name ) {
			return "Sonic Adventure 2";
		}  else if ( QUAKE_3_ARENA === $name ) {
			return "Quake 3 Arena";
		} else {
			return NOT_FOUND;
		}
	}
?>
