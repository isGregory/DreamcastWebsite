<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'lookup_game.php';
	require_once $root . 'format.php';
	require_once $root . 'format_links.php';
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
					<td><a href="#browse">Web Browser</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#graf">Graffiti</a></td>
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

<?php
	// The web browser cheat codes are thanks to lordnikon at
	// the following forum post:
	// http://dreamcast.onlineconsoles.com/phpBB2/viewtopic.php?t=605
	// Additional navigation tips found at:
	// http://www.gamefaqs.com/dreamcast/197687-jet-grind-radio/faqs/8112
?>
<h3 align="left"><u><a id="browse">Web Browser</a></u></h3>
<p align="left">
	In the main menu, the option to go to the website opens up a built-in
	web browser. The feature-set of this browser is fairly limited.
	<br><br>
	In order to unlock more browsing functions:
	<br><br>
	<table bgcolor="<?php echo $tHead; ?>" align="center" border="0">
		<tr>
			<td>
				<pre>Hold 'A' and press 'Start' 10 times.</pre>
			</td>
		</tr>
	</table>
	<br>

	<b>Unlocked Controls:</b><br>
	<table bgcolor="<?php echo $tHead; ?>" align="center" border="0">
		<tr>
			<td>
				<code>
					Press 'B' + 'Start' for Bookmarks<br>
					Press 'Y' + 'Start' for History<br>
					Press 'X' + 'Start' to Connect
				</code>
			</td>
		</tr>
	</table>
	<br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th colspan="2">
				To display a URL bar
			</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td>
				Controller
			</td>
			<td>
				<code>
					Place the cursor near the status bar at the<br>
					bottom of the screen and press 'X' + 'A'
				</code>
			</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td>
				Keyboard
			</td>
			<td>
				<code>
					Control + 'O'
				</code>
			</td>
		</tr>
	</table>
	<br>
	<b>To bookmark a page:</b><br>
	Navigate to the desired page and then enter the following in the URL bar:<br><br>
	<table bgcolor="<?php echo $tHead; ?>" align="center" border="0">
		<tr>
			<td>
				<pre>x-avefront://---.dream/proc/menu/add-bookmark</pre>
			</td>
		</tr>
	</table>
</p>

<hr>

<h3 align="left"><u><a id="graf">Graffiti</a></u></h3>
<p align="left">
	This game has the ability to use saved
	images from the web as graffiti (tags).
	<br><br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th bgcolor="<?php echo $tHead; ?>">
				Note
			</th>
			<td bgcolor="<?php echo ac(); ?>">
				1. Only JPEG files can be used for tags.<br>
				2. Image names can not cantain spaces.
			</td>
		</tr>
	</table>
	<br><br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th colspan="3">
				Graffiti Dimensions
			</th>
		</tr>
		<tr bgcolor="<?php echo $indexSub; ?>">
			<th>Size</th>
			<th>Pixels</th>
			<th>Template</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>
				Small
			</td>
			<td>
				<code>
					128 x 128
				</code>
			</td>
			<td>
				<img height="64" src="tagSmall.png">
			</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>
				Large
			</td>
			<td>
				<code>
					256 x 128
				</code>
			</td>
			<td>
				<img height="64" src="tagLarge.png">
			</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>
				Xtra-Large
			</td>
			<td>
				<code>
					512 x 128
				</code>
			</td>
			<td>
				<img height="64" src="tagXtraLarge.png">
			</td>
		</tr>
	</table>
	<br><br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th colspan="2">
				JPEG Compatibility Chart
			</th>
		</tr>
		<tr bgcolor="<?php echo $indexSub; ?>">
			<th>Setting</th>
			<th>Does it work with the game?</th>
		</tr>
		<tr bgcolor="<?php echo $indexSub; ?>">
			<th colspan="2">Compression</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>Progressive Scan 3</td>
			<td>No</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>Progressive Scan 4</td>
			<td>No</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>Progressive Scan 5</td>
			<td>No</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>Baseline Optimized</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>Baseline ('Standard')</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo $indexSub; ?>">
			<th colspan="2">Color Modes</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>CMYK</td>
			<td>No</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>RGB</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>Grayscale</td>
			<td>No</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>72dpi</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>300dpi (or higher)</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo $indexSub; ?>">
			<th colspan="2">Extensions</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>.JPG</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>.JPEG</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>.JPE</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>.jpg</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>.jpeg</td>
			<td>Yes</td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>" align="center">
			<td>.jpe</td>
			<td>Yes</td>
		</tr>
	</table>
	<br>
	To download an image, place the cursor over
	it, while holding 'X' press 'A'.
</p>

<hr>

<h3 align="left"><u><a id="dlc">Downloadable Content</a></u></h3>
<p align="left">
	Various downloadable content were released for this
	game in the form of images on the website to be used as graffiti.
	None of this artwork is known to have survived.
</p>

<hr>

<?php callLinkFunction( JET_GRIND_RADIO ); ?>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
