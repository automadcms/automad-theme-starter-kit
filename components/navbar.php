<# 

This is the navbar component. 
This component uses the "checkboxShowPageInNavbar" field in order
to build the customizable list of links that are displayed in the navbar.

Also here the "@{ checkboxShowPageInNavbar }" comment is used to 
expose the checkbox to the dashboard.

#>

<# @{ checkboxShowPageInNavbar } #>

<# 

The "navbarLinks" snippet is defined separately in order to 
have a cleaner structure and mor readable component. 
It is invoked down below inside the <nav> tag.

#>
<@~ snippet navbarLinks @>
	<# 

	Let's build a pagelist including only pages that have the
	"checkboxShowPageInNavbar" toggle checked.

	#>
	<@~ newPagelist { 
		excludeHidden: false, 
		match: '{ "checkboxShowPageInNavbar": "/./" }' 
	} ~@>
	<@ if @{ :pagelistCount } @>
		<div class="kit-navbar__links">
			<@ foreach in pagelist ~@>
				<a href="@{ url }" class="kit-navbar__link <@ if @{ :current } @>kit-navbar__link--active<@ end @>">
					@{ title }
				</a>
			<@~ end ~@>
		</div>
	<@ end @>
<@ end ~@>

<nav class="kit-layout__navbar kit-navbar">
	<# 

	The brand element provides a home link including any HTML, SVG or text content.
	It is very important to understand that "<@ with '/' @>@{ url }<@ end @>" is used 
	here as href value. This is needed in order to correctly relsolve the homepage 
	of a multilingual site like for example "/en" or "/de". The "/" refers in that context
	to the root page of the determined language.

	

	#>
	<a href="<@ with '/' @>@{ url }<@ end @>" class="kit-navbar__brand">
		<# 
		   
		We use the content of the brand field, either on page level or global site level
		as content for the brand element. If neither is defined, the "def" function is 
		used to provide a default value as fallback, here the sitename.

		#>
		@{ brand | def (@{ sitename }) }
	</a>

	<div class="kit-navbar__menu">
		<@ navbarLinks @>
		<@ search.php @>
		<@ themeSwitcher.php @>
	</div>
</nav>
