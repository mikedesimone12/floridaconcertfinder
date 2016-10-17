<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Update Venue</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Update Venue </h1>
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
<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);

if (!$connection) 
	die("Connection failed: " . $connection->connect_error);


mysql_select_db('florida_concert_finder', $connection);
?>
<div id="content">
<p><strong><br><font color="white">Please fill out all fields, select the venue you wish to update, <br> and click "update"
to update a venue.<br>
If successful, you will be redirected to the venue list.</strong></p><br>
<form name="update_fields" method="POST"> 
<p><strong>Venue Name:</strong> <input type="text" name="venuename" size="30"/> <br> <br>
<strong>Street Address: </strong><input type="text" name="streetaddress" size="30"/> <br> <br>
<strong>Zip Code:</strong> <input type="number" name="zipcode" size="30"/> <br> <br>
<strong>City:</strong> <input type="text" name="city" size="30"/> <br> <br>
<strong>Capacity:</strong> <input type="number" name="capacity" size="30"/> <br> <br>
<strong>Seating Style: </strong>
<select name="seatingstyle">
<option value="GA">GA</option>
<option value="Assigned">Assigned</option>
<option value="Varies">Varies</option></font>
</select> 
</p>
<br>
<input type="submit" name="update" value="Update"/>
<br>
</div>
<div id="container">

<?php
echo '<table width="100%" cellpadding="2" cellspacing="2" border="1"';
echo '<thead>
	<tr>
		<th>#</th>
		<th>Venue Name</th>
        <th>Street Address</th>
        <th>Zip Code</th>
        <th>City</th>
		<th>Capacity</th>
		<th>Seating Style</th>
    </tr>
</thead>';
$query = "SELECT * FROM venue_list ORDER BY VenueName";
$result = mysql_query($query);
while ($row=mysql_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#F5C269">

<input type="radio" name="updatesel" value="<?php echo $row['VenueName'] ?>"></td>
<td bgcolor="#F5C269"><?php echo $row['VenueName']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['StreetAddress']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['ZipCode']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['City']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['Capacity']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['SeatingStyle']; ?></td>
</tr>

<?php
}
?>
<?php
if (!empty($_POST['venuename']) && !empty($_POST['streetaddress']) && !empty($_POST['zipcode']) &&
	!empty($_POST['city']) && !empty($_POST['capacity']) && !empty($_POST['seatingstyle']) 
	&& isset($_POST['update']))
{
	$query = "UPDATE venue_list 
	SET  VenueName='$_POST[venuename]', StreetAddress='$_POST[streetaddress]', ZipCode='$_POST[genre]', City='$_POST[city]',
	Capacity='$_POST[capacity]', SeatingStyle='$_POST[seatingstyle]'
	WHERE VenueName='$_POST[updatesel]';";
	$result = mysql_query($query);
	if($result)
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=venues.php\">";
}
mysql_close();
?>
</div>
</form>
</body>
</html>