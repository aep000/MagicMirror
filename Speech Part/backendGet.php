<?php

$servername = "localhost";
$username = "root";
$password = "magicmirror";
$dbname = "magicmirror";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$query = "SELECT * FROM  `speech` WHERE  `ID` = ( SELECT MAX(  `ID` ) FROM  `speech` )";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $input = $row['text'];
    }
} else {
    echo "0 results";
}
$special = true;
switch ($input) {
  case "mirror mirror on the wall who's the fairest of them all":
    echo("Snow White.");
    break;
  case 'mirror mirror how much wood could a woodchuck chuck if a woodchuck could chuck wood':
    echo("On a good day, with the wind to its back, 711 pounds.");
    break;
  case 'mirror mirror have you ever had a broken heart':
    echo("I've had Jaundice.");
    break;
  case "mirror mirror if a tree falls in a forest and no one is around to hear it, does it make a sound":
    echo("Can we assume the unobserved world functions the same as the observed world?");
    break;
  case "mirror mirror ar":
    echo("U!!!!!");
    break;
  case "mirror mirror what is war good for":
    echo("Microwaves, actually.");
    break;
  case "mirror mirror how do i look":
    echo("You have a great personality!");
    break;
  case "mirror mirror what is the meaning of life":
    echo("I am nothing more than a program displayed on a screen covered by a one way mirror. And Ian sucks butt.");
    break;
  case "mirror mirror you're great":
    echo("Shut up baby I know it.");
    break;
  case "mirror mirror what's supermans secret identity.":
    echo("I don't know, but have you ever seen him and Kanye in the same room.");
    break;
  case "mirror mirror who lives in a pineapple under the sea":
    echo("SPONEGBOB SQUAREPANTS!");
    break;
  case "mirror mirror how long will it take to jerk off every guy in this room":
    echo("It depends on the D to F ratio.");
    break;
  case "mirror mirror what is my purpose":
    echo("You pass butter.");
    break;
  case "mirror mirror lana lana lana":
    echo("WHAT? danger zone");
    break;
  case "mirror mirror can you take two strokes off of my golf game":
    echo("Even if I had arms and feet, no.");
    break;
  case "mirror mirror can you help me fix my computer":
    echo("Did you try turning it off and on again?");
    break;
  case "mirror mirror are giant piloted robot fights real":
    echo("Yes, google Megabots for more information");
    break;
  case "mirror mirror who will win the hackathon":
    echo("Whoever has the best hack 😉");
    break;
  case "mirror mirror what is your purpose":
    echo("To show everyone how great they look");
    break;
    case "mirror mirror if you could tell the judges one thing what would it be":
      echo("I would tell them how hard this team worked on creating me");
      break;
      case "mirror mirror what technologies were used to create you":
        echo("PHP, Javscript, HTML, and a Raspberry Pi");
        break;
        case "mirror mirror what is your favorite sports team?":
          echo("The Scarlet Knights");
          break;

  default:
    break;
}
/*if(!$special) {
  if(strpos($input, "mirror mirror do some math") === 0) {
    $eq = str_replace("mirror mirror do some math","",$input)
    $ma = "2+10";

if(preg_match("/(\d+)(?:\s*)([\+\-\*\/])(?:\s*)(\d+)/", $ma, $matches) !== FALSE){
    $operator = $matches[2];

    switch($operator){
        case '+':
            $p = $matches[1] + $matches[3];
            break;
        case '-':
            $p = $matches[1] - $matches[3];
            break;
        case '*':
            $p = $matches[1] * $matches[3];
            break;
        case '/':
            $p = $matches[1] / $matches[3];
            break;
    }

    echo $p;
}
*/
//this may also work, i honestly have no idea
/*
$ma ="print (2+10);";
eval($ma);
*/

//$mc->set("bar", "Memcached...");

/*$arr = array(
    $mc->get("foo"),
    $mc->get("bar")
);
*/
//var_dump($arr);
?>
