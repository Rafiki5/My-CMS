
<table id="userslist">
    <thead>
    <th>Użytkownik</th>
    <th>E-mail</th>
    <th>Role</th>
    <th>Akcje</th>
    </thead>
    <tbody>
        {section name=i loop=$user}
            <tr>
        <td>{$user[i].username}</td>
        <td>{$user[i].email}</td>
        {if !$user[i].role}
            <td></td>
        {else}<td>
            {foreach from=$user[i].role item=role}
                {$role}<br>
            {/foreach}
            </td>
        {/if}
        <td><a href="/admin/user/{$user[i].id}">Edytuj</a></td>
        </tr>
            {/section}
    </tbody>


</table>