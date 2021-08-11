
<?php 
$conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8", "root", "");
$dt = "select * from carts";
$stmt = $conect->prepare($dt); //cbi chạy 1 dtb
$stmt->execute();
$cart = $stmt->fetchAll();
$tong = 0;
?>

<!DOCTYPE html>
<html lang="en">
    <style>
        .back{
            font-size: 24px;
            text-align: center;
            color: red;
            border: 2px solid purple;
        }
        i{
            font-size: 25px;
            color:red;
        }
    </style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="css/css_index.css" rel="stylesheet">
    <script type="text/javascript" src="js/gio_hang.js"></script>
</head>

<body class="px-4">
    <div id="layout">
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
                        <li class="inline-block ml-4"><a href="#"><i class='bx bx-user'></a></i></li>
                        <li class="inline-block ml-4"><a href="#"><i class='bx bx-heart'></a></i></li>
                        <li class="inline-block ml-4"><a href="#"><i class='bx bx-cart'></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="img_index col-span-3 w-full">
                <!-- <img class="" src="img_index/banner.jpg" alt=""> -->
            </div>
        </header>
        <div id="content1" class="mt-8 text-center mx-auto">
            <div class="text1">
                <span>
                    <h1 class="text-3xl font-bold text-green-400">Giỏ của bạn</h1>
                </span>
            </div>
            <!-- <div id="option">
                <select name="price" id="" onchange="chon(this)">
                    <option value="0">Mức giá</option>
                    <option value="1">Gía >100</option>
                    <option value="2">Gía từ 100</option>
                    <option value="3">Gía >500</option>

                </select>
            </div> -->
            <table border="1" class="m-auto border-2 border-red-500 p-4 mt-6">
                <thead class="text-center">
                    <tr>
                        <td><input type="checkbox" onchange="checkAll(this)"></td>
                        <th>Hàng hóa</th>
                        <th>Image</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($cart as $i) : ?>
                    <tr>
                        <td><input type="checkbox" name="checkbox"></td>
                        <td><?php echo $i['productName']; ?></td>
                        <td><img src="img/<?php echo $i['productImage'];?>" alt="" width="100px" height="75px"></td>
                        <td class="text-red-500"><?php echo number_format( $i['productPrice'],0,',','.')." "."VND"; ?></td>
                        <td><input type="number" name="textbox" id="control3" min="0" step="1" disabled value="<?php echo $i['productQuantity'];?>"></td>
                        <td><?php echo number_format( $money = $i['productPrice'] * $i['productQuantity'],0,',','.')." "."VND" ; ?></td>
                        <td><a href="delete_cart.php?id=<?php echo $i['id'];?>"><i class='bx bx-trash'></a></td>
                        
                    </tr>
                    <?php $tong += $money;?>
                <?php endforeach ?>

                </tbody>

                <tfoot class="">
                    <tr class="">
                        <td class="text-xl font-bold text-red-500" colspan="3">Tổng</td>
                        <td id="tong_tien"></td>
                        <td>
                            <?php 
                                echo number_format($tong,0,',','.')." "."VND";
                            ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
            <div class="mt-6">
            <a class="back py-1 px-4 hover:bg-yellow-400 hover:text-white rounded-md font-bold" href="trang_chu.php">Back</a>
            </div>
        </div>

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