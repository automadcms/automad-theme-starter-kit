<# 

With the "snippet" statement we can define a snippet that can be used and overriden in templates.
Note that defining the snippet will not generate any output. A snippet has to be invoked by its 
name in order the actually render it like "<@ footer @>".

This is very useful in order to be able to inherit a template and just override a part of it.

#>
<@~ snippet footer ~@>
	<footer class="kit-layout__footer kit-footer am-block">
		<hr />
		<# 
   
		The previous/next navigation as well as the related pages live in
		their own components. We can simply import them with their relative
		file path.
		
		#>
		<@ prevNext.php @>
		<@ related.php @>

		<# 
   
		Now we want to iterate all pages and check if they should show up 
		in the navigation bar using the "match" option.

		In order to expose the checkbox inside the dashboard that can be toggled 
		by an editor we can simply add a comment with just the variable field as
		shown below. Then all pages that use this theme will have the checkbox available.

		#>
	
		<# Keep this comment: @{ checkboxShowPageInFooter} #>
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
		<# 
   
		We can wrap the footer content conditionally when not empty in its own "section".

		#>
		@{ +footer | replace ('/\\s*(.+)\\s*/is', '<section>$1</section>') }
	</footer>
<@~ end ~@>

<# 

We can now render the actual snippet as follows:

#>
<@ footer @>
