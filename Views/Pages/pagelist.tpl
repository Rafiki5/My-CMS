
<ul id="page-list">Lista utworzonych stron
    {if $pages}
    {foreach from=$pages item=page}
        <li><a href="/pages/pageslist/{$page.id}">{$page.name}</a></li>
    {/foreach}
    {/if}
    <li><a href="/pages/pageslist">Dodaj nową stronę</a> </li>
</ul>     
<form id="pages" method="post" action="/ri.class/Scripts/EditPage.php">
    <fieldset>
        <legend>Edytowanie stron</legend>
        <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Dane podstawowe</a></li>
            {if isset($title)}
            <li><a href="#tabs-2">{$title}</a></li>
            {/if}
        </ul>
   
        <table id="tabs-1">
            <tr><td>
        
        <label>Tytuł strony<br>
            <input maxlength="25" type="text" name="title" value="{if $content}{$content.title}{/if}"/>
        </label><br>
        <label>Nazwa strony<br>
            <input maxlength="25" type="text" name="name" value="{if $content}{$content.name}{/if}"/>
        </label>
        </td><td>
        <label id="check">
            <input {if $content and $content.id eq 1}disabled {/if} {if $content and $content.pactive}checked{/if} type="checkbox" name="activepage"/>Dostępność strony<br>
            <input {if $content and $content.mactive} checked {/if}type="checkbox" name="activemenu"/>Widoczność strony w menu<br>
        </label>
        </td></tr><tr><td colspan="2">
        <label>Treść strony<br>
            <textarea id="create-page" name="body" rows="20" cols="60">
{if $content}
{$content.body}
{/if}
</textarea>
        </label><br>
        {if $content}
            <input type="hidden" name="id" value="{if $content}{$content.id}{/if}"/>
            <input type="submit" name="editpage" value="Edytuj stronę"/>
            <input {if $content && $content.id eq 1}disabled {/if} type="submit" name="deletepage" value="Usuń stronę"
                   onclick="return confirm('Czy na pewno chcesz usunąć tę strone?')"/>
        {else}
            <input type="submit" name="addpage" value="Dodaj stronę"/>
        {/if}
        </td></tr>
        </table>
        {if isset($path)}
            {include file="{$path}"}
        {/if}
        </div>
    </fieldset>
</form>

