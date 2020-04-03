<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Db;
use app\common\controller\Frontend;

class Kc extends Frontend
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
        $list = Db::name('kc')->where('cat_id',$id)->select();
        $this->assign('list',$list);

        $this->assign('cur','kc');
        return $this->view->fetch();
    }

    public function kcdetail()
    {
        $id = $this->request->param('id');
        $content = Db::name('kc')->where('id',$id)->find()['content'];
        $this->assign('content',$content);
        $this->view->assign('cur','kc');
        return $this->view->fetch();
    }
}