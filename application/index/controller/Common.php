<?php

namespace app\index\controller;

use app\common\library\Token;
use think\Db;
use app\common\controller\Frontend;

class Common extends Frontend
{

    protected $noNeedLogin = '*';
    protected $noNeedRight = '*';
    protected $layout = '';

    public function daojishi()
    {
        $data = DB::query("select deadline,title from fa_activity where isopen=1");
        if(empty($data)){
            echo json_encode("查无结果请验证编号");die;
        }
        echo json_encode($data);
    }

}
