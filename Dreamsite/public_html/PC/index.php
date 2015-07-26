<?php
	// index.php
	require_once 'pc_directories.php';
	require_once $root . 'format.php';

	$pageTitle = "Home";
	$homeDir = "";
	include 'pc_header.php';

?>

<h1>Home</h1>

<p>Welcome home.</p>

<?php
	$from = "index.php";
	include 'pc_footer.php';
?>
