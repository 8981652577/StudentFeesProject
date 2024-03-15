


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
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
            
        <?php

    include("allMethods.php");
    if(isset($_POST['forget']))
    {
        $checkEmail=forgetPassword($_POST);
        if(mysqli_num_rows($checkEmail)>0)
        {
            $res=sendPassword($_POST['forgetEmail']);
            /*echo "
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                <strong>Sended!!...</strong> please check your Email-ID.
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            
            
            ";*/

            header('location:login.php');
        }
        else
        {
            echo "
                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>incorrect email id!!...</strong> please check it once.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            ";
        }
    }


?>
<br><br><br><br><br><br><br><br>
        <div id="ques">
            <div class="row" >
                <div class="col-md-3"></div>
                <div class="col-md-6 login_style">
                    <h3>Forget Password</h3><br><br>
                    <form action="" method="post">
                        <h6>Enter your register Email</h6>
                        <input type="email" placeholder="enter email" name="forgetEmail" class="text_style"><br><br>
                        <input type="submit" value="Submit" name="forget" class="btn btn-success">
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