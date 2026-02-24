<# 

This is the base page template that defines the main document structure.
The first thing that happens here is including the helper functions file.
You can define all sorts of helper in there.

#>
<@~ ../lib/functions.php ~@>

<# 

Now we set the ":colorTheme" class that is added to the <html> element.

The actual option set for the "selectColorTheme" variable is defined in
the "theme.json" file under "options".

#>
<@~ if @{ selectColorTheme | def ('switcher') } != 'switcher' @> 
	<@~ set { :colorTheme: ' @{ selectColorTheme }' } @>
<@~ end ~@>

<!DOCTYPE html>
<html lang="en" class="@{ template | sanitize }@{ :colorTheme }">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<# 

	The "@{ theme }" variable can be used to automatically build the correct path to your theme
	directory even, when renaming it.		
		
	#>
	<link href="/packages/@{ theme }/dist/main.css" rel="stylesheet">
	<script src="/packages/@{ theme }/dist/main.js" type="text/javascript"></script>
</head>
<body>
	<# 

	The layout is included where the main content goes.		
		
	#>
	<@ layout.php @>
</body>
</html>
