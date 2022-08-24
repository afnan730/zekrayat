<?php
session_start();
unset($_SESSION['zekraiayat_userid']);
unset($_SESSION['username']);


header("Location:../public/index.php");
