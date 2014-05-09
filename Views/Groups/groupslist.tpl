<table id="userslist">
    <thead>
        <tr>
            <th>lp.</th>
            <th>Nazwa</th>
            <th>Akcje</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$role item=group name=groups}
            <tr>
                <td>{$smarty.foreach.groups.iteration}</td>
                <td>{$group.name}</td>
                <td>
                {if $group.id neq 1 }
                    <a href="/groups/roleedit/{$group.id }">Edytuj </a>
                {/if}
                {if $group.id neq 1 AND $group.id neq 2}
                    <a onclick="confirm('Czy na pewno chcesz usunąć tą grupę?')" href="/ri.class/Scripts/EditGroups.php?action=del&id={$group.id}">Usuń</a>           
                {/if}
                </td>
            </tr>
        {/foreach}
        <tr>
    <form action="/ri.class/Scripts/EditGroups.php" method="post">
        <td>Dodaj grupe</td>
        <td><input type="text" name="groupname"/></td>
        <td><input type="submit" name="addgroup" value="Dodaj"/></td>
    </form>
        </tr>
    </tbody>
</table>