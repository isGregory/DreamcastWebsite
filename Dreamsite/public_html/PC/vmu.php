<?php
	// vmu.php
	require_once 'pc_directories.php';
	require_once $root . 'format.php';

	$pageTitle = "VMU";
	$homeDir = "";
	include 'pc_header.php';

?>
<h1>VMU</h1>

<p>The following pages provide information and files related to the Dreamcast VMU.</p>

<p><br>
	<table align="center" cellpadding="3" cellspacing="1" border="0" style="min-width:400px;max-width:640px;" bgcolor="<?php echo $tBG; ?>">
		<tr>
			<th bgcolor="<?php echo $tHead; ?>">Files Formats:</th>
		</tr>

		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='file_vmi.php' style='text-decoration:none'>VMI Format</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='file_vms.php' style='text-decoration:none'>VMS Format</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='file_lcd.php' style='text-decoration:none'>LCD Format</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='file_upload.php' style='text-decoration:none'>Web Browser</a></td>
		</tr>
		<tr bgcolor="<?php echo ac(); ?>">
			<td align='center'><a href='vmu_mapping.php' style='text-decoration:none'>Memory Mapping Tutorial</a></td>
		</tr>
	</table>
</p>

<?php
	$from = "vmu.php";
	include 'pc_footer.php';
?>
