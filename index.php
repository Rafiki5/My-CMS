<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>My-CMS</title>
        
        <link type="text/css" rel="stylesheet" href="/My-CMS/ri.css/Loginstyle.css"/>
        <link type="text/css" rel="stylesheet" href="/My-CMS/ri.css/containerstyle.css"/>
        <script type="text/javascript" src="/My-CMS/ri.js/jquery-1.8.0.js"></script>
        <script type="text/javascript" src="/My-CMS/ri.js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="/My-CMS/ri.js/tinymceinit.js"></script>
    </head>
    <body>
        <div class="container">
        <header>
            <?php
                require_once 'Controllers/DefaultController.php';
                require_once 'Controllers/AdminController.php';
                require_once 'Controllers/PagesController.php';
                require_once 'ri.class/Scripts/isLogged.php';
                session_start();
                isLogin();
            ?>
        
        </header>
              <?php
              
              if(isset($_SESSION['negmsg'])){
                  echo "<p id='negmsg'>".$_SESSION['negmsg']."</p>" ;
                  unset($_SESSION['negmsg']);
              }   
              if(isset($_SESSION['posmsg'])){
                 echo "<p id='posmsg'>".$_SESSION['posmsg']."</p>" ; 
                 unset($_SESSION['posmsg']);
              }             
              ?>
        <article>
        <?php

    $controller = isset($_REQUEST['controller'])?$_REQUEST['controller']:'';
    $controller = ucfirst(strtolower($controller));
    $action = isset($_REQUEST['action'])?$_REQUEST['action']:'';
    $action = strtolower($action);
    $id = isset($_REQUEST['id'])?$_REQUEST['id']:'';
    $dc = new DefaultController();
    if(!$controller){ 
        echo $dc->getPage();
    }else{
        $controller = $controller."Controller";
        if(!class_exists($controller) || !method_exists($controller, $action)){
            $name  = str_replace("/My-CMS/", "", $_SERVER['REDIRECT_URL']);
            $dc->getPageByName($name);
        }else{
            $c = new $controller();
            if(!$id)
                $c->$action();
            else
                $c->$action($id);
        }   
    }
    ?>
                </article>
            <footer>
                <p>Copyright Rafał Iwko</p>
            </footer>
            </div>
    </body>
</html>

    

