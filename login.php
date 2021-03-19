<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto mt-5">
                <div class="card">
                    <form action="" method="POST">
                        <div class="card-header text-center">
                            Log in Your Acccount!!!!
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="Login">
                        </div>
                        <div class="card-footer text-center">
                            <a href="register.php">register</a>
                        </div>
                </div>
            </div>
        </div>
        </form>

        <?php session_start(); ?>
        <?php include('connect.php');

        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $conn->real_escape_string($_POST['password']);

            $sql = "SELECT * FROM `member` WHERE `username` = '" . $username . "' AND `password` = '" . $password . "'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['name'] = $row['name'];
                header('location:index.php');
                echo ($result);
            } else {
                echo '<script type="text/javascript">
                    swal("Fail", "username or password invalid!!", "error");
                  </script>';
            }
        }

        ?>









        <script src="node_modules/jquery/dist/jquery.min.js"></script>
        <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>

</html>