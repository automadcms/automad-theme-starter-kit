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
	</main>
<@~ end ~@>

<@ main @>
