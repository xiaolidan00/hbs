<?php
namespace Home\Controller;

use Think\Controller;
use Think\Model;
use Think\Upload;

class ActivityController extends Controller
{

    public function showActAdd()
    {
        $this->display('html/activity/act.add');
    }

    public function actAdd()
    {
        $act = new Model('activity');
        $data = $_POST;
        $data['id'] = $this->get_random();
        $data['class'] = $_COOKIE['hbs_class'];
        $data['mid'] = $_COOKIE['hbs_stuid'];
        date_default_timezone_set("Asia/ShangHai");
        $time = date('Y-m-s H:i:s');
        $data['time'] = $time;
        $info = $this->picUpload();
        $data['pic'] = '/Uploads' . substr($info['pic']['savepath'], 1, strlen($info['pic']['savepath'])) . $info['pic']['savename'];
        
        if ($act->add($data)) {
            
            $this->assign('msg', '发布活动成功');
            $this->display('html/activity/msg');
        } else {
            $this->assign('msg', '发布活动失败');
            $this->display('html/activity/msg');
        }
    }

    public function showActDetail()
    {
        $act = new Model('activity');
        $where['id'] = $_GET['id'];
        $data = $act->where($where)->select();
        $this->assign($data[0]);
        $com = new Model();
        $sql = "select hbs_user.username,hbs_comment.* 
            from hbs_user,hbs_comment
            where hbs_user.stuid=hbs_comment.uid AND hbs_comment.part='activity' AND hbs_comment.pid='" . $_GET['id'] . "'";
        $list = $com->query($sql);
        $this->assign('list', $list);
        $this->display('html/activity/act.detail');
    }

    public function showActList()
    {
        $act = new Model();
        $sql = "select hbs_activity.*,hbs_classes.claname
            FROM hbs_activity,hbs_classes 
            WHERE hbs_activity.class=hbs_classes.id";
        $data = $act->query($sql);
        
        $this->assign('list', $data);
        $this->display('html/activity/act.list');
    }

    public function showInvite()
    {
        if(isset($_COOKIE['hbs_stuid'])){
        $act = new Model('activity');
         $where['class']=$_COOKIE['hbs_class'];
         $actlist = $act->where($where)->select();
         $this->assign('actlist', $actlist);
            
        $cla = new Model('classes');
        $clalist = $cla->select();
        $this->assign('clalist', $clalist);
        $this->display('html/activity/invite');
        }else{
            $this->redirect("__ROOT__/index.php/Home/User/showLogin");
        }
    }

    public function actInvite()
    {
        $invite = new Model('invite');
        $data = $_POST;
        $data['id']=$this->get_random();
        date_default_timezone_set("Asia/ShangHai");
        $time = date('Y-m-s H:i:s');
        $data['time'] = $time;
        $data['mid'] = $_COOKIE['hbs_stuid'];
        $data['class'] = $_COOKIE['hbs_class'];
        if ($invite->add($data)) {
            $this->assign('msg', '邀请成功！');
            $this->display('html/activity/msg');
        } else {
            $this->assign('error', '邀请失败！');
            $this->display('html/activity/msg');
        }
    }

    public function showClasslist()
    {
        $cla = new Model('classes');
        $data = $cla->select();
        $this->assign('list', $data);
        $this->display('html/activity/class.list');
    }

    public function showClassDetail()
    {
        $cla = new Model('classes');
        $where['id'] = $_GET['id'];
        $data = $cla->where($where)->select();
        $act = new Model('activity');
        $where1['class'] = $_GET['id'];
        $act = $act->where($where1)->select();
        
        $com = new Model();
        $sql = "select hbs_user.username,hbs_comment.* 
            from hbs_user,hbs_comment
            where hbs_user.stuid=hbs_comment.uid AND hbs_comment.part='classes' AND hbs_comment.pid='" . $_GET['id'] . "'";
        $list = $com->query($sql);
        $this->assign('list', $list);
        $this->assign('actlist', $act);
        $this->assign($data[0]);
        $this->display('html/activity/class.detail');
    }

    public function showInvCard()
    {
        $invite = new Model();
        $sql="SELECT hbs_invite.*,A.claname As invclass,B.claname As myclass,C.username,C.phone
            FROM hbs_invite,hbs_activity T,hbs_classes A,hbs_classes B,hbs_user C
            WHERE hbs_invite.invited=A.id AND 
             hbs_invite.actid=T.id AND
            T.mid=C.stuid AND
            hbs_invite.class=B.id AND            
            hbs_invite.id='".$_GET['id']."'";        
        $data = $invite->query($sql);
        if($data[0]['invited']==$_COOKIE['hbs_class']){
            $ans=true;
            $this->assign('ans',$ans);
        }
        
        $this->assign($data[0]);
        $this->display('html/activity/inv.card');
    }

    public function showInvStatus()
    {
        $invite = new Model();
        $sql="SELECT hbs_invite.*,hbs_classes.claname
            FROM hbs_invite,hbs_classes
            WHERE hbs_invite.invited=hbs_classes.id AND            
            hbs_invite.class='".$_COOKIE['hbs_class']."'
            ";
        
        $data = $invite->query($sql);
        $this->assign('list', $data);
        $this->display('html/activity/inv.status');
    }
    
