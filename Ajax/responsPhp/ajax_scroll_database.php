<?php
/**
 * Created by PhpStorm.
 * User: KeenSting
 * Date: 2015/7/8
 * Time: 16:18
 */
require_once '../../parameter/Medoo/Resource/medoo.php';

$mydb=new medoo('meetingmanage');

$num=$mydb->count('update');
$id=90000+$num;

$mydb->insert('update',array(
    'ID'=>$id,
    'DATE'=>date('Y/m/d')
));
//获得room id 全部
$arr_id=$mydb->select('rooms','ROOM_ID',
    array(
        'STATE[!]'=>0
    ));
$num_id=count($arr_id);
//var_dump($arr_id);
//
//循环滚动{

for($i=0;$i<$num_id;$i++)
{
    $sta=$mydb->select('rooms',
        array(
            'ONE1',
            'ONE2',
            'ONE3',
            'ONE4',
            'ONE5',
            'ONE6',
            'TWO1',
            'TWO2',
            'TWO3',
            'TWO4',
            'TWO5',
            'TWO6',
            'THREE1',
            'THREE2',
            'THREE3',
            'THREE4',
            'THREE5',
            'THREE6'
        ),
        array(
            'ROOM_ID'=>$arr_id[$i]
        ));
    $state=$sta[0];
    echo $state['TWO1'];
    $mydb->update('rooms',array(
        'ONE1'=>$state['TWO1'],
        'ONE2'=>$state['TWO2'],
        'ONE3'=>$state['TWO3'],
        'ONE4'=>$state['TWO4'],
        'ONE5'=>$state['TWO5'],
        'ONE6'=>$state['TWO6'],
        'TWO1'=>$state['THREE1'],
        'TWO2'=>$state['THREE2'],
        'TWO3'=>$state['THREE3'],
        'TWO4'=>$state['THREE4'],
        'TWO5'=>$state['THREE5'],
        'TWO6'=>$state['THREE6'],
        'THREE1'=>0,
        'THREE2'=>0,
        'THREE3'=>0,
        'THREE4'=>0,
        'THREE5'=>0,
        'THREE6'=>0
    ),array(
            'ROOM_ID'=>$arr_id[$i]
        )
    );
}
?>