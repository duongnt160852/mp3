//like & shuffle button
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
audio.autoplay=true;
audio.src=link;
// console.log(audio.autoplay);
$('.shuffle').click(function(){
  $(this).toggleClass('clicked');
  if(audio.loop) audio.loop=false;
  else audio.loop=true;
  console.log(audio.loop);
});

audio.addEventListener('loadedmetadata',function(){
  
  // if(audio.paused) $(".togglePlay").html("<i class='fas fa-play'></i>");
    var duration=audio.duration;
    audio.play();
    if(audio.paused) $(".togglePlay").html("<i class='fas fa-play'></i>");
    setDuration(duration);
},false);

function setDuration(duration){
	duration=Math.ceil(duration);
	minute=Math.floor(duration/60);
	second=duration-minute*60;
	if(second<10) second="0"+second;
	$('.time--total').html(minute+":"+second);
}
var timer;
var percent = 0;
audio.addEventListener("playing", function(_event) {
  var duration = _event.target.duration;
  $(".togglePlay").html('<i class="fas fa-pause"></i>');
  advance(duration, audio);
});
audio.addEventListener("pause", function(_event) {
  clearTimeout(timer);
  $(".togglePlay").html("<i class='fas fa-play'></i>");
});

$("#volume1").click(function(){
  if(audio.muted) {
    $("#volume1").html('<i class="fas fa-volume-up"></i>');
    audio.muted=false;
  }
  else{
    $("#volume1").html('<i class="fas fa-volume-off"></i>');
    audio.muted=true;
  }
});
$(".fill").slider({
  min: 0,
  max: 100,
  value: 0,
  range: "min",
  slide: function(event, ui) {
    setFill(ui.value*audio.duration/100);
  }
});
var advance = function(duration, element) {
  var progress = $(".fill");
  $(".fill").slider({
    value: percent
    }
  );
  c=Math.ceil(element.currentTime);
  minute=Math.floor(c/60);
  second=c-minute*60;
  if(second<10) second="0"+second;
  $(".time--current").html(minute+":"+second);
  increment = 10/duration
  percent = Math.min(increment * element.currentTime * 10, 100);
  startTimer(duration, element);
}
var startTimer = function(duration, element){ 
  if(percent < 100) {
    timer = setTimeout(function (){advance(duration, element)}, 100);
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
  value: 80,
  range: "min",
  slide: function(event, ui) {
    setVolume(ui.value / 100);
    if(ui.value>=50) $("#volume1").html('<i class="fas fa-volume-up">');
    else if(ui.value<50) $("#volume1").html('<i class="fas fa-volume-down">');
    if(ui.value==0) $("#volume1").html('<i class="fas fa-volume-off">');
    else if(audio.muted) audio.muted=false;
  }
});

$(".previous").click(function(){
  setFill(0);
  $(".time--current").html("0:00");
});

$(".fill").slider({
  min: 0,
  max: 100,
  value: 0,
  range: "min",
  slide: function(event, ui) {
    setFill(ui.value*audio.duration/100);
    c=Math.ceil(ui.value*audio.duration/100);
    minute=Math.floor(c/60);
    second=c-minute*60;
    if(second<10) second="0"+second;
    $(".time--current").html(minute+":"+second);
  }
});

$(".next").click(function(){
  window.location.replace("bai-hat/tru-mua");
});
function setFill(a){
    var myMedia = audio;
    myMedia.currentTime = a ;
}

function setVolume(myVolume) {
  var myMedia = audio;
  myMedia.volume = myVolume;
}
