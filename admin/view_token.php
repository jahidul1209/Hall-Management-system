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
    <h2>View  Tokens</h2>

    <table class="table table-bordered table-hover table-responsive" width="100%">
      <tr style="background-color: #0D7B7B;color: #FFF;height: 40px;">
        <th>Serial</th>
        <th>Quantity</th>
        <th>Action</th>
      </tr>

      <?php
      $i = 0;
      $statement = $db->prepare("SELECT * FROM tbl_token ORDER BY id DESC");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $i++;
        ?>

        <tr>
          <td><?= $i; ?></td>
          <td><?= $row['quantity']; ?></td>
          <td>
            <a class="btn btn-success" href="edit_token.php?id=<?= $row['id']; ?>">Edit</a>

          </td>
        </tr>


        <?php
      }
      ?>




    </table>
  </div>
</div>
<?php include("footer.php"); ?>