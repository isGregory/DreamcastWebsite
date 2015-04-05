<?php
// info_file.php

function printFileBar() {
	echo "
	<tr bgcolor='#CCCCCC'>
		<th colspan='2'>File Info</th>
	</tr>
	";
}

// Function to display unique game
// information about a save file.
function getUniqueInfo( $vms ) {
	include 'dc_tools.php';

	if ( strpos( $vms->getVMStext(), "PSO/SCREEN_IMAGE" ) !== false ) {
		$imgName = createVMSpso( $vms );
		printFileBar();
		echo "
		<tr bgcolor='" . ac($col) . "'>
			<th>Screenshot</th>
			<th><img src='$imgName'></th>
		</tr>
		";
	} else if ( strpos( $vms->getVMStext(), "SHENMUE" ) !== false ) {
		$finalDay = new DateTime("1987-04-15");
		$gY = $vms->get(0x708);
		$gM = $vms->get(0x70A);
		$gD = $vms->get(0x70B);
		$gH = $vms->get(0x70C);
		$gm = $vms->get(0x70D);
		$gs = $vms->get(0x70E);
		$curDay = new DateTime("19$gY-$gM-$gD");
		$diff = $finalDay->diff($curDay)->format("%a");
		$money = $vms->readInt_16(0x818);
		echo "
		<tr bgcolor='" . ac($col) . "'>
			<th>Resume Game Date</th>
			<th>19$gY-$gM-$gD $gH:$gm:$gs</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Time Left</th>
			<th>$diff Days</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Money</th>
			<th>\$$money</th>
		</tr>
		";
		$gY = $vms->get(0x748);
		$gM = $vms->get(0x74A);
		$gD = $vms->get(0x74B);
		$gH = $vms->get(0x74C);
		$gm = $vms->get(0x74D);
		$gs = $vms->get(0x74E);
		$curDay = new DateTime("19$gY-$gM-$gD");
		$diff = $finalDay->diff($curDay)->format("%a");
		$money = $vms->readInt_16(0x2018);
		echo "
		<tr bgcolor='" . ac($col) . "'>
			<th>Slot 1 Game Date</th>
			<th>19$gY-$gM-$gD $gH:$gm:$gs</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Time Left</th>
			<th>$diff Days</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Money</th>
			<th>\$$money</th>
		</tr>
		";
		$gY = $vms->get(0x788);
		$gM = $vms->get(0x78A);
		$gD = $vms->get(0x78B);
		$gH = $vms->get(0x78C);
		$gm = $vms->get(0x78D);
		$gs = $vms->get(0x78E);
		$curDay = new DateTime("19$gY-$gM-$gD");
		$diff = $finalDay->diff($curDay)->format("%a");
		$money = $vms->readInt_16(0x3818);
		echo "
		<tr bgcolor='" . ac($col) . "'>
			<th>Slot 2 Game Date</th>
			<th>19$gY-$gM-$gD $gH:$gm:$gs</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Time Left</th>
			<th>$diff Days</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Money</th>
			<th>\$$money</th>
		</tr>
		";
		$gY = $vms->get(0x7C8);
		$gM = $vms->get(0x7CA);
		$gD = $vms->get(0x7CB);
		$gH = $vms->get(0x7CC);
		$gm = $vms->get(0x7CD);
		$gs = $vms->get(0x7CE);
		$curDay = new DateTime("19$gY-$gM-$gD");
		$diff = $finalDay->diff($curDay)->format("%a");
		$money = $vms->readInt_16(0x5018);
		echo "
		<tr bgcolor='" . ac($col) . "'>
			<th>Slot 3 Game Date</th>
			<th>19$gY-$gM-$gD $gH:$gm:$gs</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Time Left</th>
			<th>$diff Days</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Money</th>
			<th>\$$money</th>
		</tr>
		";
	}

}
?>
