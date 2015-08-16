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
		$toReturn = $this->savefiles[ $hash ][ 'game' ];
		if ( NULL === $toReturn ) {

			$hash = $vms->getIconHash();
			$toReturn = $this->savefiles[ $hash ][ 'game' ];
			if ( NULL === $toReturn ) {
				return "Game/Save";
			}
		}
		return $toReturn;
	}

	function getType( $vms ) {
		if ( !$this->isBuilt ) {
			$this->buildTable();
		}

		$hash = $vms->getTypeHash();
		$toReturn = $this->savefiles[ $hash ][ 'type' ];
		if ( NULL === $toReturn ) {

			$firstHash = $hash;
			$hash = $vms->getIconHash();
			$toReturn = $this->savefiles[ $hash ][ 'type' ];
			if ( NULL === $toReturn ) {
				return "Info: $firstHash"
					. "<br>Icon: $hash"
					. "<br>Not Documented";
			}
		}
		return $toReturn;
	}

	private function buildTable() {

		$this->isBuilt = true;

		require_once $root . 'lookup_game.php';

		// Table is sorted alphebetically by 'game' name.
		$this->savefiles = array(
			"03faaf1d" => array(
				'game'=>"4 Wheel Thunder",
				'type'=>"Main Save"),
			"e1c65aeb" => array(
				'game'=>"4x4 Evolution",
				'type'=>"Main Save"),
			"f98203e9" => array(
				'game'=>"4x4 Evolution",
				'type'=>"Custom Track"),
			"17f3394c" => array(
				'game'=>"AeroWings",
				'type'=>"Main Save"),
			"6c689992" => array(
				'game'=>"Aqua GT",
				'type'=>"Main Save"),
			"a7d9691c" => array(
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
			"a603dae7" => array(
				'game'=>getGameName( JET_GRIND_RADIO ),
				'type'=>"Small Graffiti"),
			"2e4026b8" => array(
				'game'=>getGameName( JET_GRIND_RADIO ),
				'type'=>"Large Graffiti"),
			"96c5f9b3" => array(
				'game'=>"Max Steel",
				'type'=>"Game Options"),
			"b0150787" => array(
				'game'=>"Nightmare Creatures II",
				'type'=>"Main Save"),
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
			"2f24bef9" => array(
				'game'=>getGameName( SHENMUE ),
				'type'=>"Main Save"),
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
			"0ac9f428" => array(
				'game'=>"Starlancer",
				'type'=>"Main Save"),
			"505b6027" => array(
				'game'=>"The King of Fighters: Dream Match 1999",
				'type'=>"Main Save"),
			"bd990b36" => array(
				'game'=>"Tony Hawks Pro Skater 2",
				'type'=>"Main Save"),
			"a35332ad" => array(
				'game'=>"Quake III: Arena Spanish",
				'type'=>"Main Save"),
			"4d5cdf0f" => array(
				'game'=>"Quake III: Arena",
				'type'=>"Main Save"),
		);
	}
}

?>
