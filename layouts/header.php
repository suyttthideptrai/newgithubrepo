<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moonlight Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous">
</script>

    <script>
        $(document).ready(function () {
            $('#search-button').click(function () {
                $('#search-txt').toggle(200);
            });
        });
    </script>

</head>
<body>
<header>
    <style>
        * {
        box-sizing: border-box;
        color: black;
        }
        body{
            background-color: black;
        }

        .container{
            justify-content: space-around ;
            align-items: center;
            /* height: 30px; */
        }

        .navbar-collapse{
            flex-grow: 0;
        }

        #search-box{
            background-color:transparent;
            border-radius: 30px;
            margin-right: 10px;
        }

        #search-txt{
            outline:none;
            border-radius: 20px;;
            padding: 5px 10px;
        }

        #search-button{
            border: none;
            background-color: transparent;
            cursor: pointer;
            padding:10px;
        }

        .test{
            width: 100px;
        }
    </style>
    <div class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a href="index.php" class="navbar-brand">
                <h2>Logo</h2>
            </a>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-1 mb-lg-0">

                    <li class="nav-item">
                        <a href="index.php" class="nav-link active">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu menu1">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                </ul>

            </div>
            <div id="#ultis" class="d-flex align-items-center">

                <form id="search-box" method="get">
                    <button type="button" id="search-button">
                        <i class="fa-solid fa-magnifying-glass" style="color:black"></i>
                    </button>
                    <input placeholder="Search" type="text" id="search-txt" style="display:none">
                </form>

                <div class="dropdown">

                    <a class="user" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-solid fa-user"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                    <?php
                        if(isset($_SESSION['User'])){
                            echo '<li><a class="dropdown-item" href="#">' . 'Hello User: ' . $_SESSION['User']['Username'] . '<a></li>';
                            }
                    ?>
                    <?php
                        if(isset($_SESSION['User']) && $_SESSION['User']['Role'] === 0){
                            echo '<li><a class="dropdown-item" href="admin/home.php">Page Administration</a></li>';
                            }
                    ?>
                    <?php
                        if(isset($_SESSION['User'])){
                            echo '<li><a class="dropdown-item" href="utils/logout.php">Logout</a></li>';
                            }
                    ?>
                    <?php
                        if(!isset($_SESSION['User'])){
                            echo '
                            <li><a class="dropdown-item" href="main_module/login.php">Sign In</a></li>
                            <li><a class="dropdown-item" href="main_module/register.php">Sign Up</a></li>';  
                            }
                    ?>
                    </ul>

                </div>

            </div>

        </div>
    </div>
</header>

