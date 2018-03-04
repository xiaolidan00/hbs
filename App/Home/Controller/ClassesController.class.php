<?php
namespace Home\Controller;

use Think\Controller;
use Think\Model;
class ClassesController extends Controller{
    public function showClass(){
        if(isset($_COOKIE['hbs_class'])){
            $class=new Model('classes');
            $where['id']=$_COOKIE['hbs_class'];
            $data=$class->where($where)->select();
            $this->assign($data[0]);
            $this->display('html/class/class');
        }else{
            $this->assign('msg','班级未加入');
                $this->display('html/class/msg');
        }
        
    }
    
    public function showTaked(){
        if(isset($_COOKIE['hbs_class'])){
            $w['id']=$_COOKIE['hbs_class'];
      $class=new Model('classes');
      $class=$class->where($w)->select();
      $this->assign($class[0]);
            $act=new Model('activity');
            $where['class']=$_COOKIE['hbs_class'];
            $data=$act->where($where)->order('time desc')->select();           
           $this->assign('list',$data);
            $this->display('html/class/taked');
        }else{
            $this->redirect('__ROOT__/index.php/Home/User/showLogin');
        }       
    }
    
    public function showClassReg(){
        $this->display('html/class/class.reg');
    }
    
    public function classReg(){
        $data=$_POST;
        $cla=new Model('classes');
        if($cla->add($data)){
            $user=new Model('user');
            $u['class']=$data['id'];
            $u['kind']=1;
            $where['stuid']=$_COOKIE['hbs_stuid'];
            cookie('hbs_class',$data['id'],3600*24);
            cookie('hbs_kind',1,3600*24);
            if($user->where($where)->save($u)){
                $this->assign('msg','创建成功并成功加入班级！');
                $this->display('html/class/msg');
            }else{
                $this->assign('msg','创建成功并未加入班级:'.$data['id']);
                $this->display('html/class/msg');
            }
            
        }else{
            $this->assign('msg','创建失败！');
            $this->display('html/class/msg');
        }
        
        
    }
    
    public function showNew(){
        if(isset($_COOKIE['hbs_class'])||$_COOKIE['hbs_kind']==1){
        $in=new Model();
        $sql="select A.*,B.username
            from hbs_in A ,hbs_user B
            where A.uid=B.stuid AND
            A.status=0
            AND A.class='".$_COOKIE['hbs_class']."'";
        $data=$in->query($sql);

        $this->assign('list',$data);
       $this->display('html/class/class.new');
        }else{
            $this->assign('msg','你不是班委，无权限！');
            $this->display('html/class/msg');
        }
    }
    
    public function classNew(){

        if($_POST['submit']=="允许"){
            $user=new Model('user');
            $data['class']=$_COOKIE['hbs_class'];
            $where['stuid']=$_POST['uid'];
            
            $in=new Model('in');
            $where1['id']=$_POST['id'];
            $data1['status']=1;

            if($in->where($where1)->save($data1)&&$user->where($where)->save($data)){
                $this->assign('msg','回复接受成功');
                $this->display('html/class/msg');
            }else{
                $this->assign('msg','回复接受失败');
                $this->display('html/class/msg');
            }
        }else if($_POST['submit']=="拒绝"){
           
            $in=new Model('in');
            $where1['id']=$_POST['id'];
            $data1['status']=-1;
    
            if($in->where($where1)->save($data1)){
                $this->assign('msg','回复拒绝成功');
                $this->display('html/class/msg');
            }else{
                 $this->assign('msg','回复拒绝失败');
                $this->display('html/class/msg');
            }
        }
    }
    
    public function showMember(){
        if(isset($_COOKIE['hbs_class'])){      
        $user=new Model('user');
        $where['class']=$_COOKIE['hbs_class'];
        $data=$user->field('stuid,username,kind')->where($where)->select();
        $this->assign('list',$data);        
        $this->display('html/class/class.member');
        }else{
            $this->redirect('__ROOT__/index.php/Home/User/showLogin');
        }
    }
    
