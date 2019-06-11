<!doctype html>

<html>
    <head>
        <script src="js/jquery-3.4.1.min.js"></script>
        <meta charset="utf-8">
        <title>Sign in</title>
    </head>

    <body>
        <div class="container">
            <div id="header">Sign in</div>
            <div id="ajax_result"></div>
            <form id="ajax_form">
                <p>Login<input type="text" name="login" require></p>
                <p>Password<input type="password" name="password" require></p>
                <p><input type="button" value="Sign in" id="btn"> or <a href="register.php">Sign up</a></p>
            </form>
        </div>

        <script src="js/auth.js"></script>
    </body>
</html>