<!doctype html>

<html>
    <head>
        <script src="js/jquery-3.4.1.min.js"></script>
        <meta charset="utf-8">
        <title>Sign up</title>
    </head>

    <body>
        <div class="container">
            <div id="header">Registration</div>
            <div id="ajax_result"></div>
            <form id="ajax_form">
                <p>Login<input type="text" name="login" require></p>
                <p>Password<input type="password" name="password" require></p>
                <p>Confirm password<input type="password" name="confirm_password" require></p>
                <p>Email<input type="email" name="email" require></p>
                <p>Name<input type="text" name="name" require></p>
                <p><input type="button" value="Sign up" id="btn"> or <a href="auth.php">Sign in</a></p>
            </form>
        </div>

        <script src="js/register.js"></script>
    </body>
</html>