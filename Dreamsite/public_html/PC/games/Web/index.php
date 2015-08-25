<?php
	// index.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'format.php';

	$pageTitle = "Web Browsers";
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
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#save">Game Saves</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#mime">Mime Types</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#keys">Keyboard Shortcuts</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#urlc">URL Commands</a></td>
				</tr>
				<tr bgcolor="<?php echo ac(); ?>">
					<td><a href="#home">Homepages</a></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<br>
				Web browser description goes here.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<p><h3 align="left"><u><a id="save">Game Saves</a></u></h3>
	<p align="left">
		Click the name to go to detailed memory maps for these files.
	</p>
	<table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Settings</font></a></td>
			<td align="center">??</td>
			<td>Save file for web browser settings and bookmarks.</td>
			<td align="center"><img src="<?php echo $dirIcons . ".gif"?>"></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center"><a href="saves_file.php" style="text-decoration:none"><font color="#FF0000">Images</font></a></td>
			<td align="center">??</td>
			<td>Save file for images.</td>
			<td align="center"><img src="<?php echo $dirIcons . ".gif"?>"></td>
		</tr>
	</table>
</p>

<hr>
<?php
	// Mime types as found here:
	// https://groups.yahoo.com/neo/groups/VGSOnline/conversations/messages/6715
	// Further information thanks to:
	// http://www.angelfire.com/pa3/VAMPMAN/krypt_dcinfo.html
?>
<h1><a id="mime">Mime Types</a></h1>

<p>
	Most Dreamcast webbrowsers support the following MIME types:
	<br>
	<br>application/x-dreamcast-vms-info
	<br>application/x-dreamcast-vms
	<br>application/x-dreamcast-lcdimg
	<br>application/x-dreamcast-lcdticker
	<br>application/x-dreamcast-vibrate
	<br>application/x-dreamcast-model
	<br>application/x-dreamcast-hangup
	<br>
	<br>x-dreamcast-lcdimg has precidence over x-dreamcast-lcdticker,
	or is it the last one posted gets precidence?
</p>
<?php
	// Example found here: http://www.dcemulation.org/phpBB/viewtopic.php?f=34&t=26040
	// <EMBED TYPE="application/x-dreamcast-lcdticker" name="tick1" text="Text Goes Here" scrolldelay="200" scrollammount="10" font="26" direction="left" loop="infinite" behavior="slide" hidden=true>
	// Further examples can be found on sega's dreamcast websites
	// for games such as their Phantasy Star Online promotional site.
?>

<hr>

<?php
	// Information found around the web and places such as:
	// http://www.angelfire.com/myband/docky/dcshortcuts.html
?>
<h1><a id="keys">Keyboard Shortcuts</a></h1>

<p>
	Connecting a keyboard to the dreamcast allows quick access
	to functions through shortcuts as follows:
	<br>
	<br>Control + O - Display URL Bar
	<br>Control + H - History
	<br>Control + B - Load bookmark list
	<br>Control + D - Bookmark a page
	<br>Control + M - Go to Email
</p>

<hr>

<?php
	// Information thanks to:
	// http://www.angelfire.com/pa3/VAMPMAN/krypt_dcinfo.html
?>
<h1><a id="urlc">URL Commands</a></h1>

<p>
	Most Dreamcast browsers allow you to access various aspects of
	the system, both software and hardware. A non comprehensive list follows:
	<br>
	<br>Navigation commands:
	<br>x-avefront://---.dream/util/visit
	<br>x-avefront://a--.avefront/navigation/backward
	<br>x-avefront://a--.avefront/navigation/forward
	<br>x-avefront://a--.avefront/navigation/reload
	<br>
	<br>Menu options:
	<br>x-avefront://---.dream/proc/menu/bookmark
	<br>x-avefront://---.dream/proc/menu/jump
	<br>x-avefront://---.dream/proc/menu/mail
	<br>x-avefront://---.dream/proc/menu/chat
	<br>x-avefront://---.dream/proc/menu/help
	<br>x-avefront://---.dream/proc/menu/option
	<br>x-avefront://---.dream/proc/menu/connect
	<br>x-avefront://---.dream/proc/menu/disconnect
	<br>x-avefront://---.dream/proc/menu/exit
	<br>x-avefront://---.dream/proc/menu/back
	<br>x-avefront://---.dream/proc/menu/forward
	<br>x-avefront://---.dream/proc/menu/reload
	<br>x-avefront://---.dream/proc/menu/zoom
	<br>x-avefront://---.dream/proc/menu/file
	<br>x-avefront://---.dream/proc/menu/sntp
	<br>x-avefront://---.dream/proc/menu/urlchat
	<br>x-avefront://---.dream/proc/menu/pmsg_list
	<br>
	<br>x-avefront://---.dream/proc/menu/accountinfo
	<br>x-avefront://---.dream/proc/menu/provider
	<br>x-avefront://---.dream/proc/menu/modem
	<br>
	<br>Multi-Media Playback (append path to file being played at the end):
	<br>x-avefront://---.dream/proc/play/mpeg/
	<br>x-avefront://---.dream/proc/play/adx/
</p>

<hr>

<h1><a id="home">Browser Homepages</a></h1>

<p>
	Dreamcast webbrowsers have default home pages listed here:

	<?php
		linkBrowserOpenTable();
			linkEntry( 'PlanetWeb 2.6', 'www.sega.com/dcreg/');
			linkEntry( 'Dreamcast Webbrowser', 'www.dreamcast.com/dcn/v1/');
		linkCloseTable();
	?>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
