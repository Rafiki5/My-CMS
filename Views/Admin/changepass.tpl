<form id="login" method="POST" action="/ri.class/Scripts/EditUser.php">
    <fieldset>
        <legend>Zmiana hasła</legend>
        <label>Stare hasło   <br>
            <input type="password" name="oldpassword"/><br>
        </label>
        <label>Nowe hasło   <br>
            <input type="password" name="newpassword"/><br>
        </label>
        <label>Powtórz hasło   <br>
            <input type="password" name="repeatpassword"/><br>
        </label>
        <input type="hidden" name="id" value="{$id}"/>
        <input type="submit" name="changepass" value="Zmień hasło"/>
    </fieldset>
</form>