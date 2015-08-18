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

				$hash = $vms->getFileHash();
				$toReturn = $this->savefiles[ $hash ][ 'info' ];
				if ( NULL === $toReturn ) {
					return "Game/Save";
				}
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

				$hash = $vms->getFileHash();
				$toReturn = $this->savefiles[ $hash ][ 'release' ];
				if ( NULL === $toReturn ) {
					return "Unknown";
				}
			}
		}
		return $toReturn;
	}

	private function buildTable() {

		$this->isBuilt = true;

		// Table is sorted alphebetically by 'game' name.
		$this->savefiles = array(
			// Phantasy Star Online Version 1 DLC
			"f70c77d9" => array( // Easter Quest 1 of 3
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Easter Quest</b> - Part 1 of 3<br><br>" .
					"<b>Region:</b> Japan"),
			"668de97c" => array( // Easter Quest 2 of 3
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Easter Quest</b> - Part 2 of 3<br><br>" .
					"<b>Region:</b> Japan"),
			"e64630a4" => array( // Easter Quest 3 of 3
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Easter Quest</b> - Part 3 of 3<br><br>" .
					"<b>Region:</b> Japan"),
			"aa77632f" => array( // Famitsu Quest 2 of 3?
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Famitsu Quest</b> - Part 2 of 3?<br><br>" .
					"Note: There may be only 2 parts to this quest.<br>" .
					"<b>Region:</b> Japan"),
			"a6c9f449" => array( // Famitsu Quest 3 of 3?
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Famitsu Quest</b> - Part 3 of 3?<br><br>" .
					"Note: There may be only 2 parts to this quest.<br>" .
					"<b>Region:</b> Japan"),
			"ece18718" => array( // Letter from Lionel Quest 1 of 2
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Letter from Lionel Quest</b> - Part 1 of 2<br><br>" .
					"<b>Region:</b> USA"),
			"6406f13c" => array( // Letter from Lionel Quest 2 of 2
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Letter from Lionel Quest</b> - Part 2 of 2<br><br>" .
					"<b>Region:</b> USA"),
			"1e3d9a3e" => array( // Retired Hunter Quest 1 of 2
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Retired Hunter Quest</b> - Part 1 of 2<br><br>" .
					"<b>Region:</b> Japan"),
			"545995e9" => array( // Retired Hunter Quest 2 of 2
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Retired Hunter Quest</b> - Part 2 of 2<br><br>" .
					"<b>Region:</b> Japan"),
			"dc38a93c" => array( // Raw Material Quest 1 of 2
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Raw Material Quest</b> - Part 1 of 2<br><br>" .
					"<b>Region:</b> Japan"),
			"db2eb49c" => array( // Raw Material Quest 2 of 2
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available in game.<br><br>" .
					"<b>Raw Material Quest</b> - Part 2 of 2<br><br>" .
					"<b>Region:</b> Japan"),

			// Sonic Adventure DLC
			"aa0df537" => array( // Japanese Christmas Event
				'release'=>"1998-12-23 - 1998-12-25",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Three musical Christmas trees are located in " .
					"Station Square. They play Joy to the World " .
					"or Jingle Bells.<br><br>" .
					"<b>Region:</b> Japan"),
			"e51ee355" => array( // Hidekazu Yukawa Quo Card Contest
				'release'=>"1998-1-22",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Contest event</b> - Players have 10 minutes to try " .
					"and locate 6 Hidekazu Yukawa Quo Cards scattered " .
					"around Station Square and Mystic Ruin.<br><br>" .
					"<b>Region:</b> Japan"),
			"e9ae53ff" => array( // Famitsu Magazine Contest
				'release'=>"1999-2-12",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Contest event</b> - Players have 10 minutes to try " .
					"and locate 5 hedgehog photos scattered " .
					"around Station Square.<br><br>" .
					"<b>Region:</b> Japan"),
			"bf9d8406" => array( // Halloween Event
				'release'=>"1999-10-18",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Twinkle Park is decorated with pumpkins wearing " .
					"witch hats and black capes.<br><br>" .
					"SA1_135 - PAL?<br>SA1_505 - USA and Japan?"),
			"0220cb3e" => array( // European Halloween Event
				'release'=>"1999-10-18",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Not sure if there are differences between this " .
					"and the USA/Japanese Halloween Event."),
			"56eee6fc" => array( // Christmas Event
				'release'=>"1999-12-17 - 1999-12-28",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Station Square adds two Christmas trees. " .
					"Christmas NiGHTS will play if either tree is " .
					"tagged 'Dreams Dreams A Cappela'."),
			"2d27bbd5" => array( // New Years Event
				'release'=>"1999-12-29",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"In each action stage, two giant rings are hidden. " .
					"When one is tagged the background music will change to " .
					"the 'Palmtree Panic' level of Sonic the Hedgehog CD"),
			"f9da3aa1" => array( // US Launch Party
				'release'=>"1999-9-9",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Station Square is fitted with banners and " .
					"balloons to celebrate the US Dreamcast Launch."),
			"d00e749a" => array( // Europe Launch Party
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Station Square is fitted with banners and " .
					"balloons to celebrate the European Dreamcast Launch."),
			"ab447a02" => array( // Japanese Launch Party
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Station Square is fitted with banners and " .
					"balloons to celebrate the Japanese Dreamcast Launch."),
			"d19e1dcc" => array( // AT&T Contest Part 1
				'release'=>"1999-12-24 - 2000-1-14",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"Contest was sponsored by AT&T and the " .
					"Official Dreamcast Magazine.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Contest event</b> - Sonic - Speed Highway " .
					"with visual changes such as AT&T branded signs and " .
					"billboards.<br><br>" .
					"<b>Region:</b> USA"),
			"44443b73" => array( // AT&T Contest Part 2
				'release'=>"1999-12-24 - 2000-1-14",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"Contest was sponsored by AT&T and the " .
					"Official Dreamcast Magazine.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Contest event</b> - Knuckles - Set in Mystic Ruins " .
					"with AT&T signs with clues. Knuckles has to dig into " .
					"the ground for treasure.<br><br>" .
					"<b>Region:</b> USA"),
			"31925cf2" => array( // AT&T Contest Part 3
				'release'=>"1999-12-24 - 2000-1-14",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"Contest was sponsored by AT&T and the " .
					"Official Dreamcast Magazine.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Contest event</b> - Tails - Sand Hill sub-game " .
					"where Tails must surf through ten specific AT&T " .
					"branded gates.<br><br>" .
					"<b>Region:</b> USA"),
			"e2daf453" => array( // Reebok Contest
				'release'=>"1999-?-?",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"Contest was sponsored by Reebok to promote " .
					"new shoes.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Contest event</b> - Sonic - Set at the Emerald Cost." .
					"Sonic must go around collecting containers with " .
					"Eggman's logo. Upon picking up the first shoes " .
					"the music would change to 'VS Rival'. There are " .
					"also billboards advertising the new shoes around " .
					"Station Square Hotel and Emerald Coast.<br><br>" .
					"<b>Region Locked:</b> PAL Only"),
			"75904acc" => array( // Coin Course?
				'release'=>"??",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Circuit Course?</b> - This may be the same as " .
					"another save but with a different image and possibly " .
					"that save is a bug fix to this one.<br><br>" .
					"<b>Region:</b> USA"),
			"a2f835d5" => array( // Samba GP Course
				'release'=>"2000-4-27",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"<b>Circuit Course</b> - Released to celebrate " .
					"the launch of Samba de Amigo on Dreamcast. The " .
					"background music is an instrumental version of " .
					"'Super Sonic Racing'.<br><br>" .
					"<b>Region:</b> USA"),
			"db76a752" => array( // Sonic Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Sonic Voice Theme"),
			"db76a752" => array( // Tails Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Tails Voice Theme"),
			"39468310" => array( // Knuckles Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Knuckles Voice Theme"),
			"3994ca00" => array( // Amy Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Amy Voice Theme"),
			"6eff27f5" => array( // Gamma Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Gamma Voice Theme"),
			"ad11f4c3" => array( // Big Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Big Voice Theme"),
			"80e64c0e" => array( // Dr. Eggman Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Dr. Eggman Voice Theme"),
			"5d284e2f" => array( // Tikal Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Tikal Voice Theme"),
			"562c15c8" => array( // Random Voice Theme
				'release'=>"",
				'info'=>
					"This Downloadable Content was available through the " .
					"Sonic Adventure website.<br><br>" .
					"<u>Contains</u>:<br>" .
					"Random Voice Theme"),

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
