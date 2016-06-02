<?php
/**
 * Created by PhpStorm.
 * User: onepiece
 * Date: 5/31/16
 * Time: 8:51 PM
 */
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <?php include_once 'style.php'; ?>


    <script>

        function invalid_login_trial() {
            var label = document.getElementById("error_auth");
            label.innerHTML = "wrong email or password.!";

        }


        $(document).ready(function () {
            $("#auth_board")
                .animate({marginTop: '100px'}, 1000)
                .animate({minHeight: '220px', padding: '20px'}, 1000, function () {
                    $(".email").fadeIn(500, function () {
                        $(".password").fadeIn(500, function () {
                            $(".submit").fadeIn(500);
                        });
                    });
                });
        });

    </script>
</head>
<body>
<div id="wrap">
    <div id="my_navbar">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">
                        <a class="navbar-brand" href="#">Slash</a>
                    </a>
                </div>
            </div>
        </nav>
    </div>
    <div class="col-md-1">
    </div>
  
        <div id="auth_board" class="well col-md-4" style="margin-top: -200px; margin-left:350px;">
            <form class="form-horizontal" method="POST" action="controllers/login_controller.php">
                <div class="form-group email">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>
                <div class="form-group password">
                    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">

                    </div>
                </div>
                <div class="form-group submit">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="login" class="btn btn-default">Sign in</button>
                        <a class="btn btn-primary col-md-offset-1"  href="index.php?p=register" role="button">Sign up</a>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p id="error_auth" class="error"></p>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>

</body>
</html>