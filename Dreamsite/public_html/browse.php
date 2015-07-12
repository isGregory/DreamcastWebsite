<?php
	//browse.php
	require_once 'directories.php';
	require_once 'format.php';

	$p = isset($_GET["p"]) ? $_GET["p"] : false;
	if ($p === false) {
		$p = 1;
	}

	include 'dc_tools.php';

	$pageTitle = "VMU Browse";
	include 'dc_header.php';

	$perPage = 10;

	validateVMIs();

	$filename = "*.[vV][mM][iI]";
	$files = glob( $dirSave . $filename );
	usort( $files, function($a, $b) {
		return filemtime($a) < filemtime($b);
	});

	$numSaves = count( $files );
	$pages = ceil( $numSaves / $perPage );
	if ( $p > $pages ) {
		$p = $pages;
	}

	function drawPageNavBar() {
		global $p, $pages;
		echo "<p align='center'>";
		if ( $p > 1 ) {
			$prev = $p - 1;
			echo "<a href='browse.php?p=$prev'>Page $prev</a>";
			echo "< - - - ";
		}
		echo "Page $p";
		if ( $p < $pages ) {
			$next = $p + 1;
			echo " - - - >";
			echo "<a href='browse.php?p=$next'>Page $next</a>";
		}
		echo "</p>";
	}

?>

<p>
	Click the file name for more information.<br>
	Click the blocks size to download each file.
</p>
<?php
	drawPageNavBar();
?>

<table cellpadding="3" cellspacing="1" border="0" width="100%" bgcolor="#6E6E6E">
	<tr bgcolor="#CCCCCC">
		<th>File</th><th>Blocks</th><th>Date Added</th><th>Icon</th>
	</tr>
	<?php

		$c = 1;
		foreach ( $files as $filefound ) {

			if( $c > $perPage * ($p - 1) && $c < ($perPage * $p) + 1 ) {

				$VMSname = getVMSnamefromVMI( $filefound );
				$VMIfile = end( explode( "/", $filefound ) );

				$vms = new VMS;
				$vms->load( $dirSave . $VMSname );
				$imgName = createVMSicons( $vms );
				$fileDate = date( "g:i:s A<\b\\r>Y-M-d",
					filemtime( $dirSave . $VMSname ) );
				$blocks = $vms->getBlocks();
				?>
					<tr bgcolor="<?php echo ac(); ?>">
						<td><a href='<?php echo "info.php?s=" . $VMIfile; ?>'><?php echo $VMIfile; ?></a></td>
						<td align='center'>
							<a href='<?php echo "vmidl.php?id=" . $VMIfile . "&t=i"; ?>'><?php echo $blocks; ?></a>
						</td>
						<td align='right'><?php echo $fileDate; ?></td>
						<td align='center'><img src='<?php echo $imgName; ?>'></td>
					</tr>
				<?php
			}
			$c += 1;
		}
	?>
</table>

<?php
	drawPageNavBar();

	$from = "browse.php";
	include 'dc_footer.php';
?>
