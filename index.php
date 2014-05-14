<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>My-CMS</title>
        
        <link type="text/css" rel="stylesheet" href="/ri.css/Loginstyle.css"/>
        <link type="text/css" rel="stylesheet" href="/ri.css/containerstyle.css"/>
        <link type="text/css" rel="stylesheet" href="/ri.js/jquery-ui-1.10.4.custom/css/smoothness/jquery-ui-1.10.4.custom.css"/>
        <script type="text/javascript" src="/ri.js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="/ri.js/jquery-ui-1.10.4.custom/js/jquery-ui-1.10.4.custom.js"></script>
        <script type="text/javascript" src="/ri.js/tinymce/tinymce.min.js"></script>
        <script type="text/javascript" src="/ri.js/tinymceinit.js"></script>
        <script type="text/javascript" src="/ri.js/ajaxchat.js"></script>
            
        <script type="text/javascript" src="/ri.js/script.js"></script>
    </head>
    <body>
        <div class="container">
        <header>
            <?php
            //ini_set(E_ALL);
                require_once 'Controllers/DefaultController.php';
                require_once 'Controllers/AdminController.php';
                require_once 'Controllers/PagesController.php';
                require_once 'Controllers/GroupsController.php';
                require_once 'ri.class/Scripts/isLogged.php';
                require_once 'Controllers/PluginsController.php';
                require_once 'ri.class/Scripts/setPlugin.php';
                require 'Benchmark/Timer.php';
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
        $b = new Benchmark_Timer();
        $b->start();
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
            $name  = $_SERVER['REDIRECT_URL'];
            $name = str_replace("/", "", $name);
            $dc->getPageByName($name);
        }else{
            $c = new $controller();
            if(!$id)
                $c->$action();
            else
                $c->$action($id);
        }   
    }
    
    $b->stop(); 
    //$b->display();
    ?>
                </article>
            <footer>
                <p>Copyright Rafał Iwko</p>
            </footer>
            </div>
    </body>
</html>

    

