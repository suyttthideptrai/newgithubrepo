<section>
    <?php require_once "functions/festival_delete.php" ?>
    <div>
        <h3>Festival Manager</h3>
    </div>
    <div class="content-wrapper">
        <div>
            <?php
                require_once "functions/festival_add.php";
                // include('C:\xampp\htdocs\admin\functions\festival_add.php');
            ?>
        </div>
        <div class="scroll-container">
            <?php 
            //var_dump($_SERVER['DOCUMENT_ROOT']);
            require_once "functions/festival_list.php";
            ?>
        </div>
    </div>
</section>
