<?php
require_once "../utils/config.php";
session_start();

$usernameERR = $passwordERR = $emailERR = "";
$success = false;
$error_message = "";


if (isset($_POST['_submit'])) {
    try {
        // Kiểm tra và xử lý dữ liệu đầu vào
        if (empty($_POST['username'])) {
            //not empty
            $usernameERR = "Username is required";
        } elseif ($_POST['username'] < 8) {
            //proper length
            $usernameERR = "Username must be at least 8 characters long";
        }else{
            $username = sanitize($_POST['username']);
        }
        //filter input password
        if (empty($_POST['password'])) {
            $passwordERR = "Password is required";
        } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/", $_POST['password'])) {
            $passwordERR = "Password must contain at least one lowercase letter, one uppercase letter, and one digit";
        }else {
            $password = sanitize($_POST['password']);
            $password_hashed = sha1($password);
        }
        //filter email
        if (empty($_POST['email'])) {
            $emailERR = "Email is required";
        } else {
            $email = sanitize($_POST['email']);
        }

        // Gán vào phiên làm việc
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;


        // Kiểm tra xem có lỗi không
        if (empty($usernameERR) && empty($passwordERR) && empty($emailERR)) {
            // Nếu không có lỗi, tiến hành kiểm tra username và thực hiện đăng ký
            $sqlstr = "SELECT * FROM users WHERE username = '$username'";
            $result = $conn->query($sqlstr);
            if ($result->num_rows > 0) {
                $error_message = "Create Account failed, username already exists";
            } else {
                $t = time();
                $currentDatetime = date('Y-m-d H:i:s', $t);
                $sqlstr = "INSERT INTO users(username, password, email, created_at, updated_at, role) VALUES ('$username', '$password_hashed', '$email', '$currentDatetime', '$currentDatetime', '1')";
                $result = $conn->query($sqlstr);
                if ($result) {
                    // Tài khoản đã được thêm thành công vào cơ sở dữ liệu, gửi email xác nhận
                    require_once "./sendmail_registerSuccess.php";
                    unset($_SESSION['username']);
                    unset($_SESSION['password']);
                } else {
                    $error_message = "Create Account failed, please try again later";
                }
            }
        } else {
            $error_message = "Please check the entered data again";
        }
    } catch (mysqli_sql_exception $e) {
        $error_message = "Please check the entered data again";
    } catch (Exception $e) {
        $error_message = "Please check the entered data again";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .errors {
            color: red;
            font-size: 16px;
        }

        .card-title {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
            color: #0d6efd;
        }

        .form-label {
            font-weight: bold;
        }

        .form-control {
            border-radius: 8px;
        }

        .btn-primary {
            width: 100%;
            border-radius: 8px;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-btn {
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Register Account Moonlight Festival</h5>
                        <?php
                        if (!empty($error_message)) {
                            echo '<div class="alert alert-danger text-center">' . $error_message . '</div>';
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="mb-2">
                                <label class="form-label" for="username">Username: </label>
                                <input class="form-control" type="text" name="username" placeholder="User Name" id="username">
                                <span class="errors"><?php echo $usernameERR ?></span>
                            </div>

                            <div class="mb-2">
                                <label class="form-label" for="password">Password: </label>
                                <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                                <span class="errors"><?php echo $passwordERR; ?></span>
                            </div>

                            <div class="mb-2">
                                <label class="form-label" for="email">Email: </label>
                                <input class="form-control" type="email" name="email" placeholder="Email" id="email">
                                <span class="errors"><?php echo $emailERR; ?></span>
                            </div>

                            <div class="d-flex justify-content-center mb-3">
                                <button class="btn btn-primary custom-btn" type="submit" name="_submit">Register Account</button>
                                <div class="mx-2"></div>
                                <button id="backButton" type="button" class="btn btn-secondary custom-btn">Back</button>
                            </div>

                            <script>
                                document.getElementById("backButton").addEventListener("click", function() {
                                    window.location.href = "./login.php";
                                });
                            </script>

                            <?php if ($success) echo '<div class="alert alert-success mt-3 text-center">Account created successfully, please check your Email</div>'  ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>