<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Software repository</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../css/agency.css" rel="stylesheet">
	
	 <!-- Custom page for this page and the about page -->
	<link href="../css/about.css" rel="stylesheet">

  </head>

<body>
	<!-- Javascript functions for this page -->
	<script language="javascript" type="text/javascript" src="../js/results.js"></script>	 
  
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="../index.html">Software Repository</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../query.html">Query</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../upload.html">Upload</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="../login/login.html">Login/Register</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
 
 <!-- Page Content -->
 
 <div class = "container-fluid" style = "margin-top : 10%">
 <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
 <!-- sub-navbar -->
 <!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->

			<div class = "row justify-content-center">
			<div class = "col-lg-10">
				<div class = "row justify-content-between">
				
				<!-- Show Chart button -->
				<div class = "left">
					<button type='button' class='btn btn-primary'>Show charts</button>
				
					<!-- Sorting categories -->
					<select class="btn btn-primary dropdown-toggle" id="dropdownMenuButton" onchange = "sortingFunction(this)">
							<option style= "display : none;" selected>Sort by:</option>
							<option value = "Project number">Default</option>
							<option value= "Project name" >Project Name</option>
							<option value= "N# UML">N# of UML diagrams</option>
							<option value= "N# xmi">N# of xmi</option>
							<option value= "N# commits">N# of commits</option>
							<option value= "Founder">Founder</option>
					</select>
					
					<!-- Sorting order -->
					<button type='button' class='btn btn-primary' id = "inc/dec" onclick = "sort_order()">Increasing</button>
					
				</div>
				
				<!-- Number of results -->
				<div class = "middle">
					<h2 id = "number_result" style = "color : white"></h2>
				</div>
				
				<!-- Switch view button -->
				<div class = "right">
						<button type='button' class='btn btn-primary' onclick = "add_field()">Switch view</button>
				</div>
				</div>
			</div>
			</div>
			
	<hr style="width: 100%; color: white; height: 1px; background-color : white;" />
	
	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	<!-- Project Card template -->
	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	<template id = "project_card_template">
		<div class = "row justify-content-center" style = "margin-top : 3%" id = "template_number">
			<div class = "col-lg-10">
			
			<!-- Title -->
						<div class = "row" style = "margin-bottom :3%">
							<div class = "col-lg-12">
								<a target = "_blank" id = "project_link" name = "project_link">
									<h3 class = "d-inline-flex" id = "project_number" name = "project_number" style = "color : white"></h3>
									<h3 class = "d-inline-flex" style = "color: white" id = "project_name" name = "project_name"></h3>
								</a>
							</div>
						</div>
			
			
				<div class = "row justify-content-between">
					
					<div class = "col-lg-7">
					
					
					
						<!-- Details -->
						<div class = "row">
						
							<div class = "col-lg-5">
								<div class = "row ">
									<div class = "col-lg-12 field">
										<span  class = "field-title align-text-center">UML models: </span>
										<span id = "number_models" name = "number_models"> </span>
									</div>
								</div>
								
							
								<div class = "row">
									<div class = "col-lg-12 field">
										<span  class = "field-title align-text-center">Founder:</span>
										<span  class = "align-text-center" style = "color: black" id = "founder_name" name = "founder_name"></span>
									</div>
								</div>
								
								<div class = "row">
									<div class = "col-lg-12 field">
										<span  class = "field-title align-text-center">N# of xmi representation:</span>
										<span  class = "align-text-center" style = "color: black" id = "number_xmi" name = "number_xmi"></span>
									</div>
								</div>
								
							</div>
							
							<div class = "col-lg-1">
							
							</div>
							
						
							<div class = "col-lg-5">
								<div class = "row">
									<div class = "col-lg-12 field">
										<h6 class = "field-title  align-text-center">Overall quality: </h6>
									</div>
								</div>
						
								<div class = "row">
									<div class = "col-lg-12 field" >
										<h6 class = "field-title  align-text-center">Project type: </h6>
									</div>
								</div>
							</div>	<!--./col-lg-5 -->
					
					
						</div>	<!--./Details row -->
						
						
						<!-- UML Type -->
						<div class = "row justify-content-start" style = "margin-top : 2%">
							<div class = "col-lg-3 field" >
								<span class = "field-title  align-text-center">Class diagram:</span>
							</div>
							
							<div class = "col-lg-3 field" >
								<span class = "field-title  align-text-center">Sequence diagram: </span>
							</div>
							
							<div class = "col-lg-3 field">
								<span class = "field-title  align-text-center" >Other diagram: </span>
							</div>
						</div>
						
						
						<!-- Extensions Type -->
						<div class = "row">
							<div class = "col-lg-3 field">
								<span class = "field-title  align-text-center">XMI: </span>
							</div>
							<div class = "col-lg-3 field">
								<span class = "field-title  align-text-center">UML: </span>
							</div>
							<div class = "col-lg-3 field">
								<span class = "field-title  align-text-center">IMG: </span>
							</div>
						</div>
						
					
					 </div>	<!--./col-lg-6/left column -->
					
					<div class = "col-lg-3 align-self-center" >
						
						<div class = "row" style = "margin-top : 3%">
							<div class = "col-lg-12 field">
								<span class = "field-title">N# of commits : </span>
								<span style = "color: black" id = "number_commits" name = "number_commits"> </span>
							</div>
						</div>
						
						<div class = "row" style = "margin-top : 3%">
							<div class =  "col-lg-12 field">
								<p class = "field-title ">N# of docs: </p>
							</div>
						</div>
						
						<div class = "row" style = "margin-top : 3%">
							<div class = "col-lg-12 field">
								<p class = "field-title ">User tags: </p>
							</div>
						</div>
					
					</div> <!--./col-lg-5/right column -->
					
					<div class = "col-1">
						
						<div class = "row">
							<p>More info</p>
						</div>
						
					
					</div> <!--./col-lg-1/extreme right column -->
					
					
					</div>	<!--./inside row-->
				</div>	<!-- ./col-lg-10 -->
			</div>	<!-- ./row -->
			
			<hr style="width: 100%; color: white; height: 1px; background-color : white;" />
			
			</template>
	
	
	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	<!-- Diagram List template -->
	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->

	
	<template id = "diagram_list_template">
				
		<div class = "col-lg-4" style = "margin-bottom : 2%; padding : 2%"  id = "template_number">
			<div class = "row justify-content-center">	
		
				<!-- Image display and link -->
				<a target = "_blank" id = "ahref" name  = "ahref">
					<iframe id = "xml_display" name = "xml_display"></iframe>
					<object id = "dia_image" name = "dia_image" style = " background-size : cover; height : 250px; max-width : 100%">
						<img style = "max-width : 100%; max-height : 100%" src = "../img/error-404.png" id = "placeholder">
					</object>
				</a>
			</div>
		
			<!-- Diagram name -->
			<div class = "row justify-content-center" style = "margin-top : 1%">
				<span class = "field" name = "dia_name" style = "overflow-wrap : break-word; width :100%; text-align : center" id = "dia_name">Title</span>
			</div>
			
			<!-- Project name -->
			<div class = "row justify-content-center listfield">
				<a id = "ahref_project" name = "ahref_project" target = "_blank">
				<span id = "project_name" name = "project_name" class = "field-title">Project</span>
				</a>
			</div>	

		</div>
	</template>
	
	
	
	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	<!-- Diagram Card template -->
	<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	<template id = "diagram_card_template">
		<div class = "row justify-content-center" style = "margin-top : 3%" id = "template_number">
			<div class = "col-lg-10">
				<div class = "row">
					
					<div class = "col-lg-4">
						<a target = "_blank" id = "ahref" name = "ahref">
							<iframe id = "xml_display" name = "xml_display"></iframe>
							 <object id = "dia_image" name = "dia_image" style = "max-width : 100%; max-height : 100%">
							<img style = "postion : fixed; max-height : 100%; max-width : 100% " src = "../img/error-404.png" id = "placeholder">
							</object>
							</a>
					</div> <!--./col-lg-4/Image -->
					
					<div class  = "col-lg-2">
					</div>
					
					<div class = "col-lg-5">
					
					<!-- Title -->
						<div class = "row">
							<div class =  "col-lg-12">
								<h5 id = "dia_name" name = "dia_name" style = "color: white; overflow-wrap : break-word">Default</h5>
							</div>
						</div>
						<div class = "row">
							<div class = "col-lg-10	field">
								<span class = "field-title">Project : </span>
								<a id = "project_link" name = "project_link" target = "_blank">
									<span style = "color: black" id = "project_name" name = "project_name" >Project name</span>
								</a>
							</div>
						</div>
						
					
					<!-- INFO -->
						<div class = "row">
						
							<div class = "col-lg-5 field">
								<span  class = "align-text-center field-title">Diagram type: </span>
							</div>
						
							<div class = "col-lg-5 field" >
								<span class = "align-text-center field-title" style = "color: black">Extension: </span>
								<span  class = "align-text-center" style = "color: black" id = "dia_type" name = "dia_type"></span>
							</div>
						</div>
				
						
					<!-- Details -->
						<div class = "row " >
							<div class = "col-lg-10 field" >
								<span class = "align-text-center field-title">N# of classes</span>
							</div>
						</div>
						
						
					<!-- User tag -->
						<div class = "row">
							<div class = "col-lg-3 field">
								<span class = "align-text-center field-title">User tags</span>
							</div>
						</div>
						
					
					</div>	<!--./col-lg-5/middle column -->
					
					<div class = "col-lg-1">
					</div>
					
					
			</div>	<!--./inside row-->
		</div>	<!-- ./col-lg-10 -->
		
		
			<hr style="width: 100%; color: white; height: 1px; background-color : white;" />
		</div>	<!-- ./row -->
			
