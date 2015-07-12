<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $homeDir . $root . 'format.php';
	global $tHead, $tBG, $indexHead, $indexSub;

	$pageTitle = "Jet Grind Radio";
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
			</table>
		</td>
		<td>
			<label>
				<br>
				Released in 2000, Jet Grind Radio redefined what style meant
				with gorgeous cel shading and an unforgettable soundtrack by
				Hideki Naganuma. DJ Professor K narrates as players assume the
				role of the graffiti-spraying GG&#8217;s gang, skating through the
				open streets of Tokyo-to in an attempt to cover the art of
				rival gangs and convince other skaters to join them. Within
				each level the checklist of spots that need to be tagged can
				be completed in any order; rewarding faster completion with a
				higher end score. Not only do players battle rival gangs like
				the Noise Tanks and Poison jam, they must also deal with the
				short-tempered Captain Onishima of the Tokyo-to police and
				eventually the mysterious assassins of the Rokkaku
				corporation. Titled Jet Set Radio in Japan, Jet Grind Radio
				lives on as a pioneer for cartoon-like graphics in video
				games, and as one of the most creative and original Dreamcast
				titles. And remember kids: Graffiti is an art. However,
				graffiti as an act of vandalism is a crime. Sega does not
				condone the real life act of vandalism in any form.
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
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Main Data</font></a></td>
			<td align="center">4</td>
			<td>Save file for the main game data.</td>
			<td align="center"><img src="GAME.gif"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Small</font></a></td>
			<td align="center">~10</td>
			<td>Save file for Small Custom Graffiti.</td>
			<td align="center"><img src="SMALL.gif"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Large</font></a></td>
			<td align="center">~20</td>
			<td>Save file for Large Custom Graffiti.</td>
			<td align="center"><img src="LARGE.gif"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">X-Large</font></a></td>
			<td align="center">~40</td>
			<td>Save file for X-Large Custom Graffiti.</td>
			<td align="center"><img src="XLARGE.gif"></td>
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
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:600px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th align="center">Site</th><th align="center">URL</th><th align="center">Link</th>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>USA Site</td>
			<td align="right"><code>jetgrindradio.web.dreamcast.com</code></td>
			<td align="center"><code><a href="http://jetgrindradio.web.dreamcast.com">Link</a></code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
			<td>Europe Site</td>
			<td align="right"><code>jetsetradio.dream-key.com</code></td>
			<td align="center"><code><a href="http://jetsetradio.dream-key.com">Link</a></code></td>
		</tr>
		<tr bgcolor="<?php echo altc(); ?>">
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
