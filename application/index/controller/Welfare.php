<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Db;
use app\common\controller\Frontend;

class Welfare extends Frontend
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
        $titles = Db::name('welfare')->select();
        $this->view->assign('titles', $titles);
        $this->assign('cur','welfare');
        return $this->view->fetch();
    }

    public function detail()
    {
        $id = $this->request->param('id');
        $content = Db::name('welfare')->where('id',$id)->find()['newdetails'];
        $this->assign('content',$content);
        $this->view->assign('cur','welfare');
        return $this->view->fetch();
    }
}