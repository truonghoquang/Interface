//Used to switch the views (between card and list)
var forswitch = false;
//Used to noy have to reask the query results everytime the view is changed
var display_type;
//Used to know if the sorting should be increasing or decrasing order
var increasing = true;

//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//function to display the card view
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
function add_field(){
	
	//Parse the reusults from the queries
	var result = JSON.parse(JSON_result);
	
	var i;
	var displayed_number_result = 0;
	
	//Empty the screen
	document.getElementById("more_project_card").innerHTML = "";
	document.getElementById("more_diagram_card").innerHTML = "";
	document.getElementById("more_doc_card").innerHTML = "";
	document.getElementById("more_diagram_list").innerHTML = "";
	document.getElementById("more_project_list").innerHTML = "";
	
	
	//Make the dropdown buttton go back to its default value
	var dropdownMenuButton = document.getElementById("dropdownMenuButton");
	dropdownMenuButton.selectedIndex = 0;
	
	
	if(forswitch == true){
	if(result.length == 0){
		var no_result_template = document.getElementById("no_result_template");
			
			if ("content" in document.createElement("template")) {
				var clone = document.importNode(no_result_template.content, true);
				document.getElementById('more_project_card').appendChild(clone);
			}
	}else{
	switch (display_type){
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Display of the diagrams
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		case 'uml':
			var project_template = document.getElementById("diagram_card_template");
			
			for (i=0; i<result.length;i++){
				if ("content" in document.createElement("template")) {
		
					var clone = document.importNode(project_template.content, true);

					var template_number = clone.getElementById('template_number');	
					
					var dia_name = clone.getElementById('dia_name');
					var project_name = clone.getElementById('project_name');
					var dia_image = clone.getElementById("dia_image");
					var ahref = clone.getElementById("ahref");
					var link = clone.getElementById("project_link");
					var dia_type = result[i].umlfiles_name.substr(result[i].umlfiles_name.length-3);
					if(dia_type == "peg"){dia_type = "jpeg";}
					var dia_type_id = clone.getElementById("dia_type");
					var xml_display = clone.getElementById("xml_display");
					var placeholder = clone.getElementById('placeholder');
					
					//if( i == 0 || result[i-1].umlfiles_name != result[i].umlfiles_name){
						
						displayed_number_result ++;
						
						template_number.id = template_number.id+' '+i;
						project_name.innerHTML = result[i].repos_name;
						dia_name.innerHTML = result[i].umlfiles_name;
						dia_image.style = "object-fit : scale-down; max-width : 100%; max-height : 250px; background_size : cover";
						dia_type_id.innerHTML = dia_type;
						ahref.href = result[i].umlfies_url;
						link.href = result[i].repos_url;
						if(dia_type == 'uml' || dia_type == "xml" || dia_type == "xmi" || dia_type == "svg"){
					
							xml_display.src = result[i].umlfies_url;
							//dia_image.style.backgroundColor = "white";
							dia_image.parentNode.removeChild(dia_image);
							placeholder.src = "";
					
						}else{
							if(dia_type == "png" || dia_type == "gif"){
								dia_image.style.backgroundColor = "white";
							}
							xml_display.parentNode.removeChild(xml_display);
							dia_image.data = result[i].umlfies_url;
							//ahref.style.backgroundImage = "url('"+result[i].umlfies_url+"')";
							
						}		
						document.getElementById('more_diagram_card').appendChild(clone);
					//}
				}
			}
		var number_result = document.getElementById('number_result');
		number_result.innerHTML = "Number of results : "+displayed_number_result;
			
			
		break;
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Display of the docs
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------

		case 'doc':
			var project_template = document.getElementById("doc_card_template");
		break;
		
		
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Display of the projects
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		default:
			var project_template = document.getElementById("project_card_template");
			var counter_proj = 1;
			
			for (i=0; i<result.length;i++){
				if ("content" in document.createElement("template")) {
		
					var clone = document.importNode(project_template.content, true);	
					
					var template_number = clone.getElementById('template_number');	
					
					var project_number = clone.getElementById('project_number');
					var project_name = clone.getElementById('project_name');
					var number_commits = clone.getElementById('number_commits');
					var founder_name = clone.getElementById('founder_name');
					var link = clone.getElementById("project_link");
					var number_models = clone.getElementById("number_models");
					var number_xmi = clone.getElementById("number_xmi");
			
					//if((i>0 && result[i-1].repos_name != result[i].repos_name || i == 0)){
						template_number.id = template_number.id+' '+i;
						project_number.innerHTML =  "#"+counter_proj+" ";
						project_name.innerHTML = result[i].repos_name;
						number_commits.innerHTML = result[i].number_commits;
						founder_name.innerHTML = result[i].founder;
						link.href = result[i].repos_url;
						number_models.innerHTML = result[i].count_filenumber;
						number_xmi.innerHTML = result[i].count_xmi;
						
						
						document.getElementById('more_project_card').appendChild(clone);
						counter_proj ++;
					//}
				}
			}
		break;
	

		
	
	}	
	forswitch = false;
	}
	}else{
		switch_view(display_type);
	}
}



