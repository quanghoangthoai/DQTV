var dqtv = (function ($) {
  function library3rd() {
    //tooltip
    $('[data-toggle="tooltip"]').tooltip()
    //arcodion
    $('.arcodion').click(function () {

      if ($(this).hasClass('actived')) {
        $(this).removeClass('actived');
        $(this).next().removeClass('show');
      } else {
        $('.arcodion').removeClass('actived');
        $('.panel').removeClass('show');

        $(this).addClass('actived');
        $(this).next().addClass('show');
      }

    })
    //slick
    $('.slider').slick();
    $('.col-hotnews').slick({
      infinite: true,
      autoplay: true,
      speed: 500,
      autoplaySpeed: 5000,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false
    });
    //datapicker
    $("#datepicker-from").datepicker({
      dateFormat: 'dd/mm/yy',
      minDate: 'now',
      showOn: "focus",
      buttonText: "Chọn ngày"
    })
    $('.icon-calendar-from').click(function () {
      $("#datepicker-from").focus();
    });
    $("#datepicker-to").datepicker({
      dateFormat: 'dd/mm/yy',
      minDate: 'now',
      showOn: "focus",
      buttonText: "Chọn ngày"
    })
    $('.icon-calendar-to').click(function () {
      $("#datepicker-to").focus();
    });
    $("#datepicker-regis").datepicker({
      dateFormat: 'dd/mm/yy',
      minDate: 'now',
      showOn: "focus",
      buttonText: "Chọn ngày"
    })
    $('.icon-calendar-regis').click(function () {
      $("#datepicker-regis").focus();
    });
    //owl carousel
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      responsiveClass: true,
      loop: true,
      autoplay: true,
      responsive: {
        0: {
          items: 1,
          nav: true
        },
        480: {
          items: 1,
          nav: false
        },
        768: {
          items: 1,
          nav: true,
          loop: true
        },
        1024: {
          items: 2,
          nav: true,
          loop: true
        }
      }
    })
  }
  function menuMobile() {
    //menu-hamberger
    document.querySelector('.navbar-toggler-menu_icon').onclick = function () {
      var btnBorder = document.querySelectorAll('.navbar-border');
      for (let index = 0; index < btnBorder.length; index++) {
        btnBorder[index].classList.toggle('active-border')
      }
    }
    var searchClose = document.querySelector('.btn-search-close')
    searchClose.onclick = function () {
      document.querySelector('.fa-search').classList.toggle('fa-times')
    }
  }
  function datapickerVNI() {
    $.datepicker.regional["vi-VN"] =
      {
        closeText: "Đóng",
        prevText: "Trước",
        nextText: "Sau",
        currentText: "Hôm nay",
        monthNames: ["Tháng một", "Tháng hai", "Tháng ba", "Tháng tư", "Tháng năm", "Tháng sáu", "Tháng bảy", "Tháng tám", "Tháng chín", "Tháng mười", "Tháng mười một", "Tháng mười hai"],
        monthNamesShort: ["Một", "Hai", "Ba", "Bốn", "Năm", "Sáu", "Bảy", "Tám", "Chín", "Mười", "Mười một", "Mười hai"],
        dayNames: ["Chủ nhật", "Thứ hai", "Thứ ba", "Thứ tư", "Thứ năm", "Thứ sáu", "Thứ bảy"],
        dayNamesShort: ["CN", "Hai", "Ba", "Tư", "Năm", "Sáu", "Bảy"],
        dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
        weekHeader: "Tuần",
        dateFormat: "dd/mm/yy",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ""
      };

    $.datepicker.setDefaults($.datepicker.regional["vi-VN"]);
  }
  // function isQuestion(){
  //   document.querySelector('.btnQues').onclick = function () {
  //     document.querySelector('.isQuestion').classList.toggle('showQues')
  //   }
  //   var btnClick = document.querySelectorAll('.isQuestion-i')
  //   for (let i = 0; i < btnClick.length; i++) {
  //     btnClick[i].onclick = function () {
  //       var content = btnClick[i].textContent;
  //       content = content.trim();
  //       console.log(content);
  //       document.querySelector('#js-Quesvalue').value = content;
  //       document.querySelector('.isQuestion').classList.remove('showQues')
  //     }
  //   }
  // }
  function toTop() {
    var btn = $('#button-top');

    $(window).scroll(function () {
      if ($(window).scrollTop() > 300) {
        btn.addClass('show');
      } else {
        btn.removeClass('show');
      }
    });

    btn.on('click', function (e) {
      e.preventDefault();
      $('html, body').animate({ scrollTop: 0 }, '300');
    });
  }
  return {
    library3rd: library3rd,
    menuMobile: menuMobile,
    datapickerVNI: datapickerVNI,
    toTop: toTop
    // isQuestion:isQuestion

  };
})(jQuery);
jQuery(document).ready(function () {
  dqtv.library3rd();
  dqtv.menuMobile();
  dqtv.datapickerVNI()
  dqtv.toTop();
  // dqtv.isQuestion()
});

