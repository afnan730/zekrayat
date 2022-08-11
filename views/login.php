<?php
session_start();
include_once '../controllers/login_controller.php';


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Zekrayat-Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="../public/style.css" rel="stylesheet">

  <style></style>
</head>

<body class="bc-img">

  <div class="navbar log">
    <div class="logo">
      <img src="../public/images/logo.png" width="300px">
    </div>
    <a href="signup.php" class="btn btn-outline-dark home-login" type="submit">SIGN UP</a>

  </div>


  <div class="center">
    <?php

    if (!empty($result)) {
      echo  '<div class="alert alert-danger" style="text-align:center;"  role="alert">';
      echo "$result";
      echo "</div>";
    }


    ?>

    <h3>LOGIN</h3>
    <p>Welcome Back</p>
    <form method="POST">
      <input type="text" class="form-control mb-3 input-box-size" name="email" placeholder="Email" value="<?php echo $email ?>">
      <input type="password" class="form-control mb-3 input-box-size" name="password" placeholder="Password" value="<?php echo $password ?>">
      <input type="submit" class="btn btn-primary input-box-size" style="height: 45px;    background-color: #324e65;
        border-color: #324e65;
        color: white;
        font-size: 16px;" value="Log in">
    </form>

    <?php if (isset($_COOKIE['LastLogin'])) { ?>

      <h5 style="color:black;margin-top:18px">Last login from this device was on <?php echo $_COOKIE['LastLogin'] ?></h5>

    <?php } ?>
  </div>







  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>