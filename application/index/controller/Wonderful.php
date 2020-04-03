<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Db;
use app\common\controller\Frontend;

class Wonderful extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';



    public function index()
    {
        $activity = DB::query("select * from fa_wonderful");
        $this->view->assign('activity', $activity);
        $this->view->assign('cur','wonder');
        return $this->view->fetch();
    }

    public function detail()
    {
        $id = $this->request->param('id');
        $content = Db::name('wonderful')->where('id',$id)->find()['content'];
        $this->assign('content',$content);
        $this->view->assign('cur','wonder');
        return $this->view->fetch();
    }
}