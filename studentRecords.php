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

     
</head>
<body>

<!--Edit Modal Start-->
    <!-- Button trigger modal -->
<!--<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal">
  Edit modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
            <input type="hidden" id="editSno" name="updateId" value="">
            <span>Register No:-</span><input type="text" placeholder="enter Register No" name="updateReg" id="editReg" value=""><br><br>
            <span>Name:-</span><input type="text" placeholder="enter name" name="updateName" id="editName" value=""><br><br>
            <span>Email</span><input type="email" placeholder="enter email" name="updateEmail" id="editEmail" value=""><br><br>
            <span>Contact:-</span><input type="text" placeholder="enter contact no" name="updateContact" id="editContact" value=""><br><br>
            <span>Address:-</span><input type="text" placeholder="enter address" name="updateAddress" id="editAddress" value=""><br><br>
            <span>Course:-</span><input type="text" placeholder="Couse name" name="updateCourse" id="editCourse" value=""><br><br>
            <span>Fees Type:-</span><input type="text" placeholder="enter Fees Type" name="updateFees" id="editFees" value=""><br><br>
            <span>Amount:-</span><input type="number" placeholder="enter amount" name="updateAmount" id="editAmount" value=""><br><br>
            <span>Admission Date:-</span><input type="date" placeholder="Enter admission Date" name="updateDate" id="editDate" value=""><br><br>
            <input type="submit" value="Update" name="updateData" class="btn btn-danger">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>

<!--Edit Modal End-->
</div>
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
                 include('allMethods.php');
                if(isset($_POST['updateData']))
                {
                    $res=updateDetails($_POST);
                    if($res==1)
                    {
                        //echo "update successfully";

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
            
            ?>
        </div>
    
        <div class="row">
            <div class="col-md-2"></div>
                <div class="col-md-8 dataTableStyle" style="margin-top:5%">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Reg.NO</th>
                                <th>Name</th>
                                <th>Contact</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                    <?php

                     

                        $res=studentRecord();

                        $numb=mysqli_num_rows($res);
                        
                        $sno=0;

                        while($data=mysqli_fetch_assoc($res))
                        {
                            $sno+=1;
                            echo "<tr>
                                        <td>".$sno."</td>
                                        <td>".$data['register_no']."</td>
                                        <td>".$data['name']."</td>
                                        <td>".$data['contact']."</td>
                                        <td><a href='studentDetails.php?id=".$data['id']."' class='btn btn-success'>View</a>&nbsp&nbsp <!--<button class='btn btn-warning edit_btn'>Edit</button>--><button class='btn btn-warning' onclick='editData(".$data['id'].")'>Edit</button>&nbsp&nbsp<button class='btn btn-danger' onclick='deleteData(".$data['id'].")'>Delete</button></td>

                                </tr>";
                        }
                    
                    ?>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>

        <br><br><br><br><br><br><br><br><br><br>
        <div class="row">

                <div class="col-md-12">
                    <?php
                        include('footer.php');
                    ?>
                </div>
            </div>
        
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


        function deleteData(id)
        {
            if(confirm("are you sure you want to delete this product?"))
            {
                $.ajax({
                    url:"deleteData.php",
                    method:"GET",
                    data:{"id":id},
                    success:function(response)
                    {
                        alert(response);
                        window.location.href="";
                    }
                })

            }
        }

        function editData(id)
        {
            
           $.ajax({
                url:"GetDataById.php",
                method:"POST",
                data:{'id':id},
                success:function(response)
                {
                   //alert(response);
                    
                    var data = JSON.parse(response);
                    document.getElementById('editReg').value=data['register'];
                    document.getElementById('editName').value=data['name'];
                    document.getElementById('editContact').value=data['contact'];
                    document.getElementById('editAddress').value=data['address'];
                    document.getElementById('editCourse').value=data['course'];
                    document.getElementById('editFees').value=data['fees'];
                    document.getElementById('editAmount').value=data['amount'];
                    document.getElementById('editDate').value=data['date'];
                    document.getElementById('editSno').value=data['id'];
                    document.getElementById('editEmail').value=data['email'];
                    $('#editModal').modal('toggle');
                    
                }
            })
        }
    </script>

    <script>
        /*edits=document.getElementsByClassName('edit_btn');
        Array.from(edits).forEach((element)=>{
            element.addEventListener("click", (e)=>{
                console.log("edit",);
                tr=e.target.parentNode.parentNode;
                sno=tr.getElementsByTagName("td")[0].innerText;
                register=tr.getElementsByTagName("td")[1].innerText;
                name1=tr.getElementsByTagName("td")[2].innerText;
                contact=tr.getElementsByTagName("td")[3].innerText;
                address=tr.getElementsByTagName("td")[4].innerText;
                course=tr.getElementsByTagName("td")[5].innerText;
                fees=tr.getElementsByTagName("td")[6].innerText;
                amount=tr.getElementsByTagName("td")[7].innerText;
                date=tr.getElementsByTagName("td")[8].innerText;
                console.log(sno,register,name1,contact,address,course,fees,amount,date,);

                editReg.value=register;
                editName.value=name1;
                editContact.value=contact;
                editAddress.value=address;
                editCourse.value=course;
                editFees.value=fees;
                editAmount.value=amount;
                editDate.value=date;
                editSno.value=sno;

                $('#editModal').modal('toggle');

            })
        })*/


    </script>
        
    </div>


</body>
</html>