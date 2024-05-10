<?php
// Redirect to the deleteContactController method for handling contact deletion
include_once '../controller/ContactController.php';
$contactController = new ContactController();
$contactController->redirectToDelete($_GET['id']);
?>
