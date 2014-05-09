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
            <?php
            session_start();
            if(isset($_SESSION['negmsg'])){
                    echo '<div id="negmsg">'.$_SESSION['negmsg'].'</div>';
                  unset($_SESSION['negmsg']);
              }  
              ?>
        <div id="content">       
            <?php
            if($_SESSION['allcorrect']!=4){
                header("Location: index.php");
            }           
            ?>
            <form method="post" action="dataverify.php">
                <fieldset>
                    <table>
                        <thead>
                        <th colspan="2">Dane bazy danych </th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nazwa bazy danych</td>
                                <td>
                                    <input type="text" name="namedb"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Host</td>
                                <td>
                                    <input type="text" name="hostdb"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Nazwa urzytkownika</td>
                                <td>
                                    <input type="text" name="userdb"/>
                                </td>
                            </tr>
                             <tr>
                                <td>Hasło</td>
                                <td>
                                    <input type="password" name="passdb"/>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    <table>
                        <thead>
                        <th colspan="2">Dane administratora</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nazwa urzytkownika</td>
                                <td>
                                    <input type="text" name="adminname" />
                                </td>
                            </tr>
                            <tr>
                                <td>Hasło</td>
                                <td>
                                    <input type="password" name="adminpass" />
                                </td>
                            </tr>
                            <tr>
                                <td>Powtórz hasło</td>
                                <td>
                                    <input type="password" name="adminpass2"/>
                                </td>
                            </tr>
                             <tr>
                                <td>Adres e-mail</td>
                                <td>
                                    <input type="text" name="adminemail" />
                                </td>
                            </tr>                          
                        </tbody>
                    </table>
                     <input type="submit" name="zapisz" value="Dalej"  /> 
                </fieldset>
            </form>
        </div>
            <footer>
                <p>Copyright Rafał Iwko</p>
            </footer>
            </div>
    </body>
</html>
