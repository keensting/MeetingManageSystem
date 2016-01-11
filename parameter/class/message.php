<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/29
 * Time: 12:48
 */

class message {

    private $luncher;//会议发起人
    private $date;//通知时间
    private $content;//通知时间
    private $state;//通知状态
    private $id;
    private $mid;

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
     *初始化数据
     */
    function initMes($arr)
    {
        $this->luncher=$arr["NAME"];
        $this->date=$arr["DATE"];
        $this->content=$arr["CONTENT"];
        $this->state=$arr["STATE"];
        $this->id=$arr['NOTICE_ID'];
        $this->mid=$arr['MEETING_ID'];

    }
    /**
     * @return mixed
     */
    public function getLuncher()
    {
        return $this->luncher;
    }

    /**
     * @param mixed $luncher
     */
    public function setLuncher($luncher)
    {
        $this->luncher = $luncher;
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
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
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





}