<?php
	// index.php
	$homeDir = "../../";
	include $homeDir . "pc_globals.php";
	include $homeDir . "format.php";

	$pageTitle = "PSO - Screenshot";
	include $homeDir . "pc_header.php";

	$col = "$C1";

?>
<h1 align="left"><a href="index.php" style="text-decoration:none">Phantasy Star Online</a></h1>

<table cellpadding="3" cellspacing="1" border"0">
	<tr>
		<td>
			<table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="#6E6E6E">
				<tr align="center" bgcolor="#BBBBBB">
					<td>Contents</td>
				</tr>
				<tr bgcolor="#CCCCCC">
					<td><a href='<?php echo $homeDir; ?>file_vms.php#head'>VMS Header</a></td>
				</tr>
				<tr bgcolor="#EEEEEE">
					<td><a href="#body">Body Format</a></td>
				</tr>
				<tr bgcolor="#CCCCCC">
					<td><a href="#ibit">Image Properties</a></td>
				</tr>
				<tr bgcolor="#EEEEEE">
					<td><a href="#ipal">Icon Palette</a></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<h2 align="center">Screenshot File</h2>
				Here is the format of the Phantasy Star Online Screenshot file.
				<br><br>
				Phantasy Star Online allows for players to take a screenshot
				using an extra controller and empty memory card as explained
				<a href="index.php#shot" style="text-decoration:none">here</a>.
				This page specifies how the save file is laid out. In addition
				to recording pixel information the save file also documents
				players in the game when the picture was taken.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<br>
<h3>VMS File <a id="body">Body</a> Format</h3>

<p>
	The body contents directly follow the
	<a href='<?php echo $homeDir; ?>file_vms.php#head'>VMS header</a>
	information. Where there is only one icon and no eyecatch.
</p>

<p>
	The following is the contents of the body:
	<table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th colspan="2">Offset</th><th rowspan="2">Size (bytes)</th><th rowspan="2">Datatype</th><th rowspan="2">Contents<img align="right" src="images/saves/SHOT.bmp"></th>
		</tr>
		<tr bgcolor="#CCCCCC">
			<th>Byte</th><th>Hex</th>
		</tr>

		<tr bgcolor="#CEEBF5">
			<td>0</td>
			<td><pre>0x00</pre></td>
			<td align="center">640</td>
			<td>Header</td>
			<td><a href='<?php echo $homeDir; ?>file_vms.php#head'>VMS header</a> Information.</td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>640</td>
			<td><pre>0x280</pre></td>
			<td align="center">1</td>
			<td>Unknown</td>
			<td>Unknown - Image Width? (256)</td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td>641</td>
			<td><pre>0x281</pre></td>
			<td align="center">1</td>
			<td>Unknown</td>
			<td>Unknown - Pixel Count + 1? (49,153)</td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>642</td>
			<td><pre>0x282</pre></td>
			<td align="center">2</td>
			<td>Unknown</td>
			<td>Unknown</td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td>644</td>
			<td><pre>0x284</pre></td>
			<td align="center">98,304</td>
			<td>Pixel Data</td>
			<td>Pixel Data for the screenshot. Pixels are 16-bits
			and thus every two bytes.</td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>98948</td>
			<td><pre>0x18284</pre></td>
			<td align="center">2</td>
			<td>Unknown</td>
			<td>Unknown</td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td>98950</td>
			<td><pre>0x18286</pre></td>
			<td align="center">2</td>
			<td>Integer</td>
			<td>The number of players around when the
			screenshot was taken. (1-15?)</td>
		</tr>
		<tr bgcolor="#FFFFFF">
			<td>98952</td>
			<td><pre>0x18288</pre></td>
			<td align="center">96</td>
			<td>Unknown</td>
			<td>Unknown - Map / Location Info?</td>
		</tr>
		<tr bgcolor="#CEEBF5">
			<td>99048</td>
			<td><pre>0x182E8</pre></td>
			<td align="center">24*n</td>
			<td>String</td>
			<td>Names of players around when the screenshot was taken
			start here. Names are every 24 bytes after this point till
			all of the number of players around have been listed.
			n = Number of Players (<code>0x18286</code>)</td>
		</tr>
	</table>
</p>
<br>

<!-- Table for Notes -->
<table cellpadding="3" cellspacing="1" border="0" bgcolor="#6E6E6E">
	<tr bgcolor="#CCCCCC">
		<th colspan="2">Notes</th>
	</tr>

	<tr bgcolor="#CEEBF5">
		<td>String fields</td>
		<td>are padded with NUL (<code>0x00</code>).</td>
	</tr>
	<tr bgcolor="#FFFFFF">
		<td>Integer fields</td>
		<td>are little endian.</td>
	</tr>
