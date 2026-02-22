<@~ snippet isActive @>
	<@~ if @{ :current } @> kit-sidebar__item--active<@ end @>
<@~ end @>

<@~ snippet sidebarLink ~@>
	<a href="@{ url }" class="kit-sidebar__item<@ isActive @>">
		@{ title }
	</a>
<@~ end @>

<@~ snippet treeNode ~@>
	<li class="kit-sidebar__node">
		<@ if @{ :pagelistCount } ~@>
			<details name="level-@{ :level }"<@ if @{ :currentPath } @> open<@ end @>>
				<summary class="kit-sidebar__item<@ isActive @>">
					<a href="@{ url }">
						@{ title }
					</a>
					<@ icon { name: 'right' } @>
				</summary>
				<ul class="kit-sidebar__tree">
					<@~ tree ~@>
				</ul>
			</details>
		<@ else @>
			<@ sidebarLink @>
		<@~ end ~@>
	</li>	
<@~ end @>

<@~ snippet tree ~@>
	<@ newPagelist {
		context: false,
		type: 'children'
	} ~@>

	<@~ foreach in pagelist @>
		<@~ treeNode ~@>
	<@ end ~@>
<@~ end @>

<@~ snippet sidebarNav @>
	<@ with '/' ~@>
		<ul class="kit-sidebar__tree">
			<@ if not @{ hidden } @>
				<li class="kit-sidebar__node"><@ sidebarLink @></li>	
			<@ end @>
			<@~ tree ~@>
		</ul>
	<@~ end @>
<@ end @>

<@~ snippet sidebar ~@>
	<aside class="kit-layout__sidebar">
		<details class="kit-sidebar">
			<summary class="kit-sidebar__toggle"><@ icon { name: 'menu' } @></summary>
			<@ sidebarNav @>
		</details>
	</aside>
<@~ end ~@>

<@ sidebar @>
