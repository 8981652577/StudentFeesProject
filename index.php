
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


    <script>

        var i=0;
        var img_path=new Array();

        img_path[0]="images/slide1.png";
        img_path[1]="images/slider2.png";
        img_path[2]="images/slider3.png";


        function images_gallery()
        {
            document.img_show.src=img_path[i];

            if(i<img_path.length-1)
            {
                i++;
            }
            else
            {
                i=0;
            }

           setTimeout('images_gallery()',3000);
        }

        window.onload=images_gallery;

    </script>

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
                        include('_navbar.php');
                    }
                ?>
            </div>
        </div>
    
        <div class="row" style="background-color:bisque;">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <img src="" name="img_show" width="100%" style="margin-bottom:10px; margin-top:10px;">
            </div>
            <div class="col-md-2"></div>
            
        </div>
        
        
        <!--<div class="row">-->
            <div class="col-md-12">
                <?php
                    require('footer.php');
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>