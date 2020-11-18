<?php require_once 'header.php' ?>
<?php require_once "config.php" ?>

<section id="doctor-team" class="section-padding">
  <div class="container">
    <div class="row mt-3 mb-5">
      <div class="col-md-12">
        <h2 class="ser-title">Employees</h2>
        <hr class="botm-line">
      </div>
      <?php
      $statement = $db->prepare("SELECT * FROM tbl_employee");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) { ?>
        <!--<div class="col-md-3 col-sm-3 col-xs-6">
          <div class="thumbnail">
            <img src="./images/employees/<?= $row['image'] ?>" alt="..." class="team-img">
            <div class="caption">
              <h3><?= $row['name']; ?></h3>
              <p><?= $row['job']; ?></p>
            </div>
            <p class="text-right"><a href="single_employee.php?id=<?= $row['id'] ?>" class="btn btn-primary"><i class="fa fa-eye"></i> See Profile </a></p>
          </div>
        </div>-->
		
		<div class="col-md-3">
          <div class="card single-link">
            <img class="card-img-top" src="images/employees/<?= $row['image'] ?>">
            <div class="card-body">
              <h4 class="card-title">
                <a href="single_employee.php?id=<?= $row['id'] ?>"><?= $row['name'] ?></a>
              </h4>
              <h5 class="text-muted"><?= $row['job'] ?> </h5>
            </div>
          </div>
        </div>
      <?php } ?>

	  




    </div>
  </div>
</section>
<?php require_once 'footer.php' ?>
