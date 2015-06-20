<?php
	// file_upload.php

	$pageTitle = "VMU Uploading";
	$homeDir = "";
	include 'pc_header.php';
	include "format.php";

?>

<h1>VMU Downloading</h1>
<p>
	For the dreamcast to recognize a file to be downloaded it needs the
	correct MIME types specified in the "Content-type" of the header.
	Dreamcasts look for a VMI file and then will use that to find the
	corresponding VMS file. However there are MIME types specified for each.
	<br>
	<br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th colspan="2">MIME Types for Dreamcast</th>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center">VMI</td>
			<td><pre>application/x-dreamcast-vms-info</pre></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align="center">VMS</td>
			<td><pre>application/x-dreamcast-vms</pre></td>
		</tr>
	</table>
</p>

<h1>VMU Uploading</h1>

<p>
	Dreamcast webbrowsers look for a special input type called "VMFILE"
	that allow the browser to search for and upload files to the server.
	<br>Example in HTML:
	<table bgcolor="#CCCCCC" align="center" border="0">
		<tr>
			<td>
				<pre>&lt;input type='VMFILE' name='upfile' id='upfile'&gt;</pre>
			</td>
		</tr>
	</table>
</p>

<p>
	Once the browser uploads a file through a "POST" form there will be
	information for a VMI file and an encoded save that need to be
	converted to binary data.
	<br>
	The first line of the submitted content specifies the VMI file. This
	is followed by a blank line and then a long block of encoded data that
	is in 77 character long lines.
</p>

<p>
	Example of the start of a post message of a Sonic Adventure 2 save file:
	<table bgcolor="#CCCCCC" align="center" border="0">
		<tr>
			<td>
				<pre>
filename=SONIC2___S01&fs=9216&bl=18&tp=0&fl=0&of=0&tm=199811270132165

9INT9aZdeIFNEOA5EOA5ENc39M4LEYNYyMyiyNyezeA+EOv59XNJfaZdgXF4EOA5AAAAAAAAAAAAA
AAAAAAAAAYAAAAAAAJR9O...
				</pre>
			</td>
		</tr>
	</table>
	<br>
	To see a full example click
	<a href="example/Example-Upload-File.html">here</a>.
</p>

