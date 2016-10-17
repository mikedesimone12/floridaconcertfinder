<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Home</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Concert List </h1>
</div>
<div id="navigation">
<body>
</head>
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
<h1>Artist Spotlight<br></h1>
<h3>Polyphia<br></h3>
<iframe width="250" height="200" src="https://www.youtube.com/embed/lQJ3kfSlJN8" frameborder="0" allowfullscreen></iframe>
<p> Polyphia is a progressive rock quartet from Dallas, TX. They are an all-instrumental band, driven by complex yet catchy guitar melodies over drums and bass, 
as well as an occasional electronic background beat. Watch them play their song "Finale" for Audiotree Live. You can catch them
opening up for fellow progressive rock band, Coheed and Cambria, at the Florida Theater of Gainesville on September 30th!
</p>
</div>
<?php
echo '<div id="container">';
echo "<strong><br>Today is " . date("Y-m-d") . ". All concerts on or before this date will be deleted from the list." . "</strong><br><br>";
$currentdate = date("Y-m-d");
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);
if (!$connection) 
    die("Connection failed: " . $connection->connect_error);

mysql_select_db('florida_concert_finder');
?>

<form name = "homesort" method = "POST">
<strong>Sort by: <br>
Date<input name="sort_date" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Date ASC'?>">
Artist Name<input name="sort_artist" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY ArtistName ASC'?>">
Genre<input name="sort_genre" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Genre ASC'?>">
Venue Name<input name="sort_venue" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY VenueName ASC'?>">
City<input name="sort_city" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY City ASC'?>">
Time<input name="sort_time" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Time ASC'?>">
Average Price(low to high)<input name="sort_ticketlow" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice ASC'?>">
Average Price(high to low)</strong><input name="sort_tickethigh" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice DESC'?>">
<input name="submit" type="submit" value="Sort">

<?php
$query = "SELECT * FROM concert_list ORDER BY Date ASC";
$result = mysql_query($query);
if (isset($_POST['sort_artist']))
{
	$query = "SELECT * FROM concert_list ORDER BY ArtistName ASC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}
else if (isset($_POST['sort_genre']))
{
	$query = "SELECT * FROM concert_list ORDER BY Genre ASC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}
else if (isset($_POST['sort_venue']))
{
	$query = "SELECT * FROM concert_list ORDER BY VenueName ASC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}
else if (isset($_POST['sort_city']))
{
	$query = "SELECT * FROM concert_list ORDER BY City ASC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}
else if (isset($_POST['sort_time']))
{
	$query = "SELECT * FROM concert_list ORDER BY Time ASC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}
else if (isset($_POST['sort_ticketlow']))
{
	$query = "SELECT * FROM concert_list ORDER BY AveragePrice ASC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}
else if (isset($_POST['sort_tickethigh']))
{
	$query = "SELECT * FROM concert_list ORDER BY AveragePrice DESC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}
else if (isset($_POST['sort_date']))
{
	$query = "SELECT * FROM concert_list ORDER BY Date ASC";
	if (isset($_POST['submit']))
	{
		$result = mysql_query($query);
	}
}

echo '</form>';
echo '<table cellpadding="2" cellspacing="2" border="1"';
echo '<thead>
	<tr>
        <th>Date</th>
        <th>Artist Name</th>
        <th>Genre</th>
		<th>Venue Name</th>
		<th>City</th>
		<th>Time</th>
		<th>Price</th>
    </tr>
</thead></font>';
while($row = mysql_fetch_array($result))
{
	echo "<tr><td>" . $row['Date'] . "</td><td>" . $row['ArtistName'] . "</td><td>" . $row['Genre'] . "</td><td>" . $row['VenueName'] . "</td><td>" . $row['City'] . "</td><td>" . $row['Time'] . "</td><td>" . $row['AveragePrice'] . "</td></tr>";
	if($row['Date'] == $currentdate)
	{
		$query = "DELETE FROM 'concert_list' WHERE Date=$currentdate";		// if date has passed, delete concert
		
	}
}
echo "</table>";


mysql_close();

echo "</div>";
?>
</div>
<div id="footer">
<br>Note: If the venue is not a general admission venue, an approximated
median ticket price was calculated. These tickets would get you "decent" seats. <br><br>
Created by Michael DeSimone<br>
</div>
</body>
</html>