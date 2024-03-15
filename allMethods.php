<?php
include('phpmailer/PHPMailerAutoload.php');

function dbConnect()
{
    $conn=mysqli_connect('localhost','root','','cpc_center');
    return $conn;   
}
function loginCheck($data)
{
    $email=$_POST['logemail'];
    $password=$_POST['logpassword'];


        $conn=dbConnect();

        $sql="select * from login where email='$email' and password='$password'";

        $res=mysqli_query($conn,$sql);

         return $res;

}

function loginDetails()
{
    $conn=dbConnect();

    $sql="select * from login ";

    $res=mysqli_query($conn,$sql);

    return $res;
}

function sendNotify($toEmail,  $pdfFilePath)
    {
        $mail = new phpmailer;
		$mail->isSMTP();  //Only enable when use in local server 

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';

		$mail->Username = 'adhikary.ayan96@gmail.com'; //company emailid
		$mail->Password = 'dpttiwnkvtjwjrjr';

		$mail->setFrom('adhikary.ayan96@gmail.com', 'CPC Education'); //company emailid and company name
		$mail->addAddress($toEmail);
		$mail->addReplyTo('adhikary.ayan96@gmail.com');

		$mail->isHTML(true);
		$mail->Subject = 'Your fees has been submitted';
		$mail->Body = '<h1>Thank you for connecting with us </h1>';

        // Attach a PDF file
        $mail->addAttachment($pdfFilePath);

		if(!$mail->send())
		{
			return 0;
		}
		else{
			return 1;
		}
    }
    


function studentRecord()
{
    $conn=dbConnect();

    $sql="select * from add_student";

    $res=mysqli_query($conn,$sql);

    return $res;
}

function studentRegister($data)
{
    $name=$_POST['stname'];
    $contact=$_POST['stcntct'];
    $address=$_POST['staddrs'];
    $course=$_POST['stcrse'];
    $fees=$_POST['stfees'];
    $amount=$_POST['stamnt'];
    $date1=$_POST['stdt'];
    $email=$_POST['stemail'];

    $conn=dbConnect();
    
    $sql="insert into add_student(name,contact,address,course,fees_structure,amount,date_admission,email) values('$name','$contact','$address','$course','$fees','$amount','$date1','$email')";

    $res=mysqli_query($conn,$sql);

    if($res == 1)
    {
        $id = mysqli_insert_id($conn);

        $register_no="cpc_".$course."_".$id;

        $sql="update add_student set register_no ='$register_no' where id='$id'";

        $res2=mysqli_query($conn,$sql);

        return $res2;

    }

}

function studentDetails($id)
{
    $conn=dbConnect();

    $sql="select * from add_student where id='$id'";

    $res=mysqli_query($conn,$sql);

    return $res;
}


function updateDetails($data)
{
    $id=$_POST['updateId'];
    $reg=$_POST['updateReg'];
    $name=$_POST['updateName'];
    $contact=$_POST['updateContact'];
    $address=$_POST['updateAddress'];
    $course=$_POST['updateCourse'];
    $feesType=$_POST['updateFees'];
    $amount=$_POST['updateAmount'];
    $date=$_POST['updateDate'];

    $conn=dbConnect();
    $sql="update add_student set register_no='$reg',name='$name',contact='$contact',address='$address',course='$course',Fees_structure='$feesType',amount='$amount',date_admission='$date' where id='$id'";

    $res=mysqli_query($conn,$sql);

    return $res;
}


function addFeesAmount($data)
{
    $date1=$_POST['addDate'];
    $amount=$_POST['addAmount'];
    $due=$_POST['addDue'];
    $register=$_POST['regNo'];
    $month=$_POST['month'];
    $toEmail=$_POST['regEmail'];

    $conn=dbConnect();

    $sql="insert into addfees(date1,amount,due_rs,register_no,month,student_email) values('$date1','$amount','$due','$register','$month','$toEmail')";

    $res=mysqli_query($conn,$sql);

    if($res == 1)
    {
        $filename = $register."_".$month.".pdf";
        $pdfFilePath="C:/Users/AYAN/Downloads/".$filename;
        sendNotify($toEmail, $pdfFilePath);
    }

    return $res;

}

function showFeesData($reg)
{
    $conn=dbConnect();
    $sql="select * from addfees where register_no='$reg'";

    $res=mysqli_query($conn,$sql);

    return $res;
}

function udateFeesData($data)
{
    $id=$_POST['updatesno']; 
    $date1=$_POST['editDate'];
    $amount=$_POST['editAmount'];
    $month=$_POST['editMonth'];
    $due=$_POST['editDue'];

    $conn=dbConnect();
    $sql="update addfees set date1='$date1',amount='$amount',due_rs='$due',month='$month' where sno='$id'";

    $res=mysqli_query($conn,$sql);

    return $res;
}


function forgetPassword($data)
{
    $conn=dbConnect();

    $checkEmail=$_POST['forgetEmail'];

    $sql="select * from login where email='$checkEmail'";

    $result=mysqli_query($conn,$sql);

    return $result;
}


function sendPassword($toEmail)
    {

        // to get password from database
        $conn=dbConnect();

        $sql="select * from login where email='$toEmail'";
        
        $result=mysqli_query($conn,$sql);

        while($data=mysqli_fetch_assoc($result))
        {
            $password=$data['password'];

        }
        //--------------------------------

        // for sending email
        $mail = new phpmailer;
		$mail->isSMTP();  //Only enable when use in local server 

		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'tls';

		$mail->Username = 'adhikary.ayan96@gmail.com'; //company emailid
		$mail->Password = 'dpttiwnkvtjwjrjr';

		$mail->setFrom('adhikary.ayan96@gmail.com', 'CPC Education'); //company emailid and company name
		$mail->addAddress($toEmail);
		$mail->addReplyTo('adhikary.ayan96@gmail.com');

		$mail->isHTML(true);
		$mail->Subject = 'You are member of CpC Education';
		$mail->Body = '<h1>Your password is '.$password.'</h1>';

		if(!$mail->send())
		{
			return 0;
		}
		else{
			return 1;
		}
        //---------------------
    }
    




?>