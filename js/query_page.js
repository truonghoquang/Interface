//Add new fields and filters for the QUERY page ONLY 
		
var counterField = 1;
var counterFilter = 1;
		
function add_field(divName,inputType){
		
		var newdiv = document.createElement('div');
		switch(inputType) {
          case 'field':
		  
				newdiv.className = "input-group";	//definition of newdiv in general
				newdiv.id = "additional_field"+counterField;	//Different id to remove the selected one
				newdiv.style = "margin-top : 2%";
				
				//AND OR button
				var andor_button = document.createElement("select");		//Creation of the dropdown AND/OR button
				andor_button.className = "btn btn-primary dropdown-toggle current_andor";
				andor_button.id = "dropdownAndOrButton";

				var select_and = new Option();		//Options for the dropdown button
				select_and.value = 'AND';
				select_and.text = "AND";
				andor_button.options.add(select_and);
				
				var select_or = new Option();
				select_or.value = 'OR';
				select_or.text = "OR";
				andor_button.options.add(select_or);
				
				var div_andor_style = document.createElement("div");
				div_andor_style.className = "align-self-start";
				div_andor_style.style = "margin-right : 2%";
				
				div_andor_style.appendChild(andor_button);
				
				
				//Input field
				
				var input_field = document.createElement("input");	//Creation of the input field
				input_field.className = "form-control";
				input_field.type = "text";
				input_field.placeholder="Search for ...";
				input_field.name = "user_input_field";
				
				
				//Remove button
				var	remove_button = document.createElement("button");	//Creation of the Remove button
				remove_button.className = "btn btn-primary";
				remove_button.style = "margin-left : 5%";
				
				remove_button.onclick = function remove_field(){
					var remove_id = newdiv.id;			//remove function, works with the id
					var elem = document.getElementById(remove_id);
					elem.parentNode.removeChild(elem);
				};
				
				var button_text = document.createTextNode (" - ");	//Text on the remove button
				remove_button.appendChild(button_text);
				
				var div_remove_style = document.createElement("div");
				div_remove_style.className = "col-sm-auto";
				
				div_remove_style.appendChild(remove_button);
				
				
				
				//Dropdown Button
				var dropdown_button = document.createElement("select");		//Creation of the dropdown button
				dropdown_button.className = "btn btn-primary dropdown-toggle current_text";
				dropdown_button.id = "dropdownMenuButton";

				var select_1 = new Option();		//Options for the dropdown button
				select_1.value = 'All';
				select_1.text = "All";
				dropdown_button.options.add(select_1);
				
				var select_2 = new Option();
				select_2.value = 'User tag';
				select_2.text = "User tag";
				select_2.disabled = true;
				dropdown_button.options.add(select_2);
				
				var select_3 = new Option();
				select_3.value = 'Author name';
				select_3.text = "Author name";
				dropdown_button.options.add(select_3);
				
				var select_4 = new Option();
				select_4.value = 'File name';
				select_4.text = "Diagram name";
				dropdown_button.options.add(select_4);
				
				var select_5 = new Option();
				select_5.value = 'Project name';
				select_5.text = "Project name";
				dropdown_button.options.add(select_5);
				
				var div_dropdown_style = document.createElement("div");
				div_dropdown_style.className = "col-sm-auto";
				
				div_dropdown_style.appendChild(dropdown_button);
				
				//Add all to the new div
				newdiv.appendChild(div_andor_style);
				newdiv.appendChild(input_field);
				newdiv.appendChild(div_dropdown_style);
				newdiv.appendChild(div_remove_style);
			  
			    counterField++;
               break;
			  
          }
     document.getElementById(divName).appendChild(newdiv);	//append the newdiv to the correct place in the page
		
		}
		

//Function to get the data that is typed by the user and build the JSON object
function start_query(){
			
		var i;
			
			//This object will send the user_input_field and current_text as arrays of strings to the PHP file
			var js_object = {};
			js_object.andor = [];
			js_object.category = [];
			js_object.user_input = [];
			js_object.category_filter = [];
			js_object.user_input_filter_1 = [];
			js_object.user_input_filter_2 = [];
		
			//---------------------------------------------------AND/OR------------------------------------------------------------
			var test = document.getElementsByClassName('current_andor');
			if( test != 'null'){
				for(i = 0; i<test.length; i++){
					js_object.andor.push(test[i].value);
				}
			
			}
		
			//------------------------------------------------Field + category -------------------------------------------------
			
			var category_field = document.getElementsByClassName('current_text');		//Allow to get the value of the dropdown button, will be used to get the category of the search
			var user_search = document.getElementsByName('user_input_field');		//get an array containing all the data that have 'user_input_field' as name
			
			
			for (i=0; i<user_search.length;i++){
				if (user_search[i].value.localeCompare("") != 0){
					//alert(category_field[i].value+' / '+user_search[i].value);
					
					js_object.category.push (category_field[i].value);
					js_object.user_input.push(user_search[i].value);
					
				}
			}
			
			//------------------------------------------------Filters-------------------------------------------------
			
			var category_filter = document.getElementsByClassName('current_filter');
			var user_filter_1 = document.getElementsByName('filter_1');
			var user_filter_2 = document.getElementsByName('filter_2');
			
			for (i=0 ; i<category_filter.length ; i++){
				
				if(user_filter_1[i].value != "" || user_filter_2[i].value != ""){
					
					//alert(category_filter[i].value+ " / "+user_filter_1[i].value+ " / " +user_filter_2[i].value);
					
					js_object.category_filter.push(category_filter[i].value);
					js_object.user_input_filter_1.push(user_filter_1[i].value);
					js_object.user_input_filter_2.push(user_filter_2[i].value);
					
					
				
				}
			}
			
				//Pass a string to the PHP
			var to_string = JSON.stringify(js_object);
			
			 window.location.href = "php/query_result.php?js_object=" + to_string; 
			
}
	
	// Execute a function when the user releases a key on the keyboard
	document.addEventListener("keydown", function(event) {
  // Number 13 is the "Enter" key on the keyboard
		if (event.keyCode === 13) {
		// Trigger the button element with a click
			document.getElementById("search_button").click();
		}
});
	
	//General function to remove the content of a class
	
	function remove_class(div_id){
		document.getElementById(div_id).innerHTML="";
		
		//Particular case for the class diagrams field
		if (div_id == "more_class"){
			var to_hide = document.getElementById('class_fields');
			to_hide.style = "display : none";
		}
	};
	
	