<?php
require_once("includes/config.php");
//now we can use our config file
include(ROOT_PATH . "includes/header.php");
include(ROOT_PATH . "includes/footer.php");
?>
<!DOCTYPE html>
 <html>
  <body>
  <div class="container">
  <?php
  $id = $_REQUEST['id'];
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
    $conn->set_charset("utf8");//for special characters present in DB

    $sql = "SELECT ArtistID FROM artists where ArtistID=$id";
    $result = $conn->query($sql);

    if($result->num_rows == 0){
        header('Location: Error.php');
    }

    $sql = "SELECT FirstName,LastName,YearOfBirth,YearOfDeath,Nationality,Details,ArtistLink FROM artists where ArtistID=$id";
    
    $result = $conn->query($sql);

    $row = $result->fetch_assoc();
    echo "<h2>". $row["FirstName"]." ".$row["LastName"]. "</h2>";
    echo "<div class='row' style='margin-right: 20%;'><div class='col-md-4'>";
    echo "<img src='images/art/artists/medium/".$id. ".jpg' class='img-responsive' >";
    echo "</div> <div class='col-md-8'>";
    echo "<p style='margin-left: 10px;'>".$row["Details"]."</p>";
    echo "<a href='#' class='btn btn-md' style='margin-left: 10px;border-color: grey'><span class='glyphicon glyphicon-heart'> Add to Favorites List</a><br><br>";
    echo "<ul class='list-group' style='margin-left:10px;'><li class='list-group-item disabled'><h4>Artist Details</h4></li><li class='list-group-item'><div class='row'><div class='col-md-4'>Date:</div><div class='col-md-8'>".$row["YearOfBirth"]." - ".$row["YearOfDeath"]. "</div></div></li><li class='list-group-item'><div class='row'><div class='col-md-4'>Nationality:</div><div class='col-md-8'>".$row["Nationality"]."</div></div></li><li class='list-group-item'><div class='row'><div class='col-md-4'>More Info:</div><div class='col-md-8'><a href=".$row["ArtistLink"].">".$row["ArtistLink"]. "</a></div></div></li></ul>";
    echo "</div></div>";
    echo "<br><h4>Art By " .$row["FirstName"]." ".$row["LastName"]."</h4>";

    $sql = "SELECT ArtWorkID,ImageFileName,Title,YearOfWork FROM artworks where ArtistID = $id";
    $result = $conn->query($sql);

    $count=1;
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
        if($count == 1){
          echo "<div class='row'>";
        }
        echo "<div class='col-md-3'><div class='thumbnail'>";
        echo "<a href='Part03_SingleWork.php?id=".$row["ArtWorkID"]. "' ><img src='images/art/works/square-medium/" .$row["ImageFileName"].".jpg' class='img-thumbnail' ></a>";
        echo "<center style='margin-top: 5px;margin-bottom: 5px;'><a href='Part03_SingleWork.php?id=".$row["ArtWorkID"]. "' >".$row["Title"].", ".$row["YearOfWork"]. "</a></center>";
        echo "<center><a href='Part03_SingleWork.php?id=".$row["ArtWorkID"]. "' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-circle-arrow-down'></span>View</a>&nbsp;";
        echo "<button class='btn btn-success btn-xs'><span class='glyphicon glyphicon-gift'></span>Wish</button>&nbsp;";
        echo "<button class='btn btn-info btn-xs'><span class='glyphicon glyphicon-shopping-cart'></span>Cart</button>";
        echo "</center></div></div>";
        if($count == 4){
          echo "</div>";
          $count=0;
        }
        $count++;
      }
    } else {
      echo "No Artworks Found";
    }
?>

</div>
</body>
</html>
