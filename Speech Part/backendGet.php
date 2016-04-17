<?php
$mc = new Memcached();
$mc->addServer("localhost", 11211);
$input = $mc->get("text", $txt);
$special = true;
switch ($input) {
  case 'mirror mirror on the wall who\'s the fairest of them all':
    echo("Snow White.");
    break;
  case 'mirror mirror how much would could a woodchuck chuck if a woodchuck could chuck wood':
    echo("On a good day, with the wind to its back, 711 pounds.");
    break;
  case 'mirror mirror have you ever had a broken heart':
    echo("I've had Jaundice.");
    break;
  case "mirror mirror if a tree falls in a forest and no one is around to hear it, does it make a sound":
    echo("Can we assume the unobserved world functions the same as the observed world?");
    break;
  case "mirror mirror are":
    echo("U!!!!!");
    break;
  case "mirror mirror what is war good for":
    echo("Microwaves, actually.");
    break;
  case "mirror mirror how do i look":
    echo("You have a great personality!");
    break;
  case "mirror mirror what is the meaning of life":
    echo("I am nothing more than a program displayed on a screen covered by a one way mirror.");
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
    echo("WHAT? \n danger zone");
    break;
  case "mirror mirror how do you work":
    echo("I am a raspberry pi running as a server aggregating information from the web and a laptop microphone connected by a HDMI to DVI adapter cable to an old monitor which is covered by one way glass.");
    break;
  case "mirror mirror can you take two strokes off of my golf game":
    echo("Even if i had arms and feet, no.");
    break;
  case "mirror mirror can you help me fix my computer":
    echo("Did you try turning it off and on again?");
    break;
  case "mirror mirror are":
    echo("U!!!!!");
    break;
  default:
    $special = false;
    break;
}
//if(!$special)

//$mc->set("bar", "Memcached...");

/*$arr = array(
    $mc->get("foo"),
    $mc->get("bar")
);
*/
//var_dump($arr);
?>
