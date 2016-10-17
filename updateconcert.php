<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Update Concert</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Update Concert </h1>
</div>
<div id="navigation">
<body>
</head>
<h4>Navigation</h4>
<ul>
<li><a href="home.php">Home</a></li>
<li><a href="search.php">Search</a></li>
<li><a href="addconcert.php">Add Concert</a></li>		<!--navigation bar to left of screen-->
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
<p><strong><br><font color="white">Please fill out all fields, select the concert you wish to update, <br>and click "update"
to update a concert. <br>If successful, you will be redirected to the concert list.</strong></p>
<form name="update_fields" method="POST">
<p><br><strong>Date (YYYY-MM-DD):</strong> <input type="date" name="date" size="30"/></p>
<p><strong>Artist Name: </strong><input type="text" name="artistname" size="30"/></p>
<p><strong>Genre: </strong>
<select name = "genre">
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

<p><strong>Venue Name: </strong><input type="text" name="venuename" size="30"/></p>
<p><strong>City: </strong><input type="text" name="city" size="30"/></p>
<p><strong>Time (HH:MM): </strong><input type="time" name="time" size="30"/></p>
<p><strong>Average Ticket Price: </strong></font><input type="number" name="averageprice" size="30"/></p>

<input type="submit" name="update" value="Update"/>
</div>
<div id="container">
<form name = "homesort" method = "POST">
<strong><br>Sort by: <br>
Date<input name="sort_date" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Date ASC'?>">
Artist Name<input name="sort_artist" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY ArtistName ASC'?>">
Genre<input name="sort_genre" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Genre ASC'?>">
Venue Name<input name="sort_venue" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY VenueName ASC'?>">
City<input name="sort_city" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY City ASC'?>">
Time<input name="sort_time" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Time ASC'?>">
Average Price(low to high)<input name="sort_ticketlow" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice ASC'?>">
Average Price(high to low)</strong><input name="sort_tickethigh" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice DESC'?>">
<input name="submit" type="submit" value="Sort">
<br><br>
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

echo '<table bgcolor= "#F5C269" cellpadding="2" cellspacing="2" border="1"';
echo '<thead>
	<tr>
		<th>#</th>
        <th>Date</th>
        <th>Artist Name</th>
        <th>Genre</th>
		<th>Venue Name</th>
		<th>City</th>
		<th>Time</th>
		<th>Price</th>
    </tr>
</thead>';
while ($row=mysql_fetch_array($result)) {
?>

<tr>
<td align="center" bgcolor="#F5C269">

<input type="radio" name="updatesel" value="<?php echo $row['ID'] ?>"></td>
<td bgcolor="#F5C269"><?php echo $row['Date']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['ArtistName']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['Genre']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['VenueName']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['City']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['Time']; ?></td>
<td bgcolor="#F5C269"><?php echo $row['AveragePrice']; ?></td>
</tr>

<?php
}
?>
<?php
if (!empty($_POST['date']) && !empty($_POST['artistname']) && !empty($_POST['genre']) &&
	!empty($_POST['venuename']) && !empty($_POST['city']) && !empty($_POST['time']) &&
	!empty($_POST['averageprice']) && isset($_POST['update']))
{
	$query = "UPDATE concert_list 
	SET  Date='$_POST[date]', ArtistName='$_POST[artistname]', Genre='$_POST[genre]', VenueName='$_POST[venuename]',
	City='$_POST[city]', Time='$_POST[time]', AveragePrice='$_POST[averageprice]'
	WHERE ID='$_POST[updatesel]';";
	$result = mysql_query($query);
	if($result)
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=home.php\">";
}
mysql_close();
?>
</div>
</form>
</body>
</html>