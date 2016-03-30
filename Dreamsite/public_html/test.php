<?php
	// test.php
	require_once 'directories.php';
	require_once 'format.php';

	// This webpage is currently a testbed for
	// trying to check the status of a server
	// or websites.

	/*
	// returns int responsecode, or false (if url does not exist or connection timeout occurs)
	// NOTE: could potentially take up to 0-30 seconds, blocking further code execution (more or less depending on connection, target site, and local timeout settings))
	// if $followredirects == false: return the FIRST known httpcode (ignore redirects)
	// if $followredirects == true : return the LAST  known httpcode (when redirected)
	function getHttpResponseCode_using_curl( $url, $followredirects = false ){
		if( !$url || !is_string( $url ) ){
			return false;
		}
		$ch = @curl_init( $url );
		if( false === $ch ){
			return false;
		}
		@curl_setopt( $ch, CURLOPT_HEADER,         true );    // we want headers
		@curl_setopt( $ch, CURLOPT_NOBODY,         true );    // dont need body
		@curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );    // catch output (do NOT print!)
		if( $followredirects ){
			@curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
			@curl_setopt( $ch, CURLOPT_MAXREDIRS,      10 );  // fairly random number, but could prevent unwanted endless redirects with followlocation=true
		}else{
			@curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, false );
		}
		@curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 1 );   // fairly random number (seconds)... but could prevent waiting forever to get a result
		@curl_setopt( $ch, CURLOPT_TIMEOUT,        1 );   // fairly random number (seconds)... but could prevent waiting forever to get a result
		// @curl_setopt($ch, CURLOPT_USERAGENT,      "Mozilla/5.0 (Windows NT 6.0) AppleWebKit/537.1 (KHTML, like Gecko) Chrome/21.0.1180.89 Safari/537.1");   // pretend we're a regular browser
		@curl_exec( $ch );
		if( @curl_errno( $ch ) ){   // should be 0
			@curl_close( $ch );
			return false;
		}
		$code = @curl_getinfo( $ch, CURLINFO_HTTP_CODE ); // note: php.net documentation shows this returns a string, but really it returns an int
		@curl_close( $ch );
		return $code;
	}

	$wait = 1; // wait Timeout In Seconds
	$host = 'dctalk.no-ip.info';
	$ports = [
		'http'  => 80,
		'https' => 443,
		'ftp'   => 21,
		'pso1'  => 40975,
		'pso2'  => 41231,
		'pso3'  => 41487,
		'pso4'  => 41743,
		'q3a0'  => 27960,
		'q3a1'  => 27961,
		'q3a2'  => 27962,
		'q3a3'  => 27963,
		'q3a4'  => 27964,
		'q3a5'  => 27965,
		'q3a6'  => 27966,
		'q3a7'  => 27967,
		'q3a8'  => 27968,
		'q3a9'  => 27969,
		'starlancer'  => 47624,
	];

	foreach ($ports as $key => $port) {
	    $fp = @fsockopen($host, $port, $errCode, $errStr, $wait);
	    echo "Ping $host:$port ($key) ==> ";
	    if ($fp) {
	        echo 'SUCCESS<br>';
	        fclose($fp);
	    } else {
	        echo "ERROR: $errCode - $errStr<br>";
	    }
	    echo PHP_EOL;
	}


	// Ping example.com:80 (http) ==> SUCCESS
	// Ping example.com:443 (https) ==> SUCCESS
	// Ping example.com:21 (ftp) ==> ERROR: 110 - Connection timed out
*/


	function ping($host, $port, $timeout) {
		$tB = microtime(true);
		set_error_handler(function() { /* ignore errors */ });
		$fP = fSockOpen($host, $port, $errno, $errstr, $timeout);
		restore_error_handler();
		if (!$fP) { return "down"; }
		$tA = microtime(true);
		return round((($tA - $tB) * 1000), 0)." ms";
	}

	function checkSite( $url, $port ) {
		$result = ping( $url, $port, 2 );
		echo "<td>".$url."</td><td>".$result."</td>";
		return;
	}

	$pageTitle = "About Page";
	include 'dc_header.php';
?>

<h3 align="left"><u><?php echo $pageTitle; ?></u></h3>
<p align="left">
	Have a table that shows if websites are up or down!
	<table cellpadding='3' cellspacing='1' border='0' style='max-width:640px;' bgcolor='<?php echo $tBG; ?>'>
		<tr bgcolor='<?php echo $tHead; ?>'>
			<th>Website</th><th>Status</th>
		</tr>
		<tr bgcolor='<?php echo ac(); ?>'>
			<?php
				checkSite("www.google.com", 80);
			?>
			<!--
				<td>www.google.com</td><td><?php echo getHttpResponseCode_using_curl("www.websightdoosnotexist.com", false); ?></td>
			-->
		</tr>
	<!--	<tr>
			<td>See</td><td><?php
//$output = shell_exec('ping -c1 websightdoosnotexist.com');
//echo "<pre>$output</pre>";
?></td>
		</tr> -->
	</table>
</p>
<br>
<br>

<?php
	$from = 'about.php';
	include 'dc_footer.php';
?>
