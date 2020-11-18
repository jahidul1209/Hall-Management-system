<?php
ob_start();
session_start();
if ($_SESSION['name'] != 'admin') {
  header('location: login.php');
}
include("../config.php");
?>
<?php
if (isset($_POST['form_post_publish'])) {
  try {
    if (empty($_POST['title'])) {
      throw new Exception('Notice title can not be empty');
    } else if (empty($_POST['description'])) {
      throw new Exception('Notice description can not be empty');
    }

        $statement = $db->prepare("SHOW TABLE STATUS LIKE 'tbl_program'");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $new_id = $row[10];             //Make next increment id for images naming
        }


    $up_fileName = $_FILES["image"]["name"];
    $file_baseName = substr($up_fileName, 0, strripos($up_fileName, '.')); //get image or file names
    $file_ext = substr($up_fileName, strripos($up_fileName, '.'));             //get image or file extension name
    $image_name = $new_id . $file_ext;

    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/programs/" . $image_name);

    $statement = $db->prepare("insert into tbl_program (title, description,image) values(?,?,?)");
    $statement->execute(array($_POST['title'], $_POST['description'], $image_name));

    $success_message = 'Notice has added successfully.';
  } catch (Exception $e) {
    $error_message = $e->getMessage();
  }
}
?>


<?php
include('header.php');
?>

<!---Content Part -->
<div class="col-sm-9 col-md-9 col-lg-9">
  <div id="content">
    <h2>Add a new program</h2>
    <?php
    if (isset($error_message)) {
      echo "<div class='error'>" . $error_message . '</div>';
    }
    ?>
    <?php
    if (isset($success_message)) {
      echo "<div class='success'>" . $success_message . '</div>';
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">

      <table class="table table-hover">
        <tr><th>Title </th></tr>
        <tr><td><input type="text" name="title" class="form-control"/> </td></tr>
        <tr><th>Description </th></tr>
        <tr><td>
          <textarea name="description" id="description" class="well" cols="90" rows="60"></textarea>
          <script>
          CKEDITOR.replace('description');
          </script>
        </td></tr>
        <tr>
          <th>Add Your featured Image</th>
          </tr>
          <tr>
          <td><input type="file" name="image"/></td>
         </tr>

        <tr><td><input type="submit" class="btn btn-success" name="form_post_publish" value="Publish Notice" /></td></tr>
      </table>

    </form>
  </div>
</div>


<?php
include('footer.php');
?>
