<?php
require_once '../Database.php';
session_start();
$database = new Database();
$message = $_POST['message'];
$id_sender = $_SESSION['userdata']['id'];
$database->fetchOne("insert into messages (id_sender, message) value (?, ?)", array($id_sender, htmlspecialchars($message))); 
header("Location: get.php");