<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Horror Movies</title>
</head>
<body>

<?php

$dir = 'moviepics';
$files = scandir($dir);

//pre_r($files);

function pre_r($array) {
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

$files = array_diff($files, array('..','.'));

//pre_r($files);

$files = array_values($files);

//pre_r($files);


$movies = array();

for ($i = 0; $i < count($files); $i++) {

	preg_match("!(.*?)\((.*?)\)!",$files[$i],$results);

	
	$movie_name = str_replace('_', ' ', $results[1]);
	$movie_name = ucwords($movie_name);

	$movies[$movie_name]['image'] = $files[$i];
	$movies[$movie_name]['year'] = $results[2];


}

echo "<table id = 'movies' cellpadding = 50>";
echo "<tr class = 'odd'>";

foreach ($movies as $movie_name => $info) {
	$content = "<td><span class = 'name'>$movie_name</span><br />"
	. "<img src = 'moviepics/$info[image]'<br />" 
	. "<span class = 'year'>( $info[year] )</span></td>";

	echo $content;
}

echo "</tr></table>";
?>

<style>

	#movies {
		background: #000;
		bo
		color: #000;
		font : 11pt Impact;
	}
	tr.header {
		background-color: #111f4e;
		color:  #fff;
		font: 11pt Impact;
	}
	tr.odd {
		background-color: #F7F3E3;
	}
	tr.even {
		background-color: #141423;
	}
	img {
		padding: 10px;

	}
	td {
		text-align: center;
	}
	span.year {
		color: #000;
		font-size: 60px;
	}
	span.name {
		font-size: 60px;
		
	}
	body {
		margin: 0;
		padding-top: 200px;
		background-color: #6F1A07;
	}


</style>
</body>
</html>