</template>
	

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Project menu (top bar) template -->
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	
<template id = "menu_project_list">
		<div class = "row">
			<div class = "col-lg-2">
				<span class = "field-title" style = "color: white">Project Name: </span>
			</div>
			
			<div class = "col-lg-2">
				<span class = "field-title" style = "color: white">N# of UML: </span>
			</div>
			
			<div class = "col-lg-2">
				<span class = "field-title" style = "color: white">N# of xmi representation: </span>
			</div>
		
			<div class = "col-lg-2">
				<span class = "field-title" style = "color: white">N# of commits: </span>
			</div>
			
			<div class = "col-lg-2">
				<span class = "field-title" style = "color: white">Founder: </span>
			</div>
	
		<hr style="width: 100%; height: 1px; background-color : black;" />
		</div>
</template>

<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- Project list template -->
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------- -->
	
<template id = "project_list_template">
		
		<div class = "row" id = "template_number" >
			
			<div class = "col-lg-2">
			<a name = "project_link" id = "project_link" target = "_blank">
				<span id = "project_number" name = "project_number" style = "color : white"></span>
				<span id = "project_name" name = "project_name" style = "color : white"></span>
			</a>
			</div>
			
			<div class = "col-lg-2">
				<span id = "number_models" name = "number_models" style = "color : white"></span>
			</div>
			
			<div class = "col-lg-2">
				<span id = "number_xmi" name = "number_xmi" style = "color : white"></span>
			</div>
		
			<div class = "col-lg-2">
				<span id = "number_commits" name = "number_commits" style = "color : white"></span>
			</div>
			
			<div class = "col-lg-2">
				<span id = "founder_name" name = "founder_name" style = "color : white"></span>
			</div>
			
		
		</div>
	
	
		<hr style="width: 100%; height: 1px; background-color : black;" />
