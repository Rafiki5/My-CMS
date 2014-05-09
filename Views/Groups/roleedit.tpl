<form id="editaction" method="post" action="/ri.class/Scripts/EditGroups.php">
    <table>
        <thead>
            <tr>
                <th>Opcje dostępu</th>
                <th>{$role.name}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Edycja stron</td>
                <td>
                    <input {if $role.action and in_array('useraction', $role.action)}checked=""{/if} name="action[]" type="checkbox" value="useraction"/>
                </td>
            </tr>
            <tr>
                <td>Edycja urzytkowników</td>
                <td>
                    <input {if $role.action and in_array('pageaction', $role.action)}checked=""{/if} name="action[]" type="checkbox" value="pageaction"/>
                </td>
            </tr>
        
        <input name="id" type="hidden" value="{$role.id}"/>       
        <tr>
            <td colspan="2">
                    <input name="editaction" type="submit" value="Edytuj"/> 
            </td>
        </tr>

    </tbody>
    </table>
</form>
