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
                if(!file_exists("../.private/config.php"))
                    header("Location: index.php");
            ?>
            <p>Instalacja zakończona pomyślnie</p>
            <p>Aby przejść do systemu kliknij <a href="../index.php">Tutaj</a></p>
        </div>
            <footer>
                <p>Copyright Rafał Iwko</p>
            </footer>
            </div>
    </body>
</html>

