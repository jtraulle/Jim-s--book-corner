<div class="pagination">
	<ul>
		{if $pageCourante != 1 }
		<li class="prev"><a href="?module={$module}&action=index&page={$pageCourante-1}">&larr; Précédent</a></li>
		{else}
		<li class="prev disabled"><a href="#">&larr; Précédent</a></li>
		{/if}

  		{section name=pages loop=$totalPages}
  		{if $pageCourante == $smarty.section.pages.iteration }
  		<li class="active"><a href="?module={$module}&action=index&page={$smarty.section.pages.iteration}">{$smarty.section.pages.iteration}</a></li>
  		{else}
  		<li><a href="?module={$module}&action=index&page={$smarty.section.pages.iteration}">{$smarty.section.pages.iteration}</a></li>
  		{/if}
		{/section}

		{if $pageCourante < $totalPages }
		<li class="prev"><a href="?module={$module}&action=index&page={$pageCourante+1}">Suivant &rarr;</a></li>
		{else}
		<li class="prev disabled"><a href="#">Suivant &rarr;</a></li>
		{/if}
	</ul>
</div>