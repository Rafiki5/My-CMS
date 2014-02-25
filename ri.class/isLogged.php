<?php

function isLogin(){
    if (isset($_SESSION['userdata'])){
        $menu="
        <ul>
        <li><a href='admin/adminpage'>Moje konto</a></li>
        <li><a href='/My-CMS/ri.class/Login.php?action=logout'>Wyloguj</a></li>
        </ul>";
        echo $menu;       
        
    }
}
?>
