        <table id="tabs-2">
            <tbody>
                <tr>
                    <td colspan="2">
                        <input {if $commentactive}checked=""{/if} type="checkbox" name="commentactive"/>Zastosuj komentarze do tej strony
                    </td>
                    <td>
                        <input formaction="/ri.plugins/CommentPlugin/PluginFunction.php" type="submit" name="edit" value="Zapisz"/>
                    </td>
                </tr>
                {if $comments}
                {foreach from=$comments item=comment}
                    <tr>
                        <td>{$comment.author}</td>
                        <td class="commenttext"><p>{$comment.text}</p></td>
                        <td><a onclick="return confirm('Czy napewno chcesz usunąć ten komentarz?');" href="/ri.plugins/CommentPlugin/PluginFunction.php?id={$comment.id}&action=delete">Usuń</a></td>
                    </tr>
                {/foreach}
                {/if}
            </tbody>
        </table>