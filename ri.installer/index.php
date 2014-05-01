<!doctype html>
<html>
    <head>
        <title>Instalacja</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" type="text/css" href="install.css"/>
    </head>
    <body>
        <div id="container">
            <header>
                
                <h1>Instalacja</h1>


           </header>
        <div id="content">       
<?php
    session_start();
    require_once './check.php';
    $allCorect=0;
    checkPhpVersion($allCorect);
    checkMysqlLoadet($allCorect);
    checkFileSaved("ri.files", $allCorect);
    checkFileSaved(".private", $allCorect);
    if($allCorect==4)
        echo '<a href="step2.php">&gt&gt&gt</a>';
    $_SESSION['allcorrect']=$allCorect;
?>
        </div>
            <footer>
                <p>Copyright Rafał Iwko</p>
            </footer>
            </div>
    </body>
</html>
