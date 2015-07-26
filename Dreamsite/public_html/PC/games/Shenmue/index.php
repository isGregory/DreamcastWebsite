<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $homeDir . $root . 'format.php';
	global $tHead, $tBG, $indexHead, $indexSub;

	$pageTitle = "Shenmue";
	include $homeDir . "pc_header.php";

?>
<h1 align="left"><?php echo $pageTitle; ?></h1>

<table cellpadding="3" cellspacing="1" border"0">
	<tr>
		<td>
			<table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="<?php echo $tBG; ?>">
				<tr align="center" bgcolor="<?php echo $indexHead; ?>">
					<td><b>Contents</b></td>
				</tr>
				<tr align="center" bgcolor="<?php echo $indexSub; ?>">
					<td>Files</td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#save">Game Saves</a></td>
				</tr>
				<tr align="center" bgcolor="<?php echo $indexSub; ?>">
					<td>Websites</td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#gweb">Passport</a></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<br>
				Here is some quick information about this game. Be sure to
				push the content of this paragraph over the limit of a single
				line or it will look funny.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<p><h3 align="left"><u><a id="save">Game Saves</a></u></h3>
	<p align="left">
		There is only one save file for this game which holds 3 save slots.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none">Main Data</a></td>
			<td align="center">80</td>
			<td>Save file for the main game data.</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "4b47328b-a.gif"?>"></td>
		</tr>
	</table>
</p>

<hr>

<p align="left"><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
	<p align="left">
		These are websites that are accessable through
		the Passport included as Disk 4.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:600px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th align="center">Site</th><th align="center">URL</th><th align="center">Link</th>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>USA Site</td>
			<td align="right"><code>passport.shenmue.com</code></td>
			<td align="center"><code><a href="passport.shenmue.com">Link</a></code></td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
