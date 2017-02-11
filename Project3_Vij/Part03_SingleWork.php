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

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      $conn->set_charset("utf8");//for special characters present in DB

      $sql = "SELECT art.ArtistID as ArtistID,art.ImageFileName as ImageFileName,Title,ar.FirstName as FirstName, ar.LastName as LastName,art.description as Description,YearOfWork,Medium,Width,Height,OriginalHome,cast(MSRP as decimal(10,2)) as MSRP From Artworks art join Artists ar on art.ArtistID = ar.ArtistID Where ArtWorkID = $id";

      $result = $conn->query($sql);
      if($result->num_rows == 0){
        header('Location: error.php');
      }

      $sql1 = "SELECT DateCreated FROM `orders` where orderID in (select orderID from orderdetails where artworkID=$id)";
      $result1 = $conn->query($sql1);

      $sql2 = "SELECT GenreName FROM genres where GenreID in (SELECT GenreID FROM artworkgenres where artWorkID=$id)";
      $result2 = $conn->query($sql2);

      $sql3 = "SELECT SubjectName FROM subjects where SubjectID in (SELECT SubjectID FROM artworksubjects where artWorkID=$id)";
      $result3 = $conn->query($sql3);
      

      $row = $result->fetch_assoc();
      echo "<h2>". $row["Title"]."</h2>";
      echo "<h5>By <a href='Part02_SingleArtist.php?id=".$row["ArtistID"]."'>".$row["FirstName"]." ".$row["LastName"]. "</a></h5>";
      echo "<div class='row'><div class='col-md-3'>";
      echo "<a href='#'><img src='images/art/works/medium/".$row["ImageFileName"].".jpg' class='img-responsive thumbnail' data-toggle='modal' data-target='#myModal'></a></div>";
      echo "<div class='col-md-6'>";
      echo "<p style='margin-left: 30px;'>".$row["Description"]."</p>";
      echo "<p style='margin-left:30px;color:red;font-weight: bold;'>$".$row["MSRP"]."</p>";
      echo "<div class='btn-group' role='group' style='margin-left:30px;'>";
      echo "<button type='button' style='color: #428bca; background-color:#fff;' class='btn btn-default'> <a href='#'><span class='glyphicon glyphicon-gift'><strong> Add to Wish List</strong></span></a></button>";
      echo "<button type='button' style='color: #428bca; background-color:#fff;' class='btn btn-default'> <a href='#'><span class='glyphicon glyphicon-shopping-cart'><strong> Add to Shopping Cart</strong></span></a></button>";
      echo "</div><br><br>";
      echo "<ul class='list-group' style='margin-left: 30px;'><li class='list-group-item disabled'><h4>Product Details</h4></li>";
      echo "<li class='list-group-item'><div class='row'><div class ='col-md-4'><STRONG>Date:</STRONG></div><div class='col-md-8'>".$row["YearOfWork"]."</div></div></li>";
      echo "<li class='list-group-item'><div class='row'><div class ='col-md-4'><STRONG>Medium:</STRONG></div><div class='col-md-8'>".$row["Medium"]."</div></div></li>";
      echo "<li class='list-group-item'><div class='row'><div class ='col-md-4'><STRONG>Dimensions:</STRONG></div><div class='col-md-8'>".$row["Width"]."cmX".$row["Height"]."cm</div></div></li>";
      echo "<li class='list-group-item'><div class='row'><div class ='col-md-4'><STRONG>Home:</STRONG></div><div class='col-md-8'>".$row["OriginalHome"]."</div></div></li>";
      echo "<li class='list-group-item'><div class='row'><div class ='col-md-4'><STRONG>Genres:</STRONG></div><div class='col-md-8'>";
      while($row2 = $result2->fetch_assoc()){ 
        echo "<a href='#'>".$row2["GenreName"]."</a><br>";
        
        }
      echo "</div></div></li>";
      echo "<li class='list-group-item'><div class='row'><div class ='col-md-4'><STRONG>Subjects:</STRONG></div><div class='col-md-8'>";
      while($row3 = $result3->fetch_assoc()){ 
        echo "<a href='#'>".$row3["SubjectName"]."</a><br>";
        
        }
      echo "</div></div></li>";
      echo "</ul></div>";

      echo "<div class='col-md-3'><div class='panel panel-info' style='margin-left:10px;margin-right: 5px; width: 200px;'><div class='panel-heading'><h4 class='panel-title'>Sales</h4></div>";
      echo "<div class='panel-body'>";
      while ($row1 = $result1->fetch_assoc()){
        $date = strtotime($row1["DateCreated"]);
        echo "<a href='#'>";
        echo date('m/d/y',$date)."</a><br><br>";
      }
      echo "</div></div></div></div>";

      // ---------------Modal Code Starts Here --------------------
      
      echo "<div class='modal fade' id='myModal' tabindex=-1 role='dialog'><div class='modal-dialog' role='document' style='width:33%; height:auto;'>";
      echo "<div class='modal-content'><div class='modal-header'>";
      echo "<button type='button' class='close' data-dismiss='modal' aria-label='close'><span aria-hidden = 'true'>&times;</span></button>";
      echo "<h4 class='modal-title'>".$row["Title"]." (".$row["YearOfWork"].") by ".$row["FirstName"]." ".$row["LastName"]."</h4></div>";
      echo "<div class='modal-body'><img src='images/art/works/medium/".$row["ImageFileName"].".jpg' style='height:auto;width:95%;'></div>";
      echo "<div class='modal-footer'><button type='button' class='btn btn-default' data-dismiss='modal'>Close</button></div>";
      echo "</div></div></div>";


      // ---------------Modal Code Ends Here ----------------------


    ?>


  </div>
</body>
</html>