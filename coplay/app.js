$(function(){
  $("#play").click(function(){ 
    $("audio[id^='audio']").each(function(){
      $(this)[0].play();
    });
  });

  $("#pause").click(function(){ 
    $("audio[id^='audio']").each(function(){
      $(this)[0].pause();
    });
  });

  $("button[id^='set']").click(function(){
    var src= $("#" + $(this).data("select")).val();
    $("#" + $(this).data("audio"))[0].src = src;
  });

  $("button[id^='unset']").click(function(){
    $("#" + $(this).data("audio")).removeAttr("src");
  });
});
