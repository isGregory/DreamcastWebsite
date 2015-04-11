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
            <table cellpadding="3" cellspacing="1" border="0" width="636px" bgcolor="#6E6E6E">
              <tr bgcolor="#CCCCCC">
                <th colspan="2">Offset</th><th rowspan="2">Size (bytes)</th><th rowspan="2">Datatype</th><th rowspan="2" width="400px">Contents</th>
              </tr>
              <tr bgcolor="#CCCCCC">
                <th>Byte</th><th>Hex</th>
              </tr>


              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x00</pre></td>
                <td align="center">1664</td>
                <td>Bytes</td>
                <td><a href="../../file_vms.html">Header</a> with 3-frame animated icon.</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>1664</td>
                <td><pre>0x680</pre></td>
                <td align="center">32</td>
                <td>Bytes</td>
                <td>Unknown</span></td>
              </tr>
              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">Start "Resume" - Save File Times</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x700</pre></td>
                <td align="center">2</td>
                <td>Integer</td>
                <td>SaveTime - Year <span style="float:right;">( 4 Digit Year - ie 1998 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x702</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x703</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x704</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x705</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x706</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x707</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>

              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x708</pre></td>
                <td align="center">1-2?</td>
                <td>Integer</td>
                <td>GameTime - Year <span style="float:right;">( Starting with 86 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x70A</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x70B</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x70C</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x70D</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x70E</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x70F</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x710</pre></td>
                <td align="center">8</td>
                <td>Bytes</td>
                <td>Unknown</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x718</pre></td>
                <td align="center">4</td>
                <td>Text</td>
                <td>Entry Point?</td>
              </tr>
              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">End "Resume" - Save File Times</td>
              </tr>

              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x71C</pre></td>
                <td align="center">36</td>
                <td>Bytes</td>
                <td>Unknown</td>
              </tr>

              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">Start Slot 1 - Save File Times</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x740</pre></td>
                <td align="center">2</td>
                <td>Integer</td>
                <td>SaveTime - Year <span style="float:right;">( 4 Digit Year - ie 1998 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x742</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x743</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x744</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x745</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x746</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x747</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>

              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x748</pre></td>
                <td align="center">1-2?</td>
                <td>Integer</td>
                <td>GameTime - Year <span style="float:right;">( Starting with 86 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x74A</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x74B</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x74C</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x74D</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x74E</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x74F</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x750</pre></td>
                <td align="center">8</td>
                <td>Bytes</td>
                <td>Unknown</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x758</pre></td>
                <td align="center">4</td>
                <td>Text</td>
                <td>Entry Point?</td>
              </tr>
              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">End Slot 1 - Save File Times</td>
              </tr>

              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x75C</pre></td>
                <td align="center">36</td>
                <td>Bytes</td>
                <td>Unknown</td>
              </tr>

              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">Start Slot 2 - Save File Times</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x780</pre></td>
                <td align="center">2</td>
                <td>Integer</td>
                <td>SaveTime - Year <span style="float:right;">( 4 Digit Year - ie 1998 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x782</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x783</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x784</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x785</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x786</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x787</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>

              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x788</pre></td>
                <td align="center">1-2?</td>
                <td>Integer</td>
                <td>GameTime - Year <span style="float:right;">( Starting with 86 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x78A</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x78B</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x78C</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x78D</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x78E</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x78F</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x790</pre></td>
                <td align="center">8</td>
                <td>Bytes</td>
                <td>Unknown</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x798</pre></td>
                <td align="center">4</td>
                <td>Text</td>
                <td>Entry Point?</td>
              </tr>
              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">End Slot 2 - Save File Times</td>
              </tr>

              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x79C</pre></td>
                <td align="center">36</td>
                <td>Bytes</td>
                <td>Unknown</td>
              </tr>

              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">Start Slot 3 - Save File Times</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C0</pre></td>
                <td align="center">2</td>
                <td>Integer</td>
                <td>SaveTime - Year <span style="float:right;">( 4 Digit Year - ie 1998 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C2</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C3</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C4</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C5</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C6</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C7</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>SaveTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>

              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7C8</pre></td>
                <td align="center">1-2?</td>
                <td>Integer</td>
                <td>GameTime - Year <span style="float:right;">( Starting with 86 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7CA</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Month <span style="float:right;">( 1 - 12 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7CB</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Month <span style="float:right;">( 1 - 31 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7CC</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Hours <span style="float:right;">( 0 - 23 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7CD</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Minutes <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7CE</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Seconds <span style="float:right;">( 0 - 59 )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7CF</pre></td>
                <td align="center">1</td>
                <td>Integer</td>
                <td>GameTime - Day of Week <span style="float:right;">( 0 = sunday - 6 = saturday )</span></td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7D0</pre></td>
                <td align="center">8</td>
                <td>Bytes</td>
                <td>Unknown</td>
              </tr>
              <tr bgcolor="#FFFFFF">
                <td>0</td>
                <td><pre>0x7D8</pre></td>
                <td align="center">4</td>
                <td>Text</td>
                <td>Entry Point?</td>
              </tr>
              <tr bgcolor="#E0E0E0">
                <td colspan="5" align="center">End Slot 3 - Save File Times</td>
              </tr>

              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x818</pre></td>
                <td align="center">2 - 4?</td>
                <td>Integer</td>
                <td>Resume - Money</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x1000</pre></td>
                <td align="center">2?</td>
                <td>Integer</td>
                <td>Resume - Number of Saves</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x19FF</pre></td>
                <td align="center">2?</td>
                <td>Integer</td>
                <td>Resume - Saves not in slot 2? (Starting at 0)</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x1B8C</pre></td>
                <td align="center">2?</td>
                <td>Integer</td>
                <td>Resume - Number of Collectables (Sonic the Hedgehog?)</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x2018</pre></td>
                <td align="center">2 - 4?</td>
                <td>Integer</td>
                <td>Slot 1 - Money</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x3818</pre></td>
                <td align="center">2 - 4?</td>
                <td>Integer</td>
                <td>Slot 2 - Money</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x5018</pre></td>
                <td align="center">2 - 4?</td>
                <td>Integer</td>
                <td>Slot 3 - Money</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x6800</pre></td>
                <td align="center">2?</td>
                <td>Integer</td>
                <td>Total - Number of Saves</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x71FF</pre></td>
                <td align="center">2?</td>
                <td>Integer</td>
                <td>Total - Number of Saves Not in Slot 2? (Starting at 0)</td>
              </tr>
              <tr bgcolor="#CEEBF5">
                <td>256</td>
                <td><pre>0x738C</pre></td>
                <td align="center">2?</td>
                <td>Integer</td>
                <td>Total - Number of Collectables (Sonic the Hedgehog?)</td>
              </tr>
            </table>
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
</pre></p>
<?php
    $from = getcwd() . "/saves_file.php";
    include $homeDir . "pc_footer.php";
?>
