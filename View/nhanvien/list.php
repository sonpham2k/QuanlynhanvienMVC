<!DOCTYPE html>
<html lang="en">
    <?php 
        session_start();
    ?>
<head>
    <meta charset="UTF-8">
    <title>Danh sách</title>

</head>
<body>
    <form style="width:800px; border: 1px solid rgb(216, 245, 192)" method="POST">
        <p style="font-size:2rem; color: red"> Danh sách nhân viên</p>
        <div style="margin-bottom: 20px">
            <label style="font-size:1.25rem; color: black"> Tìm kiếm theo: </label>
            <select name="truongsearch" style="font-size: 1.25rem; background-color: white;">
                <option value=""></option>
                <option value="MANV">Mã nhân viên</option>
                <option value="HOTEN">Họ tên nhân viên</option>
                <option value="QUEQUAN">Quê quán</option>
                <!-- <option value="TENCONGVIEC">Công việc</option>
                <option value="TENTRINHDO">Trình độ học vấn</option>
                <option value="TENPB">Phòng ban</option> -->
                <option value="BACLUONG">Bậc lương</option>
            </select>          
        </div>
        <div>
            <label style="font-size:1.25rem; color: black"> Nhập thông tin: </label>
            <input type="text" name="searchnv" style="font-size: 1.25rem; background-color: white; cursor:pointer;">  
            <input type="submit" name="searchnvbtn" value="Tìm kiếm" 
            style="font-size: 1.25rem; background-color: gray; cursor:pointer;">   

        </div>
        <table class="tbl">
            <tr style="background-color: #97d7ff">
                <th>Mã nhân viên</th>
                <th>Họ tên</th>
                <th>Quê Quán</th>
                <th>Công việc</th>
                <th>Trình độ học vấn</th>
                <th>Phòng ban</th>
                <th>Bậc lương</th>
                <th>Hành động</th>
        </tr>
            
            <?php
                
                if(isset($_POST['searchnvbtn'])){
                    $namesearch = $_POST['searchnv'];
                    if($_POST['truongsearch'] == 'TENCONGVIEC'){
                        $valuesearch = $db->searchCV($namesearch);
                    } else if($_POST['truongsearch'] == 'TENTRINHDO'){
                        $valuesearch = $db->searchHV($namesearch);
                    } else if($_POST['truongsearch'] == 'TENPB'){
                        $valuesearch = $db->searchPB($namesearch);
                    } else {
                        $valuesearch = $_POST['truongsearch'];
                    }
                    $sql = "SELECT * FROM `nhanvien` WHERE  $valuesearch LIKE '%$namesearch%'";
                } else {
                    $sql = "SELECT * FROM `nhanvien` WHERE 1";
                }
                $query = $db->alldata($sql);
                $result = $query->fetchAll(PDO::FETCH_OBJ);
                if($query->rowCount()>0) 
                {
                    for ($i = 0; $i <  count($result); $i++)  {
                ?>
                    <tr>
                        <td> <?php echo $result[$i]->MANV ?></td>
                        <td> <?php echo $result[$i]->HOTEN ?></td>
                        <td> <?php echo $result[$i]->QUEQUAN ?></td>
                        <td> <?php echo $db->searchTENCV($result[$i]->MACV) ?></td>
                        <td> <?php echo $db->searchTENHV($result[$i]->MATDHV) ?></td>
                        <td> <?php echo $db->searchTENPB($result[$i]->MAPB) ?></td>
                        <td> <?php echo $result[$i]->BACLUONG;

                        ?></td>
                        <td> <a name="suanhanvien" href="index.php?controller=nhan-vien&action=edit&editnv=<?php echo $i ?>" class="editlink"> Sửa</a>
                         <a name="xoanhanvien" href="index.php?controller=nhan-vien&action=delete&deletenv=<?php echo $result[$i]->MANV ?>" class="editlink"> Xóa</a></td>

                    </tr>
                <?php
                       
                    }
                } 
                if(isset($thanhcong) && in_array('delete_success', $thanhcong)){
                    echo "<p style='color: green; text-align:center'>Xóa thành công</p>";
                } 
            ?>
            
        </table>
    </form>
</body>
</html>
