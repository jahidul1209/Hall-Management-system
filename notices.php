<?php require_once 'header.php' ?>
<?php require_once "config.php" ?>
<div class="all-contents">

  <div class="news-notice">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
          <div class=" news-single">
            <h2>Latest Notices</h2>
            <ul>
              <?php
              $statement = $db->prepare("SELECT * FROM tbl_notices ORDER BY id DESC");
              $statement->execute();
              $result = $statement->fetchAll(PDO::FETCH_ASSOC);
              foreach ($result as $row) { ?>
                <li class="card card-body"><a href="notice.php?id=<?= $row['id'] ?>"><?= $row['title'] ?> at <span class="badge badge-info"><?= $row['time'] ?></span> </a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- End News and Notice Div -->
</div> <!-- End all contents -->

<?php require_once 'footer.php' ?>
