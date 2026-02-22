<au-search 
	src="/_api/public/pagelist" 
	context="@{ origUrl }" 
	class="kit-search"
	key="k"
>
	<au-search-toggle class="kit-search__toggle" title="Ctrl + k">
		<@ icon { name: 'search' } @>
	</au-search-toggle>
	<au-search-dialog class="kit-search__dialog" class:loading="loading">
		<au-search-form class="kit-search__form">
			<input class="kit-search__input" type="search" placeholder="Search ..." />
		</au-search-form>
		<au-search-results class="kit-search__results" class:selected="selected">
			<a href="{{ url }}" class="kit-search__results-item">
				<div class="kit-search__results-title">{{ title }}</div>
				<small class="kit-search__results-description">
					{{ :searchResultsContext | +hero | +main }}
				</small>
			</a>
		</au-search-results>
		<au-search-no-results>
			<small>
				Nothing found.
			</small>
		</au-search-no-results>
	</au-search-dialog>
</au-search>
