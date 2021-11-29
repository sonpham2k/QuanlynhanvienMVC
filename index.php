
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Quản lí nhân viên</title>
</head>
<body>
    
</body>
</html>
<?php

    include ('../QuanLy/Model/DBconn.php');
    $db = new Database;
    $db->connect();

    if(isset($_GET['controller'])){
        $controller = $_GET['controller'];
    }
    else {
        $controller = '';
    }

    switch($controller){
        case 'nhan-vien':{
            require_once('../QuanLy/Controller/nhanvien/index.php');
        }
    }

?>