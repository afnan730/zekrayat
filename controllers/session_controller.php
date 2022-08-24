<?php
session_start();
require_once '../models/login.php';

$login = new Login();

$userdata = $login->check_login($_SESSION['zekraiayat_userid']);
