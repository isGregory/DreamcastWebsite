<?php
	// index.php
	$homeDir = "../../";
	include $homeDir . "pc_globals.php";
	include $homeDir . "format.php";

	$pageTitle = "Jet Grind Radio";
	include $homeDir . "pc_header.php";

?>
<h1 align="left">Jet Grind Radio</h1>

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
				<tr bgcolor="#FFFFFF">
					<td><a href="#dlc">DLC</a></td>
				</tr>
				<tr align="center" bgcolor="#DDDDDD">
					<td>Websites</td>
				</tr>
				<tr bgcolor="#CEEBF5">
					<td><a href="#gweb">In-Game</a></td>
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
		There are a variety of different save files for this game.
		Click the name links to go to detailed memory maps for each file.
		<br><br>
		Of interesting note, the save icons for Jet Grind Radio are saved
		with the Alpha and Green channels switched. Resulting in very off
		looking images. They are corrected here to how the icons were
		originally intended to look, and not how they are seen in the
		Dreamcast file browser.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="#CEEBF5">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Main Data</font></a></td>
			<td align="center">4</td>
			<td>Save file for the main game data.</td>
			<td align="center"><img src="images/saves/GAME.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Small</font></a></td>
			<td align="center">~10</td>
			<td>Save file for Small Custom Graffiti.</td>
			<td align="center"><img src="images/saves/SMALL.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Large</font></a></td>
			<td align="center">~20</td>
			<td>Save file for Large Custom Graffiti.</td>
			<td align="center"><img src="images/saves/LARGE.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">X-Large</font></a></td>
			<td align="center">~40</td>
			<td>Save file for X-Large Custom Graffiti.</td>
			<td align="center"><img src="images/saves/XLARGE.bmp"></td>
		</tr>
	</table>
</p>

<hr>

<h3 align="left"><u><a id="dlc">Downloadable Content</a></u></h3>
<p align="left">
	Various downloadable content were released for this
	game in the form of images on the website to be used as graffiti.
	None of this art work is known to have survived.
</p>

<hr>

<p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
	<p align="left">
		These are websites that are accessable through
		in-game menus. Only the Japanese site is known to have been
		backed up.
	</p>
	<table cellpadding="3" cellspacing="1" border="0" style="min-width:600px;max-width:640px;" bgcolor="#6E6E6E">
		<tr>
			<th align="center" bgcolor="#CCCCCC">Site</th><th align="center" bgcolor="#CCCCCC">URL</th><th align="center" bgcolor="#CCCCCC">Link</th>
		</tr>
		<tr bgcolor="#A6FFB2">
			<td>USA Site</td>
			<td align="right"><code>jetgrindradio.web.dreamcast.com</code></td>
			<td align="center"><code><a href="http://jetgrindradio.web.dreamcast.com">Link</a></code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>Europe Site</td>
			<td align="right"><code>jetsetradio.dream-key.com</code></td>
			<td align="center"><code><a href="http://jetsetradio.dream-key.com">Link</a></code></td>
		</tr>
		<tr bgcolor="#A6FFB2">
			<td>Japanese Site</td>
			<td align="right"><code>jet.dricas.ne.jp</code></td>
			<td align="center"><code><a href="http://jet.dricas.ne.jp">Link</a></code></td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
