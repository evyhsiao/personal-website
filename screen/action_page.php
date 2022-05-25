<?php
require_once "../pdo.php";

$name = "匿名";
$email = "匿名";
$msg = "";
$date = "";

if (isset($_GET['msg']) && $_GET['msg'] != '') {
    $msg = htmlentities($_GET['msg']);
    if (isset($_GET['name']) && $_GET['name'] != '') {
        $name = htmlentities($_GET['name']);
    }
    if (isset($_GET['email']) && $_GET['email'] != '') {
        $email = htmlentities($_GET['email']);
    }
    if (isset($_GET['date']) && $_GET['date'] != '') {
        $date = str_replace("T", " ", htmlentities($_GET['date']));
    }

    $stmt = $pdo->prepare('INSERT INTO msg (name, email, messages, date) VALUES (:name, :email, :msg, :date)');
    $stmt->execute(array(
        ':name' => $name,
        ':email' => $email,
        ':msg' => $msg,
        ':date' => $date
    ));


    header("Location: ./contact.php");
    return;
}
