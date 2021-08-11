<?php
$error = array();
$check = array('name'=>'hungnsph14158',
                'pass'=>'123'
);
if (isset($_POST['submit'])) {
  if (empty($_POST['username'])==false && empty($_POST['password'])==false){
          $name =$_POST['username'];
          $pass = $_POST['password'];
         if (($name == $check['name']) && $pass == $check['pass'])
          {

            header('Location:list_users.php');
          }
          else{
            $error['loi']= "Tài khoản hoặc mật khẩu kh chính xác";
          }
    } 
    else {
        $_POST['username'] == false;
        $_POST['password'] == false;
        $error['loi'] = "Bạn chưa nhập đủ thông tin";

    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/css_login.css">
  <title>Document</title>
</head>
<body>
<form class="box" method="POST">
    <h1>Login</h1>
    <input type="text" name="username" placeholder="Username">
    <p><?php echo isset($error['loi'])?$error['loi']:''; ?></p>
    <input type="password" name="password" placeholder="Password">
    <p><?php echo isset($error['loi']) ? $error['loi'] : ''; ?></p>
    <input type="submit" name="submit" value="Login">
  </form>
</body>
</html>