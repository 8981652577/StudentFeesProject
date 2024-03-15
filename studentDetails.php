
<?php

include('allMethods.php');

$id=$_GET['id'];

$res=studentDetails($id);

$data=mysqli_fetch_assoc($res);
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

    <link rel="stylesheet" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.debug.js"></script>
    <style>
        .loader-div {
			display: none;
			position: fixed;
			margin: 0px;
			padding: 0px;
			right: 0px;
			top: 0px;
			width: 100%;
			height: 100%;
			background-color: #fff;
			z-index: 30001;
			opacity: 0.8;
		}
		.loader-img {
			position: absolute;
			top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			margin: auto;
		}
    </style>
</head>
<body>

<!--Edit Modal Start-->


<!-- Button trigger modal 
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>-->

 

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <input type="hidden" name="updatesno" id="updatesno" value="">
            <span>Date:-</span><input type="date" placeholder="enter Date" id="editDate" name="editDate" value=""><br><br>
            <span>Amount:-</span><input type="number" placeholder="Enter amount" id="editAmount" name="editAmount" value=""><br><br>
            <span>Paid Month:-</span>
            <select id="editMonth" name="editMonth" value="">
                <option disabled>Select Month</option>
                <option>January</option>
                <option>February</option>
                <option>March</option>
                <option>April</option>
                <option>May</option>
                <option>Jun</option>
                <option>July</option>
                <option>August</option>
                <option>September</option>
                <option>October</option>
                <option>November</option>
                <option>December</option>
            </select><br><br>
            <span>Due Price:-</span><input type="number" placeholder="enter due price" id="editDue" name="editDue" value=""><br><br>
            <input type="submit" value="Update" name="updateData" class="btn btn-danger">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!--Edit Modal End-->

    <div class="container-fluid">
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
        <?php
           
            if(isset($_POST['addfees']))
            {
                $res=addFeesAmount($_POST);

                if($res==1)
                {
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> Update successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
                else
                {
                    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    <strong>Something error!!...</strong> please check it once.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }

            if(isset($_POST['updateData']))
            {
                $res=udateFeesData($_POST);
                
                if($res==1)
                {
                    
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> Update successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
                else
                {
                    
                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success!</strong> Update successfully.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>";
                }
            }
        
        ?>
        <br><br><br>

        <!-- student details start-->

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6 login_style">
                <h3>Student Details</h3><br><br>
                <form>
                    <table class="table">
                       <tr>
                            <td> <b>Student Name:-</b> </td><td><input type="text" placeholder="enter name" value="<?php echo $data['name']?>" name="" style="border-radius:5px"></td>
                       </tr> 
                       <tr>
                            <td><b>Student Email:-</b></td><td><input type="email" placeholder="enter email" value="<?php echo $data['email']?>" name=""  style="border-radius:5px"></td>
                       </tr>
                         <tr>
                             <td> <b>Registation No:-</b></td><td><input type="text" placeholder="registeration No" value="<?php echo $data['register_no']?>" name="" style="border-radius:5px"></td>
                        </tr> 
                        <tr>
                            <td><b>Phone No:-</b></td><td><input type="number" placeholder="enter phone number" value="<?php echo $data['contact']?>" name="" style="border-radius:5px"></td>
                        </tr> 
                        <tr>
                            <td><b>Address:-</b></td><td><input type="text" placeholder="enter address" value="<?php echo $data['address']?>" name="" style="border-radius:5px"></td>
                        </tr>
                        <tr>
                            <td><b>Course Name:-</b></td><td><input type="text" placeholder="enter course" value="<?php echo $data['course']?>" name="" style="border-radius:5px"></td>
                        </tr>
                        <tr>
                            <td><b>Fees Structure:-</b></td><td><input type="text" placeholder="enter fees structure" name="" value="<?php echo $data['Fees_structure']?>" style="border-radius:5px"></td>
                        </tr>
                        <tr>
                            <td><b>Amount:-</b></td><td><input type="number" placeholder="amount" name="" value="<?php echo $data['amount']?>" style="border-radius:5px"></td>
                        </tr>
                        <tr>
                            <td><b>Date of Join:-</b></td><td><input type="date" placeholder="admission date" value="<?php echo $data['date_admission']?>" style="border-radius:5px"></td>
                        </tr>
                    </table>
                  
                    
                </form>

            </div>
            
          <!-- student details end-->   

<!-- Add Fees start-->

            <div class="col-md-1"></div>     
            <div class="col-md-3 login_style">
                    <h3>Add Fees</h3><br>
                    <form action="" method="post" onsubmit="return generate()">
                        <input type="hidden" name="regNo" value="<?php  echo $data['register_no'] ?>">
                        <input type="hidden" name="regEmail" value="<?php echo $data['email']?>">
                        <span><b>Enter Date:-</b></span><input type="date" required="required" placeholder="enter date" name="addDate" id="adddate"><br><br>
                        <span><b>Amount:-</b></span><input type="number" required="required" placeholder="enter amount" name="addAmount" id="addAmount"><br><br>
                        <span><b>Due Amount:-</b></span><input type="number"  placeholder="due amount" name="addDue" id="addDue"><br><br>
                        <span><b>Paid Month:-</b></span>
                     
                        <select name="month" id="selectMonth">
                            <option selected disabled>Select Month</option>
                            <option>January</option>
                            <option>February</option>
                            <option >March</option>
                            <option>April</option>
                            <option >May</option>
                            <option >Jun</option>
                            <option>July</option>
                            <option>August</option>
                            <option>September</option>
                            <option >October</option>
                            <option >November</option>
                            <option >December</option>
                        </select> <br><br>
                        <input type="submit" class="btn btn-danger" name="addfees">
                    </form>
            </div>
        </div>
        
 <!-- Add Fees End-->

        <br><br>

        <!-- data table start -->

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 dataTableStyle">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Amount</th>
                            <th>Paid Month</th>
                            <th>Due Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php

                        $result=showFeesData($data['register_no']);
                        while($feesData=mysqli_fetch_assoc($result))
                        {
                            echo "<tr>
                                    <td>".$feesData['date1']."</td>
                                    <td>".$feesData['amount']."</td>
                                    <td>".$feesData['month']."</td>
                                    <td>".$feesData['due_rs']."</td>
                                    <td><button class='btn btn-warning' onclick='editFees(".$feesData['sno'].")'>Edit</button>&nbsp&nbsp<button class='btn btn-danger' onclick='deleteFees(".$feesData['sno'].")'>Delete</button></td>
                            </tr>";
                        }
                    
                    ?>
                   
                </table>


                <script
                    src="https://code.jquery.com/jquery-3.7.1.min.js"
                    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
                    crossorigin="anonymous">
                </script>

                <script src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
            
                <script>
                        
                        $(document).ready( function () 
                        {
                            $('#myTable').DataTable();
                        } );
                </script>

        <!-- data table end -->
            
            </div>
            <div class="col-md-3"></div>
        </div>
        <br><br>
       
            <?php
                include('footer.php');
            ?>
    </div>

    <div class="loader-div" id="loader">
    <img class="loader-img" src="https://media2.giphy.com/media/NgEAblIYpqSlwpj15O/giphy.gif?cid=6c09b952l4pkkq2rxruq201272x08w598ey6ulw55t4vw4z3&ep=v1_stickers_related&rid=giphy.gif&ct=s" style="height: 120px;width: auto;" />
</div>

    <script>
        
        function deleteFees(sno)
        {
            if(confirm("are you sure you want to delete ?"))
            {
                
                $.ajax({

                    url:'deleteFeesDetails.php',
                    method:'post',
                    data:{'id':sno},
                    success:function(response)
                    {
                        alert(response);
                        window.location.href="";
                    }
                })
            }
        }

        function editFees(sno)
        {
            
            $.ajax({
                url:"getFeesData.php",
                method:"POST",
                data:{'id':sno},
                success:function(response)
                {
                    //alert(response);

                    var data=JSON.parse(response);
                    document.getElementById('updatesno').value=data['sno'];
                    document.getElementById('editDate').value=data['date'];
                    document.getElementById('editAmount').value=data['amount'];
                    document.getElementById('editDue').value=data['due'];
                    document.getElementById('editMonth').value=data['month'];
                    $('#exampleModal').modal('toggle');
                }
            })
        }

    
    </script>

    <script>
        
        document.getElementById('adddate').value = new Date().toISOString().split('T')[0];  // given today's date

        function generate()
        {
            document.getElementById('loader').style.display = "block";
            var flag=false;
            var date1 = document.getElementById('adddate').value;
            var amount=document.getElementById('addAmount').value;
            var due_price=document.getElementById('addDue').value;
            var sdate =document.getElementById('selectMonth').value;

            //alert("Selected Date: "+sdate);

            if(document.getElementById('selectMonth').value=="Select Month")
            {
                flag = false;
                document.getElementById('loader').style.display = "none";
                alert("please mention the month");
            }
            else 
            {
                document.getElementById('loader').style.display = "none";
                flag = true;
                
            }
            if(flag==true)
            {
                var paid_month=document.getElementById('selectMonth').value;

                var doc = new jsPDF('landscape','mm', 'a4')
                    // doc.addImage(certi, 'JPEG', 0, 0, 297, 210)
                        doc.setFont('times')

                    /* Student Fees */
                        
                        doc.setFontSize(25);
                        doc.text(153, 80, date1);
                        
                        doc.setFontSize(22);
                        doc.text(33, 92, amount);
                        
                        doc.setFontSize(22);
                        doc.text(180, 102, paid_month);

                        doc.setFontSize(22);
                        doc.text(90, 112, due_price);
                        
            
                            
                        doc.save( 'D:\\ayan\\Xampp\\htdocs\\PHPJob\\student Fees Project\\invoice\\<?php echo $data['register_no']?>_'+paid_month+'.pdf');
                
                return true;
            }
            else
            {
                return false;
            }

            
           
		
		

            
        }
    </script>
</body>
</html>