    public function showInvAnswer()
    {
        $invite = new Model();
        $sql="SELECT hbs_invite.*,hbs_classes.claname
            FROM hbs_invite,hbs_classes
            WHERE hbs_invite.invited=hbs_classes.id AND
           hbs_invite.invited='".$_COOKIE['hbs_class']."'";
    
        $data = $invite->query($sql);
        $this->assign('list', $data);
        $this->display('html/activity/inv.status');
    }

    public function actInvAnswer()
    {
        $invite = new Model('invite');
        $where['id'] = $_POST['id'];
        $data['status'] = $_POST['status'];
        if ($invite->where($where)->save($data)) {
            $this->assign('msg', '回复成功');
            $this->display('html/activity/msg');
        } else {
            $this->assign('msg', '回复成功');
            $this->display('html/activity/msg');
        }
    }

    public function showRecAdd()
    {
        
        $act=new Model('activity');
        $where['class']=$_COOKIE['hbs_class'];
        $actlist=$act->where($where)->select();
        $this->assign('actlist',$actlist);
        $this->display('html/activity/rec.add');
    }

    public function actRecAdd()
    {        
        $record = new Model('record');
                
        $data = $_POST;
        $data['id']=$this->get_random();
        $data['class']=$_COOKIE['hbs_class'];
        $data['uid']=$_COOKIE['hbs_stuid'];
        date_default_timezone_set("Asia/ShangHai");
        $time = date('Y-m-s H:i:s');
        $data['time'] = $time;
        $info = $this->picUpload();
        $data['pic1'] = '/Uploads' . substr($info[pic1]['savepath'], 1, strlen($info[pic1]['savepath'])) . $info[pic1]['savename'];
        $data['pic2'] = '/Uploads' . substr($info[pic2]['savepath'], 1, strlen($info[pic2]['savepath'])) . $info[pic2]['savename'];
        $data['pic3'] = '/Uploads' . substr($info[pic3]['savepath'], 1, strlen($info[pic3]['savepath'])) . $info[pic3]['savename'];
        $data['pic4'] = '/Uploads' . substr($info[pic4]['savepath'], 1, strlen($info[pic4]['savepath'])) . $info[pic4]['savename'];
        
        if ($result = $record->add($data)) {           
            $this->assign('msg', '发布成功');
            $this->display('html/activity/msg');
        } else {
            $this->assign('msg', '发布失败');
            $this->display('html/activity/msg');
        }
    }

    public function showRecList()
    {
        $rec = new Model();
        $sql = "select hbs_record.*,hbs_classes.claname
            FROM hbs_record,hbs_classes
            WHERE hbs_record.class=hbs_classes.id";
        $data = $rec->query($sql);
        
        $this->assign('list', $data);
        $this->display("html/activity/rec.list");
    }

    public function showRecDetail()
    {
        $record = new Model();
        $rec="select hbs_record.*,hbs_classes.claname,hbs_user.username
            from hbs_record,hbs_classes,hbs_user
            where hbs_record.uid=hbs_user.stuid AND hbs_record.class=hbs_classes.id
            AND hbs_record.id='".$_GET['id']."'";       
        $data = $record->query($rec);
        $this->assign($data[0]);
        $com = new Model();
        $sql = "select hbs_user.username,hbs_comment.*
            from hbs_user,hbs_comment
            where hbs_user.stuid=hbs_comment.uid AND hbs_comment.part='record' AND hbs_comment.pid='" . $_GET['id'] . "'";
        $list = $com->query($sql);
        $this->assign('list', $list);
        $this->display('html/activity/rec.detail');
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

    public function good()
    {
        $good = new Model($_POST['part']);
        $where['id'] = $_POST['id'];
        $result = $good->where($where)->select();
        $data['good'] = $result['good'] + 1;
        if ($good->where($where)->save($data)) {
            $this->assign('msg', '点赞成功');
            $this->display('html/activity/msg');
        } else {
            $this->assign('msg', '点赞失败');
            $this->display('html/activity/msg');
        }
    }

    public function comment()
    {
        if (isset($_COOKIE['hbs_stuid'])) {
            $data = $_POST;
            $data['id'] = $this->get_random();
            $data['uid'] = $_COOKIE['hbs_stuid'];
            date_default_timezone_set("Asia/ShangHai");
            $data['time'] = date('Y-m-s H:i:s');
            $comment = new Model('comment');
            if ($comment->add($data)) {
                $this->assign('msg', '评论成功');
                $this->display('html/activity/msg');
            } else {
                $this->assign('msg', '评论失败');
                $this->display('html/activity/msg');
            }
        } else {
            $this->redirect("__ROOT__/index.php/Home/User/showLogin");
        }
    }

    public function get_random()
    {
        $length = 20;
        $chars = '123456789abcdefghijklmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ';
        $hash = '';
        $max = strlen($chars) - 1;
        for ($i = 0; $i < $length; $i ++) {
            $hash .= $chars[mt_rand(0, $max)];
        }
        return $hash;
    }
}