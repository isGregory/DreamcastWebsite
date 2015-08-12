<?php
	// dlc_list.php
	$homeDir = "../";
	require_once 'dlc_directories.php';
	require_once $homeDir . 'lookup_game.php';
	require_once $homeDir . 'format.php';
	require_once $homeDir . 'format_dlc.php';

	$check = isset($_GET["n"]) ? $_GET["n"] : false;

	$game = getGameName( $check );
	$pageTitle = $game . " DLC";
	include $homeDir . 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">

	<?php callDLCFunction( $check ); ?>

</p>
<br>
<br>

<?php
	$from = getcwd() . "/dlc_list.php";
	include $homeDir . 'dc_footer.php';
?>
