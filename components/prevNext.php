<@ if not @{ checkboxHidePreviousAndNextPageNavigation } @>
	<section class="kit-prev-next">
		<@ newPagelist @>
		<@ with prev @>
			<a href="@{ url }">
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
