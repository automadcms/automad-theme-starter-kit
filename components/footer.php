<@~ snippet footer ~@>
	<footer class="kit-layout__footer kit-footer">
		<hr />
		<@ prevNext.php @>
		<@ related.php @>

		<# @{ checkboxShowPageInFooter} #>
		<@~ newPagelist { 
			excludeHidden: false, 
			match: '{ "checkboxShowPageInFooter": "/./" }' 
		} ~@>
		<@ if @{ :pagelistCount} @>
			<nav>
				<@ foreach in pagelist ~@>
					<a href="@{ url }">@{ title }</a>
				<@~ end @>
			</nav>
		<@ end @>
		@{ +footer | replace ('/\\s*(.+)\\s*/is', '<section>$1</section>') }
	</footer>
<@~ end ~@>

<@ footer @>
