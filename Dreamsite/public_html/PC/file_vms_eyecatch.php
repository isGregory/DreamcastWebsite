<?php
	// file_vms.php
	require_once 'pc_directories.php';
	require_once $root . 'format.php';

	$pageTitle = "VMS Eyecatch";
	$homeDir = "";
	include 'pc_header.php';

	function rowEC( $type, $game, $img ) {
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td align="center"><?php echo $type; ?></td>
				<td><?php echo $game;?></td>
				<td align="center"><img src="<?php echo $dirEC . $img; ?>"></td>
			</tr>
		<?php
	}
?>

<h1 align="left">Dreamcast VMS Eyecatch</h1>
<p>
	There are three Eyecatch modes that can be read
	up on <a href="file_vms.php#eyecatch">here</a>.
</p>

<p>
	The Dreamcast VMS file has the option of storing a Graphic Eyecatch
	shown in the VMU browser of the Dreamcast Menu. Due to the limited
	visibility of this file it is more a waste of space. It was and is
	hardly used.
</p>

<p>
	Eyecatch Images are 72 x 56 pixels. The most common is mode 3,
	which is the smallest file size.
</p>

<p align="center">The following games use the Graphic Eyecatch:<br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:400px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th>Mode</th><th>Game</th><th>Eyecatch</th>
		</tr>
		<?php
			rowEC( 3, "4 Wheel Thunder", "eceea645-EC.gif" );
			rowEC( 3, "AeroWings", "503bb174-EC.gif" );
			rowEC( 3, "Aqua GT", "2e4c6343-EC.gif" );
			rowEC( 3, "Buggy Heat", "d03347d1-EC.gif" );
			rowEC( 1, "Draconus:<br>Cult of the Wyrm", "30679c45-EC.gif" );
			rowEC( 3, "Fur Fighters", "4ce76af9-EC.gif" );
			rowEC( 3, "Headhunter", "a99c42e8-EC.gif" );
			rowEC( 1, "Max Steel", "9ec07700-EC.gif" );
			rowEC( 2, "Nightmare Creatures II", "f8ccb59e-EC.gif" );
			rowEC( 3, "Psychic Force 2012", "8a0c7e71-EC.gif" );
			rowEC( 3, "The King of Fighters:<br>Dream Match 1999", "461cefc5-EC.gif" );
		?>
	</table>
</p>

<?php
	$from = "file_vms_eyecatch.php";
	include 'pc_footer.php';
?>
