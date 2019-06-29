<?php
require_once '../app/Uploader.php';
require_once 'upload.html';

if (isset($_POST['oke'])){
   $uploader = new \App\Uploader('img');
   echo '<pre>';
    //print_r($uploader->isMultiple());
   //print_r($uploader->getTmp());

    print_r($uploader->checkType());

    //print_r($uploader->getFileKhongTheUpload());

   //print_r($uploader->getFileCoTheUpload());

    // :v chua up dc :v, moi check type thoi/ chiueef lafm cais for tack may cai file loi ra cho do sao ko dc mi
    // loi cho~ nao?.ko cai hoi chiu ta noi ay. lay mayc
    // cai nay` ha?uh
    // chiu :v. cho print fales vs true ay. ta return thi no ra 1 file con print thi no ra taat ca
    // ta khong hieu cho~ nay mi viet sao// nhung co' ve khong dung
    // neu muon ghi log thi tao 1 bien' log va add file vao bien' log neu ham checkType return ve false//uhm neu log false luon thi oke. nhuwng
    // vua log va vua view file loi ra // chac log khong dun'g thoi
    //print_r($uploader->gettypeFalse);
   // print_r($uploader->gettypeTrue);

}
//