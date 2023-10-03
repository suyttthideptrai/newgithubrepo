<?php
    session_start();
    require_once "views/functions/config.php";
    require_once "header_admin.php";
    require_once "../assets/css/admin_style.html";
?>
<body>
    <div class="spacer">

    </div>
    <div class="wrapper-flex">
        <div class="sidebar">
            <div class="menu-item">
                <a href="home.php?view=Statistics">Statistics</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=FestivalManager">Content Manager</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=PostManager">Post Manager</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=Contact">Website Contact</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=MailingService">Mailing</a>
            </div>
            <div class="menu-item">
                <a href="home.php?view=Registering">User Register</a>
            </div>
        </div>
        <div class="spacer">

        </div>
        <div class="content">
            <?php
            // PHP view handling 
            if (isset($_GET['view'])) {
                $view = $_GET['view'];
                switch ($view) {
                    case 'Statistics':
                        include('views/statistics.php');
                        break;
                        case 'FestivalManager':
                            include('views/festival_manager.php');
                            break;
                        
                        case 'PostManager':
                            include('views/post_manager.php');
                            break;
                        
                        case 'Contact':
                            include('views/contact.php');
                            break;
                        
                        case 'MailingService':
                            include('views/mailing_service.php');
                            break;
                        
                        case 'Registering':
                            include('views/list_user.php');
                            break;
                        
                        default:
                            include('views/default.php');
                            break;
                    }
            } else {
                include('views/default.php');
            }
            ?>
        </div>
        <div class="spacer">

        </div>
    </div>
</body>
</html>
