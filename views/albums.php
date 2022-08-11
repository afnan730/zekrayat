<?php
include_once '../controllers/session_controller.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/home.css" rel="stylesheet">

  <title>My albums</title>
  <style>
    #Container {
      margin: 5%;

    }

    #Container .mix {
      display: none;
      width: 250px;
      margin: 5px;


    }

    .card {
      border: none;
    }

    .card img {
      width: 250px;
      height: 185px;
    }

    .b_style {
      background-color: #324e65;
      border-color: #324e65;
    }
  </style>
</head>


<body>


  <?php
  include_once "navbar.php";

  ?>



  <div style=" margin:2% 8% 0%">
    <button class="filter btn btn-primary b_style" data-filter="all">All</button>
    <button class="filter btn btn-primary b_style" data-filter=".yemen">Yemen</button>
    <button class="filter btn btn-primary b_style" data-filter=".turkey">Turkey</button>
    <button class="filter btn btn-primary b_style" data-filter=".sudan">Sudan</button>
    <button class="filter btn btn-primary b_style" data-filter=".other">Other</button>

    <a href="addimage.php"><button class="btn btn-primary b_style" style="margin-left:64%;">Add New Image</button></a>
  </div>

  <div id="Container">

    <?php
    include_once '../controllers/albums-controller.php';
    if ($photos) {
      foreach ($photos as $item) {
        include 'albumImage.php';
      }
    }


    ?>


  </div>

  <script src="js/min.js"></script>
  <script src="js/min1.js"></script>
  <script src="js/jquery.mixitup.js"></script>
  <script src="js/script.js"></script>
  <script src="js/scripthome.js"></script>
</body>

</html>