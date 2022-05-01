<?php 
session_start();
require_once('../../utils/common.php');
require_once('../../utils/postModel.php');

if($_SESSION['isAuthenticated'] === false or !isset($_SESSION['isAuthenticated'])){
    Common::redirect('../../login.php');
}

if (isset($_GET['id'])) {
    Post::delete($_GET['id']);
    Common::redirect('./index.php');
}

?>