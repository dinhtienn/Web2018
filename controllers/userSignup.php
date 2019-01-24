<?php
    if (isset($_POST['submitSignup'])) {
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
                $query_find_user = "SELECT * FROM users WHERE username = '$username'";
                $data = mysqli_query($conn, $query_find_user);
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