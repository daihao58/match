;(function($) {
  $.fn.navSlider = function(o) {
    o = $.extend(
      {
        fx: 'easeOutQuad',
        speed: 500,
        click: function() {}
      },
      o || {}
    )
    return this.each(function() {
      var b = $(this),
        $line = $('<li class="nav-line"><div class="left"></div></li>').appendTo(b),
        $li = $('.nav-item', this)
      //cur = $(".nav-item.cur", this)[0] || $($li[0]).addClass("cur")[0];
      var cur = $('.nav-item.cur', this)[0] || $li[0],
        isNavItem = !!$('.nav-item.cur', this)[0]

      function showLine() {
        isNavItem ? '' : $line.show()
      }

      function hideLine() {
        isNavItem ? '' : $line.hide()
      }

      function noop() {}

      hideLine()

      $li.hover(function() {
        move(this)
      }, noop)

      $(this).hover(
        function() {
          showLine()
        },
        function() {
          move(cur)
          hideLine()
        }
      )

      $li.click(function(e) {
        setCur(this)
        return o.click.apply(this, [e, this])
      })

      setCur(cur)

      function setCur(a) {
        $line.css({
          left: a.offsetLeft + 'px',
          width: a.offsetWidth + 'px'
        })
        cur = a
      }

      function move(a) {
        $line
          .each(function() {
            $.dequeue(this, 'fx')
          })
          .animate(
            {
              width: a.offsetWidth,
              left: a.offsetLeft
            },
            o.speed,
            o.fx
          )
      }
    })
  }
})(jQuery)

/*
 * jQuery Easing v1.3 - http://gsgd.co.uk/sandbox/jquery/easing/
 *
 * Uses the built in easing capabilities added In jQuery 1.1
 * to offer multiple easing options
 *
 * TERMS OF USE - jQuery Easing
 *
 * Open source under the BSD License.
 *
 * Copyright © 2008 George McGinley Smith
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without modification,
 * are permitted provided that the following conditions are met:
 *
 * Redistributions of source code must retain the above copyright notice, this list of
 * conditions and the following disclaimer.
 * Redistributions in binary form must reproduce the above copyright notice, this list
 * of conditions and the following disclaimer in the documentation and/or other materials
 * provided with the distribution.
 *
 * Neither the name of the author nor the names of contributors may be used to endorse
 * or promote products derived from this software without specific prior written permission.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND ANY
 * EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE
 *  COPYRIGHT OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 *  EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE
 *  GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED
 * AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 *  NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 */

// t: current time, b: begInnIng value, c: change In value, d: duration
jQuery.easing['jswing'] = jQuery.easing['swing']

jQuery.extend(jQuery.easing, {
  def: 'easeOutQuad',
  swing: function(x, t, b, c, d) {
    //alert(jQuery.easing.default);
    return jQuery.easing[jQuery.easing.def](x, t, b, c, d)
  },
  easeInQuad: function(x, t, b, c, d) {
    return c * (t /= d) * t + b
  },
  easeOutQuad: function(x, t, b, c, d) {
    return -c * (t /= d) * (t - 2) + b
  },
  easeOutBack: function(x, t, b, c, d, s) {
    if (s == undefined) s = 1.70158
    return c * ((t = t / d - 1) * t * ((s + 1) * t + s) + 1) + b
  }
})
