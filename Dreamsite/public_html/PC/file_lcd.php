<?php
	// file_vmi.php
	require_once 'pc_directories.php';
	require_once $root . 'format.php';

	$pageTitle = "LCD File";
	$homeDir = "";
	include 'pc_header.php';

?>
<h1>.LCD File Format</h1>


<table cellpadding="3" cellspacing="1" border"0">
	<tr>
		<td>
			<table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="<?php echo $tBG; ?>">
				<tr align="center" bgcolor="<?php echo $indexHead; ?>">
					<td>LCD File Overview</td>
				</tr>
				<tr bgcolor="<?php echo $tHead; ?>">
					<td><a href="#head">LCD Header</a><br><pre>16 Bytes</pre></td>
				</tr>
				<tr bgcolor="<?php echo $indexSub; ?>">
					<td><a href="#info">Frame Info</a><br><pre>4 Bytes x Frame Count</pre></td>
				</tr>
				<tr bgcolor="<?php echo $tHead; ?>">
					<td><a href="#data">Frame Data</a><br><pre>1536 Bytes x Frame Count</pre></td>
				</tr>
				<tr bgcolor="<?php echo $indexSub; ?>">
					<td><a href="#copyright">Copyright</a><br><pre>40 Bytes</pre></td>
				</tr>
			</table>
		</td>
		<td>
			<label>
				<br>
				Here is the format of the .LCD file.
				This info is just educated guesses but it is how DC Animator uses the file.<br><br>
				NOTE: All multi-byte numbers are stored in little-endian byte-order.
				<br><br>
				LCD files have the special bonus that they can be embedded in web pages and display icons or play animations on the dreamcast VMU. This was used by certain Sega websites.
				<br><br>
			</label>
		</td>
	</tr>
</table>

<hr>

<p>
	<a id="head"><b>LCD file header</b></a> (16 Bytes)
	<table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th colspan="2">Offset</th><th rowspan="2">Size (bytes)</th><th rowspan="2">Description</th><th rowspan="2">Value</th>
		</tr>
		<tr bgcolor="<?php echo $tHead; ?>">
			<th>Byte</th><th>Hex</th>
		</tr>
		<?php
			memoryEntry( '0x00', 4, 'Signature identifying as .lcd file', '"LCDi"' );
			memoryEntry( '0x04', 2, 'Version Number', '1 ( for Dream Animator 0.5 )' );
			memoryEntry( '0x06', 2, 'Horizontal Resolution', '48 ( Decimal )' );
			memoryEntry( '0x08', 2, 'Vertical Resolution', '32 ( Decimal )' );
			memoryEntry( '0x0A', 2, 'Bit Depth', '1' );
			memoryEntry( '0x0C', 1, 'Reserved?', '0' );
			memoryEntry( '0x0D', 1, 'Repeat Count', '0-254, 255 is forever ( Decimal )' );
			memoryEntry( '0x0E', 2, 'Frame Count', 'Number of Animation Frames' );
		?>
	</table>
</p>

<hr>

<p>
	Each frame's info is 4 bytes. Thus the size of this section is
	4 bytes x Frame Count. Frame info starts at <code>0x10</code>.
	The file lists out the info for all frames before it lists out all
	the frame data.
</p>
<p>
	<a id="info"><b>Frame Info</b></a> (4 Bytes x Frame Count)
	<table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th>Size (bytes)</th><th>Description</th><th>Value</th>
		</tr>
		<?php
			threeEntry( 1, 'Reserved?', '0' );
			threeEntry( 1, 'Delay', 'Time to delay ( In 1/12ths of a second for DC Animator )' );
			threeEntry( 1, 'Reserved?', '0' );
			threeEntry( 1, 'Reserved?', '0' );
		?>
	</table>
</p>

<hr>
<p>
	Each frame's visual data makes up a 48x32 pixel image. Each pixel
	is 1 byte, and thus each frame is 1,536 bytes. Therefore the size
	of this section is 1,536 bytes x Frame Count. The file lists out
	the info for all frames before it lists out all the frame data.
</p>
<p>
	<a id="data"><b>Frame Data</b></a> (1536[48x32] Bytes x Frame Count bytes)
	<table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th>Size (bytes)</th><th>Description</th><th>Value</th>
		</tr>
	<?php
		threeEntry( 1, 'Each Pixel', '<code>0x08</code> is on, <code>0x00</code> is off' );
	?>
	</table>
</p>

<hr>

<p>
	<a id="copyright"><b>Copyright</b></a> (40 bytes)
	<table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr bgcolor="<?php echo $tHead; ?>">
			<th>Size (bytes)</th><th>Description</th><th>Value</th>
		</tr>
		<?php
			threeEntry( 40, 'Copyright', '40 characters making up the program used and the copyright.' );
		?>
	</table>
</p>

<hr>

<p>
	<br>The majority of this information is thanks to
	<a href="http://www.booyaka.com">booyaka.com</a>
</p>
<?php
	$from = "file_lcd.php";
	include 'pc_footer.php';
?>
