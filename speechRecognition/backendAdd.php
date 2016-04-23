<?php
$text = $_POST['text'];
//$mc = new Memcached();
//$mc->addServer("localhost", 11211);
$servername = "localhost";
$username = "root";
$password = "magicmirror";
$dbname = "magicmirror";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$text = strtolower($text);
if (strpos($text, "mirror mirror") === 0){
  // Check connection

  $sql = 'INSERT INTO speech (`text`) VALUES ("'.$text.'")';
  if (mysqli_query($conn, $sql)) {
    echo($text);
  }
  else{
    echo("Sql error");
  }
//$mc->set("bar", "Memcached...");

/*$arr = array(
    $mc->get("foo"),
    $mc->get("bar")
);
*/
//var_dump($arr);
//$input = apc_fetch("speechData");
//$special = true;
}
else{
  echo("Bad Text");
}
?>
