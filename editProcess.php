<?php
print_r($_POST);
if (!isset($_POST['id'])) {
	header('Location: index.php?message=error');
	exit();
}
include_once 'model/db.php';
$id = $_POST['id'];
$name = $_POST['txtName'];
$age = $_POST['txtAge'];
$sign = $_POST['txtSign'];
$sentence = $bd->prepare(
	'UPDATE person SET name = ?, age = ?, sign = ? WHERE id = ?'
);
$result = $sentence->execute([$name, $age, $sign, $id]);
if ($result) {
	header('Location: index.php?message=edited');
	exit();
} else {
	header('Location: index.php?message=error');
	exit();
}
?>