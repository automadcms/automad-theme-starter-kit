<# 

This component provides a search button including the related search dialog.
The entire search component, button and dialog, consists of a set of web components
that are included in the "automad-theme-ui-kit" NPM package.

More info about the package can be found here:
https://github.com/automadcms/automad-theme-ui-kit

#>
<au-search 
	src="/_api/public/pagelist" 
	context="@{ :origUrl }" 
	class="kit-search"
	key="k"
>
	<# 
   
	The actual search dialog trigger button.

	#>
	<au-search-toggle class="kit-search__toggle" title="Ctrl + k">
		<@ icon { name: 'search' } @>
	</au-search-toggle>

	<# 
	
	The search dialog contains a set of sub-components.	

	#>
	<au-search-dialog class="kit-search__dialog" class:loading="loading">
		<# 

		The search form must at least contain one input field.
	
		#>
		<au-search-form class="kit-search__form">
			<input class="kit-search__input" type="search" placeholder="Search ..." />
		</au-search-form>

		<# 
	   
		This is the template that is used to render each search result.
	
		#>
		<au-search-results class="kit-search__results" class:selected="selected">
			<a href="{{ url }}" class="kit-search__results-item">
				<div class="kit-search__results-title">{{ title }}</div>
				<small class="kit-search__results-description">
					{{ :searchResultsContext | +hero | +main }}
				</small>
			</a>
		</au-search-results>

		<# 

		An alternative fallback can be displayed when there are no matching pages.	
	
		#>
		<au-search-no-results>
			<small>
				Nothing found.
			</small>
		</au-search-no-results>
	</au-search-dialog>
</au-search>
