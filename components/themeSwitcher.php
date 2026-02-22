<@~ if @{ selectColorTheme | def ('switcher') } = 'switcher' ~@>
	<au-theme-switcher>
		<au-theme-switcher-dark>
			<@ icon { name: 'dark' } @>
		</au-theme-switcher-dark>	
		<au-theme-switcher-light>
			<@ icon { name: 'light' } @>
		</au-theme-switcher-light>	
	</au-theme-switcher>
<@~ end @>
