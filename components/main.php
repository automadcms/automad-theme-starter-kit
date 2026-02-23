<# 

Same as with other components, we first define a snippet that can be overriden 
and then invoke it a second step by using its name as statement.

#>
<@~ snippet main ~@>
	<main class="kit-layout__main">
		<# 
   
		Now we include the "content" component.

		#>
		<@ content.php @>
	</main>
<@~ end ~@>

<@ main @>
