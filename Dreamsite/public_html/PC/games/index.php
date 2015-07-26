<?php
	// index.php for games/
	$homeDir = "../";
	require_once $homeDir . 'pc_directories.php';
	require_once $homeDir . $root . 'format.php';
	global $tHead, $tBG;

	$pageTitle = "Games";
	include $homeDir . "pc_header.php";

?>
<h1 align="left">Dreamcast Games</h1>
<p>Here are a list of games with information currently.</p>

<p><br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:400px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th bgcolor="<?php echo $tHead; ?>">Game</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='<?php echo $d4X4; ?>/index.php' style='text-decoration:none'>4x4 Evolution</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='<?php echo $dJGR; ?>/index.php' style='text-decoration:none'>Jet Grind Radio</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='<?php echo $dPSOv2; ?>/index.php' style='text-decoration:none'>Phantasy Star Online</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='<?php echo $dShen; ?>/index.php' style='text-decoration:none'>Shenmue</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='<?php echo $dSA2; ?>/index.php' style='text-decoration:none'>Sonic Adventure 2</a></td>
		</tr>
	</table>
</p>

<?php
	$from = "index.php";
	include $homeDir . "pc_footer.php";
?>
