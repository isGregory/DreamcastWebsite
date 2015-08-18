<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'lookup_game.php';
	require_once $root . 'format.php';
	require_once $root . 'format_dlc.php';
	require_once $root . 'format_links.php';
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
			<td align="center"><img src="<?php echo $dirIcons . "b7d2cbf3.gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_chao.php" style="text-decoration:none">Chao Save</a></td>
			<td align="center">52</td>
			<td>Save file for Chao world.</td>
			<td align="center"><img src="<?php echo $dirIcons . "657c7762-a.gif"?>"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="dlc">Downloadable Content</a></u></h3>
	<p align="left">
		Various downloadable content was released for this
		game as follows.
	</p>

	<?php callDLCFunction( SONIC_ADVENTURE_2 ); ?>
</p>

<hr>

<?php callLinkFunction( SONIC_ADVENTURE_2 ); ?>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
