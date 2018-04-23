var tag = document.createElement('script');
var id = getParameter("id");
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// 3. This function creates an <iframe> (and YouTube player)
//    after the API code downloads.
var player;
let context;

//get json data
$(document).ready(function() {
  $.ajax({method: "POST", url: "context.php", dataType: "json", data: "param="+id}).done(function(data) {
    context = data;

  });
});

//load youtube video
function onYouTubeIframeAPIReady() {
  player = new YT.Player('player', {
    //height: '100%',
    width: '100%',
    videoId: id,
    events: {
      'onReady': onPlayerReady,
      // 'onStateChange': onPlayerStateChange
    }
  });
}

// 4. The API will call this function when the video player is ready.
function onPlayerReady(event) {
  // event.target.loadVideoById("oWP9Riq-ZBg", 5,"large");
  // event.target.playVideo();
  setInterval(function(){ for (var i = 0; i < 20; i++) {
    if (player.getCurrentTime() >= context[i].start_time / 1000 && player.getCurrentTime() <= context[i].end_time / 1000) {
      if (i!=0) document.getElementById('ts' + (i)).style.backgroundColor = "white";
      document.getElementById('ts' + (i + 1)).style.backgroundColor = "lightgray";
    }
  } }, 500);
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
//    the player should play for six seconds and then stop.
// var done = false;
//
// function onPlayerStateChange(event) {
//
//   if (event.data == YT.PlayerState.PLAYING ) {
//     console.log("FKKK")
//     for (var i = 1; i <= 20; i++) {
//       document.getElementById('ts' + i).style.backgroundColor = "white";
//     }
//     for (var i = 0; i < 20; i++) {
//       if (player.getCurrentTime() >= context[i].start_time / 1000 && player.getCurrentTime() <= context[i].end_time / 1000) {
//         document.getElementById('ts' + (i + 1)).style.backgroundColor = "lightgray";
//       }
//     }
//   }
// }

function stopVideo() {
  player.stopVideo();
}

//control play button
function play_context_one(index) {
  // player.loadVideoById({
  //   videoId: id,
  //   startSeconds: context[index - 1].start_time / 1000,
  //   endSeconds: context[index - 1].end_time / 1000,
  //   suggestedQuality: "large"
  // });
  player.loadVideoById(id, context[index-1].start_time/1000,"large");
  setTimeout(pauseVideo, context[index-1].end_time - context[index-1].start_time);
  for (var i = 1; i <= 20; i++) {
    document.getElementById('ts' + i).style.backgroundColor = "white";
  }
  document.getElementById('ts' + index).style.backgroundColor = "lightgray";
}

function pauseVideo() {
  player.pauseVideo();
  for (var i = 1; i <= 20; i++) {
    document.getElementById('ts' + i).style.backgroundColor = "white";
  }
}

//parse website video id
function getParameter(param)
{
    var query = window.location.search;
    var iLen = param.length;
    var iStart = query.indexOf(param);
    if (iStart == -1)
    　         return "";
    iStart += iLen + 1;
    var iEnd = query.indexOf("&", iStart);
    if (iEnd == -1)
    　         return query.substring(iStart);

    return query.substring(iStart, iEnd);
}
