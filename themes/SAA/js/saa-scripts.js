(function($) {
  $(window).on("load resize", function(){
    if($(".js-menuButton").css("display") == "none" && !$(".js-menuButton").hasClass("js-menu-open")){
      $(".js-menu").show();
    } else {
      $(".js-menu").hide();
    }
  });
  $(".js-menuButton").on("click", function(){
    var $this = $(this);
    var $jsMenu = $(".js-menu");
    if(!$this.hasClass("js-menu-open")){
      $jsMenu.slideDown("fast");
      $this.addClass("js-menu-open");
    } else {
      $jsMenu.slideUp("fast");
      $this.removeClass("js-menu-open");
    }
  });

  var headerHeight = $(".js-header").outerHeight();
  $("[href*='#']").on("click", function(){
    var targetID = $(this).attr("href").split("#")[1];
    var targetPath = $(this).attr("href").split("#")[0];
    if($("[id="+ targetID +"]").length && targetPath === "/"){
      var targetTop = $("[id="+ targetID +"]").offset().top;
      var target = targetTop - headerHeight;
      $(window).scrollTop(target);
      if($(".js-menuButton").hasClass("js-menu-open")){
        $(".js-menu").slideUp("fast");
      }
    } else {
      location.href = targetPath + "#" + targetID;
    }
    return false;
  });

  if(location.hash){
  $(window).on("load", function(){
    var targetID = location.hash.split("#")[1];
    if($("[id="+ targetID +"]").length && location.pathname === "/"){
      var targetTop = $("[id="+ targetID +"]").offset().top;
      var target = targetTop - headerHeight;
      $(window).scrollTop(target);
    }
  });
  }

  $(".js-workThumb").on("click", function(){
    var targetImg = $(this).attr("src");
    var targetAlt = $(this).attr("alt");
    $(".js-workMain").attr({
      src: targetImg,
      alt: targetAlt
    });
  });
})(jQuery);
