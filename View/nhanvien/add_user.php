<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm nhân viên</title>
    <link rel="stylesheet" href="/style.css">
</head>
<body>

    <div>  
        <form action="" method="POST">
            <a name="danhsach" href="index.php?controller=nhan-vien&action=list" class="listlink"> Danh sách nhân viên</a>
            <h1> Thêm nhân viên mới </h1>
                <table>
                    <tr>
                        <td>Mã nhân viên: </td>
                        <td><input type="text" name="manv" placeholder="Mã nhân viên"> </td>
                    </tr>
                    <tr>
                        <td>Họ tên: </td>
                        <td><input type="text" name="hoten" placeholder="Họ tên"> </td>
                    </tr>
                    <tr>
                        <td>Quê quán: </td>
                        <td><input type="text" name="quequan" placeholder="Quê quán"> </td>
                    </tr>
                    <tr>
                        <td>Công việc: </td>
                        <td><input type="text" name="cv" placeholder="Công việc"> </td>
                    </tr>
                    <tr>
                        <td>Trình độ học vấn: </td>
                        <td><input type="text" name="tdhv" placeholder="Trình độ học vấn"> </td>
                    </tr>
                    <tr>
                        <td>Phòng ban: </td>
                        <td><input type="text" name="phongban" placeholder="Phòng ban"> </td>
                    </tr>
                    <tr>
                        <td>Bậc lương: </td>
                        <td><input type="text" name="bacluong" placeholder="Bậc lương"> </td>
                    </tr>
                </table>
                <input type="submit" name="adduser" value="Thêm" style="cursor:pointer" class="input1">          
        </form>
        <?php
            if(isset($thanhcong) && in_array('add_success', $thanhcong)){
                echo "<p style='color: green; text-align:center'>Thêm mới thành công</p>";
            } 
        ?>
    </div>
    
</body>
</html>