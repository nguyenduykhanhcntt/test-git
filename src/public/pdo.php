<?php


// xiu' mi coi lai cho~ nay`
class Database
{

    private $settings = [
        'driver' => 'mysql',
        'host' => '',
        'username' => '',
        'password' => '',
        'db_name' => '',
        'commands' => []
    ];

    /**
     * @var PDO
     */
    private $connect = null;

    private $logs = [];

    public function __construct(array $settings = [])
    {
        $this->settings = array_replace($this->settings, $settings);
    }

    public function getLogs()
    {
        return $this->logs;
    }

    public function connect()
    {
        if ($this->connect) {
            return true;
        }

        try {

            $this->connect = new PDO(
                "{$this->settings['driver']}:host={$this->settings['host']};dbname={$this->settings['db_name']}",
                $this->settings['username'],
                $this->settings['password'],
                $this->settings['commands']
            );
        } catch (PDOException $e) {

            $this->logs[] = $e->getMessage();

            return false;
        }

        return true;
    }

    public function disconnect()
    {
        $this->connect = null;
    }


    /**
     * @param $query
     * @param array $params
     * @return mixed|null
     */
    public function fetchOne($query, array $params = [])
    {

        if (!$this->connect()) {
            return null;
        }

        $statement = $this->connect->prepare($query);

        if (!$statement->execute($params)) {
            $this->logs[] = $statement->errorInfo();
            return null;
        }

        return $statement->fetchObject();
    }

    /**
     * @param $query
     * @param array $params
     * @return array
     */
    public function fetchAll($query, array $params = [])
    {
        if (!$this->connect()) {
            return [];
        }

        $statement = $this->connect->prepare($query);

        if (!$statement->execute($params)) {
            $this->logs[] = $statement->errorInfo();
            return [];
        }

        return $statement->fetchAll();
    }
}

class ConnetDB{
    private $dns;
    private $user;
    private $pass;
    private $utf;
    protected $error  = 'Falase';

    public function __construct($dns, $user,$pass,$utf)
    {
        $this->dns= $dns;
        $this->user= $user;
        $this->pass= $pass;
        $this->utf= $utf;
    }
    public function connet(){
        try{
            $connet = new PDO($this->dns, $this->user, $this->pass, $this->utf);
            return $connet;
        }catch (PDOException $e){
            $error = $e->getMessage();
            return $error;
        }
    }

    public function getALLBanHang(){

        $all =  $this->connet()->query("select * from ban_hang");
        $all->execute();
        return $all->fetchAll();
    }

    public function getid($id){

        $sql = $this->connet()->prepare("select * from ban_hang where id = $id");
        $sql->bindValue(':id' , $id );
        $sql->fetch(PDO::FETCH_OBJ);
        $sql->execute();
        return $sql->fetch();

    }

    public function CheckId($id){

        $id = $_GET['id'];
        $sql = $this->connet()->prepare("select * from ban_hang where id = $id");
        $sql->bindValue(':id' , $id );
        $sql->fetch(PDO::FETCH_ASSOC);
        $sql->execute();
        if($sql->fetch(PDO::FETCH_ASSOC)){
            return true;
        }
        return false;

    }
    public function insertBanHang($tong_tien,$ten_khach,$ghi_chu,$mua_no){

        $insert =  "INSERT INTO ban_hang (tong_tien,ten_khach,ghi_chu,mua_no) VALUES (:tong_tien,:ten_khach,:ghi_chu,:mua_no)";
       //$this->connet()->prepare($insert);
        $oke = $this->connet()->prepare($insert);
        $oke->bindValue(':tong_tien', $tong_tien);
        $oke->bindValue(':ten_khach', $ten_khach);
        $oke->bindValue(':ghi_chu', $ghi_chu);
        $oke->bindValue(':mua_no', $mua_no);
        $check = $oke->fetch(PDO::FETCH_ASSOC);
        $oke->execute();

    }

    public function Update($tong_tien,$ten_khach,$ghi_chu,$mua_no){

        $id = $_GET['id'];
        $update = "update ban_hang set tong_tien=:tong_tien, ten_khach=:ten_khach, ghi_chu=:ghi_chu, mua_no=:mua_no where id=:id";
        $oke = $this->connet()->prepare($update);
        $oke->bindValue(':tong_tien', $tong_tien);
        $oke->bindValue(':ten_khach', $ten_khach);
        $oke->bindValue(':ghi_chu', $ghi_chu);
        $oke->bindValue(':mua_no', $mua_no);
        $oke->bindValue(':id', $id);
        $oke->execute();

    }

}

$dns = "mysql:host=localhost;dbname=banhang";
$user = "root";
$pass = "";
$utf = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
$connetDB = new ConnetDB($dns,$user, $pass,$utf);