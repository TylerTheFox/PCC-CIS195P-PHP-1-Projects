<?php
$lang = @file_get_contents("lang.tmp");
if ($lang == false)
    $lang = 'en';

@include("lang/languages.php");
@include("lang/en.php");
@include("lang/$lang.php");

if ($lang == "zh")
    header("Content-Type: text/html; charset=gb2312");
elseif ($lang == "jp")
    header("Content-Type: text/html; charset=shift-jis");
else
    header("Content-Type: text/html; charset=iso-8859-1");
?>
