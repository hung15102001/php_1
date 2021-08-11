<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $folder = "img/".basename($_FILES['img']['name']);
        $img = $_FILES['img']['name'];
        $price = $_POST['price'];
        $quantity=$_POST['quantity'];
        $status=$_POST['status'];
        $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8","root","");
        $dt = "insert into products(productName, productImage,productPrice,productQuantity,productStatus) values('$name','$img','$price','$quantity','$status')";
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
                        <a href="list_users.php">
                            <i class='bx bx-user-circle'></i>
                            <span class="link_btn">
                                Users
                            </span>
                        </a>
                    </li>
                    <!-- end btn -->
                    <li>
                        <a href="list_products.php">
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
                <form action="" method="post" enctype="multipart/form-data">
                    <h1>Add_Product</h1>
                    <div class="btn_add">
                       <p>Name</p>
                        <input type="text" name="name" placeholder="Name">
                    </div>
                    <div class="btn_add">
                        <input type="file" name="img">
                    </div>
                    <div class="btn_add">
                        <p>Price</p>
                        <input type="text" name="price" placeholder="VND">
                    </div>
                    <div class="btn_add">
                        <p>Quantity</p>
                        <input type="number" name="quantity" placeholder="Quantity">
                    </div>
                    <div class="btn_add">
                        <p>Trạng Thái</p>
                        <select name="status" id="">
                        <?php foreach($status as $key => $value): ?>
                            <option value="<?php echo $key;?>"><?php echo $value;?></option>
                             <?php endforeach;?>
                        </select>
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