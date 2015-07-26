<?php
	// DLC/index.php
	$homeDir = "../";
	require_once 'dlc_directories.php';
	require_once $homeDir . 'format.php';

	$pageTitle = "Downloadable Content";
	include $homeDir . 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">
	The following are games with official DLC. Click to see files available.

	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:300px;max-width:540px;" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th bgcolor="<?php echo $tHead; ?>">Game</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='PSOv1.php' style='text-decoration:none'>Phantasy Star Online V1</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='Shenmue.php' style='text-decoration:none'>Shenmue</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='SonicAdventure1.php' style='text-decoration:none'>Sonic Adventure</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='SonicAdventure2.php' style='text-decoration:none'>Sonic Adventure 2</a></td>
		</tr>
	</table>
</p>
<br>
<br>

<?php
	$from = getcwd() . "/index.php";
	include $homeDir . 'dc_footer.php';
?>
