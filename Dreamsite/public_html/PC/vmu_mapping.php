<?php
	// vmu_mapping.php
	require_once 'pc_directories.php';
	require_once $root . 'format.php';

	$pageTitle = "VMU Memory Mapping";
	$homeDir = "";
	include 'pc_header.php';

?>

<h1>VMU Save File Memory Mapping</h1>
<p>
	Note: I have not had time to fill out
	this section to the level I would like.
</p>
<p>
	Here are some tips and tricks to figure out how
	to map the locations of data in a save file.
</p>
<p>
	Create a save file in a game. Save it to the web server.
	Then load the save back up and change only a single thing
	about the game and save again. Run a byte difference between
	the two files and filter out known sections (such as time the
	file was saved).
</p>

<?php
	$from = "vmu_mapping.php";
	include 'pc_footer.php';
?>
