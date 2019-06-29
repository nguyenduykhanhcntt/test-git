<?php

class Upload
{
    private $name;
    private $type;
    private $tmp_name;
    private $error = 'EROR';
    private $size;
    private $type_arr = ['jpg', 'jpeg', 'png', 'gif'];
    private $minSize = 10;
    private $maxSize = 10000000;

    private $danhSachLoi = [];

    /// ta moi coi class mi viet// tam. ok nhung co vai diem can thay doi nhu sau
    public function __construct($name, $type, $tmp_name, $error, $size)
    {
        $this->name = $name;
        $this->type = $type;
        $this->tmp_name = $tmp_name;
        $this->size = $size;
        $this->error = $error;
    }

    public function run()
    {
        // ham ni mi goi checkSize va checkType nhung khong lay gia tri cua no' ra// muc dich mi la in ra loi~ man` hinh dung' khong? uhm
        // cho~ in ra man hinh loi~ chut nua ta chi?
        // gio ham` checkSize va checkType deu tra ve boolean(true hoac false)// nen se dua no vao dieu kien if de check

        // neu co loi~ thi return function run lai// khong co loi thi bat dau` upload , ok :v good
        if (!$this->checkType() || !$this->checkSize() || $this->error != 0) {
            return false;//
        }

        // nhu vay la ok// cho~ ni mi hieu khong? oke moi lm nay maf// mi luu y' 1 cho la`
        // 1 ham nen return ve 1 kieu? du lieu thoi// return nhieu` loai thi do. phuc tap no' cang` tang -> kho' xu ly. ok sau ni do phai coi code ho phai ko// uh
        // gio chuyen qua upload nhieu file
        // ah ma de? ghi ra loi~ da~
        // tao 1 bien' luu thong tin loi~
        // ta vua` tao. 1 bien' la danhSachLoi de luu vao 1 hoac nhieu` hon 1 loi~
        // gio` ta se tien' hanh` add message loi~ vao bien' danhSachLoi cho truong hop checkType, checkSize va upload fail
        return move_uploaded_file($this->tmp_name, 'images/' . $this->name);

        /**$this->checkSize();
        $this->checkType();
        if ($this->error == 0) {
            if (move_uploaded_file($this->tmp_name, 'images/' . $this->name)) {
                echo 'Fnish';
            } else {
                return $this->error;
            }
        }**/
    }

    public function getDanhSachLoi() {
        // vi $this->>danhSachLoi la private nen dung` 1 ham` de get bien' nay` ra ngoai`
        return $this->danhSachLoi;
    }

    public function checkType()
    {
        $type = explode('/', $this->type);

        if (empty($type) || !in_array($type[1], $this->type_arr)) {

            // cho~ nay` mi hieu ham` implode roi` dung' khong?oke
            // o day ham` checkType chi co' 1 truong hop return false nen add cho~ nay` la dc// gio sang ham checkSize
            $this->danhSachLoi[] = "checkType: file duoc phep la : " . implode(', ', $this->type_arr);
            return false;
        }

        return true;
        // nhu vay la ok.iuhm
        // tuong tu cho ham ni cung~ rua'// ta se refactor dieu kien if 1 xiu' cho de nhin`// ma de chut nua refactor
        // cho~ ni mi so sanh $type[1] == 'jpeg' || $type[1] == 'png'// ok nhung o phia tren mi co dung` bien private la
        // private $type_arr = ['jpeg', 'png']; // cho ni co the viet nhu ri van~ ok
        // ham` in_array de check co ton` tai trong array khong
        // cho~ ni mi hieu khong? :D oke ta viet thu cong ma// uh
        // tuong tu cho~ return
        // gio` refactor lai xiu'

        /**$type = explode('/', $type);
        if ($type[0] == 'image') {
            if (in_array($type[1], $this->type_arr)) {

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }**/
    }


    public function checkSize()
    {
        $size = $this->size;

        if (empty($size)) {
            // dun` no tren nay`
            $this->danhSachLoi[] = "checkSize: size dc phep upload nho? nhat: {$this->minSize}, lon' nhat: {$this->maxSize}";
            return false;
        }

        if (!empty($size) && $size > $this->minSize AND $size < $this->maxSize) {
            // trong dau' ngoac kep " thi co the cho bien' vao nam trong cap {ten_bien}
            // con dau' ngoac don ' thi khong in ra dc.
            // toi' day mi hieu cho'?// cho xiu

            return true;// cho nay tra ve true// :v ok, good// vay cho~ nay` khong co' message loi~
        }

        // va` o day :v:d, ok? chua? oke , ok // gio` viet 1 ham` de lay' da danh sach loi~ la dc
        $this->danhSachLoi[] = "checkSize: size dc phep upload nho? nhat: {$this->minSize}, lon' nhat: {$this->maxSize}";
        return false;

        //echo $size;// ngan' gon. hon dung' khong? :D
        /**if (!empty($size)) {
            // cho nay` so 10 va 100000... vi no dung` chung hoac co the thay doi nen cho no vao 1 bien' private
            // gio ta dat ten no la minSize va maxSize
            // ham` check size thi chi? nen return ve true hoac false// cho nay` mi return size hoac la echo ra File size
            // cho~ nay` khong nen
            // 1 ham` viet chi nen xac dinh 1 kieu du lieu tra ve la dc// o day ta se return ve boolean(true hoac false
            // cho ni mi hieu khong? oke// nhung xi may lay gia tri ra the nao
            // lay gia tri cho? nao dau? $this->>checksize ay, do ta retun luon
            // cho nay phan tich 1 xiu'
            // $size = $this->size;
            // cho nay mi da co gia tri cua size roi
            // xiu' mi muon lay gia tri ra thi chi can $this->size la ok, khong can ham` nay return ve// oke hieu roi
            // vd nghe, neu' ham` nay luc nay no khong return ve size ma o duoi' mi echo ra file size not exit
            // thi doan code tren mi se bi. loi~// vi ham` ni khong return ve gi` het neu no khong vao dieu kien
            if ($size > $this->minSize AND $size < $this->maxSize) { // nay`// roi` tiep tuc// ma` chua// cho~ dieu` kien if viet nhu the nay ok hon ne`
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }**/
    }
}