<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
       $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8","root","");
       $dt = "delete FROM carts
       WHERE id = $id";
       $stmt = $conect->prepare($dt); //cbi chạy 1 dtb
       $stmt->execute();
       $products = $stmt->fetchAll();
       header('Location: gio_hang.php');
     }else{
       echo "Nothing";
     }
?>