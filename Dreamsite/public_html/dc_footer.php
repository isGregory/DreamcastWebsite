<?php
//dc_footer.php
require_once 'format.php';
?>
							</td>
						</tr>
					</table>

				</tr>
				<tr bgcolor="<?php echo $tHead; ?>">
					<td align="center">
						<font size="1">
							<br>
							<?php
								date_default_timezone_set('UTC');
								echo "Last modified: " . date( "Y-n-j g:i:s A T", filemtime( $from ) ) . "<br>";
								echo "Design Copyright &copy; 2014 - " . date("Y") . " Gregory Hoople<br>";
							?>
							<br>
						</font>
					</td>
				</tr>
			</table>
		</font>
	</body>
</html>
