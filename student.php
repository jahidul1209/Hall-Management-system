<?php require_once 'header.php' ?>
<?php require_once "config.php" ?>

<?php
if (!isset($_REQUEST['id'])) {
  header("location: students.php");
} else {
  $id = $_REQUEST['id'];
}

$statement = $db->prepare("SELECT * FROM tbl_student WHERE id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
  $name = $row['name'];
  //$email = $row['email'];
  $university_id = $row['university_id'];
  $registration_no = $row['registration_no'];
  $session = $row['session'];
  $phone_no = $row['phone_no'];
  $room_id = $row['room_id'];
  $address = $row['address'];
  $image = $row['image'];
}

?>

<!--doctor team-->
<section id="doctor-team" class="section-padding">
  <div class="container">
    <div class="row mt-3 mb-5">
      <div class="col-md-3">
        <img class="card-img-top" src="images/students/<?= $image ?>">
      </div>

      <div class="col-md-9">
        <div class="card card-body mb-2">
          <h3><?= $name ?></h3>
          <h5 class="text-muted">ID - <?= $university_id ?> </h5>
          <h5 class="text-muted">Reg No - <?= $registration_no ?> </h5>
          <h5 class="text-muted">Session - <?= $session ?> </h5>
        </div>

        <div class="card card-body m2-1">
          <p>
            <strong>Address:</strong>
            <br>
            Primary Address: <?= $address ?> <br>
          </p>
          <p>
            <strong>Room Informations: </strong>
            <br>
            Room No:
            <?php
            $statement = $db->prepare("SELECT * FROM tbl_rooms WHERE id=?");
            $statement->execute(array($room_id));
            $result = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $row1) {
              $room_name = $row1['block'].' - '. $row1['name'];
            }?>
            <?= $room_name ?>

          </p>

          <p>
            <strong>Contact Informations: </strong>
            <br>
           <!-- Email: <a href="mailto:<?= $email ?>"><?= $email ?></a> <br>-->
            Phone: <a href="tel:<?= $phone_no ?>"><?= $phone_no ?></a>
            <br>
            <!--<a href="mailto:<?= $email ?>" class="mt-1 btn btn-danger"><i class="fa fa-phone"></i> Email Her Now</a>-->
            <a href="tel:<?= $phone_no ?>" class="mt-1 btn btn-primary"><i class="fa fa-phone"></i> Call Her Now</a>
          </p>

        </div>
      </div>
    </div>
  </div>
</section>
<?php require_once 'footer.php' ?>
