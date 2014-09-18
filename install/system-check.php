<?php
    $phpVersion = phpversion();
	$phpError = false;
	if($phpVersion < 5) $phpError = true;

	function getSQLVersion()
    {
  		$output = shell_exec('mysql -V');    
  		preg_match('@[0-9]+\.[0-9]+\.[0-9]+@', $output, $version); 
  		return @$version[0] ? $version[0] : -1;
	}

	$sqlVersion = getSQLVersion();

	if($sqlVersion < 5)
    {
		if($sqlVersion == -1) $sqlError = "<span style=\"color:orangered\">MySQL version will be checked at the next step.</span>";
		else $sqlError = "<span style=\"color:orangered\">MySQL version is $sqlVersion.</span>";
	}

	$safemodeError = false;
	if(ini_get("safe_mode"))
    {
		$safemodeError = true;
		$safemodeError = "Please switch of PHP Safe Mode";
	}

    $sessionError = false;
	$_SESSION['sessions_work'] = 1;
	if(empty($_SESSION['sessions_work'])) $sessionError = true;
?>

<div class = "system-check">
    <h2>Checking your system configuration</h2>
	<br>
	<table border = "0">
		<tr>
			<th>Feature</th>
            <th>Needed</th>
			<th>Status</th>
		</tr>
		<tr>
			<td>PHP</td>
            <td>Version 5 or later</td>
			<td>
				<?php
                    if ($phpError == true) "<span style = \"color:orangered\">PHP version is $phpVersion.</span>";
					else echo "<span style = \"color:limegreen\">OK!</span>";
				?>
			</td>
		<tr>
			<td>MySQL</td>
            <td>Version 5 or later</td>
			<td>
				<?php
					echo $sqlError == null ? "<span style = \"color:limegreen\">OK!</span>" : $sqlError;
				?>
			</td>
		</tr>
		<tr>
			<td>PHP Safe Mode</td>
            <td>Must be off</td>
			<td>
				<?php
					if ($safemodeError == true) echo "<span style = \"color:orangered\">Please switch off PHP Safe Mode!</span>";
					else echo "<span style = \"color:limegreen\">OK!</span>";
				?>
			</td>
		</tr>
		<tr>
			<td>PHP Sessions</td>
            <td>Must work correctly</td>
			<td>
				<?php
					if ($sessionError == true) echo "<span style = \"color:orangered\">Please fix the sessions first!</span>";
					else echo "<span style = \"color:limegreen\">OK!</span>";
				?>
			</td>
		</tr>
	</table>
    <br>
	<?php
		if ($phpError == false && $safemodeError == false && $sessionError == false) echo "<button class = 'button' name = \"system-check\" id = \"system-check\">Continue</button>";
        else echo "<span style = \"color:orangered\">Please fix the errors first!</span>";
	?>
</div>