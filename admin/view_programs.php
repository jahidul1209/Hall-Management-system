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
    <h2>View  All Programs</h2>

    <table class="table table-bordered table-hover table-responsive" width="100%">
      <tr style="background-color: #0D7B7B;color: #FFF;height: 40px;">
        <th>Serial</th>
        <th>Title</th>
        <th>Action</th>
      </tr>

      <?php
      $i = 0;
      $statement = $db->prepare("SELECT * FROM tbl_program ORDER BY id DESC");
      $statement->execute();
      $result = $statement->fetchAll(PDO::FETCH_ASSOC);
      foreach ($result as $row) {
        $i++;
        ?>

        <tr>
          <td><?= $i; ?></td>
          <td><?= $row['title']; ?></td>
          <td>
            <a class="btn btn-info" data-toggle="modal" href="#inline<?= $i; ?>">View</a>
            <div id="inline<?= $i; ?>" class="modal fade" role="dialog">
              <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">View Program</h4>
                  </div>
                  <div class="modal-body">
                    <div>
                      <h3 style="border-bottom: 4px solid rgba(15, 46, 46, 0.85);background-color: #428bca;margin-bottom: 15px;padding: 10px;">View All Data</h3>
                      <p>
                        <form action="" method="post">
                          <table>
                            <tr>
                              <td><b>Title</b></td>
                            </tr>
                            <tr>
                              <td><?= $row['title']; ?></td>
                            </tr>
                            <tr>
                              <td><b>Description</b></td>
                            </tr>
                            <tr>
                              <td><?= $row['description']; ?></td>
                            </tr>
                            <tr>
                                <td><b>Image</b></td>
                            </tr>
                            <tr>
                                <td><img src="../images/programs/<?= $row['image']; ?>" alt="">
                                </td>
                            </tr>
                            <tr>
                              <td><a class="btn btn-info" href="edit_programs.php?id=<?= $row['id']; ?>">Edit</a></td>
                            </tr>
                          </table>
                        </form>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <a class="btn btn-success" href="edit_programs.php?id=<?= $row['id']; ?>">Edit</a>

            <a class="btn btn-danger" onclick='return confirm("Do you want to delete the program ?");' href="delete_programs.php?id=<?= $row['id']; ?>">Delete</a>
          </td>
        </tr>


        <?php
      }
      ?>




    </table>
  </div>
</div>
<?php include("footer.php"); ?>