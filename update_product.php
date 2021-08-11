<?php

$id = $_GET['id'];
$conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8", "root", "");
$dt = "select * from products where id=$id";
$stmt = $conect->prepare($dt); //cbi chạy 1 dtb
$stmt->execute();
$products = $stmt->fetch();

?>
<?php
if(isset($_POST['back'])){
    header('Location: list_products.php');
}
elseif (isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $img = $_POST['img'];
    $price = $_POST['price'];
    $quantity=$_POST['quantity'];
    $status=$_POST['status'];
    $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8","root","");
    $dt = "update products set productName='$name',productImage='$img',productPrice='$price',productQuantity='$quantity',productStatus='$status' where id=$id";
    $stmt = $conect->prepare($dt); //cbi chạy 1 dtb
    $stmt->execute();
    header('Location: list_products.php');
}
?>
<?php
    $status = array(
        '0'=>"Còn hàng",
        '1'=>"Hết hàng"
    );
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
                    <h1>Update_Product</h1>
                    <div>
                        <input type="text" name="id" value="<?php echo $id?>" hidden>
                    </div>
                    <div class="btn_add">
                        <input type="text" name="name" value="<?php echo $products['productName'];?>">
                    </div>
                    <div class="btn_add">
                       
                        <input type="file" name="img" >
                    </div>
                    <div class="btn_add">
                        <input type="text" name="price" value="<?php echo $products['productPrice'];?>">
                    </div>
                    <div class="btn_add">
                        <input type="number" name="quantity" value="<?php echo $products['productQuantity'];?>" >
                    </div>
                    <div class="btn_add">
                        <select name="status" id="">
                        <?php foreach($status as $key => $value): ?>
                            <option value="<?php echo $key;?>"><?php echo $value;?></option>
                             <?php endforeach;?>
                        </select>
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" value="Submit">
                    </div>
                    <div class="back">
                        <input type="submit" name="back" value="Back">
                    </div>
                </form>
                
            </div>
        </section>
    </div>
</body>

</html>