<?php
require_once "../utils/config.php"
?>
<head>
    <title>Contact us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<div class="contact-form">
    <div class="container">
        <h2 class="text-center">Contact us</h2>
        <h4 class="text-center">If there are any questions. Please contact us here</h4>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6 form-group mb-2">
                    <input class="form-control" type="text" name="txtName" placeholder="Name" required>
                </div>
                <div class="col-md-6 form-group mb-2">
                    <input class="form-control" type="email" name="txtEmail" placeholder="Email" required>
                </div>
                <div class="col-md-12 form-group mb-2">
                    <input class="form-control" type="text" name="txtSubject" placeholder="Subject" required>
                </div>
                <div class="col-md-12 form-group mb-2">
                    <textarea class="form-control" name="txtMessage" placeholder="Message" required></textarea>
                </div>
                <div class="col-md-12 form-group mb-2">
                    <input class="form-control" type="file" name="filedinhkem">
                </div>
                <div class="col-md-12 form-group mb-2">
                    <input class="btn btn-primary" type="submit" name="btnSubmit" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
<?php
    if (isset($_POST['contact-submit'])) {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $phoneNumber = $_POST['phone-number'] ?? '';
        $t = time();
        $date = date('Y-m-d H:i:s', $t);
        $detail = $_POST['detail'] ?? 'null';
        
        
        $sqlstr = "INSERT INTO contact(name, email, phonenumber, created_at, message) VALUES ('$name', '$email', '$phoneNumber', '$date', '$detail')";

        $result = $conn->query($sqlstr);
        if($result){
            echo "<script>window.alert('Contact form has been submited to our server!');
            window.location.href = '../index.php';
            </script>";
        }else{
            echo "<script>window.alert('Server error: Failed submiting the form!')</script>";
        }
    }
?>