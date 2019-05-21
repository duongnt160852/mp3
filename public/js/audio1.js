//like & shuffle button
class UndoRedoHandler {
  constructor(currentstate) {
    this._undoStack = [];
    this._redoStack = [];
    this._redoStack.push(currentstate);
  }

  insert(state) {
    this._undoStack.push(this._redoStack.pop());
    this._redoStack.length = 0;
    this._redoStack.push(state);
  }

  getPrevState() {
    if (this._undoStack.length >= 1) {
      let state = this._undoStack.pop();
      this._redoStack.push(state);
      return state;
    }
  }

  getNextState() {
    if (this._redoStack.length >= 2) {
      let state = this._redoStack.pop();
      this._undoStack.push(state);
      return this._redoStack[this._redoStack.length - 1];
    }
  }

  clear() {
    if (this._redoStack.length >= 1) {
      let state = this._redoStack.pop();
      this._undoStack.length = 0;
      this._redoStack.length = 0; 
      this._redoStack.push(state);
    }
  }
}
function generateRandom(min, max, except) {
    var num = Math.floor(Math.random() * (max - min + 1)) + min;
    return (num == except) ? generateRandom(min, max, except) : num;
}

$(".next").click(function(){

  if(undoRedoHandler._redoStack.length==1){
    if(shuffle){
      a=generateRandom(0,arr.length-1,undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].index);
      undoRedoHandler.insert({
        id: arr[a],
        index:a
      });
    }
    else{
      undoRedoHandler.insert({
      id: arr[(undoRedoHandler._redoStack[0].index+1)%arr.length],
      index:(undoRedoHandler._redoStack[0].index+1)%arr.length
    });
    }
  }
  else{
    undoRedoHandler.getNextState();
  }
  $.get("ajax/album/"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id,function(data){
      data=JSON.parse(data);
      $(".song-name").html(data.name);
      $(".artist-name").html("Ca sĩ: ");
      for(i=0;i<data.singer.length;i++){
        if(i==0) $(".artist-name").append(data.singer[i]);
        else $(".artist-name").append(", "+data.singer[i]);
      }
      $(".artist-name").append("- Sáng tác: "+data.musician);
      $(".fill").slider({value:0});
      $(".list1").scrollTop($("#song1"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id).position().top-$(".list1").position().top);
      audio.src=data.link;
      audio.currentTime=0;
      percent=0;
      clearTimeout(timer);
      $("#img1").attr("src",data.image);
      $(".lyric h3").html("Lời bài hát: "+data.name);
      $(".content").html(data.lyric);
      $(".active1 i:first").siblings(".play1").removeClass("fa-pause");
      $(".active1 i:first").siblings(".play1").addClass("fa-play");
      $(".active1").removeClass("active1");
      $("#song1"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id).addClass("active1");
      $(".active1 i:first").siblings(".play1").removeClass("fa-play");
      $(".active1 i:first").siblings(".play1").addClass("fa-pause");
      i++;
    });
    $.get("ajax/songview/"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id+"/"+$("#total").text());
});

$(".previous").click(function(){
    if(undoRedoHandler._undoStack.length>=1){
      
    }
    else{
      if(shuffle){
        a=generateRandom(0,arr.length-1,undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].index);
        undoRedoHandler._undoStack.push({
          id: arr[a],
          index:a
        });
      }
      undoRedoHandler._undoStack.push({
        id: arr[(undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].index+arr.length-1)%arr.length],
        index:(undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].index+arr.length-1)%arr.length
      });
    }
    a=undoRedoHandler.getPrevState();
    $.get("ajax/album/"+a.id,function(data){
      data=JSON.parse(data);
      $(".song-name").html(data.name);
      $(".artist-name").html("Ca sĩ: ");
      for(i=0;i<data.singer.length;i++){
        if(i==0) $(".artist-name").append(data.singer[i]);
        else $(".artist-name").append(", "+data.singer[i]);
      }
      $(".artist-name").append("- Sáng tác: "+data.musician);
      $(".fill").slider({value:0});
      $(".list1").scrollTop($("#song1"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id).position().top-$(".list1").position().top);
      audio.src=data.link;
      audio.currentTime=0;
      percent=0;
      clearTimeout(timer);
      $("#img1").attr("src",data.image);
      $(".lyric h3").html("Lời bài hát: "+data.name);
      $(".content").html(data.lyric);
      $(".active1 i:first").siblings(".play1").removeClass("fa-pause");
      $(".active1 i:first").siblings(".play1").addClass("fa-play");
      $(".active1").removeClass("active1");
      $("#song1"+a.id).addClass("active1");
      $(".active1 i:first").siblings(".play1").removeClass("fa-play");
      $(".active1 i:first").siblings(".play1").addClass("fa-pause");
      i++;
    });
    $.get("ajax/songview/"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id+"/"+$("#total").text());
});


$('.heart').click(function(){
  $(this).toggleClass('clicked');
});


//show info box on hover
$('#player').hover(function(){ 
  $('.info').toggleClass('up');
});



//music player settings

// var audio = new Audio('Dung-Nguoi-Dung-Thoi-Diem-Thanh-Hung.mp3');
var audio = new Audio();
var duration;
var i=0;
audio.autoplay=true;
audio.src=link;


// console.log(audio.autoplay);
$('.repeat').click(function(){
  $(this).toggleClass('clicked');
  if(audio.loop) audio.loop=false;
  else audio.loop=true;
});

