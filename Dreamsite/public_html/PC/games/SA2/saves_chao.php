<?php
	// saves_chao.php
	$homeDir = "../../";
	require_once $homeDir . 'pc_directories.php';
	require_once $root . 'format.php';

	$pageTitle = "Sonic Adventure 2 Chao Save";
	include $homeDir . "pc_header.php";

	$col = "$C1";

?>
<h1 align="left"><a href="index.php" style="text-decoration:none">Sonic Adventure 2</a></h1>

<h3>Chao Save File</h3>
See <a href="<?php echo $homeDir; ?>yahooSA2.php">this page</a> for more info about this information.
As of [2015-7-6] I have not been able to confirm this information.

<br>
<h4>File Overview</h4>
<table cellpadding="3" cellspacing="1" border="0" bgcolor="<?php echo $tBG; ?>" style="max-width:640px;">
	<tr bgcolor="<?php echo $tHead; ?>">
		<th>Offset (Hex)</th><th>Size (bytes)</th><th>Contents</th>
	</tr>

	<?php
		threeEntry( '<pre>0x00</pre>', '2179?', 'File Header Information' );
		threeEntry( '<pre>0x883</pre>', '43', 'The Owner' );
		threeEntry( '<pre>0xA08</pre>', '8', 'Chao Name' );
		threeEntry( '<pre>?</pre>', '?', 'Chao Type' );
		threeEntry( '<pre>?</pre>', '?', 'Chao Appearance' );
		threeEntry( '<pre>?</pre>', '?', 'Animal MODs' );
		threeEntry( '<pre>?</pre>', '?', 'Chao Stats' );
	?>
</table>

<br>
<h4>The Owner</h4>
<?php
	memoryTable();
		memoryEntry('0x883', 1, 'Integer', 'The owner\'s age.');
		memoryEntry('0x884', 1, 'Values', 'The owner\'s gender.<br> <code>0x81 = Male,<br> 0x82 = Female,<br></code> any other value is listed as <code>"?"</code>');
		memoryEntry('0x885', 1, 'Values', 'The owner\'s blood type. <br><code>0x80=A,<br> 0x81=B,<br> 0x82=AB,<br> 0x83=O,<br></code> any other value is listed as <code>"A"</code>');
		memoryEntry('0x886', 2, 'Integer', 'The owner\'s birthday. Stored as normal hex. First byte is month, second is day. NOTE: If this is two separate things, make two entries.');
		memoryEntry('0x888', 8, 'String', 'The owner\'s name. The first letter of the name has <code>0x20</code> subtracted from it.');
		memoryEntry('0x8A0', 15, 'String', 'The owner\'s favorite person, place, or thing. Every character is stored with <code>0x20</code> subtracted from it.');
		memoryEntry('0x8B0', 15, 'String', 'The owner\'s secret. Every character is stored with <code>0x20</code> subtracted from it.');
	memoryCloseTable();
?>

<br>
<h4>Chao Name</h4>
<?php
	memoryTable();
		memoryEntry('0xA08', 8, 'String', 'The Chao\'s name. The first character of the name has <code>0x20</code> subtracted from it.');
	memoryCloseTable();
?>

<br>
<h4>Chao Type</h4>
<p>
	Below is the Chao Type data. This allows you to change the type
	of chao you have to any other type of Chao. The chao type is one
	byte long.
	<?php
		memoryTable();
			memoryEntry('0xA00', 1, 'unsigned byte', '<code>0x02 = Baby<br>0x03 = Normal Adult<br>0x06 = Normal Hero<br>0x0A = Normal Dark<br>0x0C = Flying Hero<br>0x10 = Running Dark<br>0x13 = Power Dark<br>0x14 = Normal Light<br>0x15 = Hero Light<br>0x16 = Dark Light</code>');
		memoryCloseTable();
	?>
</p>

