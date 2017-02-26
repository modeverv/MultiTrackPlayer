$(function(){
  $("#play").click(function(){ 
    $("audio[id^='audio']").each(function(){
      try{
        if($(this).attr("src") !== undefined){
          var audio = document.getElementById($(this).attr("id"));
          audio.play();
        }
      } catch (x) {
      }
    });
  });
  $("#pause").click(function(){ 
    $("audio[id^='audio']").each(function(){
      try{
        if($(this)[0].src != ""){
          $(this)[0].pause();
        }
      } catch (x) {  }
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
