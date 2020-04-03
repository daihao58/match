;(function($, window, document, undefined) {
  function Paging(element, options) {
    this.element = element
    this.options = {
      page: options.page || 1,
      pagesize: options.pagesize,
      total: options.total,
      callback: options.callback,
      up: options.up ? options.up : '上一页',
      down: options.down ? options.down : '下一页'
    }
    this.init()
  }
  Paging.prototype = {
    constructor: Paging,
    init: function() {
      this.creatHtml()
      this.bindEvent()
    },
    creatHtml: function() {
      var _this = this
      var content = ''
      var current = _this.options.page
      var total = Math.ceil(_this.options.total / _this.options.pagesize)
      var up = _this.options.up
      var down = _this.options.down
      var ellipsis = "<li><span class='ellipsis'>. . .</span></li>"
      content += "<li><a id='prePage'>" + up + '</a></li>'
      //总页数大于6时候
      if (total > 6) {
        //当前页数小于5时显示省略号
        if (current < 5) {
          for (var i = 1; i < 6; i++) {
            if (current == i) {
              content += "<li class='active'><span>" + i + '</span></li>'
            } else {
              content += '<li><a>' + i + '</a></li>'
            }
          }
          content += ellipsis
          content += '<li><a>' + total + '</a></li>'
        } else {
          //判断页码在末尾的时候
          if (current < total - 3) {
            for (var i = current - 2; i < current + 3; i++) {
              if (current == i) {
                content += "<li class='active'><span>" + i + '</span></li>'
              } else {
                content += '<li><a>' + i + '</a></li>'
              }
            }
            content += ellipsis
            content += '<li><a>' + total + '</a></li>'
            //页码在中间部分时候
          } else {
            content += '<li><a>1</a></li>'
            content += ellipsis
            for (var i = total - 4; i < total + 1; i++) {
              if (current == i) {
                content += "<li class='active'><span>" + i + '</span></li>'
              } else {
                content += '<li><a>' + i + '</a></li>'
              }
            }
          }
        }
        //页面总数小于6的时候
      } else {
        for (var i = 1; i < total + 1; i++) {
          if (current == i) {
            content += "<li class='active'><span>" + i + '</span></li>'
          } else {
            content += '<li><a>' + i + '</a></li>'
          }
        }
      }

      content += "<li><a id='nextPage'>" + down + '</a></li>'
      _this.element.html(content)

      var $liPre = $('#prePage').parent('li')
      var $liNext = $('#nextPage').parent('li')

      current == 1 ? $liPre.addClass('disabled') : $liPre.removeClass('disabled')
      current == total ? $liNext.addClass('disabled') : $liNext.removeClass('disabled')
    },
    //添加页面操作事件
    bindEvent: function() {
      var _this = this
      var totalPage = Math.ceil(_this.options.total / _this.options.pagesize)
      _this.element.off('click', 'a')
      _this.element.on('click', 'a', function(e) {
        e.preventDefault()

        var num = $(this).html()
        var id = $(this).attr('id')
        var clickable = true

        if (id) {
          switch (id) {
            case 'prePage':
              if (_this.options.page == 1) {
                _this.options.page = 1
                clickable = false
              } else {
                _this.options.page = +_this.options.page - 1
              }
              break
            case 'nextPage':
              if (_this.options.page == totalPage) {
                _this.options.page = totalPage
                clickable = false
              } else {
                _this.options.page = +_this.options.page + 1
              }
              break
            default:
              break
          }
        } else {
          _this.options.page = +num
        }
        _this.creatHtml()
        if (_this.options.callback) {
          if (clickable) {
            _this.options.callback(_this.options.page)
          }
        }
      })
    }
  }
  //通过jQuery对象初始化分页对象
  $.fn.paging = function(options) {
    return new Paging($(this), options)
  }
})(jQuery, window, document)
