
<!DOCTYPE html>
  <html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="<?php echo BASE_URL; ?>/images/favicon.ico">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
     
     <script src="<?php echo BASE_URL; ?>bootstrap/js/bootstrap.min.js"></script>


      <link href="<?php echo BASE_URL; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
     
      <link href="<?php echo BASE_URL; ?>css/stylesheet.css" rel="stylesheet" type="text/css">
      <title>COMP 5335-Assign 3</title>

    </head>


    <body>

        <nav class="navbar navbar-inverse  navbar-static-top">
          <div class="container-fluid">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Assign 1</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li class="active"><a href="Default.php">Home</a></li>
                <li><a href="AboutUs.php">About Us</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="Part01_ArtistsDataList.php">Artist Data List (Part 1)</a></li>
                    <li><a href="Part02_SingleArtist.php?id=19">Single Artist (Part 2)</a></li>
                    <li><a href="Part03_SingleWork.php?id=394">Single Work (Part 3)</a></li>
                    <li><a href="Part04_Search.php">Search (Part 4)</a></li>
                    </ul>
                </li>
              </ul>
              <form class="navbar-form navbar-right" action="Part04_Search.php" method="POST">
              <p class="navbar-text">Madhav Vij</p>
            <input type="search" class="form-control" placeholder="Search Paintings" name="query">
            <input type="submit" class="btn btn-primary" value="Search">
          </form>
              
            </div>
          </div>
        </nav>
        

    
    </body>
  </html>