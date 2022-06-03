<?php
/* print_r($_POST); */
  if(empty($_POST['hidden']) || empty($_POST['txtName']) || empty($_POST['txtAge']) || empty($_POST['txtSign'])) { 
    header("Location: index.php?message=falta"); // Redirecting To Home Page
  }
?>