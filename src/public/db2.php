<?php
class Pdoo{
    public $config = [
        'driver' => 'mysql',
        'host' => '',
        'db_name' => '',
        'username' => '',
        'password' => '',
        'utf' => []
    ];
    private $connect = null;
    public $error = [];
    public function __construct($data = array())
    {
        $this->config = array_replace($this->config, $data);
    }

    public function connet(){

        if (!empty($this->connect)){
            return true;
        }

        try{
            $this->connect = new PDO(
                "{$this->config['driver']}:host={$this->config['host']};dbname={$this->config['db_name']}",
                $this->config['username'],
                $this->config['password'],
                $this->config['utf']
            );

        }catch (PDOException $e){
            $this->error[] = $e->getMessage();
            return false;
        }
        return true;
    }
    public function ditconnet(){

    }

    public function fetchone($query , $params = []){
        if(!$this->connet()){
            return false;
        }

        $sql = $this->connect->prepare($query);

        if (!$sql->execute($params) ) {

            return null;
        }
        return $sql->fetchobject();

    }
    public function fetchall($query, $params = []){
        if(!$this->connet()){
            return false;
        }

        $sql = $this->connect->prepare($query);

        if (!$sql->execute($params) ) {

            return null;
        }
        return $sql->fetchall();
    }

}
