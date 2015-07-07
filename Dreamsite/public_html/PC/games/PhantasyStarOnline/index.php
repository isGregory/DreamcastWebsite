<?php
	// index.php
	$homeDir = "../../";
	include $homeDir . "pc_globals.php";
	include $homeDir . "format.php";

	$pageTitle = "Phantasy Star Online";
	include $homeDir . "pc_header.php";

?>
<h1 align="left">Phantasy Star Online</h1>

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
				<tr bgcolor="#CEEBF5">
					<td><a href="#shot">Screenshots</a></td>
				</tr>
				<tr align="center" bgcolor="#DDDDDD">
					<td>Websites</td>
				</tr>
				<tr bgcolor="#FFFFFF">
					<td><a href="#gweb">In-Game</a></td>
				</tr>
				<tr bgcolor="#CEEBF5">
					<td><a href="#eweb">External</a></td>
				</tr>
				<tr bgcolor="#FFFFFF">
					<td><a href="#serv">Server</a></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<br>
				Phantasy Star Online allows players to meet up in lobbies
				with players from all around the world. It was one of the
				early pioneers with videogame staples such as new game plus,
				world wide multiplayer match making, and downloadable content.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<p><h3 align="left"><u><a id="save">Game Saves</a></u></h3>
	<p align="left">
		There are three different save files for this game.
		Click the name links to go to detailed memory maps for each file.</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="#CEEBF5">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Main Data</font></a></td>
			<td align="center">15</td>
			<td>Save file for the main game character.</td>
			<td align="center"><img src="images/saves/GAME.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Guild Card</font></a></td>
			<td align="center">30</td>
			<td>Save file for PSO Guild Card.</td>
			<td align="center"><img src="images/saves/CARD.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center"><a href="saves_photo.php" style="text-decoration:none">Screen Image</a></td>
			<td align="center">195</td>
			<td>Save file for an in-game screenshot.</td>
			<td align="center"><img src="images/saves/SHOT.bmp"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="dlc">Downloadable Content</a></u></h3>
	<p align="left">
		Various downloadable content was released for this
		game. Version 1 quests can be downloaded and used with Version 1
		only. Quests were downloaded in multiple parts. Most of these
		quests are Japanese only. Though other regions can play them by
		changing the language options to Japanese.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th colspan="6">PSO Version 1</th>
		</tr>
		<tr bgcolor="#CCCCCC">
			<th colspan="2">Downloads</th><th width="65px" rowspan="2">Size<br>(Blocks)</th><th width="100px" rowspan="2">File Name</th><th rowspan="2">Description</th><th width="34px" rowspan="2">Icon</th>
		</tr>
		<tr bgcolor="#CCCCCC">
			<th width="34px">VMI</th><th width="34px">VMS</th>
		</tr>

		<tr bgcolor="#CEEBF5">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">DOWN001</td>
			<td>Easter Quest - 1 of 3</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">THEME001</td>
			<td>Easter Quest - 2 of 3</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">DOWN001</td>
			<td>Easter Quest - 3 of 3</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">THEME001</td>
			<td>Famitsu Quest - 1 of 3</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">DOWN001</td>
			<td>Famitsu Quest - 2 of 3</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">THEME001</td>
			<td>Famitsu Quest - 3 of 3</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">DOWN001</td>
			<td>Retired Hunter Quest - 1 of 2</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">THEME001</td>
			<td>Retired Hunter Quest - 2 of 2</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">DOWN001</td>
			<td>Raw Material Quest - 1 of 2</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">THEME001</td>
			<td>Raw Material Quest - 2 of 2</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">DOWN001</td>
			<td>Letter from Lionel Quest - 1 of 2</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center"><img src="../../images/save_vmi.png"></td>
			<td align="center"><a href="../files/DLC/PSO/xx.vms"><img src="../../images/save_vms.png"></a></td>
			<td align="center">??</td>
			<td align="center">THEME001</td>
			<td>Letter from Lionel Quest - 2 of 2</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
	</table>

	<br><br>
	<p align="left">
		Version 2 quests were encrypted and locked to players so no
		downloads can be offered.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th colspan="5">PSO Version 2</th>
		</tr>
		<tr bgcolor="#CCCCCC">
			<th width="65px">Size<br>(Blocks)</th><th width="100px">File Name</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="#CEEBF5">
			<td align="center">??</td>
			<td align="center">???</td>
			<td>Central Dome Fire Swirl</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center">??</td>
			<td align="center">???</td>
			<td>Lionel's Letter</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center">??</td>
			<td align="center">???</td>
			<td>Soul of a Blacksmith</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td align="center">??</td>
			<td align="center">???</td>
			<td>Soul of Steel</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td align="center">??</td>
			<td align="center">???</td>
			<td>The Retired Hunter</td>
			<td align="center"><img src="images/dlc/QUEST.bmp"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="shot">Screen Shots</a></u></h3>
	<p align="left">
		Phantasy Star Online allows users to take screen
		shots. The following will guide a user through how to do this.
		<br><br>
		<u>Supplies needed</u>:
		<br><br>
		1. A VMU with 195 free blocks.<br>
		2. An extra controller plugged into Port D, with above VMU
		plugged into Slot 2.
		<br><br>
		<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:400px;max-width:640px;" bgcolor="#6E6E6E">
			<tr>
				<th align="center" bgcolor="#CCCCCC">Shot Type</th><th align="center" bgcolor="#CCCCCC">Instructions</th>
			</tr>
			<tr bgcolor="#CEEBF5">
				<td>Closeup of Screen</td>
				<td>On the controller in Port D, Hold X and press Start</td>
			</tr>
			<tr bgcolor="#FFFFFF">
				<td>Entire Screen</td>
				<td>On the controller in Port D, Hold A and press Start</td>
			</tr>
		</table>
		<br>
		Once pressed the screen will go black and a countdown will appear
		in the top-left corner of the screen.<br><br>
		When the countdown reaches 0 your image will finish being saved
		to the VMU in Slot 2 of the controller in Port D.<br><br>
		<u>Note</u>: Taking a screen shot will <b>NOT</b> pause the game. Be
		aware of your surroundings before attempting to take a picture.
	</p>
