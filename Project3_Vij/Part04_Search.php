<?php
require_once("includes/config.php");
//now we can use our config file
include(ROOT_PATH . "includes/header.php");
include(ROOT_PATH . "includes/footer.php");
?>
<!DOCTYPE html>
  <html>

  <body>

  	<div class="container" id='search1'>
  	<div class="page-header">
  		<h1>Search Results</h1>
  	</div>
  	<div class="well">
  		<form action="#" method="POST">
  		<div class="form-group">
  			<input type="radio" onclick="javascript:visiblityCheck();" name="filter" id="title" value="title">  Filter By Title
  			<input type="text" name="input_title" placeholder="Enter Title" id="input_title" class="form-control">
  		</div>
  		<div class="form-group">
  			<input type="radio" onclick="javascript:visiblityCheck();" id="desc" name="filter" value="desc">  Filter By Description
  			<input type="text" name="input_desc" placeholder="Enter Description" id="input_desc" class="form-control">
  		</div>
  		<div class="form-group">
  			<input type="radio" onclick="javascript:visiblityCheck();" name="filter" value="show_all" id="show_all">  No Filter (Show all Art Works)
  		</div><br/>
  			<input type="submit" class="btn btn-primary" value="Filter">
  		</form>
  	</div>

  	<?php
  	$servername = "localhost";
  	$username = "root";
  	$password = "";
  	$dbname = "art_store";
  	$query = "";
  	$title = "";
  	$desc = "";
  	$type = "";
    $q="";
  	$result = "";

  	if(isset($_POST['query'])){

	$query=$_POST['query'];
    }

  	if(isset($_POST['input_title'])){

	$title=$_POST['input_title'];
    }

    if(isset($_POST['input_desc'])){

	$desc=$_POST['input_desc'];
    }


    if(isset($_POST['filter'])){

	$type=$_POST['filter'];
    }

  	// Create connection
  	$conn = new mysqli($servername, $username, $password, $dbname);
  	// Check connection
  	if ($conn->connect_error) {
  		die("Connection failed: " . $conn->connect_error);
  	} 
    $conn->set_charset("utf8");//for special characters present in DB

  	//query
  	
  		if($title!="" && $type == "title"){
  			$sql = "SELECT  ArtWorkID,Description,ImageFileName,Title FROM artworks where Title like '%{$title}%'";
        $q=$title;
  			$result = $conn->query($sql);
  		}
  		else if($desc!="" && $type == "desc" ){
  			$sql = "SELECT  ArtWorkID,Description,ImageFileName,Title FROM artworks where Description RLIKE '[[:<:]]{$desc}[[:>:]]'";
  			$result = $conn->query($sql);
  		}
  		else if($type == "show_all")
  		{
  			$sql = "SELECT  ArtWorkID,Description,ImageFileName,Title FROM artworks";
  			$result = $conn->query($sql);
  		}
  	else if($query!="") 
  	{
  		$sql = "SELECT  ArtWorkID,Description,ImageFileName,Title FROM artworks where Title like '%{$query}%'";
  		$result = $conn->query($sql);
  	}


    function highlight($text_string, $names){
    foreach ($names as $name)
    {
            $name = preg_quote($name);
            $text_string = preg_replace("/\b($name)\b/i", '<span class="highlite">\1</span>', $text_string);
    }
          return  $text_string;
    }
    



  	//Fetching result

     if (null!=$result &&  $result->num_rows > 0) {
     while($row = $result->fetch_assoc()) {	 
     	?>
      <div class="container">

      <div class ="row"> 
			
				
					<div class="col-md-2">
					<a href="Part03_SingleWork.php?id=<?php echo($row["ArtWorkID"])?>">
					<img src="images/art/works/square-medium/<?php echo $row["ImageFileName"]?>.jpg" class="img-thumbnail" >
					</a>
					
				</div>
				
					<div class ="col-md-8">
						
						<h4><a href="Part03_SingleWork.php?id=<?php echo($row["ArtWorkID"])?>"><?php echo($row["Title"])?></a></h4>
						<?php  
            if ($desc!='') {
              $names = array($desc,$desc);
              $Hstring = highlight($row["Description"],$names);
              $row["Description"]=$Hstring;
            }
            echo $row["Description"]  
            ?>
						</div>
						

</div>

<hr>
</div>


  	
<?php
}}
$conn->close();
?>
</div>




    <script type="text/javascript">
function visiblityCheck() {
    if (document.getElementById('title').checked) {
        document.getElementById('input_title').style.display = 'block';
    }
    else document.getElementById('input_title').style.display = 'none';

    if (document.getElementById('desc').checked) {
        document.getElementById('input_desc').style.display = 'block';
    }
    else document.getElementById('input_desc').style.display = 'none';

    if(document.getElementById('show_all').checked){
      document.getElementById('input_title').style.display = 'none';
        document.getElementById('input_desc').style.display = 'none';
    }

}
</script>

  </body>
  </html>