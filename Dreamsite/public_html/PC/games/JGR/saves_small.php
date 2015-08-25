<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'format.php';
	require_once $root . 'lookup_game.php';

	$pageTitle = "JGR - Small Graffiti";
	include $homeDir . "pc_header.php";

	$col = "$C1";

?>
<h1 align="left"><a href="index.php" style="text-decoration:none"><?php echo getGameName( JET_GRIND_RADIO ); ?></a></h1>

<table cellpadding="3" cellspacing="1" border"0">
	<tr>
		<td>
			<table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="<?php echo $tBG; ?>">
				<tr align="center" bgcolor="<?php echo $indexHead; ?>">
					<td>Contents</td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href='<?php echo $homeDir; ?>file_vms.php#head'>VMS Header</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#body">Body Format</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#ibit">Image Properties</a></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<h2 align="center">Small Graffiti File</h2>
				Here is the format of the Jet Grind Radio
				small custom graffiti file.
				<br><br>
				Jet Grind Radio allowed for in-game graffiti creation which
				creates simple jpeg images for use with the game.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<br>
<h3>VMS File <a id="body">Body</a> Format</h3>

<p>
	The body contents directly follow the
	<a href='<?php echo $homeDir; ?>file_vms.php#head'>VMS header</a>
	information. Where there is only one icon and no eyecatch.
</p>

<p>
	The following is the contents of the body:
	<?php
		memoryTable( "SMALL.gif" );
			memoryEntry( '0x00', 640, 'Header', "<a href='" . $homeDir
					. "file_vms.php#head'>VMS header</a> Information.<br>"
					. "(Standard header and a single icon)" );
			memoryEntry( '0x280', 59, 'Unknown', "Note: For Japanese saves this may be 56 bytes long." );
			memoryEntry( '0x2BB', '2,048', 'Binary Pixels',
				"Binary image alpha transparency map for graffiti.<br>"
				. "(128 width x 128 height / 8 bits per byte)" );
			memoryEntry( '0xABB', 4, 'Unknown', "Unknown" );
			memoryEntry( '0xABF', 'Variable', 'Jpeg Data',
				"Full jpeg image placed into file. It starts here "
				. "and goes to the end of the file. Save it off as "
				. "its own file and it will be readable." );
		memoryCloseTable();
	?>
</p>
<br>

<hr>
<h3><a id="ibit">Image Properties</a></h3>
<p>
	The Image is 128 x 128. The transparency map stores pixels as
	binary data. After this there is also a Jpeg image of the
	graffiti. Due to compression, this is not easily defined
	based on memory locations and easiest just to write it out
 	byte for byte, as read, to create a jpeg image for viewing.
</p>
<br><br>
<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
