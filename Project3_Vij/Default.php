  <?php
require_once("includes/config.php");
//now we can use our config file
include(ROOT_PATH . "includes/header.php");
include(ROOT_PATH . "includes/footer.php");
?>
<!DOCTYPE html>
  <html>
  <body>

  	<div class="jumbotron">
  	<div class="container">
  		<h1>Welcome to Assignment 3</h1>
  		<h4>This is the third assignment from <strong>Madhav Vij</strong> for COMP 5335, Due Date: Nov/20/2016</h4>
  		</div>
  	</div>
  	<div class="container">
  		<div class="row"> 
  		<div class="col-md-2 glyphicon glyphicon-info-sign gyphHead"> About Us<br>
  		<span class="gyphText">What this is all about and other stuff</span><br><br>
  		<button type="button" class="btn btn-default btn-sm" onclick="location.href='AboutUs.php';">
  			<span class="glyphicon glyphicon-link"></span>
  			Visit Page
  		</button>
  		</div>

  		<div class="col-md-2 glyphicon glyphicon-list gyphHead"> Artist List<br>
  		<span class="gyphText">Displays a list of artist names as links</span><br><br>
  		<button type="button" class="btn btn-default btn-sm" onclick="location.href='Part01_ArtistsDataList.php';">
  			<span class="glyphicon glyphicon-link"></span>
  			Visit Page
  		</button>
  		</div>

  		<div class="col-md-2 glyphicon glyphicon-user gyphHead"> Single Artist<br>
  		<span class="gyphText">Displays information for a single artist</span><br><br>
  		<button type="button" class="btn btn-default btn-sm" onclick="location.href='Part02_SingleArtist.php?id=19';">
  			<span class="glyphicon glyphicon-link"></span>
  			Visit Page
  		</button>
  		</div>

  		<div class="col-md-2 glyphicon glyphicon-picture gyphHead"> Single Work<br>
  		<span class="gyphText">Displays information for a single work</span><br><br>
  		<button type="button" class="btn btn-default btn-sm" onclick="location.href='Part03_SingleWork.php?id=394';">
  			<span class="glyphicon glyphicon-link"></span>
  			Visit Page
  		</button>
  		</div>

  		<div class="col-md-2 glyphicon glyphicon-search gyphHead"> Search<br>
  		<span class="gyphText">Perform search on ArtWorks tables</span><br><br>
  		<button type="button" class="btn btn-default btn-sm" onclick="location.href='Part04_Search.php';">
  			<span class="glyphicon glyphicon-link"></span>
  			Visit Page
  		</button>
  		</div>
  		
  		</div>
  	</div>
  </body>
  </html>
