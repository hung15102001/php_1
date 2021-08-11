<?php
$conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8", "root", "");
$dt = "select * from products";
$stmt = $conect->prepare($dt); //cbi chạy 1 dtb
$stmt->execute();
$products = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style_product.css" rel="stylesheet">
    <!-- Link icons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
<script language="javascript" src="js/product.js"></script>
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
                        <a href="trang_chu.php">
                            <i class='bx bx-home-circle'></i>
                            <span class="link_btn">
                                Home
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                    <li>
                    <button onclick="myFunction()" class="user">
                    <i class='bx bxl-dropbox'></i>
                            <span class="link_btn">
                                Products
                            </span>
                            <i class='bx bx-caret-down'></i>
                        </button>
                        <div id="myDropdown" class="dropdown">
                            <div class="dropdown_1">
                            <i class='bx bx-plus'></i>
                            <a href="add_product.php">Creat new product</a>
                            </div>
                        </div>
                    </li>
                    <!-- end btn -->
                    <li>
                    <a href="list_users.php">
                    <i class='bx bx-user-circle'></i>
                            <span class="link_btn">
                                Users
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
        <!-- <div class="creat">
            <i class='bx bx-plus'></i>
            <a href="add.php">Creat_Account</a>
        </div> -->
        <!-- end creat -->

        <section class="form">
            <div class="form_in">
                <table border="0" align="center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th colspan="2">Fucntion</th>
                        </tr>
                    </thead>
                    <!-- end Thead -->
                    <tbody>
                        <?php foreach ($products as $u) : ?>
                            <tr>
                                <td><?php echo $u['id']; ?></td>
                                <td><?php echo $u['productName']; ?></td>
                                <td class="img"><img src="img/<?php echo $u['productImage']?>" alt="" width="200px" height="150px" ></td>
                                <td><?php echo $u['productPrice']; ?></td>
                                <td><?php echo $u['productQuantity']; ?></td>
                                <td><?php echo $u['productStatus']==0?"Còn hàng":"Hết hàng";?></td>
                                <td class="ud"><a href="update_product.php?id=<?php echo $u['id']; ?>"><i class='bx bx-refresh'></i></a></td>
                                <td class="dl"><a onclick="return confirm('Bạn có tiếp tục muốn xóa')" href="delete_product.php?id=<?php echo $u['id']; ?>"><i class='bx bx-trash'></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- end table -->

            </div>
        </section>
    </div>
</body>

</html>