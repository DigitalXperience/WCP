<?php 

// database access
$hostname = 'e764qqay0xlsc4cz.cbetxkdyhwsb.us-east-1.rds.amazonaws.com';
$username = 'km8np5dgcp57uf35';
$password = 'vsxx5t9w7l4v3bnw';
$database = 'rcwovutqnf0pe65l';

// Create connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$query = "SELECT id, id_fb, msg FROM notifications_fb WHERE status = 0 LIMIT 1;";

if ($result = mysqli_query($conn, $query)) {  
   while ($obj = mysqli_fetch_object($result)){
		$id_n = $obj->id;
		$id = $obj->id_fb;
		$msg = $obj->msg;
   }
   $ch = curl_init(); 
   
   // Escape a string used as a GET parameter
	//$msg = curl_escape($ch, $msg);
		
	// set url 
	$url = "https://arcane-basin-34980.herokuapp.com/notifications.php?id_fb=$id&msg=".utf8_encode($msg);
	//var_dump($url); die;
	curl_setopt($ch, CURLOPT_URL, $url); 
	curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
	//curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false)

	//return the transfer as a string 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

	// $output contains the output string 
	$output = curl_exec($ch); 
	echo $output;

	// close curl resource to free up system resources 
	curl_close($ch);
	
	$sql = "UPDATE `notifications_fb` SET `status` =  1 WHERE  `id` = $id_n ;";

	$conn->query($sql);
	
   $result->close();
}