<?php
if (isset($_GET['delete_success']) && $_GET['delete_success'] == 1) {
    echo "<script>window.alert('Record successfully deleted!');</script>";
}
?>
<section>
    <div class="content-wrapper">
        <h3>
            User contact via website
        </h3>
        <div>
            <?php require_once "functions/contact_list.php"; ?>
        </div>
    </div>
</section>
<script>
    function reply(email) {
        var subject = "Re: Moonlight Event Respond"; // Set the email subject
        var body = "Dear recipient,"; // Set the email body content

        // Generate the mailto link with the email address, subject, and body
        var mailtoLink = "mailto:" + email + "?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body);

        // Open the default email client with the pre-addressed email
        window.location.href = mailtoLink;
    }
</script>
