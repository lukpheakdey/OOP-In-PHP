<?php

include "action.php";

?>
<!DOCTYPE html>
<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
    <title>Your Website</title>
    <link rel="stylesheet" href="" type="text/css" />
    <script type="text/javascript"></script>
</head>

<body>

    <div class="container">
        <div class="jumbotron">
            <h2> OOP In PHP </h2>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="panel panel-primary">
            <div class="panel-heading">Enter Medicine Deatails</div>
            <div class="panel-body">
                <?php
                    if(isset($_GET["update"])){
                    //php 7
                    $id = $_GET["id"] ?? null;
                    $where = array("id"=>$id,);
                    $row = $obj->select_record("medicines",$where);
                ?>
                <form method="post" action="action.php">
                    <table class="table table-hover">
                        <tr>
                            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                        </tr>
                        <tr>
                            <td>Medicine Name</td>
                            <td><input type="text" class="form-control" value="<?php echo $row["m_name"]; ?>" name="name" placeholder="Enter Medicine name"></td>
                        </tr>
                            <tr>
                            <td>Quantity</td>
                            <td><input type="text" class="form-control" name="qty" value="<?php echo $row["qty"]; ?>" placeholder="Enter Quantity"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="edit" value="Update"></td>
                        </tr>
                    </table>
                </form>

                <?php
                }   else{
                ?>
                <form method="post" action="action.php">
                    <table class="table table-hover">
                        <tr>
                        <td>Medicine Name</td>
                            <td><input type="text" class="form-control" name="name" placeholder="Enter Medicine name"></td>
                        </tr>
                        <tr>
                            <td>Quantity</td>
                            <td><input type="text" class="form-control" name="qty" placeholder="Enter Quantity"></td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center"><input type="submit" class="btn btn-primary" name="submit" value="Store"></td>
                        </tr>
                    </table>
                </form>

                <?php
                }
                ?>


            </div>
        </div>
        </div>
        <div class="col-md-3"></div>
    </div>
    </div>

    <div class="container">
        <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
        <table class="table table-bordered">
        <tr>
            <th>#</th>
            <th>Medicine Name</th>
            <th>Available Stock</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
        <?php
            $myrow = $obj->fetch_record("medicines");
            foreach ($myrow as $row) {
            //breaking point
        ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["m_name"]; ?></td>
            <td><b><?php echo $row["qty"]; ?></b></td>
            <td><a href="index.php?update=1&id=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a></td>
            <td><a href="action.php?delete=1&id=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a></td>
        </tr>
    <?php
    }
    ?>