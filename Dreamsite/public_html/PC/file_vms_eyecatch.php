<?php
	// file_vms.php
	require_once 'pc_globals.php';
	require_once 'format.php';

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
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:400px;max-width:640px;" bgcolor="#6E6E6E">
		<tr>
			<th bgcolor="#CCCCCC">Mode</th><th bgcolor="#CCCCCC">Game</th><th bgcolor="#CCCCCC">Eyecatch</th>
		</tr>
		<?php
			rowEC( 3, "4 Wheel Thunder", "4wheelthunder-EC.bmp" );
			rowEC( 3, "Aerowings", "aerowings-EC.bmp" );
			rowEC( 3, "Aqua GT", "aquagt-EC.bmp" );
			rowEC( 3, "Buggy Heat", "buggyheat-EC.bmp" );
			rowEC( 1, "Draconus:<br>Cult of the Wyrm", "draconus-EC.bmp" );
			rowEC( 3, "Fur Fighters", "furfighters-EC.bmp" );
			rowEC( 3, "Headhunter", "headhunter-EC.bmp" );
			rowEC( 1, "Max Steel", "maxsteel-EC.bmp" );
			rowEC( 2, "Nightmare Creatures", "nightmarecreatures2-EC.bmp" );
			rowEC( 3, "Psychic Force 2012", "psychicforce2012-EC.bmp" );
			rowEC( 3, "The King of Fighters:<br>Dream Match 1999", "kof1999-EC.bmp" );
		?>
	</table>
</p>

<?php
	$from = "file_vms_eyecatch.php";
	include 'pc_footer.php';
?>
