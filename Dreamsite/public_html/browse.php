<?php
	//browse.php
	$homeDir = "";
	require_once 'directories.php';
	require_once 'format.php';

	$p = isset($_GET["p"]) ? $_GET["p"] : false;
	if ( false === $p ) {
		$p = 1;
	}

	require_once 'dc_tools.php';

	$pageTitle = "VMU Browse";
	include 'dc_header.php';

	$perPage = 10;

	validateVMIs( $dirSave );

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
			echo " < - - - ";
		}
		$range = 8;
		$start = $p - ( $range / 2 );
		$end = $p + ( $range / 2 );
		if ( $start < 1 ) {
			$start = 1;
			$end = $start + $range;
			if ( $end > $pages ) {
				$end = $pages;
			}
		} else if ( $end > $pages ) {
			$end = $pages;
			$start = $end - $range;
			if ( $start < 1 ) {
				$start = 1;
			}
		}

		// echo "Page $p";
		for ( $i = $start; $i <= $end; $i++ ){
			if ( 0 === $p - $i ) {
				echo " $i ";
			} else {
				echo " <a href='browse.php?p=$i'>$i</a> ";
			}
		}

		if ( $p < $pages ) {
			$next = $p + 1;
			echo " - - - > ";
			echo "<a href='browse.php?p=$next'>Page $next</a>";
		}
		echo "</p>";
	}

?>

<h3 align="left">
	<?php
		echo $pageTitle . " Page $p of $pages";
	?>
</h3>
<p align="left">
	Click the file name for more information.<br>
	Click the blocks size to download each file.
</p>
<?php
	drawPageNavBar();
?>

<table cellpadding="3" cellspacing="1" border="0" width="100%" bgcolor="<?php echo $tBG; ?>">
	<tr bgcolor="<?php echo $tHead; ?>">
		<th>File</th><th>Blocks</th><th>Date Added</th><th>Icon</th>
	</tr>
	<?php

		$c = 1;
		foreach ( $files as $filefound ) {

			if( $c > $perPage * ($p - 1) && $c < ($perPage * $p) + 1 ) {

				$VMSname = getVMSnamefromVMI( $filefound );
				$VMIfile = end( explode( "/", $filefound ) );
				$filehead = current( explode( ".", $VMIfile ) );

				$vms = new VMS;
				$vms->load( $dirSave . $VMSname );

				$imgName = createVMSicons( $vms );

				date_default_timezone_set('UTC');
				$fileDate = date( "g:i:s A<\b\\r>Y-M-d",
					filemtime( $filefound ) );
					//filemtime( $dirSave . $VMSname ) );

				$blocks = $vms->getBlocks();
				?>
					<tr bgcolor="<?php echo ac(); ?>">
						<td><a href='<?php echo "info.php?s=" . $VMIfile . "&p=" . $p; ?>'><?php echo $filehead; ?></a></td>
						<th align='center'>
							<a href='<?php echo $dirSave . "vmidl.php?id=" . $VMIfile . "&t=i"; ?>'><?php echo $blocks; ?></a>
						</th>
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
