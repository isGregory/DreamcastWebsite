<?php
    // file_vms.php
    include 'pc_globals.php';

    $pageTitle = "VMS File";
    $homeDir = "";
    include 'pc_header.php';

    $col = "$C1";

    function fiveEntry( $one, $two, $three, $four, $five ) {
        echo "
            <tr bgcolor='" . ac($col) . "'>;
                <td>$one</td>
                <td><pre>$two</pre></td>
                <td align='center'>$three</td>
                <td>$four</td>
                <td>$five</td>
            </tr>
        ";
    }

    function memoryEntry( $hex, $size, $type, $contents ) {
        fiveEntry( hexdex( $hex ), $hex, $size, $type, $contents );
    }
?>

          <h1 align="left">.VMS File</h1>

          <table cellpadding="3" cellspacing="1" border"0">
            <tr>
              <td>
                <table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="#6E6E6E">
                  <tr align="center" bgcolor="#BBBBBB">
                    <td>Contents</td>
                  </tr>
                  <tr bgcolor="#CCCCCC">
                    <td><a href="#head">VMS Header</a></td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
                    <td><a href="#calc">CRC Calculation</a></td>
                  </tr>
                  <tr bgcolor="#CCCCCC">
                    <td><a href="#ipal">Icon Palette</a></td>
                  </tr>
                  <tr bgcolor="#EEEEEE">
                    <td><a href="#ibit">Icon Bitmaps</a></td>
                  </tr>
                  <tr bgcolor="#CCCCCC">
                    <td><a href="#eyecatch">Graphic Eyecatch</a></td>
                  </tr>
                </table>
              </td>
              <td>
                <label>
                  <br>
                  Here is the format of the .VMS file.
                  <br><br>
                  VMS files are the dreamcast save files for games. They set out a standard header which specifies how the rest of the file will go. Following the header is the actual game data, which is saved in a format specified by the developer.
                  <br><br>
                </label>
              </td>
            </tr>
          </table>

          <hr>

          <br>
          <h3>VMS File <a id="head">Header</a> Format</h3>

          <p>All VMS files should contain a standard header which is used by the file
