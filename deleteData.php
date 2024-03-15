<?php

$id=$_GET['id'];

$conn=mysqli_connect("localhost","root","","cpc_center");

$sql="delete from add_student where id='$id'";

$res=mysqli_query($conn,$sql);

if($res==1)
{
    echo "deleted successfully";
}
else
{
    echo "something problem";
}

?>