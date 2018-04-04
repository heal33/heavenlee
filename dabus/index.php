
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["stop"])) {
		$err = "Stop is required";
	} else {
		$stop = $_POST["stop"];
		$url = "http://api.thebus.org/arrivals/?key=19CA8163-2802-4B00-B592-79B7EBBB490D&stop=$stop";
		$sxml = simplexml_load_file($url);
		$time = $sxml->arrival[0]->stopTime;
		$headsign = $sxml->arrival[0]->headsign; 
		$number = $sxml->arrival[0]->vehicle;
		$length = count($sxml->arrival);
		/* print_r($sxml);*/ 
	}
}


?>

<html>
<body>
	<div style="width: 500px; margin: 20 auto;">
	<h1>Find Arrival Times</h1>
	<p>Popular stops:<br>Ala Moana: 428<br>Mililani Town Center: 4419</p>
	<p>Enter Stop number:</p>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		<input type="text" name="stop" value="" maxlength="4" size="8" style="padding: 10px; text-align: center;"> <button type="submit" style="padding: 10px;">Submit</button><br>
		<span class="error" style="color: red;"><?php echo $err;?></span>
		
	</form>

	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		echo '<table border="1" cellpadding="10">';
		echo '<tr>';
		echo '<th>Number</th>';
		echo '<th>Route</th>';
		echo '<th>Arrival</th>';
		echo '</tr>';
		for ($x = 0; $x < $length; $x++) {
			echo "<tr>";
			echo "<td>".$sxml->arrival[$x]->route."</td>";
			echo "<td>".$sxml->arrival[$x]->headsign."</td>";
			echo "<td>".$sxml->arrival[$x]->stopTime."</td>";
			echo "</tr>";
		}
		echo '</table>';


	}
	?>
	</div>

</body>
</html>