<h3>Header Section</h3>
<p>
	VMI files are communicated though 7 pairs. All of the pairs are
	separated by '&' characters. Each individual pair is separated
	by '='. The left pair specifies the field and the right is the value.
	<table cellpadding="3" cellspacing="1" border="0" align="center" style="max-width:640px;" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th>Specifier</th><th>Definition</th>
		</tr>
		<?php
			twoEntry("filename", "The name of the file in the VMU.");
			twoEntry("fs", "File size in bytes.");
			twoEntry("bl", "File size in blocks.");
			twoEntry("tp", "Unknown");
			twoEntry("fl", "Unknown");
			twoEntry("of", "Unknown");
			twoEntry("tm", "Date and time the file was saved to the VMU.
							<br>Formated as: YYYYMMDDhhmmssd
							<br>YYYY = Year
							<br>MM   = Month
							<br>DD   = Day
							<br>hh   = Hour
							<br>mm   = Minute
							<br>ss   = Second
							<br>d	= Day of the Week");
		?>
	</table>
</p>

<h3>Data Section</h3>
<p>
	The save data is communicated through Base64 but is also jumbled
	requring a table to convert values before a Base64 Decode is used.
</p>

<p>
	To convert the data to a VMS file one needs to use a conversion table
	on the data, leaving in the new lines and character returns and then
	use a Base64 decode on the string. Then simply save out the resulting
	data to a .VMS file.
</p>

<p>
	The table used for conversion is:
	<table cellpadding="3" cellspacing="1" border="0" align="center" style="max-width:640px; min-width:40%;" bgcolor="#6E6E6E">
		<tr bgcolor="#CCCCCC">
			<th colspan="2">Characters</th><th colspan="2">Hex</th>
		</tr>
		<tr bgcolor="#CCCCCC">
			<th width='25%'>From</th>
			<th width='25%'>To</th>
			<th width='25%'>From</th>
			<th width='25%'>To</th>
		</tr>
		<?php
			convTable('=', '=', 0x3D, 0x3D);
			convTable('+', 'y', 0x2B, 0x79);
			convTable('/', '/', 0x2F, 0x2F);
			convTable('0', '2', 0x30, 0x32);
			convTable('1', '7', 0x31, 0x37);
			convTable('2', '0', 0x32, 0x30);
			convTable('3', 'p', 0x33, 0x50);
			convTable('4', 'l', 0x34, 0x6C);
			convTable('5', 'g', 0x35, 0x67);
			convTable('6', 'M', 0x36, 0x4D);
			convTable('7', 'e', 0x37, 0x65);
			convTable('8', 'r', 0x38, 0x72);
			convTable('9', 'T', 0x2F, 0x2F);
			convTable('A', 'A', 0x2F, 0x2F);
			convTable('B', 'X', 0x2F, 0x2F);
			convTable('C', 's', 0x2F, 0x2F);
			convTable('D', 'Z', 0x2F, 0x2F);
			convTable('9', 'T', 0x39, 0x54);
			convTable('A', 'A', 0x41, 0x41);
			convTable('B', 'X', 0x42, 0x58);
			convTable('C', 's', 0x43, 0x73);
			convTable('D', 'Z', 0x44, 0x5A);
			convTable('E', 'I', 0x45, 0x49);
			convTable('F', 'x', 0x46, 0x78);
			convTable('G', '5', 0x47, 0x35);
			convTable('H', '+', 0x48, 0x2B);
			convTable('I', 'U', 0x49, 0x55);
			convTable('J', 'p', 0x4A, 0x70);
			convTable('K', 'o', 0x4B, 0x6F);
			convTable('L', 'D', 0x4C, 0x44);
			convTable('M', 'k', 0x4D, 0x6B);
			convTable('N', 'F', 0x4E, 0x46);
			convTable('O', 'C', 0x4F, 0x43);
			convTable('P', 'L', 0x50, 0x4C);
			convTable('Q', 'c', 0x51, 0x63);
			convTable('R', 'w', 0x52, 0x77);
			convTable('S', 'Q', 0x53, 0x51);
			convTable('T', 'J', 0x54, 0x4A);
			convTable('U', '4', 0x55, 0x34);
			convTable('V', '1', 0x56, 0x31);
			convTable('W', '9', 0x57, 0x39);
			convTable('X', 'W', 0x58, 0x57);
			convTable('Y', 'E', 0x59, 0x45);
			convTable('Z', 'B', 0x5A, 0x42);
			convTable('a', 'i', 0x61, 0x69);
			convTable('b', 'h', 0x62, 0x68);
			convTable('c', 'N', 0x63, 0x4E);
			convTable('d', 'G', 0x64, 0x47);
			convTable('e', 'S', 0x65, 0x53);
			convTable('f', 'b', 0x66, 0x62);
			convTable('g', 'a', 0x67, 0x61);
			convTable('h', 'Y', 0x68, 0x59);
			convTable('i', 'O', 0x69, 0x4F);
			convTable('j', 'q', 0x6A, 0x71);
			convTable('k', 'z', 0x6B, 0x7A);
			convTable('l', 'f', 0x6C, 0x66);
			convTable('m', 'K', 0x6D, 0x4B);
			convTable('n', 'H', 0x6E, 0x48);
			convTable('o', '6', 0x6F, 0x36);
			convTable('p', 'n', 0x70, 0x6E);
			convTable('q', 'd', 0x71, 0x64);
			convTable('r', 'm', 0x72, 0x6D);
			convTable('s', 'u', 0x73, 0x75);
			convTable('t', 'j', 0x74, 0x6A);
			convTable('u', 't', 0x75, 0x74);
			convTable('v', '8', 0x76, 0x38);
			convTable('w', '3', 0x77, 0x33);
			convTable('x', 'v', 0x78, 0x76);
			convTable('y', 'V', 0x79, 0x56);
			convTable('z', 'R', 0x7A, 0x52);
		?>
	</table>
</p>

<?php
	$from = "file_upload.php";
	include 'pc_footer.php';
?>
