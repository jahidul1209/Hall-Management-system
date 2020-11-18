<?php require_once 'header.php' ?>
<?php require_once "config.php" ?>
<?php
if (!isset($_REQUEST['id'])) {
  header("location: programs.php");
} else {
  $id = $_REQUEST['id'];
}
?>
<div class="all-contents">

  <div class="news-notice">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class=" news-single">
            <h2>Latest Program</h2>
            <ul>
              <?php
              $statement = $db->prepare("SELECT * FROM tbl_program WHERE id=?");
              $statement->execute(array($id));
              $result = $statement->fetchAll(PDO::FETCH_ASSOC);
              foreach ($result as $row) {$image = $row['image']; ?>
                <div class="card card-body">
                  <h3><?= $row['title'] ?></h3>
                  <div>
                    <?= $row['description'] ?>
                  </div>
                  <div class="col-md-3">
                    <img class="card-img-top" src="images/programs/<?= $image ?>">
                  </div>
                  <hr>
                  <p>at <span class="badge badge-info"><?= $row['time'] ?></span></p>
                </div>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End News and Notice Div -->
</div> <!-- End all contents -->

<?php require_once 'footer.php' ?>