<?php
//
echo shell_exec('curl -X POST -H "Content-Type: application/json" -d \'{"value1":"'.$_GET['val1'].'","value2":"'.$_GET['val2'].'","value3":"'.$_GET['val3'].'"}\' https://maker.ifttt.com/trigger/'.$_GET['type'].'/with/key/b3Onk6JvoJ7YHOSSKB0ECA');
 ?>
