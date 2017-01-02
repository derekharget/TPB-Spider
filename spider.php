<?php
require('config.php');
require('bencode.php');
require('class.spider.php');

$start = $argv[1]; //Start ID
$end = $argv[2]; //End ID

$db = new mysqli(M_HOST, M_USER, M_PASS, M_DATA, M_PORT); //Establish Connection

if ($db->connect_error) {
	die("Connection failed: " . $db->connect_error);
}



while($start > $end){
	
	$data = new tpbspider();
    
		
	
	$sql = "INSERT INTO torrent (pid, name, hash, uploaded, desc, user, category) VALUES (data, data, data)";

	if ($db->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $db->error;
}
		
		
		
		
		
    }
?>