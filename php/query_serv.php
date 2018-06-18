<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Software repository</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.css" rel="stylesheet">
	
	 <!-- Custom page for this page and the about page -->
	<link href="css/about.css" rel="stylesheet">

  </head>

  <body >
  
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.html">Software Repository</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="query.html">Query</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="upload.html">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="login/login.html">Login/Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	<div class = "container">
	<p>ALLO ?</p>
	
	<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lindholmendb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}	 

$table = $_GET['js_object'];
	
$usable_table = json_decode($table);

$i = 0;
$size = sizeof($usable_table -> category);

	foreach ($usable_table -> category as $size){
		echo $usable_table -> category[$i]; 
		
		//Remove the ' ' from the queries, seeing how the data is put in the database, it is usefull
		$usable_table -> user_input[$i] = str_replace(' ','', $usable_table -> user_input[$i]);
		
		switch ($usable_table -> category[$i]){

			//For the genral search page
			case 'All':
				$sql = $conn -> prepare("SELECT * FROM repos WHERE repos.name LIKE ?  LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
				
				//execute the query and get the result
				$sql -> execute();
				$result = $sql -> get_result();
		
				//display of the results
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					echo '<br>';
					foreach($row as $field) {
						echo  htmlspecialchars($field) .' ';
				}
				echo '<br>';
				}
				
				$sql = $conn -> prepare("SELECT * FROM repos WHERE repos.founder LIKE ?  LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
				
				//execute the query and get the result
				$sql -> execute();
				$result = $sql -> get_result();
		
				//display of the results
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					echo '<br>';
					foreach($row as $field) {
						echo  htmlspecialchars($field) .' ';
				}
				echo '<br>';
				}
				
				$sql = $conn -> prepare("SELECT * FROM umlfiles WHERE umlfiles.name LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
				
				//execute the query and get the result
				$sql -> execute();
				$result = $sql -> get_result();
				
				$sql = $conn -> prepare("SELECT * FROM people WHERE people.name LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
		
				//display of the results
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					echo '<br>';
					foreach($row as $field) {
						echo  htmlspecialchars($field) .' ';
				}
				echo '<br>';
				}
			
			break;
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case 'User tag':
			
			break;
				//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case 'Author name':
				$sql = $conn -> prepare("SELECT * FROM repos WHERE repos.founder LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%' ;
				$sql -> bind_param('s', $like);
				
				//execute the query and get the result
				$sql -> execute();
				$result = $sql -> get_result();
		
				//display of the results
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					echo '<br>';
					foreach($row as $field) {
						echo  htmlspecialchars($field) .' ';
				}
				echo '<br>';
				}
				

				$sql = $conn -> prepare("SELECT * FROM users WHERE users.name LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
				if($usable_table -> andor[$i] == 'AND'){
					$like = $like." AND user.name LIKE %".$usable_table -> user_input[$i+1]."%";
				}
				
				var_dump ($like);
				
				
			break;
				//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case 'File name':
				$sql = $conn -> prepare("SELECT * FROM repos WHERE repos.name LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
				//execute the query and get the result
				$sql -> execute();
				$result = $sql -> get_result();
		
				//display of the results
				while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
					echo '<br>';
					foreach($row as $field) {
						echo  htmlspecialchars($field) .' ';
				}
				echo '<br>';
				}
				
				
				$sql = $conn -> prepare("SELECT * FROM umlfiles WHERE umlfiles.name LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
				
			break;
			
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			//Projects
			case '1 Project name':
				$sql = $conn -> prepare("SELECT * FROM repos WHERE repos.name LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
			break;
			
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case '2 Founder name':
				$sql = $conn -> prepare("SELECT * FROM repos WHERE repos.founder LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
			break;
			
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			//Diagrams
			case '1 Diagram name':
				$sql = $conn -> prepare("SELECT * FROM umlfiles WHERE name LIKE ? LIMIT 25");
				$like = '%'.$usable_table -> user_input[$i].'%';
				$sql -> bind_param('s', $like);
			break;
			
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case '2 File type':
				//$sql = $conn -> prepare("SELECT * FROM umlfiles WHERE name LIKE ? LIMIT 25");
				//$like = '%'.$usable_table -> user_input[$i].'%';
				//$sql -> bind_param('s', $like);
			break;
			
			//Documentation
			
			
			
			
			
			
		}
		
		//execute the query and get the result
		$sql -> execute();
		$result = $sql -> get_result();
		
		//display of the results
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<br>';
			foreach($row as $field) {
				echo  htmlspecialchars($field) .' ';
		}
		echo '<br>';
		}
		
			
		
		$i++;
		echo '<br>';
		echo '-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';
		echo '<br>';
	}
	
	
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//--------------------------------------------------------------------------------------------------------------------Filters----------------------------------------------------------------------
	//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	$i = 0;
	$size = sizeof($usable_table -> category_filter);
	
	foreach ($usable_table -> category_filter as $size){
		echo $usable_table -> category_filter[$i]; 
		
		switch ($usable_table -> category_filter[$i]){
			
			case '3 Number commit':
				$sql = $conn -> prepare("SELECT * FROM repos WHERE repos.number_commits BETWEEN ? AND ? LIMIT 25");
				if($usable_table -> user_input_filter_1[$i] < $usable_table -> user_input_filter_2[$i]){
					$sql -> bind_param('ii', $usable_table -> user_input_filter_1[$i], $usable_table -> user_input_filter_2[$i]);
				}else{
					$sql -> bind_param('ii', $usable_table -> user_input_filter_2[$i], $usable_table -> user_input_filter_1[$i]);
				}
			break;
			
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case '6 Number UML diagram':
				$sql = $conn -> prepare("SELECT * from (select COUNT(umlfiles.id) as row123, repos.name from umlfiles inner join repos on umlfiles.repo_id=repos.id group by repo_id) as test where row123 BETWEEN ? AND ?");
				if($usable_table -> user_input_filter_1[$i] < $usable_table -> user_input_filter_2[$i]){
					$sql -> bind_param('ii', $usable_table -> user_input_filter_1[$i], $usable_table -> user_input_filter_2[$i]);
				}else{
					$sql -> bind_param('ii', $usable_table -> user_input_filter_2[$i], $usable_table -> user_input_filter_1[$i]);
				}
			break;
			
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case '7 Number contributor':
				
			break;
		
		}
		
		
		//execute the query and get the result
		$sql -> execute();
		$result = $sql -> get_result();
		
		//display of the results
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo '<br>';
			foreach($row as $field) {
				echo  htmlspecialchars($field) .' ';
		}
		echo '<br>';
		}
		
		$i++;
		echo '<br>';
		echo '-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------';
		echo '<br>';
	}


//Close the connection
$conn->close();
?> 

	</div>

	 <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 bottom">
            <span class="copyright">Copyright &copy; Your Website 2018</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
	
	<!-- Javascript functions for this page -->
	<script language="javascript" type="text/javascript" src="js/query_page.js"></script>	 

	 <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>
	
</body>
</html>
