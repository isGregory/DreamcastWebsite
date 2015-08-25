<?php
// lookup_savefile.php
//
// Usage:
// require_once 'lookup_savefile.php';
// $luSaves = new saveLookup();

class saveLookup {
	private $savefiles = array();
	private $isBuilt = false;

	function getGame( $vms ) {
		if ( !$this->isBuilt ) {
			$this->buildTable();
		}

		$hash = $vms->getTypeHash();
		$toReturn = @$this->savefiles[ $hash ][ 'game' ];
		if ( NULL === $toReturn ) {

			$hash = $vms->getIconHash();
			$toReturn = @$this->savefiles[ $hash ][ 'game' ];
			if ( NULL === $toReturn ) {

				$hash = $vms->getFileHash();
				$toReturn = @$this->savefiles[ $hash ][ 'game' ];
				if ( NULL === $toReturn ) {
					return "Game/Save";
				}
			}
		}
		return $toReturn;
	}

	function getType( $vms ) {
		if ( !$this->isBuilt ) {
			$this->buildTable();
		}

		$hash = $vms->getTypeHash();
		$toReturn = @$this->savefiles[ $hash ][ 'type' ];
		if ( NULL === $toReturn ) {

			$firstHash = $hash;
			$hash = $vms->getIconHash();
			$toReturn = @$this->savefiles[ $hash ][ 'type' ];
			if ( NULL === $toReturn ) {

				$secondHash = $hash;
				$hash = $vms->getFileHash();
				$toReturn = @$this->savefiles[ $hash ][ 'type' ];
				if ( NULL === $toReturn ) {
					return "Info: $firstHash"
						. "<br>Icon: $secondHash"
						. "<br>File: $hash"
						. "<br>Not Documented";
				}
			}
		}
		return $toReturn;
	}

