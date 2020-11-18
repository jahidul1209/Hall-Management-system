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
    <h2>View  All Payments</h2>
    <a class="btn btn-danger pull-right" onclick='return confirmDeleteDoctor();' href="delete_token_all.php">Delete All</a>

    <table class="table table-bordered table-hover table-responsive">
      <tr>
        <th>Serial</th>
        <th>Student ID</th>
        <th>Quantity</th>
        <th>Date</th>
        <th>Action</th>
      </tr>

      <?php
      $i = 0;
      $statement = $db->prepare("SELECT * FROM tbl_token_buy ORDER BY id DESC");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $i++;
        ?>

        <tr>
          <td><?= $i; ?></td>
          <td><?= $row['student_id']; ?></td>
          <td><?= $row['quantity']; ?></td>
          <td><?= $row['date']; ?></td>
          <td>
            <a class="btn btn-danger" onclick='return confirmDeleteDoctor();' href="delete_token.php?id=<?= $row['id']; ?>">Delete</a>

            <?php
                        if ($row['is_paid'] == 0) {
                            ?>
                            <a class="btn btn-success" href="approve_token.php?id=<?= $row['id']; ?>">Confirm</a>
                            <?php
                        } else {
                            ?>
                            <a class="btn btn-success disabled">
                                Confirmed
                            </a>
                            <?php
                        }
                        ?>
          </td>
        </tr>
      <?php } ?>

    </table>
  </div>
</div>
<?php include("footer.php"); ?>
