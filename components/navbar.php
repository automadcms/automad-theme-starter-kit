<# @{ selectShowPageInNavbar } #>

<@~ snippet navbarLinks @>
	<@~ newPagelist { 
		excludeHidden: false, 
		match: '{ "selectShowPageInNavbar": "/link/" }' 
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
	<a href="<@ with '/' @>@{ url }<@ end @>" class="kit-navbar__brand">@{ brand | def (@{ sitename }) }</a>
	<div class="kit-navbar__menu">
		<@ navbarLinks @>
		<@ search.php @>
		<@ themeSwitcher.php @>
	</div>
</nav>
