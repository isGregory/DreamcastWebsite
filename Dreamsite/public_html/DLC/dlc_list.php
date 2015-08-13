<?php
	// dlc_list.php
	$root      = '../';
	require_once $root . 'directories.php';
	require_once $root . 'lookup_game.php';
	require_once $root . 'format.php';
	require_once $root . 'format_dlc.php';

	$check = isset($_GET["n"]) ? $_GET["n"] : false;

	$game = getGameName( $check );
	$pageTitle = $game . " DLC";
	include $root . 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">

	<?php callDLCFunction( $check ); ?>

</p>
<br>
<br>

<?php
	$from = getcwd() . "/dlc_list.php";
	include $root . 'dc_footer.php';
?>
