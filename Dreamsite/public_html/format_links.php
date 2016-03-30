<?php
// format_links.php


	// Names defined in "lookup_game.php"
	function callLinkFunction( $name ) {
		if ( JET_GRIND_RADIO === $name ) {
			links_JGR();
		} else if ( PHANTASY_STAR_ONLINE_V1 === $name ) {
			links_PSO();
		} else if ( PHANTASY_STAR_ONLINE_V2 === $name ) {
			links_PSO();
		} else if ( SHENMUE === $name ) {
			links_shenmue();
		} else if ( SONIC_ADVENTURE === $name ) {
			links_sa1();
		} else if ( SONIC_ADVENTURE_2 === $name ) {
			links_sa2();
		} else {
			return false;
		}
		return true;
	}

	// Print the entry for the index.
	function printLinkEntry( $name ) {
		?>
			<tr bgcolor="<?php echo ac(); ?>">
				<td align='center'>
					<a href='links_list.php?n=<?php echo $name; ?>'
						style='text-decoration:none'>
						<?php echo getGameName( $name ); ?>
					</a>
				</td>
			</tr>
		<?php
	}

	// Website links of Jet Grind Radio
	function links_JGR() {
		?>
		<p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
			<p align="left">
				These are websites that are accessable through
				in-game menus. Only the Japanese site is known to have been
				backed up.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'USA Site', 'jetgrindradio.web.dreamcast.com');
					linkEntry( 'European Site', 'jetsetradio.dream-key.com');
					linkEntry( 'Japanese Site', 'jet.dricas.ne.jp');
				linkCloseTable();
			?>
		</p>
		<?php
	}

	// Website links of Phantasy Star Online
	function links_PSO() {
		?>
		<p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
			<p align="left">
				These are websites that are accessable through in-game menus.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'Main Site', 'pso.dricas.ne.jp');
					linkEntry( 'Buying a Hunter License', 'www.dricas.com/pso/signup_top.html');
				linkCloseTable();
			?>
		</p>

		<hr>

		<p><h3 align="left"><u><a id="eweb">External Websites</a></u></h3>
			<p align="left">
				These are links to official websites that hosted
				supplemental information about the game.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'Sega Game Page', 'score.sega.com/games/phantasystaronline/');
					linkEntry( 'Sonic Team Site', 'www.sonicteam.com/pso/english/home.html');
				linkCloseTable();
			?>
		</p>
		<?php
	}

	// Website links of Shenmue
	function links_shenmue() {
		?>
		<p align="left"><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
			<p align="left">
				This was a website that are accessable through
				the Passport included as Disc 4.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'USA Site', 'passport.shenmue.com');
				linkCloseTable();
			?>
		</p>
		<?php
	}

	// Website links of Sonic Adventure 1
	function links_sa1() {
		?>
		<p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
			<p align="left">
				These are websites that are accessable through
				in-game menus.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'Main Site', 'sonic.games.dreamcast.com' );
				linkCloseTable();
			?>
		</p>

		<hr>

		<p><h3 align="left"><u><a id="eweb">External Websites</a></u></h3>
			<p align="left">
				These are links to official websites that hosted
				supplemental information about the game.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'Name', 'www.link.com');
				linkCloseTable();
			?>
		</p>
		<?php
	}

	// Website links of Sonic Adventure 2
	function links_sa2() {
		?>
		<p><h3 align="left"><u><a id="gweb">In-Game Websites</a></u></h3>
			<p align="left">
				These are websites that are accessable through
				in-game menus.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'Main Site', 'sonic.dricas.ne.jp' );
					linkEntry( 'Chao Daycare', 'tails03.sonicteam.com/daycare/en/index.html' );
				linkCloseTable();
			?>
		</p>

		<hr>

		<p><h3 align="left"><u><a id="eweb">External Websites</a></u></h3>
			<p align="left">
				These are links to official websites that hosted
				supplemental information about the game.
			</p>
			<?php
				linkOpenTable();
					linkEntry( 'Sega Launch Page', 'www.sega.com/sega/game/sonic2_launch.jhtml');
					linkEntry( 'Sega Game Page', 'score.sega.com/games/Sonic2/Sonic2.html');
					linkEntry( 'Sonic Team Site', 'www.sonicteam.com/sonicadv2/index_e.html');
				linkCloseTable();
			?>
		</p>
		<?php
	}
?>
