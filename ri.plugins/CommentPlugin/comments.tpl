{if $comments}
    {foreach from=$comments item=comment}
        <div class="comment">
            <p class="author">{$comment.author}</p>
            <p>{$comment.text}</p>
        </div>
    {/foreach}
{/if}
<form id="create-comment" method="post" action="/ri.plugins/CommentPlugin/PluginFunction.php">
    <fieldset>
        <legend>Komentuj</legend>
        <p>Nazwa urzytkownika: <br>
            <input type="text" name="username" value="{$username}"/>
        </p>
        <p>Komentarz: <br>
            <textarea name="comment" cols="50" rows="10"></textarea>
        </p>
        <input type="hidden" name="id" value="{$page.id}"/>
        <input type="submit" name="savecomment" value="Komentuj"/>
    </fieldset>
    
</form>