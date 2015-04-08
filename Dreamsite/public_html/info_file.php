<?php
// info_file.php
$col;

function printFileBar() {
	echo "
	<tr bgcolor='#CCCCCC'>
		<th colspan='2'>File Info</th>
	</tr>
	";
}

function shenmuePrintSlotTime( $vms, $name, $o ) {
	global $col;
	$finalDay = new DateTime("1987-04-15");
	$gY = $vms->get($o + 0x8);
	if ( $gY != 0 ) {
		$gM = $vms->get($o + 0xA);
		$gD = $vms->get($o + 0xB);
		$gH = $vms->get($o + 0xC);
		$gm = $vms->get($o + 0xD);
		$gs = $vms->get($o + 0xE);
		$curDay = new DateTime("19$gY-$gM-$gD");
		$diff = $finalDay->diff($curDay)->format("%a");
		echo "
		<tr bgcolor='" . ac($col) . "'>
			<th>$name Date</th>
			<th>19$gY-$gM-$gD $gH:$gm:$gs</th>
		</tr>
		<tr bgcolor='" . ac($col) . "'>
			<th>Time Left</th>
			<th>$diff Days</th>
		</tr>
		";
		return true;
	} else {
		echo "
		<tr bgcolor='#CCCCCC'>
			<th colspan='2'>$name not in use</th>
		</tr>
		";
		return false;
	}
}

// Function to display unique game
// information about a save file.
function getUniqueInfo( $vms ) {
	include_once 'dc_tools.php';
	global $col;

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
		if ( shenmuePrintSlotTime( $vms, "Resume Game", 0x700 ) ) {
			$money = $vms->readInt_16(0x818);
			echo "
			<tr bgcolor='" . ac($col) . "'>
				<th>Money</th>
				<th>\$$money</th>
			</tr>
			";
		}
		if ( shenmuePrintSlotTime( $vms, "Slot 1", 0x740 ) ) {
			$money = $vms->readInt_16(0x2018);
			echo "
			<tr bgcolor='" . ac($col) . "'>
				<th>Money</th>
				<th>\$$money</th>
			</tr>
			";
		}
		if ( shenmuePrintSlotTime( $vms, "Slot 2", 0x780 ) ) {
			$money = $vms->readInt_16(0x3818);
			echo "
			<tr bgcolor='" . ac($col) . "'>
				<th>Money</th>
				<th>\$$money</th>
			</tr>
			";
		}
		if ( shenmuePrintSlotTime( $vms, "Slot 3", 0x7C0 ) ) {
		$money = $vms->readInt_16(0x5018);
			echo "
			<tr bgcolor='" . ac($col) . "'>
				<th>Money</th>
				<th>\$$money</th>
			</tr>
			";
		}
	}

}
?>
