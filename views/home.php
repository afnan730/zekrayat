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

  <title>Zekrayat-Home</title>
  <style>
    #Container {
      margin: 5%;

    }

    .mix {
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
  </style>
</head>

<body>
  <?php
  include_once "navbar.php";

  ?>

  <div id="Container">
    <?php
    include_once '../controllers/home_controllere.php';
    if ($photos) {
      foreach ($photos as $item) {

        include 'homeImage.php';
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