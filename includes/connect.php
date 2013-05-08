<?php
$connect = mysql_connect('localhost','stocks','St0ckPr3dict0r');
if(!$connect){die('Could not connect to database!');}
mysql_select_db("stock", $connect);
?>