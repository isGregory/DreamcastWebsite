<?php
	require_once 'format.php';

	$pageTitle = "VMU Upload";
	include 'dc_header.php';
?>

<h3 align="left"><u><a id="dlc">Upload File</a></u></h3>
<table align="center" bgcolor="#9BB8C2" cellspacing="2" cellpadding="0" border="0">
	<tr><td align="center"><b>VMU File Uploader</b></td></tr>
	<tr><td bgcolor="#CEEBF5" align="center"><br>
		<form method='POST' enctype='multipart/form-data' action='upload.php'>
			<table cellspacing="3" cellpadding="3">
				<tr>
					<td>File to upload:</td>
					<td>
					<?php
						if ( $dreamBrowser ) {
							echo "<input type='VMFILE' name='upfile' id='upfile'>";
						} else {
							echo "<input type='file' name='upfile' id='upfile'>";
						}
					?>
					</td>
				</tr>
				<?php
					if ( $dreamBrowser ) {
						?>
							<tr>
								<td>Save as:</td>
								<td><input name='name' size='8' maxlength='8'>.vmi</td>
							</tr>
						<?php
					}
				?>
				<tr>
					<td colspan="2" align="center">
						<input type="submit" name="submit" value="Upload">
					</td>
				</tr>
			</table>
		</form>
	</td></tr>
</table>

<br>
<p align="left">
	Here you can select and upload a file from your VMU.
</p>
<br>
<br>

<?php
	$from = "index.php";
	include 'dc_footer.php';
?>
