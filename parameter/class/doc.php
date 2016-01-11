<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/3
 * Time: 11:14
 */

class doc {
    private  $id;
    private  $mid;
    private $type;
    private $date;
    private $path;
    private $name;

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
     * 初始化文件对象
     * @param $arr
     */
    function initDoc($arr)
    {
        $this->id=$arr['DOC_ID'];
        $this->mid=$arr['MEETING_ID'];
        $this->date=$arr['DATE'];
        $this->type=$arr['TYPE'];
        $this->path=$arr['PATH'];
        $this->name=$arr['NAME'];

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
    public function getMid()
    {
        return $this->mid;
    }

    /**
     * @param mixed $mid
     */
    public function setMid($mid)
    {
        $this->mid = $mid;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @param mixed $path
     */
    public function setPath($path)
    {
        $this->path = $path;
    }






}