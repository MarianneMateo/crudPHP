<?php
/* print_r($_POST); */
if (
	empty($_POST['hidden']) ||
	empty($_POST['txtName']) ||
	empty($_POST['txtAge']) ||
	empty($_POST['txtSign'])
) {
	header('Location: index.php?message=falta'); // Redirecting To Home Page
	exit();
}

include_once 'model/db.php';
$name = $_POST['txtName'];
$age = $_POST['txtAge'];
$sign = $_POST['txtSign'];

$sentence = $bd->prepare(
	'INSERT INTO person (name, age, sign) VALUES (?, ?, ?)'
);
$result = $sentence->execute([$name, $age, $sign]);

if ($result) {
	header('Location: index.php?message=registered');
} else {
	header('Location: index.php?message=error');
  exit();
}
?>
