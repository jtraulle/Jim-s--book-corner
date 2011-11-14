{if isset($login) }
Connecté:{$login} <a href='?module=login&action=deconnect'>Logout</a>
{else}
<form action='?module=login&action=login' method='post'>
	<input type='text' name='Login'>
	<input type='password' name='Pass'>
	<input type='submit' value='Login'>
</form>
{/if}