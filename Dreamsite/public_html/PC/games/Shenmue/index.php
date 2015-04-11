<?php
    // index.php
    $homeDir = "../../";
    include $homeDir . "pc_globals.php";
    include $homeDir . "format.php";

    $pageTitle = "Shenmue";
    include $homeDir . "pc_header.php";

    $col = "$C1";

?>
          <h1 align="left">Shenmue</h1>

          <table cellpadding="3" cellspacing="1" border"0">
            <tr>
              <td>
                <table cellpadding="3" cellspacing="1" border="0" width="150" bgcolor="#6E6E6E">
                  <tr align="center" bgcolor="#BBBBBB">
                    <td><b>Contents</b></td>
                  </tr>
                  <tr align="center" bgcolor="#DDDDDD">
                    <td>Files</td>
                  </tr>
                  <tr bgcolor="#CEEBF5">
                    <td><a href="#save">Game Saves</a></td>
                  </tr>
                  <tr align="center" bgcolor="#DDDDDD">
                    <td>Websites</td>
                  </tr>
                  <tr bgcolor="#FFFFFF">
                    <td><a href="#gweb">Passport</a></td>
                  </tr>
                </table>
              </td>
              <td>
                <label>
                  <br>
                  Here is some quick information about this game. Be sure to
                  push the content of this paragraph over the limit of a single
                  line or it will look funny.
                  <br><br>
                </label>
              </td>
            </tr>
          </table>

          <hr>

          <p><h3 align="left"><u><a id="save">Game Saves</a></u></h3>
            <p align="left">There is only one save file for this game which holds 3 save slots.
              </p>
            <table align="center" cellpadding="3" cellspacing="1" border="0" width="90%" bgcolor="#6E6E6E">
              <tr bgcolor="#CCCCCC">
                <th width="100px">Name</th><th width="65px">Size<br>(Blocks)</th><th>Description</th><th width="34px">Icon</th>
              </tr>

              <tr bgcolor="#CEEBF5">
                <td align="center"><a href="saves_file.html" style="text-decoration:none">Main Data</a></td>
                <td align="center">80</td>
                <td>Save file for the main game data.</td>
                <td align="center"><img src="images/saves/GAME.gif"></td>
              </tr>
            </table>
          </p>

          <hr>

          <p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
            <p align="left">These are websites that are accessable through
            the Passport included as Disk 4.
            <table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:600px;max-width:640px;" bgcolor="#6E6E6E">
              <tr>
                <th align="center" bgcolor="#CCCCCC">Site</th><th align="center" bgcolor="#CCCCCC">URL</th><th align="center" bgcolor="#CCCCCC">Link</th>
              </tr>
              <tr bgcolor="#A6FFB2">
                <td>USA Site</td>
                <td align="right"><code>passport.shenmue.com</code></td>
                <td align="center"><code><a href="passport.shenmue.com">Link</a></code></td>
              </tr>
            </table>
          </p>

          <?php
              $from = getcwd() . "/index.php";
              include $homeDir . "pc_footer.php";
          ?>
