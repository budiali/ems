<?php
require "conn.php";
session_start();
if (!$_SESSION['u_name']) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>EMS | Demo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <!-- nav -->
    <?php require "nav.php"; ?>
    <!-- nav -->

    <!-- main content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">Employes</div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="add_new_employee.php">Add New Employee</a>
                        </li>
                        <li class="list-group-item">
                            <a href="dash.php">View All Employee</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Employees List</div>
                    <table class="table table-bordered">
                        <tr>
                            <th>Name</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>

                        <?php

                        $sql = "SELECT * FROM employee";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($employee = mysqli_fetch_assoc($result)) { ?>

                                <tr>
                                    <td><?php echo $employee['u_name']; ?></td>
                                    <td><a href="single_employee.php?u_id=<?php echo $employee['u_id']; ?>" class="btn btn-sm btn-block btn-primary">Details</a></td>
                                    <td><a href="single_employee_edit.php?u_id=<?php echo $employee['u_id']; ?>" class="btn btn-sm btn-block btn-warning">Edit</a></td>
                                    <td><a href="delete_employee.php?u_id=<?php echo $employee['u_id']; ?>" class="btn btn-sm btn-block btn-danger">Delete</a></td>
                                </tr>

                        <?php   }
                        } else {
                            echo "0 Result";
                        }

                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- main content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>