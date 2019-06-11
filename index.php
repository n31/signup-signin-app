<?php
    if ( isset($_COOKIE['auth']) ) {
        $xml = simplexml_load_file('php/db.xml');
        foreach($xml->user as $user) {
            if ($user->cookie == $_COOKIE['auth']) {
                session_start();
                $name = $user->name;
                $_SESSION['name'] = (string)$name;
                break;
            }
        }
    }
    else header("location: register.php");

    if (isset($_SESSION['name'])) echo "Hello {$_SESSION['name']}<br><a href='logout.php'>Log out</a>";
?>