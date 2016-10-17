<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Add Venue</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Add Venue </h1>
</div>
</head>
<body>
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
<div id="content">
<form name="addvenue" method="POST">
<p><font color="white"><br><strong>Please fill out all fields and click "add" to add a venue.<br> 
If successful, you will be redirected to the venue list.</strong><br></p>
<p><strong><br>Venue Name: <input type="text" name="venuename" size="30"/> <br> <br>
Street Address: <input type="text" name="streetaddress" size="30"/> <br> <br>
Zip Code: <input type="number" name="zipcode" size="30"/> <br> <br>
City: <input type="text" name="city" size="30"/> <br> <br>
Capacity: <input type="number" name="capacity" size="30"/> <br> <br>
Seating Style: 
<select name="seatingstyle">
<option value="GA">GA</option>
<option value="Assigned">Assigned</option>
<option value="Varies">Varies</font></strong></option>
</select> 
</p>
<br>
<input type="submit" name="submit" value="Add"/>
<br>
</form>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);

if (!$connection) 
	die("Connection failed: " . $connection->connect_error);

mysql_select_db('florida_concert_finder', $connection);

if(isset($_POST["submit"]) && !empty($_POST["venuename"])
	&& !empty($_POST["streetaddress"]) && !empty($_POST["zipcode"])
	&& !empty($_POST["city"]) && !empty($_POST["capacity"])
	&& !empty($_POST["seatingstyle"]))
	{
		$sql = "INSERT INTO venue_list (VenueName, StreetAddress, ZipCode, City,
		Capacity, SeatingStyle)
		VALUES ('$_POST[venuename]','$_POST[streetaddress]','$_POST[zipcode]','$_POST[city]',		
			'$_POST[capacity]', '$_POST[seatingstyle]')";
		if(!mysql_query($sql,$connection))
			die('Error: ' . mysql_error());
		if($sql){
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=venues.php\">";
		}
	}
if(isset($_POST["submit"]))
{
	
	if (empty($_POST["venuename"]) || empty($_POST["streetaddress"]) 
	|| empty($_POST["zipcode"])
	 || empty($_POST["city"]) || empty($_POST["capacity"])
	|| empty($_POST["seatingstyle"]))
		die ('Error: not all fields are filled. Try again!');
	
}

	mysql_close($connection);
?>
</div>
<div id="footer">
<br><font color="black">Created by Michael DeSimone<br><br></font>
</div>
</body>
</html>