//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//function to display the list view
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
function switch_view(display){
	
	var displayed_number_result = 0;
	
	//this function switchs to the list view or call the previous one if it's already in list view
	
	document.getElementById("more_project_card").innerHTML = "";
	document.getElementById("more_diagram_card").innerHTML = "";
	document.getElementById("more_doc_card").innerHTML = "";
	document.getElementById("more_diagram_list").innerHTML = "";
	document.getElementById("more_project_list").innerHTML = "";
	
	//Make the dropdown buttton go back to its default value
	var dropdownMenuButton = document.getElementById("dropdownMenuButton");
	dropdownMenuButton.selectedIndex = 0;
	
	//Parse the reusults from the queries
	var result = JSON.parse(JSON_result);
	display_type = display;
	var i;
	
	if(result.length == 0){
		
		var no_result_template = document.getElementById("no_result_template");
			
			if ("content" in document.createElement("template")) {
				var clone = document.importNode(no_result_template.content, true);
				document.getElementById('more_project_card').appendChild(clone);
			}
		
	}else{
		
		var number_result = document.getElementById('number_result');
		number_result.innerHTML = "Number of results : "+result.length;
	
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------
	//Display of the diagrams
	//-----------------------------------------------------------------------------------------------------------------------------------------------------------

	if(display_type == "uml"){
		//if the results are diagrams and the view not already in list
		if(forswitch == false){
	
		var project_template = document.getElementById("diagram_list_template");

			
			for (i=0; i<result.length;i++){
				if ("content" in document.createElement("template")) {
		
					var clone = document.importNode(project_template.content, true);

					
					var template_number = clone.getElementById('template_number');
					var dia_name = clone.getElementById('dia_name');
					var project_name = clone.getElementById('project_name');
					var dia_image = clone.getElementById("dia_image");
					var ahref = clone.getElementById("ahref");
					var ahref_project = clone.getElementById("ahref_project");
					var dia_type = result[i].umlfiles_name.substr(result[i].umlfiles_name.length-3);
					var xml_display = clone.getElementById("xml_display");
					var placeholder = clone.getElementById('placeholder');
					
						
					//if( i == 0 || result[i-1].umlfiles_name != result[i].umlfiles_name){
						
						displayed_number_result ++;
						
						template_number.id = template_number.id+' '+i;
						project_name.innerHTML = result[i].repos_name;
						dia_name.innerHTML = result[i].umlfiles_name;
						dia_image.style.backgroundSize = "cover";
						ahref.href = result[i].umlfies_url;
						dia_image.data = result[i].umlfies_url;
						ahref_project.href = result[i].repos_url;
						
						if(dia_type == 'uml' || dia_type == "xml" || dia_type == "xmi" || dia_type == "svg"){
					
							xml_display.src = result[i].umlfies_url;
							//dia_image.style.backgroundColor = "white";
							dia_image.parentNode.removeChild(dia_image);
							placeholder.src = "";
					
						}else{
							if(dia_type == "png" || dia_type == "gif"){
								dia_image.style.backgroundColor = "white";
							}
							xml_display.parentNode.removeChild(xml_display);
							dia_image.src = result[i].umlfies_url;
							//ahref.style.backgroundImage = "url('"+result[i].umlfies_url+"')";
							
						}		
				
						document.getElementById('more_diagram_list').appendChild(clone);
					//}
				}
			}
			forswitch = true;
			
			//display the effective number of diagrams shown (in case there are doubles) 
			var number_result = document.getElementById('number_result');
			number_result.innerHTML = "Number of results : "+result.length;
				
			
		}else{
			//go back to the card view
			add_field('uml');
		}
	}else{
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Display of the projects
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		if(forswitch == false){
			
			var title_template = document.getElementById("menu_project_list");
			
			if ("content" in document.createElement("template")) {
				var clone = document.importNode(title_template.content, true);	
				document.getElementById('more_project_list').appendChild(clone);
			}
			
			var project_template = document.getElementById("project_list_template");
			var counter_proj = 1;
			
			
			for (i=0; i<result.length;i++){
				if ("content" in document.createElement("template")) {
				
				var clone = document.importNode(project_template.content, true);	
				
				var template_number = clone.getElementById('template_number');
				var project_name = clone.getElementById('project_name');
				var project_number = clone.getElementById('project_number');
				var number_commits = clone.getElementById('number_commits');
				var founder_name = clone.getElementById('founder_name');
				var link = clone.getElementById("project_link");
				var number_models = clone.getElementById("number_models");
				var number_xmi = clone.getElementById("number_xmi");
				
				template_number.id = template_number.id+' '+i;
				project_number.innerHTML =  "#"+counter_proj+" ";
				project_name.innerHTML = result[i].repos_name;
				number_commits.innerHTML = result[i].number_commits;
				founder_name.innerHTML = result[i].founder;
				link.href = result[i].repos_url;
				number_models.innerHTML = result[i].count_filenumber;
				number_xmi.innerHTML = result[i].count_xmi;
				
						
				document.getElementById('more_project_list').appendChild(clone);
				counter_proj ++;
				
				}
			}
			
			forswitch = true;
		}else{
			add_field('project');
		}

	}
	}
}


