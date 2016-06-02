<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 5/31/16
 * Time: 10:37 PM
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php include_once 'style.php'; ?>
    <script>
        function check_password() {
            var password_box = document.getElementById("inputPassword3");
            var conf_password_box = document.getElementById("confInputPassword3");

            var ok = true;

            if (password_box.value !== conf_password_box.value) {
                document.getElementById("password_match").innerHTML = "Password does NOT match.!";
                document.getElementById("inputPassword3").style.borderColor = "#E34234";
                document.getElementById("confInputPassword3").style.borderColor = "#E34234";
                ok = false;
            }

            return ok;
        }
    </script>
</head>
<body>
<div id="wrap">
    <div id="my_navbar">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <a class="navbar-brand" href="#">SLash</a>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-md-1">
    </div>
    <div id="sign_up_board" class="well col-md-4" style="margin-top: 50px;">
        <form class="form-horizontal" method="POST" onsubmit="return check_password()" action="controllers/register_controller.php">
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Provide your name" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label for="confInputPassword3" class="col-sm-2 control-label">Confirm</label>
                <div class="col-sm-10">
                    <input type="password" name="confInputPassword3" class="form-control" id="confInputPassword3" placeholder="Confirm Password" required>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" name="register" class="btn btn-lg btn-success">Sign up</button>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <p id="password_match" class="error"></p>
                </div>
            </div>
        </form>
    </div>
</div>

</body>
</html>
