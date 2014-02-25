<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>My-CMS</title>
        <link type="text/css" rel="stylesheet" href="ri.css/reset.css"/>
        <link type="text/css" rel="stylesheet" href="/My-CMS/ri.css/Loginstyle.css"/>
    </head>
    <body>
        <header>
            <?php
                require_once 'Controllers/DefaultController.php';
                require_once 'Controllers/AdminController.php';
                require_once 'ri.class/isLogged.php';
                session_start();
                isLogin();
                
            ?>
        </header>
        <?php


    $controller = isset($_REQUEST['controller'])?$_REQUEST['controller']:'';
    $controller = ucfirst(strtolower($controller));
    $action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
    $action = strtolower($action);
    if(!$controller || !$action){
        $dc = new DefaultController();
        echo $dc->getPage();
    }else{
        $controller = $controller."Controller";
        $dc = new $controller();
        $dc->$action();
    }
    ?>
    </body>
</html>

    

