<@~ ../lib/functions.php ~@>

<@~ if @{ selectColorTheme | def ('switcher') } != 'switcher' @> 
	<@~ set { :colorTheme: ' @{ selectColorTheme }' } @>
<@~ end ~@>

<!DOCTYPE html>
<html lang="en" class="@{ template | sanitize }@{ :colorTheme }">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="/packages/@{ theme }/dist/main.css" rel="stylesheet">
	<script src="/packages/@{ theme }/dist/main.js" type="text/javascript"></script>
</head>
<body>
	<@ layout.php @>
</body>
</html>
