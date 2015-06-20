<?php
	//info.php
	require_once 'globals.php';

	$s = isset($_GET["s"]) ? $_GET["s"] : false;

	require_once 'dc_tools.php';
	require_once 'savefile_lookup.php';
	$luSaves = new saveLookup();
	$luSaves->buildTable();

	$pageTitle = "File Info";
	include 'dc_header.php';

	if ( $s === false || !file_exists( $dirUp . $s ) ) {
		echo "<p>File Not Found.</p>";
	} else {

		$VMSname = getVMSnamefromVMI( $dirUp . $s );
		$vms = new VMS;
		$vms->load($dirUp . $VMSname);
		$imgName = createVMSicons( $vms );
		$luGame = $luSaves->getGame( $vms->getTypeHash() );
		$luType = $luSaves->getType( $vms->getTypeHash() );

		$blocks = $vms->getBlocks();
		$Dmenu = $vms->readString(0x00, 16);
		$Dfile = $vms->readString(0x10, 32);
		$Dapp = $vms->readString(0x30, 16);
		$nI = $vms->readInt_16(0x40);
		$aS = $vms->readInt_16(0x42);

		?>
		<table cellpadding='3' cellspacing='1' border='0' width='100%' bgcolor='#6E6E6E'>
			<tr bgcolor='#CCCCCC'>
				<th colspan='2'><?php echo $VMSname; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th colspan='2'><img src='<?php echo $imgName; ?>'></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th colspan='2'><?php echo "$luGame - $luType"; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Download: ";
					<?php
						echo "<a href='" . $dirUp . "vmidl.php?id=$s&t=i'><img src='images/save_vmi.png'></a> ";
						if ( !$dreamBrowser ) {
							echo "<a href='" . $dirUp . "vmidl.php?id=$s&t=s'><img src='images/save_vms.png'></a>";
						}
					?>
				</th>
				<th><?php echo "$blocks Blocks"; ?></th>
			</tr>
			<?php
				require_once 'info_file.php';
				getUniqueInfo( $vms );
			?>
			<tr bgcolor='#CCCCCC'>
				<th colspan='2'>Header Info</th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Menu Description</th><th><?php echo $Dmenu; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>File Description</th><th><?php echo $Dfile; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>App Description</th><th><?php echo $Dapp; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Num Icons</th><th><?php echo $nI; ?></th>
			</tr>
			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Animation Speed</th><th><?php echo $aS; ?></th>
			</tr>

			<?php
				for ( $f = 0; $f < $nI; $f++ ) {
					?>
						<tr bgcolor='<?php echo ac(); ?>'>
							<th><?php echo "Icon " . ( $f + 1 ); ?></th>
							<th><img src='<?php echo getvmsframe( $vms, $f ); ?>'></th>
						</tr>
					<?php
				}

				$ecMode = $vms->getEyecatchMode();
			?>

			<tr bgcolor='<?php echo ac(); ?>'>
				<th>Eyecatch Mode</th><th><?php echo $ecMode; ?></th>
			</tr>

			<?php
				if ( $ecMode != 0 ) {
					?>
						<tr bgcolor='<?php echo ac(); ?>'>
							<th>Eyecatch</th>
							<th><img src='<?php echo createVMSeyecatch( $vms ); ?>'></th>
						</tr>
					<?php
				}
			?>

		</table>
		<?php
	}


	$from = "info.php";
	include 'dc_footer.php';
?>
