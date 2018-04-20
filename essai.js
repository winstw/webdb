"use strict";

function clearTable(){

    var table = document.getElementById("results");
    while (table.lastChild) {
	table.removeChild(table.lastChild);
}
}
var displayTable = function(jsonInput){
    if (jsonInput != null){
      var table = document.getElementById('results');
      //    console.log(myJson);
      for (var object of jsonInput){
	  var tr = document.createElement('tr');
	  table.appendChild(tr);
	  for (var item in object){
      	  var td = document.createElement('td');
	  td.textContent = object[item];
	  tr.appendChild(td);
	  }
      }
    }
}


function getinfo(){
    clearTable();
    fetch('db.php?method=getinfo').then(function(data){
	return data.json();
    }).then (myJson => displayTable(myJson));
    
}

function insertinfo(){
        clearTable();
    fetch('db.php?method=insertinfo').then((data) => data.json()).then(
	myJson => displayTable(myJson));

}

function deleteall(){
        clearTable();
    fetch('db.php?method=deleteall').then((data) => data.json()).then(
	myJson => displayTable(myJson));
    
}
