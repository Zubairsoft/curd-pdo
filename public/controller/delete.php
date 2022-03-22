<?php
require_once("../controller/db.php");
// Update category
if (isset($_GET['DelID'])) {
    $db = new DB();
    $db->delete("gatagorey",$_GET['DelID']);
    header("location:../views/index.php");
} else {
    header("location:../views/index.php");// if not requst redirct to index.php
}