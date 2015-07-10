<?php
// savefile_lookup.php
//
// Usage:
// require_once 'savefile_lookup.php';
// $saveInfo = new saveLookup();
// $saveInfo->buildTable();

class saveLookup {
	private $savefiles = array();

	function getGame( $hash ) {
		$toReturn = $this->savefiles[ $hash ][ 'game' ];
		if ( NULL === $toReturn ) {
			return "Game/Save";
		}
		return $toReturn;
	}

	function getType( $hash ) {
		$toReturn = $this->savefiles[ $hash ][ 'type' ];
		if ( NULL === $toReturn ) {
			return "Not Documented";
		}
		return $toReturn;
	}

	function buildTable() {
		// Table is sorted alphebetically by 'game' name.
		$this->savefiles = array(
			"03faaf1d" => array(
				'game'=>"4 Wheel Thunder",
				'type'=>"Main Save"),
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
				'game'=>"Jet Grind Radio",
				'type'=>"Main Save"),
			"a603dae7" => array(
				'game'=>"Jet Grind Radio",
				'type'=>"Small Graffiti"),
			"2e4026b8" => array(
				'game'=>"Jet Grind Radio",
				'type'=>"Large Graffiti"),
			"96c5f9b3" => array(
				'game'=>"Max Steel",
				'type'=>"Game Options"),
			"b0150787" => array(
				'game'=>"Nightmare Creatures II",
				'type'=>"Main Save"),
			"5744bd39" => array(
				'game'=>"Phantasy Star Online",
				'type'=>"Screenshot"),
			"aa684f21" => array(
				'game'=>"Phantasy Star Online: Version 2",
				'type'=>"Main Save"),
			"d18229c3" => array(
				'game'=>"Phantasy Star Online: Version 2",
				'type'=>"Guild Card"),
			"4ff15894" => array(
				'game'=>"Phantasy Star Online: Version 2",
				'type'=>"Downloadable Content"),
			"42973ff7" => array(
				'game'=>"Psychic Force 2012",
				'type'=>"Main Save"),
			"2f24bef9" => array(
				'game'=>"Shenmue",
				'type'=>"Main Save"),
			"7aadd2f3" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Main Save"),
			"86df7f16" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Chao Garden"),
			"3a7d695f" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"High-Speed Trial Kart Map"),
			"945bca5b" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Opa Opa Kart Map"),
			"6ae0a7e2" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Eggrobo Kart Map"),
			"44a59e3b" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Sonic Theme"),
			"f92754c1" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Tails Theme"),
			"a695ba79" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Knuckles Theme"),
			"4295e2c7" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Shadow Theme"),
			"633ad529" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Eggman Theme"),
			"2bf7beac" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Rouge Theme"),
			"a647f369" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Amy Theme"),
			"cacf34bf" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Omochao Theme"),
			"8d178fc7" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Maria Theme"),
			"03ff64e8" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Secretary Theme"),
			"79faff25" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Halloween Theme"),
			"966b8a74" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Christmas Theme"),
			"aee1b12e" => array(
				'game'=>"Star Wars Episode 1 Podracer",
				'type'=>"Main Save"),
			"301fa090" => array(
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
