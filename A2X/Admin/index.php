<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login.php</title>
    <script src="https://kit.fontawesome.com/a0390a062d.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/Root.Css">
    <link rel="stylesheet" href="Css/index.Css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" 
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="Css/Warnings.Css">
</head>
<body>
    <div id="Container">
        <form id="LoginForm">
            <div id="FormHead">
                <img src="../Img/Admin.png" alt="Admin logo">
            </div>
            <div class="Field">
                <label>Username</label>
                <div class="Input">
                    <input type="text" name="Username" id="Username" placeholder="Enter Username">
                </div>
            </div>
            <div class="Field">
                <label>Password</label>
                <div class="Input">
                    <input type="password" name="Password" id="Password" placeholder="Enter Password">
                    <i class="fa-solid fa-eye" id="EyeIcon"></i>
                </div>
            </div>
            <button id="LoginBtn">Login Now</button>
        </form>
    </div>

    
    <?php include 'Warnings.php' ?>
    
    <script src="Js/inde.js"></script>
</body>
</html>