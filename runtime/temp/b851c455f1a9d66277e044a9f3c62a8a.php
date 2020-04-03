<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:79:"F:\phpstudy_pro\WWW\match\public/../application/index\view\cases\videolist.html";i:1585534979;s:64:"F:\phpstudy_pro\WWW\match\application\index\view\common\top.html";i:1585534730;s:69:"F:\phpstudy_pro\WWW\match\application\index\view\common\daojishi.html";i:1585539905;s:67:"F:\phpstudy_pro\WWW\match\application\index\view\common\footer.html";i:1585533024;}*/ ?>
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
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn50hiv.min.js"></script>
      <script src="https://oss.maxcdn50min.js"></script>
    <![endif]-->
    <title>精彩活动</title>
  </head>
  <body>
    <div class="page page-media-list">
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
              <div class="video-block white-block">
                <h3 class="t-c">精彩活动</h3>
                <ul class="media-list row">
                  <?php if(is_array($activity) || $activity instanceof \think\Collection || $activity instanceof \think\Paginator): $i = 0; $__LIST__ = $activity;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                  <li class="col-lg-4 col-sm-6 mt-40">
                    <a href="<?php echo url('index/cases/viddetail',['id'=>$vo['id']]); ?>" class="media-item link-block">
                      <div class="img-wrap">
                        <img src="<?php echo $vo['imgurl']; ?>" alt="" />
                      </div>
                      <div class="item-title"><?php echo $vo['title']; ?></div>
                    </a>
                  </li>
                  <?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
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
    <script src="/static/js/navSlider.js"></script>
    <script src="/static/js/common.js"></script>
    <script src="/static/js/countUp.min.js"></script>
    <script src="/static/js/fastclick.js"></script>
    <script src="/static/js/jquery.counter.js"></script>
  </body>
</html>
