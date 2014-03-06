<?php

function isLogin(){
    if (isset($_SESSION['userdata'])){
        $menu="
        <ul id='right-menu'>
        <li><a href='/My-CMS/pages/pageslist'>Strony</a></li>
        <li><a href='/My-CMS/admin/userslist'>Urzytkownicy</a></li>
        <li><a href='/My-CMS/ri.class/Login.php?action=logout'>Wyloguj</a></li>
        </ul>";
        echo $menu;            
    }else{
        $menu="
        <ul id='right-menu'>
        <li><a href='/My-CMS/admin/login'>Zaloguj się</a></li>
        </ul>";
        echo $menu;
    }
    
}
?>
