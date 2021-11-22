<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="content">
        <h1>Login</h1>
        <?php
            session_start();
            if($_SESSION['flagPermisson'] == true
               && isset($_SESSION['flagPermisson'])
               && count($_SESSION) != 0) {
                if($_SESSION['timeOut'] + 20 > time()) {
                        echo '<h3>Hello: '.$_SESSION['fullName'].'</h3>';
                        echo '<a href="logout.php">Log Out</a>';
                    } else {
                        session_unset();
                        header('Location: login.php');
                    }
            } else {
        ?>
            <form action="process.php" method="post" name="main-form" class="content__login" >
                <label for="username">Username:</label>
                <input type="text" name="username">
                <label for="password">Password</label>
                <input type="password" name="password">
                <input type="submit" value="Đăng Nhập" name="submit">
            </form>
        <?php 
            }
        ?>
    </div>
</body>
</html>










