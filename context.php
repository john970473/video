<?php
$handle = fopen("./9bAiXJoNdy0.json","rb");
$context = "";
while (!feof($handle)) {
        $context .= fread($handle, 10000);
}
fclose($handle);

$content = json_decode($context);
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
