<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:72:"F:\phpstudy_pro\WWW\match\public/../application/index\view\index\bm.html";i:1585536256;s:64:"F:\phpstudy_pro\WWW\match\application\index\view\common\top.html";i:1585534730;s:69:"F:\phpstudy_pro\WWW\match\application\index\view\common\daojishi.html";i:1585539905;s:67:"F:\phpstudy_pro\WWW\match\application\index\view\common\footer.html";i:1585533024;}*/ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1" />
    <meta name="renderer" content="webkit" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    />
    <link rel="stylesheet" href="/static/css/iconfont/iconfont.css" />
    <link rel="stylesheet" href="/static/css/style.css" />
    <link rel="stylesheet" href="/static/css/dialog.css" />
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn50hiv.min.js"></script>
      <script src="https://oss.maxcdn50min.js"></script>
    <![endif]-->
    <title>赛事报名</title>
  </head>
  <body>
    <div class="page page-search">
      <!-- header -->
            <header id="pageHeader" class="page-header">
        <!-- 头部宣传 -->
        <div class="top-banner">
          <div class="container">
            <img class="logo mt-20" src="/static/img/logo.png" alt="婉珠艺教" />
            <img
              class="slogan"
              src="/static/img/slogan.png"
              alt="孩子总有一面是天才"
            />
            <img class="cloud" src="/static/img/bg-cloud.png" alt="云" />
          </div>
        </div>
        <!-- pc导航 -->
        <nav class="top-nav">
          <div class="container cf">
            <ul id="topNavMenu" class="top-nav-menu fl">
              <li class="nav-item <?php if($cur == 'index'): ?>cur<?php endif; ?> ">
                <a href="<?php echo url('/'); ?>" class="nav-link">首页</a>
              </li>
              <li class="nav-item <?php if($cur == 'match'): ?>cur<?php endif; ?> ">
                <a class="nav-link">赛事详情</a>
                <ul class="nav-sub-menu">
                  <?php if(is_array($activelist) || $activelist instanceof \think\Collection || $activelist instanceof \think\Paginator): $i = 0; $__LIST__ = $activelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <li class="nav-sub-item"><a href="<?php echo url('index/cases/match',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
              </li>
              <li class="nav-item <?php if($cur == 'videolist'): ?>cur<?php endif; ?> ">
                <a href="<?php echo url('index/cases/videolist'); ?>" class="nav-link">精彩活动</a>

              </li>
              <li class="nav-item <?php if($cur == 'newslist'): ?>cur<?php endif; ?> ">
                <a href="<?php echo url('index/cases/newslist'); ?>" class="nav-link">新闻&媒体</a>
              </li>


              <!--<li class="nav-item">
                <a href="<?php echo url('index/cases/videolist'); ?>" class="nav-link">精品课程</a>
              </li>-->
              <li class="nav-item <?php if($cur == 'kc'): ?>cur<?php endif; ?> ">
                <a class="nav-link">精品课程</a>
                <ul class="nav-sub-menu">
                  <?php if(is_array($kccat) || $kccat instanceof \think\Collection || $kccat instanceof \think\Paginator): $i = 0; $__LIST__ = $kccat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <li class="nav-sub-item">
                    <a href="<?php echo url('index/kc/index',['id'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a>
                    <ul class="nav-ter-menu">
                      <?php if(empty($vo['children']) || (($vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator ) && $vo['children']->isEmpty())): else: if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <li class="nav-ter-item">
                          <a href="<?php echo url('index/kc/index',['id'=>$v['id']]); ?>"><?php echo $v['name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                    </ul>
                  </li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                  <!--<li class="nav-sub-item">
                    <a href="">系统1</a>
                    <ul class="nav-ter-menu">
                      <li class="nav-ter-item"><a href="">三级导航</a></li>
                      <li class="nav-ter-item"><a href="">三级导航</a></li>
                    </ul>
                  </li>
                  <li class="nav-sub-item">
                    <a href="">系统2</a>
                    <ul class="nav-ter-menu">
                      <li class="nav-ter-item"><a href="">三级导航</a></li>
                    </ul>
                  </li>-->
                </ul>
              </li>


              <li class="nav-item <?php if($cur == 'welfare'): ?>cur<?php endif; ?>  ">
                <a href="<?php echo url('welfare/index'); ?>" class="nav-link">公益服务</a>
              </li>

              <li class="nav-item <?php if($cur == 'ysby'): ?>cur<?php endif; ?> ">
                <a href="<?php echo url('index/perform/index'); ?>" class="nav-link">影视表演</a>
              </li>

              <li class="nav-item <?php if($cur == 'us'): ?>cur<?php endif; ?> ">
                <a class="nav-link">联系我们</a>
                <ul class="nav-sub-menu">
                  <?php if(is_array($us) || $us instanceof \think\Collection || $us instanceof \think\Paginator): $i = 0; $__LIST__ = $us;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <li class="nav-sub-item"><a href="<?php echo url('index/us/index',['id'=>$vo['id']]); ?>"><?php echo $vo['title']; ?></a></li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
              </li>
            </ul>
            <!--<div class="fr">
              <a href="#" class="iconfont icon-search"></a>
            </div>-->
          </div>
        </nav>
        <!-- mobile导航 -->
        <nav class="top-nav-mobile">
          <a id="btnShowNavMenu" class="iconfont icon-show-nav"></a>
          <div class="top-nav-menu-mobile">
            <div class="top-nav-menu-content">
              <a id="btnHideNavMenu" class="iconfont icon-close"></a>
              <ul>
                <li class="nav-item-m">
                  <a href="<?php echo url('/'); ?>" class="nav-link-m">首页</a>
                </li>
                <li class="nav-item-m">
                  <a href="#" class="nav-link-m">赛事报名</a>
                  <a class="btn-pull-down iconfont icon-arrow"></a>
                  <ul class="nav-sub-menu-m">
                    <?php if(is_array($activelist) || $activelist instanceof \think\Collection || $activelist instanceof \think\Paginator): $i = 0; $__LIST__ = $activelist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li>
                      <a href="<?php echo url('index/cases/match',['id'=>$vo['id']]); ?>" class="nav-link-m"><?php echo $vo['title']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>



                </li>
                <li class="nav-item-m">
                  <a href="<?php echo url('index/cases/videolist'); ?>" class="nav-link-m">精彩活动</a>

                </li>
                <li class="nav-item-m">
                  <a href="<?php echo url('index/cases/newslist'); ?>" class="nav-link-m">新闻&媒体</a>
                </li>
                <li class="nav-item-m">
                  <a class="nav-link-m">精品课程</a>
                  <a class="btn-pull-down iconfont icon-arrow"></a>
                  <!-- 二级导航 -->
                  <ul class="nav-sub-menu-m">
                    <?php if(is_array($kccat) || $kccat instanceof \think\Collection || $kccat instanceof \think\Paginator): $i = 0; $__LIST__ = $kccat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li class="nav-item-m">
                      <a href="<?php echo url('index/kc/index',['id'=>$vo['id']]); ?>" class="nav-link-m"><?php echo $vo['name']; ?></a>
                      <?php if(empty($vo['children']) || (($vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator ) && $vo['children']->isEmpty())): else: ?>
                      <a class="btn-pull-down iconfont icon-arrow"></a>
                      <?php endif; ?>

                      <!-- 三级导航 -->
                      <ul class="nav-sub-menu-m">
                        <?php if(empty($vo['children']) || (($vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator ) && $vo['children']->isEmpty())): else: if(is_array($vo['children']) || $vo['children'] instanceof \think\Collection || $vo['children'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['children'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                        <li class="nav-sub-item-m">
                          <a href="<?php echo url('index/kc/index',['id'=>$v['id']]); ?>" class="nav-link-m"><?php echo $v['name']; ?></a>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; endif; ?>
                      </ul>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>
                </li>

                <li class="nav-item-m">
                  <a href="<?php echo url('welfare/index'); ?>" class="nav-link-m">公益服务</a>
                </li>

                <li class="nav-item-m">
                  <a href="<?php echo url('index/perform/index'); ?>" class="nav-link-m">公益服务</a>
                </li>

                <li class="nav-item-m">
                  <a href="#" class="nav-link-m">联系我们</a>
                  <a class="btn-pull-down iconfont icon-arrow"></a>
                  <ul class="nav-sub-menu-m">
                    <?php if(is_array($us) || $us instanceof \think\Collection || $us instanceof \think\Paginator): $i = 0; $__LIST__ = $us;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                    <li>
                      <a href="<?php echo url('index/us/index',['id'=>$vo['id']]); ?>" class="nav-link-m"><?php echo $vo['title']; ?></a>
                    </li>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                  </ul>

                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- container -->
      
      <!-- container -->
      <section id="pageContainer" class="page-container">
        <div class="container">
          <div class="row">
            <!-- 新闻列表 -->
            <div class="col-lg-9 col-sm-12 mt-bk">
              <div class="apply-block white-block">
                <form action="" class="form-block">
                  <!-- 选手信息 -->
                  <div>
                    <h3 class="t-c">选手信息</h3>
                    <ul class="form-group">
                      <li class="form-item">
                        <label class="form-label">选手姓名</label>
                        <input class="form-inp" name="stu_name" id="stu_name" type="text" />
                      </li>
                      <li class="form-item">
                        <label class="form-label">选手年龄</label>
                        <input class="form-inp" name="age" id="age" type="number" />
                      </li>
                      <li class="form-item">
                        <span class="form-label">选手性别</span>
                        <div class="mt-15">
                          <label class="radio">
                            <input name="sex" value="1" type="radio" checked />
                            <i class="radio-box"></i>
                            <span>男</span>
                          </label>
                          <label class="radio">
                            <input name="sex" value="2" type="radio" />
                            <i class="radio-box"></i>
                            <span>女</span>
                          </label>
                        </div>
                      </li>
                      <li class="form-item">
                        <label class="form-label">出生日期</label>
                        <input class="form-inp" name="birthday" id="birthday" type="text" />
                      </li>
                      <li class="form-item">
                        <label class="form-label">所在学校</label>
                        <input class="form-inp" name="school" id="school" type="text" />
                      </li>
                      <li class="form-item">
                        <label class="form-label">所在年级</label>
                        <input class="form-inp" name="grade" id="grade" type="text" />
                      </li>
                      <li class="form-item">
                        <label class="form-label">兴趣爱好</label>
                        <input class="form-inp" name="hobby" id="hobby" type="text" />
                      </li>
                      <li class="form-item">
                        <label class="form-label">曾获得奖项</label>
                        <input class="form-inp" name="prize" id="prize" type="text" />
                      </li>
                    </ul>
                  </div>
                  <!-- 家长信息 -->
                  <div class="mt-50">
                    <h3 class="t-c">家长信息</h3>
                    <ul class="form-group">
                      <li class="form-item">
                        <label class="form-label">家长姓名</label>
                        <input class="form-inp" name="par_name" id="par_name" type="text" />
                      </li>
                      <li class="form-item">
                        <label class="form-label">家长联系方式</label>
                        <input class="form-inp" name="mobile" id="mobile" type="tel" />
                      </li>
                    </ul>
                  </div>
                  <!-- 参赛信息 -->
                  <div class="mt-50">
                    <h3 class="t-c">参赛信息</h3>
                    <ul class="form-group">
                      <li class="form-item">
                        <span class="form-label">参赛地区</span>
                        <ul class="row row-2 mt-15">
                          <li class="col-lg-3 col-sm-4">
                            <label class="radio">
                              <input name="area" value="宿城区" type="radio" checked />
                              <i class="radio-box"></i>
                              <span>宿城区</span>
                            </label>
                          </li>
                          <li class="col-lg-3 col-sm-4">
                            <label class="radio">
                              <input name="area" value="宿豫区" type="radio" />
                              <i class="radio-box"></i>
                              <span>宿豫区</span>
                            </label>
                          </li>
                          <li class="col-lg-3 col-sm-4">
                            <label class="radio">
                              <input name="area" value="泗阳县" type="radio" />
                              <i class="radio-box"></i>
                              <span>泗阳县</span>
                            </label>
                          </li>
                          <li class="col-lg-3 col-sm-4">
                            <label class="radio">
                              <input name="area" value="沭阳县" type="radio" />
                              <i class="radio-box"></i>
                              <span>沭阳县</span>
                            </label>
                          </li>
                          <li class="col-lg-3 col-sm-4">
                            <label class="radio">
                              <input name="area" value="泗洪县" type="radio" />
                              <i class="radio-box"></i>
                              <span>泗洪县</span>
                            </label>
                          </li>
                        </ul>
                      </li>
                      <li class="form-item">
                        <span class="form-label">参赛类别</span>
                        <ul id="typeForm" class="row row-2 mt-15">
                          <li class="col-lg-3 col-sm-4">
                            <label class="radio">
                              <input name="type" value="1" type="radio" checked />
                              <i class="radio-box"></i>
                              <span>个人</span>
                            </label>
                          </li>
                          <li class="col-lg-9 col-sm-12">
                            <label class="radio">
                              <input
                                      id="isGroupRadio"
                                      name="type"
                                      type="radio"
                              />
                              <i class="radio-box"></i>
                              <span>组合需填写人数</span>
                            </label>
                            <input
                                    id="membersNum"
                                    class="inp-line"
                                    type="text"
                            />
                          </li>
                        </ul>
                      </li>
                      <li class="form-item">
                        <span class="form-label">参赛组别</span>
                        <ul class="mt-15">
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="学前组4-6岁" type="radio" checked />
                              <i class="radio-box"></i>
                              <span>学前组4-6岁</span>
                            </label>
                          </li>
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="小学A组 7周岁—8周岁，小学一、二年级" type="radio" />
                              <i class="radio-box"></i>
                              <span>小学A组 7周岁—8周岁，小学一、二年级</span>
                            </label>
                          </li>
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="小学B组：9周岁—10周岁，小学三、四年级" type="radio" />
                              <i class="radio-box"></i>
                              <span>小学B组：9周岁—10周岁，小学三、四年级</span>
                            </label>
                          </li>
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="小学C组：11周岁—12周岁，小学五、六年级" type="radio" />
                              <i class="radio-box"></i>
                              <span>小学C组：11周岁—12周岁，小学五、六年级</span>
                            </label>
                          </li>
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="初中组：13周岁—16周岁。初中一年级至初中三年级" type="radio" />
                              <i class="radio-box"></i>
                              <span>初中组：13周岁—16周岁。初中一年级至初中三年级</span>
                            </label>
                          </li>
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="高中组：16周岁—18周岁，高中一年级至三年级" type="radio" />
                              <i class="radio-box"></i>
                              <span>高中组：16周岁—18周岁，高中一年级至三年级</span>
                            </label>
                          </li>
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="组合组：4周岁—18周岁（2-30人/组合），幼儿园中班至高中" type="radio" />
                              <i class="radio-box"></i>
                              <span>组合组：4周岁—18周岁（2-30人/组合），幼儿园中班至高中</span>
                            </label>
                          </li>
                          <li class="mt-15">
                            <label class="radio">
                              <input name="groupType" value="海外组：4周岁—18周岁，(持非内地居民身份证报名的选手)幼儿园中班至高中" type="radio" />
                              <i class="radio-box"></i>
                              <span>海外组：4周岁—18周岁，(持非内地居民身份证报名的选手)幼儿园中班至高中</span>
                            </label>
                          </li>
                        </ul>
                      </li>
                      <li class="form-item">
                        <label class="form-label">作品名称及形式</label>
                        <input class="form-inp" name="worktitle" id="worktitle" type="text" />
                      </li>
                      <li class="form-item">
                        <label class="form-label">参赛视频 (小于50M,MP4格式)</label>
                        <div id="uploadVideo" class="module-upload-img mt-15">
                          <ul class="uploaded-list"></ul>
                          <!-- 上传文件按钮 -->
                          <label class="upload-button">
                            <input type="file" name="video" id="video" accept="video/mp4" />
                            <span class="upload-btn-icon"
                            ><i class="icon-add"></i
                            ></span>
                          </label>
                        </div>
                      </li>
                      <li class="form-item">
                        <label class="form-label">一寸照片 (白底小于200K)</label>
                        <div id="uploadPic" class="module-upload-img mt-15">
                          <ul class="uploaded-list"></ul>
                          <!-- 上传文件按钮 -->
                          <label class="upload-button">
                            <input type="file" name="img" id="img" accept="image/jpg,image/jpeg,image/png"/>
                            <span class="upload-btn-icon"
                            ><i class="icon-add"></i
                            ></span>
                          </label>
                        </div>
                      </li>
                      <li class="form-item">
                        <label class="form-label">手机号</label>
                        <input class="form-inp" name="phone" id="phone" type="tel" />
                        <a id="btnSendMsgCode" class="btn-msg-code"
                        >发送验证码</a
                        >
                      </li>
                      <li class="form-item">
                        <label class="form-label">验证码</label>
                        <input class="form-inp" name="code" id="code" type="tel" />
                      </li>
                    </ul>
                  </div>
                  <!-- 提交按钮 -->
                  <div class="t-c mt-50">
                    <div class="btn btn-primary tijiao">提交</div>
                  </div>
                </form>
              </div>
            </div>
            <!-- 倒计时/报名入口 -->
                        <div id="counterBlock" class="col-lg-3 col-sm-12 mt-bk">
              <!-- 倒计时 -->
              <div class="counter-block">
                <h3 id="Atitle">暂无活动</h3>
                <div class="mt-5 font-18" id="Atime">()</div>
                <ul id="counter" class="counter">
                  <li class="counter-item">
                    <div class="time-box" id="_d">12</div>
                    <span>天</span>
                  </li>
                  <li class="counter-item">
                    <div class="time-box" id="_h">05</div>
                    <span>时</span>
                  </li>
                  <li class="counter-item">
                    <div class="time-box" id="_m">43</div>
                    <span>分</span>
                  </li>
                  <li class="counter-item">
                    <div class="time-box" id="_s">33</div>
                    <span>秒</span>
                  </li>
                </ul>
              </div>
              <!-- 报名入口 -->
              <div class="entrance-block">
                <ul class="row">
                  <li class="col-lg-12 col-sm-6">
                    <a href="<?php echo url('index/needknow/index'); ?>" class="link-entrance mt-25">
                      <i class="iconfont icon-ticket"></i>
                      赛事报名
                    </a>
                  </li>
                  <li class="col-lg-12 col-sm-6">
                    <a href="<?php echo url('index/cases/formSearch'); ?>" class="link-entrance mt-25">
                      <i class="iconfont icon-search"></i>
                      报名查询
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <script type="text/javascript" src='/assets/libs/jquery/dist/jquery.min.js'></script>
            <script>
            $.ajax({
              url:"<?php echo url('Common/daojishi'); ?>",
              dataType:'json',//服务器返回json格式数据
              type:'get',//HTTP请求类型
              timeout:10000,//超时时间设置为10秒；
              headers:{'Content-Type':'application/json'},                  
              success:function(data){
                var time = data[0].deadline;
                $("#Atitle").text(data[0].title+"活动倒计时");
                $("#Atime").text(time);
                countTime()
                function countTime() {  
                  //获取当前时间  
                  var date = new Date();  
                  var now = date.getTime();  
                  //设置截止时间  
                  var str=time;
                  var endDate = new Date(str);
                  var end = endDate.getTime();  
                  //时间差  
                  var leftTime = end-now; 
                  if (leftTime > 0) {
                    //定义变量 d,h,m,s保存倒计时的时间  
                    var d,h,m,s;  
                    if (leftTime>=0) {  
                        d = Math.floor(leftTime/1000/60/60/24);  
                        h = Math.floor(leftTime/1000/60/60%24);  
                        m = Math.floor(leftTime/1000/60%60);  
                        s = Math.floor(leftTime/1000%60);                     
                    }
                    //将倒计时赋值到div中  
                    document.getElementById("_d").innerHTML = d;  
                    document.getElementById("_h").innerHTML = h;  
                    document.getElementById("_m").innerHTML = m;  
                    document.getElementById("_s").innerHTML = s;  
                    //递归每秒调用countTime方法，显示动态时间效果  
                    setTimeout(countTime,1000);  
                  }else{
                    document.getElementById("_d").innerHTML = 0;  
                    document.getElementById("_h").innerHTML = 0;  
                    document.getElementById("_m").innerHTML = 0;  
                    document.getElementById("_s").innerHTML = 0;  
                  }
                }
              }
            })
            </script>
          </div>
        </div>
      </section>
      <!-- footer -->
      <footer id="pageFooter" class="page-footer">
        <div class="container">
          <!-- logo -->
          <img class="logo" src="/static/img/logo2.png" />
          <!-- info -->
          <div class="footer-info mt-30">
            <ul class="footer-info-l">
              <li>服务热线：0527-81885568</li>
              <li>咨询邮箱：wanzhuart@163.com</li>
              <li>地 址：江苏省宿迁市宿城区宝龙广场3楼</li>
            </ul>
            <ul class="footer-info-r">
              <li><a href="http://www.xiuqiangedu.com">秀强教育网站</a></li>
              <!--<li><a href="#">关工委网站</a></li>-->
              <!--<li><a href="#">迅哥有约网站</a></li>-->
            </ul>
          </div>
          <!-- 二维码 -->
          <div class="footer-qr">
            <div class="qr-item">
              <div class="qr-img-wrap">
                <img src="/static/img/gongzhonghao.png" alt="公众号" />
              </div>
              <div class="mt-10">公众号</div>
            </div>
            <div class="qr-item">
              <div class="qr-img-wrap">
                <img src="/static/img/kefu.jpg" alt="客服" />
              </div>
              <div class="mt-10">客服</div>
            </div>
          </div>
        </div>
      </footer>
      <script type="text/javascript" src='/assets/libs/jquery/dist/jquery.min.js'></script>
    </div>


    <script src="/static/js/jquery-3.3.1.min.js"></script>
    <!-- FastClick -->
    <script src="/static/js/fastclick.js"></script>
    <!-- nav-menu -->
    <script src="/static/js/navSlider.js"></script>
    <!-- counter -->
    <script src="/static/js/jquery.counter.js"></script>
    <!-- common -->
    <script src="/static/js/common.js"></script>
    <!-- upload -->
    <script src="/static/js/jquery.upload.js"></script>

    <script src="/static/js/zepto.min.js"></script>
    <script src="/static/js/dialog.js"></script>

    <script>
      $(function() {
        // 参赛类型 -- 选择组合
        !$('#isGroupRadio').prop('checked') &&
        $('#membersNum').prop('disabled', true)

        $('#typeForm input[type="radio"]').on('click', function() {
          var id = $(this).prop('id')
          var checked = $(this).prop('checked')
          var disabled = !(id === 'isGroupRadio' && checked)

          $('#membersNum').prop('disabled', disabled)
        })

        // 上传参赛视频
        $('#uploadVideo').imgUpload({
          size: 30 * 1024 * 1024,
          limited: false,
          url: "<?php echo url('index/index/upload'); ?>", //上传路径
          onSuccess: function(id) {
            //
          },
          onError: function(err) {
            alert(err)
          } //失败回调
        })

        // 上传一寸照片
        $('#uploadPic').imgUpload({
          limited: true,
          len: 1,
          url: "<?php echo url('index/index/upload'); ?>", //上传路径
          onSuccess: function(id) {
           //
          },
          onError: function(err) {
            alert(err)
          } //失败回调
        })

        // 视频预览
        $('#uploadVideo').on('click', 'video', function() {
          var $popup = $(
                  '<div class="popup"><a class="popup-close"><i class="icon-close"></i></a></div>'
          )
          var $popcon = $('<div class="popup-content"></div>')
          var $video = $('<video controls src="' + this.src + '">')

          $popcon.append($video)
          $popup.append($popcon).appendTo('.page')
          $video[0].play()
        })

        // 预览照片
        $('#uploadPic').on('click', 'img', function() {
          var $popup = $(
                  '<div class="popup"><a class="popup-close"><i class="icon-close"></i></a></div>'
          )
          var $popcon = $('<div class="popup-content"></div>')
          var $img = $('<img src="' + this.src + '">')

          $img.appendTo($popcon)
          $popup.append($popcon).appendTo('.page')
        })

        // 关闭预览
        $('.page').on('click', '.popup-close', function(e) {
          e.preventDefault()

          $('.popup').remove()
        })

        // 发送验证码
        $('#btnSendMsgCode').on('click', function(e) {
          e.preventDefault()
          var el = this
          handleSendMsgCode({
            el: el,
            duration: 60
          })
           $.ajax({
             url: "<?php echo url('index/index/code'); ?>",
             type: 'POST',
             dataType:"json",
             data:{
               phone : $("#phone").val(),
             },
             success: function(data) {
             },
             error: function(err) {
               //alert(err)
             }
           })
        })
      })


      $(".tijiao").on('click',function(){
        var stu_name = $("#stu_name").val();
        var age = $("#age").val();
        var sex = $("input[name='sex']:checked").val();

        var birthday = $("#birthday").val();
        var school = $("#school").val();
        var grade = $("#grade").val();
        var hobby = $("#hobby").val();
        var prize = $("#prize").val();
        var par_name = $("#par_name").val();
        var mobile = $("#mobile").val();

        var area = $("input[name='area']:checked").val();

        var type = $("input[name='type']:checked").val();
        var membersNum = $("#membersNum").val();

        var groupType = $("input[name='groupType']:checked").val();

        var worktitle = $("#worktitle").val();

        var phone = $("#phone").val();
        var code = $("#code").val();


        if(type == 'on'){
          type = membersNum;
        }



        var video = new Array();
        $(".tp_vid").each(function() {
          video.push($(this).attr("src"));
        });
        var img = new Array();
        $(".tp_img").each(function() {
          img.push($(this).attr("src"));
        });





        $.ajax({
          url:"<?php echo url('index/index/ajax'); ?>",
          type: 'POST',
          //processData: false, // 用于对data参数进行序列化处理 这里必须false
          //contentType: false, // 必须
          traditional:true,
          dataType:"json",
          data: {
            'stu_name': stu_name,
            'age': age,
            'sex': sex,
            'birthday': birthday,
            'school': school,
            'grade': grade,
            'hobby': hobby,
            'prize': prize,
            'par_name': par_name,
            'mobile': mobile,
            'area': area,
            'type': type,
            'groupType': groupType,
            'worktitle': worktitle,

            'video' : JSON.stringify(video),
            'img' : JSON.stringify(img),

            'phone': phone,
            'code': code,
          },
          success: function(data) {

            if(data.code == 502){
              var dialog1 = $(document).dialog({
                content: data.msg,
              });
            }else{
              var dialog1 = $(document).dialog({
                content: data.msg,
              });
            }
          },
          error: function(err) {

          }
        })
      })

    </script>
  </body>
</html>
