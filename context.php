<?php
$json = "ivUOBdHu6VE";
$handle = fopen("./context/".$json.".json","rb");
$context = "";
while (!feof($handle)) {
        $context .= fread($handle, 10000);
}
fclose($handle);

if(isset($_POST["param"])&&$_POST["param"]!="")
{
      if($_POST["param"]=="context")
      {
            echo $context;
      }

}
else
{
      echo "error";
}

?>