</table>

<hr>
<h3><a id="ibit">Image Properties</a></h3>
<p>
	The Image is 256 x 192. Pixels are stored as 16-bit colors
	following a 565-RGB format. Where Red is 5 bits, Green is 6 bits,
	and Blue is 5 bits. There are then 49,152 pixels and each pixel
	is 2 bytes. Data is stored in little endian and thus the bytes
	need to be switched around for extracting component colors.
	Pixels are stored end to end, meaning there is no other
	information in the Pixel Data section beyond all of
	the 49,152 pixels.
</p>

<hr>

<h3><a id="ipal">Image Pixels</a></h3>
<p>
	Each Pixel is a 16-bit integer (little endian). The color fields
	are in the order of Blue, Green, and Red. Red and Blue are both
	5 bits, where Green is 6 bits.
</p>
<p>
	The three fields for each 16-bit integer are set up as such:
	<table cellpadding="3" cellspacing="1" border="0" bgcolor="#6E6E6E">
		<tr align="center">
			<td bgcolor="#CC9595">15</td><td bgcolor="#CC9595">14</td><td bgcolor="#CC9595">13</td><td bgcolor="#CC9595">12</td><td bgcolor="#CC9595">11</td>
			<td bgcolor="#95CCAA">10</td><td bgcolor="#95CCAA">9</td><td bgcolor="#95CCAA">8</td><td bgcolor="#95CCAA">7</td><td bgcolor="#95CCAA">6</td><td bgcolor="#95CCAA">5</td>
			<td bgcolor="#95B2CC">4</td><td bgcolor="#95B2CC">3</td><td bgcolor="#95B2CC">2</td><td bgcolor="#95B2CC">1</td><td bgcolor="#95B2CC">0</td>
		</tr>
		<tr align="center">
			<td colspan="5" width="125" bgcolor="#F2B9AE">Red</td>
			<td colspan="6" width="150" bgcolor="#B9F2AE">Green</td>
			<td colspan="5" width="125" bgcolor="#CEEBF5">Blue</td>
		</tr>
	</table>
</p>

<p>
	Function to pull out individual color elements of
	<br>the first color entry in the color palette:
	<table bgcolor="#CCCCCC" border="0">
		<tr>
			<td>
				<pre>
<font color="#666666">// C++ Code:
// ifstream file( "Name.VMS" );</font>
void separateColors ( ifstream &file )
{
<font color="#666666">// Buffer to hold a single color</font>
char* bytes = new char[2];

<font color="#666666">// Seek to the start of the pixel data</font>
file.seekg( <font color="#6600BB">0x284</font>, file.beg );

<font color="#666666">// Read in the 16-bits for the color entry</font>
file.read( bytes, 2 );

<font color="#666666">// Set the two read bytes into a single 16-bit value</font>
uint16_t Color16 = (bytes[1] << 8) | (bytes[0] & <font color="#6600BB">0x00FF</font>);

<font color="#666666">// Extract out the individual color components
// using bitmasks and bitwise operators.</font>
uint8_t Red = ( Color16 & <font color="#6600BB">0xF800</font> ) >> 11;
uint8_t Green = ( Color16 & <font color="#6600BB">0x07E0</font> ) >> 5;
uint8_t Blue= Color16 & <font color="#6600BB">0x001F</font>;

<font color="#666666">// Modify the color value to the correct levels</font>
Red = Red << 3;
Green = Green << 2;
Blue= Blue<< 3;

<font color="#666666">// Example of how to convert to 32-bit RGB color</font>
uint32_t Color32 = (Red << 16) | (Green << 8) | Blue;
}
				</pre>
			</td>
		</tr>
	</table>

	<br>

	<table bgcolor="#CCCCCC" border="0">
		<tr>
			<td>
				<pre>
Notes:
The "& <font color="#6600BB">0x00FF</font>" sets bytes[0] as unsigned. Without it, the
operation can overwrite the higher bits with 1's all across
where bytes[1] should be. Alternatively, you can simply
typecast each byte with (uint8_t).

Removing leading 0's such as changing "<font color="#6600BB">0x00FF</font>" to "<font color="#6600BB">0xFF</font>"
or "<font color="#6600BB">0x07E0</font>" to "<font color="#6600BB">0x7E0</font>" has no effect. The leading 0's are
here to aid clarity and visualization.

Although bytes[0] is read in before bytes[1], it is
located in Color16 afterwards. These bytes are reversed
in the file due to being little endian.
				</pre>
			</td>
		</tr>
	</table>
</p>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . "pc_footer.php";
?>
