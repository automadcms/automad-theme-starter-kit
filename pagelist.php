<# 

Also the "pagelist" template is based on the "page" component.
The only exception is the content of the "main" snippet that is deeply nested 
inside the page component.

In order to inherit the "page" component and only changing the main snippet,
we can simply redefine it after the include statement.

#>
<@ components/page.php @>

<@~ snippet main ~@>
	<main class="kit-layout__main">
		<# 

		The main content goes here. 

		#>
		<@ components/content.php @>

		<# 

		Before we can render a filter menu and the actual page previews,
		we have to define a pagelist that respects query string parameters and
		the user's configuration.

		#>	
		<@ newPagelist {
			type: @{ selectPagelistSubset | def (false) },
			sort: @{ selectPagelistSort },
			context: @{ urlPagelistContext | def (false) },
			filter: @{ ?filter },
			page: @{ ?page | def (1) },
			limit: 8
		} @>

		<section class="am-block">
			<#

			The following section creates a little filter menu with clickable tags 
			that filter the displayed pages.

			#>	
			<div class="kit-filters">
				<a 
					href="@{ url }"
					<@ if not @{ ?filter } @>class="active"<@ end @>
				>
					All
				</a>
				<@ foreach in filters @>
					<a
						href="?filter=@{ :filter }"
						<@ if @{ ?filter } = @{ :filter } @>class="active"<@ end @>
					>@{ :filter }</a>
				<@ end @>
			</div>

			<# 

			The grid template for the page previews can also be used here to render the actual pagelist content.

			#>
			<@ blocks/pagelist/grid.php @>

			<# 
		
			At the end we also add the pagination component.

			#>
			<@ components/pagination.php @>
		</section>
	</main>
<@~ end ~@>


