<?php
    // index.php for games/
    $homeDir = "../";
    include $homeDir . "pc_globals.php";
    include $homeDir . "format.php";

    $pageTitle = "Games";
    include $homeDir . "pc_header.php";

    $col = "$C1";

?>
<h1 align="left">Dreamcast Games</h1>
<p>Here are a list of games with information currently.</p>

<p><br>
  <table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:400px;max-width:640px;" bgcolor="#6E6E6E">
    <tr>
      <th bgcolor="#CCCCCC">Game</th>
    </tr>

    <?php
    echo "
    <tr bgcolor='" . ac( $col ) . "'>
      <td align='center'><a href='$dSA2/index.php' style='text-decoration:none'>Sonic Adventure 2</a></td>
    </tr>
    <tr bgcolor='" . ac( $col ) . "'>
      <td align='center'><a href='$dShen/index.php' style='text-decoration:none'>Shenmue</a></td>
    </tr>
    <tr bgcolor='" . ac( $col ) . "'>
      <td align='center'><a href='$dPSOv2/index.php' style='text-decoration:none'>Phantasy Star Online</a></td>
    </tr>
    <tr bgcolor='" . ac( $col ) . "'>
      <td align='center'><a href='$dJGR/index.php' style='text-decoration:none'>Jet Grind Radio</a></td>
    </tr>
    <tr bgcolor='" . ac( $col ) . "'>
      <td align='center'><a href='$d4X4/index.php' style='text-decoration:none'>4x4 Evolution</a></td>
    </tr>
    <tr bgcolor='" . ac( $col ) . "'>
      <td align='center'><a href='Default/index.php' style='text-decoration:none'>Default</a></td>
    </tr>
    ";
    ?>
  </table>
</p>

<?php
    $from = "index.php";
    include $homeDir . "pc_footer.php";
?>
