<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
use Think\Model;
class IndexController extends Controller {
    public function showMain(){
        $this->mainData();
        $this->display('html/main');
    }
    public function mainData(){
        $dis=new Model('discuss');
        $data=$dis->select();
        $this->assign('list',$data);
        $link['link1']= "location.href='/index.php/Home/Activity/showActDetail?id=qexRXKS8U9QVxLr7P6AV'";
        $link['link2']= "location.href='/index.php/Home/Activity/showActDetail?id=uYV955SpP4KezsZTMwhf'";
        $link['link3']= "location.href='/index.php/Home/Activity/showActDetail?id=zA8mn9Yp4cPbg7UVYYT1'";
        $link['link4']= "location.href='/index.php/Home/Activity/showActDetail?id=aPlKABfw7IYXGPGC1F43'";
        $this->assign($link);
    }
    
    public function showMainM(){
       $this->mainData();
        $this->display('html/main.master');
    }
    
    public function showDiscuss(){
        $dis=new Model('discuss');
        $where['id']=$_GET['id'];
        $data=$dis->where($where)->select();
        $this->assign($data[0]);
        $com=new Model();
        $sql="select hbs_user.username,hbs_comment.* 
            from hbs_user,hbs_comment
            where hbs_user.stuid=hbs_comment.uid AND hbs_comment.part='discuss' AND hbs_comment.pid='".$_GET['id']."'";           
        $list=$com->query($sql);
        $this->assign('list',$list);       
        $this->display('html/discuss');
    }
    
    public function good(){
      $where['id']=$_POST['id'];
      $comment=new Model('comment');
      $data=$comment->where($where)->select();
      $data[0]['good']=$data[0]['good']+1;
      $comment->save($data[0]);
      $this->redirect('__ROOT__/index.php/Home/Index/showDiscuss?id='.$_POST['pid']);
     
    }
    public function comment(){
        if(isset($_COOKIE['hbs_stuid'])){
        $data=$_POST;
        $data['id']=$this->get_random();
        $data['uid']=$_COOKIE['hbs_stuid'];
        date_default_timezone_set("Asia/ShangHai");
        $data['time'] = date('Y-m-s H:i:s'); 
//         $data['part']=$_POST['part'];
//         $data['pid']=$_POST['pid'];  
        $com=new Model('comment');
            
        if ($com->add($data)){
            $this->assign('msg','评论成功');
            $this->display('html/msg');
        }else{
           $this->assign('msg','评论失败');
        $this->display('html/msg');
        }
        }else{
            $this->redirect("__ROOT__/index.php/Home/User/showLogin");
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