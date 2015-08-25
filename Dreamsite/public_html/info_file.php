<?php
// info_file.php

function printFileBar() {
	?>
		<tr bgcolor='#CCCCCC'>
			<th colspan='2'>File Info</th>
		</tr>
	<?php
}

function shenmuePrintSlotTime( $vms, $name, $o ) {
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
		?>
			<tr bgcolor='#CCCCCC'>
				<th colspan='2'><?php echo $name; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th><?php echo "$name Date"; ?></th>
				<th><?php echo "19$gY-$gM-$gD $gH:$gm:$gs"; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Time Left</th>
				<th><?php echo "$diff Days"; ?></th>
			</tr>
		<?php
		return true;
	} else {
		?>
			<tr bgcolor='#CCCCCC'>
				<th colspan='2'><?php echo $name; ?> not in use</th>
			</tr>
		<?php
		return false;
	}
}

// Function to display unique game
// information about a save file.
function getUniqueInfo( $vms ) {
	global $root;
	require_once $root . 'dc_tools.php';
	require_once $root . 'lookup_savefile.php';

	$luSaves = new saveLookup();
	$luGame = $luSaves->getGame( $vms );

	if ( strpos( $vms->getVMStext(), "PSO/SCREEN_IMAGE" ) !== false ) {
		$imgName = createVMSpso( $vms );
		printFileBar();
		?>
		<tr bgcolor='<?php echo ac(); ?>'>
			<th>Screenshot</th>
			<th><img src='<?php echo $imgName; ?>'></th>
		</tr>
		<?php
	} else if ( getGameName( JET_GRIND_RADIO ) == $luGame ) {
		$imgName = createVMSjgr( $vms );
		$imgAlphaName = createVMSjgrALPHA( $vms );
		if ( $imgAlphaName ) {
			printFileBar();
			?>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Graffiti</th>
				<th><img src='<?php echo $imgName; ?>'></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Transparency Mask</th>
				<th><img src='<?php echo $imgAlphaName; ?>'></th>
			</tr>
			<?
		}
	}else if ( strpos( $vms->getVMStext(), "SHENMUE" ) !== false ) {
		printFileBar();
		if ( shenmuePrintSlotTime( $vms, "Resume Game", 0x700 ) ) {
			$money = $vms->readInt_16(0x818);
			?>
				<tr bgcolor='<?php echo ac(); ?>'>
					<th>Money</th>
					<th><?php echo "\$$money" ?></th>
				</tr>
			<?php
		}
		if ( shenmuePrintSlotTime( $vms, "Slot 1", 0x740 ) ) {
			$money = $vms->readInt_16(0x2018);
			?>
				<tr bgcolor='<?php echo ac(); ?>'>
					<th>Money</th>
					<th><?php echo "\$$money" ?></th>
				</tr>
			<?php
		}
		if ( shenmuePrintSlotTime( $vms, "Slot 2", 0x780 ) ) {
			$money = $vms->readInt_16(0x3818);
			?>
				<tr bgcolor='<?php echo ac(); ?>'>
					<th>Money</th>
					<th><?php echo "\$$money" ?></th>
				</tr>
			<?php
		}
		if ( shenmuePrintSlotTime( $vms, "Slot 3", 0x7C0 ) ) {
			$money = $vms->readInt_16(0x5018);
			?>
				<tr bgcolor='<?php echo ac(); ?>'>
					<th>Money</th>
					<th><?php echo "\$$money" ?></th>
				</tr>
			<?php
		}
	}
}
?>
