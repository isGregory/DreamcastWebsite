<?php
	// yahooSA2.php
	require_once 'pc_directories.php';
	require_once $root . 'format.php';
	require_once $root . 'lookup_game.php';
	global $tHead, $tBG;

	$pageTitle = "SA2 Yahoo";
	$homeDir = "";
	include 'pc_header.php';

?>

<h1>Yahoo Message on Sonic Adventure 2</h1>

This message was backed up from
<a href="https://groups.yahoo.com/neo/groups/vmu-dev/conversations/messages/875">this site</a>.
<br>
It talks about the Chao
<a href="games/<?php echo SONIC_ADVENTURE_2; ?>/saves_chao.php">save file structure</a>
from Sonic Adventure 2.
<br>
Thanks to Stephanie Rogerson for asking the question, and Paul Kratt for
responding with information from sonicblur.
<br>
<br>
<table cellpadding="2" cellspacing="0" border="0" bgcolor="#CCCCCC" style="max-width:600px;">
	<tr>
		<td>
			<pre style="white-space: pre-wrap;">
From: steph42@sammy.cwru.edu
Date: 2001-9-23
<br>
Message:
--- In vmu-dev tyro@ wrote:

> http://www.franken.de/users/deco/myfiles/editor.html

Alessandro:

I was looking over your webpage and was wondering if you would publish the information you have found out about the data format for the Chao on the VMU.

This would greatly help others who are trying to develop tools to edit Chao.

Thank you,

Stephanie Rogerson
			</pre>
		</td>
	</tr>
</table>


<br>
<table cellpadding="2" cellspacing="0" border="0" bgcolor="#CCCCCC" style="max-width:600px;">
	<tr>
		<td>
			<pre style="white-space: pre-wrap;">
From: Paul Kratt
Date: 2001-9-25
<br>
Message:
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
			</pre>
		</td>
	</tr>
</table>

<?php
	$from = "yahooSA2.php";
	include 'pc_footer.php';
?>
