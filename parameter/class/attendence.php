<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/1
 * Time: 14:18
 */

class attendence {



    private $pstate;
    private $name;



    private function initAtt($arr)
    {
        $this->name=$arr['NAME'];
        $this->pstate=$arr['PERSON_STATE'];
    }

    /**
     * @return mixed
     */
    public function getPstate()
    {
        return $this->pstate;
    }

    /**
     * @param mixed $pstate
     */
    public function setPstate($pstate)
    {
        $this->pstate = $pstate;
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




}