    public function classMember(){
        if($_POST['submit']=='删除'){
            $user=new Model('user');
            $where['stuid']=$_POST['stuid'];
            $d['class']=null;
            if($user->where($where)->save($d)){
                $this->assign('msg',"班级成员删除成功！");
                $this->display('html/class/msg');
            }else{
                $this->assign('msg',"班级成员删除失败！");
                $this->display('html/class/msg');
            }
    
        }else if($_POST['submit']=='修改'){
            $user=new Model('user');                    
            $where['stuid']=$_POST['stuid'];
            if($user->where($where)->save($_POST['kind'])){
                $this->assign('msg',"班级成员修改成功！");
                $this->display('html/class/msg');
            }else {
                $this->assign('msg',"班级成员修改失败！");
                $this->display('html/class/msg');
            }
    
        }
    
    }
    
   
    
    public function showClassEdit(){
        if($_COOKIE['hbs_kind']==1){
        if(isset($_COOKIE['hbs_class'])){
            $class=$_COOKIE['hbs_class'];
        }
        $class=new Model('classes');
        $where['class']=$class;
        $data=$class->where($where)->select();
        $this->assign($data[0]);
        $this->display('html/class/class.edit');
        }else{
            $this->assign('msg','你不是班委，无权限');
            $this->display('html/class/msg');
        }
    }
    
    public function saveClass(){
        $class=new Model('classes');
        $where['id']=$_COOKIE['hbs_class'];
           if($class->where($where)->save($_POST)){
                $this->assign('msg',"班级信息修改成功！");
                $this->display('html/class/msg');
            }else {
                $this->assign('msg',"班级信息修改失败！");
                $this->display('html/class/msg');
            }   
    }
    
    public function showContact(){
        $user=new Model('user');
        $where['class']=$_COOKIE['hbs_class'];
        $data=$user->where($where)->select();
        $this->assign('list',$data);
        $this->display('html/class/contact');
    }
    
    public function showCourse(){
        $class=new Model('classes');
        $w['id']=$_COOKIE['hbs_class'];
        
        $course=$class->field('course')->where($w)->select();
        $this->assign('course',$course[0]['course']);
        $this->display('html/class/course');
    }
    
    public function showUpload(){

        $this->display('html/class/upload');
    }
    public function classUpload(){
        $info=$this->picUpload();
        $data['course'] = '/Uploads' . substr($info[pic1]['savepath'], 1, strlen($info[pic1]['savepath'])) . $info[pic1]['savename'];
        $data['photo'] = '/Uploads' . substr($info[pic2]['savepath'], 1, strlen($info[pic2]['savepath'])) . $info[pic2]['savename'];
        $cla=new Model('classes');
        $where['id']=$_COOKIE['hbs_class'];
        if($cla->where($where)->save($data)){
            $this->assign('msg','上传成功');
            $this->display('html/class/msg');
            
        }else{
            $this->assign('msg','上传失败');
            $this->display('html/class/msg');
        }
        
    }
    
  public function checkOnly()
    {
        $user = new Model('id');
        $where['id'] = $_POST['id'];
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
    
    public function delFile($file){
        if (unlink($file))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    public function picUpload()
    {
        $upload = new \Think\Upload();
        $upload->maxSize = '4194304'; // 限制大小为4M
        $upload->savePath = './upload/'; // 保存路径建议与主文件平级目录或者平级目录的子目录来保存
        $upload->saveRule = uniqid; // 上传文件的文件名保存规则
        $upload->uploadReplace = true; // 如果存在同名文件是否进行覆盖
        $upload->allowExts = array(
            'jpg',
            'jpeg',
            'png',
            'gif'
        ); // 准许上传的文件类型
        $upload->allowTypes = array(
            'image/png',
            'image/jpg',
            'image/jpeg',
            'image/gif'
        ); // 检测mime类型
        $upload->thumb = true; // 是否开启图片文件缩略图
        $upload->thumbMaxWidth = '360,500';
        $upload->thumbMaxHeight = '200,400';
        $upload->thumbPrefix = 's_,m_'; // 缩略图文件前缀
        $upload->thumbRemoveOrigin = 1; // 如果生成缩略图，是否删除原图
    
        if ($info = $upload->upload()) {
            
            return $info;
        } else {
            $msg = $this->error($upload->getError()); // 专门用来获取上传的错误信息的
          
        }
    }
    
}