<br>
<h4>Chao Appearence</h4>
<p>
	The Chao Appearence Information is next. You can change a bunch
	of things in order to alter the look of your chao.
	<?php
		memoryTable();
			memoryEntry('0xA9D', 1, 'unsigned byte', 'Chao Eyes<br><code>0x00 = Plain Eyes<br>0x04 = Happy Anime Eyes<br>0x09 = Tired Eyes<br>0x0A = Angry Eyes</code>');
			memoryEntry('0xA9E', 1, 'unsigned byte', 'Chao Mouth<br><code>0x00 = No Mouth<br>0x01 = Toothy Grin<br>0x02 = Open Mouth<br>0x03 = Smiling Mouth<br>0x04 = Little Frown</code>');
			memoryEntry('0x8A4', 1, 'unsigned byte', 'Chao Head<br><code>0x00 = Nothing<br>0x01 = Pumpkin<br>0x02 = Skull<br>0x03 = Egg Shell</code>');
			memoryEntry('0xAAA', 1, 'unsigned byte', 'Costume<br><code>0x00 = Normal Chao<br>0x01 = Egg<br>0x02 = Omochao<br>0x03 = Animal (See Chart)</code>');
			memoryEntry('0xAAB', 1, 'unsigned byte', 'Kind of Animal<br>If costume is <code>0x03</code>, use the chart below for Animals');
			memoryEntry('0xAA6', 1, 'unsigned byte', 'Chao Jewelry<br><code>Values Unknown<br></code>');
			memoryEntry('0xAA7', 1, 'unsigned byte', 'Normal Color Mod<br><code>Values Unknown<br></code>');
			memoryEntry('0xAA8', 1, 'unsigned byte', 'Chao Jewelry Color<br><code>0x00 = Normal<br>0x01 = Gold<br>0x02 = Silver<br>0x03 = Ruby<br>0x04 = Green<br>0x05 = Blue<br>0x06 = Pink<br>0x07 = Orange<br>0x08 = Amethyst<br>0x09 = Emerald<br>0x1A = Rust<br>0x1B = Fuisha<br>0x1C = Black with Green Flames<br>0x1D = Black with Brown Stripes<br>0x1E = Black with Bright Green Flames<br>0x1F = Black with Coffee Stripes</code>');
		memoryCloseTable();
	?>
</p>

<br>
<h4>Animal MODs</h4>
<?php
	memoryTable();
		memoryEntry('0xAB4', 1, 'Animal Value', 'Arms');
		memoryEntry('0xAB5', 1, 'Animal Value', 'Ears');
		memoryEntry('0xAB6', 1, 'Animal Value', 'Front of Head');
		memoryEntry('0xAB7', 1, 'Animal Value', 'Back of Head');
		memoryEntry('0xAB8', 1, 'Animal Value', 'Feet');
		memoryEntry('0xAB9', 1, 'Animal Value', 'Tail');
		memoryEntry('0xABA', 1, 'Animal Value', 'Wings');
		memoryEntry('0xABB', 1, 'Animal Value', 'Face');
	memoryCloseTable();
?>

<p>
	The Animal Values work for Animal Mods and the Kind of Animal if the
	Chao Costume is Animal.
</p>
<br>
<h4>Animal Types</h4>
<table cellpadding="3" cellspacing="1" border="0" bgcolor="<?php echo $tBG; ?>" style="max-width:640px;">
	<tr bgcolor="<?php echo $tHead; ?>">
		<th>Value</th><th>Animal Value</th>
	</tr>

	<?php
		twoEntry( '<pre>0x00</pre>', 'Penguin' );
		twoEntry( '<pre>0x01</pre>', 'Fish' );
		twoEntry( '<pre>0x02</pre>', 'Otter' );
		twoEntry( '<pre>0x03</pre>', 'Rabbit' );
		twoEntry( '<pre>0x04</pre>', 'Cheetah' );
		twoEntry( '<pre>0x05</pre>', 'Boar' );
		twoEntry( '<pre>0x06</pre>', 'Bear' );
		twoEntry( '<pre>0x07</pre>', 'Tiger' );
		twoEntry( '<pre>0x08</pre>', 'Gorrilla' );
		twoEntry( '<pre>0x09</pre>', 'Peacock' );
		twoEntry( '<pre>0x0A</pre>', 'Parrot' );
		twoEntry( '<pre>0x0B</pre>', 'Vulture' );
		twoEntry( '<pre>0x0C</pre>', 'Skunk' );
		twoEntry( '<pre>0x0D</pre>', 'Sheep' );
		twoEntry( '<pre>0x0E</pre>', 'Racoon' );
		twoEntry( '<pre>0x10</pre>', 'Ghost' );
		twoEntry( '<pre>0x11</pre>', 'Bone Dog' );
		twoEntry( '<pre>0x12</pre>', 'Dragon' );
		twoEntry( '<pre>0x13</pre>', 'Unicorn' );
		twoEntry( '<pre>0x14</pre>', 'Phoenix' );
	?>
