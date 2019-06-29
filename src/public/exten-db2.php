<?php
class Molde extends Pdoo{
    public function getAllBanhang(){
        $sql = 'select * from ban_hang';
        return $this->fetchall($sql);
    }
}