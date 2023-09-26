<?php
require_once "../utils/config.php"
?>
<body>
    <div class="wrapper">
        <form method="POST">
            <div class="form-element">
                <h3>
                    Contact Us
                </h3>
            </div>
            <div class="form-element">
                <h5>
                    If you encounter issues while using our service, please fill out the following form to help us improve for a better experience.
                </h5>
            </div>
            <div class="form-element">
                <input class="long-input" type="text" name="name" placeholder="Your Name*" required>
            </div>
            <div class="form-element">
                <input class="long-input" type="email" name="email" placeholder="Email*" required>
            </div>
            <div class="form-element">
                <input class="long-input" type="text" name="phone-number" placeholder="Your Phone Number*" required>
            </div>
            <div class="form-element">
                <input class="long-input" type="text" name="detail" placeholder="Please provide more details into this contact message" required>                
            </div>
            <div class="form-element">
                <button class="long-button" name="contact-submit">Submit</button>
            </div>
        </form>
    </div>
</body>
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