</table>

<br>
<h4>Chao Stats</h4>
<p>
	Next is the chao stats. Every stat is 2 bytes long, and stored
	backwards. The stats are also multiplied by 10. As an example,
	a stat which has a value of <code>0x1E23</code>, is actually <code>0x231E</code>, and has
	a value of 8990. However, it's real value is 899, as the last
	place is ignored.
	<?php
		memoryTable();
			memoryEntry('0xA18', 2, 'see above', 'Swim: SWM');
			memoryEntry('0xA1A', 2, 'see above', 'Fly: FLY');
			memoryEntry('0xA1C', 2, 'see above', 'Run: RUN');
			memoryEntry('0xA1E', 2, 'see above', 'Power: PWR');
			memoryEntry('0xA20', 2, 'see above', 'Luck: LCK');
			memoryEntry('0xA22', 2, 'see above', 'Intellegence: INT');
			memoryEntry('0xA24', 2, 'see above', 'Stamina: STA');
		memoryCloseTable();
	?>
</p>

<?php
	$from = getcwd() . "/saves_chao.php";
	include $homeDir . "pc_footer.php";
?>
<!--
Posted by Paul Kratt on {2001-9-25} on:
https://groups.yahoo.com/neo/groups/vmu-dev/conversations/messages/875


>I was looking over your webpage and was wondering if you would publish the
>information you have found out about the data format for the Chao on the VMU.
>
>This would greatly help others who are trying to develop tools to edit Chao.

I dobut you'll get anything out of him.
I asked and he didn't want to release any info in risk of it getting
'stolen' or something like that.

Anyway, here's something that may help you. It's a guide I released on a
chao hacking mailing list awhile back, and since then a few people have
provided more info for me to add as I became lasy and stopped looking for
info. I probably have information sitting on my HD that I didn't add, but
this alone should be enough to allow you to make the kind of chao you
want without an editor.


---------------------------------------------------------
******** *** *** ****** **********
********** *** *** ******** ************
**** *** *** *** ******** ************* *********
*** ** *********** ** ** ***** ***** *************
*** *********** *** *** **** **** *************
*** *********** ********** *** **** *** ****
**** *** *** *** ********** **** ***** *** ****
*********** *** *** *** *** ************* ****
********** *** *** *** *** *********** ****
******** *** *** *** *** ********* ****
****
** **** ** * **** * ******* * **** ***** ****
**** * * * * ** ** * ** * * * * ** ************
* * * * * * *** ***** ** * * *** **** ************
**** * * **** ** ** ** ** **** ** * ** ************
* * **** ** **** ** * ** ** ** ****
* ***
# # ### ### # # # # # ### ### # # # ## ####
#### # # # # # # # ## # # # # # # # ## #
#### ##### # ## # # ## # ### # ### # # # # ## ##
# # # # #### # # # # # ### ### ### # ### ####
 /-----------------------------------------------------\
/            Created by sonicblur - sblur@...           \
\-------------------------------------------------------/

This is the Chao Adventure 2 Hacking guide. It contains information
on how to edit your Chao Adventure 2 VMS file from the Sonic Adventure
2 game to change information about your chao, such as it's stats, name,
and appearence. The only things you need to use this guide are
knowledge of how to use a hex editor, a VMU, and some way to get your
chao adventure 2 VMS file to and from your Dreamcast. Make sure the
line below this fits on your screen for proper viewing of this
document. Also make sure you are using a monospaced font. In this
document, hex locations will be refered to in 0x000000 form, and hex
values will be in 00h form.
-=====================================================================-
The chao data in chao adventure 2 begins directly after the icon. The
first data you will see is the owner information. The table below
explains the owner information.

 /=========================== The owner ========================\
