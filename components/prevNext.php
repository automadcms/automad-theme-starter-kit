<@ if not @{ checkboxHidePreviousAndNextPageNavigation } @>
	<section class="kit-prev-next">
		<@ newPagelist @>
		<# 

		We can access the previous and next page in the 
		pagelist that is define above with "newPagelist"
		by using the "with" statement as follows.

		#>
		<@ with prev @>
			<a href="@{ url }">
				<# 

				Again, we use the custom "icon" helper here that is defined inside "lib/functions.php".
			
				#>
				<@ icon { name: 'chevron-left' } @>
				@{ title }
			</a>	
		<@ end @>
		<@ with next @>
			<a href="@{ url }">
				@{ title }
				<@ icon { name: 'chevron-right' } @>
			</a>	
		<@ end @>
	</section>
<@ end @>
