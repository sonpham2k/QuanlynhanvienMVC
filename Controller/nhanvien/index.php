
<?php
        // include ('../QuanLy/Model/DBconn.php');

        if(isset($_GET['action'])){
            $action = $_GET['action'];
        }
        else {
            $action = '';
        }

        $thanhcong = array();

        switch($action){
            case 'add': {

                if(isset($_POST['adduser'])){
                    $manv1 = $_POST['manv'];
                    $hoten1 = $_POST['hoten'];
                    $quequan1 = $_POST['quequan'];
                    $congviec1 = $_POST['cv'];
                    $tdhv1 = $_POST['tdhv'];
                    $phongban1 = $_POST['phongban'];
                    $bacluong1 = $_POST['bacluong'];
                    
                    // $db = new Database;
                    $macongviec1 = $db->searchCV($congviec1);
                    $matdhv1 = $db->searchHV($tdhv1);
                    $mapb1 = $db->searchPB($phongban1);

                    if($db->insertData($manv1, $hoten1, $quequan1, $macongviec1, $matdhv1, $mapb1, $bacluong1)){
                            $thanhcong[] = 'add_success';
                    } 
                    
                }
                require_once('../QuanLy/View/nhanvien/add_user.php');
                break;
            }
            case 'edit':{
                    if(isset($_POST['edituser'])){
                        $manve = $_POST['manva'];
                        $hotene = $_POST['hotena'];
                        $quequane = $_POST['quequana'];
                        $congviece = $_POST['cva'];
                        $tdhve = $_POST['tdhva'];
                        $phongbane = $_POST['phongbana'];
                        $bacluonge = $_POST['bacluonga'];
                        
                        // $db = new Database;
                        $macongviece = $db->searchCV($congviece);
                        $matdhve = $db->searchHV($tdhve);
                        $mapbe = $db->searchPB($phongbane);

                        if($db->UpdateData($manve, $hotene, $quequane, $macongviece, $matdhve, $mapbe, $bacluonge)){
                                $thanhcong[] = 'edit_success';
                        } 
                        
                    }
                require_once('../QuanLy/View/nhanvien/edit_user.php');
                break;
            }
            case 'delete':{
                    if(isset($_GET['deletenv'])){
                        $delete = $_GET['deletenv'];
                    }
                    else {
                        $delete = '';
                    }

                    if($db->DeleteData($delete)){
                        $thanhcong[] = 'delete_success';
                    }

                require_once('../QuanLy/View/nhanvien/list.php');
                break;
            }
            case 'list':{
                require_once('../QuanLy/View/nhanvien/list.php');
                break;
            }
            default:{
                require_once('../QuanLy/View/nhanvien/list.php');
                break;
            }
        }
    ?>