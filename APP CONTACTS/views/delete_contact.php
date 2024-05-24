<?php

include_once '../controller/ContactController.php';
$contactController = new ContactController();
$contactController->redirectToDelete($_GET['id']);
?>
