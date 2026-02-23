<# 

This is the pagination component. 
The ":paginationCount" runtime variable can be used to test if
there is more than on page of items.

#>
<@ if @{ :paginationCount } > 1 @>
	<nav class="kit-pagination">
		<# 
   
		We can use the "set" statement in order to define a runtime variable called ":page" that
		automatically combines a given value for the "page" parameter in the query string (?page) 
		and a default value of 1. This makes reusing the current page number much shorter and easier.

		#>
		<@ set { :page: @{ ?page | def (1) } } @>
			<@ if @{ :page } > 1 @>
			<# 
				
			The "queryStringMerge" statement is used to merge as set of parameters into the current
			query string. So here for example we want to update only the "page" parameter while not touching other
			potentially existing parameters.

			#>
			<a href="?<@ queryStringMerge { page: 1 } @>">
				<# 

				The "icon" function is a custom helper function that is define in "lib/functions.php"
				and provides an easy way of embedding SVG files.

				#>			
				<@ icon { name: 'chevron-double-left' } @>
			</a>
			<a href="?<@ queryStringMerge { page: @{ :page | -1 } } @>">
				<@ icon { name: 'chevron-left' } @>
			</a>
		<@ end @>
			<@ for @{ :page | -3 } to @{ :page | +3 } @>
				<@ if @{ :i } > 0 and @{ :i } <= @{ :paginationCount } @>
					<@ if @{ :i } = @{ :page } @>
						<span>@{ :i }</span>
					<@ else @>
						<a href="?<@ queryStringMerge { page: @{ :i } } @>">@{ :i }</a>
					<@ end @>
				<@ end @>
			<@ end @>
		<@ if @{ :page } < @{ :paginationCount } @>
			<a href="?<@ queryStringMerge { page: @{ :page | +1 } } @>">
				<@ icon { name: 'chevron-right' } @>
			</a>
			<a href="?<@ queryStringMerge { page: @{ :paginationCount } } @>">
				<@ icon { name: 'chevron-double-right' } @>
			</a>
		<@ end @>
	</nav>
<@ end @>