</template>
	
	
<template id = "no_result_template">
	
	<div class = "row justify-content-center" style = "margin-top : 3%">
		<div class = "col-lg-10">
		<div class = "row justify-content-center">
			<h1 style = "color : white">No result found, go back to the <a href = "../query.html">query page</a>.</h1>
		</div>
		</div>
	</div>
	
</template>
	
	<div id = "more_project_card"> </div>
	
	<div id = "more_diagram_card"> </div>
	
	<div id = "more_doc_card"> </div>
	
	<div class = "row justify-content-center" style = "margin-top : 2%">
		<div class = "col-lg-10">
		<div class = "row" id = "more_diagram_list">
			<!-- <div id = "more_diagram_list"></div> -->
		</div>
		</div>
	</div>
			
	<div class = "row justify-content-center" style = "margin-top : 2%">
		<div class = "col-lg-10">
				<div id = "more_project_list">	</div> 
	</div>
			

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

//initialise the query_line, the text inside the query. All queries starts with the same statement
$query_line = "SELECT * FROM repos INNER JOIN umlfiles ON repos.id = umlfiles.repo_id WHERE";

$i = 0;
$size = sizeof($usable_table -> category);
$display = "'project'";

	
	foreach ($usable_table -> category as $size){

		

		
		//Remove the ' ' from the queries, seeing how the data is put in the database, it is usefull
		$usable_table -> user_input[$i] = str_replace(' ','', $usable_table -> user_input[$i]);
		
		switch ($usable_table -> category[$i]){
		
			//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			//For the advanced search page
			//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			case '1 Project name':
				$like = "'%".$usable_table -> user_input[$i]."%'";
				$query_line .= " (repos.repos_name LIKE ".$like.")";
					
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') == false  && $display == "'project'"){
					$query_line =substr_replace($query_line, ", COUNT(umlfiles.id) AS count_filenumber ",strpos($query_line,"FROM"),0);
				}else if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false && $display  == "'uml'"){
					$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
				}
				if($i == sizeof($usable_table -> category)-1 && $display == "'project'" && sizeof($usable_table -> category_filter) == 0){
					$query_line .= " GROUP BY repos.id";
				}
				
				//count the number of xmi files
				if(strpos($query_line,"has_xmi") == false){
					
					$query_line = substr_replace($query_line, " INNER JOIN (SELECT repos.id AS test_repos_id, COUNT(umlfiles.has_xmi) AS count_xmi FROM umlfiles INNER JOIN repos ON repos.id = umlfiles.repo_id WHERE repos_name LIKE ".$like." OR umlfiles_name LIKE ".$like." OR repos.founder LIKE ".$like." GROUP BY repos.id) AS test ON test_repos_id = umlfiles.repo_id ",strpos($query_line,'WHERE')-1,0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "AND" && strpos($query_line,"has_xmi") != false){
					
					$query_line = substr_replace($query_line, "AND repos_name LIKE ".$like." OR umlfiles_name LIKE ".$like." OR repos.founder LIKE ".$like." ",strpos($query_line,"GROUP BY repos.id"),0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "OR" && strpos($query_line,"has_xmi") != false){
					$query_line = substr_replace($query_line, "OR repos_name LIKE ".$like." OR umlfiles_name LIKE ".$like." OR repos.founder LIKE ".$like." ",strpos($query_line,"GROUP BY repos.id"),0);
				
				}
					
			break;
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
			case '2 Founder name':
					
				$like = "'%".$usable_table -> user_input[$i]."%'";
				$query_line .= " (repos.founder LIKE ".$like.")";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') == false  && $display == "'project'"){
					$query_line =substr_replace($query_line, ", COUNT(umlfiles.id) AS count_filenumber ",strpos($query_line,"FROM"),0);
				}else if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false && $display  == "'uml'"){
					$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
				}
				if($i == sizeof($usable_table -> category)-1 && $display == "'project'"){
					$query_line .= " GROUP BY repos.id";
				}
				
					//build the query to count the number of xmi files
				if(strpos($query_line,"has_xmi") == false){
					
					$query_line = substr_replace($query_line, "  INNER JOIN (SELECT repos.id AS test_repos_id, COUNT(umlfiles.has_xmi) AS count_xmi FROM umlfiles INNER JOIN repos ON repos.id = umlfiles.repo_id WHERE repos.founder LIKE ".$like." GROUP BY repos.id) AS test ON test_repos_id = umlfiles.repo_id ",strpos($query_line,'WHERE')-1,0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "AND" && strpos($query_line,"has_xmi") != false){
					
					$query_line = substr_replace($query_line, "AND repos.founder LIKE ".$like." ",strpos($query_line,"GROUP BY repos.id"),0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "OR" && strpos($query_line,"has_xmi") != false){
					$query_line = substr_replace($query_line, "OR repos.founder LIKE ".$like." ",strpos($query_line,"GROUP BY repos.id"),0);
				
				}
				

			break;
			//---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

			case '1 Diagram name':
					$like = "'%".$usable_table -> user_input[$i]."%'";
					$query_line .= " (umlfiles.umlfiles_name LIKE ".$like.")";
					
					if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false){
						$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
					}
					
					$display = "'uml'";
			break;
			
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			//Class Diagrams
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
			case '1 Class name':
				//ATTENTION: special characters, the query is good but the result can't be displayed because of special char inside the database
				//Add a new table on the query
				if(strpos($query_line,'cd_class') == false){
					$query_line = substr_replace($query_line, ' INNER JOIN cd_class ON umlfiles.has_xmi=cd_class.xmi_id ',strpos($query_line,'umlfiles.repo_id')+17,0);
				}
				//add the actual query parameter
				$like = "'%".$usable_table -> user_input[$i]."%'";
				$query_line .= " (cd_class.cls_name LIKE ".$like.")";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false){
					$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
				}
				
				$display = "'uml'";
			break;
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

			case '3 Attribute name':
				//ATTENTION: special characters, the query is good but the result can't be displayed because of special char inside the database
				//Add 2 new table on the query
				if(strpos($query_line,'INNER JOIN cd_class') == false){
					$query_line = substr_replace($query_line, ' INNER JOIN cd_class ON umlfiles.has_xmi=cd_class.xmi_id INNER JOIN cd_attribute ON cd_attribute.cls_id=cd_class.ID ',strpos($query_line,'WHERE')-1,0);
				}else{	//or just one if the cd_class is already there
					$query_line = substr_replace($query_line, ' INNER JOIN cd_attribute ON cd_class.ID=cd_attribute.cls_id ',strpos($query_line,'WHERE')-1,0);
				}
				//add the actual query parameter
				$like = "'%".$usable_table -> user_input[$i]."%'";
				$query_line .= " (cd_attribute.attr_name LIKE ".$like.")";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false){
						$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
				}
				
				$display = "'uml'";
			break;
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

			case '4 Operation name':
				//ATTENTION: special characters, the query is good but the result can't be displayed because of special char inside the database
				//Add 2 new table on the query
				if(strpos($query_line,'INNER JOIN cd_class') == false){
					$query_line = substr_replace($query_line, ' INNER JOIN cd_class ON umlfiles.has_xmi=cd_class.xmi_id INNER JOIN cd_operation ON cd_operation.cls_id=cd_class.ID ',strpos($query_line,'WHERE')-1,0);
				}else{	//or just one if the cd_class is already there
					$query_line = substr_replace($query_line, ' INNER JOIN cd_operation on cd_class.ID=cd_operation.cls_id ',strpos($query_line,'WHERE')-1,0);
				}
				//add the actual query parameter
				$like = "'%".$usable_table -> user_input[$i]."%'";
				$query_line .= " (cd_operation.opr_name LIKE ".$like.")";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false){
						$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
					}
				
				$display = "'uml'";
			break;

		
		}
		
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Add the 'and' when it is necessary 
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if(($i+1) != sizeof($usable_table -> category) || sizeof($usable_table -> category_filter) != 0){
			$query_line .= " AND ";
		}
		
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//increment the index, get to the next column in the array
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$i++;
	}
		
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Filters 
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		
$i = 0;
$size = sizeof($usable_table -> category_filter);

	foreach ($usable_table -> category_filter as $size){

		
		switch ($usable_table -> category_filter[$i]){
			case '3 Number commit':
				$query_line .= " (repos.number_commits BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i].")";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') == false  && $display == "'project'"){
					$query_line =substr_replace($query_line, ", COUNT(umlfiles.id) AS count_filenumber ",strpos($query_line,"FROM"),0);
				}else if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false && $display  == "'uml'"){
					$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
				}
				if($i == sizeof($usable_table -> category_filter)-1 && $display == "'project'"){
					$query_line .= " GROUP BY repos.id";
				}
				
				//build the query to display the number of
				if(strpos($query_line,"has_xmi") == false){
					
					$query_line = substr_replace($query_line, " INNER JOIN (SELECT repos.id AS test_repos_id, COUNT(umlfiles.has_xmi) AS count_xmi FROM umlfiles INNER JOIN repos ON repos.id = umlfiles.repo_id WHERE (repos.number_commits BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i].") GROUP BY repos.id) AS test ON test_repos_id = umlfiles.repo_id ",strpos($query_line,'WHERE')-1,0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "AND" && strpos($query_line,"has_xmi") != false){
					
					$query_line = substr_replace($query_line, " AND (repos.number_commits BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i].")",strpos($query_line,"GROUP BY repos.id"),0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "OR" && strpos($query_line,"has_xmi") != false){
					$query_line = substr_replace($query_line, "OR (repos.number_commits BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i].")".$like." ",strpos($query_line,"GROUP BY repos.id"),0);
				
				}
				
			break;
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

			case '6 Number UML diagram':
			//functional on its own and if last filter, but has to be changed to be put in multiple category query
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') == false  && $display == "'project'"){
					$query_line =substr_replace($query_line, ", COUNT(umlfiles.id) AS count_filenumber ",strpos($query_line,"FROM"),0);
				}
				
				if(substr($query_line,-4) == "AND "){
					$query_line = substr_replace($query_line, '',sizeof($query_line)-5,5);
				}
				
				if($i == sizeof($usable_table -> category_filter)-1 && $display == "'project'"){
					$query_line .= " GROUP BY repos.id HAVING count_filenumber BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i];
				}
				
				if(sizeof($usable_table -> category) == 0 && sizeof($usable_table -> category_filter) == 1){
					$query_line = substr_replace($query_line, '',strpos($query_line,'WHERE'),5);
				}else{
					
				}
				
				
				//build the query to display the number of
				/*if(strpos($query_line,"has_xmi") == false){
					
					$query_line = substr_replace($query_line, " INNER JOIN (SELECT repos.id AS test_repos_id, COUNT(umlfiles.has_xmi) AS count_xmi FROM umlfiles INNER JOIN repos ON repos.id = umlfiles.repo_id WHERE repos_name LIKE ".$like." OR umlfiles_name LIKE ".$like." OR repos.founder LIKE ".$like." GROUP BY repos.id) AS test ON test_repos_id = umlfiles.repo_id ",strpos($query_line,'WHERE')-1,0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "AND" && strpos($query_line,"has_xmi") != false){
					
					$query_line = substr_replace($query_line, "AND repos_name LIKE ".$like." OR umlfiles_name LIKE ".$like." OR repos.founder LIKE ".$like." ",strpos($query_line,"GROUP BY repos.id"),0);
				
				}else if(isset($usable_table -> andor[$i-1]) && $usable_table -> andor[$i-1] == "OR" && strpos($query_line,"has_xmi") != false){
					$query_line = substr_replace($query_line, "OR repos_name LIKE ".$like." OR umlfiles_name LIKE ".$like." OR repos.founder LIKE ".$like." ",strpos($query_line,"GROUP BY repos.id"),0);
				
				}*/
				
			break;
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
			
			
			//Theoretically it works, the count is too much for a browser to support
			case '5 Number class':
				$query_line = substr_replace($query_line, " , COUNT(cd_class.cls_name) as count_classes ",strpos($query_line,'FROM')-1,0);
				//Add a new table on the query
				if(strpos($query_line,' INNER JOIN cd_class') == false){
					$query_line = substr_replace($query_line, ' INNER JOIN cd_class ON umlfiles.has_xmi=cd_class.xmi_id ',strpos($query_line,'umlfiles.repo_id')+17,0);
				}
				$query_line .= " xmi_id like '%%' GROUP BY umlfiles.repo_id HAVING count_classes BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i]." LIMIT 25";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false){
						$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
					}
				
				$display = "'uml'";
			break;
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

			//Theoretically it works, the count is too much for a browser to support
			case '6 Number attribute':
				$query_line = substr_replace($query_line, " , COUNT(cd_attribute.id) as count_attributes ",strpos($query_line,'FROM')-1,0);
				if(strpos($query_line,'INNER JOIN cd_class') == false){
					$query_line = substr_replace($query_line, ' INNER JOIN cd_class ON umlfiles.has_xmi=cd_class.xmi_id INNER JOIN cd_attribute ON cd_attribute.cls_id=cd_class.ID ',strpos($query_line,'WHERE')-1,0);
				}else{	//or just one if the cd_class is already there
					$query_line = substr_replace($query_line, ' INNER JOIN cd_attribute ON cd_class.ID=cd_attribute.cls_id ',strpos($query_line,'WHERE')-1,0);
				}
				$query_line .= " cd_attribute.att_rname LIKE '%%' GROUP BY umlfiles.repo_id HAVING count_attributes BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i]." LIMIT 25";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false){
						$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
					}
				
				$display = "'uml'";
			break;
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

			//Theoretically it works, the count is too much for a browser to support
			case '7 Number operation':
				$query_line = substr_replace($query_line, " , COUNT(cd_operation.id) as count_operations ",strpos($query_line,'FROM')-1,0);
				//Add 2 new table on the query
				if(strpos($query_line,'INNER JOIN cd_class') == false){
					$query_line = substr_replace($query_line, ' INNER JOIN cd_class ON umlfiles.has_xmi=cd_class.xmi_id INNNER JOIN cd_operation ON cd_operation.cls_id=cd_class.ID ',strpos($query_line,'WHERE')-1,0);
				}else{	//or just one if the cd_class is already there
					$query_line = substr_replace($query_line, ' INNER JOIN cd_operation on cd_class.ID=cd_operation.cls_id ',strpos($query_line,'WHERE')-1,0);
				}
				$query_line .= " cd_operation.opr_name LIKE '%%' GROUP BY umlfiles.repo_id HAVING count_operations BETWEEN ".$usable_table -> user_input_filter_1[$i]." AND ".$usable_table -> user_input_filter_2[$i]." LIMIT 25";
				
				if(strpos($query_line,'COUNT(umlfiles.id) AS count_filenumber') != false){
						$query_line =substr_replace($query_line, "",strpos($query_line,", COUNT(umlfiles.id) AS count_filenumber "),41);
					}
				
				$display = "'uml'";
			break;
			//--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

		
		
		}
		
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		// Add the 'and' when it is necessary 
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		if(($i+1) != sizeof($usable_table -> category_filter) &&  sizeof($usable_table -> category_filter) != 0){

			$query_line .= " AND ";
		}
		
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		//incremente l'indice, get to the next column in the array
		// ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------
		$i++;
	}
		
		
		//add an end to the query_line, then displays it for control
		//$query_line .=" LIMIT 25";
		echo '<br>';
		//echo($query_line);
		echo '<br>';
		
		//If there is a problem with the query, displays it, else, prepare the query
		if($sql = $conn -> prepare($query_line) == false){
			echo($conn -> error);
		}else{
			$sql = $conn -> prepare($query_line);
		}
		
		//execute the query and get the result
		$sql -> execute();
		$result = $sql -> get_result();
		
		$result_to_be_encoded = array();
		
		//fill the array with all the results
		while ($row = $result->fetch_assoc()) {
			$result_to_be_encoded []= $row;
		}
		

		//encode it to json, to be passed to js
		$encoded_result = json_encode($result_to_be_encoded);

		
		//replace the ' with a space to eliminate problems
		$encoded_result = str_replace("'"," ",$encoded_result);
		
		//add a ' at the beginning and at the end so that the js undersatands the json line
		$temp = "'";
		$temp .= $encoded_result;
		$temp .= "'";
		$encoded_result = $temp;
		
		//print_r($encoded_result);
		
		echo ("<script type = 'text/javascript'>
		var JSON_result = $encoded_result;
		</script>");
		
		//call the js function that add cards to display the result
		echo ("<script type = 'text/javascript'>
		switch_view($display)
		</script>");

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
	
	

	 <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../js/jqBootstrapValidation.js"></script>
    <script src="../js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../js/agency.min.js"></script>


</body>
</html>