<?php 
session_start();
require_once('utils/userModel.php');
require_once('utils/common.php');
if(!isset($_SESSION['isAuthenticated'])){
    Common::redirect('/login.php');
}

User::logout();
Common::redirect('/login.php');
?>