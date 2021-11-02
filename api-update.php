<?php
// this file accepting only json format
header('Content-Type: application/json');

// any user can access this file
header('Access-Control-Allow-Origin: *');

// this file accepting only put method for updating the data in the table
header('Access-Control-Allow-Methods: PUT');

// allowed headers formats with restrictions
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

//post data as json and fetch result from api
$data = json_decode( file_get_contents("php://input"), true ); 

$user_id = $data['id'];
$user_name = $data['name'];
$user_address = $data['address'];
$user_mobile = $data['mobile'];

include "config.php";

$sql="update users set name='$user_name', address='$user_address', mobile='$user_mobile' where id='$user_id'";

$result = mysqli_query($conn,$sql) or die("query failed");

if($result){
    echo json_encode(array("message"=>"user record updated", "status"=>true));
}else{
    echo json_encode(array("message"=>"user record not updated", "status"=>false));
}


?>