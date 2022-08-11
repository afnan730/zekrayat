<?php
include_once '../controllers/session_controller.php';
include_once '../controllers/addimage_controller.php';



?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Add image</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/style.css" rel="stylesheet">
    <link href="../public/home.css" rel="stylesheet">
</head>

<body class="bc-img">
    <?php
    include_once "navbar.php";

    ?>
    <?php

    if (!empty($result)) {
        echo  '<div class="alert alert-danger" style="text-align:center;"  role="alert">';
        echo $result;
        echo "</div>";
    }

    ?>




    <div class="shadow" style=" width: 380px;
                                height: 200px;
                                background-color: #f0f6f685;
                                padding: 20px;
                                margin: 8% auto 0;
                                text-align: center;
                                position: relative;
                                height: 350px;
                                box-sizing: border-box;
                                flex-direction: column;">
        <div class="page">
            <div>
                <h2 style="color:#324e65;">Add Image</h2>

            </div>

            <div class="content">
                <form enctype="multipart/form-data" method="POST">
                    <br><br>
                    <input name="image" style="  margin-bottom:20px; ;" type="file" id="image-input" accept="image/jpeg, image/png, image/jpg">



                    <br>
                    <select class="form-control" name="album">
                        <option>yemen</option>
                        <option>turkey</option>
                        <option>sudan</option>
                        <option>other</option>
                    </select>

                    <br> <br>
                    <input type="submit" class="btn btn-primary input-box-size" style="height: 45px;    
                            background-color: #324e65;
                            border-color: #324e65;
                            color: white;
                            font-size: 16px;" value="Upload image">


                </form>

            </div>
        </div>
    </div>

</body>

</html>