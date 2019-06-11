<?php
if ( all_fields_are_not_empty() ) {
    if ( user_exists() ) {
        $xml = simplexml_load_file('db.xml');

        foreach($xml->user as $user) {
            if ($user->login == $_POST['login']) {
                $password = $user->password;
                $salt = $user->salt;
            }
        }

        if ($password == md5($salt . $_POST['password'])) {
            $result = "comin!";
            $xml = simplexml_load_file('db.xml');

            $cookie = md5(uniqid());

            foreach($xml->user as $user) {
                if ($user->login == $_POST['login']) {
                    $user->{'cookie'} = $cookie;
                    setcookie("auth", $cookie, time() + 3600, '/');
                    break;
                }
            }
            $xml->asXml('db.xml');
            $result = "<script>window.location='index.php'</script>";
            
        }
        else $result = "ERROR: wrong password";
        
    }
    else $result = "ERROR: user does not exist";
}
else {
    $result = "ERROR: fields are not filled";
}

echo json_encode($result);

function all_fields_are_not_empty() {
    if (
        !empty($_POST['login'])
        && !empty($_POST['password'])
    ) return true;
    return false;
}

function user_exists() {
    $login =  $_POST['login'];
    $xml = simplexml_load_file('db.xml');

    foreach($xml->user as $user) {
        if ($user->login == $login) return true;
    }

    return false;
}
?>