<form id="login" action="/My-CMS/ri.class/EditUser.php" method="POST">
    <fieldset>
        <legend>Edytuj Urzytkownika</legend>
        <label>Nazwa urzytkownika <br>
            <input type="text" name="username" value="{$user.username}"/><br>
        </label>
        <label>E-mail <br>
            <input type="text" name="email" value="{$user.email}"/><br>
        </label>
        <label>Role <br>
            <input type="text" name="role" value="{$user.role}"/><br>
        </label>
        <input type="hidden" name="id" value="{$user.id}"/>
        <input type="submit" name="edit" value="Edytuj"/>
        <input type="submit" name="delete" value="Usuń urzytkownika"
               onclick="return confirm('Czy na pewno chcesz usunąć tego urzytkownika?')"/>
        <input formaction="/My-CMS/admin/changepass" type="submit" name="editpassword" value="Zmień hasło"/>
    </fieldset>
</form>