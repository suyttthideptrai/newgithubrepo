<section>
    <div class="content-wrapper">
        <h3>
            Festivals
        </h3>
        <form action="" method="POST">
            <button name="btn-add">Add New Festival</button>
        </form>
        <?php
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btn-add"])){
            require_once "functions/festival_add.php";
            // include('C:\xampp\htdocs\admin\functions\festival_add.php');
        }
        ?>
        <?php 
        //var_dump($_SERVER['DOCUMENT_ROOT']);
        require_once "functions/festival_list.php";
       ?>
    </div>
</section>