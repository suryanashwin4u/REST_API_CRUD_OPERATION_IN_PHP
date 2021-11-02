<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
// header('Access-Control-Allow-Methods: GET');

//post data as json and fetch result from api
$data = json_decode( file_get_contents("php://input"), true );

// when data post in json format
$user_name = $data['search_name'];

// when data sent in url format using get method
// $search_name = isset( $_GET['search_name'] )? $_GET['search_name'] : die("value not set");

include "config.php";

$sql="select * from users where name like '%$search_name%'";

$result = mysqli_query($conn,$sql) or die("query failed");

if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array("message"=>"No data found", "status"=>false));
}

?>