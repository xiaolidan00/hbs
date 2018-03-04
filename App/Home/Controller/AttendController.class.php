<?php
namespace Home\Controller;

use Think\Controller;
use Think\Model;

class AttendController extends Controller
{

    public function showCount()
    {
        if(isset($_COOKIE['hbs_stuid'])){
        $sql = $this->countData($_GET);
        
        $count = new Model();
        $result = $count->query($sql);
        if(isset($_GET['kind'])||isset($_GET['rang'])){
        $kind=$_GET['kind'];            
        $this->assign('kind',$kind);
        $rang=$_GET['rang'];
        $this->assign('rang',$rang);
        }
        $this->assign("list", $result);
        $this->display('html/attend/count');
        }else{
            $this->redirect('__ROOT__/index.php/Home/User/showLogin');
        }
    }

    public function showInhand()
    {
        if(isset($_COOKIE['hbs_stuid'])){
            if($_COOKIE['hbs_kind']){
        $user = new Model('user');
        $where['class']=$_COOKIE['hbs_class'];      
        $data = $user->where($where)
            ->field("stuid,username")->order('stuid')
            ->select();
        $sql = "SELECT uid FROM hbs_leave  WHERE
               now() BETWEEN hbs_leave.start AND hbs_leave.end";
        $leave = new Model();
        $result = $leave->query($sql);
        for ($i = 0; $i < count($data); $i ++) {
            $data[$i]['leave'] = false;
            foreach ($result as $key) {
                if ($data[$i]['stuid'] == $key['uid']) {
                    $data[$i]['leave'] = true;
                }
            }
        }
        $this->assign('list', $data);
        $this->display('html/attend/inhand');
        
        }else{
            $this->assign('msg', '你不是班委，无权限');
            $this->display('html/attend/msg');
        }
        }else{
            $this->redirect("__ROOT__/Home/User/showLogin");
        }
    }

    public function attInhand()
    {
        date_default_timezone_set("Asia/ShangHai");
        $time = date('Y-m-s H:i:s');
        for ($i = 0; $i < count($_POST['uid']); $i ++) {
            $datalist[] = array(
                'id'=>$this->get_random(),
                'uid' => $_POST['uid'][$i],
                'class' => $_COOKIE['hbs_class'],
                'status' => $_POST['status'][$i],
                'time' => $time
            );
        }
        $attend = new Model('attend');
        if ($attend->addAll($datalist)) {
            $this->assign('msg', '考勤记录成功！');
            $this->display('html/attend/msg');
        } else {
            $this->assign('msg', '考勤记录失败！');
            $this->display('html/attend/msg');
        }
    }

    public function showLeave()
    {
        $this->display('html/attend/leave');
    }

    public function attLeave()
    {
        if(isset($_COOKIE['hbs_stuid'])){
        $leave = new Model('leave');
        $data['id']=$this->get_random();
        $data['uid'] = $_COOKIE['hbs_stuid'];
        $data['class'] = $_COOKIE['hbs_class'];
        $data['reason'] = $_POST['reason'];
        $data['start'] = $_POST['start1'] . " " . $_POST['start2'];
        $data['end'] = $_POST['end1'] . " " . $_POST['end2'];
        date_default_timezone_set("Asia/ShangHai");
        $time = date('Y-m-s H:i:s');
        $data['time'] = $time;
        $data['status'] = 0;
        if ($leave->add($data)) {
            $this->assign('msg', '请假成功！');
            $this->display('html/attend/msg');
        } else {
            $this->assign('msg', '请假失败！');
            $this->display('html/attend/msg');
        }
        }else{
            $this->redirect("__ROOT__/Home/User/showLogin");
        }
    }

    public function showRecord()
    { if(isset($_COOKIE['hbs_stuid'])){
        $leave = new Model('leave');
        $where['stuid']=$_COOKIE['hbs_stuid'];
        $data = $leave->where($where)->select();
        $this->assign('list', $data);
        $this->display('html/attend/record');
        }else{
            $this->redirect("__ROOT__/Home/User/showLogin");
        }
    }

