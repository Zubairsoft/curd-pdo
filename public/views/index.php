<?php
require("../controller/db.php");
$db = new DB();
$rows = $db->selectAll("gatagorey");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" a href="css/bootstrap.css">
    <title> category</title>
</head>

<body class="bg-light">
    <?php
    require("../views/nav.php");
    ?>
    <div class="container">
        <div class="row">
            <h1 class="bg-dark text-light text-center py-2 mt-3">Category</h1>
            <div class="row mt-2">
                <div class="col-3">
                    <a href="add.php" class="btn btn-outline-dark p-2 fs-4 w-100">Add New Category</a>
                </div>
            </div>
            <div class="card-group my-3 justify-content-center">
                <!-- <div class="row row-cols-1 row-cols-md-3 g-4 text-center"> -->
                    <?php
                    foreach ($rows as $row) {
                        $cateID = $row->id; // this coulmn name from database
                        $cateName = $row->name;
                        $cateDes = $row->des;
                    ?>
                        <div class="col-3 m-3">
                            <div class="card w-100">
                                <div class="card-body fs-4">
                                    <h5 class="card-title bg-dark text-light p-3 text-center fs-3"><?php echo $cateName ?></h5>
                                    <p class="card-text text-center"><?php echo $cateDes ?></p>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="row justify-content-around my-3">
                                        <a href="../views/edite.php?GetID=<?php echo $cateID ?>" class="btn btn-outline-dark col-5">Edit</a>
                                        <a href="../controller/delete.php?DelID=<?php echo $cateID ?>" class="btn btn-dark col-5">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                <!-- </div> -->
            </div>
        </div>
    </div>
</body>

</html>