</p>

<hr>

<p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
	<p align="left">
		These are websites that are accessable through in-game menus.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:600px;max-width:640px;" bgcolor="#6E6E6E">
		<tr>
			<th align="center" bgcolor="#CCCCCC">Site</th><th align="center" bgcolor="#CCCCCC">URL</th><th align="center" bgcolor="#CCCCCC">Link</th>
		</tr>
		<tr bgcolor="#A6FFB2">
			<td>Main Site</td>
			<td align="right"><code>pso.dricas.ne.jp</code></td>
			<td align="center"><code><a href="http://pso.dricas.ne.jp">Link</a></code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>Buying a Hunter License</td>
			<td align="right"><code>www.dricas.com/pso/signup_top.html</code></td>
			<td align="center"><code><a href="http://www.dricas.com/pso/signup_top.html">Link</a></code></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="eweb">External Websites</a></u></h3>
	<p align="left">
		These are links to official websites that hosted
		supplemental information about the game.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:600px;max-width:640px;" bgcolor="#6E6E6E">
		<tr>
			<th align="center" bgcolor="#CCCCCC">Site</th><th align="center" bgcolor="#CCCCCC">URL</th><th align="center" bgcolor="#CCCCCC">Link</th>
		</tr>
		<tr bgcolor="#A6FFB2">
			<td>Sega Game Page</td>
			<td align="right"><code>score.sega.com/games/phantasystaronline/</code></td>
			<td align="center"><code><a href="http://score.sega.com/games/phantasystaronline/">Link</a></code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>Sonic Team Site</td>
			<td align="right"><code>www.sonicteam.com/pso/english/home.html</code></td>
			<td align="center"><code><a href="http://www.sonicteam.com/pso/english/home.html">Link</a></code></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="serv">Servers</a></u></h3>
	<p align="left">
		Here is the list of servers by region that Phantasy Star Online
		<b>Version 2</b> connects to.<br><br>In the case of USA and Japan, the
		game first attempts to connect to Hunter License servers to check
		that there is an active subscription.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:450px;max-width:640px;" bgcolor="#6E6E6E">
		<tr>
			<th align="center" colspan="2" bgcolor="#CCCCCC">USA (NTSC-U)</th>
		</tr>
		<tr bgcolor="#AEE1F2">
			<td width="30%">Hunter License:</td>
			<td align="right"><code>auth01.dricas.com:443</code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>Game Server:</td>
			<td align="right"><code>game01.st-pso.games.sega.net:9200</code></td>
		</tr>
		<tr>
			<th align="center" colspan="2" bgcolor="#CCCCCC">Europe (PAL)</th>
		</tr>
		<tr bgcolor="#AEE1F2">
			<td>Hunter License:</td>
			<td align="right"><code>None</code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>Game Server:</td>
			<td align="right"><code>pso.dream-key.com:9200</code></td>
		</tr>
		<tr>
			<th align="center" colspan="2" bgcolor="#CCCCCC">Japan (NTSC-J)</th>
		</tr>

		<tr bgcolor="#AEE1F2">
			<td>Hunter License:</td>
			<td align="right"><code>auth01.dricas.ne.jp:443</code></td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>Game Server:</td>
			<td align="right"><code>pso01.dricas.ne.jp:9200</code></td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
