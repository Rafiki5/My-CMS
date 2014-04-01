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
                {if $group.id neq 1 AND $group.id neq 2}
                <td><a href="/My-CMS/ri.class/Scripts/EditGroups.php?action=del&id={$group.id}">Usuń</a></td>
                {/if}
            </tr>
        {/foreach}
        <tr>
    <form action="/My-CMS/ri.class/Scripts/EditGroups.php" method="post">
        <td>Dodaj grupe</td>
        <td><input type="text" name="groupname"/></td>
        <td><input type="submit" name="addgroup" value="Dodaj"/></td>
    </form>
        </tr>
    </tbody>
</table>