<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/30
 * Time: 16:22
 */

class meeting {
    private $id;
    private $name;
    private $instru;
    private $rid;
    private $uid;
    private $date;
    private $day_after;
    private $time;
    private $state;


    public function initMeeting($arr)
    {
        $this->id=$arr['MEETING_ID'];
        $this->name=$arr['NAME'];
        $this->instru=$arr['INSTRUCTION'];
        $this->rid=$arr['ROOM_ID'];
        $this->uid=$arr['USER_ID'];
        $this->date=$arr['DATE'];
        $this->day_after=$arr['DAY_AFTER'];
        $this->time=$arr['TIME'];
        $this->state=$arr['STATE'];

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
    public function getRid()
    {
        return $this->rid;
    }

    /**
     * @param mixed $rid
     */
    public function setRid($rid)
    {
        $this->rid = $rid;
    }

    /**
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
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
    public function getDayAfter()
    {
        return $this->day_after;
    }

    /**
     * @param mixed $day_after
     */
    public function setDayAfter($day_after)
    {
        $this->day_after = $day_after;
    }

    /**
     * @return mixed
     */
    public function getTime()
    {
        return $this->time;
    }

    /**
     * @param mixed $time
     */
    public function setTime($time)
    {
        $this->time = $time;
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