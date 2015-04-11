<?php
    // saves_file_example.php
    $homeDir = "../../";
    include $homeDir . "pc_globals.php";
    include $homeDir . "format.php";

    $pageTitle = "Games";
    include $homeDir . "pc_header.php";

    $col = "$C1";

?>

<h1 align="left"><a href="index.php" style="text-decoration:none">Game Name</a></h1>

<table cellpadding="3" cellspacing="1" border"0">
    <tr>
        <td>
            <table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="#6E6E6E">
                <tr align="center" bgcolor="#BBBBBB">
                    <td>Contents</td>
                </tr>
                <tr bgcolor="#CCCCCC">
                    <td><a href="<?php echo $homeDir . $root; ?>file_vms.php">VMS Header</a></td>
                </tr>
                <tr bgcolor="#EEEEEE">
                    <td><a href="#body">Body</a></td>
                </tr>
            </table>
        </td>
        <td>
            <label>
                <br>
                No save information has been mapped for this file yet.
                This is something you can help with! If you're interested
                check out this guide <a href='<?php echo $homeDir; ?>vmu_mapping.php'>HERE</a>
                to get started.
                <br><br>
            </label>
        </td>
    </tr>
</table>

<hr>

<h3 align="left">VMS File <a id="body">Body</a> Contents</h3>

<p>The following is EXAMPLE contents of the body:
    <table cellpadding="3" cellspacing="1" border="0" width="636px" bgcolor="#6E6E6E">
        <tr bgcolor="#CCCCCC">
            <th colspan="2">Offset</th><th rowspan="2">Size (bytes)</th><th rowspan="2">Datatype</th><th rowspan="2" width="400px">Contents</th>
        </tr>
        <tr bgcolor="#CCCCCC">
            <th>Byte</th><th>Hex</th>
        </tr>

        <?php
            memoryEntry( '0x100',  16, 'Text', 'User Name' );
            memoryEntry( '0x110',  32, 'Text', 'Name of Farm' );
            memoryEntry( '0x130',  1, 'Integer', 'User Age' );
            memoryEntry( '0x131',  2, 'Integer', 'User Money' );
        ?>
    </table>
</p>

<?php
    $from = getcwd() . "/saves_file_example.php";
    include $homeDir . "pc_footer.php";
?>
