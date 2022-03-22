<?php
require_once("../controller/db.php");
$cateID = $_GET['GetID'];
$db = new DB();
$category = $db->selectById("gatagorey",$cateID);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="css/bootstrap.css" />
    <title>Document</title>
</head>

<body class="bg-light">
    <?php
    require("../views/nav.php");
    ?>
    <!-- this form for update category -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card mt-5 shadow">
                    <div class="card-title">
                        <h3 class="bg-dark text-white text-center py-3"> Update </h3>
                    </div>
                    <div class="card-body">
                        <form action="../controller/update.php?ID=<?php echo $cateID ?>" method="post">
                            <input type="text" class="form-control mb-2" placeholder=" gatagory name " name="name" value="<?php echo $category->name; ?>">
                            <input type="text" class="form-control mb-2" placeholder=" description "   name="des" value="<?php echo $category->des; ?>">
                            <button class="btn btn-dark w-100">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>