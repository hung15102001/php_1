<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $pass = $_POST['password'];
        $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8","root","");
        $dt = "insert into users(username,password) values('$name','$pass')";
        $stmt = $conect->prepare($dt); //cbi chạy 1 dtb
        $stmt->execute();
        header('Location: list_users.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- Link icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>

<body>
    <div class="layout">
        <div class="sidebar">
            <div class="logo">
                <div class="logo_name">
                    <a href="">
                        <i class='bx bxl-github' id="ic"></i>
                    <span> CornyHung</span>
                    </a>
                </div>
            </div>
            <div class="btn">
                <ul>
                    <li>
                        <i class='bx bx-search-alt'></i>
                        <input class="ip" type="text" name="search" placeholder="Search">
                    </li>
                    <li>
                        <a href="list_users.php">
                            <i class='bx bx-home-circle'></i>
                            <span class="link_btn">
                                Home
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                    <li>
                        <a href="#">
                            <i class='bx bx-user-circle'></i>
                            <span class="link_btn">
                                Users
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                    <li>
                        <a href="#">
                        <i class='bx bxl-dropbox'></i>
                            <span class="link_btn">
                                Products
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                    <li>
                        <a href="#">
                            <i class='bx bxs-bar-chart-square'></i>
                            <span class="link_btn">
                                Exchange
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                    <li>
                        <a href="#">
                            <i class='bx bx-wallet'></i>
                            <span class="link_btn">
                                Wallet
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                    <li>
                        <a href="#">
                            <i class='bx bx-slider'></i>
                            <span class="link_btn">
                                Setting
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                </ul>
            </div>
        </div>
        <section class="form">
            <div class="form_in">
                <form action="" method="post">
                    <h1>Add_Account</h1>
                    <div class="btn_add">
                        <input type="text" name="name" placeholder="Name">
                    </div>
                    <div class="btn_add">
                        <input type="text" name="password" placeholder="................................">
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                </form>
                
            </div>
        </section>
    </div>
</body>

</html>