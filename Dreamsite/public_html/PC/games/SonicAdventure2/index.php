<?php
	// index.php
	$homeDir = "../../";
	include $homeDir . "pc_globals.php";
	include $homeDir . "format.php";
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

		<!--
			I want to be able to just specify the filename.
			Blocksize, description, icon, all of these should
			be looked up from the file name
		-->
		<?php dlcEntry('DOWN001'); ?>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center">
				<a href="<?php echo $homeDir . $dirSave . "vmidl.php?id=dlc/DOWN001.vmi&t=i" ?>">
					<img src="<?php echo $homeDir . $dirIcons . "save_vmi.png"?>">
				</a>
			</td>
			<td align="center">
				<a href="<?php echo $homeDir . $dirSave . "vmidl.php?id=dlc/DOWN001.vmi&t=s" ?>">
					<img src="<?php echo $homeDir . $dirIcons . "save_vms.png"?>">
				</a>
			</td>
			<td align="center">81</td>
			<td align="center">DOWN001</td>
			<td>High-Speed Trial Kart Map</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "3a7d695f.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/DOWN002.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">61</td>
			<td align="center">DOWN002</td>
			<td>Opa Opa Kart Map</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "945bca5b.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/DOWN003.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">55</td>
			<td align="center">DOWN003</td>
			<td>Eggrobo Kart Map</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "6ae0a7e2.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME001.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME001</td>
			<td>Sonic Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "44a59e3b.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME002.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME002</td>
			<td>Tails Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "f92754c1.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME003.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME003</td>
			<td>Knuckles Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "a695ba79.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME004.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME004</td>
			<td>Shadow Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "4295e2c7.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME005.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME005</td>
			<td>Eggman Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "633ad529.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME006.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME006</td>
			<td>Rouge Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "2bf7beac.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME007.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME007</td>
			<td>Amy Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "a647f369.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME008.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME008</td>
			<td>Omochao Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "cacf34bf.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME009.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME009</td>
			<td>Maria Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "8d178fc7.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME010.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME010</td>
			<td>President's Secretary Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "03ff64e8.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME011.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME011</td>
			<td>Halloween Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "79faff25.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/SA2/THEME012.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">2</td>
			<td align="center">THEME012</td>
			<td>Christmas Theme</td>
			<td align="center"><img src="<?php echo $homeDir . $dirIcons . "966b8a74.gif"?>"></td>
		</tr>
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
