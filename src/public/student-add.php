<?php
/*require_once 'students.php';
$update = false;

if (isset($_GET['id'])){
    $update = true;
    $name = getThongTinID($_GET['id']);
}
$add = true;

if (!empty($_POST['oke'])){
     $data['id'] = $_POST['id'];
     $data['name'] = $_POST['name'];
     //$data['data'] =[ $_SESSION['id'],$_SESSION['name']];
     add($data['id'], $data['name']);
}
*/?><!--

<form action="" method="post">
    <input type="text" name="id" value="<?php /*if ($update == true ){ echo $_GET['id'] ; } */?>">
    <input type="text" name="name" value="<?php /*if ($update == true ){  echo $name['name']; } */?>">
    <input type="submit" name="oke" >
</form>
-->
<form method="post" action="" enctype="multipart/form-data">
         <input type="file" multiple name="img[]"/>
    <input type="submit" name="uploadclick" onclick="" value="Upload"/>
</form>
<?php
require_once 'students.php';
echo '<pre>';

    if (isset($_POST['uploadclick'])){
        /**
         * roi` do' :v:D. oke chu. ngu ddi mai cf.tks nhe, ok
         * thi cau' truc cua moi key name, type, tmp_name no se la 1 array
         * neu khong dung multiple thi no chi la string thoi
         * cho~ ni mi hieu chua? oke
         * gio viet khoan dung` huong doi' tuong da// viet luon di. ta viet bien kia roi// ok// de ta xoa vai cai' nhin cho de
         * [img] => Array
                (
                [name] => Array
                (
                [0] => C360_2013-02-03-09-39-56.jpg
                [1] => C360_2013-02-08-19-31-30.jpg
                )
         */
        //print_r($_FILES);
        // chay. thu?
        // gio thu print $_files ra no co kieu nhu the nao?
        // dung' roi do'// nay~ ta dat no nam o nut submit :v


        // cho nay` khong dun` foreach
        // dung` for()
        // vi?? sao?
        /**[name] => Array
        (
            [0] => C360_2013-02-03-09-39-56.jpg
        [1] => C360_2013-02-08-19-31-30.jpg
                )
         * */
        // mi de y' cau` truc cua $_file img // mi chon bao nhieu hinh` thi [name], [type] no se co bay' nhieu phan` tu?
        // nen minh chi can chon ra ton? so' cua [name] roi` for no ra la dc

        $tongSoHinhAnh = count($_FILES['img']['name']);


        // nhu vay la dc/oke// gio thu? di
        for ($i = 0; $i < $tongSoHinhAnh; $i++) {

            $upload = new Upload(
                $_FILES['img']['name'][$i],
                $_FILES['img']['type'][$i],
                $_FILES['img']['tmp_name'][$i],
                $_FILES['img']['error'][$i],
                $_FILES['img']['size'][$i]
            );

            if ($upload->run()) {
                echo "{$_FILES['img']['name'][$i]} upload thanh cong!";
            } else {
                echo implode(', ' , $upload->getDanhSachLoi());
            }

            echo '<br>';
        }

        // ai bay` mi viet class ni ri?//ta viet đo// ah ok// nhung viet kieu ri thi chi upload dc 1 file.
        // truoc tien mi phai dinh nghia o html truoc
        // neu muon upload file thi name phai dat. nhu ri
        // ten name phai de kieu "name[]" va them 1 attribute cua the upload la "multiple" chu multiple co nghia la so' nhieu`
        //echo $upload->checkType();
        //echo $upload->checkSize();
       // print_r($_FILES['avatar']['size']);

        // don gian? vay thoi? 1 file truoc da// gio` thu cho danh sach image = [] thi se ra loi~// mi hieu? cho' oke
        // gio upload multi file thi don gian? foreach $_files ra la dc
    }










