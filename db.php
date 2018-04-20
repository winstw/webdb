<?php

$method = filter_input(INPUT_GET,"method", FILTER_SANITIZE_STRING);
$methods = ["getinfo", "insertinfo", "deleteall"];



function getall(&$retour){
    $query = "SELECT * from users;";
    $result = pg_query($query);
    while ($ligne = pg_fetch_array($result, NULL, PGSQL_ASSOC)){
	$retour[] =  $ligne;//['userid'].' '.$ligne['password'].' '.$ligne['ver_code']; 
    }
    
}

if ($method !== null && in_array($method, $methods)){

    include_once("settings.php");
    $db = pg_connect( "$host $port $dbname $credentials"  );

    if(!$db) {

	$retour["msg"] = "Error : Unable to open database\n";

    } else {

	//	$retour["msg"] = "Opened database successfully\n<br/>";
	$retour;
	if ($method === "getinfo"){
	    getall($retour);
	}
	else if ($method ==="insertinfo"){

	    $query = "INSERT into users(username, password, ver_code) VALUES('geof', 'frites', 2342341);";
	    pg_query($query);
	    $retour[] = "inserted with success";

	    getall($retour);
	}
	else if ($method === "deleteall"){
	    $query = "DELETE FROM users";
	    pg_query($query);
	    getall($retour);
	    
	    }
	pg_close($db);
    }

    echo json_encode($retour);
}

//return json_encode($retour);
?>



