<?php
require_once("../controller/db.php");
// Update category
if (isset($_POST)) {
    $db = new DB();
    $db->update("gatagorey",$_POST,$_GET['ID']);
    header("location:../views/index.php");
} else {
    header("location:../views/index.php"); // if not requst redirct to index.php
}