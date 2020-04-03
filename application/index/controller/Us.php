<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Db;
use app\common\controller\Frontend;

class Us extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function formsearch()
    {
        return $this->view->fetch();
    }



    public function index()
    {
        $id = $this->request->param('id');
        $content = Db::name('us')->where('id',$id)->find()['content'];
        $this->assign('content',$content);
        $this->assign('cur','us');
        return $this->view->fetch();
    }
}