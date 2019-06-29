<?php

class Database {

    private $config = [
        'driver' => 'mysql',
        'host' => '',
        'username' => '',
        'password' => '',
        'db_name' => '',
        'commands' => []
    ];

    /**
     * Tao 1 bien' connect de giu~ thong tin ket noi' khi khoi tao PDO
     *
     * @var PDO
     */
    private $connect = null;

    /**
     * Tao 1 bien' de? giu~ lai log
     * @var array
     */
    private $logs = [];

    public function __construct(array $config = [])
    {
        // gio` replace tat ca tham so truyen o ngoai vao class
        // cho~ ni mi hieu dung' khong?/oke
        // {cai nay la driver (co the la mysql, sqlserver, hoac sqllite, hoac oracle)}:host={cai nay la hostname};dbname={cai nay la db_name}
        // nen minh moi co' may' cai' config o tren do'
        // vi` chuoi~ ket noi no yeu cau` nhung tham so nhu

        // gio` se viet 1 ham` connect//

        $this->config = array_replace($this->config, $config);
    }

    public function getLogs() {
        return $this->logs;
    }
    /**
     * Ham connect se return ve bool (true hoac false)
     */
    public function connect() {
        // neu da co connect roi thi return ve true luon//
        if (!empty($this->connect)) {
            return true;
        }

        // con neu khong co thi new PDO len
        // o class PDO can` truyen vao 4 tham so' DSN// la chuoi~ ket noi// username, password// va commands thuc thi dau` tien
        // gio` ta se replace tung` item trong mang? config vao`
        // ma` quen// de try catch lai
        try {

            $this->connect = new PDO(
                "{$this->config['driver']}:host={$this->config['host']};dbname={$this->config['db_name']}",
                $this->config['username'], $this->config['password'], $this->config['commands']
            );
        } catch (PDOException $e) {
            // neu error thi return false
            // dong` thoi` ghi log lai

            $this->logs[] = $e->getMessage();

            return false;
        }


        ////ocho~ nay` mi hieu? khong?`keoke// roi` vay. la xong ham` connect// ham` viet disconnect thi don gian`?
        return true;
    }

    public function disconnect() {
        // set bien connect = null; de neu connect thi no' se chay. xuong duoi' de new PDO len
        $this->connect = null;
    }

    /**
     * Gio viet ham` fetch 1 dong` du~ lieu//
     * // ah` tham so' truyen vao ham` fetchOne se la $query can lay' va $param de tranh' SQL Injection// cho~ nay xi' ta giai thich
     */
    public function fetchOne($query, array $params = []) {

        // o moi~ ham` fetch One hay fetch All// thi deu` phai kiem tra da connect roi` moi' thuc thi lenh.

        // neu` ham` connect return false tuc' la van chua connect dc// cho~ ni mi hieu? khong?oke
        if (!$this->connect()) {

            $this->logs[] = "Connect failed";

            return null;
        }

        // truyen query vao ham` prepare
        // ham` prepare se return ve ` class PDO Statement de truyen tham` so $params vao`
        $statement = $this->connect->prepare($query);

        // ham` execute se thuc thi lenh Sql// neu cau lenh SQL sai thi se return false/ nen can` phai check neu
        // SQL co thuc thi thanh` cong hay khong?
        if (!$statement->execute($params) ) {
            // neu khong thanh` cong thi return ve null; va ghi log lai
            $this->logs[] = $statement->errorInfo();
            // PDO Statement se return loi ve ham` errorInfo de minh ghi log
            return null;
        }

        // con` neu' thuc thi lenh SQL thanh` cong thi se tra ve ket qua = ham` fetchObject| fetchAll// o day minh dung` ham` fetch One
        // nhu vay. la xong ham` fetch 1 dong` du~ lieu roi do'// co thac mac cho~ nao` khong?/ cung co maf de ta xem sao can ta hoi sau// ok
        // gio` test thu?
        return $statement->fetchObject();
    }

    /**
     * ham` ni y nhu tren
     * nhung no se return ve 1 array chu khong phai null// vi` no' la 1 danh sach array gom` nhieu` phan tu ben trong
     * @param $query
     * @param array $params
     * @return null
     */
    public function fetchAll($query, array $params = []) {
        if (!$this->connect()) {

            $this->logs[] = "Connect failed";

            return [];
        }
        $statement = $this->connect->prepare($query);
        //var_dump($params);exit();
        if (!$statement->execute($params) ) {
            $this->logs[] = $statement->errorInfo();
            return [];
        }
        // cho~ nay mi hieu khong?
        return $statement->fetchAll();
    }
}
// ko hieu // fetch 1 dong` du~ lieu thi no se tra ve 1 du lieu

/**
 *
 * stdClass Object
(
[id] => 83
[tong_tien] => 123
[ten_khach] => khanh123456
[ghi_chu] => dsafdsaf
[mua_no] => N
[created_at] =>
[updated_at] =>
)
 *
 * nhung neu fetch nhieu` du lieu thi phai co 1 array de chua nhieu` du lieu// kieu nhu vay do'//ddee ta coi
 *
 * [
stdClass Object
(
[id] => 83
[tong_tien] => 123
[ten_khach] => khanh123456
[ghi_chu] => dsafdsaf
[mua_no] => N
[created_at] =>
[updated_at] =>
),
 *
stdClass Object
(
[id] => 84
[tong_tien] => 123
[ten_khach] => khanh123456
[ghi_chu] => dsafdsaf
[mua_no] => N
[created_at] =>
[updated_at] =>
)
 * ]
 */