<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/30
 * Time: 10:50
 */

class room {
    private $id;
    private $num;
    private $space;
    private $one;
    private $two;
    private $three;
    private $mic;
    private $ppt;
    private $board;
    private $state;


    /**初始化会议室信息
     * @param $arr
     * @param $one
     * @param $two
     * @param $three
     */
    public  function initRoom($arr,$arr1)
    {
        $this->id=$arr['ROOM_ID'];
        $this->num=$arr['NUM'];
        $this->space=$arr['SPACE'];
        $this->mic=$arr['MIC'];
        $this->ppt=$arr['PPT'];
        $this->board=$arr['BOARD'];
        $this->state=$arr['STATE'];
        $this->one=$arr1[0];
        $this->two=$arr1[1];
        $this->three=$arr1[2];

    }
    /**
     * @return mixed
     */
    public function getSpace()
    {
        return $this->space;
    }

    /**
     * @param mixed $space
     */
    public function setSpace($space)
    {
        $this->space = $space;
    }

    /**
     * @return mixed
     */
    public function getOne()
    {
        return $this->one;
    }

    /**
     * @param mixed $one
     */
    public function setOne($one)
    {
        $this->one = $one;
    }

    /**
     * @return mixed
     */
    public function getTwo()
    {
        return $this->two;
    }

    /**
     * @param mixed $two
     */
    public function setTwo($two)
    {
        $this->two = $two;
    }

    /**
     * @return mixed
     */
    public function getThree()
    {
        return $this->three;
    }

    /**
     * @param mixed $three
     */
    public function setThree($three)
    {
        $this->three = $three;
    }

    /**
     * @return mixed
     */
    public function getMic()
    {
        return $this->mic;
    }

    /**
     * @param mixed $mic
     */
    public function setMic($mic)
    {
        $this->mic = $mic;
    }

    /**
     * @return mixed
     */
    public function getPpt()
    {
        return $this->ppt;
    }

    /**
     * @param mixed $ppt
     */
    public function setPpt($ppt)
    {
        $this->ppt = $ppt;
    }

    /**
     * @return mixed
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @param mixed $board
     */
    public function setBoard($board)
    {
        $this->board = $board;
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
    public function getNum()
    {
        return $this->num;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->num = $num;
    }









}