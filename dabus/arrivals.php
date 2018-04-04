<?php
$key = $_POST["key"];
$stop = $_POST["stop"];
$url = "http://api.thebus.org/arrivals/?key=19CA8163-2802-4B00-B592-79B7EBBB490D&stop=$stop";
$sxml = simplexml_load_file($url);
$time = $sxml->arrival[0]->stopTime;
$headsign = $sxml->arrival[0]->headsign; 
$number = $sxml->arrival[0]->vehicle;
/* print_r($sxml);*/ 
echo "<p>The next Bus arrives at $time</p>";
echo "<p>Bus:$headsign</p>";
echo "<p>Number:$number</p>";
?>
<table border="1" cellpadding="10" style="margin: 20px auto;">
	<tr>
		<th>Number</th>
		<th>Route</th>
		<th>Arrival</th>
	</tr>
	<?php
	for ($x = 0; $x <=25; $x++) {
		echo "<tr>";
		echo "<td>".$sxml->arrival[$x]->route."</td>";
		echo "<td>".$sxml->arrival[$x]->headsign."</td>";
		echo "<td>".$sxml->arrival[$x]->stopTime."</td>";
		echo "</tr>";
	}
	?>
</table>
