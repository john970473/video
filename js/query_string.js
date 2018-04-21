$(document).ready(function(){
  $.ajax({
  method: "POST",
  url: "context.php",
  dataType: "json",
  data: "param=context"
   })
  .done(function(data) {
    for (var i=0 ; i<20 ; i++){
      document.getElementById('ts'+(i+1)).innerHTML = data[i].text + "</br>";
    }

  });
});
