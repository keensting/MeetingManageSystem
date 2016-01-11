<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/27
 * Time: 15:32
 */

class user {
    private  $name;
    private $id;
    private $realname;
    private  $email;
    private  $sex;
    private $phone;
    private $headimg;
    private $depart;
    private $pwd;
    private $state;
    private $mes;
    private $identy;

    /**
     * @return mixed
     */
    public function getIdenty()
    {
        return $this->identy;
    }

    /**
     * @param mixed $identy
     */
    public function setIdenty($identy)
    {
        $this->identy = $identy;
    }

    /**
     *构造函数
     */


    function  setUser($arr)
    {
        $this->name=$arr['NAME'];
        $this->id=$arr['USER_ID'];
        $this->realname=$arr['REAL_NAME'];
        $this->email=$arr['EMAIL'];
        $this->sex=$arr['SEX'];
        $this->phone=$arr['PHONE'];
        $this->headimg=$arr['HEAD_IMG'];
        $this->depart=$arr['DEPART_ID'];
        $this->pwd=$arr['PWD'];
        $this->state=$arr['STATE'];
        $this->mes=$arr['MES'];
        $this->identy=$arr['IDENTY'];

    }

    /**
     * 将对象信息返回成数组
     * @return array
     */
    function  getArr()
    {
        $arr=array(
            "name"=>$this->name,
            "id"=>$this->id,
            "realname"=>$this->realname,
            "email"=>$this->email,
            "sex"=>$this->sex,
            "phone"=>$this->phone,
            "headimg"=>$this->headimg,
            "depart"=>$this->depart,
            "pwd"=>$this->pwd,
            "state"=>$this->state,
            "mes"=>$this->mes,
            "identy"=>$this->identy



        );


        return $arr;

    }


    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
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
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getHeadimg()
    {
        return $this->headimg;
    }

    /**
     * @param mixed $headimg
     */
    public function setHeadimg($headimg)
    {
        $this->headimg = $headimg;
    }

    /**
     * @return mixed
     */
    public function getDepart()
    {
        return $this->depart;
    }

    /**
     * @param mixed $depart
     */
    public function setDepart($depart)
    {
        $this->depart = $depart;
    }

    /**
     * @return mixed
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * @param mixed $pwd
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }




    /**
     * @return mixed
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * @param mixed $mes
     */
    public function setMes($mes)
    {
        $this->mes = $mes;
    }


    function getName()
    {
        return $this->name;
    }
    function setName($name)
    {
        $this->name=$name;
    }

    function getId()
    {
        return $this->id;
    }
    function setId($id)
    {
        $this->id=$id;
    }

    /**
     * @return mixed
     */
    function getRealName()
    {
        return $this->realname;
    }
    function setRealName($realname)
    {
        $this->realname=$realname;
    }







}