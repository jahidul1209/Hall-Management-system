<?php
//ob_start();
//session_start();
//if ($_SESSION['name'] != 'admin') {
//  header('location: login.php');
//}
include "config.php";
?>
<?php
if (isset($_POST['form_post_complain'])) {
    try {
        if (empty($_POST['university_id'])) {
            throw new Exception('University Id can not be empty');
        } else if (empty($_POST['name'])) {
            throw new Exception('Name can not be empty');
        } else if (empty($_POST['room'])) {
            throw new Exception('Room can not be empty');
        } else if (empty($_POST['subject'])) {
            throw new Exception('Subject can not be empty');
        } else if (empty($_POST['description'])) {
            throw new Exception('Description can not be empty');
        }

        $num = 0;
        $statement = $db->prepare("select * from tbl_student where university_id=?");
        $statement->execute(array($_POST['university_id']));

        $num = $statement->rowCount();

        if ($num == 0) {
            // ob_start();
            // session_start();
            $errorId = "You are not a student. Please Register here :";
            // header("location: index.php");
        }
        //  else {
        //     throw new Exception('Invalid email or password' . $num);
        // }

        /* --------------- Image ----------------------- */

        //Get the next autoincrement ID by PDO method for naming my image as my id_name because ID is unique
        // $statement = $db->prepare("SHOW TABLE STATUS LIKE 'tbl_student'");
        // $statement->execute();
        // $result = $statement->fetchAll();
        // foreach ($result as $row) {
        //     $new_id = $row[10]; //Make next increment id for images naming
        // }

        else{
        $statement = $db->prepare("insert into tbl_complain (university_id, name, room, subject, description) values(?,?,?,?,?)");
        $statement->execute(array($_POST['university_id'],$_POST['name'],$_POST['room'], $_POST['subject'], $_POST['description']));
        $success_message = 'Complain has submitted successfully.';
    }

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
        <center><h2>Add a new Complain</h2></center>
<?php
if (isset($error_message)) {
    echo "<div class='error'>" . $error_message . '</div>';
}
?>

<?php
if (isset($errorId)) {
    echo "<div class='success'>" . $errorId . '</div>';
}
?>

<?php
if (isset($success_message)) {
    echo "<div class='success'>" . $success_message . '</div>';
}
?>

        <div class="container" style="padding-left: 410px;">
            <div class="row">
                <form action="" method="post">
                    <table class="tbl1">

                        <tr>
                            <th>Your University ID.</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="university_id" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Name</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="name" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Room No.</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="room" class="form-control"/></td>
                        </tr>


                        <tr>
                            <th>Complain Subject</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="subject" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Complain Description</th>
                        </tr>
                        <tr><td>
                        <textarea name="description" id="description" class="well" cols="50" rows="10"></textarea>
                        </td></tr>


                        <tr>
                            <td><input type="submit" class="btn btn-success" name="form_post_complain" value="Complain"/></td>
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