	private function buildTable() {
		global $root;
		$this->isBuilt = true;

		// Get the game name constants
		require_once $root . 'lookup_game.php';

		// Table is sorted alphebetically by 'game' name.
		$this->savefiles = array(
			"03faaf1d" => array(
				'game'=>"4 Wheel Thunder",
				'type'=>"Main Save"),
			"0e98b99a" => array(
				'game'=>"4x4 Evolution",
				'type'=>"Main Save"),
			"0302c04a" => array(
				'game'=>"4x4 Evolution",
				'type'=>"Custom Track"),
			"17f3394c" => array(
				'game'=>"AeroWings",
				'type'=>"Main Save"),
			"6c689992" => array(
				'game'=>"Aqua GT",
				'type'=>"Main Save"),
			"d03347d1" => array(
				'game'=>"Buggy Heat",
				'type'=>"Main Save"),
			"159cc866" => array(
				'game'=>"Draconus: Cult of the Wyrm",
				'type'=>"Main Save"),
			"bdc9b427" => array(
				'game'=>"Fur Fighters",
				'type'=>"Main Save"),
			"1bec1593" => array(
				'game'=>"Headhunter",
				'type'=>"Game Options"),
			"2a9cfdfd" => array(
				'game'=>getGameName( JET_GRIND_RADIO ),
				'type'=>"Main Save"),
			"ee87c2d9" => array(
				'game'=>getGameName( JET_GRIND_RADIO ),
				'type'=>"Small Graffiti"),
			"a101d800" => array(
				'game'=>getGameName( JET_GRIND_RADIO ),
				'type'=>"Large Graffiti"),
			"4e7ecdf6" => array(
				'game'=>getGameName( JET_GRIND_RADIO ),
				'type'=>"Xtra-Large Graffiti"),
			"96c5f9b3" => array(
				'game'=>"Max Steel",
				'type'=>"Game Options"),
			"b0150787" => array(
				'game'=>"Nightmare Creatures II",
				'type'=>"Main Save"),
			"f70c77d9" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Easter Quest - 1 of 3"),
			"668de97c" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Easter Quest - 2 of 3"),
			"e64630a4" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Easter Quest - 3 of 3"),
			"aa77632f" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Famitsu Cup Quest - 2 of 3?"),
			"a6c9f449" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Famitsu Cup Quest - 3 of 3?"),
			"ece18718" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Letter from Lionel Quest 1 of 2"),
			"6406f13c" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Letter from Lionel Quest 2 of 2"),
			"1e3d9a3e" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Retired Hunter Quest 1 of 2"),
			"545995e9" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Retired Hunter Quest 2 of 2"),
			"dc38a93c" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Raw Material Quest 1 of 2"),
			"db2eb49c" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V1 ),
				'type'=>"Raw Material Quest 2 of 2"),
			"5744bd39" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V2 ),
				'type'=>"Screenshot"),
			"aa684f21" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V2 ),
				'type'=>"Main Save"),
			"d18229c3" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V2 ),
				'type'=>"Guild Card"),
			"4ff15894" => array(
				'game'=>getGameName( PHANTASY_STAR_ONLINE_V2 ),
				'type'=>"Downloadable Content"),
			"42973ff7" => array(
				'game'=>"Psychic Force 2012",
				'type'=>"Main Save"),
			"a35332ad" => array(
				'game'=>"Quake III: Arena Spanish",
				'type'=>"Main Save"),
			"4d5cdf0f" => array(
				'game'=>"Quake III: Arena",
				'type'=>"Main Save"),
			"2f24bef9" => array(
				'game'=>getGameName( SHENMUE ),
				'type'=>"Main Save"),
			"929a01cd" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Main Save"),
			"7e82af3c" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Upload Data"),
			"aa0df537" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Japanese Christmas Event"),
			"e51ee355" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Hidekazu Yukawa Quo Card Contest"),
			"e9ae53ff" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Famitsu Magazine Contest"),
			"bf9d8406" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Halloween Event"),
			"0220cb3e" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"European Halloween Event"),
			"56eee6fc" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Christmas Event"),
			"2d27bbd5" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"New Years Event"),
			"f9da3aa1" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"US Launch Party"),
			"d00e749a" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Europe Launch Party"),
			"ab447a02" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Japanese Launch Party"),
			"d19e1dcc" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"AT&T Contest - Part 1"),
			"44443b73" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"AT&T Contest - Part 2"),
			"31925cf2" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"AT&T Contest - Part 3"),
			"e2daf453" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Reebok Contest"),
			"a2f835d5" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Samba De Amigo Course"),
			"75904acc" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Unknown, possibly early Samba De Amigo Course?"),
			"db76a752" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Sonic Voice Theme"),
			"66f46da8" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Tails Voice Theme"),
			"39468310" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Knuckles Voice Theme"),
			"3994ca00" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Amy Voice Theme"),
			"6eff27f5" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Gamma Voice Theme"),
			"ad11f4c3" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Big Voice Theme"),
			"80e64c0e" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Dr. Eggman Voice Theme"),
			"5d284e2f" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Tikal Voice Theme"),
			"562c15c8" => array(
				'game'=>getGameName( SONIC_ADVENTURE ),
				'type'=>"Random Voice Theme"),
			"7aadd2f3" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Main Save"),
			"86df7f16" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Chao Garden"),
			"3a7d695f" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"High-Speed Trial Kart Map"),
			"945bca5b" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Opa Opa Kart Map"),
			"6ae0a7e2" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Eggrobo Kart Map"),
			"44a59e3b" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Sonic Theme"),
			"f92754c1" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Tails Theme"),
			"a695ba79" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Knuckles Theme"),
			"4295e2c7" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Shadow Theme"),
			"633ad529" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Dr. Eggman Theme"),
			"2bf7beac" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Rouge Theme"),
			"a647f369" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Amy Theme"),
			"cacf34bf" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Omochao Theme"),
			"8d178fc7" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Maria Theme"),
			"03ff64e8" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Secretary Theme"),
			"79faff25" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Halloween Theme"),
			"966b8a74" => array(
				'game'=>getGameName( SONIC_ADVENTURE_2 ),
				'type'=>"Christmas Theme"),
			"aee1b12e" => array(
				'game'=>"Star Wars Episode 1 Podracer",
				'type'=>"Main Save"),
			"2e56c9d4" => array(
				'game'=>"Starlancer",
				'type'=>"Main Save"),
			"505b6027" => array(
				'game'=>"The King of Fighters: Dream Match 1999",
				'type'=>"Main Save"),
			"bd990b36" => array(
				'game'=>"Tony Hawks Pro Skater 2",
				'type'=>"Main Save"),
		);
	}
}

?>
