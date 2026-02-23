<# 

This snippet file is responsible to render any given pagelist into a grid of previews
consisting of the first found image inside the main content area and the page's title.

#>

<@ if @{ :pagelistCount } @>
	<section class="kit-pagelist">
		<# 
		
		All pages in a defined pagelist are iterated here.
		Pagelists can be defined using the "newPagelist" statement. 
		An example can be found in the "pagelist.php" template in
		the root of the repository.
		
		#>
		<@ foreach in pagelist @>
			<# 
   
			The ":img" variable is used in order to store the file path of the first found
			image in the "+main" field.

			Note that the leading colon ":" is used to mark a variable as an internal runtime
			variable that is not exposed to the user interface in the dashboard.

			#>
			<@ set { :img: @{ +main | findFirstImage | def(false) } } @>

			<a href="@{ url }">
				<# 
	   
				The "with" statement can be used to "do something" with a file or page
				as long it exists. So here we want to create a small preview image with a maximum
				width of 500px. The resized image can be referenced using the ":fileResized"
				runtime variable.
		
				#>
				<@ with @{ :img } { width: 500 } @>
					<img src="@{ :fileResized }" />
				<@ end @>

				<div><strong>@{ title }</strong></div>	
				<#
					
				As preview text we can extract the first paragraph of text of the "+main"
				field using the "findFirstParagraph" function and shorten it then to 100 characters.	
			
				#>
				<p>@{ +main | findFirstParagraph | 180 }</p>
			</a>
		<@ end @>
	</section>
<@ end @>
