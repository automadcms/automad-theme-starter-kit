<# 

This component renders a list of pages that share one or more tags with the current page.
We can compile of related page by using the "newPagelist" statement and setting the type to "related".

#>
<@ newPagelist { type: 'related', excludeCurrent: true } @>
<# 

Now we can reuse the page grid block template to render the pages.

#>
<@ ../blocks/pagelist/grid.php @>
