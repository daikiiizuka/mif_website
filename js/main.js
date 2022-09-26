$(window).scroll(function () {
    var now = $(window).scrollTop();
    if (now > 200) {
      $('.pagetop').fadeIn("slow");
    } else {
      $('.pagetop').fadeOut('slow');
    }
  });


  $(function(){
  $('.toggle_btn').on('click', function() {
    if ($('#header').hasClass('open')) {
      $('#header').removeClass('open');
    } else {
      $('#header').addClass('open');
    }
  });

  // #maskのエリアをクリックした時にメニューを閉じる
  $('#mask').on('click', function() {
    $('#header').removeClass('open');
  });

  // リンクをクリックした時にメニューを閉じる
  $('#navi a').on('click', function() {
    $('#header').removeClass('open');
  });
});




