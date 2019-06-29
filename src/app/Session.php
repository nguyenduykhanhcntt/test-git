<?php

namespace App;

class Session
{

    private $sessionResource = [];

    public function __construct()
    {
        $this->start();
    }

    public function getId()
    {
        return session_id();
    }

    public function start()
    {
        $isStart = session_start();
        $this->sessionResource =& $_SESSION;
        return $isStart;
    }

    /**
     * O ham add session thi phai biet duoc session da start thi moi bat' dau` add
     * minh se dung ham getId de kiem tra
     * neu no tra ve id thi moi add
     * // ham add se co key va value
     * // vay la xong ham` add
     * // gio viet 1 function de get all session de add dc vao
     */
    public function add($key, $value)
    {
        if (!$this->getId()) {
            return false;
        }

        $this->sessionResource[$key] = $value;
        return true;
    }

    /**
     * Get one item thi can` biet key cua item trong list all session
     * // tuong tu nhu update
     */
    public function getOneItem($key)
    {
        if (!$this->getId() || empty($this->sessionResource[$key])) {
            return false;
        }

        return $this->sessionResource[$key];
    }

    public function getAll()
    {
        return $this->sessionResource;
    }

    /**
     * update cung can 2 tham so key va value can thay doi
     */
    public function update($key, $value)
    {
        if (!$this->getId() || empty($this->sessionResource[$key])) {
            return false;
        }
        // tuong tu nhu ham` add// kiem tra session ton tai thi moi update// va kiem tra key ton` tai. thi moi update

        // cho nay` mi hieu khong? oke// 2 dieu` kien if// co the rut gon lai 1 dieu kien

        // thay doi lai gia tri moi cho sessio
        $this->sessionResource[$key] = $value;

        return true;
    }

    /**
     * Delete thi chi can` xoa' theo key la dc
     * // no nhu update// check ton tai session va ton` tai key thi moi xoa
     * @param $key
     */
    public function delete($key)
    {
        if (!$this->getId() || empty($this->sessionResource[$key])) {
            return false;
        }

        unset($this->sessionResource[$key]);

        return true;
    }

    public function destroy()
    {
        return session_destroy();
    }
}