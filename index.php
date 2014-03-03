<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>My-CMS</title>
        <link type="text/css" rel="stylesheet" href="/My-CMS/ri.css/reset.css"/>
        <link type="text/css" rel="stylesheet" href="/My-CMS/ri.css/Loginstyle.css"/>
        <link type="text/css" rel="stylesheet" href="/My-CMS/ri.css/containerstyle.css"/>
    </head>
    <body>
        <div class="container">
        <header>
            <?php
                require_once 'Controllers/DefaultController.php';
                require_once 'Controllers/AdminController.php';
                require_once 'ri.class/isLogged.php';
                session_start();
                isLogin();
                
            ?>
        
        </header>
            <article>
        <?php

    $controller = isset($_REQUEST['controller'])?$_REQUEST['controller']:'';
    $controller = ucfirst(strtolower($controller));
    $action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
    $action = strtolower($action);
    $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
    if(!$controller || !$action){
        $dc = new DefaultController();
        echo $dc->getPage();
    }else{
        $controller = $controller."Controller";
        $c = new $controller();
        if(!$id)
            $c->$action();
        else
            $c->$action($id);
            
    }
    ?>
                </article>
            <footer>
                <p>Copyright Rafał Iwko</p>
            </footer>
            </div>
    </body>
</html>

    