/----------------------------------------------------------------\
| Location | Length | Description                                |
| ======== | ====== | ===========                                |
| 0x000883 |    1   | The owners age. Stored as normal hex.      |
|          |        |                                            |
| 0x000884 |    1   | The owners gender. 81h = Male              |
|          |        | 82h = Female                               |
|          |        | Any other value is listed as ?             |
|          |        |                                            |
| 0x000885 |    1   | The owners blood type. 80h = A             |
|          |        | 81h = B 82h = AB 83h = O                   |
|          |        | Any other value is listed as A             |
|          |        |                                            |
| 0x000886 |    2   | Owners birthday. Stored as normal hex.     |
|          |        | First byte is month, second is day.        |
|          |        |                                            |
| 0x000888 |    8   | The owners name. The first letter of the   |
|          |        | name has 20h subtracted from it.           |
|          |        |                                            |
| 0x0008A0 |   15   | The owners Favored person place or thing.  |
|          |        | Every character is stored with 20h         |
|          |        | subtracted from it.                        |
|          |        |                                            |
| 0x0008B0 |   15   | The owners secret. Every character is      |
|          |        | stored with 20h subtracted from it.        |
\----------------------------------------------------------------/

 /=================== Chao Name ==================\
/--------------------------------------------------\
| Location | Length | Description                  |
| ======== | ====== | ===========                  |
| 0x000A08 |    8   | The chao's name. The first   |
|          |        | character of the name has    |
|          |        | 20h subtracted from it.      |
\--------------------------------------------------/

Below is the Chao Type data. This allows you to change the type
of chao you have to any other type of Chao. The chao type is one
byte long.

 /=================== Chao Type ===================\
/---------------------------------------------------\
| Location | Known Values                           |
| ======== | ============                           |
| 0x000A00 | 02 = Baby           03 = Normal Adult  |
|          | 06 = Normal Hero    0A = Normal Dark   |
|          | 0C = Flying Hero    10 = Running Dark  |
|          | 13 = Power Dark     14 = Normal Light  |
|          | 15 = Hero Light     16 = Dark Light    |
\---------------------------------------------------/

The Chao Appearence Information is next. You can change a bunch
of things in order to alter the look of your chao.

 /====================== Chao Appearence ====================\
/-------------------------------------------------------------\
| Location | Description      | Known Values                  |
| ======== | ===========      | ============                  |
| 0x000A9D | Chao Eyes        | 00 = Plain Eyes               |
|          |                  | 04 = Happy Animie Eyes ^^     |
|          |                  | 09 = Tired Eyes               |
|          |                  | 0A = Angry Eyes               |
|          |                  |                               |
| 0x000A9E | Chao Mouth       | 00 = No Mouth                 |
|          |                  | 01 = Toothy Grin              |
|          |                  | 02 = Open Mouth o             |
|          |                  | 03 = Smiling Mouth            |
|          |                  | 04 = Little Frown             |
|          |                  |                               |
| 0x0008A4 | Chao Head        | 00 = Nothing   01 = Pumpkin   |
|          |                  | 02 = Skull     03 = Egg Shell |
|          |                  |                               |
| 0x000AAA | Costume          | 00 = Normal Chao              |
|          |                  | 01 = Egg                      |
|          |                  | 02 = Omochao                  |
|          |                  | 03 = Animal (See Chart)       |
|          |                  |                               |
| 0x000AAB | Kind of Animal   | If costume is 03, use the     |
|          |                  | chart below for Animals       |
|          |                  |                               |
| 0x000AA6 | Chao Jewlery     | *Values Unknown*              |
|          |                  |                               |
| 0x000AA7 | Normal Color Mod | *Values Unknown*              |
|          |                  |                               |
| 0x000AA8 | Chao Jewel Color | 00 = Normal     01 = Gold     |
|          |                  | 02 = Silver     03 = Ruby     |
|          |                  | 04 = Green      05 = Blue     |
|          |                  | 06 = Pink       07 = Orange   |
|          |                  | 08 = Amethyst   09 = Emerald  |
|          |                  | 1A = Rust       1B = Fuisha   |
|          |                  | 1C = Black w/ Green Flames    |
|          |                  | 1D = * Brown Stripes          |
|          |                  | 1E = * Bright Green Flames    |
|          |                  | 1F = * Coffee Stripes         |
|          |                  |                               |
\-------------------------------------------------------------/

 /========== Animal MODs ==========\
