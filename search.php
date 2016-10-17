<html>
<head>
<link rel="icon" href="http://individual.icons-land.com/IconsPreview/Multimedia/PNG/256x256/Stage_Theater.png">
<link rel="stylesheet" href="styles.css">
<title>Florida Concert Finder - Search</title>
<div id="header">
<h1><strong>Florida Concert Finder </strong><br><br></h1>
</div>
<div id="header">
<h1> Search </h1>
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
<div id="content">
<form name="concert_search" method="POST">
<p><font color="white"><br><strong>Please fill out all fields and click "search" to search for a concert.</strong><br></p>
<p><br><strong>Date (YYYY-MM-DD): </strong><input type="date" name="date" size="30"/></p>
<p><strong>Artist Name: </strong><input type="text" name="artistname" size="30"/></p>
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

<p><strong>Venue Name:</strong> <input type="text" name="venuename" size="30"/></p>
<p><strong>City:</strong> <input type="text" name="city" size="30"/></p>
<p><strong>Time (HH:MM):</strong> <input type="time" name="time" size="30"/></p>
<p><strong>Ticket Price Range (low - high): </strong></font><input type="number" name="ticketlow" size="30"/>   <input type="number" name="tickethigh" size="30"/></p>

<input type="submit" name="submit" value="Search"/>
</div>
<div id="container">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$connection = mysql_connect($servername, $username, $password);

if (!$connection) 
	die("Connection failed: " . $connection->connect_error);

mysql_select_db('florida_concert_finder', $connection);

if(isset($_POST["submit"]))
	{
		$sql= "SELECT * FROM concert_list WHERE 1=1";
		if(!empty($_POST['date']))
			$sql .= " AND Date LIKE '%$_POST[date]%'";

		if(!empty($_POST['artistname']))
			$sql .= " AND ArtistName LIKE '%$_POST[artistname]%'";
		
		if(!empty($_POST['genre']))
			$sql .= " AND Genre LIKE '%$_POST[genre]%'";
		
		if(!empty($_POST['venuename']))
			$sql .= " AND VenueName LIKE '%$_POST[venuename]%'";
		
		if(!empty($_POST['city']))
			$sql .= " AND City LIKE '%$_POST[city]%'";
		
		if(!empty($_POST['time']))
			$sql .= " AND Time LIKE '%$_POST[time]%'";
		
		if(!empty($_POST['ticketlow']) && !empty($_POST['tickethigh']))
			$sql .= " AND AveragePrice BETWEEN '$_POST[ticketlow]' AND '$_POST[tickethigh]' ORDER BY AveragePrice ASC";
		
		$sql .= ";";
		$result = mysql_query($sql);
		echo '</form>';
	echo '<table width= "100%" bgcolor= "#F5C269" cellpadding="2" cellspacing="2" border="1"';
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
	</thead>';
	while($row = mysql_fetch_array($result))
		{
		echo "<tr><td>" . $row['Date'] . "</td><td>" . $row['ArtistName'] . "</td><td>" . $row['Genre'] . "</td><td>" . $row['VenueName'] . "</td><td>" . $row['City'] . "</td><td>" . $row['Time'] . "</td><td>" . $row['AveragePrice'] . "</td></tr>";

		}
	echo "</table>";
	}

mysql_close();


?>
</div>
<div id="footer">
<br>Created by Michael DeSimone<br><br>
</div>
</body>
</html>