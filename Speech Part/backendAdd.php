<?php
$text = $_POST['Text'];
$mc = new Memcached();
$mc->addServer("localhost", 11211);
$text = strtolower($text);
if (strpos($text, "mirror mirror") === 0)
$mc->set("text", $txt);
//$mc->set("bar", "Memcached...");

/*$arr = array(
    $mc->get("foo"),
    $mc->get("bar")
);
*/
//var_dump($arr);
echo("Good")
?>
