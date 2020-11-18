<?php require_once 'header.php' ?>

<?php require_once "config.php" ?>

<?php
if (!isset($_REQUEST['id'])) {
  header("location: employees.php");
} else {
  $id = $_REQUEST['id'];
}

$statement = $db->prepare("SELECT * FROM tbl_employee WHERE id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
  $name = $row['name'];
  $job = $row['job'];
  $address = $row['address'];
  $phone = $row['phone'];
  $image = $row['image'];
}

?>

<!--doctor team-->
<section id="doctor-team" class="section-padding">
  <div class="container">
    <div class="row mt-3 mb-5">
      <div class="col-md-3">
        <img class="card-img-top" src="images/employees/<?= $image ?>">
      </div>

      <div class="col-md-9">
        <div class="card card-body mb-2">
          <h3><?= $name ?></h3>
          <h5 class="text-muted">JOB - <?= $job ?> </h5>
        </div>

        <div class="card card-body m2-1">
          <p>
            <strong>Address:</strong>
            <br>
            Primary Address: <?= $address ?> <br>
          </p>

          <p>
            <strong>Contact Informations: </strong>
            Phone: <a href="tel:<?= $phone ?>"><?= $phone ?></a>
            <br>
          </p>

        </div>
      </div>
    </div>
  </div>
</section>

<?php require_once 'footer.php' ?>
