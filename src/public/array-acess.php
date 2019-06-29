<?php
class Arr implements ArrayAccess {
    protected $resoundAcc;
    protected $ss;
    public function offsetExists($offset)
    {
        if (array_key_exists($offset)){
            return true;
        }
        return false;
        // TODO: Implement offsetExists() method.
    }
    public function __construct()
    {
        session_start();
        $this->ss = & $_SESSION;
    }

    public function getId(){
        return session_id();
    }


    public function offsetSet($offset, $value)
    {
        if (isset($offset)){
             $this->ss[$offset] = $value;
        }
        // TODO: Implement offsetSet() method.
    }
    public function offsetGet($offset)
    {
        return $this->ss[$offset];
        // TODO: Implement offsetGet() method.
    }
    public function offsetUnset($offset)
    {
        unset($this->ss[$offset]);
        // TODO: Implement offsetUnset() method.
    }
    public function offsetGetAll(){
         return $_SESSION;
    }
    public function Update($key , $value){
        if(!$this->getId()){
            return false;
        }
        $this->ss[$key] = $value;
        return true;
    }
}


/*$abc = new Arr();
$abc[''] = '111111111';
print_r($abc['khanh']);
echo '<pre>';

//$abc['tham'] = 123456788;
print_r($abc['tham']);*/


/*function tinhgiaithua($n){
   /* $s = 1;
    //   if ($n == 1){
    //        $s = 1;
    //    }
    //    for ($i = 1; $i <= $n ; $i++){
    //        echo '<pre>';
    //        echo $s = $s * $i;//1+2+6+24+120
    //
    //    }
    //    //return $s;
    //    //tinhgiaithua($n);
    $s = 1;
    if ($n> 1){
        $s= $n * tinhgiaithua($n-1);
    }
    return $s;

}
echo tinhgiaithua(4);*/
/*$arr = [
    ['id' => '1','lop' => 'a1','id_con' => '0','leve' => '1'],
    ['id' => '2','lop' => 'b1','id_con' => '0','leve' => '1'],
    ['id' => '3','lop' => 'c1','id_con' => '2','leve' => '2'],
    ['id' => '4','lop' => 'd1','id_con' => '3','leve' => '3']
];*/
/*$arr = [
    ['id' => '1','lop' => 'a1','id_con' => 0],
    ['id' => '2','lop' => 'b1','id_con' => 0],
    ['id' => '3','lop' => 'c1','id_con' => 1],
    ['id' => '4','lop' => 'd1','id_con' => 3],
    ['id' => '5','lop' => 'e1','id_con' => 2],
    ['id' => '6','lop' => 'f1','id_con' => 5],
    ['id' => '7','lop' => 'g1','id_con' => 6],
    ['id' => '8','lop' => 'h1','id_con' => 7]
    ];
echo '<pre>';
//print_r($arr);
foreach ($arr as $key => $value) {
    if ($value['id_con'] == 0) {
        $value['leve'] = 1;
        $arr_leve[] = $value;
        $id = $value['id'];
        foreach ($arr as $key1 => $value1) {
            if ($value1['id_con'] == $id) {
                $value1['leve'] = $value['leve'] + 1;
                $arr_leve[] = $value1;

                $id2 = $value1['id'];
                foreach ($arr as $key2 => $value2) {
                    if ($value2['id_con'] == $id2) {
                        $value2['leve'] = $value1['leve'] + 1;
                        $arr_leve[] = $value2;
                        unset($arr[$key]);
                    }
                }
            }
        }
    }
}
function dequy($arr, $id_con,$leve,& $arr_leve){
    if(count($arr) > 0 ){
        foreach ($arr as $key => $value) {
            if ($value['id_con'] == $id_con) {
                $value['leve'] = $leve;
                $arr_leve[] = $value;
                $id = $value['id'];
                dequy($arr, $id , $leve +1, $arr_leve);
            }
        }
    }
}
dequy($arr, 0, 1, $arr_leve);
print_r($arr_leve);

foreach($arr_leve as $item) {
    if($item['leve'] == 1){
        echo '<div style = "border:1px solid yellow"> + '.$item['lop'].'</div>';
    }else{

        echo '<div style = "border:1px solid yellow; padding-left:'.($item['leve'] -1)*20 .'px"> - '.$item['lop'].'</div>';
    }
}*/
// them 1 phan tu vao mang
$arrg = ['khanh' => '123' , 'tham' =>'456'];
$arrg['cuong'] = '789';
print_r($arrg);
