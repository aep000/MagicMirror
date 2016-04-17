<?php
$text = $_POST['text'];
//$mc = new Memcached();
//$mc->addServer("localhost", 11211);
$text = strtolower($text);
if (strpos($text, "mirror mirror") === 0){
apc_store("speechData", $txt);
//$mc->set("bar", "Memcached...");

/*$arr = array(
    $mc->get("foo"),
    $mc->get("bar")
);
*/
//var_dump($arr);
$input = apc_fetch("speechData");
$special = true;
var_dump($input);
}
else{
  echo("Bad Text");
}
?>
