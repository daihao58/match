$(function() {
  FastClick.attach(document.body)

  /* ========= 计算 page-container 最小高度 ========= */
  calcPageHeight()
  window.addEventListener('resize', throttle(calcPageHeight, 500))

  /* ========= 头部导航选中交互 ========= */
  $('#topNavMenu').navSlider({
    fx: 'easeOutBack',
    speed: 700
  })

  /* ========= mobile导航 ========= */
  // 显示导航
  $('#btnShowNavMenu').on('click', function(e) {
    e.preventDefault()

    $('.top-nav-menu-mobile').fadeIn()
  })
  // 关闭导航
  $('#btnHideNavMenu').on('click', function(e) {
    e.preventDefault()

    $('.top-nav-menu-mobile').fadeOut()
  })
  // 展开子菜单
  $('.top-nav-menu-mobile .btn-pull-down').on('click', function(e) {
    e.preventDefault()

    $(this).toggleClass('active')
    $(this)
      .siblings('.nav-sub-menu-m')
      .slideToggle()
  })

  /* ========= 倒计时 ========= */
  var endDate = '2020/08/22'
  $('#counter').countup(endDate)
})

// 节流throttle
function throttle(func, delay) {
  var timer = null
  return function() {
    var context = this
    var args = arguments
    if (!timer) {
      timer = setTimeout(function() {
        func.apply(context, args)
        timer = null
      }, delay)
    }
  }
}
function calcPageHeight() {
  var pageH = document.body.clientHeight
  var headerH = $('#pageHeader')[0] ? $('#pageHeader')[0].clientHeight : 0
  var footerH = $('#pageFooter')[0] ? $('#pageFooter')[0].clientHeight : 0

  $('#pageContainer').css('min-height', pageH - headerH - footerH + 'px')
}

// 发送验证码
function handleSendMsgCode(opts) {
  var $el = $(opts.el)
  var dur = opts.duration

  $el.addClass('disabled').html(dur + 's 已发送')
  $el.siblings('input').prop('disabled', true)

  var timer = setInterval(function() {
    dur -= 1
    if (dur === 0) {
      clearInterval(timer)
      $el.removeClass('disabled').html('发送验证码')
      $el.siblings('input').prop('disabled', false)
      return
    }
    $el.html(dur + 's 已发送')
  }, 1000)
}
