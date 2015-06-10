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

		$col = $C1;

		$blocks = $vms->getBlocks();
		$Dmenu = $vms->readString(0x00, 16);
		$Dfile = $vms->readString(0x10, 32);
		$Dapp = $vms->readString(0x30, 16);
		$nI = $vms->readInt_16(0x40);
		$aS = $vms->readInt_16(0x42);

		echo "
		<table cellpadding='3' cellspacing='1' border='0' width='100%' bgcolor='#6E6E6E'>
			<tr bgcolor='#CCCCCC'>
				<th colspan='2'>$VMSname</th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th colspan='2'><img src='$imgName'></th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th colspan='2'>$luGame - $luType</th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th>Download: "
				. "<a href='" . $dirUp . "vmidl.php?id=$s&t=i'><img src='images/save_vmi.png'></a> ";
				if ( !$dreamBrowser ) {
					echo "<a href='" . $dirUp . "vmidl.php?id=$s&t=s'><img src='images/save_vms.png'></a>";
				}
		echo "
					</th>
				<th>$blocks Blocks</th>
			</tr>
		";
			include 'info_file.php';
			getUniqueInfo( $vms );
		echo "
			<tr bgcolor='#CCCCCC'>
				<th colspan='2'>Header Info</th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th>Menu Description</th><th>$Dmenu</th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th>File Description</th><th>$Dfile</th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th>App Description</th><th>$Dapp</th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th>Num Icons</th><th>$nI</th>
			</tr>
			<tr bgcolor='" . ac($col) . "'>
				<th>Animation Speed</th><th>$aS</th>
			</tr>
		";

			for ( $f = 0; $f < $nI; $f++ ) {
				$imgName = getvmsframe( $vms, $f );
				echo "
				<tr bgcolor='" . ac($col) . "'>
					<th>Icon " . ( $f + 1 ) . "</th>
					<th><img src='$imgName'></th>
				</tr>
				";
			}

			$ecMode = $vms->getEyecatchMode();
			echo "
			<tr bgcolor='" . ac($col) . "'>
				<th>Eyecatch Mode</th><th>$ecMode</th>
			</tr>
			";
			if ( $ecMode != 0 ) {
				$imgName = createVMSeyecatch( $vms );
				echo "
				<tr bgcolor='" . ac($col) . "'>
					<th>Eyecatch</th>
					<th><img src='$imgName'></th>
				</tr>
				";
			}

		echo "</table>";
	}


    $from = "info.php";
    include 'dc_footer.php';
?>
