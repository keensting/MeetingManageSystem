<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/30
 * Time: 9:50
 */

class depart {
    private $id;
    private $name;
    private $phone;
    private $instru;

    /**
     *初始化对象信息
     */
    public function  initDepart($arr)
    {
            $this->id=$arr['DEPART_ID'];
            $this->name=$arr['NAME'];
            $this->phone=$arr['PHONE'];
            $this->instru=$arr['INSTRUCTION'];
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getInstru()
    {
        return $this->instru;
    }

    /**
     * @param mixed $instru
     */
    public function setInstru($instru)
    {
        $this->instru = $instru;
    }

    /**
     * @return mixed
     */
    public function getArr()
    {
        return $this->arr;
    }

    /**
     * @param mixed $arr
     */
    public function setArr($arr)
    {
        $this->arr = $arr;
    }//部门成员







}