<?php


// Interface la 1 quy chuan thiet ke quy dinh cac phuong thuc can trien khai. ma` nhung class trien khai tu interface do phai tuan thu theo

interface BanThietNha
{
    public function xayTolet();

    public function xayPhongNgu();
}

function nhaThauDocBanThietKe(BanThietNha $banThietNha)
{
    $banThietNha->xayTolet();

    $banThietNha->xayPhongNgu();
}

class NhaThauA implements BanThietNha
{
    public function xayPhongNgu()
    {
        echo 'Ta xay xong phong ngu roi';
    }

    public function xayTolet()
    {
        echo 'ta xay xong tolet roi';
    }
}

nhaThauDocBanThietKe(new NhaThauA());

?>
<?php

// abstract class la 1 quy chuan thiet ke quy dinh cac phuong thuc can trien khai. ma` nhung class trien khai tu interface do phai tuan thu theo

// abstract class co the tu dinh nghia them nhung phuong thuc phuong thuc can thiet

// diem chung giua abstract class va interface la khong the tu khoi tao.
// ma phai thong qua 1 class ke thua (extends), hoac trien khai (implements) tu interface, abstract class

abstract class BanThietKe
{
    abstract public function xayTolet();

    abstract public function xayPhongNgu();

    public function DanhDachThoHo()
    {
        return [
            [1, 'CN 1'], [1, 'CN 1'], [1, 'CN 1'],
        ];
    }
}

function nhaThauDocBanThietKe(BanThietKe $banThietNha)
{
    $banThietNha->xayTolet();

    $banThietNha->xayPhongNgu();
}


class NhaThauA extends BanThietKe
{
    public function xayPhongNgu()
    {
        echo 'Ta xay xong phong ngu roi';
    }

    public function xayTolet()
    {
        echo 'ta xay xong tolet roi';
    }

    public function DanhDachThoHo()
    {
        return [
            [1, '1CN 1'], [1, '1CN 1'], [1, '1CN 1'],
        ];
    }
}

nhaThauDocBanThietKe(new NhaThauA());

<?php

// 1 class chi ke thua duoc 1 class hoac abstract class. Nhung co the trien khai duoc nhieu interface
// Nhung C muon su dung cac phuong thuc cua A2 thi A1 phai ke thua A2
interface I1
{

}

interface I2
{

}


abstract class A2
{

}

abstract class A1 extends A2
{

}

class C extends A1 implements I1, I2
{

}