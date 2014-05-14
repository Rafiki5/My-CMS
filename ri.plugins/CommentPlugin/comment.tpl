        <table id="tabs-2">
            <tbody>
                <tr>
                    <td>
                        <input {if $commentactive}checked=""{/if} type="checkbox" name="commentactive"/>Zastosuj komentarze do tej strony
                    </td>
                    <td>
                        <input formaction="/ri.plugins/CommentPlugin/PluginFunction.php" type="submit" name="edit" value="Zapisz"/>
                    </td>
                </tr>
            </tbody>
        </table>