/-----------------------------------\
| Location | Chao Part Modified     |
| ======== | ==================     |
| 0x000AB4 | Arms                   |
| 0x000AB5 | Ears                   |
| 0x000AB6 | Front of Head          |
| 0x000AB7 | Back of Head           |
| 0x000AB8 | Feet                   |
| 0x000AB9 | Tail                   |
| 0x000ABA | Wings                  |
| 0x000ABB | Face                   |
\-----------------------------------/

The Animal Values work for Animal Mods and the Kind of Animal if the
Chao Costume is Animal.


 /============== Animals =============\
/--------------------------------------\
| 00 = Penguin          01 = Fish      |
| 02 = Otter            03 = Rabbit    |
| 04 = Cheetah          05 = Boar      |
| 06 = Bear             07 = Tiger     |
| 08 = Gorrilla         09 = Peacock   |
| 0A = Parrot           0B = Vulture   |
| 0C = Skunk            0D = Sheep     |
| 0E = Racoon           10 = Ghost     |
| 11 = Bone Dog         12 = Dragon    |
| 13 = Unicorn          14 = Phoenix   |
\--------------------------------------/

Next is the chao stats. Every stat is 2 bytes long, and stored
backwards. The stats are also multiplied by 10. As an example,
a stat which has a value of 1E23h, is actually 231E, and has
a value of 8990. However, it's real value is 899, as the last
place is ignored.

 /============= Chao stats ============\
/---------------------------------------\
| Location | Length | Description       |
| ======== | ====== | ===========       |
| 0x000A18 |    2   | Swim: SWM         |
| 0x000A1A |    2   | Fly: FLY          |
| 0x000A1C |    2   | Run: RUN          |
| 0x000A1E |    2   | Power: PWR        |
| 0x000A20 |    2   | Luck: LCK         |
| 0x000A22 |    2   | Intellegence: INT |
| 0x000A24 |    2   | Stamina: STA      |
\---------------------------------------/


_-==============================================-_
                    WRITTEN BY:
                    -=========-
                     SONICBLUR

                 INFO PROVIDED BY:
                 -===============-
SONICBLUR (-----------) ALL OWNER INFORMATION
sblur@...               CHAO STATS
                        CHAO NAME

WARPDIGIVOLVE (-------) CHAO TYPE
warpdigivolve@...       FACE DATA

BRANDEN PINNEY (------) CHAO COSTUME & ANIMALS
bapinney@...            CHAO HEADS
                        CHAO COLORS
                        CHAO JEWLRY

~K'TANI (-------------) EYE VALUES
snowfox16@...           MOUTH VALUES
                        ANIMAL MODS
                        ANIMAL VALUES
                        CHAO TYPE VALUES




                SPECIAL THANKS T0:
                -================-
YARHARHAR (-----------) FOR THE SILVER CHAO
                        IN A VMS FILE

ELLIOTRO (------------) FOR SENDING ME HIS
                        CHAO ADVENTUE FILE

SAYIAN SONIC (--------) FOR BEING THE FIRST
                        TO GET ALL 180
                        EMBLEMS AND POST A
                        SAVE ON THE NET
=-____________________________________________-=







Version 0.7 (Augest 19th 2001) -
Eye Values Added - Values Missing
Mouth Values Added - Values Missing
Animal Mods
Animal Values
Chao Type Values - Values Missing

Version 0.6 (July 26th 2001) -
Chao Type Added - Values Missing
Face Data - Values Missing
Chao Costume
Animals - Values Missing
Heads
Colors - Values Missing
Jewlry - Values Missing

Version 0.5 (July 8th 2001) -
Owner information
Chao Stats
Chao Name

------------------------------------------------------------------------


Hmmm...
Hope I didn't miss anything....
For some reason, I cant find this version of the guide in my outgoing
mail.
Special thanks goes to the few that contributed.

BTW, this guide was written about a week after I found some of the inital
info used.
I'm sure someone probably found some of this before me, but I was the
first to put it in a guide.
:-P
-->
