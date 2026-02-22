<@ components/page.php @>

<@~ snippet main ~@>
	<main class="kit-layout__main">
		<h1>@{ title }</h1>
		<@ if @{ date } or @{ tags } @>
			<div class="kit-subtitle">
				@{ date | 
					dateFormat (@{ selectPageDateFormat | def('M Y') }, @{ :lang }) | 
					replace('/(.+)/', '<p>$1</p>') 
				}
				<@ if @{ tags } @>
					<p>
						<@ foreach in tags ~@>
							<@ if @{ :i } > 1 @>, <@ end @>@{ :tag }
						<@~ end @>
					</p>
				<@ end @>
			</div>
		<@ end @>
		@{ +main }

		<# Filters #>	
		<@ if not @{ checkboxHideFilters } @>
			<@ newPagelist @>
			<div class="kit-filters">
				<a 
					href="@{ url }"
					<@ if not @{ ?filter } @>class="active"<@ end @>
				>All</a>
				<@ foreach in filters @>
					<a
						href="?filter=@{ :filter }"
						<@ if @{ ?filter } = @{ :filter } @>class="active"<@ end @>
					>@{ :filter }</a>
				<@ end @>
			</div>
		<@ end @>

		<# Pagelist #>	
		<@ set {
			:page: @{ ?page | def (1) }
		} @>
		<@ newPagelist {
			type: @{ selectMainPagelistSubset },
			sort: @{ selectMainPagelistSort },
			context: @{ urlMainPagelistContext },
			filter: @{ ?filter },
			page: @{ :page },
			limit: 8
		} @>
		<@ blocks/pagelist/grid.php @>

		<# Pagination #>
		<@ components/pagination.php @>
	</main>
<@~ end ~@>


