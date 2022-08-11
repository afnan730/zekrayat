<?php

include_once '../controllers/session_controller.php';


?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <title>view image</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/home.css" rel="stylesheet">
</head>
<style>
  #Container {
    margin: 3% 23%;
  }

  #Container .mix {


    border: none;

  }



  .card img {
    width: 450px;
    height: 300px;
  }

  .form-control {
    display: inline-block;
    width: 70%;
    margin-right: 10px;
  }
</style>

<body>
  <?php
  include_once "navbar.php";


  include_once "../controllers/viewImgController.php";

  ?>
  <div id="Container">

    <div class="card mix">
      <h2 class="card-title" style="text-transform: capitalize;"><?php echo $imgAlbum ?></h2>

      <div>This photo was taken by <span style="text-transform: capitalize;"><?php echo  $name ?></span></div>

      <img class="card-img-top" src="<?php echo $imgpath ?>" alt="Card image" style="width:80%;height:40%;margin:2%">
      <div class="card-body">
        <form class="form-inline" method="POST" style="margin:5%;">
          <div class="form-group">
            <input type="text" class="form-control" name="commentText">
            <button type="submit" style="background-color:#2A4255;border:none;padding:7px 18px" class="btn btn-primary ">comment</button>
          </div>
        </form>

        <?php

        if ($comments) {
          foreach ($comments as $item) {


            include 'commentItem.php';
          }
        }


        ?>


      </div>


</body>

</html>