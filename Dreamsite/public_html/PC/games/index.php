<?php
	// index.php for games/
	$homeDir = "../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'format.php';
	require_once $root . 'lookup_game.php';

	// Print the entry for the index.
	function printGameEntry( $name ) {
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td align='center'>
					<a href='<?php echo $name; ?>/index.php'
						style='text-decoration:none'>
						<?php echo getGameName( $name ); ?>
					</a>
				</td>
			</tr>
		<?php
	}

	$pageTitle = "Games";
	include $homeDir . "pc_header.php";

?>
<h1 align="left">Dreamcast Games</h1>
<p>Here are a list of games with information currently.</p>

<p><br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:400px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th bgcolor="<?php echo $tHead; ?>">Game</th>
		</tr>

		<?php
			printGameEntry( _4X4_EVOLUTION );
			printGameEntry( JET_GRIND_RADIO );
			printGameEntry( PHANTASY_STAR_ONLINE_V2 );
			printGameEntry( QUAKE_3_ARENA );
			printGameEntry( SHENMUE );
			printGameEntry( SONIC_ADVENTURE );
			printGameEntry( SONIC_ADVENTURE_2 );
			printGameEntry( STARLANCER );
		?>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
