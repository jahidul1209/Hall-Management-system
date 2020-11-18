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
    header("location: view_programs.php");
} else {
    $id = $_REQUEST['id'];
}
?>


<!--  Update start -->
<?php
if (isset($_POST['form_update_post'])) {
    try {
//    if (empty($_POST['name'])) {
//      throw new Exception('Name can not be empty');
//    } else if (empty($_POST['room_id'])) {
//      throw new Exception('Room can not be empty');
//    }
//    else if (empty($_POST['university_id'])) {
//      throw new Exception('University ID can not be empty');
//    }
//    else if (empty($_POST['registration_no'])) {
//      throw new Exception('Registration no can not be empty');
//    }

        if (empty($_POST['title'])) {
            throw new Exception('Program title can not be empty');
        } else if (empty($_POST['description'])) {
            throw new Exception('Program description can not be empty');
        }


        /* --------------- Image ----------------------- */
        if (empty($_FILES["image"]["name"])) {
            $statement = $db->prepare("UPDATE tbl_program SET title=?, description=? where id=?");
            $statement->execute(array($_POST['title'], $_POST['description'], $id));
        } else {

            //Find out the image extension form the image
            $up_fileName = $_FILES["image"]["name"];
            $file_baseName = substr($up_fileName, 0, strripos($up_fileName, '.'));      //get image or file names
            $file_ext = substr($up_fileName, strripos($up_fileName, '.'));             //get image or file extension name
            $image_name = $id . $file_ext; //name the new file like id.jpg or 2.png etc.
            //check the image extension if the image is jpg,png,gif or jpeg


            //
            // if (($file_ext != '.png') && ($file_ext != '.jpg') && ($file_ext != '.jpeg') && ($file_ext != '.gif')) {
            //   throw new Exception("Only jpg,jpeg,png and gif images are allowed");
            // }


            $statement1 = $db->prepare("SELECT * FROM tbl_program WHERE id=?");
            $statement1->execute(array($id));
            $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result1 as $row1) {
                if ($row1['image'] != NULL) {
                    $real_path = "../images/programs/" . $row1['image'];
                    unlink($real_path); //Delete the existing image
                }
            }

            //newly inserted images
            move_uploaded_file($_FILES["image"]["tmp_name"], "../images/programs/" . $image_name);

            $statement = $db->prepare("UPDATE tbl_program SET title=?, description=?, image=? where id=?");
            $statement->execute(array($_POST['title'], $_POST['description'], $image_name, $id));
        }

        $success_message = 'Program has updated successfully.';
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>

<!---  Update finish --->

<?php
$statement = $db->prepare("SELECT * FROM tbl_program WHERE id=?");
$statement->execute(array($id));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $title = $row['title'];
    $description = $row['description'];
    $image = $row['image'];
}
?>


<?php
include('header.php');
?>

<!---Content Part --->
<div class="col-sm-9 col-md-9 col-lg-9">
    <div id="content">
        <div class="wrapper-edit-post">
            <h2>Update Student Informations</h2>
            <?php
            if (isset($success_message)) {
                echo "<div class='success'>" . $success_message . '</div>';
            }
            if (isset($error_message)) {
                echo "<div class='error'>" . $error_message . '</div>';
            }
            ?>
            <form action="edit_programs.php?id=<?= $id; ?>" method="post" enctype="multipart/form-data">

                <table class="table table-hover table-bordered">
                    <tr>
                        <th>Title</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="title" class="form-control" value="<?= $title ?>"/>
                        </td>
                    </tr>

                    <tr>
                        <th>Description</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="description" class="form-control"
                                   value="<?= $description ?>"/></td>
                    </tr>

                    <tr>
                        <th>Update Image</th>
                    </tr>
                    <tr>
                        <th>Old Image</th>
                    </tr>
                    <tr>
                        <th><img src="../images/programs/<?= $image ?>" class="img img-thumbnail img-responsive"></th>
                    </tr>
                    <tr>
                        <th>New Image</th>
                    </tr>

                    <tr>
                        <td><input type="file" name="image"/></td>
                    </tr>

                    <tr>
                        <td><input type="submit" class="btn btn-success" name="form_update_post"
                                   value="Update Program"/></td>
                    </tr>
                </table>

            </form>
        </div>
    </div>
</div>


<?php
include('footer.php');
?>
