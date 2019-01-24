<?php
    if (isset($_POST['submitLogin'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query_user = "
                SELECT * FROM users WHERE username = '$username' AND password = '$password'
            ";
        $data_user = mysqli_query($conn, $query_user);
        if (mysqli_num_rows($data_user) == 0) {
            echo "
                <script>
                    alert('Tên tài khoản hoặc Mật khẩu không đúng');
                </script>
            ";
        } else {
            $_SESSION['username'] = $username;
            header('location: userHome.php');
        }
    }