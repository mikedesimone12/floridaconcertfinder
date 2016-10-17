<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Remove Venue</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Remove Venue </h1>
</div>
</head>
<body>
<div id="content">
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
<br><br><p><font color="white"><strong>Please check the venue(s) you would like to delete, and click "delete" to delete them.
<br>
If successful, you will be redirected to the venue list.</strong></font><br><br>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);
if (!$connection) 
    die("Connection failed: " . $connection->connect_error);
mysql_select_db('florida_concert_finder');
$query = "SELECT * FROM venue_list ORDER BY VenueName";
$result = mysql_query($query);
$count = mysql_num_rows($result);
?>
</div>
<div id="container">
<td><form name="deletevenue" method="post">
<br><input name="delete" type="submit" value="Delete"><br><br>
<table width="100%" cellpadding="2" cellspacing="2" border="1">
<tr>
<td align="center" bgcolor="#F5C269">#</td>
<td align="center" bgcolor="#F5C269"><strong>Venue Name</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Street Address</strong></td>
<td align="center" bgcolor="#F5C269"><strong>City</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Zip Code</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Capacity</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Seating Style</strong></td>
</tr>

<?php

while ($row=mysql_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#F5C269">
<input name="checkbox[]" type="checkbox" value="<?php echo $row['VenueName']; ?>"></td>
<td bgcolor="#F5C269"><?php echo $row['VenueName']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['StreetAddress']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['City']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['ZipCode']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['Capacity']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['SeatingStyle']; ?></td>
</tr>

<?php
}
?>


<?php


if(isset($_POST['delete']))
{
    $checkbox = $_POST['checkbox'];

	for($i=0;$i<count($checkbox);$i++){

	$deletename = $checkbox[$i];
	$sql = "DELETE FROM venue_list WHERE VenueName='$deletename'";
	$result = mysql_query($sql);

	}

	if($result){
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=venues.php\">";
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