$('.shuffle').click(function(){
  $(this).toggleClass('clicked');
  shuffle=true;
});

audio.addEventListener('loadedmetadata',function(){
    var duration=audio.duration;
    audio.play();
    if(audio.paused) $(".togglePlay").html("<i class='fas fa-play'></i>");
    setDuration(duration);
    if(i==0) $.get("ajax/songview/"+arr[0]+"/"+duration);
},false);

function setDuration(duration){
	duration=Math.ceil(duration);
	minute=Math.floor(duration/60);
	second=duration-minute*60;
	if(second<10) second="0"+second;
	$('.time--total').html(minute+":"+second);
  $('#total').html(duration);
}
var timer;
var percent = 0;
audio.addEventListener("playing", function(_event) {
  if(!audio.paused){
    var duration = _event.target.duration;
    $(".togglePlay").html('<i class="fas fa-pause"></i>');
    advance(duration, audio);
  }
  
});
audio.addEventListener("pause", function(_event) {
  clearTimeout(timer);
  $(".togglePlay").html("<i class='fas fa-play'></i>");
  if(audio.currentTime==audio.duration && audio.loop==false) {
    if(undoRedoHandler._redoStack.length==1){
    if(shuffle){
      a=generateRandom(0,arr.length-1,undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].index);
      undoRedoHandler.insert({
        id: arr[a],
        index:a
      });
    }
    else{
      undoRedoHandler.insert({
      id: arr[(undoRedoHandler._redoStack[0].index+1)%arr.length],
      index:(undoRedoHandler._redoStack[0].index+1)%arr.length
    });
    }
  }
    else{
      undoRedoHandler.getNextState();
    }
    $.get("ajax/album/"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id,function(data){
        data=JSON.parse(data);
        $(".song-name").html(data.name);
        $(".artist-name").html("Ca sĩ: ");
        for(i=0;i<data.singer.length;i++){
          if(i==0) $(".artist-name").append(data.singer[i]);
          else $(".artist-name").append(", "+data.singer[i]);
        }
        $(".artist-name").append("- Sáng tác: "+data.musician);
        $(".fill").slider({value:0});
        audio.src=data.link;
        audio.currentTime=0;
        percent=0;
        clearTimeout(timer);
        $("#img1").attr("src",data.image);
        $(".lyric h3").html("Lời bài hát: "+data.name);
        $(".content").html(data.lyric);
        $(".active1 i:first").siblings(".play1").removeClass("fa-pause");
        $(".active1 i:first").siblings(".play1").addClass("fa-play");
        $(".active1").removeClass("active1");
        $("#song1"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id).addClass("active1");
        $(".active1 i:first").siblings(".play1").removeClass("fa-play");
        $(".active1 i:first").siblings(".play1").addClass("fa-pause");

      });
  $.get("ajax/songview/"+undoRedoHandler._redoStack[undoRedoHandler._redoStack.length-1].id+"/"+$("#total").text());
  } 
});

$("#volume1").click(function(){
  if(audio.muted) {
    if(audio.volume>=0.5) $("#volume1").html('<i class="fas fa-volume-up"></i>');
    else $("#volume1").html('<i class="fas fa-volume-down"></i>');
    audio.muted=false;
  }
  else{
    $("#volume1").html('<i class="fas fa-volume-off"></i>');
    audio.muted=true;
  }
});

var advance = function(duration, element) {
  $(".fill").slider({
    value: percent*10
    }
  );
  c=Math.ceil(element.currentTime);
  minute=Math.floor(c/60);
  second=c-minute*60;
  if(second<10) second="0"+second;
  $(".time--current").html(minute+":"+second);
  increment = 10.0/duration;
  percent = Math.min(increment * element.currentTime * 10, 100);
  startTimer(duration, element);
}
var startTimer = function(duration, element){ 
  if(percent < 100 && !audio.paused) {
    timer = setTimeout(function (){advance(duration, element)}, 200);
  }
}

function togglePlay (e) {
  e = e || window.event;
  var btn = e.target;
  if (!audio.paused) {
    $(".togglePlay").html("<i class='fas fa-play'></i>");
    audio.pause();
    isPlaying = false;
  } else {
    $(".togglePlay").html('<i class="fas fa-pause"></i>');
    audio.play();
    isPlaying = true;
  }
}

$(".volume1").slider({
  min: 0,
  max: 100,
  value: 100,
  range: "min",
  slide: function(event, ui) {
    setVolume(ui.value / 100);
    if(ui.value>=50) $("#volume1").html('<i class="fas fa-volume-up">');
    else if(ui.value<50) $("#volume1").html('<i class="fas fa-volume-down">');
    if(ui.value==0) $("#volume1").html('<i class="fas fa-volume-off">');
    else if(audio.muted) audio.muted=false;
  }
});



$(".fill").slider({
  min: 0,
  max: 1000,
  value: 0,
  range: "min",
  slide: function(event, ui) {
    audio.currentTime=ui.value*audio.duration/1000;
    c=Math.ceil(ui.value*audio.duration/1000);
    minute=Math.floor(c/60);
    second=c-minute*60;
    if(second<10) second="0"+second;
    $(".time--current").html(minute+":"+second);
    audio.pause();
    audio.play();
  }
});


function setFill(a){
    var myMedia = audio;
    myMedia.currentTime = a ;
}

function setVolume(myVolume) {
  var myMedia = audio;
  myMedia.volume = myVolume;
}
