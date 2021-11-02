<?php
// this file accepting only json format
header('Content-Type: application/json');

// any user can access this file
header('Access-Control-Allow-Origin: *');

// this file accepting only post method
header('Access-Control-Allow-Methods: POST');

// allowed headers formats with restrictions
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

//post data as json and fetch result from api
$data = json_decode( file_get_contents("php://input"), true ); 

$user_name = $data['name'];
$user_address = $data['address'];
$user_mobile = $data['mobile'];

include "config.php";

$sql="insert into users(name,address,mobile) values('$user_name','$user_address','$user_mobile')";

$result = mysqli_query($conn,$sql) or die("query failed");

if($result){
    echo json_encode(array("message"=>"user record inserted", "status"=>true));
}else{
    echo json_encode(array("message"=>"user record not inserted", "status"=>false));
}


?>