<?php
//load json file and send to js
if(isset($_POST["param"])&&$_POST["param"]!="")
{
  $json = $_POST["param"];
  $handle = fopen("./context/".$json.".json","rb");
  $context = "";
  while (!feof($handle)) {
          $context .= fread($handle, 10000);
  }
  fclose($handle);
  echo $context;


}
else
{
      echo "error";
}

?>
