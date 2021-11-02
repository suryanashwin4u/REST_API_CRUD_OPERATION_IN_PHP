<?php
// this file accepting only json format
header('Content-Type: application/json');

// any user can access this file
header('Access-Control-Allow-Origin: *');

// this file accepting only post method
header('Access-Control-Allow-Methods: DELETE');

// allowed headers formats with restrictions
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

//post data as json and fetch result from api
$data = json_decode( file_get_contents("php://input"), true ); 

$user_id = $data['id'];

include "config.php";


$sql="delete from users where id = '$user_id'";

$result = mysqli_query($conn,$sql) or die("query failed");

if($result){
    echo json_encode(array("message"=>"user record deleted", "status"=>true));
}else{
    echo json_encode(array("message"=>"user record not deleted", "status"=>false));
}


?>