
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
        <td>{$user[i].role}</td>
        <td><a href="/My-CMS/admin/user/{$user[i].id}">Edytuj</a></td>
        </tr>
            {/section}
    </tbody>


</table>