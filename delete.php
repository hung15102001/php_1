<?php
require_once "list_users.php";
  echo $id = $_GET['id'];
  $conect = new PDO("mysql:host=127.0.0.1;dbname=assignment;charset=utf8","root","");
  $dt = "delete FROM users
  WHERE id = $id";
  $stmt = $conect->prepare($dt); //cbi chạy 1 dtb
  $stmt->execute();
  $users = $stmt->fetchAll();
  header('Location: list_users.php');
?>