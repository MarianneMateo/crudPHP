<?php include 'template/header.php' ?>

<?php
  include_once 'model/db.php';
  $sentence = $bd-> query("SELECT * FROM person");
  $person = $sentence-> fetchAll(PDO::FETCH_OBJ); // fetchAll devuelve todos los registros de la consulta en forma de un array
  //FETCH_OBJ es una constante de PDO que nos permite devolver los registros en forma de objetos
  /* print_r($person); */
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">

  <!--- Alert --->
    <?php 
      if(isset($_GET['message']) and $_GET['message'] == 'falta'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show="alert">
      <strong>Error!</strong> Please fill all the fields.
      <button type="button" class="btn-close" data-bs-dismiss="aleraria-label="Close"></button>
      </div>
      <?php 
          }
    ?>


            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'registered'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registered!</strong> The person has been registered.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> The person has not been registered.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'edited'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Edited!</strong> The person has been edited.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['message']) and $_GET['message'] == 'deleted'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Deleted!</strong> The person has been deleted.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 
  <!--- End Alert --->

      <div class="card">
        <div class="card-header">
          List of Persons
        </div>
          <div class="p-4">
            <table class="table align-middle">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Age</th>
                  <th scope="col">Sign</th>
                  <th scope="col" colspan="2">Options</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  foreach ($person as $data) {
                ?>
                <tr>
                  <td scope="row"><?php echo $data -> id; ?></td>
                  <td><?php echo $data -> name; ?></td>
                  <td><?php echo $data -> age; ?></td>
                  <td><?php echo $data -> sign; ?></td>
                  <td><a class="text-success" href="edit.php?id=<?php echo $data->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                  <td><a onclick="return confirm('Are you sure you want to delete this?');" class="text-danger" href="delete.php?id=<?php echo $data->id; ?>"><i class="bi bi-trash"></i></a></td>
                </tr>
                <?php
                  }
                ?>
              </tbody>
            </table>
          </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Enter Data
        </div>
        <form class='p-4' method="POST" action='register.php'>
          <div class="mb-3">
            <label class="form-label">Name:</label>
            <input type="text" class="form-control" name='txtName' autofocus>
          </div>
          <div class="mb-3">
            <label class="form-label">Age:</label>
            <input type="number" class="form-control" name='txtAge' autofocus>
          </div>
          <div class="mb-3">
            <label class="form-label">Sign:</label>
            <input type="text" class="form-control" name='txtSign' autofocus>
          </div>
          <div class="d-grid">
            <input type="hidden" name="hidden" value="1">
            <input type="submit" class="btn btn-primary" value='Submit'>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php' ?>