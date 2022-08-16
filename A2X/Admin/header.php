<?php
    session_start(); 
    if (!isset($_SESSION['UserImg'])) {
        header("location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="https://kit.fontawesome.com/a0390a062d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/Root.Css">
    <link rel="stylesheet" href="Css/header.Css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="Css/Warnings.Css">
    <title>A2X DashBoard</title>
</head>
<body>
    <section id="SideBar">
        <ul>
            <li>
                <a href="Dashboard.php" id='Logo'>
                    <span><i class="fas fa-apple-alt"></i></span>
                    <span>A2X</span>
                </a>
            </li>
            <?php if ($_SESSION['UserRole'] == 'Admin'){   ?>
            <li>
                <a href="Dashboard.php">
                    <span><i class="fas fa-home-alt"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Product.php">
                    <span><i class="fas fa-box"></i></span>
                    <span>Product</span>
                </a>
            </li>
            <li>
                <a href="Category.php">
                    <span><i class="fas fa-clipboard-list"></i></span>
                    <span>Category</span>
                </a>
            </li>
            <li>
                <a href="Gallery.php">
                    <span><i class="fas fa-photo-video"></i></span>
                    <span>Gallery</span>
                </a>
            </li>
            <li>
                <a href="Users.php">
                    <span><i class="fas fa-users"></i></span>
                    <span>User</span>
                </a>
            </li>
            <li>
                <a href="Message.php">
                    <span><i class="fas fa-comment"></i></span>
                    <span>Message</span>
                </a>
            </li>
            <?php } ?>
            
            <?php if ($_SESSION['UserRole'] == 'Normal User'){   ?>    
                <li>
                    <a href="Message.php" style="background: #6666FF; color: #ffffff;">
                        <span><i class="fas fa-comment"></i></span>
                        <span>Message</span>
                    </a>
                </li>
            <?php } ?>

            <?php if ($_SESSION['UserRole'] == 'Admin'){   ?>
            <li>
                <a href="Settings.php">
                    <span><i class="fas fa-cog"></i></span>
                    <span>Settings</span>
                </a>
            </li>
            <?php } ?>
            <li>
                <a href="Logout.php">
                    <span><i class="fas fa-sign-out"></i></span>
                    <span>LogOut</span>
                </a>
            </li>
        </ul>
    </section>

</body>
</html>