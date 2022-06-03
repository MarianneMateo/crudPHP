<?php
if (!isset($_GET['id'])) {
	header('Location: index.php?message=error');
	exit();
}

include 'model/db.php';
$id = $_GET['id'];

$sentence = $bd->prepare('DELETE FROM person where id = ?;');
$result = $sentence->execute([$id]);

if ($result) {
	header('Location: index.php?message=deleted');
} else {
	header('Location: index.php?message=error');
}

?>