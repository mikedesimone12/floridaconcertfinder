<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Remove Concert</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Remove Concert </h1>
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
<br><p><font color="white"><br><strong>Please check the concert(s) you would like to delete, and click "delete" to delete them.<br>
If successful, you will be redirected to the concert list.</strong></font><br><br>
</div>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);
if (!$connection) 
    die("Connection failed: " . $connection->connect_error);
mysql_select_db('florida_concert_finder');
?>
<div id="container">
<td><form name="deletevenue" method="post">
<table cellpadding="2" cellspacing="2" border="1">
<tr>
<td align="center" bgcolor= "#F5C269">#</td>
<td align="center" bgcolor= "#F5C269"><strong>Date</strong></td>
<td align="center" bgcolor= "#F5C269"><strong>Artist Name</strong></td>
<td align="center" bgcolor= "#F5C269"><strong>Genre</strong></td>
<td align="center" bgcolor= "#F5C269"><strong>Venue</strong></td>
<td align="center" bgcolor= "#F5C269"><strong>City</strong></td>
<td align="center" bgcolor= "#F5C269"><strong>Time</strong></td>
<td align="center" bgcolor= "#F5C269"><strong>Average Price</strong></td>
</tr>
<form name = "homesort" method = "POST">
<strong><br>Sort by:</strong> <br>
<strong>Date<input name="sort_date" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Date ASC'?>">
Artist Name<input name="sort_artist" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY ArtistName ASC'?>">
Genre<input name="sort_genre" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Genre ASC'?>">
Venue Name<input name="sort_venue" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY VenueName ASC'?>">
City<input name="sort_city" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY City ASC'?>">
Time<input name="sort_time" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Time ASC'?>">
Average Price(low to high)<input name="sort_ticketlow" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice ASC'?>">
Average Price(high to low)</strong><input name="sort_tickethigh" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice DESC'?>">
<input name="submit" type="submit" value="Sort">
<br><br><input name="delete" type="submit" value="Delete"></p>
<br>
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
$count = mysql_num_rows($result);
while ($row=mysql_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor= "#F5C269">
<input name="checkbox[]" type="checkbox" value="<?php echo $row['ID']; ?>"></td>
<td bgcolor= "#F5C269"><?php echo $row['Date']; ?></td>
<td bgcolor= "#F5C269"><?php echo $row['ArtistName']; ?></td>
<td bgcolor= "#F5C269"><?php echo $row['Genre']; ?></td>
<td bgcolor= "#F5C269"><?php echo $row['VenueName']; ?></td>
<td bgcolor= "#F5C269"><?php echo $row['City']; ?></td>
<td bgcolor= "#F5C269"><?php echo $row['Time']; ?></td>
<td bgcolor= "#F5C269"><?php echo $row['AveragePrice']; ?></td>
</tr>

<?php
}
?>

<?php


if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];

	for($i=0;$i<count($checkbox);$i++){

	$deleteID= $checkbox[$i];
	$sql = "DELETE FROM concert_list WHERE ID='$deleteID'";
	$result = mysql_query($sql);

	}

	if($result){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=home.php\">";
	}
}

mysql_close($connection);

?>

</table>
</form>
</div>
<div id="footer">
<br>Created by Michael DeSimone<br><br>
</div>
</body>
</html>