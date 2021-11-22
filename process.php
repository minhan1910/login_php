<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Process</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="content">
        <h1>Process</h1>
        <form class="content__login" >
            <?php
                require_once 'function.php';
                session_start();
                echo $_SESSION['flagPermisson'];
                if($_SESSION['flagPermisson'] == true) {
                    //ton tai trong 20s xong tu out
                    if($_SESSION['timeOut'] + 20 > time()) {
                        echo '<h3>Hello: '.$_SESSION['fullName'].'</h3>';
                        echo '<a href="logout.php">Log Out</a>';
                    } else {
                        session_unset();
                        header('Location: login.php');
                    }
                } else {
                    if(!checkEmpty($_POST['username']) && !checkEmpty($_POST['password'])) {
                        $data = parse_ini_file("user.ini");
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);
                        //cach nay cham doi lai thanh file ini
    //                    $result = array();
    //                    foreach($data as $value) {
    //                        $username = $_POST['username'];
    //                        $password = $_POST['password'];
    //                        $value    = explode("|", $value);
    //
    //                       if($value[0] == $username) {
    //                         $result = $value;  
    //                         break;
    //                       }
    //                    }
                        $userInfo = explode("|", $data[$username]);
                        if($userInfo[0] == $username &&
                           $userInfo[1] == $password) {
                            $_SESSION['fullName']      = $userInfo[2];
                            $_SESSION['flagPermisson'] = true;
                            $_SESSION['timeOut']       = time();
                            echo '<h3>Hello: '.$_SESSION['fullName'].'</h3>';
                            echo '<a href="logout.php">Log Out</a>';
                        } else {
                            header('Location: login.php');
                        }

                    } else {
                        header('Location: login.php');
                    }
                }
            ?>
        </form>
    </div>
</body>
</html>










