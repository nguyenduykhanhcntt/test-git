<?php

namespace App;
class Uploader
{
    private $getName;
    private $resoucesUpload;
    // no co 1 file thoi chu' mi// file png no khong nam` trong $type ni ne`// dang check type thoi ma
    // da check upload dau?thi y la trua ta muon chay nhu vay luon// la no ghi ra 1 file loi hay 2 file loi~. print ket qua 2 file. retun 1 file
    // 2 file do la deu` png het ma? thi no se print ra 2 ket qua. uhm.ta muon lay gia tri ra:D// muon lai ra thi` ghi vao log
    // noi chung lam` nhu ta code o duoi' la ok
    //oi. van thac mac cho do mi no :D. maf thoi de ta coi lai//

    // neu mi code rua thi ket qua ra dun'g roi`,, khong sai//vay la sao mi.:D// mi print bien' $true va bien $false
    // neu duoi file nam` trong $this->>type, thi co 2 file khong nam` trong $this->>type nen no print ra 2 hinh loi1.png va loi2.png uhm dung roi
    // cho do ta muon lay ra luon roi tach ham moi cho thang TRUE de tao up load file true neu truong hop co ton ta//i ah` file false
    // hieu roi`// va y thi ham` checkType se khong can thiet
    private $type = ['git', 'jpg', 'jpeg'];

    private $logFile = [];

    private $coTheUpload = [];

    private $khongTheUpload = [];
    private $a = [];

    public function __construct($name_img)
    {
        $this->getName = $_FILES;
        if (!empty($this->getName[$name_img])) {
            $this->resoucesUpload = $this->getName[$name_img];
        }
    }

    public function getResouces()
    {
        return $this->resoucesUpload;
    }

    public function isMultiple()
    {

        $countName = count($this->resoucesUpload['name']);
        if ($countName <= 1) {
            return false;
        }
        return true;
    }

    public function getTmp($position = -1)
    {
        if (!$this->isMultiple()) {

            return $this->resoucesUpload['tmp_name'];
        }
        if ($position < 0) {

            return $this->resoucesUpload['tmp_name'];
        }
        if (!empty($this->resoucesUpload['tmp_name'][$position])) {

            return $this->resoucesUpload['tmp_name'][$position];
        }
        return '';
    }

    public function getName($position = -1)
    {
        if (!$this->isMultiple()) {

            return $this->resoucesUpload['name'];
        }
        if ($position < 0) {

            return $this->resoucesUpload['name'];
        }
        if (!empty($this->resoucesUpload['name'][$position])) {

            return $this->resoucesUpload['name'][$position];
        }
        return '';
    }

    public function checkType()
    {

        /**
         * neu khong phai la multiple thi no khong phai la aray nen khong dung name[0]
         */
        if (!$this->isMultiple()) {

            return $this->checkTypeOneFile($this->resoucesUpload['name']);
        }

        $count = $this->getNumberImages();

        // gio` se tao 1 bien' cho nhung hinh` ok
        // va nhung hinh khong ok
        // cho~ nay co 1 ham dung` 2 la la checkTypeOneFile nen tao 1 function rieng// de dung` lai
        // cho is Multiple hoac !isMultiple
        // neu bien $check = false thi dung` lai
        // con` tat ca cac file deu ok thi khi het for no se chay xuong return true;
        //  code nhin` don gian hon dung' khong?uhm
        // cho~ nay` minh chi luu vi. tri' cua file thoi// khong can luu ten File

        // ma` tu tu de luu ten file luon cho mi de hinh` dung// cho x
        // y mi la rua' dung khong???// oi ta cung thu lafm kieu mi im ko ra. vai thiet . chac go sai me roi :v
        // uh// tao 1 bien upload dc va 1 bien upload khong duoc// neu check file false thi add vao upload khong dc// true thi add vao up dc/uh :D goood :D
        // cai' nay` de tam. ok vay di// gio qua ta coi cai session thu?uh// mo raaakuh// mi mo? file thoi/
        // nhu ri dau phai huong' doi' tuong dau? oi. tach ra dang vay de ta viet 1 class cho mi coi
        for ($i = 0; $i < $count; $i++) {

            if ($this->checkTypeOneFile($this->resoucesUpload['name'][$i])) {
               $this->coTheUpload[$i] = $this->resoucesUpload['name'][$i];


            } else {
               $this->khongTheUpload[$i] = $this->resoucesUpload['name'][$i];
            }
        }
    }

    public function getFileCoTheUpload() {
        return $this->coTheUpload;
    }

    public function getFileKhongTheUpload() {
        return $this->khongTheUpload;
    }


    // viet ham de get log file ra
    public function getLogFile() {
        return $this->logFile;
    }

    private function checkTypeOneFile($fileName)
    {

        $ex = explode('.', $fileName);
        // loi~ o man` hinh la do// can phai tao 1 bien va` bo? vao` ham` end thi moi' dc
        // vi du ri
        $endFile = end($ex);
        // cho~ ham` end (&array: $ex) // mi thay khong?ak uhm thay roi quen quen qua ma
        // uh, tham so' no truyen vao se dc tham chieu' va thay doi ket qua sau khi ra ham`
        // gio` test lai di
        // ua? up dc chua?
        // neu file la hello.png.php thi tieu// vi minh` chi check phan tu thu 1
        // tuc la khi explode no ra thi se co kieu nhu ri
        // [0 => hello, 1 => png, 2 => php
        // ma minh chi check $ex[1] nen no se return true
        if (!empty($endFile) && in_array(strtolower($endFile), $this->type)) {
            return true;
        }
        // day// log ngay cho ni
        // nhu ri la ok// cho ten duoi file ve` chu cai' thuong nuauhm
        // xong roi` do'

        // no return false thi log lai
        $this->logFile[] = $fileName;
        return false;
    }

    public function getNumberImages()
    {
        if ($this->isMultiple()) {
            return count($this->resoucesUpload['name']);
        }

        return 1;
    }


    public function checkSize()
    {
        if (!empty($this->resoucesUpload['size'])) {
            foreach ($this->resoucesUpload['size'] as $value) {
                if (!empty($value)) {
                    if ($value > 10 && $value < 50000000) {
                        return true;
                    }
                }
                return false;
            }
        }
        return '';
    }

}