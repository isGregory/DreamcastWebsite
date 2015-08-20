<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'format.php';
	global $tHead, $tBG, $indexHead, $indexSub;

	$pageTitle = "Quake III";
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
					<td><a href="#serv">Server</a></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<br>
				Quake III Arena description goes here, preferably extending past a single
				line so the page doesn't have goofy formatting.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<p><h3 align="left"><u><a id="save">Game Saves</a></u></h3>
	<p align="left">There is only a single save file for this game.
	Click the name to go to detailed memory maps for this file.</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Main Data</font></a></td>
			<td align="center">??</td>
			<td>Save file for the main game.</td>
			<td align="center"><img src="<?php echo $dirIcons . "88132937.gif"?>"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="serv">Server Websites</a></u></h3>
	<p align="left">
	Here is the server that Quake III Arena connects to:</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:450px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th align="center" bgcolor="<?php echo $tHead; ?>">Game Servers</th>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td align="center"><code>master.quake3arena.com</code></td>
		</tr>
	</table>
	<br>
	<br>
	<p align="left">
	Here are the ports that Quake III Arena connects to:</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:450px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th>Protocol</th>
			<th>Ports</th>
			<th>Usage</th>
		</tr>
		<tr align="center" bgcolor="<?php echo altc(); ?>">
			<td>UDP?</td>
			<td><code>27960 - 27969</code></td>
			<td>Unknown</td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
