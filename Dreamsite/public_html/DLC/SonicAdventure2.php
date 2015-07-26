<?php
	// SonicAdvneture2.php
	$homeDir = "../";
	require_once 'dlc_directories.php';
	require_once $homeDir . 'format.php';

	$pageTitle = "Sonic Adventure 2 DLC";
	include $homeDir . 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">

	<?php
		dlcOpenTable();
			dlcEntry('DOWN001');
			dlcEntry('Potato');
		dlcCloseTable();
	?>
</p>
<br>
<br>

<?php
	$from = getcwd() . "/SonicAdventure2.php";
	include $homeDir . 'dc_footer.php';
?>