    public function showAnswer()
    {
        if(isset($_COOKIE['hbs_stuid'])){
            if($_COOKIE['hbs_kind']){
        $leave = new Model();
        $sql="select hbs_user.username,hbs_leave.*
            from hbs_user,hbs_leave
            where hbs_user.stuid=hbs_leave.uid";
        $data = $leave->query($sql);
        $this->assign('list', $data);
        $this->display('html/attend/answer');
            }else{
                $this->assign('msg', '你不是班委，无权限');
                $this->display('html/attend/msg');
            }
        }else{
            $this->redirect("__ROOT__/Home/User/showLogin");
        }
    }

    public function answer()
    {
        $tag = true;
        $leave = new Model('leave');
        for ($i = 0; $i < count($_POST['id']); $i ++) {
            if ($tag) {
                $where['id'] = $_POST['id'][$i];
                $data['status'] = $_POST['status'][$i];
                
                if ($leave->where($where)->save($data)) {
                    $tag = true;
                } else {
                    $tag = false;
                }
            }
        }
        if ($tag) {
            $this->assign('msg', '回复成功！');
            $this->display('html/attend/msg');
        } else {
            $this->assign('msg', '回复失败！');
            $this->display('html/attend/msg');
        }
    }

    public function ExportExcel()
    {
        date_default_timezone_set("Asia/ShangHai");
        $time = date('YmsHis');
        $class=$_COOKIE['hbs_class'];
        header('Content-type: text/html; charset=utf-8');
        header("Content-type:application/vnd.ms-excel;charset=UTF-8");
        header("Content-Disposition:filename=hbs" . $class . $time . ".csv");
        $sql = $this->countData($_GET);
        $count = new Model();
        $result = $count->query($sql);
        
        foreach ($result as $key) {
            echo $key["uid"] . "," . $key["username"] . "," . $key["time"] . "," . $key["status"] . "\r\n";
        }
    }

    public function countData($data)
    {
        date_default_timezone_set("Asia/ShangHai");
        if ($data["rang"] == 1) {
            $rang="AND hbs_attend.class='".$_COOKIE["hbs_class"]."'";
        } else {
            $rang="AND hbs_attend.uid='".$_COOKIE["hbs_stuid"]."'";
        }
        
        
        if (isset($data["kind"])) {
            $kind = $data["kind"];
        }else{
            $kind = 30;
        }
        
        if ($kind == 1) {
            $sql = "SELECT hbs_attend.uid ,hbs_user.username ,hbs_attend.time,hbs_attend.status
               FROM hbs_attend ,hbs_user
               WHERE hbs_attend.uid=hbs_user.stuid " . $rang . " AND
               DATE_FORMAT(time,'%Y-%m-%d') = date_format(now(),'%Y-%m-%d')
              ORDER BY DATE_FORMAT(hbs_attend.time,'%Y-%m-%d') DESC ,
               hbs_attend.uid";
        } else 
            if ($kind == 7) {
                $sql = "SELECT hbs_attend.uid ,hbs_user.username ,hbs_attend.time,hbs_attend.status
               FROM hbs_attend ,hbs_user
               WHERE hbs_attend.uid=hbs_user.stuid " . $rang . " AND
               hbs_attend.time>=DATE_FORMAT(
               DATE_SUB(DATE_SUB(NOW(),
               INTERVAL WEEKDAY(NOW()) DAY),
               INTERVAL 1 WEEK), '%Y-%m-%d')
               ORDER BY DATE_FORMAT(hbs_attend.time,'%Y-%m-%d') DESC ,
               hbs_attend.uid";
            } else 
                if ($kind == 30) {
                    $sql = "SELECT hbs_attend.uid ,hbs_user.username ,hbs_attend.time,hbs_attend.status
               FROM hbs_attend ,hbs_user
               WHERE hbs_attend.uid=hbs_user.stuid " . $rang . " AND
               hbs_attend.time>=DATE_FORMAT(
               DATE_SUB(DATE_SUB(NOW(),
               INTERVAL DAYOFMONTH(NOW()) DAY),
               INTERVAL 1 MONTH), '%Y-%m-%d')
               ORDER BY DATE_FORMAT(hbs_attend.time,'%Y-%m-%d') DESC ,
               hbs_attend.uid";
                }
        
        return $sql;
    }
    
    public function get_random() {
        $length=20;
        $chars = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $hash = '';
        $max = strlen($chars) - 1;
        for($i = 0; $i < $length; $i++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }
}