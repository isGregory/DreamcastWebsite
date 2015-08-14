<?php
//pc_header.php
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

<html>

	<head>
		<title><?php echo $pageTitle; ?></title>
	</head>

	<body link="#0022EE" vlink="#0022EE" alink="red" text="black" bgcolor="grey" background='<?php echo $dirImages . $pcBGimg; ?>'>

		<font face="Helvetica">
			<table cellpadding="2" cellspacing="1" border="0" width="640" align="center" bgcolor="#555555">

				<!-- Main Title Image -->
				<tr bgcolor="<?php echo $tHead; ?>">
					<th align="center"><img src='<?php echo $dirImages; ?>title_pc.png' alt="" align="center" width="640" height="160"></th>
				</tr>

				<!-- Header Links -->
				<tr bgcolor="<?php echo $tHead; ?>">
					<th align="center">
						<table width="100%"><tr>
							<th><a href="<?php echo $homeDir; ?>index.php" style="text-decoration:none">Home</a></th>
							<th><a href="<?php echo $homeDir; ?>../index.php" style="text-decoration:none">DC Site</a></th>
							<th><a href="<?php echo $homeDir; ?>games/index.php" style="text-decoration:none">Games</a></th>
							<th><a href="<?php echo $homeDir; ?>vmu.php" style="text-decoration:none">VMU</a></th>
							<th><a href="<?php echo $homeDir; ?>thanks.php" style="text-decoration:none">Thanks</a></th>
						</tr></table>
					</th>
				</tr>

				<!-- Body -->
				<tr bgcolor="#FFFFFF"><td align="left" background="<?php echo $dirImages; ?>tile2.png">
