<?php 
    $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8", "root", "");
    $dt = "select * from products";
    $stmt = $conect->prepare($dt); //cbi chạy 1 dtb
    $stmt->execute();
    $cart = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- <script type="javascript" src="js/trang_chu.js"></script> -->
    <link href="css/css_index.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    aside{
        width: auto;
        height: auto;
        padding-top: 16px;
    }
    aside .btn-dad{
        height: 300px;

    }
    aside .dropdown ul li{
        padding: 4px;
        font-size: 20px;
        font-weight: bold;
        margin-top: 15px;
    }
    aside .dropdown ul li:hover{
        background: purple;
        border-radius: 10px;
    }
    .btn{
        border: 2px solid orange;
        border-radius: 10px;
        width: 200px;
        height: 40px;
        font-size: 20px;
        font-weight: bold;
        background: yellow;
    }
    .btn:hover{
        background: green;
        color: white;
    }
    .btn:hover .dropdown{
        display: block;
    }


</style>

<body class="px-4 font-sans">
    <div class="layout m-0">
        <header class=" w-full">
            <div class="h_son grid grid-cols-3">
                <nav class="col-span-1 text-center pl-8">
                    <ul>
                        <li class="inline-block"><a class="text-lg" href="#">Shop</a></li>
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
        <!-- end header -->
        <main class="w-full mt-8 px-20 text-center">
            <div class="text-center text-4xl font-bold text-yellow-500">
                <h1 class="">Products</h1>
            </div>
            <div class="flex justify-between gap-8">
            <aside>
                <div class="btn-dad">
                    <button id="btn" class="btn" name="btn">Category</button>
                   <div id="drop_down" class="dropdown">
                       <ul>
                           <li><a class="text-green-500" href="#">Qủa xanh</a></li>
                           <li><a class="text-yellow-500" href="#">Qủa ương</a></li>
                           <li><a class="text-red-500" href="#">Qủa chín</a></li>
                       </ul>
                   </div>
                </div>
            </aside>
            <!-- end side3 -->
            <div class="product w-full grid grid-cols-3 gap-6 mt-6">
                <?php foreach($cart as $c):?>
                <form action="" method="get">
                <div class="product_son col-span-1 border-2 border-yellow-500 rounded-md py-4 px-6">
                    <img class="rounded-md" src="img/<?php echo $c['productImage'];?>" alt="" width="100%" >

                    <span class="text-center">
                        <p class="mt-4 text-xl font-bold"><?php echo $c['productName'];?></p>
                        <div class="text-center mt-2">
                            <a class="mt-4 text-2xl font-bold text-red-600"><?php echo $c['productPrice'];?></a>
                            <a class="text-ml text-gray-500" href="#">/kg</a>
                        </div>
                    </span>
                    <div class="show_sp">
                        <i class='bx bx-show'></i>
                        <span class="text_pro"><a  href="chua_hang.php?id=<?php echo $c['id'];?>">Click</a></span>
                    </div>
                </div>
                </form>
                <?php endforeach;?>
                <!-- end sp -->
                   
            </div>
            </div>
            
            <!-- end -->

            <div class="mt-8 text-center font-serif px-80">
                    <h1 class="text-3xl font-bold text-green-600">"Thực Phẩm Sạch"</h1>
                    <span><p  class="mt-6">
                        If you never Tastd a bad Apple you would never Appreciaet a good Apple Because you have to Exprerience Life to Understand Life.
                    </p></span>
            </div>

        </main>
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