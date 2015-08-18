<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'lookup_game.php';
	require_once $root . 'format.php';
	require_once $root . 'format_dlc.php';
	require_once $root . 'format_links.php';
	global $tHead, $tBG, $indexHead, $indexSub;

	$pageTitle = "Sonic Adventure";
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
				Sonic Adventure description goes here. Hope is that you
				can extend the description to multiple lines so the
				formating doesn't look odd.
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
			<td align="center"><a href="" style="text-decoration:none"><font color="#FF0000">Main Game</font></a></td>
			<td align="center">??</td>
			<td>Save file for the main game story.</td>
			<td align="center"><img src="<?php echo $dirIcons . ".gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="" style="text-decoration:none"><font color="#FF0000">Chao Save</font</a></td>
			<td align="center">??</td>
			<td>Save file for Chao world.</td>
			<td align="center"><img src="<?php echo $dirIcons . ".gif"?>"></td>
		</tr>
	</table>
</p>

<hr>

<p><h3 align="left"><u><a id="dlc">Downloadable Content</a></u></h3>
	<p align="left">
		Various downloadable content was released for this
		game as follows.
	</p>

	<?php callDLCFunction( SONIC_ADVENTURE ); ?>
</p>

<hr>

<?php callLinkFunction( SONIC_ADVENTURE ); ?>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
