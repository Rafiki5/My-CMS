<!doctype html>
<html>
    <head>
        <title>czat</title>
        <meta charset="UTF-8"/>
        <script type="text/javascript" src="/My-CMS/ri.js/jquery-1.8.0.js"></script>
        <script type="text/javascript" src="/My-CMS/ri.js/ajaxchat.js"></script>
        <style>
            
            #chat{
                width: 200px;
                height: 300px;
                background: yellow;
            }
        </style>
    </head>
    <body>
<div id="chat">
    <div id="messages">
        <?php 
        include_once 'get.php';
    ?>
    </div>
    
    <form id="chatform" method="post" action="send.php">
        <input id="message" type="text" maxlength="250" name="message"/>
        <input type="submit" name="send" value="Wyślij"/>
    </form>
</div>
 </body>
</html>


