<?php require_once 'header.php'?>
<?php require_once "config.php"?>

<?php
if (!isset($_REQUEST['id'])) {
    header("location: students.php");
} else {
    $id = $_REQUEST['id'];
}

$statement = $db->prepare("SELECT * FROM tbl_rooms WHERE id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $room_name = $row['name'];
    $block = $row['block'];
}

$statement = $db->prepare("SELECT * FROM tbl_student WHERE room_id=? AND is_verified=1");
//$statement = $db->prepare("SELECT * FROM tbl_student WHERE room_id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
$total = $statement->rowCount();
?>

<section id="doctor-team" class="section-padding">
  <div class="container">
    <div class="row mt-3 mb-5">

      <?php foreach ($result as $row) {?>
        <div class="col-md-3">
          <div class="card single-link">
            <img class="card-img-top" src="images/students/<?=$row['image']?>">
            <div class="card-body">
              <h4 class="card-title">
                <a href="student.php?id=<?=$row['id']?>"><?=$row['name']?></a>
              </h4>
              <h5 class="text-muted">Faculty - <?=$row['faculty']?> </h5>
            </div>
          </div>
        </div>

      <?php }?>

      <?php if ($total == 0): ?>
        <div class="alert alert-danger">
          No Students in this room has added yet !!
        </div>
      <?php endif;?>

    </div>
  </div>
</section>
<?php require_once 'footer.php'?>
