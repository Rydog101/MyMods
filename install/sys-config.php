<?php
	$php_version=phpversion();
	$php_error = false;
	if($php_version<5) {
		$php_error = true;
	}

	function find_SQL_Version() { 
  		$output = shell_exec('mysql -V');    
  		preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version); 
  		return @$version[0]?$version[0]:-1; 
	}

	$mysql_version=find_SQL_Version();

	if($mysql_version<5) {
		if($mysql_version==-1) $mysql_error="<span style=\"color:red\">MySQL version will be checked at the next step.</span>";
		else $mysql_error="<span style=\"color:red\">MySQL version is $mysql_version. Version 5 or newer is required.</span>";
	}

	$safe_mode_error = false;
	if(ini_get("safe_mode")){
		$safe_mode_error=true;
		$safe_mode_error="Please switch of PHP Safe Mode";
	}

	$session_error=false;
	$_SESSION['sessions_work']=1;
	if(empty($_SESSION['sessions_work'])) {
	  $session_error=true;
	}
?>

<div class="sys-config">
	<br>
	<h2>Checking your system configuration</h2>
	<br>
	<table border="0">
		<tr>
			<th>Feature</th>
			<th>Status</th>
		</tr>
		<tr>
			<td>PHP Version (Must be 5 or later)</td>
			<td>
				<?php 
					if ($php_error==true) {
						echo "<span style=\"color:red\">PHP version is ". $php_version ." - too old!</span>";
					} else {
						echo "<span style=\"color:green\">" . phpversion() . " - OK!</span>";
					}
				?>
			</td>
		<tr>
			<td>MySQL Version (Must be 5 or later)</td>
			<td>
				<?php
					echo $mysql_error;
				?>
			</td>
		</tr>
		<tr>
			<td>PHP "safe mode" must be off</td>
			<td>
				<?php
					if ($safe_mode_error==true) {
						echo "<span style=\"color:red\">Please switch off PHP Safe Mode!</span>";
					} else {
						echo "<span style=\"color:green\">OK!</span>";
					}
				?>
			</td>
		</tr>
		<tr>
			<td>PHP sessions must work</td>
			<td>
				<?php
					if ($session_error==true) {
						echo "<span style=\"color:red\">Sessions must be enabled!</span>";
					} else {
						echo "<span style=\"color:green\">OK!</span>";
					}
				?>
			</td>
		</tr>
	</table>
	<?php
		if ($php_error==false && $safe_mode_error==false && $session_error==false) {
			echo "<input type=\"submit\" value=\"Continue\" name=\"sys-config\" id=\"sys-config\"></input>";
		} else {
			echo "<input type=\"submit\" value=\"Continue\" disabled></input>";
		}
	?>
	<br>
	<br>
	<br>
</div>
