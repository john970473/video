var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
let context;
$(document).ready(function(){
  $.ajax({
  method: "POST",
  url: "context.php",
  dataType: "json",
  data: "param=context"
   })
  .done(function(data) {
      context= data;

  });
});

function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    //height: '100%',
    width: '100%',
    videoId: '9bAiXJoNdy0',
    events: {
      // 'onReady': onPlayerReady,
      // 'onStateChange': onPlayerStateChange
    }
  });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  // event.target.loadVideoById("oWP9Riq-ZBg", 5,"large");
  event.target.playVideo();
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
// var done = false;
//
// function onPlayerStateChange(event) {
//
//   if (event.data == YT.PlayerState.PLAYING) {
//     while (true) {
//         if(player.getCurrentTime() > transcript.data[1].t/1000){
//           document.getElementById('ts'+ 2).style.backgroundColor = "lightgray";
//         }
//         if(player.getCurrentTime() > transcript.data[3].t/1000){
//           document.getElementById('ts'+ 4).style.backgroundColor = "lightgray";
//         }
//     }
//
//
//   }
// }

function stopVideo() {
  player.stopVideo();
}

function play_context_one(index){
    player.loadVideoById({videoId:"9bAiXJoNdy0",
                      startSeconds:context[index-1].start_time/1000,
                      endSeconds:context[index-1].end_time/1000,
                      suggestedQuality:"large"});
    // player.loadVideoById("9bAiXJoNdy0", context[index-1].start_time/1000,"large");
    // setTimeout(pauseVideo, context[index-1].d);
    for (var i=1 ; i<=20 ; i++){
      document.getElementById('ts'+ i).style.backgroundColor = "white";
    }
    document.getElementById('ts'+ index).style.backgroundColor = "lightgray";
}
function pauseVideo() {
  player.pauseVideo();
  for (var i=1 ; i<=20 ; i++){
    document.getElementById('ts'+ i).style.backgroundColor = "white";
  }
}
