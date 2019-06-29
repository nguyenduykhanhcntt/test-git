<?php
require_once 'pdo.php';

if (isset($_POST['oke'])){
    $tong_tien = $_POST['tong_tien'];
    $ten_khach = $_POST['ten_khach'];
    $ghi_chu   = $_POST['ghi_chu'];
    $mua_no    = $_POST['mua_no'];
    $connetDB->insertBanHang($tong_tien,$ten_khach,$ghi_chu,$mua_no);

}
if (isset($_GET['id'])){
    $id = $_GET['id'];
    $item = $connetDB->getid($id);
    if (isset($_POST['oke'])){
        $connetDB->Update($tong_tien,$ten_khach,$ghi_chu,$mua_no);
    }
}
?>
<html5>
    <form action="" method="post">
        <input type="text" name="tong_tien" value="<?php if(isset($_GET['id'])){ echo $item['tong_tien'];} ?>">
        <input type="text" name="ten_khach" value="<?php if(isset($_GET['id'])){ echo $item['ten_khach'];} ?>">
        <input type="text" name="ghi_chu" value="<?php if(isset($_GET['id'])){ echo $item['ghi_chu'];} ?>">
        <input type="text" name="mua_no" value="<?php if(isset($_GET['id'])){ echo $item['mua_no'];} ?>">
        <input type="submit" name="oke">
    </form>
</html5>
