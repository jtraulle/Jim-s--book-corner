<div class="centrer">
<div class="pagination center">
	<ul>
		{if $totalPages > 10 }

			{assign var='nbPagesApres' value=$totalPages-$pageCourante}
			{assign var='nbPagesAvant' value=$pageCourante-1}

			{if $pageCourante != 1 }
				<li class="prev"><a href="?module={$module}&action=index&page={$pageCourante-1}">&larr; Précédent</a></li>
			{else}
				<li class="prev disabled"><a href="#">&larr; Précédent</a></li>
			{/if}

			{if $nbPagesAvant < 8}
				{section name=pages start=1 loop=$pageCourante}
			  			<li><a href="?module={$module}&action=index&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a></li>
				{/section}
				<li class="active"><a href="?module={$module}&action=index&page={$pageCourante}">{$pageCourante}</a></li>
				{section name=pages start=$pageCourante+1 loop=18}
			  			<li><a href="?module={$module}&action=index&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a></li>
				{/section}				
			{elseif $nbPagesApres < 8}
				{section name=pages start=$pageCourante-(18-$nbPagesApres-2) loop=$pageCourante}
			  			<li><a href="?module={$module}&action=index&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a></li>
				{/section}
				<li class="active"><a href="?module={$module}&action=index&page={$pageCourante}">{$pageCourante}</a></li>
				{section name=pages start=$pageCourante+1 loop=$totalPages+1}
			  			<li><a href="?module={$module}&action=index&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a></li>
				{/section}
			{else}
				{section name=pages start=$pageCourante-8 loop=$pageCourante}
			  			<li><a href="?module={$module}&action=index&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a></li>
				{/section}
				<li class="active"><a href="?module={$module}&action=index&page={$pageCourante}">{$pageCourante}</a></li>
				{section name=pages start=$pageCourante+1 loop=$pageCourante+9}
			  			<li><a href="?module={$module}&action=index&page={$smarty.section.pages.index}">{$smarty.section.pages.index}</a></li>
				{/section}
			{/if}

			{if $pageCourante < $totalPages }
				<li class="prev"><a href="?module={$module}&action=index&page={$pageCourante+1}">Suivant &rarr;</a></li>
			{else}
				<li class="prev disabled"><a href="#">Suivant &rarr;</a></li>
			{/if}

		{else}

			{if $pageCourante != 1 }
				<li class="prev"><a href="?module={$module}&action=index&page={$pageCourante-1}">&larr; Précédent</a></li>
			{else}
				<li class="prev disabled"><a href="#">&larr; Précédent</a></li>
			{/if}

	  		{section name=pages loop=$totalPages}
		  		{if $pageCourante == $smarty.section.pages.iteration}
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
		{/if}
	</ul>
</div>
</div>