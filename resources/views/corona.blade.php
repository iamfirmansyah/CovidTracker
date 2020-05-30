<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Covid-19 Indonesia</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
</head>
<body>
	<h1>Sebaran Kasus Positif Covid 19 Di Indonesia</h1>

	{!! $chart->container() !!}
	
	{!! $chart->script() !!}
</body>
</html>