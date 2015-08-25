<?php
	// about.php
	require_once 'directories.php';
	require_once 'format.php';

	$pageTitle = "About Page";
	include 'dc_header.php';
?>

<h3 align="left"><?php echo $pageTitle; ?></h3>
<p align="left">
	This website is intended to provide tools and information to enhance
	the abilities of the Sega Dreamcast. Tools include the ability to
	upload and download save files or downloadable content to help make
	file sharing easier and work beyond the space constraints of the VMU.
	<br>
	<br>
	<table cellpadding='3' cellspacing='1' border='0' style='max-width:640px;' bgcolor='<?php echo $tBG; ?>'>
		<tr bgcolor='<?php echo $tHead; ?>'>
			<th>Version</th>
			<td bgcolor='<?php echo ac(); ?>' align='center'>2015-8-17</td>
		</tr>
		<tr bgcolor='<?php echo $tHead; ?>'>
			<th>Display Mode</th>
			<td bgcolor='<?php echo ac(); ?>' align='center'>
				<?php
					if ($dreamBrowser ) {
						echo "Dreamcast";
					} else {
						echo "Computer";
					}
				?>
			</td>
		</tr>
		<tr bgcolor='<?php echo $tHead; ?>'>
			<th colspan='2'>Browser</th>
		</tr>
		<tr bgcolor='<?php echo ac(); ?>'>
			<td colspan='2'><?php echo $browser;?></td>
		</tr>
	</table>
</p>
<br>
<br>

<?php
	$from = 'about.php';
	include 'dc_footer.php';
?>
