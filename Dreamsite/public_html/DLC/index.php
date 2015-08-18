<?php
	// DLC/index.php
	$root      = '../';
	require_once $root . 'directories.php';
	require_once $root . 'lookup_game.php';
	require_once $root . 'format.php';
	require_once $root . 'format_dlc.php';

	$pageTitle = "Downloadable Content";
	include $root . 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">
	The following are games with official DLC. Click to see files available.
	<br>
	<br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:300px;max-width:540px;" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th bgcolor="<?php echo $tHead; ?>">Game</th>
		</tr>

		<?php
			printDLCEntry( PHANTASY_STAR_ONLINE_V1 );
			printDLCEntry( SONIC_ADVENTURE );
			printDLCEntry( SONIC_ADVENTURE_2 );
		?>

	</table>
</p>
<br>
<br>

<?php
	$from = getcwd() . "/index.php";
	include $root . 'dc_footer.php';
?>
