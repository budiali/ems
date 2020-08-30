<?php
require "conn.php";
session_start();
if (!$_SESSION['u_name']) {
    header("Location: index.php");
}
?>

<?php

$id = $_GET['u_id'];
$sql = "SELECT * FROM employee WHERE u_id='$id'";
$result = mysqli_query($conn, $sql);

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
                    <div class="panel-heading">Edit Employee</div>
                    <div class="panel-body">
                        <?php if (mysqli_num_rows($result) > 0) {
                            while ($employee = mysqli_fetch_assoc($result)) { ?>
                                <form action="" method="post">
                                    <div class="form-group">
                                        <label for="name">Name :</label>
                                        <input type="text" class="form-control input-sm" name="u_name" placeholder="Employee Name" value="<?= $employee['u_name']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email :</label>
                                        <input type="email" class="form-control input-sm" name="u_email" placeholder="Email" value="<?= $employee['u_email']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone Number :</label>
                                        <input type="text" class="form-control input-sm" name="u_phone" placeholder="Phone Number" value="<?= $employee['u_phone']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-sm btn-primary" name="u_submit" value="Update">
                                    </div>
                                </form>
                        <?php    }
                        } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main content -->


    <?php

    if (isset($_POST['u_submit'])) {
        $u_name = $_POST['u_name'];
        $u_email = $_POST['u_email'];
        $u_phone = $_POST['u_phone'];

        $sql = "UPDATE employee
        SET u_name='$u_name', u_email='$u_email', u_phone='$u_phone'
        WHERE u_id='$id'";

        if (mysqli_query($conn, $sql)) {
            header("Location:dash.php");
        } else {
            echo "Error : " . $sql . "</br>" . mysqli_error($conn);
        }
    }
    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>