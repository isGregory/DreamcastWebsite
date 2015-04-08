<?php
    // file_vmi.php
    include 'pc_globals.php';
    include 'format.php';

    $pageTitle = "VMI File";
    $homeDir = "";
    include 'pc_header.php';

    $col = "$C1";
?>
    <h1 align="left">.VMI File</h1>
    <br>
    <h3>.VMI File Format</h3>

	<p>A VMI file is used when a <a href="file_vms.php">VMS file</a> (either game or data) is to be retrieved
from a web server.  The VMI file contains extra information about the file
(such as creation date) and names the resource on the web server that
contains the actual VMS file.</p>

	<p>A VMI file is 108 bytes in size, and organized as follows:
        <table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="#6E6E6E">
            <tr bgcolor="#CCCCCC">
                <th colspan="2">Offset</th><th rowspan="2">Size (bytes)</th><th rowspan="2">Datatype</th><th rowspan="2">Contents</th>
            </tr>
            <tr bgcolor="#CCCCCC">
                <th>Byte</th><th>Hex</th>
            </tr>
            <?php
                memoryEntry( '0x00', 4, 'Integer', 'Checksum' );
                memoryEntry( '0x04', 32, 'Text', 'Description' );
                memoryEntry( '0x24', 32, 'Text', 'Copyright' );
                memoryEntry( '0x44', 2, 'Integer', 'Creation Year' );
                memoryEntry( '0x46', 1, 'Integer', 'Creation Month ( 1 - 12 )' );
                memoryEntry( '0x47', 1, 'Integer', 'Creation Day ( 1 - 31 )' );
                memoryEntry( '0x48', 1, 'Integer', 'Creation Hour ( 0 - 23 )' );
                memoryEntry( '0x49', 1, 'Integer', 'Creation Minute ( 0 - 59 )' );
                memoryEntry( '0x4A', 1, 'Integer', 'Creation Second ( 0 - 59 )' );
                memoryEntry( '0x4B', 1, 'Integer', 'Creation Weekday ( 0 = Sunday - 6 = Saturday )' );
                memoryEntry( '0x4C', 2, 'Integer', 'VMI Version ( Set to 0 )' );
                memoryEntry( '0x4E', 2, 'Integer', 'File Number ( Set to 1 )' );
                memoryEntry( '0x50', 8, 'Text', '.VMS Resource Name ( Without the \".VMS\" )' );
                memoryEntry( '0x58', 12, 'Text', 'Filename ( On the VMU )' );
            ?>

			<tr bgcolor="#CEEBF5">
				<td>100</td>
				<td><code>0x64</code></td>
				<td align="center">2</td>
				<td>Integer</td>
				<td>File mode bitfield<br>
                    <table cellpadding="3" cellspacing="1" border="0" bgcolor="#6E6E6E">
                        <tr bgcolor="#CCCCCC">
                            <th width="80">15 ... 2</th><th>1</th><th>0</th>
                        </tr>
                        <tr bgcolor="#FFFFFF">
							<td><i>not used</i></td>
                            <td width="80">GAME<br>
								<code>1 = game<br>
									0 = data</code>
							</td>
							<td>PROTECT<br>
								<code>1 = copy protected<br>
                                    0 = copy ok</code>
							</td>
						</tr>
					</table>
				</td>
			</tr>
            <?php
                memoryEntry( '0x66', 2, 'Integer', '? ( Set to 0 )' );
                memoryEntry( '0x68', 4, 'Integer', 'File size in bytes' );
            ?>
		</table>

Integer fields are stored as little endian binary numbers.  Text fields are
padded with null bytes at the end to the indicated length.  Japanese systems
store Shift-JIS in these fields, whereas western systems use ISO-8859-1
(presumably).</p>

<p>The checksum is formed by anding the first four bytes of the ".VMS
resource name" field (offset <code>0x50</code>) with the numbers
<code>0x53</code>, <code>0x45</code>, <code>0x47</code>, <code>0x41</code> ("SEGA")
respectively.</p>

<p>(Thanks to Loren Peace of
<a href="http://www.booyaka.com/">booyaka.com</a> for filling out a few
blanks.)</p>

<p>Information based on and taken from <a href="http://mc.pp.se/dc/">Dreamcast Programming</a> by Marcus Comstedt</p>

<?php
    $from = "file_vmi.php";
    include 'pc_footer.php';
?>
