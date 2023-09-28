<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<?php
    require_once "style.html";
?>
<style>
        body {
            font-family: Arial, sans-serif;
            padding-bottom: 50px;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            height: calc(100vh);
        }
        nav {
            background-color: #333;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
        }
        .nav-links {
            list-style: none;
            display: flex;
        }
        .nav-links li {
            margin-right: 20px;
        }
        .nav-links a {
            color: white;
            text-decoration: none;
        }
        .nav-links a:hover {
            text-decoration: underline;
        }
        
    </style>
    <header>
    <nav>
        <div class="logo">Moonlight Festival</div>
        <ul class="nav-links">
            <li><a href="../index.php">HOME</a></li>
            <li><a href="../utils/logout.php">Logout</a></li>
        </ul>
    </nav>
    </header>