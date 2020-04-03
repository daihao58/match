;(function($) {
  var o = {
    d: {
      g: 1000 * 60 * 60 * 24,
      r: 30 * 12
    },
    h: {
      g: 1000 * 60 * 60,
      r: 24
    },
    m: {
      g: 1000 * 60,
      r: 60
    },
    s: {
      g: 1000,
      r: 60
    }
  }

  $.fn.countup = function(endtime) {
    renderDom(this, new Date(endtime))

    var timer = setInterval(function() {
      countdown(new Date(endtime), timer)
    }, 1000)
    return this
  }
  function countdown(endtime, timer) {
    var lefttime = endtime.getTime() - new Date().getTime()
    if (lefttime < 0) {
      clearInterval(timer)
      return
    }

    $.each(['d', 'h', 'm', 's'], function(i) {
      var type = this.toString()
      var timeArr = calcTime(lefttime, type)
      var $times = $('#box-' + type).find('.time-num')

      $times.each(function(i) {
        updateTime($(this), timeArr[i])
      })
    })
  }
  function updateTime($el, num) {
    if ($el.is(':animated') || $el.html() == num) {
      return false
    }
    $el.html(num)
  }
  function renderDom(box, endtime) {
    var lefttime = endtime.getTime() - new Date().getTime()

    if (lefttime < 0) lefttime = 0

    $.each(['d', 'h', 'm', 's'], function(i) {
      var type = this.toString()
      var timeArr = calcTime(lefttime, type)
      var $timeBox = $('#box-' + type)
      var $time = '<b class="time-num"></b>'
      // console.log(calcTime(lefttime, 'M'))
      for (var i = 0; i < timeArr.length; i++) {
        $($time)
          .html(timeArr[i])
          .appendTo($timeBox)
      }
    })
  }
  function calcTime(time, type) {
    var time = Math.floor((time / o[type].g) % o[type].r)
    var timeArr = time.toString().split('')

    if (timeArr.length < 2) {
      timeArr.unshift('0')
    }
    return timeArr
  }
})(jQuery)
