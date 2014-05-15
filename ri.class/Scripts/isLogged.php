<?php

function isLogin(){
    if (isset($_SESSION['userdata'])){
        $menu="
        <ul id='right-menu'>
        <li><a href='/'>Strona Główna</a></li>
        <li><a href='/pages/pageslist'>Strony</a></li>
        <li><a href='/plugins/pluginslist'>Wtyczki</a></li>
        <li><a href='/admin/userslist'>Urzytkownicy</a></li>
        <li><a href='/ri.class/Scripts/Login.php?action=logout'>Wyloguj</a></li>
        </ul>";
        echo $menu;            
    }else{
        $menu="
        <ul id='right-menu'>
        <li><a href='/'>Strona Główna</a></li>
        <li><a href='/admin/login'>Zaloguj się</a></li>
        <li><a href='/admin/registeruser'>Zarejestruj się</a></li>
        </ul>";
        echo $menu;
    }
    
}
?>