managers in the VMS and in the DC boot ROM to display information about
the file.  (<a href="file_icondata_vms.html">ICONDATA</a> files use a somewhat
simplified headers since they are not shown in the DC boot ROM file manager.)
For data files, the header is stored at the very beginning of the file.
For VMU game files, it begins in the <i>second</i> block of the file (offset <code>0x200</code>).
This fact should be reflected by the header offset field in the VMS
directory, which should contain 1 for VMU game files, and 0 for data files.</p>

          <p>The following is the contents of the header:
            <table cellpadding="3" cellspacing="1" border="0" style="max-width:640px;" bgcolor="#6E6E6E">
              <tr bgcolor="#CCCCCC">
                <th colspan="2">Offset</th><th rowspan="2">Size (bytes)</th><th rowspan="2">Datatype</th><th rowspan="2">Contents</th>
              </tr>
              <tr bgcolor="#CCCCCC">
                <th>Byte</th><th>Hex</th>
              </tr>
            <?php
                memoryEntry( '0x00', 16, 'Text', 'Description of file (shown in VMS file menu)' );
                memoryEntry( '0x10', 32, 'Text', 'Description of file (shown in DC boot ROM file manager)' );
                memoryEntry( '0x30', 16, 'String', 'Identifier of application that created the file' );
                memoryEntry( '0x40',  2, 'Integer', 'Number of icons (&gt;1 for animated icons; max 3)' );
                memoryEntry( '0x42',  2, 'Integer', 'Icon animation speed<br>
                    Time between each frame is ~33ms x Animation Speed' );
                memoryEntry( '0x44',  2, 'Integer', '<a href="#eyecatch">Graphic eyecatch</a> type (0 = none)' );
                memoryEntry( '0x46',  2, 'Integer', 'CRC (Ignored for game files.)' );
                memoryEntry( '0x48',  4, 'Integer', 'Number of bytes of actual file data following header, icon(s) and graphic eyecatch.  (Ignored for game files.)' );
                memoryEntry( '0x4C', 20, '', 'Reserved (fill with zeros)' );
                memoryEntry( '0x60', 32, 'Integer', 'Icon palette (16 16-bit integers)' );
                memoryEntry( '0x80', '512*n', 'Nybbles', 'Icon bitmaps. n = Number of Icons (<code>0x40</code>)' );
                memoryEntry( '...', 'depends on type', '...', 'Graphic eyecatch palette and bitmap' );
            ?>
            </table>
          </p>
          <br>

          <!-- Table for Notes -->
          <table cellpadding="3" cellspacing="1" border="0" bgcolor="#6E6E6E">
            <tr bgcolor="#CCCCCC">
              <th colspan="2">Notes</th>
            </tr>

            <tr bgcolor="#CEEBF5">
              <td>Text fields</td>
              <td>are padded with space (<code>0x20</code>).</td>
            </tr>
            <tr bgcolor="#FFFFFF">
              <td bgcolor="#FFFFFF">String fields</td>
              <td bgcolor="#FFFFFF">are padded with NUL (<code>0x00</code>).</td>
            </tr>
            <tr bgcolor="#CEEBF5">
              <td>Integer fields</td>
              <td>are little endian.</td>
            </tr>
          </table>

          <hr>
          <h3><a id="calc">Cyclic Redundancy Check (CRC) Calculation</a></h3>
          <p>The CRC should be computed on the entire file, including header and data
payload, but excluding any padding in the final block.  When calcukating
the CRC, set the CRC field itself to 0 to avoid miscalculating the CRC for
the header.</p>

          <p>The CRC calculation algorithm is as follows (C code):
            <table bgcolor="#CCCCCC" border="0">
              <tr>
                <td>
                  <pre>
int calcCRC(const unsigned char *buf, int size)
{
  int i, c, n = 0;
  for (i = 0; i &lt; size; i++)
  {
    n ^= (buf[i]&lt;&lt;8);
    for (c = 0; c &lt; 8; c++)
    {
      if (n &amp; 0x8000) {
        n = (n &lt;&lt; 1) ^ 4129;
      } else {
        n = (n &lt;&lt; 1);
      }
    }
  }
  return n &amp; 0xffff;
}
                  </pre>
                </td>
              </tr>
            </table>
          </p>

          <hr>
          <h3><a id="ipal">Icon Palette</a></h3>
          <p>The palette is 32 bytes, consisting of 16 colors. Each color is a 16-bit integer (little endian). The color fields are in the order of Blue, Green, Red and Alpha. Each field is 4-bits and thus a value from 0-15.</p>
          <p>The four fields for each 16-bit integer are set up as such:
            <table cellpadding="3" cellspacing="1" border="0" bgcolor="#6E6E6E">
              <tr align="center">
                <td bgcolor="#CCCCCC">15</td><td bgcolor="#CCCCCC">14</td><td bgcolor="#CCCCCC">13</td><td bgcolor="#CCCCCC">12</td>
                <td bgcolor="#CC9595">11</td><td bgcolor="#CC9595">10</td><td bgcolor="#CC9595">9</td><td bgcolor="#CC9595">8</td>
                <td bgcolor="#95CCAA">7</td><td bgcolor="#95CCAA">6</td><td bgcolor="#95CCAA">5</td><td bgcolor="#95CCAA">4</td>
                <td bgcolor="#95B2CC">3</td><td bgcolor="#95B2CC">2</td><td bgcolor="#95B2CC">1</td><td bgcolor="#95B2CC">0</td>
              </tr>
              <tr align="center">
                <td colspan="4" width="100" bgcolor="#FFFFFF">Alpha</td>
                <td colspan="4" width="100" bgcolor="#F2B9AE">Red</td>
                <td colspan="4" width="100" bgcolor="#B9F2AE">Green</td>
                <td colspan="4" width="100" bgcolor="#CEEBF5">Blue</td>
              </tr>
            </table>
          Alpha of 15 is fully opaque, alpha of 0 is fully transparent.</p>

          <p>Function to pull out individual color elements of
            <br>the first color entry in the color palette:
            <table bgcolor="#CCCCCC" border="0">
              <tr>
                <td>
                  <pre>
<font color="#666666">// C++ Code:
// ifstream file( "Name.VMS" );</font>
void separateColors( ifstream &file )
{
  <font color="#666666">// Buffer to hold a single color</font>
  char* bytes = new char[2];

  <font color="#666666">// Seek to the start of the color palette</font>
  file.seekg( <font color="#6600BB">0x60</font>, file.beg );

  <font color="#666666">// Read in the 16bits for the color entry</font>
  file.read( bytes, 2 );

  <font color="#666666">// Separate out each individual color</font>
  uint8_t Alpha = ( bytes[1] >> 4 ) & <font color="#6600BB">0x0F</font>;
  uint8_t Red   =   bytes[1] & <font color="#6600BB">0x0F</font>;
  uint8_t Green = ( bytes[0] >> 4 ) & <font color="#6600BB">0x0F</font>;
  uint8_t Blue  =   bytes[0] & <font color="#6600BB">0x0F</font>;

  <font color="#666666">// Modify the color value to the correct levels</font>
  Red   = Red   << 4;
  Green = Green << 4;
  Blue  = Blue  << 4;

  <font color="#666666">// Example of how to convert to 32-bit RGB color</font>
  uint32_t Color32 = (Red << 16) | (Green << 8) | Blue;
}
                  </pre>
                </td>
              </tr>
            </table>
          </p>

          <hr>
          <h3><a id="ibit">Icon Bitmaps</a></h3>
          <p>The header should contain at least one icon bitmap for the file. If an
animated icon is desired, up to three bitmaps can be used (set the field at
offset <code>0x40</code> accordingly). The bitmaps are stored directly after each other,
starting at offset <code>0x80</code>.</p>
          <p>The bitmaps contain one nybble per pixel. Each byte thus
represents two horizontally adjacent pixels (the high nybble being the
left one and the low nybble being the right one). Each complete bitmap
contains 1024 (32 * 32) nybbles, or 512 bytes.</p>

          <hr>
          <h3><a id="eyecatch">Graphic Eyecatch</a></h3>
          <p>The header can optionally contain a 72 x 56 pixel image shown as a graphic
eyecatch for the file in the DC boot ROM file manager. The graphic data
for the eyecatch is stored immediately after the last icon bitmap.</p>

          <p>For examples see <a href="file_vms_eyecatch.html">here</a>.</p>

          <p>There are four possible visual modes, selected with the field at offset <code>0x44</code>:
            <table cellpadding="3" cellspacing="1" border="0" bgcolor="#6E6E6E" style="max-width:640px;">
              <tr bgcolor="#CCCCCC">
                <th rowspan="2">Mode</th><th colspan="3">Size (bytes)</th><th rowspan="2">Data format</th>
              </tr>
              <tr bgcolor="#CCCCCC">
                <th>Total</th><th>Palette</th><th>Bitmap</th>
              </tr>
                <?php
                fiveEntry( 0, 0, 0, 0, 'None' );
                fiveEntry( 1, 8064, 0, 8064, '16-bit true color, see Icon palette for pixel format.' );
                fiveEntry( 2, 4544, 512, 4032, '256 color palette based.  Begins with a palette in the same format as the Icon palette, but with 256 entries.  Then the bitmap has one byte per pixel, giving the index into the palette.' );
                fiveEntry( 3, 2048, 32, 2016, '16 color palette based.  Format is just like the Icon palette and bitmap, except for the width and height of the bitmap of course.' );
                ?>
            </table>
          </p>

<?php
    $from = "file_vms.php";
    include 'pc_footer.php';
?>
