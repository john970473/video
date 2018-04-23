<?php
//get video id
if(isset($_GET["id"]) && $_GET["id"]!="")
{
    $id = $_GET["id"];
}
 ?>


<!-- origin html code -->
<html lang="zh-TW">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Voicetube Implement</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <!-- Bootstrap core CSS -->
  <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" rel="stylesheet"> -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <link href="./css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript"> var CLIENT_ID = '673381173216-1cg3p0mqapitdm647sqtn8umspgnncln'; var API_KEY = 'AIzaSyBejq9v2EcnUSjL5aR5CJ2jpOn_NL3oHoA'; var DISCOVERY_DOCS = ["https://sheets.googleapis.com/$discovery/rest?version=v4"]; var SCOPES = "https://www.googleapis.com/auth/spreadsheets.readonly"; function handleClientLoad() { gapi.load('client:auth2', initClient); } function initClient() { gapi.client.init({ apiKey: API_KEY, clientId: CLIENT_ID, discoveryDocs: DISCOVERY_DOCS, scope: SCOPES }).then(function () { putItIn(

  '1MPSkCQ7Ase_ZmgwLbvmXG48X1txqeuwaUw0BkOyC7Jk',["sheet!B:B", "sheet!A:A"],["kkk", "ttt"], ["1", "1"]

  ); }); } function putItIn(spreadsheet_id, ranges, tag_name, category) { gapi.client.sheets.spreadsheets.values.batchGet({ spreadsheetId: spreadsheet_id, ranges: ranges, }).then(function(response) { var result = response.result; if (result.valueRanges.length > 0) { for (i = 0; i < result.valueRanges.length; i++) { for (j = 0; j < result.valueRanges[i].values.length; j++) { var row = result.valueRanges[i].values[j]; var tags = document.getElementsByTagName(tag_name[i]); var col_or_row = ranges[i].split(":"); for (k = 0; k < row.length; k++) { var tag_id; Number(col_or_row[1]) ? tag_id = k : tag_id = j; if ( category[i] == "1" ) { l = 0; while(l < tags.length){ if(tags[l].attributes.getNamedItem("saver_id").nodeValue == tag_id){ tags[l].innerHTML = row[k]; } l++; } } else if ( category[i] == "2") { l = 0; while(l < tags.length){ if(tags[l].attributes.getNamedItem("saver_id").nodeValue == tag_id){ var img = document.createElement("img"); tags[l].appendChild(img); tags[l].childNodes[0].src = row[k]; } l++; } } else { l = 0; while(l < tags.length){ if(tags[l].attributes.getNamedItem("saver_id").nodeValue == tag_id){ var iframe = document.createElement("iframe"); tags[l].appendChild(iframe); tags[l].childNodes[0].src = row[k]; } l++; } } } } } } else { document.getElementsByTagName(tag_name[i])[0].innerHTML = 'No data found.'; } }, function(response) { var textnode = document.createTextNode('Error: ' + response.result.error.message); document.getElementsByTagName(tag_name[i])[0].parentNode.appendChild(textnode); }); } </script> <script async defer src="https://apis.google.com/js/api.js" onload="this.onload=function(){};handleClientLoad()" onreadystatechange="if (this.readyState === 'complete') this.onload()"> </script>
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
          <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">VoiceTube</a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a  href="#" class="dropdown-toggle" data-toggle="dropdown" > 精選頻道 <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">中英文雙字幕影片</a></li>
                      <li><a href="#">深度英文演講</a></li>
                      <li><a href="#">TOEIC 雅思考試</a></li>
                    </ul>
                  </li>
                  <li><a href="#">匯入影片</a></li>
                  <!-- <li><a href="#" target="_blank">| &nbsp; HERO 課程 <span id="nred-badge" class="animated bounceIn hero-header-badge">Hot</span></a></li> -->
                </ul>
              </div><!-- /.navbar-collapse -->
          </div>
</nav>

  <div id="con" class="container">
    <div class="row ">
      <div class="col-lg-7 rows">
        <div class="col-12" id="player" ></div>
      </div>
      <div id="ts" class="col-lg-5 ">
        <div>
          <tbody>
            <tr id="seq-1">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(1);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts1"></span>
              </td>
            </tr>
            <tr id="seq-2">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(2);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts2"></span>
              </td>
            </tr>
            <tr id="seq-3">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(3);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts3"></span>
              </td>
            </tr>
            <tr id="seq-4">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(4);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts4"></span>
              </td>
            </tr>
            <tr id="seq-5">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(5);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts5"></span>
              </td>
            </tr>
            <tr id="seq-6">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(6);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts6"></span>
              </td>
            </tr>
            <tr id="seq-7">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(7);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts7"></span>
              </td>
            </tr>
            <tr id="seq-8">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(8);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts8"></span>
              </td>
            </tr>
            <tr id="seq-9">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(9);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts9"></span>
              </td>
            </tr>
            <tr id="seq-10">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(10);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts10"></span>
              </td>
            </tr>
            <tr id="seq-11">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(11);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts11"></span>
              </td>
            </tr>
            <tr id="seq-12">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(12);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts12"></span>
              </td>
            </tr>
            <tr id="seq-13">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(13);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts13"></span>
              </td>
            </tr>
            <tr id="seq-14">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(14);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts14"></span>
              </td>
            </tr>
            <tr id="seq-15">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(15);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts15"></span>
              </td>
            </tr>
            <tr id="seq-16">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(16);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts16"></span>
              </td>
            </tr>
            <tr id="seq-17">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(17);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts17"></span>
              </td>
            </tr>
            <tr id="seq-18">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(18);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts18"></span>
              </td>
            </tr>
            <tr id="seq-19">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(19);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts19"></span>
              </td>
            </tr>
            <tr id="seq-20">
              <td class="cor_sent hide">
                <a class="btn btn-mini" <i class="icon-pencil"></i></a>
              </td>
              <td class="align-top" width="25">
                <a href="javascript:;" onclick="play_context_one(20);"><i class="fa fa-play-circle-o"></i></a>
              </td>
              <td>
                <span id="ts20"></span>
              </td>
            </tr>

          </tbody>
        </div>

      </div>
    </div>
  </div>
  <div> <ttt saver_id="1"></ttt> </div>
  <script type="text/javascript" src="js/IFrame.js"></script>
  <script type="text/javascript" src="js/query_string.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
