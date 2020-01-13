<?php
include_once('resource/db/db.php');
include_once('resource/db/function.php');

$str = "Yes, there is. I'm wondering why anyone hasn't mentioned it yet. Although the answers suggested above seems fine for a quick check but isn't scalable in the long run or for a bigger project.";

$befored = microtime(true);
$funcd = mysqli_real_escape_string($connection,$str);
$afterd = microtime(true);
echo "Default function: ".$afterd." to ".$befored." sec/serialize<br><br>";

$before = microtime(true);
$func = mysqli($str);
$after = microtime(true);
echo "My function function: ".$after." to ".$before." sec/serialize <br><br>";

$beforem = microtime(true);
$generatepass = uniqids();
$afterm = microtime(true);
echo ($afterm." ".$beforem) . " sec/serialize\n";




?>