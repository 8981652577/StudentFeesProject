<?php

$id=$_POST['id'];


$conn=mysqli_connect("localhost","root","","cpc_center");

$sql="select * from add_student where id='$id'";

$res=mysqli_query($conn,$sql);

$data = mysqli_fetch_assoc($res);

$name = $data['name'];
$email=$data['email'];
$contact=$data['contact'];
$address=$data['address'];
$course=$data['course'];
$fees=$data['Fees_structure'];
$amount=$data['amount'];
$date=$data['date_admission'];
$register=$data['register_no'];

$result = array("name"=>$name,"email"=>$email,"contact"=>$contact,"address"=>$address,"course"=>$course,"fees"=>$fees,"amount"=>$amount,"date"=>$date,"register"=>$register,"id"=>$id);

echo json_encode($result);


?>