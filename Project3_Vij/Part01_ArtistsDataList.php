<?php
require_once("includes/config.php");
//now we can use our config file
include(ROOT_PATH . "includes/header.php");
include(ROOT_PATH . "includes/footer.php");
?>
<!DOCTYPE html>
 <html>
  <body>
  <div class="container" id="1a">
  	<div class="page-header">
  		<h1>Artists Data List (Part 1)</h1>
  	</div>

  	<?php
  	$servername = "localhost";
  	$username = "root";
  	$password = "";
  	$dbname = "art_store";
  	// Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);
  	// Check connection
  	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
  	} 
    $conn->set_charset("utf8");
  
  	$sql = "SELECT ArtistID,FirstName,LastName,YearOfBirth,YearOfDeath FROM artists order by LastName";
  	
  	$result = $conn->query($sql);
  	if ($result->num_rows > 0) {
  	// output data of each row
    while($row = $result->fetch_assoc()) {
    	echo "<a href='part02_SingleArtist.php?id=". $row["ArtistID"]."'>" . $row["FirstName"]." ". $row["LastName"]. " (". $row["YearOfBirth"]. " - ". $row["YearOfDeath"]. ")</a><br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>



  <!-- 	<?php
  	require_once('includes/connection.php');
  	$db = new Db();
$rows = $db -> select("SELECT FirstName, LastName FROM artists");
print($rows);
foreach ($rows as $cname => $cvalue) {
	print "$cvalue\t";/*
   	extract($value);
   	echo $.'
';
	echo $name.'
';*/
}
?> -->
  </div>

  </body>
 </html>

