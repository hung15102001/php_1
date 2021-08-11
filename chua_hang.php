<?php 
   $id = $_GET['id'];
  $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8", "root", "");
  $dt = "select * from products where id=$id";
  $stmt = $conect->prepare($dt); //cbi chạy 1 dtb
  $stmt->execute();
  $cart = $stmt->fetch();
?>
<?php
if(isset($_POST['submit'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    // $folder = "img/".basename($_FILES['img']['name']);
    $image = $_POST['img'];
    $price = $_POST['price'];
    $quantity=$_POST['quantity'];
    $status=$_POST['status'];
    $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8","root","");
    $dt = "insert into carts(productName, productImage,productPrice,productQuantity,productStatus,productId) values('$name','$image','$price','$quantity','$status','$id')";
    $stmt = $conect->prepare($dt); //cbi chạy 1 dtb
    $stmt->execute();
    header('Location: gio_hang.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/chua_hang.css" rel="stylesheet"> 
    <title>Info Product</title>
    
</head>
<body>
    <div class="chua_hang w-full p-6">
    <header class=" w-full">
            <div class="h_son grid grid-cols-3">
                <nav class="col-span-1 text-center pl-8">
                    <ul>
                        <li class="inline-block"><a class="text-lg" href="trang_chu.php">Shop</a></li>
                        <li class="inline-block ml-4"><a class="text-lg" href="#">About</a></li>
                        <li class="inline-block ml-4"><a class="text-lg" href="#">Service</a></li>
                    </ul>
                </nav>
                <div class="logo col-span-1 text-center">
                    <a class="text-3xl font-bold text-green-600" href="#">CornyHung</a>
                </div>
                <div class="icon_btn col-soan-1 text-center pr-8">
                    <ul>
                        <li class="inline-block"><a href="#"><i class='bx bx-search-alt'></i></a></li>
                        <li class="inline-block ml-4"><a href="list_users.php"><i class='bx bx-user'></a></i></li>
                        <li class="inline-block ml-4"><a href="#"><i class='bx bx-heart'></a></i></li>
                        <li class="inline-block ml-4"><a href="gio_hang.php"><i class='bx bx-cart'></i></a></li>
                        <li class="inline-block ml-4"><a href="list_products.php"><i class='bx bxl-product-hunt'></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="img_index col-span-3 w-full">
                <!-- <img class="" src="img_index/banner.jpg" alt=""> -->
            </div>
        </header>
    <form class="mx-auto w-full border-2 rounded-md mt-8 px-12 py-4 border-green-500" action="" method="post">
        <input type="text" name="id" value="<?php echo $id;?>">
        <input type="text" name="name" value="Sản phẩm: <?php echo $cart['productName'];?>">
        <div>
            <p><img src="img/<?php echo $cart['productImage'];?>" alt="" width="300px"></p>
        </div>
        <input type="text" name="img" id="" value="<?php echo $cart['productImage'];?>">
        <input type="text" name="price" value="<?php echo number_format($cart['productPrice'],0,',','.');?>">
        <input class="border-2 rounded-md border-red-500 pl-2" type="text" name="quantity" value="" placeholder="Nhập số lượng">
        <input type="text" name="status" value="<?php echo $cart['productStatus'];?>" hidden>
        <input class="p-2 w-40 bg-red-500 hover:bg-green-300 font-bold" type="submit" name="submit" value="Mua">
    </form>
    <a class="form_a" href="trang_chu.php">Back</a>

    <!-- end main -->
    <footer class="w-full mt-8 p-6">
                <h1 class="text-4xl font-bold text-green-600">CornyHung</h1>
                <div class="footer flex justify-between px-60 py-8">
                    <div class="ft_son text-center">
                        <i class='bx bxs-truck'></i>
                        <p class="mt-2"><a class="text-3xl font-bold" href="#">Giao hàng</a></p>
                        <p class="text-left mt-2 text-gray-600">Giao hàng 24/7 nhanh chóng đúng hạn.</p>
                        <p class=" text-gray-600"> Qúy khách có thể kiểm tra hàng trước khi lấy hàng</p>
                    </div>
                        <!-- end -->
                    <div class="ft_son text-center">
                        <i class='bx bxs-map'></i>
                        <p class="mt-2 text-left text-lg text-gray-600"><a href="#">số 1 đường 1 Hà Nội</a></p>
                        <p class="mt-2 text-left text-lg text-gray-600"><a href="#">số 1 đường 1 Bắc Ninh</a></p>
                        <p class="mt-2 text-left text-lg text-gray-600"><a href="#">số 1 đường 1 TPHCM</a></p>
                        <p class="mt-2 text-left text-lg text-gray-600"><a href="#">số 1 đường 1 Hải Phòng</a></p>
                        <p class="mt-2 text-left text-lg text-gray-600"><a href="#">số 1 đường 1 Bắc Giang</a></p>
                    </div>
                        <!-- end -->
                    <div class="ft_son text-center">
                        <i class='bx bx-phone-call'></i>
                        <p class="mt-2 text-left text-lg"><a href="#"><i class='bx bxl-facebook-square'></i>: Sỹ Hùng</a></p>
                        <p class="mt-2 text-left text-lg text-gray-600"><a href="#">Phone: 099999999</a></p>
                        <p class="mt-2 text-left text-lg text-gray-600"><a href="#">Địa chỉ: Bắc Ninh</a></p>

                    </div>
                        <!-- end -->
                </div>
        </footer>
    </div>
    
</body>
</html>