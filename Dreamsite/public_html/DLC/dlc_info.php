<?php
	// dlc_info.php
	$root      = '../';
	require_once $root . 'directories.php';
	require_once $root . 'lookup_game.php';
	require_once $root . 'format.php';
	require_once $root . 'format_dlc.php';

	$returnTo = isset($_GET["n"]) ? $_GET["n"] : false;
	$file = isset($_GET["s"]) ? $_GET["s"] : false;

	// Make sure a file is specified
	if ( !$file ) {
		header( 'Location: index.php' );
	}

	// Return to file list of the game if no file specified
	$filename = $dirDLC . $returnTo . "/" . $file;
	if ( ! file_exists( $filename ) ) {
		header( 'Location: dlc_list.php?n=' . $returnTo );
	}
	require_once $root . '/dc_tools.php';
	$VMSname = getVMSnamefromVMI( $filename );
	$VMIfile = end( explode( "/", $filename ) );

	$vms = new VMS;
	$vms->load( $dirDLC . $returnTo . "/" . $VMSname );
	$imgName = createVMSicons( $vms );
	$blocks = $vms->getBlocks();

	require_once $root . '/lookup_savefile.php';
	$luSaves = new saveLookup();
	$luType = $luSaves->getType( $vms );

	require_once $root . '/lookup_saveinfo.php';
	$saveCheck = new saveInfo();
	$release = $saveCheck->getRelease( $vms );
	$desc = $saveCheck->getInfo( $vms );

	$game = getGameName( $returnTo );
	$pageTitle = $luType;
	include $root . 'dc_header.php';
?>


<p align="left">
	<u><a href="dlc_list.php?n=<?php echo $returnTo; ?>">
		Return to <?php echo $game; ?> DLC
	</a></u>
</p>
<p align="left">

<?php
	global $dreamBrowser, $tHead, $tBG;
?>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th colspan="2"><?php echo $pageTitle; ?></th>
			<th bgcolor="<?php echo $tHead; ?>" rowspan="2"><img src='<?php echo $imgName; ?>'></th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<th>Download:<br>(<?php echo $blocks; ?> Blocks)</th>
			<td align="center">
				<a href="<?php echo $root . "vmidl.php?id=dlc/$VMIfile&t=i" ?>">
					<img src="<?php echo $dirImages . "save_vmi.gif"?>"></a>
			<?php
				if ( !$dreamBrowser ) {
			?>
				<a href="<?php echo $root . "vmidl.php?id=dlc/$VMIfile&t=s" ?>">
					<img src="<?php echo $dirImages . "save_vms.gif"?>"></a>
			<?php
				}
			?>
			</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<th>Release Date:</th>
			<td align="center" colspan="2"><?php echo $release; ?></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<th>Filename:</th>
			<td align="center" colspan="2"><?php echo $VMSname; ?></td>
		</tr>
		<tr bgcolor="<?php echo $tHead; ?>">
			<th colspan="3">Description</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td colspan="3"><?php echo $desc; ?></td>
		</tr>
	</table>
</p>
<br>
<br>

<?php
	$from = getcwd() . "/dlc_list.php";
	include $root . 'dc_footer.php';
?>
