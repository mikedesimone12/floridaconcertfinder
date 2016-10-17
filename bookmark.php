<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Bookmark</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Bookmark </h1>
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
<br><br><p><strong><font color="white">Put a check in the box next to each concert you would like to bookmark.<br>
Then enter your e-mail address and click "bookmark" to be sent
<br> an e-mail containing your bookmarked concerts.</strong></font><br><br>
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
?>

<td><form name="deletevenue" method="post"></td>
<table cellpadding="2" cellspacing="2" border="1">
<tr>
<td align="center" bgcolor="#F5C269">#</td>
<td align="center" bgcolor="#F5C269"><strong>Date</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Artist Name</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Genre</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Venue</strong></td>
<td align="center" bgcolor="#F5C269"><strong>City</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Time</strong></td>
<td align="center" bgcolor="#F5C269"><strong>Average Price</strong></td>
</tr>
<form name = "homesort" method = "POST">
<strong><br>Sort by:</strong> <br>
Date<input name="sort_date" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Date ASC'?>">
Artist Name<input name="sort_artist" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY ArtistName ASC'?>">
Genre<input name="sort_genre" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Genre ASC'?>">
Venue Name<input name="sort_venue" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY VenueName ASC'?>">
City<input name="sort_city" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY City ASC'?>">
Time<input name="sort_time" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY Time ASC'?>">
Average Price(low to high)<input name="sort_ticketlow" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice ASC'?>">
Average Price(high to low)<input name="sort_tickethigh" type="radio" value="<?php echo 'SELECT * FROM concert_list ORDER BY AveragePrice DESC'?>">
<input name="submit" type="submit" value="Sort"><br><br><br>
<strong>E-mail Address: </strong><input name="email" type="text"><br>
<br><input name="bookmark" type="submit" value="Bookmark"><br><br>
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
<td align="center" bgcolor="#F5C269">
<input name="checkbox[]" type="checkbox" value="<?php echo $row['ID']; ?>"></td>
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


if(isset($_POST['bookmark']))
{
	if(!empty($_POST['email']))
	{
		$email = $_POST['email'];
		$checkbox = $_POST['checkbox'];
		$message = "<html><table>";
		$message .= '<table cellpadding="2" cellspacing="2" border="1"';
		$message .= '<thead>
			<tr>
				<th>Date</th>
				<th>Artist Name</th>
				<th>Genre</th>
				<th>Venue Name</th>
				<th>City</th>
				<th>Time</th>
				<th>Price</th>
			</tr>
		</thead>';
		for($i=0;$i<count($checkbox);$i++)
		{
			$selectID = $checkbox[$i];
			$sql = "SELECT * FROM concert_list WHERE ID='$selectID';";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result))
			{
			$message .= "<tr><td>" . $row['Date'] . "</td><td>" . $row['ArtistName'] . "</td><td>" . $row['Genre'] . "</td><td>" . $row['VenueName'] . "</td><td>" . $row['City'] . "</td><td>" . $row['Time'] . "</td><td>" . $row['AveragePrice'] . "</td></tr>";
			}
		}
		$message .= "</table> </html>";
		$subject = "Your Bookmarked Concerts!";
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		mail($email, $subject, $message, $headers);
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