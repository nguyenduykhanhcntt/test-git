<?php


require_once '../app/Database.php';

// truoc tien tao 1 class Database voi construct truyen vao la 1 mang chua config de connect den Database
// bao gom` hostname// username/ password, db_name...
$db = new Database([
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'banhang',
    'commands' => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
    ]
]);

//$data = $db->fetchOne("select * from ban_hang where id = ? AND tong_tien = ?", [83, 123]);
//1 la co' the truyen truc tiep id vao` cau SQL luon//
// 2 la se dung` 1 bien' mask de thay the// vd dau ? la (mask)
// mask tieng viet co nghia la Mat. na.// gio` truyen $params vao` de thay the cho mask//
// PDO no se tu tim` so' 1 va replace cho dau' ?// gio` xem ket qua// no se ra tuong duong nhu tren
// them 1 dieu` kien nua vd: tong tien = 123// cho~ nay` mi hieu khong?/oke// no' giong` nhu bindParam mi viet' ben class kia ak'uh
// cach nao` cung~ ok
//` gio` viet 1 ham` de get ra tat ca danh sach lun
echo '<pre>';

$errors = $db->getLogs();

$data = $db->fetchAll("select * from ban_hang where id=83");
// vay la xong// oke de ta coi co gi ta hoi// ok

if (!empty($errors)) {
    print_r($errors);
}
// do'// ban dau` $this->>lgos = empty// neu' co loi~ thi $this->>logs se !empty nen se print ra// cho~ ni mi hieu? khong? oke
// nhu vay la ok roi` do'// neu' cau lenh SQL bi loi vd:// thi no se return ve null// va get log ra de coi// de? ta viet them 1 ham get log ra
// ham` fetchOne con` 1 tham so $params phia sau nhu ri
// no' thuong dung` cho may' cau dieu kien. ah' vd:
print_r($data);