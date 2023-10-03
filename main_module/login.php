<?php
require_once "../utils/config.php";
session_start();

$username = $password = "";
$usernameERR = $passwordERR = "";
$success = false;

//Kiểm tra người dùng đã lưu thông tin đăng nhập trong Cookies
if (isset($_COOKIE['rememeber_username'])){
    $username = $_COOKIE['rememeber_username'];
}

if (isset($_POST['_submit'])) {
    try {
        if (empty($_POST['username'])) {
            $usernameERR = 'Please enter a username';
        } else {
            $username = sanitize($_POST['username']);
        }

        if (empty($_POST['password'])) {
            $passwordERR = "Please enter a password";
        } else {
            $password = sha1($_POST['password']);
        }


        $sqlstr = "SELECT UserID, Username, Password, Role from users where username = ?";
        $stmt = $conn->prepare($sqlstr);
        $stmt->bind_param("s", $username);
        $BooleanResult = $stmt->execute();
        $result = $stmt->get_result();

        $authenticationPassed = false;

        if ($BooleanResult && $result->num_rows === 1) {
            $user = $result->fetch_assoc();
            if (hash_equals($password, $user['Password'])) {
                // Xác thực thành công, đặt biến flag thành true
                $authenticationPassed = true;
                $_SESSION['User']['ID'] = $user['UserID'];
                $_SESSION['User']['Username'] = $user['Username'];
                $_SESSION['User']['Role'] = $user['Role'];

                if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on'){
                    setcookie('rememeber_username', $username, time() + 3600 * 24 * 30);
                }
            }
        }

        if ($authenticationPassed) {
            // Chuyển hướng đến trang index.php nếu xác thực thành công
            header('Location: ../index.php');
            exit();
        } else {
            // Hiển thị thông báo lỗi trong một div có class 'alert-danger'
            echo '<div class="alert alert-danger text-center">Login failed, wrong user credentials</div>';
            
        }

    } catch (mysqli_sql_exception $e) {
        echo '<div class="alert alert-danger">Có lỗi xảy ra, vui lòng kiểm tra lại cấu hình!</div>';
    } catch (Exception $e) {
        echo '<div class="alert alert-danger">' . $e->getMessage() . '</div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .errors {
            color: red;
            padding-left: 20px;
            font-size: 16px;
        }

        body {
            background-color: #f8f9fa;
        }

        .container {
            text-align: center;
            padding-top: 100px;
        }

        .login-form {
            max-width: 400px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .login-title {
            font-size: 24px;
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="login-form">
            <h5 class="login-title">Login Account</h5>
            <form action="" method="POST">
                <div class="mb-2">
                    <label class="form-label" for="username">Username: </label>
                    <input class="form-control" type="text" name="username" placeholder="Username" id="username">
                    <span class="errors"><?php echo $usernameERR; ?></span>
                </div>

                <div class="mb-2">
                    <label class="form-label" for="password">Password: </label>
                    <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                    <span class="errors"><?php echo $passwordERR; ?></span>
                </div>

                <div class="mb-2">
                    <label class="form-check-label mx-3" for="rememberMe">
                        <input class="form-check-input mb-2" type="checkbox" name="remember_me" id="rememberMe"> Remember me
                    </label>
                </div>

                <button class="btn btn-success" type="submit" name="_submit">Login</button>
                <button id="Register" class="btn btn-warning" type="button" name="_submit">Register Account</button>


                <div><?php if ($success) echo '<div class="alert alert-success mt-3 text-center">Successfully</div>' ?></div>

                <script>
                    document.getElementById("Register").addEventListener("click", function() {
                        window.location.href = "./register.php";
                    });
                </script>
            </form>
        </div>
    </div>
</body>

</html>