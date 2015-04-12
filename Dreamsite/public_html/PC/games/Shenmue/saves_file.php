<?php
    // saves_file.php
    $homeDir = "../../";
    include $homeDir . "pc_globals.php";
    include $homeDir . "format.php";

    $pageTitle = "Shenmue - Save File";
    include $homeDir . "pc_header.php";

    $col = "$C1";

?>
<h1 align="left"><a href="index.html" style="text-decoration:none">Shenmue</a></h1>

<table cellpadding="3" cellspacing="1" border"0">
    <tr>
        <td>
            <table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="#6E6E6E">
                <tr align="center" bgcolor="#BBBBBB">
                    <td>Contents</td>
                </tr>
                <tr bgcolor="#CCCCCC">
                    <td><a href="../../file_vms.html">VMS Header</a></td>
                </tr>
                <tr bgcolor="#EEEEEE">
                    <td><a href="#body">Body</a></td>
                </tr>
            </table>
        </td>
        <td>
            <label>
                <br>
                Very little save information has been mapped for this file so
                far. This is something you can help with! If you're interested
                check out this guide <a href="../../vmu_mapping.html">HERE</a>
                to get started.
                <br><br>
            </label>
        </td>
    </tr>
</table>

<hr>

<h3 align="left">VMS File <a id="body">Body</a> Contents</h3>

