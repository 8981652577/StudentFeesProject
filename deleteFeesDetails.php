<?php

$reg_no=$_POST['id'];

$conn=mysqli_connect('localhost','root','','cpc_center');

$sql="delete from addfees where sno='$reg_no'";

$res=mysqli_query($conn,$sql);

if($res==1)
{
    echo "Data Deleted successfully";
}
else
{
    echo "something problem";
}

return $res;

?>