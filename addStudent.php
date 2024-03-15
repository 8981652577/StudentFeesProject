<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="stylee.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php

                    session_start();

                    if(isset($_SESSION['useremail']))
                    {
                        include('index_naav.php');
                    }
                    else
                    {
                        header("location:login.php");
                    }

                ?>
            </div>
        </div>
        <div class="row">
            <?php
            
                $insert=0;
                $error=0;

                include('allMethods.php');

                if(isset($_POST['register']))
                {
                    $res=studentRegister($_POST);
        
                    if($res==1)
                    {
        
                        $insert=1;
                    }
                    else 
                    {
                       $error=1;
                    }
                }
                
                if($insert)
                {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> the Student data has been inserted successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                   
                }
                if($error)
                {
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Something error!!...</strong> please check it once.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
                }
              ?>
           
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 login_style">
                <h3>Student Registration</h3><br><br>
                <form action="" method="post">
                    <input type="text" placeholder="enter student name" name="stname" class="text_style"><br><br>
                    <input type="email" placeholder="enter Student email" name="stemail" class="text_style"><br><br>
                    <input type="contact" placeholder="enter phone number" name="stcntct" class="text_style"><br><br>
                    <input type="text" placeholder="enter address" name="staddrs" class="text_style"><br><br>
                    <input type="text" placeholder="enter course name" name="stcrse" class="text_style"><br><br>
                    <span><b>Fees Structure</b></span>
                    <select name="stfees">
                            <option disabled="disabled">Select One</option>
                            <option>Monthly</option>
                            <option>Fixed</option>
                    </select><br><br>
                    <span><b>Amount</b></span>
                    <input type="number" name="stamnt" placeholder="enter amount" class="text_style"><br><br>
                    <span><b>Date of Admission</b></span>
                    <input type="date" name="stdt" placeholder="enter date of joining"><br><br>
                    
                    <input type="submit" value="Register" name="register" class="btn btn-success">
                </form>
            </div>
            <div class="col-md-3"></div>
            
        </div>
        <br><br><br>
        <div class="row">
            <div class="col-md-12">
                <?php
                    require('footer.php');
                ?>
            </div>
        </div>
    </div>


</body>
</html>