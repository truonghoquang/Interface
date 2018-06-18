//Function to get the data that is typed by the user, and to put it in JSON, to be sent to the PHP
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
			
			//The lines below get the data and fill the object
		
			//---------------------------------------------------AND/OR------------------------------------------------------------
			var current_andor = document.getElementsByClassName('current_andor');
			if( current_andor != 'null'){
				for(i = 0; i<current_andor.length; i++){
					js_object.andor.push(current_andor[i].value);
				}
			
			}
			
			//------------------------------------------------Field + category -------------------------------------------------
			var category_field = document.getElementsByClassName('current_text');		//Allow to get the value of the dropdown button, will be used to get the category of the search
			var user_search = document.getElementsByName('user_input_field');		//get an array containing all the data that have 'user_input_field' as name
			
			for (i=0; i<user_search.length;i++){
				if (user_search[i].value.localeCompare("") != 0){
					js_object.category.push (category_field[i].value);
					js_object.user_input.push(user_search[i].value)
				}
			}
			
			//------------------------------------------------Filters-------------------------------------------------
			var category_filter = document.getElementsByClassName('current_filter');
			var user_filter_1 = document.getElementsByName('filter_1');
			var user_filter_2 = document.getElementsByName('filter_2');
			
			for (i=0 ; i<category_filter.length ; i++){
				
				if(user_filter_1[i].value != "" || user_filter_2[i].value != ""){
					js_object.category_filter.push(category_filter[i].value);
					js_object.user_input_filter_1.push(user_filter_1[i].value);
					js_object.user_input_filter_2.push(user_filter_2[i].value);
				}
			}
			
			//Changes the format of the object oto JSON for PHP
			var to_string = JSON.stringify(js_object);
			
			//pass it to PHP
			window.location.href = "php/advanced_query_result.php?js_object=" + to_string; 
			
}
	
	//Enter pressed equivalent to click on the Search button
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
	
	function show_class(){
		var to_show = document.getElementById('class_fields');
		to_show.style = "";
	}
	
	
	//Changes the plus to a minus when the menu is collapsing
	function plusminus(change_button){
		var all_buttons = document.getElementsByClassName("main");
		if(all_buttons[change_button].innerHTML == "-"){
			all_buttons[change_button].innerHTML = "+";
		}else{
			all_buttons[change_button].innerHTML = "-";
		}
	}
	
	//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
	//Add new fields and filters for the ADVANCED page ONLY 
	var counterFieldProject = 0;
	var counterFieldDiagram = 0;
	var counterFieldDoc = 0;
	var counterFieldClass = 0;
	
	function add_fields(divid){
		
		
		switch (divid){
			//------------------------------------------------------------------- add more fields in Projects---------------------------------------------------------
			case "more_project":
			
			
				var div_name = document.getElementById(divid);
		
				var row = document.createElement("div");
				row.className = "row";
				row.style = "margin-top : 1%"
				row.id = "additional_field"+counterFieldProject;
			
				var col6 = document.createElement("div");
				col6.className = "col-lg-6";
				col6.id = "input_or_filters_"+counterFieldProject+" project";
		
				//Input field
				var input_field = document.createElement("input");	//Creation of the input field
				input_field.type = "text";
				input_field.placeholder="Search for ...";
				input_field.name = "user_input_field";
				input_field.className = "form-control";
		
		
				col6.appendChild(input_field);
				row.appendChild(col6);
		
				//Dropdown Button
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var dropdown_button = document.createElement("select");		//Creation of the dropdown button
				dropdown_button.className = "btn btn-primary dropdown-toggle current_text "+counterFieldProject+" project";
				dropdown_button.id = "dropdownMenuButton";
				dropdown_button.onchange = this.switch_input_filters.bind(this, dropdown_button.className, col6.id);

				var select_1 = new Option();		//Options for the dropdown button
				select_1.value = '1 Project name';
				select_1.text = "Project Name";
				dropdown_button.options.add(select_1);
				
				var select_2 = new Option();
				select_2.value = '2 Founder name';
				select_2.text = "Founder Name";
				dropdown_button.options.add(select_2);
				
				var select_3 = new Option();
				select_3.value = '3 Number commit';
				select_3.text = "N# of Commits";
				dropdown_button.options.add(select_3);
				
				var select_4 = new Option();
				select_4.value = '4 Life time';
				select_4.text = "Life-Time of the Project";
				select_4.disabled = true;
				dropdown_button.options.add(select_4);
			
				var select_5 = new Option();
				select_5.value = '5 Active time';
				select_5.text = "Active Time Period";
				select_5.disabled = true;
				dropdown_button.options.add(select_5);
			
				var select_6 = new Option();
				select_6.value = '6 Number UML diagram';
				select_6.text = "N# of UML Diagrams";
				dropdown_button.options.add(select_6);
			
				var select_7 = new Option();
				select_7.value = '7 Number contributor';
				select_7.text = "N# of Contributors";
				select_7.disabled = true;
				dropdown_button.options.add(select_7);
		
				colauto.appendChild(dropdown_button);
				row.appendChild(colauto);
		
		
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				_button.onclick = this.add_fields.bind(this,'more_project');
				
				var button_text = document.createTextNode ("+");
				_button.appendChild(button_text);
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
		
				div_name.appendChild(row);
			
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				_button.onclick = this.add_fields.bind(this,'more_project');
				
				var button_text = document.createTextNode ("-");
				_button.appendChild(button_text);
			
			
				_button.onclick = function remove_filter(){
					var remove_id = row.id;			//remove function, works with the id
					var elem = document.getElementById(remove_id);
					elem.parentNode.removeChild(elem);
				};
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
			
				div_name.appendChild(row);
			
				counterFieldProject ++;
			
			break;
			
			//------------------------------------------------------------------- add more fields in Diagrams---------------------------------------------------------
			case ("more_diagram"):
			
				var div_name = document.getElementById(divid);
		
				var row = document.createElement("div");
				row.className = "row";
				row.style = "margin-top : 1%"
				row.id = "additional_field"+counterFieldProject;
			
				var col6 = document.createElement("div");
				col6.className = "col-lg-6";
				col6.id = "input_or_filters_"+counterFieldDiagram;
		
				//Input field
				var input_field = document.createElement("input");	//Creation of the input field
				input_field.type = "text";
				input_field.placeholder="Search for ...";
				input_field.name = "user_input_field";
				input_field.className = "form-control";
		
		
				col6.appendChild(input_field);
				row.appendChild(col6);
		
				//Dropdown Button
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var dropdown_button = document.createElement("select");		//Creation of the dropdown button
				dropdown_button.className = "btn btn-primary dropdown-toggle current_text"+counterFieldDiagram;
				dropdown_button.id = "dropdownMenuButton";

				var select_1 = new Option();		//Options for the dropdown button
				select_1.value = '1 Diagram name';
				select_1.text = "Diagram Name";
				dropdown_button.options.add(select_1);
				
				var select_2 = new Option();
				select_2.value = '2 File type';
				select_2.text = "File Type";
				select_2.disabled = true;
				dropdown_button.options.add(select_2);
				
		
				colauto.appendChild(dropdown_button);
				row.appendChild(colauto);
		
		
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				_button.onclick = this.add_fields.bind(this,'more_diagram');
				
				var button_text = document.createTextNode ("+");
				_button.appendChild(button_text);
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
		
				div_name.appendChild(row);
			
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
			
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				
				var button_text = document.createTextNode ("-");
				_button.appendChild(button_text);
			
			
				_button.onclick = function remove_filter(){
					var remove_id = row.id;			//remove function, works with the id
					var elem = document.getElementById(remove_id);
					elem.parentNode.removeChild(elem);
				};
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
		
				div_name.appendChild(row);
			
				counterFieldDiagram ++;
			
			
				break;
			
			
			//------------------------------------------------------------------- add more fields in Documentation---------------------------------------------------------
			case ("more_doc"):
			
				var div_name = document.getElementById(divid);
		
				var row = document.createElement("div");
				row.className = "row";
				row.style = "margin-top : 1%"
				row.id = "additional_field"+counterFieldProject;
			
				var col6 = document.createElement("div");
				col6.className = "col-lg-6";
				col6.id = "input_or_filters_"+counterFieldDoc +" doc";
		
				//Input field
				var input_field = document.createElement("input");	//Creation of the input field
				input_field.type = "text";
				input_field.placeholder="Search for ...";
				input_field.name = "user_input_field";
				input_field.className = "form-control";
		
		
				col6.appendChild(input_field);
				row.appendChild(col6);
			
				//Dropdown Button
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var dropdown_button = document.createElement("select");		//Creation of the dropdown button
				dropdown_button.className = "btn btn-primary dropdown-toggle current_text "+counterFieldDoc+" doc";
				dropdown_button.id = "dropdownMenuButton";
				dropdown_button.onchange = this.switch_input_filters.bind(this, dropdown_button.className, col6.id);

				var select_1 = new Option();		//Options for the dropdown button
				select_1.value = '1 File name';
				select_1.text = "File Name";
				dropdown_button.options.add(select_1);
					
				var select_2 = new Option();
				select_2.value = '2 Specific term';
				select_2.text = "Specific Term";
				dropdown_button.options.add(select_2);
			
				var select_3 = new Option();
				select_3.value = '3 File type';
				select_3.text = "File Type";
				dropdown_button.options.add(select_3);
			
				var select_4 = new Option();
				select_4.value = '4 File size';
				select_4.text = "File Size";
				dropdown_button.options.add(select_4);
			
				var select_5 = new Option();
				select_5.value = '5 Number UML diagram';
				select_5.text = "N# of UML Diagrams";
				dropdown_button.options.add(select_5);
		
				colauto.appendChild(dropdown_button);
				row.appendChild(colauto);
		
		
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				_button.onclick = this.add_fields.bind(this,'more_doc');
				
				var button_text = document.createTextNode ("+");
				_button.appendChild(button_text);
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
		
				div_name.appendChild(row);
			
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				
				var button_text = document.createTextNode ("-");
				_button.appendChild(button_text);
			
			
				_button.onclick = function remove_filter(){
					var remove_id = row.id;			//remove function, works with the id
					var elem = document.getElementById(remove_id);
					elem.parentNode.removeChild(elem);
				};
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
			
				div_name.appendChild(row);
			
				counterFieldDoc ++;
			
			break;
			
			//------------------------------------------------------------------- add  the class fields---------------------------------------------------------
			case ("more_class"):
			
				var to_display = document.getElementById('class_fields');
				to_display.style = "display : inline";
			
				var div_name = document.getElementById(divid);
		
				var row = document.createElement("div");
				row.className = "row";
				row.style = "margin-top : 1%"
				row.id = "additional_field"+counterFieldClass;
				
		
				var row = document.createElement("div");
				row.className = "row";
				row.style = "margin-top : 1%"
				row.id = "additional_field"+counterFieldClass+" class";
			
				var col6 = document.createElement("div");
				col6.className = "col-lg-5";
				col6.id = "input_or_filters_"+counterFieldClass +" class";
		
				//Input field
				var input_field = document.createElement("input");	//Creation of the input field
				input_field.type = "text";
				input_field.placeholder="Search for ...";
				input_field.name = "user_input_field";
				input_field.className = "form-control";
		
		
				col6.appendChild(input_field);
				row.appendChild(col6);
			
				//Dropdown Button
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var dropdown_button = document.createElement("select");		//Creation of the dropdown button
				dropdown_button.className = "btn btn-primary dropdown-toggle current_text "+counterFieldClass+" class";
				dropdown_button.id = "dropdownMenuButton";
				dropdown_button.onchange = this.switch_input_filters.bind(this, dropdown_button.className, col6.id);

				var select_1 = new Option();		//Options for the dropdown button
				select_1.value = '1 Class name';
				select_1.text = "Class Name";
				dropdown_button.options.add(select_1);
					
				var select_2 = new Option();
				select_2.value = '2 Parameter name';
				select_2.text = "Parameter Name";
				select_2.disabled = true;
				dropdown_button.options.add(select_2);
			
				var select_3 = new Option();
				select_3.value = '3 Attribute name';
				select_3.text = "Attribute Name";
				dropdown_button.options.add(select_3);
			
				var select_4 = new Option();
				select_4.value = '4 Operation name';
				select_4.text = "Operation Name";
				dropdown_button.options.add(select_4);
			
				var select_5 = new Option();
				select_5.value = '5 Number class';
				select_5.text = "N# of Classes";
				dropdown_button.options.add(select_5);
				
				var select_6 = new Option();
				select_6.value = '6 Number attribute';
				select_6.text = "N# of Attributes";
				dropdown_button.options.add(select_6);
				
				var select_7 = new Option();
				select_7.value = '7 Number operation';
				select_7.text = "N# of Operations";
				dropdown_button.options.add(select_7);
				
				var select_8 = new Option();
				select_8.value = '8 Number element';
				select_8.text = "N# of Elements";
				select_8.disabled = true;
				dropdown_button.options.add(select_8);
				
				var select_9 = new Option();
				select_9.value = '9 Number parameter';
				select_9.text = "N# of Parameters";
				select_9.disabled = true;
				dropdown_button.options.add(select_9);
				
				var select_10 = new Option();
				select_10.value = '10 Number NOC';
				select_10.text = "N# of (NOC) Metrics";
				select_10.disabled = true;
				dropdown_button.options.add(select_10);
				
				var select_11 = new Option();
				select_11.value = '11 Number DIT';
				select_11.text = "N# of (DIT) Metrics";
				select_11.disabled = true;
				dropdown_button.options.add(select_11);
				
				var select_12 = new Option();
				select_12.value = '12 Number coupling';
				select_12.text = "N# of Max. Coupling";
				select_12.disabled = true;
				dropdown_button.options.add(select_12);
		
				colauto.appendChild(dropdown_button);
				row.appendChild(colauto);
		
		
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				_button.onclick = this.add_fields.bind(this,'more_class');
				
				var button_text = document.createTextNode ("+");
				_button.appendChild(button_text);
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
		
				div_name.appendChild(row);
			
				var colauto = document.createElement("div");
				colauto.className = "col-sm-auto";
		
				var	_button = document.createElement("button");
				_button.className = "btn btn-primary col-sm-auto";
				
				var button_text = document.createTextNode ("-");
				_button.appendChild(button_text);
			
			
				_button.onclick = function remove_filter(){
					var remove_id = row.id;			//remove function, works with the id
					var elem = document.getElementById(remove_id);
					elem.parentNode.removeChild(elem);
				};
		
				colauto.appendChild(_button);
				row.appendChild(colauto);		
			
				div_name.appendChild(row);
			
				counterFieldClass ++;
				
			break;
		
		}
		
	}
	
	
	//----------------------------------------------------------------When an option is selected on a dropdown button, switchs between an input field or 2 filters accordingly------------------------------------------------
	
	function switch_input_filters(div_name,id_name){
		var dropdown_to_check = document.getElementsByClassName(div_name);
		var to_change = document.getElementById(id_name);
		
				
		if(dropdown_to_check[0].value.charAt(0) <3 && dropdown_to_check[0].className.indexOf("project") != -1 || dropdown_to_check[0].value.charAt(0) < 4 && dropdown_to_check[0].className.indexOf("doc") != -1 || dropdown_to_check[0].value.charAt(0) <5 && dropdown_to_check[0].className.indexOf("class") != -1 ){
		
			to_change.innerHTML = "";
			
			//If necessary, changes the name from current_filter to current_text in order ro retrieve the data
			if(dropdown_to_check[0].className.indexOf("current_filter") != -1){
				var new_class_name = dropdown_to_check[0].className.replace('current_filter' , 'current_text');
				dropdown_to_check[0].setAttribute ('class' , new_class_name);
			}
			
			//Input field
			var input_field = document.createElement("input");	//Creation of the input field
			input_field.type = "text";
			input_field.placeholder="Search for ...";
			input_field.name = "user_input_field";
			input_field.className = "form-control";
		
		
			to_change.appendChild(input_field);
			
			
		}else{
			
			to_change.innerHTML = "";
			
			//If necessary, changes the current_text to current_filter in order ro retrieve the data
			if(dropdown_to_check[0].className.indexOf("current_text") != -1){
				var new_class_name = dropdown_to_check[0].className.replace('current_text' , 'current_filter');
				dropdown_to_check[0].setAttribute ('class' , new_class_name);
			}
			
			
			//Filters
			var row = document.createElement("div");
			row.className = "row";
		
			var col3 = document.createElement("div");
			col3.className = "col-lg-6";
		
			var input_field1 = document.createElement("input");	//Creation of the input field
			input_field1.className = "form-control";
			input_field1.type = "text";
			input_field1.placeholder="Between ...";
			input_field1.name = "filter_1";
		
			col3.appendChild(input_field1);
			row.appendChild(col3);
		
			var col3 = document.createElement("div");
			col3.className = "col-lg-6";
			
			var input_field2 = document.createElement("input");	//Creation of the input field
			input_field2.className = "form-control";
			input_field2.type = "text";
			input_field2.placeholder="And ...";
			input_field2.name = "filter_2";
		
			col3.appendChild(input_field2);
			row.appendChild(col3);
		
			to_change.appendChild(row);
			
		}
	}