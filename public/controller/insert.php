<?php
require_once("../controller/db.php");
// This  insert for products 

if (isset($_POST)) {
    $db = new DB();
    $db->insert("gatagorey",$_POST);
    header("location:../views/index.php"); // if not requst redirct to index.php
} else {
    header("location:../views/index.php"); // if not requst redirct to index.php
}
