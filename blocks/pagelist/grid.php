<@ if @{ :pagelistCount } @>
	<section class="kit-pagelist">
		<@ foreach in pagelist @>
			<@ set { :img: @{ +main | findFirstImage | def(false) } } @>
			<a href="@{ url }">
				<@ with @{ :img } { width: 500 } @>
					<img src="@{ :fileResized }" />
				<@ end @>
				<div><strong>@{ title }</strong></div>	
				<p>@{ +main | findFirstParagraph | 180 }</p>
			</a>
		<@ end @>
	</section>
<@ end @>
