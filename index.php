<?php
	if (file_exists("./install/index.php")) {
		header("Location: ./install");
		die();
	} else {
	include("inc/connect.php");
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>
			<?php
				$title = mysqli_query($con, "SELECT `Title` FROM `settings` WHERE 1");

				$row = mysqli_fetch_array($title);
				
				echo $row['Title'];
		 	?>
		 </title>
		<link rel="stylesheet" type="text/css" href="design/dl_style.css" />
	</head>
	<body>
		<?php
			include("header.php");
		?>
		<h2>Promotions</h2>
			<table border="0">
				<tbody>
					<tr>
						<th>Promotion</th>
						<th>Version</th>
						<th>Minecraft</th>
						<th>Downloads</th>
						<th>Forum</th>
					</tr>
					<?php
						$promotion = mysqli_query($con, "SELECT * FROM `promotions`");

						while($row = mysqli_fetch_array($promotion)) {
							echo "<tr>";
							echo "<td>" . $row['Promotion'] . "</td>";
							echo "<td>" . $row['Version'] . "</td>";
							echo "<td>" . $row['Minecraft'] . "</td>";
							echo "<td>";
							if (!empty($row['Changelog'])) {
								echo "(<a href=\"" . $row['Changelog'] . "\">changelog</a>) ";
							}
							if (!empty($row['dev'])) {
								echo "(<a href=\"" . $row['dev'] . "\">dev</a>) ";
							}
							if (!empty($row['javadoc'])) {
								echo "(<a href=\"" . $row['javadoc'] . "\">javadoc</a>) ";
							}
							if (!empty($row['src'])) {
								echo "(<a href=\"" . $row['src'] . "\">src</a>) ";
							}
							if (!empty($row['universal'])) {
								echo "(<a href=\"" . $row['universal'] . "\">universal</a>) ";
							}
							echo "</td>";
							echo "<td>";
							if (!empty($row['mcf'])) {
								echo "(<a href=\"" . $row['mcf'] . "\">MCF</a>) ";
							}
							if (!empty($row['pmc'])) {
								echo "(<a href=\"" . $row['pmc'] . "\">PMC</a>) ";
  							}
							echo "</tr>";
						}
					?>
			</tbody>
		</table>
		<?php
			$tables = mysqli_query($con, "SELECT table_name FROM information_schema.tables WHERE table_type = 'BASE TABLE' AND table_schema='$db_name' ORDER BY table_name DESC");

			while($row = mysqli_fetch_array($tables)) {
				if($row[0] == "settings" || $row[0] == "promotions") {

				} else {
					echo "<div>";
					echo "<h2>" . $row[0] ."</h2>";
					echo "<table border=\"0\">";
					echo "<tbody>";
					echo "<tr>";
					echo "<th>Mod</th>";
					echo "<th>Version</th>";
					echo "<th>Minecraft</th>";
					echo "<th>Downloads</th>";
					echo "<th>Forum</th>";
					echo "</tr>";

					$Mod = mysqli_query($con, "SELECT * FROM `" . $row[0] ."`");

					
					while ($row1 = mysqli_fetch_array($Mod)) {
							echo "<div>";
							echo "<tr>";
							echo "<td>" . $row1['Mod'] . "</td>";
							echo "<td>" . $row1['Version'] . "</td>";
							echo "<td>" . $row1['Minecraft'] . "</td>";
							echo "<td>";
							if (!empty($row1['Changelog'])) {
								echo "(<a href=\"" . $row1['Changelog'] . "\">changelog</a>) ";
							}
							if (!empty($row1['dev'])) {
								echo "(<a href=\"" . $row1['dev'] . "\">dev</a>) ";
							}
							if (!empty($row1['javadoc'])) {
								echo "(<a href=\"" . $row1['javadoc'] . "\">javadoc</a>) ";
							}
							if (!empty($row1['src'])) {
								echo "(<a href=\"" . $row1['src'] . "\">src</a>) ";
							}
							if (!empty($row1['universal'])) {
								echo "(<a href=\"" . $row1['universal'] . "\">universal</a>) ";
							}
							echo "</td>";
							echo "<td>";
							if (!empty($row1['mcf'])) {
								echo "(<a href=\"" . $row1['mcf'] . "\">MCF</a>) ";
							}
							if (!empty($row1['pmc'])) {
								echo "(<a href=\"" . $row1['pmc'] . "\">PMC</a>) ";
  							}
							echo "</tr>";
				}
					echo "</tbody>";
					echo "</table>";
					echo "</div>";
				}
			}
		?>
		<?php
			include("footer.php");
			}
		?>
	</body>
</html>