<p>
    <?php
        memoryTable();
            memoryEntry( '0x00', 1664, 'Bytes', '<a href="../../file_vms.html">Header</a> with 3-frame animated icon.' );
            memoryEntry( '0x680', 32, 'Bytes', 'Unknown' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>Start \"Resume\" - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x700', 2, 'Integer', 'SaveTime - Year <span style=\"float:right;\">( 4 Digit Year - ie 1998 )</span>' );
            memoryEntry( '0x702', 1, 'Integer', 'SaveTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x703', 1, 'Integer', 'SaveTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x704', 1, 'Integer', 'SaveTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x705', 1, 'Integer', 'SaveTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x706', 1, 'Integer', 'SaveTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x707', 1, 'Integer', 'SaveTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );

            memoryEntry( '0x708', '1-2?', 'Integer', 'GameTime - Year <span style=\"float:right;\">( Starting with 86 )</span>' );
            memoryEntry( '0x70A', 1, 'Integer', 'GameTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x70B', 1, 'Integer', 'GameTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x70C', 1, 'Integer', 'GameTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x70D', 1, 'Integer', 'GameTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x70E', 1, 'Integer', 'GameTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x70F', 1, 'Integer', 'GameTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );
            memoryEntry( '0x710', 8, 'Bytes', 'Unknown' );
            memoryEntry( '0x718', 4, 'Text', 'Entry Point?' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>End \"Resume\" - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x71C', 36, 'Bytes', 'Unknown' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>Start Slot 1 - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x740', 2, 'Integer', 'SaveTime - Year <span style=\"float:right;\">( 4 Digit Year - ie 1998 )</span>' );
            memoryEntry( '0x742', 1, 'Integer', 'SaveTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x743', 1, 'Integer', 'SaveTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x744', 1, 'Integer', 'SaveTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x745', 1, 'Integer', 'SaveTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x746', 1, 'Integer', 'SaveTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x747', 1, 'Integer', 'SaveTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );

            memoryEntry( '0x748', '1-2?', 'Integer', 'GameTime - Year <span style=\"float:right;\">( Starting with 86 )</span>' );
            memoryEntry( '0x74A', 1, 'Integer', 'GameTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x74B', 1, 'Integer', 'GameTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x74C', 1, 'Integer', 'GameTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x74D', 1, 'Integer', 'GameTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x74E', 1, 'Integer', 'GameTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x74F', 1, 'Integer', 'GameTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );
            memoryEntry( '0x750', 8, 'Bytes', 'Unknown' );
            memoryEntry( '0x758', 4, 'Text', 'Entry Point?' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>End Slot 1 - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x75C', 36, 'Bytes', 'Unknown' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>Start Slot 2 - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x780', 2, 'Integer', 'SaveTime - Year <span style=\"float:right;\">( 4 Digit Year - ie 1998 )</span>' );
            memoryEntry( '0x782', 1, 'Integer', 'SaveTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x783', 1, 'Integer', 'SaveTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x784', 1, 'Integer', 'SaveTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x785', 1, 'Integer', 'SaveTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x786', 1, 'Integer', 'SaveTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x787', 1, 'Integer', 'SaveTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );

            memoryEntry( '0x788', '1-2?', 'Integer', 'GameTime - Year <span style=\"float:right;\">( Starting with 86 )</span>' );
            memoryEntry( '0x78A', 1, 'Integer', 'GameTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x78B', 1, 'Integer', 'GameTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x78C', 1, 'Integer', 'GameTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x78D', 1, 'Integer', 'GameTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x78E', 1, 'Integer', 'GameTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x78F', 1, 'Integer', 'GameTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );
            memoryEntry( '0x790', 8, 'Bytes', 'Unknown' );
            memoryEntry( '0x798', 4, 'Text', 'Entry Point?' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>End Slot 2 - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x79C', 36, 'Bytes', 'Unknown' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>Start Slot 3 - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x7C0', 2, 'Integer', 'SaveTime - Year <span style=\"float:right;\">( 4 Digit Year - ie 1998 )</span>' );
            memoryEntry( '0x7C2', 1, 'Integer', 'SaveTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x7C3', 1, 'Integer', 'SaveTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x7C4', 1, 'Integer', 'SaveTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x7C5', 1, 'Integer', 'SaveTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x7C6', 1, 'Integer', 'SaveTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x7C7', 1, 'Integer', 'SaveTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );

            memoryEntry( '0x7C8', '1-2?', 'Integer', 'GameTime - Year <span style=\"float:right;\">( Starting with 86 )</span>' );
            memoryEntry( '0x7CA', 1, 'Integer', 'GameTime - Month <span style=\"float:right;\">( 1 - 12 )</span>' );
            memoryEntry( '0x7CB', 1, 'Integer', 'GameTime - Day of Month <span style=\"float:right;\">( 1 - 31 )</span>' );
            memoryEntry( '0x7CC', 1, 'Integer', 'GameTime - Hours <span style=\"float:right;\">( 0 - 23 )</span>' );
            memoryEntry( '0x7CD', 1, 'Integer', 'GameTime - Minutes <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x7CE', 1, 'Integer', 'GameTime - Seconds <span style=\"float:right;\">( 0 - 59 )</span>' );
            memoryEntry( '0x7CF', 1, 'Integer', 'GameTime - Day of Week <span style=\"float:right;\">( 0 = sunday - 6 = saturday )</span>' );
            memoryEntry( '0x7D0', 8, 'Bytes', 'Unknown' );
            memoryEntry( '0x7D8', 4, 'Text', 'Entry Point?' );

            echo "
                <tr bgcolor='#E0E0E0'>
                <td colspan='5' align='center'>End Slot 3 - Save File Times</td>
                </tr>
            ";

            memoryEntry( '0x818', '2-4?', 'Integer', 'Resume - Money' );
            memoryEntry( '0x1000', '2?', 'Integer', 'Resume - Number of Times Saved' );
            memoryEntry( '0x19FF', '2?', 'Integer', 'Resume - Saves not in slot 2? (Starting at 0)' );
            memoryEntry( '0x1B8C', '2?', 'Integer', 'Resume - Number of Collectables (Sonic the Hedgehog?)' );
            memoryEntry( '0x2018', '2-4?', 'Integer', 'Slot 1 - Money' );
            memoryEntry( '0x3818', '2-4?', 'Integer', 'Slot 2 - Money' );
            memoryEntry( '0x5018', '2-4?', 'Integer', 'Slot 3 - Money' );
            memoryEntry( '0x6800', '2?', 'Integer', 'Total - Number of Times Saved' );
            memoryEntry( '0x71FF', '2?', 'Integer', 'Total - Number of Saves Not in Slot 2? (Starting at 0)' );
            memoryEntry( '0x738C', '2?', 'Integer', 'Total - Number of Collectables (Sonic the Hedgehog?)' );
        echo "</table>";
    ?>
</p>

<p>
    <pre>
Thanks to: <br>http://www.shenmuedojo.net/forum/viewtopic.php?f=3&t=43133<br>
Disc 1 Scenes


All Scene 01 and Entry 01

JD00 - Sakuragaoka (In middle of sakuragaoka at 1/1)
JD99 - Sakuragaoka Beta (0,1,2 hangs)
JU00 - Yamanose (1/1 being coming from the Hazuki residence)
JU99 - Yamanose Beta (Enter 0,1,2 hangs)
OP00 - Opening scene (Intro at 1/1)
OP02 - Intro with shenhua (at 1/1)
MO99 - Warehouse No. 8 (Beta? at 1/1)
MK99 - Old Warehouse district (Beta? No guards at 1/1)
MF99 - In front of old warehouse district (Beta? Glitched a bit)
DYKZ - Nagai Industries
DURN - Lapis Fortune teller
DTKY - Maeda Barber shop
DSUS - Takara Sushi
DSLT - Slot House
DSLI - Linda
DSKI - Global Travel Agency
DSBA - Yamaji Soba Noodles
DRSA - Russiya China shop
DRME - Manpukuken Ramen
DRHT - Liu Barber and Hair salon
DPIZ - Bob's Pizzeria
DNOZ - Nozomi Crying Cutscene
DMAJ - Daisangen (Mahjongg Parlor)
DKTY - Antique shop
DKPA - Nana's Karaoke Bar
DJAZ - MJQ Jazz Bar
DHQB - Heart beats (Beta? Cutscene? Crashes!)
DGCT - Game You Arcade
DCHA - Ajiichi Chinese Restaurant
DCBN - Tomato COnvenience Store
DBYO - Bar Yokosuka
DBHB - Heart Beats
DAZA - Asia Travel Company
D000 - Dobuita
BETD - Bad ending cutscene (Enter 0)
0000 - Test area (quite empty)
YG14 - Crashes
YD8S - Goro distraction cutscene (Enter 0)
YD01 - Cherry tree Iwao Fight Flashback
VEND - Crashes (Vending machine scene i guess)
TOKI - Russiya China shop (Cutscene? Hangs!)
TATQ - Tatoo Parlor
JABE - Abe Store (little baby ryo)
FREE - Crashes (Not really a scene folder)
JOMO - Ryo's Room
JHD0 - Hazuki Residence (outside)


Disc 2

All Scene 02

ARAR - Asia Travel Company Cutscene
GMCT - You arcade cutscene
MFSY - New Yokosuka harbor
MK80 - Translate Scroll cutscene
MKSG - old warehouse district
MKYU - Harbor Lounge
MS08 - Warehouse No 8
MS8A - Warehouse No 8
MS8S - Warehouse No 8
YDB1 - Hazuki Residence Basement


Disc 3

All scene 03

NBIK - Motorcycle (0 - Saved Nozo
    </pre>
</p>

<?php
    $from = getcwd() . "/saves_file.php";
    include $homeDir . "pc_footer.php";
?>
