<?php
    // file_icondata_vms.php

    $pageTitle = "ICONDATA_VMS File";
    $homeDir = "";
    include 'pc_header.php';

?>
          <h1 align="left">ICONDATA_VMS File</h1>

					<p>ICONDATA_VMS is a hidden file that can be stored on a VMS to get a
custom icon for the VMS.  In addition to the monochrome icon displayed
on the VMS screen, you can also have a 16-color icon for the DC file
manager.
					</p>


					<p>The ICONDATA_VMS file contains a small header, a monochrome 32x32 pixel
icon, and optionally a 16-color 32x32 pixel icon.  The header contains
a textual description of the file and two 32bit little endian integers:


						<table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="#6E6E6E">
							<tr bgcolor="#CCCCCC">
								<th>Hex Offset</th>
								<th>Size (bytes)</th>
								<th>Datatype</th>
								<th>Contents</th>
							</tr>
							<tr bgcolor="#CEEBF5">
								<td><pre>0x00</pre></td>
								<td>16</td>
								<td>Text</td>
								<td>Description of file (shown in VMS file menu)</td>
							</tr>
							<tr bgcolor="#FFFFFF">
								<td><pre>0x10</pre></td>
								<td>4</td>
								<td>Integer</td>
								<td>Offset of monochrome icon</td>
							</tr>
							<tr bgcolor="#CEEBF5">
								<td><pre>0x14</pre></td>
								<td>4</td>
								<td>Integer</td>
								<td>Offset of color icon, or 0 if none</td>
							</tr>
						</table>

The offsets are bytes from the beginning of the file.

						<hr>

          	<h3>Monochrome Icon</h3>
The monochrome icon is simply stored as 1024 (32 * 32) consecutive
bits, 1 being black (foreground) and 0 being transparent
(background).  The entire icon data is thus 128 bytes.

						<hr>

          	<h3>Color Icon</h3>
The optional color icon has the same format as a regular VMS file
icon.  Thus, by placing it at offset <code>0x60</code>, it can double as the icon
for the ICONDATA_VMS file itself.  (Not that it really needs an icon,
as it's hidden.)  The icon data starts with 32 bytes palette
information, and following that 512 bytes of pixel data.

						<hr>

          	<h3>Palette</h3>
          	<p>The palette is 32 bytes, consisting of 16 colors. Each color is a 16-bit integer (little endian). The color fields are in the order of Blue, Green, Red and Alpha. Each field is 4-bits and thus a value from 0-15.</p>
						<p>The four fields for each 16-bit integer are set up as such (little endian):
              <table cellpadding="3" cellspacing="1" border="0" bgcolor="#6E6E6E">
                <tr>
                  <td bgcolor="#CCCCCC">15</td><td bgcolor="#CCCCCC">14</td><td bgcolor="#CCCCCC">13</td><td bgcolor="#CCCCCC">12</td>
                  <td bgcolor="#CC9595">11</td><td bgcolor="#CC9595">10</td><td bgcolor="#CC9595">9</td><td bgcolor="#CC9595">8</td>
                  <td bgcolor="#95CCAA">7</td><td bgcolor="#95CCAA">6</td><td bgcolor="#95CCAA">5</td><td bgcolor="#95CCAA">4</td>
                  <td bgcolor="#95B2CC">3</td><td bgcolor="#95B2CC">2</td><td bgcolor="#95B2CC">1</td><td bgcolor="#95B2CC">0</td>
                </tr>
                <tr>
                	<td align="center" colspan="4" bgcolor="#FFFFFF">Alpha</td>
                  <td align="center" colspan="4" bgcolor="#F2B9AE">Red</td>
                  <td align="center" colspan="4" bgcolor="#B9F2AE">Green</td>
                  <td align="center" colspan="4" bgcolor="#CEEBF5">Blue</td>
                </tr>
              </table>
          	Alpha of 15 is fully opaque, alpha of 0 is fully transparent.</p>

          	<hr>

          	<h3>Pixel Data</h3>
The pixel data consists of one nybble per pixel.  Each byte thus
represents two horizontally adjacent pixels, the high nybble being the
left one and the low nybble being the right one.  The entire icon
contains 1024 (32 * 32) nybbles, or 512 bytes.

					</p>


                    <p>Information based on and taken from <a href="http://mc.pp.se/dc/">Dreamcast Programming</a> by Marcus Comstedt</p>
                    <?php
                        $from = "file_icondata_vms.php";
                        include 'pc_footer.php';
                    ?>
