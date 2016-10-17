<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Venues</title>
<body>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Venue List <br></h1>
</div>
</head>
<div id="navigation">
<h4>Navigation</h4>		
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="search.php">Search</a></li>
<li><a href="addconcert.php">Add Concert</a></li>
<li><a href="updateconcert.php">Update Concert</a></li>
<li><a href="removeconcert.php">Remove Concert</a></li>
<li><a href="venues.php">Venues</a></li>
<li><a href="addvenue.php">Add Venue</a></li>
<li><a href="updatevenue.php">Update Venue</a></li>
<li><a href="removevenue.php">Remove Venue</a></li>
<li><a href="bookmark.php">Bookmark</a></li>
</ul>
</div>
<div id="extra">
<p>
<h1> <strong>Venue Links <br></h1>
<h3> <br>Tallahassee <br> </h3>
<a href="http://tallahassee.moonevents.com/">The Moon</a> <br>
<a href="http://thecentreoftallahassee.com/">The Pavilion</a> <br>
<a href="http://www.tuckerciviccenter.com/">Donald L. Tucker Civic Center</a> <br>
<a href="http://www.capitalcityamphitheater.com/">Capital City Amphitheater</a> <br> <br>
<h3> Tampa <br> </h3>
<a href="https://www.facebook.com/crowbarlive">Crowbar</a> <br>
<a href="http://www.theorpheum.com/">The Orpheum</a> <br>
<a href="http://www.fairgroundsamphitheatre.com/">Midflorida Credit Union Amphitheater</a> <br>
<a href="http://www.theritzybor.com/">The Ritz</a> <br>
<a href="http://www.jannuslive.com/">Jannus Live</a> <br> <br>
<h3> Ft. Lauderdale <br> </h3>
<a href="http://www.cultureroom.net/">Culture Room</a> <br>
<a href="http://pompanobeacharts.org/">Pompano Beach Amphitheater</a> <br> <br>
<h3> Gainesville <br> </h3>
<a href="http://www.highdivegainesville.com/">High Dive</a> <br>
<a href="http://eventful.com/gainesville/venues/the-venue-florida-theater-/V0-001-000215339-6">Florida Theater of Gainesville</a><br><br>
<h3> Miami <br> </h3>
<a href="http://www.aaarena.com/">American Airlines Arena</a> <br>
<a href="http://www.fillmoremb.com/">The Fillmore</a> <br> <br>
<h3> Orlando <br> </h3>
<a href="http://www.thesocial.org/">The Social</a> <br>
<a href="http://www.thebeacham.com/">The Beacham</a> <br>
<a href="http://www.amwaycenter.com/">Amway Center</a> <br>
<a href="http://www.houseofblues.com/orlando/">House of Blues</a> <br>
<a href="http://www.hardrock.com/live/locations/orlando/">Hard Rock Live</a> <br> <br>
<h3> St. Augustine <br> </h3>
<a href="https://www.staugamphitheatre.com/">St. Augustine Amphitheater</a> <br> <br>
<h3> Jacksonville <br> </h3>
<a href="http://www.1904musichall.com/">1904 Music Hall</a> <br>
<a href="http://jaxlive.com/events/">Jack Rabbit's</a> <br>
<a href="http://jaxevents.com/venues/veterans-memorial-arena/">Veteran's Memorial Arena</a> <br>
<a href="http://floridatheatre.com/">Florida Theatre</a> <br>
<a href="https://www.pvconcerthall.com/">Ponte Vedra Concert Hall</a> </strong><br> <br>
<br> <br>
</div>
<div id="container">
<?php
  
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);
if (!$connection) 
    die("Connection failed: " . $connection->connect_error);
mysql_select_db('florida_concert_finder');
$query = "SELECT * FROM `venue_list` ORDER BY VenueName";
$result = mysql_query($query);
echo '<table width="100%" cellpadding="2" cellspacing="2" border="1">';
echo '<thead>
	<tr>
        <th>Venue Name</th>
        <th>Street Address</th>
        <th>Zip Code</th>
		<th>City</th>
		<th>Capacity</th>
		<th>Seating Style</th>
    </tr>
</thead>';
while($row = mysql_fetch_array($result))
	echo "<tr><td>" . $row['VenueName'] . "</td><td>" . $row['StreetAddress'] . "</td><td>" . $row['ZipCode'] . "</td><td>" . $row['City'] . "</td><td>" . $row['Capacity'] . "</td><td>" . $row['SeatingStyle'] . "</td></tr>";
echo "</table>";
mysql_close();
?>
</div>
<div id="footer">
<br>Created by Michael DeSimone<br><br>
</div>
</p>
</body>
</html>



