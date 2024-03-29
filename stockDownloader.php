<?php
include("includes/connect.php");

function createURL($ticker) {
	$currentMonth = date("n");
	$currentMonth = $currentMonth - 1;
	$currentDay = date("j");
	$currentYear = date("Y");
	return "http://ichart.finance.yahoo.com/table.csv?s=$ticker&a=07&b=19&c=2004&d=$currentMonth&e=$currentDay&f=$currentYear&g=d&ignore=.csv";
}

function getCSVFile($url, $outputFile) {
	$content = file_get_contents($url);
	$content = str_replace("Date,Open,High,Low,Close,Volume,Adj Close", "", $content);
	$content = trim($content);
	file_put_contents($outputFile, $content);
}

function fileToDatabase($txtFile, $tableName) {
	$file = fopen($txtFile,"r");
	while(!feof($file)){
		$line = fgets($file);
		$pieces = explode(",", $line);

		$date = $pieces[0];
		$open = $pieces[1];
		$high = $pieces[2];
		$low = $pieces[3];
		$close = $pieces[4];
		$volume = $pieces[5];
		$amount_change = $close-$open;
		$percent_change = ($amount_change/$open)*100;

	}
}
?>