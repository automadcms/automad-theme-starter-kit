<# 

The sidebar component renders the navigation tree.

#>

<@~ snippet isActive @>
	<@~ if @{ :current } @> kit-sidebar__item--active<@ end @>
<@~ end @>

<@~ snippet sidebarLink ~@>
	<a href="@{ url }" class="kit-sidebar__item<@ isActive @>">
		@{ title }
	</a>
<@~ end @>

<# 

A navigation tree has a recursive structure that consists of a tree
that contains nodes that can contain other trees.

#>
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

<# 

This defines a tree that renders child nodes of the currently iterated context.

#>
<@~ snippet tree ~@>
	<@ newPagelist {
		context: false,
		type: 'children'
	} ~@>

	<@~ foreach in pagelist @>
		<@~ treeNode ~@>
	<@ end ~@>
<@~ end @>

<# 

This is the actual wrapping navigation snippet.
In this component it is placed inside a details element in 
order to create a responsive menu that converts to a dropdown
on small devices.

#>
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
