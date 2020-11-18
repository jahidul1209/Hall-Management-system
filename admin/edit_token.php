<?php
ob_start();
session_start();
if ($_SESSION['name'] != 'admin') {
  header('location: login.php');
}
include("../config.php");
?>
<?php
if (!isset($_REQUEST['id'])) {
  header("location: view_token.php");
} else {
  $id = $_REQUEST['id'];
}
?>



<!--  Update start -->
<?php
if (isset($_POST['form_update_token'])) {
  try {

    $statement = $db->prepare("UPDATE tbl_token SET quantity=? where id=?");
    $statement->execute(array($_POST['quantity'],  $id));

    $success_message = 'Quantity has updated successfully.';
  } catch (Exception $e) {
    $error_message = $e->getMessage();
  }
}
?>

<!---  Update finish --->

<?php
$statement = $db->prepare("SELECT * FROM tbl_token WHERE id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
  $quantity = $row['quantity'];
}
?>


<?php
include('header.php');
?>

<!---Content Part --->
<div class="col-sm-9 col-md-9 col-lg-9">
  <div id="content">
    <div class="wrapper-edit-post">
      <h2>Update Quantity</h2>
      <?php
      if (isset($success_message)) {
        echo "<div class='success'>" . $success_message . '</div>';
      }
      if (isset($error_message)) {
        echo "<div class='error'>" . $error_message . '</div>';
      }
      ?>
      <form action="edit_token.php?id=<?= $id; ?>" method="post">

        <table class="tbl1">
          <tr><th>Quantity </th></tr>
          <tr><td><input type="text" class="input-lg" name="quantity" value="<?php echo $quantity ?>"/> </td></tr>
        <tr><td><input type="submit" class="btn btn-info" name="form_update_token" value="Update Quantity" /></td></tr>
      </table>

    </form>
  </div>
</div>
</div>


<?php
include('footer.php');
?>
