var id = getParameter("id");

//get json transcripts
$(document).ready(function(){
  $.ajax({
  method: "POST",
  url: "context.php",
  dataType: "json",
  data: "param="+id
   })
  .done(function(data) {
    for (var i=0 ; i<20 ; i++){
      document.getElementById('ts'+(i+1)).innerHTML = data[i].text + "</br>";
    }

  });
});

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
