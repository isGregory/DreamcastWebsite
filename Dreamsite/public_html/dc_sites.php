<?php
	// dc_sites.php
	$homeDir = "";
	require_once 'directories.php';
	require_once 'format.php';

	$pageTitle = "Dreamcast Websites";
	include 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">
	The following are links to sites made for the dreamcast.
	Many of these sites are no longer active, but various users
	have been rebuilding these sites which can be added to your server.
</p>
<br>
<br>

<?php
	$from = "index.php";
	include 'dc_footer.php';
?>
