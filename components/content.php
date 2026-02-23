<# 

This is a reusable snippet for rendering the main content of a page.

#>

<# 

We can wrap the entire title section and assign the "am-block" class in order
to nicely integrate the content with the content that is provided 
by the "+main" block editor field below.

#>
<section class="am-block">
	<h1>@{ title }</h1>
	<@ if @{ date } or @{ tags } @>
		<div class="kit-subtitle">
			<# 

			The next block formats a page date based on the selected format string
			and wraps it inside a <p> tag. This way we can add the wrapping <p>
			ONLY whenever the formatted date is NOT an empty string and therefore
			avoid empty lines showing up under the title.

			#>
			@{ date | 
				dateFormat (@{ selectPageDateFormat | def('M Y') }, @{ :lang }) | 
				replace('/(.+)/', '<p>$1</p>') 
			}
		
			<@ if @{ tags } @>
				<p>
					<# 
			
					We can iterate all page tags by using the
					"foreach in tags" statement. ":i" is the current index
					inside that tags array and ":tag" refers to the current tag.
		
					#>
					<@ foreach in tags ~@>
						<@ if @{ :i } > 1 @>, <@ end @>@{ :tag }
					<@~ end @>
				</p>
			<@ end @>
		</div>
	<@ end @>
</section>

@{ +main }
