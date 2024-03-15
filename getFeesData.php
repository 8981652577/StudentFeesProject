<?php

$id=$_POST['id'];

$conn=mysqli_connect('localhost','root','','cpc_center');

$sql="select * from addfees where sno='$id'";

$res=mysqli_query($conn,$sql);

$data=mysqli_fetch_assoc($res);

$date=$data['date1'];
$amount=$data['amount'];
$due=$data['due_rs'];
$month=$data['month'];
$sno=$data['sno'];
$email=$data['student_email'];

$result=array("date"=>$date,"amount"=>$amount,"due"=>$due,"month"=>$month,'sno'=>$sno,'email'=>$email);

echo json_encode($result);
?>