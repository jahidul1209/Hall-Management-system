<?php
ob_start();
session_start();
if ($_SESSION['name'] != 'admin') {
  header('location: login.php');
}
include("../config.php");
?>
<?php include("header.php"); ?>
<!---Content Part -->

<div class="col-sm-9 col-md-9 col-lg-9">
  <div id="content">
    <h2>View  All Complains</h2>

    <table class="table table-bordered table-hover table-responsive">
      <tr>
        <th>Serial</th>
        <th>Name</th>
        <th>Subject</th>
        <th>Action</th>
      </tr>

      <?php
      $i = 0;
      $statement = $db->prepare("SELECT * FROM tbl_complain ORDER BY name ASC");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $i++;
        ?>

        <tr>
          <td><?= $i; ?></td>
          <td><?= $row['name']; ?></td>
          <td><?= $row['subject']; ?></td>
          <td>
            <a class="btn btn-info fancybox" href="#viewModal<?= $i; ?>" data-toggle="modal">View</a>

            <div id="viewModal<?= $i; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View Complain</h4>
                  </div>
                  <div class="modal-body">
                    <p><strong>Name : </strong> <?= $row['name']; ?></p>
                    <p><strong>ID : </strong> <?= $row['university_id']; ?></p>
                    <p><strong>ROOM : </strong> <?= $row['room']; ?></p>
                    <p><strong>Subject : </strong> <?= $row['subject']; ?></p>
                    <p><strong>Description : </strong> <?= $row['description']; ?></p>
                    
                    
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                  </div>
                </div>

              </div>
            </div>


            <a class="btn btn-danger" onclick='return confirmDeleteDoctor();' href="delete_complain.php?id=<?= $row['id']; ?>">Delete</a>
          </td>
        </tr>
      <?php } ?>

    </table>
  </div>
</div>
<?php include("footer.php"); ?>
