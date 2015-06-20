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
			return "Game Not Documented";
		}
		return $toReturn;
	}

	function getType( $hash ) {
		$toReturn = $this->savefiles[ $hash ][ 'type' ];
		if ( NULL === $toReturn ) {
			return "Save Not Documented";
		}
		return $toReturn;
	}

	function buildTable() {
		// Table is sorted alphebetically by 'game' name.
		$this->savefiles = array(
			"2a9cfdfd" => array(
				'game'=>"Jet Grind Radio",
				'type'=>"Main Save"),
			"5744bd39" => array(
				'game'=>"Phantasy Star Online",
				'type'=>"Screenshot"),
			"2f24bef9" => array(
				'game'=>"Shenmue",
				'type'=>"Main Save"),
			"7aadd2f3" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Main Save"),
			"86df7f16" => array(
				'game'=>"Sonic Adventure 2",
				'type'=>"Chao Garden"),
			"aee1b12e" => array(
				'game'=>"Star Wars Episode 1 Podracer",
				'type'=>"Main Save"),
			"bd990b36" => array(
				'game'=>"Tony Hawks Pro Skater 2",
				'type'=>"Main Save"),
		);
	}
}

?>
