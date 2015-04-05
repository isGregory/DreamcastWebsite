<?php
    //browse.php
    include 'globals.php';

    $p = isset($_GET["p"]) ? $_GET["p"] : false;
    if ($p === false) {
        $p = 1;
    }

    include 'dc_tools.php';

    $pageTitle = "VMU Browse";
    include 'dc_header.php';

    $perPage = 10;

    validateVMIs();

    $filename = "*.[vV][mM][iI]";
    $files = glob( $dirUp . $filename );
    usort( $files, function($a, $b) {
        return filemtime($a) < filemtime($b);
    });

    $numSaves = count( $files );
    $pages = ceil( $numSaves / $perPage );
    if ( $p > $pages ) {
        $p = $pages;
    }
    echo "<p>Click the file name for more information.</p>";
    echo "<p>Click the icon image to download each file.</p>";
    echo "<p align='center'>";
    if ( $p > 1 ) {
        $prev = $p - 1;
        echo "<a href='browse.php?p=$prev'>Page $prev</a>";
        echo "< - - - ";
    }
    echo "Page $p";
    if ( $p < $pages ) {
        $next = $p + 1;
        echo " - - - >";
        echo "<a href='browse.php?p=$next'>Page $next</a>";
    }
    echo "</p>";
?>
<table cellpadding="3" cellspacing="1" border="0" width="100%" bgcolor="#6E6E6E">
    <tr bgcolor="#CCCCCC">
        <th>File</th><th>Blocks</th><th>Date Added</th><th>Icon</th>
    </tr>
    <?php
        $col = $C2;

        $c = 1;
        foreach ( $files as $filefound ) {

            if( $c > $perPage * ($p - 1) && $c < ($perPage * $p) + 1 ) {

                $VMSname = getVMSnamefromVMI( $filefound );
                $VMIfile = end( explode( "/", $filefound ) );

                $vms = new VMS;
                $vms->load( $dirUp . $VMSname );
                $imgName = createVMSicons( $vms );
                $fileDate = date( "g:i:s A<\b\\r>Y-M-d",
                    filemtime( $dirUp . $VMSname ) );
                $blocks = $vms->getBlocks();

                echo "
                <tr bgcolor='" . ac($col) . "'>
                    <td><a href='info.php?s=$VMIfile'>$VMIfile</a></td>
                    <td align='center'>
                        <a href='" . $dirUp . "vmidl.php?id=$VMIfile&t=i'>"
                            . $blocks
                        . "</a>
                    </td>
                    <td align='right'>$fileDate</td>
                    <td align='center'><img src='$imgName'></td>
                </tr>
                ";
            }
            $c += 1;
        }
    ?>
</table>
<?php

    echo "<p align='center'>";
    if ( $p > 1 ) {
        $prev = $p - 1;
        echo "<a href='browse.php?p=$prev'>Page $prev</a>";
        echo "< - - - ";
    }
    echo "Page $p";
    if ( $p < $pages ) {
        $next = $p + 1;
        echo " - - - >";
        echo "<a href='browse.php?p=$next'>Page $next</a>";
    }
    echo "</p>";

    $from = "browse.php";
    include 'dc_footer.php';
?>