//functions to sort the arrays of the sortingFunction, numbers or char or #number
function compare(x, y) {
	if(increasing == true){
		return x.value - y.value;
	}else{
		return y.value - x.value;
	}
}

function alphabet_sorting(x,y){
	if(increasing == true){
		if(x.value.toLowerCase() < y.value.toLowerCase()) return -1;
		if(x.value.toLowerCase() > y.value.toLowerCase()) return 1;
		return 0;
	}else{
		if(x.value.toLowerCase() < y.value.toLowerCase()) return 1;
		if(x.value.toLowerCase() > y.value.toLowerCase()) return -1;
		return 0;
	}
}

function project_number_sorting(x,y){
	if(increasing == true){
		if(parseInt(x.value.substr(1)) < parseInt(y.value.substr(1))) return x.value - y.value;
		if(parseInt(x.value.substr(1)) > parseInt(y.value.substr(1))) return y.value - x.value;
		return 0;
	}else{
		if(parseInt(x.value.substr(1)) < parseInt(y.value.substr(1))) return y.value - x.value;
		if(parseInt(x.value.substr(1)) > parseInt(y.value.substr(1))) return x.value - y.value;
		return 0;
	}
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//function to sort the different views
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
function sortingFunction(selected_option){
	
	//array that will conatain the value to be sorted and the template corresponding to each line
	var temparray = [];
	var i;
	
	
	
	switch(selected_option.value){
		
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Project number (default)
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		case 'Project number':
			if(forswitch == true){
				forswitch = false;
				switch_view(display_type);
			}else{
				forswitch = true;
				switch_view(display_type);
			}
		break;
		
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Number of UML diagrams
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		case 'N# UML':
		//sort by number of models
		var sorted_value = document.getElementsByName('number_models');
		
		//Fill the array
		for(i= 0; i<sorted_value.length; i++){
			//with the template and the value chosen for the sorting
			var temp = document.getElementById("template_number "+i);
			temparray[i] = {value:sorted_value[i].innerHTML , template: temp.innerHTML };
		}
		
		//sort the array by looking at the correct field
		temparray.sort(compare);
		break;

		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Project name
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		case 'Project name':
		//sort by project name
		var sorted_value = document.getElementsByName('project_name');
		
		//Fill the array
		for(i= 0; i<sorted_value.length; i++){
			//with the template and the value chosen for the sorting
			var temp = document.getElementById("template_number "+i);
			temparray[i] = {value:sorted_value[i].innerHTML , template: temp.innerHTML };
		}
		
		//sort the array by looking at the correct field
		temparray.sort(alphabet_sorting);
		break;
		
		
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Number of xmi representation
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		case 'N# xmi':
		//sort by the number of xmi
		var sorted_value = document.getElementsByName('number_xmi');
		//Fill the array
		for(i= 0; i<sorted_value.length; i++){
			//with the template and the value chosen for the sorting
			var temp = document.getElementById("template_number "+i);
			temparray[i] = {value:sorted_value[i].innerHTML , template: temp.innerHTML };
		}
		
		//sort the array by looking at the correct field
		temparray.sort(compare);
		break;
		
		
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//N# of commits
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		case 'N# commits':
		//sort by the number of commits
		var sorted_value = document.getElementsByName('number_commits');
		//Fill the array
		for(i= 0; i<sorted_value.length; i++){
			//with the template and the value chosen for the sorting
			var temp = document.getElementById("template_number "+i);
			temparray[i] = {value:sorted_value[i].innerHTML , template: temp.innerHTML };
		}
		
		//sort the array by looking at the correct field
		temparray.sort(compare);
		break;
		
		
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		//Founder name
		//-----------------------------------------------------------------------------------------------------------------------------------------------------------
		case 'Founder':
		//sort by founder
		var sorted_value = document.getElementsByName('founder_name');
		//Fill the array
		for(i= 0; i<sorted_value.length; i++){
			//with the template and the value chosen for the sorting
			var temp = document.getElementById("template_number "+i);
			temparray[i] = {value:sorted_value[i].innerHTML, template: temp.innerHTML };
		}
		
		//sort the array by looking at the correct field
		temparray.sort(alphabet_sorting);
		break;
		
		
		
	}	
	//replace the templates already shown by the ones stored in the table, in the correct order
	for(i=0 ;i<temparray.length;i++){	
		var toreplace = document.getElementById('template_number '+i);
		toreplace.innerHTML = "";
		toreplace.innerHTML = temparray[i].template;
	}
}

//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//function to sort by increasing or decrasing values
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
//----------------------------------------------------------------------------------------------------------------------------------------------------------------
function sort_order(){
	var current_order = document.getElementById('inc/dec');
	if(current_order.innerHTML == "Increasing"){
		current_order.innerHTML = "Decreasing";
		increasing = false;
	}else{
		current_order.innerHTML = "Increasing";
		increasing = true;
	}
	//alert(document.getElementById('dropdownMenuButton').value);
	sortingFunction(document.getElementById('dropdownMenuButton'));
}