<?php
//dc_header.php
require_once 'format.php';
?>
<!DOCTYPE HTML PUBLIC "-//IETF//DTD HTML//EN">

	<html>

		<head>
			<title><?php echo $pageTitle; ?></title>
		</head>

		<body link="#0022EE" vlink="#0022EE" alink="red" text="black" bgcolor="grey" background='<?php echo $dcBGimg; ?>'>

			<font face="Helvetica">
				<table cellpadding="2" cellspacing="0" border="1" width="500" align="center" bgcolor="#FFFFFF">

					<!-- Main Title Image -->
					<tr bgcolor="<?php echo $tHead; ?>">
						<th align="center"><img src="images/title_dc.png" alt="" align="center" width="500" height="50"></th>
					</tr>

					<!-- Body -->
					<tr background="images/tile2.png"><td align="center">

						<table cellpadding="2" cellspacing="0" border"0" width="100%">
							<tr>
								<!-- Left Directory Box -->
								<td style="padding:0px;"><span style="height:100%; width:120px; display:block;overflow:auto">
									<table cellpadding="3" cellspacing="1" border="0" width="120" height="100%" bgcolor="<?php echo $tBG; ?>">
										<tr align="center" bgcolor="#BBBBBB">
											<td><b>Contents</b></td>
										</tr>
										<tr align="center" bgcolor="#DDDDDD">
											<td>Files</td>
										</tr>
										<tr bgcolor="#CEEBF5">
											<td><a href="index.php">Upload</a></td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td><a href="browse.php">Browse</a></td>
										</tr>
										<tr bgcolor="#CEEBF5">
											<td><a href="dlc.php">DLC</a></td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td><a href="dc_sites.php">DC Sites</a></td>
										</tr>
										<tr rowspan="2" align="center" bgcolor="#DDDDDD">
											<td>Other</td>
										</tr>
										<tr bgcolor="#CEEBF5">
											<td><a href="PC/index.php">PC Site</a></td>
										</tr>
										<tr bgcolor="#FFFFFF">
											<td><a href="http://sonic.dricas.ne.jp">Sonic</a></td>
										</tr>
										<!--
										<tr bgcolor="#CEEBF5">
											<td><a href="#gweb">Shenmue</a></td>
										</tr>
										-->
									</table>
								</td>
								<!-- Right Size Body Content -->
								<td>
