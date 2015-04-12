<?php
    // file_icondata_vms.php
    include "pc_globals.php";
    include "format.php";

    $pageTitle = "ICONDATA_VMS File";
    $homeDir = "";
    include 'pc_header.php';

?>
<h1 align="left">ICONDATA_VMS File</h1>

<p>ICONDATA_VMS is a hidden file that can be stored on a VMS to get a
custom icon for the VMS.In addition to the monochrome icon displayed
on the VMS screen, you can also have a 16-color icon for the DC file
manager.
</p>


<p>The ICONDATA_VMS file contains a small header, a monochrome 32x32 pixel
icon, and optionally a 16-color 32x32 pixel icon.The header contains
a textual description of the file and two 32bit little endian integers:


        <?php
            memoryTable();
                memoryEntry( '0x00', 16, 'Text', 'Description of file (shown in VMS file menu)' );
                memoryEntry( '0x10', 4, 'Integer', 'Offset of monochrome icon' );
                memoryEntry( '0x14', 4, 'Integer', 'Offset of color icon, or 0 if none' );
            echo "</table>";
        ?>

    The offsets are bytes from the beginning of the file.

    <hr>

    <h3>Monochrome Icon</h3>
    The monochrome icon is simply stored as 1024 (32 * 32) consecutive
    bits, 1 being black (foreground) and 0 being transparent
    (background).The entire icon data is thus 128 bytes.

    <hr>

    <h3>Color Icon</h3>
    The optional color icon has the same format as a regular VMS file
    icon.Thus, by placing it at offset <code>0x60</code>, it can double as the icon
    for the ICONDATA_VMS file itself.(Not that it really needs an icon,
    as it's hidden.)The icon data starts with 32 bytes palette
    information, and following that 512 bytes of pixel data.

    <hr>

    <h3>Palette</h3>
    <p>The palette is 32 bytes, consisting of 16 colors. Each color is a 16-bit
    integer (little endian). The color fields are in the order of Blue, Green,
    Red and Alpha. Each field is 4-bits and thus a value from 0-15.</p>
    <p>The four fields for each 16-bit integer are set up as such (little endian):
        <?php
            fourColorPalette();
        ?>
    Alpha of 15 is fully opaque, alpha of 0 is fully transparent.</p>

    <hr>

    <h3>Pixel Data</h3>
    The pixel data consists of one nybble per pixel.Each byte thus
    represents two horizontally adjacent pixels, the high nybble being the
    left one and the low nybble being the right one.The entire icon
    contains 1024 (32 * 32) nybbles, or 512 bytes.
</p>


<p>Information based on and taken from <a href="http://mc.pp.se/dc/">
Dreamcast Programming</a> by Marcus Comstedt</p>

<?php
    $from = "file_icondata_vms.php";
    include 'pc_footer.php';
?>
