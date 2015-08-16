<?php
// lookup_saveinfo.php
//
// Usage:
// require_once 'lookup_saveinfo.php';
// $saveCheck = new saveInfo();

class saveInfo {
	private $savefiles = array();
	private $isBuilt = false;

	function getInfo( $vms ) {
		if ( !$this->isBuilt ) {
			$this->buildTable();
		}

		$hash = $vms->getTypeHash();
		$toReturn = $this->savefiles[ $hash ][ 'info' ];
		if ( NULL === $toReturn ) {

			$hash = $vms->getIconHash();
			$toReturn = $this->savefiles[ $hash ][ 'info' ];
			if ( NULL === $toReturn ) {
				return "Game/Save";
			}
		}
		return $toReturn;
	}

	function getRelease( $vms ) {
		if ( !$this->isBuilt ) {
			$this->buildTable();
		}

		$hash = $vms->getTypeHash();
		$toReturn = $this->savefiles[ $hash ][ 'release' ];
		if ( NULL === $toReturn ) {

			$hash = $vms->getIconHash();
			$toReturn = $this->savefiles[ $hash ][ 'release' ];
			if ( NULL === $toReturn ) {
				return "Unknown";
			}
		}
		return $toReturn;
	}

	private function buildTable() {

		$this->isBuilt = true;

		// Table is sorted alphebetically by 'game' name.
		$this->savefiles = array(

			// Sonic Adventure 2 DLC
			"3a7d695f" => array( // High-Speed Trial Kart Map
				'release'=>"2001-7-13",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>New Cart</b> - For Sonic with a larger back spoiler.<br>" .
					"<b>New Course</b> - 'High-Speed Trial'"),
			"945bca5b" => array( // Opa Opa Kart Map
				'release'=>"2001-8-16",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>New Cart</b> - Omochao plays like Sonic and is " .
					"shaped like Opa-Opa from Fantasy Zone.<br>" .
					"<b>New Course</b> - Shaped like Opa-Opa"),
			"6ae0a7e2" => array( // Eggrobo Kart Map
				'release'=>"2001-9-21",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>New Cart</b> - Eggrobo character plays like Sonic.<br>" .
					"<b>New Course</b> - Course shaped like the letter 'E'"),
			"44a59e3b" => array( // Sonic Theme
				'release'=>"2001-6-23",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Sonic voice theme"),
			"f92754c1" => array( // Tails Theme
				'release'=>"2001-7-27",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Tails voice theme"),
			"a695ba79" => array( // Knuckles Theme
				'release'=>"2001-7-19",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Knuckles voice theme"),
			"4295e2c7" => array( // Shadow Theme
				'release'=>"Unreleased",
				'info'=>
					"This Downloadable Content was never released.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Shadow voice theme"),
			"633ad529" => array( // Dr. Eggman Theme
				'release'=>"2001-9-6",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Dr. Eggman voice theme"),
			"2bf7beac" => array( // Rouge Theme
				'release'=>"2001-8-24",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure 2 website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Rouge voice theme"),
			"a647f369" => array( // Amy Theme
				'release'=>"Unreleased",
				'info'=>
					"This Downloadable Content was never released.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Amy voice theme"),
			"cacf34bf" => array( // Omochao Theme
				'release'=>"Unreleased",
				'info'=>
					"This Downloadable Content was never released.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Omochao voice theme"),
			"8d178fc7" => array( // Maria Theme
				'release'=>"Unreleased",
				'info'=>
					"This Downloadable Content was never released.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Maria voice theme"),
			"03ff64e8" => array( // Secretary Theme
				'release'=>"Unreleased",
				'info'=>
					"This Downloadable Content was never released.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Secretary voice theme"),
			"79faff25" => array( // Halloween Theme
				'release'=>"2001-10-11",
				'info'=>
					"Characters in the 2-Player select screen " .
					"will be wearing Halloween themed costumes."),
			"966b8a74" => array( // Christmas Theme
				'release'=>"2001-11-30",
				'info'=>
					"Characters in the 2-Player select screen " .
					"will be wearing Christmas themed costumes."),
		);
	}
}

?>
