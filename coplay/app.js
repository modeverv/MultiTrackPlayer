$(function(){

  $("#slider").slider({min : 0});

  var max_duration = 0;

  function play(){
    $("audio[id^='audio']").each(function(){
      try{
        if($(this)[0].src != "" ){
          $(this)[0].play().catch(function(){});
        }
      } catch (x) { }
    });
  }
  
  function pause(){
    $("audio[id^='audio']").each(function(){
      try{
        if($(this)[0].src != "" ){
          $(this)[0].pause().catch(function(){});
        }
      } catch (x) { }
    });
  }
  
  function setCurrentTime(time){
    $("audio[id^='audio']").each(function(){
      if($(this)[0].src != undefined ){
        $(this)[0].currentTime = time;
      }
    });
  }
  
  $("#play").click(function(){
    play();
  });

  $("#pause").click(function(){
    pause();
  });

  $("button[id^='set']").click(function(){
    var src= $("#" + $(this).data("select")).val();
    $("#" + $(this).data("audio"))[0].src = src;

    setTimeout(function(elem){
      var duration = $("#" + $(elem).data("audio"))[0].duration;
      if(max_duration < duration){
        max_duration = duration;
        $("#slider").slider( {max : duration, min : 0 });
      }
    },200,this);
  });

  $("button[id^='unset']").click(function(){
    $("#" + $(this).data("audio")).attr("src","");
  });

  var players = $("audio[id^='audio']");
  players.each(function(){
    var player = $(this)[0];
    player.addEventListener("timeupdate",function(){
      if(player.currentTime){
        var VALUE = Math.floor(player.currentTime);
        $("#slider").slider({value : VALUE});
      }
    });
  });

  $("#slider").on("mouseup touchend",function () {
    var currentTime = $("#slider").slider("value");
    setCurrentTime(currentTime);
    play();
  });

  $("#slider").on("mousedown touchstart",function () {
    pause();
  });
});
