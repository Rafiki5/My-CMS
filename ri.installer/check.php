<?php
function checkPhpVersion(&$array){
    if(file_exists("../.private/config.php"))
        exit;
    if (version_compare(PHP_VERSION, '5.5.9', '<')){
        echo '<p class="error">Wymagana minimalna wersja php to 5.5.9</p>';        
    }else{
         echo '<p class="correct">Twoja wersja php spełnia wymagania</p>';
        $array++;
    }
   
}
function checkMysqlLoadet(&$array){
    if(file_exists("../.private/config.php"))
        exit;
    if(extension_loaded('pdo_mysql')){
        echo '<p class="correct">Biblioteka mysql jest włączona</p>';
        $array++;
    }else
        echo '<p class="error">Biblioteka mysql nie jest włączona</p>';
}
function checkFileSaved($dirname, &$array){
    if(file_exists("../.private/config.php"))
        exit;
    @mkdir("../".$dirname);
    file_put_contents("../".$dirname."/test", "test");
    if(file_exists("../".$dirname."/test")){
        echo '<p class="correct">Zapis do folderu '.$dirname.' z plikami jest możliwy</p>';
        unlink("../".$dirname."/test");
        $array++;
    }else
    if(!is_dir("../".$dirname)){
        echo '<p class="error">Katalog '.$dirname.' nie istnieje. Utwórz go.</p>';
    }else
        echo '<p class="error">Brak dostępu do katalogu</p>';
}
?>