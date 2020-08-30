<?php require "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>EMS | Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-lg-push-4 col-md-push-4">
                <div class="panel panel-default" style="margin-top: 50px;">
                    <div class="panel-heading">
                        <h4>EMS Register</h4>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="u_email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" name="u_name" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="u_pass" id="exampleInputPassword1">
                            </div>
                            <button type="submit" class="btn btn-sm btn-success" name="u_reg">Register!</button>
                            <a href="index.php" class="btn btn-sm btn-primary">Login Here!</a>
                            <small class="text-muted"><em> Develop by : Budi Ali </em></small>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['u_reg'])) {
        $u_email = $_POST['u_email'];
        $u_name = $_POST['u_name'];
        $u_pass = md5($_POST['u_pass']);

        $sql = "INSERT INTO users (u_email, u_name, u_pass) VALUES ('$u_email','$u_name','$u_pass')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Registered Successfully!')</script>";
        } else {
            echo "Error : " . $sql . "</br>" . mysqli_error($conn);
        }
    }

    ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>

</html>