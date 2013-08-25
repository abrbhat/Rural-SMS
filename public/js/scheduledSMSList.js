
	var rowid = 0;
        function addRow(tableID) {
 
            var table = document.getElementById(tableID);
		rowid++;
            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
		row.setAttribute("id",  rowid);
            
 
            var cell3 = row.insertCell(0);
            var element3 = document.createElement("input");
            element3.type = "text";
            element3.name = "txtbox[]";
	    element3.class="form-group";
	     	cell3.appendChild(element3);
	
		var cell4= row.insertCell(1);
		var element4 = document.createElement("select");
		for( var i=1; i<=31; i++){
			
		var option1 = document.createElement("option");
		option1.value = i; option1.innerHTML = i; element4.add(option1, null);
		
		}
		cell4.appendChild(element4);
		
		var cell5= row.insertCell(2);
		var element5 = document.createElement("select");
		for( var j=1; j<=12; j++){
			
		var option1 = document.createElement("option");
		option1.value = j; option1.innerHTML = j; element5.add(option1, null);
		
		}
		cell5.appendChild(element5);
		
		var cell6= row.insertCell(3);
		var element6 = document.createElement("select");
		for( var k=1; k<=10; k++){
			
		var option1 = document.createElement("option");
		option1.value = k; option1.innerHTML = k; element6.add(option1, null);
		
		}
		cell6.appendChild(element6);
		
		var cell1 = row.insertCell(4);
		var element1 = document.createElement("input");
            element1.type = "checkbox";
            element1.name="chkbox[]";
            cell1.appendChild(element1);
 
        }
 
        function deleteRow(tableID) {
            try {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
 
            for(var i=0; i<rowCount; i++) {
                var row = table.rows[i];
                var chkbox = row.cells[4].childNodes[0];
                if(null != chkbox && true == chkbox.checked) {
                    table.deleteRow(i);
                    rowCount--;
                    i--;
                }
 
 
            }
            }catch(e) {
                alert(e);
            }
        }
 
   
