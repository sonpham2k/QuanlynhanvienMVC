<!DOCTYPE html>
<html lang="en">
<?php 
    session_start();
?>
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <div>  
        <form action="" method="POST">
        <a name="danhsach" href="index.php?controller=nhan-vien&action=list" > Danh sách nhân viên</a>
            <h1> Sửa thông tin nhân viên </h1>
                <table>
                    <?php
                    
                    if(isset($_GET['editnv'])){
                        $edit = $_GET['editnv'];
                    }
                    else {
                        $edit = '';
                    }

                    $sql = "SELECT * FROM `nhanvien` WHERE 1";
                    $query = $db->alldata($sql);
                    $result = $query->fetchAll(PDO::FETCH_OBJ);
                    if($query->rowCount()>0) 
                    {  
                        ?>
                        <tr>
                            <td>Mã nhân viên: </td>
                            <td><input type="text" name="manva" placeholder="Mã nhân viên" value="<?php echo $result[$edit]->MANV ?>">  </td>
                        </tr>
                        <tr>
                            <td>Họ tên: </td>
                            <td><input type="text" name="hotena" placeholder="Họ tên" value="<?php echo $result[$edit]->HOTEN ?>">  </td>
                        </tr>
                        <tr>
                            <td>Quê quán: </td>
                            <td><input type="text" name="quequana" placeholder="Quê quán" value="<?php echo $result[$edit]->QUEQUAN ?>"> </td>
                        </tr>
                        <tr>
                            <td>Công việc: </td>
                            <td><input type="text" name="cva" placeholder="Công việc" value="<?php echo $db->searchTENCV($result[$edit]->MACV) ?>"> </td>
                        </tr>
                        <tr>
                            <td>Trình độ học vấn: </td>
                            <td><input type="text" name="tdhva" placeholder="Trình độ học vấn" value="<?php echo $db->searchTENHV($result[$edit]->MATDHV) ?> "></td>
                        </tr>
                        <tr>
                            <td>Phòng ban: </td>
                            <td><input type="text" name="phongbana" placeholder="Phòng ban" value="<?php echo $db->searchTENPB($result[$edit]->MAPB) ?>"> </td>
                        </tr>
                        <tr>
                            <td>Bậc lương: </td>
                            <td><input type="text" name="bacluonga" placeholder="Bậc lương" value="<?php echo $result[$edit]->BACLUONG ?>"> </td>
                        </tr>
                        
                        <?php
                        
                    }
                    ?>

                </table>
                <input type="submit" name="edituser" value="Lưu" style="cursor:pointer" class="input1">          
        </form>
        <?php
            if(isset($thanhcong) && in_array('edit_success', $thanhcong)){
                echo "<p style='color: green; text-align:center'>Sửa mới thành công</p>";
            } 
        ?>
    </div>
    
</body>
</html>