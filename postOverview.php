<?php
require './controller/PostController.php';
$PostController = new PostController();

if(isset($_GET["delete"]))
{ 
    $PostController->DeletePost($_GET["delete"]);
}

$title="";
$content=$PostController->CreatePostOverviewTable();




include 'master.php';
?>
