<?php

if(isset($_POST['logsubmit']))
{
    if(isset($_POST['checkemail']))
    {
  
        
        $cookie_name="userCPC";
        $cookie_value=$_POST['logemail'];
        setcookie($cookie_name,$cookie_value,time()+86400);

        $cookie_name2="userPWD";
        $cookie_value2=$_POST['logpassword'];
        setcookie($cookie_name2,$cookie_value2,time()+86400);

    }
}
$userEmail ="";
$userpassword="";
if(isset($_COOKIE['userCPC']))
{
    $userEmail=$_COOKIE['userCPC'];
    $userpassword=$_COOKIE['userPWD'];

}

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylee.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        #ques
        {
            min-height:644px;
        }

       
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php
                  include('_navbar.php');
                ?>
            </div>
        </div>
        
            <div class="row">
                
                    <?php
                        include('allMethods.php');
                        
                        $error=0;
                        
                        if(isset($_POST['logsubmit']))
                        {
                           
                            $res=loginCheck($_POST);

                        

                            if(mysqli_num_rows($res) > 0)
                            {
                            // echo "login successfull";
                                
                                session_start();

                                $res=loginDetails();
                                $data=mysqli_fetch_assoc($res);
                                
                                
                                $_SESSION['useremail']=$data['email'];
                                $_SESSION['password']=$data['password'];
                            
                                header('location:studentRecords.php');
                            }
                            else
                            {
                                $error=1;
                            }
                        }

                        if($error)
                        {
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <strong>incorrect password or email id!!...</strong> please check it once.
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                        }
                    
                    ?>
                
            </div>
                   
            <br><br><br><br><br><br><br><br>
        <div  id="ques">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6 login_style" >
                    <h3>Login Here</h3><br><br>
                    <form action="" method="post">
                        <input type="email" placeholder="enter email" name="logemail" class="text_style" value="<?php echo $userEmail;?>"><br><br>
                        <input type="password" placeholder="enter password" name="logpassword" class="text_style" value="<?php echo $userpassword; ?>"><br><br>
                        <input type="checkbox" name="checkemail">Remember Me<br><br>
                        <input type="submit" value="Login" name="logsubmit" class="btn btn-success">&nbsp&nbsp<a href="forgetPassword.php" class="btn btn-danger">Forget Password </a>
                    </form>
                    
                </div>
                
                <div class="col-md-3"></div>
            </div>
        </div>
                        
            <div class="row">

                <div class="col-md-12">
                    <?php
                        include('footer.php');
                    ?>
                </div>
            </div>
    </div>

    


</body>
</html>