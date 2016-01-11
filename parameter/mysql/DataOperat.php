<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/6/27
 * Time: 16:12
 */


require_once "./parameter/Medoo/Resource/medoo.php";//被引用后根目录就会发生变化

class DataOperat
{
    private  $mydb;

    /*
     * 构造函数
     */
    function DataOperat()
    {
        $this->mydb = new medoo('meetingmanage');
    }

    /**获取指定的会议文档
     * @param $id
     */
    function  fetch_doc($id)
    {
        $re=$this->mydb->select("docspace","*",array(
            'AND'=>array(
                "TYPe"=>1,
                'MEETING_ID'=>$id))
        );
        return $re;
    }

    /**获取指定的会议纪要
     * @param $id
     */
    function  fetch_txt($id)
    {
        $re=$this->mydb->select("docspace","*",array(
            'AND'=>array(
                "TYPe"=>2,
                'MEETING_ID'=>$id
            )

        ));
        return $re;
    }


    /**返回历史会议信息
     * @param $id
     * @return array|bool
     */
    function fetch_history_meeting($id)
    {
        $re=$this->mydb->select('attendence',array(
                '[>]meeting'=>array("MEETING_ID"=>"MEETING_ID"),
            '[>]user'=>array("USER_ID"=>"USER_ID")

            ),
            array(
                "attendence.MEETING_ID",
                "meeting.NAME",
                "meeting.DATE",
                "user.REAL_NAME",
                "meeting.INSTRUCTION"

            ),
            array(

                    "attendence.USER_ID"=>$id


            )
        );

        return $re;

    }
    /*
     * 登录验证
     */

    function  verify($name)
    {
        $re=$this->mydb->select('user','*',array("OR"=>array("name"=>$name,"email"=>$name,"phone"=>$name)));
        if(count($re)==0)
        {
            return 0;
        }
        else{
        $arr=$re[0];
        return $arr;}
    }

    /**插入数组信息
     * @param $table
     * @param $arr
     */
    function insertItem($table,$arr)
    {
        $this->mydb->insert($table, $arr);

    }


    /**
     * 验证值是否存在
     * @param $table
     * @param $col
     */
    function checkItem($table,$col,$value)
    {
        $re=$this->mydb->has($table," \"$col\"=$value");
        return $re;
    }

    /**
     *返回表中最大的的id
     */
    function getMaxId($id , $table)
    {
        $max=$this->mydb->max("$table","$id");

        return $max;
    }

    /**
     * 批量取值，无约束条件
     * @param $table
     * @param $arr
     */
    function  selectItem($table,$arr){

        $arr=$this->mydb->select($table,$arr);
        return $arr;

    }
    /*
     * 从参会列表中获取某一特定会议的参与者信息
     */
    function  fetch_attendence($id)
    {
       $re= $this->mydb->select('attendence',
            array(
                "[>]user"=>array("USER_ID"=>"USERID")
            ),
            array(
                "attendence.PERSON_STATE",
                "user.NAME"
            ),
            array("attendence.MEETING_ID"=>$id)
            );
        return $re;
    }

    /**
     *从数据库中联合查询出某用户的所有通知
     */
    function fetchNotice($uid)
    {
        $result=$this->mydb->select('notice',
            array(
                "[>]inform"=>array("INFORM_ID"=>"INFORM_ID"),
                "[>]user"=>array("USER_ID"=>"USER_ID")

            ),
            array(
                "user.NAME",
                "inform.DATE",
                "inform.CONTENT",
                "notice.STATE",
                "notice.NOTICE_ID",
                "inform.MEETING_ID"

            ),
            array(
                "notice.USER_ID"=>$uid,
                "LIMIT"=>30,
                "ORDER"=>'notice.NOTICE_ID DESC'


            )


        );
        return $result;
    }

    /**
     * 获取单独的通知
     * @param $info_id//通知id
     */
    function fetch_single_notice($info_id)
    {

        $result=$this->mydb->select('inform',
            array(

                "[>]user"=>array("USER_ID"=>"USER_ID")

            ),
            array(
                "user.NAME",
                "inform.DATE",
                "inform.CONTENT"


            ),
            array(
                "inform.INFORM_ID"=>$info_id,



            )


        );
        return $result;
    }


    /**
     * 修改
     */
    function  alter_single_item($table,$arr1,$arr2)
    {
        $this->mydb->update($table,$arr1,$arr2);


    }


    function alter_board($nid,$uid)
    {
        $re1=$this->mydb->select("notice","INFORM_ID",array("NOTICE_ID"=>$nid));
       // var_dump($re1);
        $iid=$re1[0];
        $re2=$this->mydb->select("inform","MEETING_ID",array("INFORM_ID"=>$iid));
        $mid=$re2[0];
       // var_dump($re2);
        $this->mydb->update("attendence",array(
            "PERSON_STATE"=>1
        ),array(
            "AND"=>array(
                "MEETING_ID"=>$mid,
                "USER_ID"=>$uid
            )
        ));

    }


    /**
     *获取部门信息
     * 返回部门列表
     */
    function fetch_depart_info()
    {
        $re=$this->mydb->select("departs","*");
        return $re;
    }


    /**
     * 获取部门成员
     * @param $id
     * 返回成员列表
     */
    function  fetch_depart_member($depart_id)
    {
        $re=$this->mydb->select('user',array(
            "REAL_NAME",
            "IDENTY"
        ),array(
            "DEPART_ID"=>$depart_id
        ));


        return $re;
    }


    /**
     *获取所有会议室信息
     * 返回数组
     */
    function  fetch_room_info()
    {
        $re=$this->mydb->select("rooms","*");
        return $re;

    }




    function  fetch_meeting($uid)
    {
        //echo $uid;
        $re=$this->mydb->select("meeting","*",array(
            "AND"=>array(
                "VALIDITY"=>0,
                "USER_ID"=>$uid
            )

        ));
        return $re;
    }

    /*
     * 获取全部部门信息（用于删除页面）
     */
    function  fetch_depart_num($did)
    {
        $re=$this->mydb->count('user','DEPART_ID',array(
            'DEPART_ID'=>$did
        ));
        return $re;

    }

    /*
     * 获得员工信息
     */
    function  fetch_person_details()
    {
        $re=$this->mydb->select('user',
            array(
                '[>]departs'=>array('DEPART_ID'=>'DEPART_ID')
            ),
            array(
                'user.USER_ID',
                'user.REAL_NAME',
                'user.SEX',
                'departs.NAME(DNAME)',
                'user.IDENTY',
                'user.PHONE',
                'user.EMAIL'
            ),
            array(
                'STATE'=>1,
                'ORDER'=>'user.USER_ID DESC'
            )
        );
        return $re;
    }


    function  fetch_person_details_single($id)
    {
        $re=$this->mydb->select('user',

            array(
                'USER_ID',
                'REAL_NAME',
                'SEX',

                'IDENTY',
                'PHONE',
                'EMAIL'
            ),
            array(
                'USER_ID'=>$id
            )
        );
        return $re;
    }




}
?>