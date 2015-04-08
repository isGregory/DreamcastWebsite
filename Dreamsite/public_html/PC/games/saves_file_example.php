<?php
    // saves_file_example.php
    $homeDir = "../";
    include $homeDir . "pc_globals.php";
    include $homeDir . "format.php";

    $pageTitle = "Games";
    include $homeDir . "pc_header.php";

    $col = "$C1";

?>
          <h1 align="left"><a href="index.html" style="text-decoration:none">Jet Grind Radio</a></h1>

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
                  No save information has been mapped for this file yet.
                    This is something you can help with! If you're interested
                    check out this guide <a href="../../vmu_mapping.html">HERE</a>
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

              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x100</pre></td>
                <td align="center">16</td>
                <td>Text</td>
                <td>User Name</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>272</td>
                <td><pre>0x110</pre></td>
                <td align="center">32</td>
                <td>Text</td>
                <td>Name of Farm</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>304</td>
                <td><pre>0x130</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>User Age</td>
              </tr>
            </table>
          </p>

        </tr>

        <tr bgcolor="#CCCCCC">
          <td align="center">
            <font size="1">
              <br>
              Last modified: 2015-2-5 10:40 PM EST<br>
              Design Copyright &copy; 2015 Gregory Hoople<br>
              <br>
            </font>
          </td>
        </tr>
      </table>
    </font>
  </body>
</html>
