<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $homeDir . $root . 'format.php';
	global $tHead, $tBG, $indexHead, $indexSub;

	$pageTitle = "4x4 Evolution";
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
				4x4 Evolution allowed for intense multiplayer racing locally
				and online. The game also allows for play between PC and
				Dreamcast players. Players could download custom maps as
				well and play those online. This game will always be Online
				as it supports direct IP play.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<p><h3 align="left"><u><a id="save">Game Saves</a></u></h3>
	<p align="left">There are two different save files for this game.
	Click the name links to go to detailed memory maps for each file.</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Main Data</font></a></td>
			<td align="center">30</td>
			<td>Save file for the main game.</td>
			<td align="center"><img src="GAME.gif"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Custom Track</font></a></td>
			<td align="center">10-200</td>
			<td>Custom Race Track</td>
			<td align="center"><img src="TRACK.gif"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="serv">Server Websites</a></u></h3>
	<p align="left">
	Here is the list of servers 4x4 Evolution connects to:</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:450px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th align="center">Game Servers</th>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td align="center" ><code>master.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td align="center" ><code>master1.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td align="center" ><code>master2.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td align="center" ><code>master3.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td align="center" ><code>master4.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td align="center" ><code>master5.4x4evolution.com</code></td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
