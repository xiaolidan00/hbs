<?php
namespace Home\Controller;

use Think\Controller;
use Think\Verify;
use Think\Model;

class UserController extends Controller
{
    public function showLogin()
    {
        if(!isset($_COOKIE['hbs_id'])){//检测是否登录
        $this->display('html/user/login');
        }else{
        $this->assign('msg','你已经登录了！');
        $this->display('html/user/msg');
        }
    }

    public function login()
    {
        if ($this->checkVerify($_POST['verify'])) {//检验验证码  start of checkverify if
            $data=$_POST;
            $user=new Model('user');
            $where['stuid']= $data['stuid'];
            $where['password']=$data['password'];
            
            if($d=$user->where($where)->select()){
            cookie('hbs_stuid',$data['stuid'],3600*24);
            cookie('hbs_kind',$d[0]['kind'],3600*24);
            cookie('hbs_class',$d[0]['class'],3600*24);
            $this->assign('msg','登陆成功！');
            $this->display('html/user/msg');
            }else{
            $this->assign('codeError', '登录失败！');
            $this->display('html/user/login');
            }         
           
        } else {
            $this->assign('codeError', '验证码错误！');
            $this->display('html/user/login');
        }//end of checkverify if
    }

    public function showAppClass(){
        $class = new Model('classes');
        $data = $class->field('id,claname')->select();       
        $this->assign('list',$data);       
        $this->display('html/user/class.app');
    }
    
    public function appClass(){
        $in=new Model('in');
        $data['id']=$this->get_random();
        $data['uid']=$_COOKIE['hbs_stuid'];
        $data['class']=$_POST['class'];
        $data['reason']=$_POST['reason'];
        // 获取注册时间
        date_default_timezone_set("Asia/ShangHai");
        $data['time'] = date('Y-m-s H:i:s');
        
        if($in->add($data)){
            $this->assign('msg','申请成功！');
            $this->display('html/user/msg');
        }else{
            $this->assign('msg','申请失败');
            $this->display("html/user/msg");
        }
    }
    
    public function showClassStatus(){        
        $obj=new Model();
       $sql="select hbs_classes.claname,hbs_in.*
           from hbs_classes,hbs_in
           where hbs_in.class=hbs_classes.id AND hbs_in.uid='".$_COOKIE['hbs_stuid']."'";
       
        $data=$obj->query($sql);
        $this->assign('list',$data);
        $this->display('html/user/class.status');
    }
    
    public function showRegister()
    {    
        $this->display('html/user/register');
    }
    
   

    public function register()
    {
        $user = new Model('user');
        $Error=$this->checkData();
        
       if (is_null($Error)) {
           
            $data = $_POST;
            // 获取注册时间
            date_default_timezone_set("Asia/ShangHai");
            $data['time'] = date('Y-m-s H:i:s');
            $data['id']=$this->get_random();
            if ($user->add($data)) {                          
                cookie('hbs_id', $data['id'], 3600 * 24);
                cookie('hbs_stuid', $_POST['stuid'], 3600 * 24);
                cookie('hbs_kind', $_POST['kind'], 3600 * 24);
                $this->assign('msg','注册成功！');
                $this->redirect("__ROOT__/index.php/Home/User/showAppClass");
            } else {
                $this->assign('msg','注册失败！');
                $this->display('html/user/msg');
            }
            
        } else {
            $this->assign($Error);
            $this->redirect("__ROOT__/index.php/Home/User/showRegister");
        }
              
    }

    public function showForget()
    {
        $this->display('html/user/forget');
    }
    

    public function forget()
    {
        $user = new Model('user');     
        
        if ($this->checkVerify($_POST['code'])) {
            
            if ($user->where($_POST)->select()) {
                $pass['password'] = $_POST['password'];
                $where['stuid'] = $_POST['stuid'];
                if ($user->where($where)->save($pass)) {
                    $this->assign('msg', '密码修改成功');
                    $this->display('html/user/msg');
                } else {
                    $this->assign('msg', '密码修改失败');
                    $this->display('html/user/msg');
                }
            } else {
                $this->assign('msg','填写信息错误或者用户不存在！');
                $this->display('html/user/msg');
            }
        } else {
            $this->assign('codeError','验证码错误');
            $this->redirect('__ROOT__/index.php/Home/User/showForget');
        }
    }

    public function showUser()
    {
        if (isset($_COOKIE['hbs_stuid'])) {
            $id = $_COOKIE['hbs_stuid'];
            $user = new Model('user');
            $where['stuid'] = $id;
            $data = $user->where($where)->select();
            $data = $data[0];
            $this->assign($data);
            $this->display('html/user/user');
        }else{
            $this->display('html/user/login');
        }
       
    }

    public function saveUser()
    {
//         var_dump($_POST);
        $user = new Model('user'); 
        $where['stuid']=$_POST['stuid'];         
           if ($user->where($where)->save($_POST)) {
                $this->assign('msg','保存成功！');
                $this->display('html/user/msg');
            } else {
                $this->assign('msg','保存失败！');
                $this->display('html/user/msg');
            }
               
    }
    
    public function logout(){
        $_COOKIE['hbs_stuid']=null;
        $_COOKIE['hbs_class']=null;
        $_COOKIE['hbs_kind']=null;
        $this->display('html/user/login');
    }
    
    // 验证码生成
    public function verifyPic()
    {
        $Verify = new Verify();
        $Verify->fontSize = 32;
        $Verify->length = 4;
        $Verify->useNoise = false;
        $Verify->entry(1);
    }
    // 验证码检查
    public function checkVerify($code, $id = 1)
    {
        $verify = new Verify();
        return $verify->check($code, $id);
    }
    
    public function checkData(){
        if(!$this->checkVerify($_POST['code'])){
            $Error['codeError']="验证码错误";
        }
        
        if($this->checkOnly('stuid', $_POST['stuid'])){
            $Error['stuidError']="已经存在此学号";
        }
        return $Error;
    }
    
    public function checkOnly($field, $data)
    {
        $user = new Model('user');
        $where[$field] = $data;
        if ($user->field($field)
            ->where($where)
            ->select()) {
                return '已经存在';
            } else {
                return null;
            }
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
