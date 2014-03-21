<?php
require_once("../phpmailer/class.phpmailer.php");
 function sendmail($addres,$pass, $codeid){
            $mail = new \PHPMailer(true);
            $mail->IsSMTP();
            try{
                $mail->SMTPAuth = true;
                $mail->Subject= "Weryfikacja konta";
                $mail->SetFrom("5226303@gmail.com", "Rafal Iwko");
                $mail->Username = "5226303@gmail.com";
                $mail->Password = "kcg5w3jx7k";
                $mail->Host = "smtp.gmail.com";
                $mail->SMTPSecure = "ssl";
                $mail->Port = 465;
                $mail->SMTPDebug = 1;
                $mail->AddAddress($addres);
                $mail->MsgHTML("Twoje nowe hasło to ".$pass."
                    <br><a href='http://localhost/My-CMS/ri.class/Scripts/login.php?action=verification&codeid=".$codeid."&change=".$pass."'>Akceptuj nowe haslo</a>");
                $mail->Send();
            }catch (phpmailerException $e){
                $e->errorMessage();
            }
        }

?>