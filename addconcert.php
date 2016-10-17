<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Add Concert</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Add Concert </h1>
</div>
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
<form name="addconcert" method="POST">

<p><font color="white"><br><strong>Please fill out all fields and click "add" to add a concert.<br>
If successful, you will be redirected to the concert list.</strong></p>
<p><strong>Date (YYYY-MM-DD):</strong> <input type="date" name="date" size="30"/></p>
<p><strong>Artist Name:</strong> <input type="text" name="artistname" size="30"/></p>
<p><strong>Genre: </strong>
<select name = "genre">
<option value="">Select Genre</option>
<option value="Alternative">Alternative</option>
<option value="Blues">Blues</option>
<option value="Classic Rock">Classic Rock</option>
<option value="Country">Country</option>
<option value="Electronic">Electronic</option>
<option value="Jazz">Jazz</option>
<option value="Metal">Metal</option>
<option value="Pop">Pop</option>
<option value="R&B/Soul">R&B/Soul</option>
<option value="Rap">Rap</option>
<option value="Reggae">Reggae</option>
<option value="Rock">Rock</option>
</select> 
</p>

<p><strong>Venue: </strong><input type="text" name="venuename" size="30"/></p>
<p><strong>City: </strong><input type="text" name="city" size="30"/></p>
<p><strong>Time (HH:MM): </strong> <input type="time" name="time" size="30"/></p>
<p><strong>Average Ticket Price:</strong> </font><input type="number" name="averageprice" size="30"/></p>
<br><input type="submit" name="submit" value="Add"/>
</form>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);

if (!$connection) 
	die("Connection failed: " . $connection->connect_error);

mysql_select_db('florida_concert_finder', $connection);

if(isset($_POST["submit"]) && !empty($_POST["date"])
	&& !empty($_POST["artistname"]) && !empty($_POST["genre"])
	&& !empty($_POST["venuename"]) && !empty($_POST["city"])
	&& !empty($_POST["time"]) && !empty($_POST["averageprice"]))
	{
		$sql = "INSERT INTO concert_list (Date, ArtistName, Genre, VenueName, City, Time, AveragePrice)
		VALUES ('$_POST[date]','$_POST[artistname]','$_POST[genre]','$_POST[venuename]',		
			'$_POST[city]', '$_POST[time]', '$_POST[averageprice]')";
		if(!mysql_query($sql,$connection))
			die('Error: ' . mysql_error());
		if($sql){
		echo "<meta http-equiv=\"refresh\" content=\"0;URL=home.php\">";
		}
	}
if (isset($_POST["submit"])) 
{
	if (empty($_POST["date"]) || empty($_POST["artistname"]) || empty($_POST["genre"])
	|| empty($_POST["venuename"]) || empty($_POST["city"])
	|| empty($_POST["time"]) || empty($_POST["averageprice"]))
		echo ("Error: not all fields are filled. Try again!");
}
	mysql_close($connection);
?>
</div>
<footer>
<div id="footer">
<br>Created by Michael DeSimone<br><br>
</footer>
</div>
</body>
</html>
