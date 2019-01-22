<?php
    session_start();
    if (isset($_SESSION['username'])) {
        header('location:user.php');
    }
    require_once '../connectDB.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = "
            SELECT * FROM users WHERE username = '$username' AND password = '$password';
        ";
        $data = mysqli_query($conn, $query);
        if (mysqli_num_rows($data) == 0) {
            echo "user hoặc password không đúng";
        } else {
            $_SESSION['username'] = $username;
            header('location: user.php');
        }
    }
    mysqli_close($conn);
?>

<!doctype html>
<html lang="en">
<head>
    <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Miny</title>
</head>
<body>
    <form method="post">
        <div>
            <label for="username">Tên đăng nhập</label>
            <input type="text" name="username" placeholder="Tên đăng nhập" required>
        </div>
        <div>
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" placeholder="Mật khẩu" required>
        </div>
        <button type="submit" name="submit">Đăng nhập</button>
    </form>
</body>
</html>