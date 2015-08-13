<?php
	// links/index.php
	$root      = '../';
	require_once $root . 'directories.php';
	require_once $root . 'lookup_game.php';
	require_once $root . 'format.php';
	require_once $root . 'format_links.php';

	$pageTitle = "Dreamcast Websites";
	include $root . 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">
	The following are links to sites made for the dreamcast.
	Many of these sites are no longer active, but various users
	have been rebuilding these sites which can be added to your server.
	<br>
	<br>

	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:300px;max-width:540px;" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th bgcolor="<?php echo $tHead; ?>">Game</th>
		</tr>

		<?php
			printLinkEntry( JET_GRIND_RADIO );
			printLinkEntry( PHANTASY_STAR_ONLINE_V1 );
			printLinkEntry( PHANTASY_STAR_ONLINE_V2 );
			printLinkEntry( SHENMUE );
			printLinkEntry( SONIC_ADVENTURE_2 );
		?>
	</table>
</p>
<br>
<br>

<?php
	$from = getcwd() . "/index.php";
	include $root . 'dc_footer.php';
?>
