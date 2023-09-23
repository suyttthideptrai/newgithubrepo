<?php
require_once "../utils/config.php";
session_start();

$username = $password = "";
$usernameERR = $passwordERR = "";
$success = false;

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


        $sqlstr = "SELECT UserID, Username, Password from users where username = ?";
        $stmt = $conn->prepare($sqlstr);
        $stmt->bind_param("s", $username);
        $BooleanResult = $stmt->execute();
        $result = $stmt->get_result();
        if ($BooleanResult && $result->num_rows === 1){
            $user = $result->fetch_assoc();
            dd($user);
            if(hash_equals($password, $user['Password'])){
            
            $_SESSION['User']['ID'] = $user['UserID'];
            $_SESSION['User']['Username'] = $user['Username'];
            header('Location: ../index.php');
            exit();
            } else {
            
            echo "<script>window.alert('Login failed, wrong user credentials'</script>";
            // header('Location: ../index.php');

            exit();
            }
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
    <title>Login Account</title>
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
                <div class="mb-3">
                    <label class="form-label" for="username">Username: </label>
                    <input class="form-control" type="text" name="username" placeholder="Username" id="username">
                    <span class="errors"><?php echo $usernameERR; ?></span>
                </div>

                <div class="mb-3">
                    <label class="form-label" for="password">Password: </label>
                    <input class="form-control" type="password" name="password" placeholder="Password" id="password">
                    <span class="errors"><?php echo $passwordERR; ?></span>
                </div>

                <button class="btn btn-success" type="submit" name="_submit">Login</button>
                <div><?php if ($success) echo '<div class="alert alert-success mt-3">Successfully</div>' ?></div>
            </form>
        </div>
    </div>
</body>

</html>