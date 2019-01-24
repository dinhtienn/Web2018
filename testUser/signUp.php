<?php
    require_once '../connectDB.php';
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $fullname = $_POST['fullname'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
        if (strlen($password) < 6) {
            echo 'Vui lòng nhập mật khẩu chứa ít nhất 6 kí tự';
        } else {
            if ($password2 != $password) {
                echo "Password không trùng nhau";
            } else {
                $query = "SELECT * FROM users WHERE username = '$username'";
                $data = mysqli_query($conn, $query);
                if (mysqli_num_rows($data) == 0) {
                    $query_create = "
                        INSERT INTO users (username, fullname, password)
                        VALUES ('$username', '$fullname', '$password');
                    ";
                    $create = mysqli_query($conn, $query_create);
                    if ($create) {
                        echo "
                            <script>
                                alert('Đăng ký thành công');
                            </script>
                        ";
                    } else {
                        echo "
                            <script>
                                alert('Đăng ký không thành công');
                            </script>
                        ";
                    }
                } else {
                    echo "
                        <script>
                            alert('Tên đăng nhập đã tồn tại');
                        </script>
                    ";
                }
            }
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
            <label for="fullname">Tên đầy đủ</label>
            <input type="text" name="fullname" placeholder="Tên đầy đủ" required>
        </div>
        <div>
            <label for="password">Mật khẩu</label>
            <input type="password" name="password" placeholder="Mật khẩu" required>
        </div>
        <div>
            <label for="password2">Xác nhận mật khẩu</label>
            <input type="password" name="password2" placeholder="Nhập lại mật khảu" required>
        </div>
        <button type="submit" name="submit">Đăng ký</button>
    </form>
</body>
</html>