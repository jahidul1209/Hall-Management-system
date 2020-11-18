<?php
//ob_start();
//session_start();
//if ($_SESSION['name'] != 'admin') {
//  header('location: login.php');
//}
include "config.php";
?>
<?php
if (isset($_POST['form_post_publish'])) {
    try {
        if (empty($_POST['name'])) {
            throw new Exception('Name can not be empty');
        } else if (empty($_POST['email'])) {
            throw new Exception('email can not be empty');
        } else if (empty($_POST['university_id'])) {
            throw new Exception('University ID can not be empty');
        } else if (empty($_POST['registration_no'])) {
            throw new Exception('Registration no can not be empty');
        } else if (empty($_POST['room_id'])) {
            throw new Exception('Room can not be empty');
        }

        include '../config.php';
        $num = 0;
        $statement = $db->prepare("select * from tbl_student where university_id=?");
        $statement->execute(array($_POST['university_id']));

        $num = $statement->rowCount();

        if ($num > 0) {
            session_start();
            $_SESSION['success_reg'] = "You are already registered";
            // header("location: index.php");
        } else {
            throw new Exception('Invalid email or password');
        }

        /* --------------- Image ----------------------- */

        //Get the next autoincrement ID by PDO method for naming my image as my id_name because ID is unique
        $statement = $db->prepare("SHOW TABLE STATUS LIKE 'tbl_student'");
        $statement->execute();
        $result = $statement->fetchAll();
        foreach ($result as $row) {
            $new_id = $row[10]; //Make next increment id for images naming
        }

        //Find out the image extension form the image

        $up_fileName = $_FILES["image"]["name"];
        $file_baseName = substr($up_fileName, 0, strripos($up_fileName, '.')); //get image or file names
        $file_ext = substr($up_fileName, strripos($up_fileName, '.')); //get image or file extension name
        $image_name = $new_id . $file_ext; //name the new file like id.jpg or 2.png etc.

        //check the image extension if the image is jpg,png,gif or jpeg

        // if (($file_ext != '.png') || ($file_ext != '.jpg') || ($file_ext != '.jpeg') || ($file_ext != '.gif')) {
        //   throw new Exception("Only jpg,jpeg,png and gif images are allowed");
        // }
        //move image to my upload folder
        //    move_uploaded_file($_FILES["image"]["tmp_name"], "../images/students/" . $image_name);
        move_uploaded_file($_FILES["image"]["tmp_name"], "./images/students/" . $image_name);
        /* --------------- Image finish ----------------------- */
        //Make here the inserted code of the post to the directory

        $statement = $db->prepare("insert into tbl_student (university_id, registration_no, name,email, faculty, phone_no, address, room_id, session, image) values(?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array($_POST['university_id'], $_POST['registration_no'], $_POST['name'], $_POST['email'], $_POST['faculty'], $_POST['phone_no'], $_POST['address'], $_POST['room_id'], $_POST['session'], $image_name));

        $success_message = 'Student has added successfully. Check your email for confirmation.';
    } catch (Exception $e) {
        $error_message = $e->getMessage();
    }
}
?>


<?php
include 'header.php';
?>

<!---Content Part -->
<div class="col-sm-9 col-md-9 col-lg-9">
    <div id="content">
<h4>
<?php
if (isset($_SESSION['success_reg']) != "") {
    ?>
            <h4> <?php
echo ("{$_SESSION['success_reg']}");
    ?> </h4>
            <?php
$_SESSION['success_reg'] = "";
}
?>
</h4>
        <h2>Add a new Student</h2>
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
        <div class="container">
            <div class="row">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="tbl1">
                        <tr>
                            <th>Your Name</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="name" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Email</th>
                        </tr>
                        <tr>
                            <td><input type="email" name="email" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Student ID</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="university_id" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Registration number</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="registration_no" class="form-control"/></td>
                        </tr>


                        <tr>
                            <th>Your Faculty</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="faculty" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Phone</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="phone_no" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Address</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="address" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Session</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="session" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Add Your featured Image</th>
                        </tr>
                        <tr>
                            <td><input type="file" name="image"/></td>
                        </tr>

                        <tr>
                            <td>Select Yours from the following rooms</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="room_id" class="form-control">
                                    <option value="">Select a room</option>
                                    <?php
$statement = $db->prepare("SELECT * FROM tbl_rooms ORDER BY name ASC");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['block'] . '-' . $row['name']; ?></option>
                                    <?php }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" class="btn btn-success" name="form_post_publish" value="Add Student"/></td>
                        </tr>
                    </table>

                </form>
            </div>
        </div>
    </div>
</div>


<?php
include 'footer.php';
?>
