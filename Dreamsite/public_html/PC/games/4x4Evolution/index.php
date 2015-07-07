<?php
	// index.php
	$homeDir = "../../";
	include $homeDir . "pc_globals.php";
	include $homeDir . "format.php";

	$pageTitle = "4x4 Evolution";
	include $homeDir . "pc_header.php";

?>
<h1 align="left">4x4 Evolution</h1>

<table cellpadding="3" cellspacing="1" border"0">
	<tr>
		<td>
			<table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="#6E6E6E">
				<tr align="center" bgcolor="#BBBBBB">
					<td><b>Contents</b></td>
				</tr>
				<tr align="center" bgcolor="#DDDDDD">
					<td>Files</td>
				</tr>
				<tr bgcolor="#CEEBF5">
					<td><a href="#save">Game Saves</a></td>
				</tr>
				<tr align="center" bgcolor="#DDDDDD">
					<td>Websites</td>
				</tr>
				<tr bgcolor="#FFFFFF">
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
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="#CEEBF5">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Main Data</font></a></td>
			<td align="center">30</td>
			<td>Save file for the main game.</td>
			<td align="center"><img src="images/saves/GAME.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Custom Track</font></a></td>
			<td align="center">10-200</td>
			<td>Custom Race Track</td>
			<td align="center"><img src="images/saves/TRACK.bmp"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="serv">Server Websites</a></u></h3>
	<p align="left">
	Here is the list of servers 4x4 Evolution connects to:</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:450px;max-width:640px;" bgcolor="#6E6E6E">
		<tr>
			<th align="center" bgcolor="#CCCCCC">Game Servers</th>
		</tr>
		<tr bgcolor="#AEE1F2">
			<td align="center" ><code>master.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center" ><code>master1.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="#AEE1F2">
			<td align="center" ><code>master2.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center" ><code>master3.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="#AEE1F2">
			<td align="center" ><code>master4.4x4evolution.com</code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center" ><code>master5.4x4evolution.com</code></td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
