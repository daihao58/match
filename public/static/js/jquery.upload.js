;(function($) {
  function init(options) {
    var opts = $.extend(
      {},
      {
        size: 3 * 1024 * 1024,
        limited: false,
        len: 1,
        url: '', //上传路径
        onSuccess: function() {},
        onError: function() {} //失败回调
      },
      options
    )
    var $btnUpload = $(this).find('.upload-button')
    var $list = $(this).find('.uploaded-list')
    var $items = $list.find('.uploaded-item')
    var url = null

    if (opts.limited && $items.length == opts.len) $btnUpload.hide()

    // 上传图片/视频
    $btnUpload.on('change', 'input[type="file"]', function(e) {
      if (!e.target.files.length) return

      var file = e.target.files[0]

      if (file.size > opts.size) {
        alert(
          '图片/视频尺寸不能大于' +
            (opts.size / (1024 * 1024)).toFixed(2) +
            'M!'
        )
        return
      } else {
        submit(file)
      }
      $(this).val('')
    })

    // 删除图片/视频
    $list.on('click', '.btn-close', function(e) {
      e.preventDefault()

      URL.revokeObjectURL(url)
      $(this)
        .parent()
        .off()
        .remove()
      $btnUpload.show()
    })

    // 图片/视频预览
    function preview(file, callback) {
      var $el, isImg
      if (typeof file === 'object') {
        isImg = /image/g.test(file.type)
        url = URL.createObjectURL(new Blob([file]))
      } else {

        isImg = !/mp4/gi.test(file)
        url = file
      }

      $el = isImg
        ? $('<img class="tp_img" src="' + url + '">')
        : $('<video class="tp_vid" src="' + url + '">')

      callback($el)
    }

    // renderDOM
    function render(file) {
      var $li = $('<li class="uploaded-item"><a class="btn-close"></a></li>')

      preview(file, function($el) {
        $el.appendTo($li)
        $li.appendTo($list)
        if (opts.limited && $list.children().length == opts.len) {
          $btnUpload.hide()
        }
      })
    }

    // 图片/视频上传服务器
    function submit(file) {
      if (opts.url) {
        var form = new FormData()
        form.append('file', file)
        $.ajax({
          url: opts.url,
          type: 'POST',
          processData: false, // 用于对data参数进行序列化处理 这里必须false
          contentType: false, // 必须
          data: form,
          success: function(data) {
            opts.onSuccess(data)
            render(data)
          },
          error: function(err) {
            opts.onError(JSON.stringify(err))
          }
        })
      } else {
        console.warn('本地预览, 未上传服务器')
        render(file)
      }
    }
  }

  $.fn.imgUpload = function(options) {
    return this.each(function() {
      init.call(this, options)
    })
  }
})(jQuery)
