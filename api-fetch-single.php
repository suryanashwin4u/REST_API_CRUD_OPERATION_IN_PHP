<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

//post data as json and fetch result from api
$data = json_decode( file_get_contents("php://input"), true ); 
$user_id = $data['id'];

include "config.php";

$sql="select * from users where id = $user_id";

$result = mysqli_query($conn,$sql) or die("query failed");

if(mysqli_num_rows($result)>0){
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
}else{
    echo json_encode(array("message"=>"No data found", "status"=>false));
}


?>