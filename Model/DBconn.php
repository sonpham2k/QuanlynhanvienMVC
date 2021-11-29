<?php
    class Database {
        private $hostname = 'localhost';
        private $username = 'root';
        private $pass = '';
        private $dbname = 'quanlynhanvien';

        private $conn = NULL;
        private $result = NULL;
     
        public function connect() 
        {
            $this->conn = new mysqli($this->hostname,$this->username,$this->pass,$this->dbname);
            if(!$this->conn){
                echo "Kết nối thất bại";
                exit();
            } 
            else 
            {
                mysqli_set_charset($this->conn, 'utf8');
            }
            return $this->conn;
        }

        //Thực thi câu lệnh truy vấn
        public function execute($sql)
        {
            $this->result = $this->conn->query($sql);
            return $this->result;
        }

        //Phương thức lấy dữ liệu
        public function getData()
        {
            if($this->result){
                $data = mysqli_fetch_array($this->result);
            }
            else {
                $data = 0;
            }
            return $data;
        }

        //Phương thức lấy toàn bộ dữ liệu
        public function getAllData()
        {
            if($this->result){
                $data = 0;
            }
            else {
                while($datas = $this->getData()){
                    $data[] = $datas;
                }
            }
            return $datas;
        }

        //Phương thức đếm số bản ghi:

        //Phương thức thêm dữ liệu
        public function insertData($MANV, $HOTEN, $QUEQUAN, $MACV, $MATDHV, $MAPB, $BACLUONG)
        {
            $sql = "INSERT INTO `nhanvien`(`MANV`, `HOTEN`, `QUEQUAN`, `MACV`, `MATDHV`, `MAPB`, `BACLUONG`) 
                    VALUES ('$MANV','$HOTEN','$QUEQUAN','$MACV','$MATDHV','$MAPB','$BACLUONG')";
                    
            return $this->execute($sql);
        }

        //Phương thức sửa dữ liệu
        public function UpdateData($MANV, $HOTEN, $QUEQUAN, $MACV, $MATDHV, $MAPB, $BACLUONG){
            $sql = "UPDATE `nhanvien` SET 
                    `MANV`='$MANV',`HOTEN`='$HOTEN',`QUEQUAN`='$QUEQUAN',
                    `MACV`='$MACV',`MATDHV`='$MATDHV',`MAPB`='$MAPB'
                    ,`BACLUONG`='$BACLUONG' 
                     WHERE  `MANV`='$MANV'";
            return $this->execute($sql);
        }

        //Phương thức xóa dữ liệu
        public function DeleteData($MANV) {
            $sql = "DELETE FROM `nhanvien` WHERE `MANV` = '$MANV'";
            return $this->execute($sql);
        }

        //Tìm kiếm mã công việc
        public function searchCV($CV){
            $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->pass);
            $sql = "SELECT * FROM `chucvu` WHERE TENCV like '%$CV%'";
            $query=$conn->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0) 
            {
                for ($i = count($result)-1; $i <  count($result); $i++)  {
                   $kq = $result[$i]->MACV;
                }
            } 
            return $kq;
        }

        //Tìm tên công việc
        public function searchTENCV($MCV){
            $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->pass);
            $sql = "SELECT * FROM `chucvu` WHERE MACV = '$MCV'";
            $query=$conn->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0) 
            {
                for ($i = count($result)-1; $i <  count($result); $i++)  {
                   $kq = $result[$i]->TENCV;
                }
            } 
            return $kq;
        }

        //Tìm kiếm mã phòng ban
        public function searchPB($PB){
            $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->pass);
            $sql = "SELECT * FROM `phongban` WHERE TENPB = '$PB'";
            $query=$conn->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0) 
            {
                for ($i = count($result)-1; $i <  count($result); $i++)  {
                   $kq = $result[$i]->MAPB;
                }
            } 
            return $kq;
        }

        //Tìm kiếm tên phòng ban
        public function searchTENPB($PB){
            $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->pass);
            $sql = "SELECT * FROM `phongban` WHERE MAPB = '$PB'";
            $query=$conn->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0) 
            {
                for ($i = count($result)-1; $i <  count($result); $i++)  {
                   $kq = $result[$i]->TENPB;
                }
            } 
            return $kq;
        }

        //Tìm kiếm mã học vấn
        public function searchHV($HV){
            $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->pass);
            $sql = "SELECT * FROM `trinhdohocvan` WHERE TENTRINHDO = '$HV'";
            $query=$conn->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0) 
            {
                for ($i = count($result)-1; $i <  count($result); $i++)  {
                   $kq = $result[$i]->MATDHV;
                }
            } 
            return $kq;
        }

        //Tìm kiếm tên học vấn
        public function searchTENHV($HV){
            $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->pass);
            $sql = "SELECT * FROM `trinhdohocvan` WHERE MATDHV = '$HV'";
            $query=$conn->prepare($sql);
            $query->execute();
            $result=$query->fetchAll(PDO::FETCH_OBJ);
            if($query->rowCount()>0) 
            {
                for ($i = count($result)-1; $i <  count($result); $i++)  {
                   $kq = $result[$i]->TENTRINHDO;
                }
            } 
            return $kq;
        }


        //Tất cả nhân viên
        public function alldata($sql){
            $conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname,$this->username,$this->pass);
            $query=$conn->prepare($sql);
            $query->execute();
            return $query;
        }

        
    }
?>