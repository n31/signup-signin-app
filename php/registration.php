<?php
if ( all_fields_are_not_empty() ) {
    if ( email_are_unique() && login_are_unique() ) {
        if ($_POST['password'] == $_POST['confirm_password']) {
            $salt = md5(uniqid());
            $password = md5($salt . $_POST['password']);
            $xml = simplexml_load_file('db.xml');

            $user = $xml->addChild('user');
            $user->addChild('login', $_POST['login']);
            $user->addChild('password', $password);
            $user->addChild('salt', $salt);
            $user->addChild('email', $_POST['email']);
            $user->addChild('name', $_POST['name']);
            $user->addChild('cookie', 'none');

            $xml->asXml('db.xml');

            $result = "<script>window.location='auth.php';</script>";
        }
        else $result = "ERROR: passwords do not match";
    }
    else $result = "ERROR: email or login already in use";
}
else {
    $result = "ERROR: fields are not filled";
}

echo json_encode($result);

function all_fields_are_not_empty() {
    if (
        !empty($_POST['login'])
        && !empty($_POST['password'])
        && !empty($_POST['confirm_password'])
        && !empty($_POST['email'])
        && !empty($_POST['name'])
    ) return true;
    return false;
}

function email_are_unique() {
    $email =  $_POST['email'];
    $xml = simplexml_load_file('db.xml');

    foreach($xml->user as $user) {
        if ($user->email == $email) return false;
    }

    return true;
}

function login_are_unique() {
    $login = $_POST['login'];
    $xml = simplexml_load_file('db.xml');

    foreach($xml->user as $user) {
        if ($user->login == $login) return false;
    }

    return true;
}
?>