
<!doctype html>
<html>
    <head>
	<meta charset="utf-8">
	<title>Database interaction</title>
      <style>
      #results tr {
border : 1px solid black;
background-color: rgba(0, 0, 0, 0.2);
      }
      </style>
    </head>
    
    <body>
	<button  onclick="getinfo()">Fetch Info from Db</button>
	<button onclick="insertinfo()">Send info to Db</button>
<button onclick="deleteall()">Delete all</button>            
	<table id="results">
	</table>

    </body>
    <script src="essai.js"></script>
</html>
