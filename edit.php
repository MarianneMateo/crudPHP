<?php include 'template/header.php'; ?>

<?php
if (!isset($_GET['id'])) {
	header('Location: index.php?message=error');
	exit();
} else {
	$id = $_GET['id'];
}

include_once 'model/db.php';
$id = $_GET['id'];
$sentence = $bd->prepare('SELECT * FROM person WHERE id = ?');
$sentence->execute([$id]);
$person = $sentence->fetch(PDO::FETCH_OBJ);

/* print_r($person); */
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Edit Data
        </div>
        <form class='p-4' method="POST" action='editProcess.php'>
          <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name='txtName' required value="<?php echo $person->name; ?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Age:</label>
            <input type="number" class="form-control" name='txtAge' required value="<?php echo $person->age; ?>">
          <div class="mb-3">
            <label class="form-label">Sign:</label>
            <input type="text" class="form-control" name='txtSign' required value="<?php echo $person->sign; ?>">
          </div>
          <div class="d-grid">
            <input type="hidden" name="id" value="<?php echo $person->id; ?>">
            <input type="submit" class="btn btn-primary" value='Edit'>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php'; ?>
