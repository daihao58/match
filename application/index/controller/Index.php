<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Cache;
use think\Db;
use app\common\controller\Frontend;

class Index extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function index()
    {
    	$titles = DB::query("select title,id from fa_newslist where isshow=1");
    	$images = DB::query("select imgurl from fa_imges where isshow=1");
    	$video = DB::query("select * from fa_video where isshow=1");
    	$activity = DB::query("select * from fa_activity");
        
    	$videos = [];
    	foreach ($video as $key => $value) {
    		$videos[$value["showlocation"]] = $value;
    	}
        $this->view->assign('cur','index');
    	$this->view->assign('activity', $activity);
        $this->view->assign('titles', $titles);
        $this->view->assign('images', $images);
        $this->view->assign('videos', $videos);
        return $this->view->fetch();
    }

    public function bm()
    {
        $this->view->assign('cur','');
        return $this->view->fetch();
    }

    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');

        // 移动到框架应用根目录/public/uploads/ 目录下
        if($file){
            $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
            if($info){
                // 成功上传后 获取上传信息
                // 输出 jpg
                //echo $info->getExtension();
                // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
                //echo $info->getSaveName();
                // 输出 42a79759f284b767dfcb2a0197904287.jpg

                echo  '/uploads/' .$info->getSaveName();
            }else{
                // 上传失败获取错误信息
                echo $file->getError();
            }
        }
    }

    public function ajax()
    {
        $phone = $this->request->param('phone');
        $code = $this->request->param('code');
        $old_code = Cache::get($phone);
        if(empty($old_code)){
            $this->error('验证码过期','',$data=array('code'=>501,'msg'=>'验证码过期'));
            die;
        }

        if($code != $old_code){
            $this->error('验证码错误','',$data=array('code'=>501,'msg'=>'验证码错误'));
            die;
        }

        $data['stu_name'] = $this->request->param('stu_name');
        $data['age'] = $this->request->param('age');
        $data['sex'] = $this->request->param('sex');
        $data['birthday'] = $this->request->param('birthday');
        $data['school'] = $this->request->param('school');
        $data['grade'] = $this->request->param('grade');
        $data['hobby'] = $this->request->param('hobby');
        $data['prize'] = $this->request->param('prize');
        $data['par_name'] = $this->request->param('par_name');
        $data['mobile'] = $this->request->param('mobile');
        $data['area'] = $this->request->param('area');
        $data['type'] = $this->request->param('type');
        $data['groupType'] = $this->request->param('groupType');
        $data['worktitle'] = $this->request->param('worktitle');
        $data['phone'] = $phone;
        $video = $this->request->param('video');
        $video = json_decode(html_entity_decode($video));
        $data['video'] = implode(',',$video);

        $img = $this->request->param('img');
        $img = json_decode(html_entity_decode($img));
        $data['img'] = implode(',',$img);

        $activity = Db::name('activity')->where('isopen',1)->find();
        $data['activity_id'] = $activity['id'];
        $data['activity_title'] = $activity['title'];

        $res = Db::name('join')->insert($data);
        if($res){
            return $data=array('code'=>502,'msg'=>'报名成功');
        }else{
            return $data=array('code'=>501,'msg'=>'服务器繁忙');
        }

    }

    public function chaxun()
    {
        $phone = $this->request->param('phone');
        $code = $this->request->param('code');
        $old_code = Cache::get($phone);
        if(empty($old_code)){
            $this->error('验证码过期','',$data=array('code'=>501,'msg'=>'验证码过期'));
            die;
        }

        if($code != $old_code){
            $this->error('验证码错误','',$data=array('code'=>501,'msg'=>'验证码错误'));
            die;
        }

        $activity = Db::name('activity')->where('isopen',1)->find();
        if(!$activity){
            return $data=array('code'=>502,'msg'=>'暂无活动举行');
            die;
        }
        $where['phone'] = $phone;
        $where['activity_id'] = $activity['id'];
        $res = Db::name('join')->where($where)->find();

        if($res){
            return $data=array('code'=>502,'msg'=>'您已报名'.$activity['title']);
        }else{
            return $data=array('code'=>502,'msg'=>'尚未报名'.$activity['title']);
        }

    }

    public function code(){
        $code=rand(1000,9999);
        $mobile = $this->request->param('phone');
        //var_dump($mobile);die;
        Cache::set($mobile,$code,180);
        header('content-type:text/html;charset=utf-8');
        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
        $smsConf = array(
            'key'   => 'ac55487fedb5252c2e6c52eefb75f4b8', //您申请的APPKEY
            'mobile'    => $mobile, //接受短信的用户手机号码
            'tpl_id'    => '209244', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' =>'#code#='.$code //您设置的模板变量，根据实际情况修改
        );

        $content = $this->juhecurl($sendUrl,$smsConf,1); //请求发送短信
        if($content){
            $result = json_decode($content,true);
            $error_code = $result['error_code'];
            if($error_code == 0){
                //状态为0，说明短信发送成功
                //        echo "短信发送成功,短信ID：".$result['result']['sid'];
                echo "短信发送成功";
            }else{
                //状态非0，说明失败
                $msg = $result['reason'];
                //        echo "短信发送失败(".$error_code.")：".$msg;
                echo "短信发送失败";
            }
        }else{
            //返回内容异常，以下可根据业务逻辑自行修改
            echo "请求发送短信失败";
        }
    }

    public function juhecurl($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }
}
