<?php
	//info.php
	$homeDir = "";
	require_once 'directories.php';
	require_once 'format.php';

	$s = isset($_GET["s"]) ? $_GET["s"] : false;
	$p = isset($_GET["p"]) ? $_GET["p"] : false;

	require_once 'dc_tools.php';
	require_once 'lookup_savefile.php';
	$luSaves = new saveLookup();

	$pageTitle = "File Info";
	include 'dc_header.php';

	if ( false === $s || !file_exists( $dirSave . $s ) ) {
		echo "<p>File '$s' Not Found.</p>";

		$from = "info.php";
		include 'dc_footer.php';
		exit;
	}

	$VMSname = getVMSnamefromVMI( $dirSave . $s );
	$vms = new VMS;
	$vms->load($dirSave . $VMSname);
	$imgName = createVMSicons( $vms );
	$fileHash = $vms->getFileHash();
	$luGame = $luSaves->getGame( $vms );
	$luType = $luSaves->getType( $vms );

	$blocks = $vms->getBlocks();
	$Dmenu = $vms->getVMStext();
	$Dfile = $vms->getDCBootRomText();
	$Dapp = $vms->getAppID();
	$nI = $vms->getNumFrames();
	$aS = $vms->getAniSpeed();

	if ( false !== $p ) {
		echo "<a href='browse.php?p=$p'>Return to previous page</a>";
	}
	?>
	<table cellpadding='3' cellspacing='1' border='0' width='100%' bgcolor='<?php echo $tBG; ?>'>
			<tr bgcolor='<?php echo $tHead; ?>'>
		<th colspan='2'><?php echo $VMSname; ?></th>
		</tr>
		<tr bgcolor='<?php echo ac(); ?>'>
			<th colspan='2'><img src='<?php echo $imgName; ?>'></th>
		</tr>
		<tr bgcolor='<?php echo ac(); ?>'>
			<th colspan='2'><?php echo "$luGame<br>$luType"; ?></th>
		</tr>
		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>Download:
				<?php
					echo " <a href='vmidl.php?id=$s&t=i'><img src='images/save_vmi.gif'></a> ";
					if ( !$dreamBrowser ) {
							echo "<a href='vmidl.php?id=$s&t=s'><img src='images/save_vms.gif'></a>";
					}
				?>
			</th>
			<td><?php echo "$blocks Blocks"; ?></td>
		</tr>
		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>File Hash:</th><td><?php echo $fileHash; ?></td>
		</tr>
		<?php
			require_once 'info_file.php';
			getUniqueInfo( $vms );
		?>
		<tr bgcolor='<?php echo $tHead; ?>'>
			<th colspan='2'>Header Info</th>
		</tr>
		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>Menu Description</th><td><?php echo $Dmenu; ?></td>
		</tr>
		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>File Description</th><td><?php echo $Dfile; ?></td>
		</tr>
		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>App Description</th><td><?php echo $Dapp; ?></td>
		</tr>
		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>Num Icons</th><td><?php echo $nI; ?></td>
		</tr>
		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>Animation Speed</th><td><?php echo $aS; ?></td>
		</tr>

		<?php
			for ( $f = 0; $f < $nI; $f++ ) {
				?>
					<tr align='center' bgcolor='<?php echo ac(); ?>'>
						<th><?php echo "Icon " . ( $f + 1 ); ?></th>
						<td><img src='<?php echo getvmsframe( $vms, $f ); ?>'></td>
					</tr>
				<?php
			}

			$ecMode = $vms->getEyecatchMode();
		?>

		<tr align='center' bgcolor='<?php echo ac(); ?>'>
			<th>Eyecatch Mode</th><td><?php echo $ecMode; ?></td>
		</tr>

		<?php
			if ( $ecMode != 0 ) {
				?>
					<tr align='center' bgcolor='<?php echo ac(); ?>'>
						<th>Eyecatch</th>
						<td><img src='<?php echo createVMSeyecatch( $vms ); ?>'></td>
					</tr>
				<?php
			}
		?>

	</table>
	<?php

	$from = "info.php";
	include 'dc_footer.php';
?>
