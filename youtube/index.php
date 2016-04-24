<?php

    $searchString   = $_GET['search'];
    $searchString = "can't keep my hands to myself";
    $correctString  = str_replace(" ","+",$searchString);
    $youtubeUrl = "https://www.youtube.com/results?search_query=". $correctString;
    $getHTML        = file_get_contents($youtubeUrl);
    $pattern        = '/<a href="\/watch\?v=(.*?)"/i';

    if(preg_match($pattern, $getHTML, $match)){
            $videoID    = $match[1];
    } else {
            echo "Something went wrong!";
            exit;
    }


    echo '<iframe width="560" height="315" src="//www.youtube.com/embed/'. $videoID .'?autoplay=1" frameborder="0" allowfullscreen></iframe>';

?>


<!DOCTYPE HTML>
<html>
    <head>
            <title>Fetch Youtube first result</title>
    </head>
    <body>
            <form method="post" action="index.php" accept-charset="utf-8">
                    Search string: <input type="text" name="searchString" />
                    <input type="submit" name="submit" value="Search" />
            </form>
    </body>
</html>
