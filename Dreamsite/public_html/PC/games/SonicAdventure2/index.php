<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $homeDir . $root . 'format.php';
	global $tHead, $tBG, $indexHead, $indexSub;

	$pageTitle = "Sonic Adventure 2";
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
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#dlc">DLC</a></td>
				</tr>
				<tr align="center" bgcolor="<?php echo $indexSub; ?>">
					<td>Websites</td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#gweb">In-Game</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#eweb">External</a></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<br>
				Sonic Adventure 2 was a flagship title for Sega. It
				continued Sonic's adventure into 3D fast paced environments
				and pioneered quite a few interesting features, such as
				downloadable content, and continued to build off the Chao
				Garden introduced in the first game. The Chao Garden was
				deeply engrained into the main game as a sort of minigame
				which contained minigames. It provided the ability to bring
				Chaos in a tomogatchi like way to the VMU and play there.
				In addition the game provided a way for players to connect
				online and unlock items in the Black Market, as well as put
				Chaos into a daycare system where they could strengthen up.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<p><h3 align="left"><u><a id="save">Game Saves</a></u></h3>
	<p align="left">
		There are two different save files for this game.
		Click the name links to go to detailed memory maps for each file.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_main.php" style="text-decoration:none"><font color="#FF0000">Main Game</font></a></td>
			<td align="center">18</td>
			<td>Save file for the main game story.</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "7aadd2f3.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_chao.php" style="text-decoration:none">Chao Save</a></td>
			<td align="center">52</td>
			<td>Save file for Chao world.</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "86df7f16-a.gif"?>"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="dlc">Downloadable Content</a></u></h3>
	<p align="left">
		Various downloadable content was released for this
		game as follows.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th colspan="2">Downloads</th><th width="65px" rowspan="2">Size<br>(Blocks)</th><th width="100px" rowspan="2">File Name</th><th rowspan="2">Description</th><th width="34px" rowspan="2">Icon</th>
		</tr>
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="34px">VMI</th><th width="34px">VMS</th>
		</tr>

		<?php
			dlcEntry('DOWN001');
			dlcEntry('DOWN002');
			dlcEntry('DOWN003');
			dlcEntry('THEME001');
			dlcEntry('THEME002');
			dlcEntry('THEME003');
			dlcEntry('THEME004');
			dlcEntry('THEME005');
			dlcEntry('THEME006');
			dlcEntry('THEME007');
			dlcEntry('THEME008');
			dlcEntry('THEME009');
			dlcEntry('THEME010');
			dlcEntry('THEME011');
			dlcEntry('THEME012');
		?>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
	<p align="left">
		These are websites that are accessable through
		in-game menus.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="140px" align="center">Site</th><th align="center">URL</th><th width="35px" align="center">Link</th>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>Main Site</td>
			<td align="right"><code>sonic.dricas.ne.jp</code></td>
			<td align="center"><code><a href="http://sonic.dricas.ne.jp">Link</a></code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>Chao Daycare</td>
			<td align="right"><code>tails03.sonicteam.com/daycare/en/index.html</code></td>
			<td align="center"><code><a href="http://tails03.sonicteam.com/daycare/en/index.html">Link</a></code></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="eweb">External Websites</a></u></h3>
	<p align="left">
		These are links to official websites that hosted
		supplemental information about the game.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="140px" align="center">Site</th><th align="center">URL</th><th width="35px" align="center">Link</th>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>Sega Launch Page</td>
			<td align="right"><code>www.sega.com/sega/game/sonic2_launch.jhtml</code></td>
			<td align="center"><code><a href="http://www.sega.com/sega/game/sonic2_launch.jhtml">Link</a></code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>Sega Game Page</td>
			<td align="right"><code>score.sega.com/games/Sonic2/Sonic2.html</code></td>
			<td align="center"><code><a href="http://score.sega.com/games/Sonic2/Sonic2.html">Link</a></code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>Sonic Team Site</td>
			<td align="right"><code>www.sonicteam.com/sonicadv2/index_e.html</code></td>
			<td align="center"><code><a href="http://www.sonicteam.com/sonicadv2/index_e.html">Link</a></code></td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
