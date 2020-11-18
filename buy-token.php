<?php
include("config.php");
?>

<?php
if (isset($_POST['buy_token'])) {
    try {
        if (empty($_POST['quantity'])) {
            throw new Exception('Token Quantity can not be empty');
        } 
        else if (empty($_POST['student_id'])) {
            throw new Exception('student_id can not be empty');
        }

        $student_id = $_POST['student_id'];
        $quantity = $_POST['quantity'];
        $date = date('Y-m-d');
        $is_paid = 0;

        // Check if student is in the database
        
        $statement = $db->prepare("select * from tbl_student where university_id=? LIMIT 1");
        $statement->execute(array($student_id));
        if ($statement->rowCount() == 0) {
            throw new Exception('You are not a valid student !! To order, you need to register !!');
        }
        

        $statement = $db->prepare("insert into tbl_token_buy (student_id, quantity, is_paid, date) values(?,?,?,?)");
        $statement->execute(array($student_id, $quantity, $is_paid, $date));

        // Fetch tokens
        $statement = $db->prepare("select * from tbl_token where date=? LIMIT 1");
        $statement->execute(array($date));
        $token = $statement->fetch(PDO::FETCH_ASSOC);

        $token_quantity = $token['quantity'];
        $token_ID = $token['id'];
        $updated_quantity = $token_quantity- $quantity;

        $statement = $db->prepare("update tbl_token set quantity=? where id=?");
        $statement->execute(array($updated_quantity, $token_ID));

        $success_message = 'Token has confirmed. Pay the amount soon. Otherwise it will be deleted !!';
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
    <div id="content mt-2">
        <center>
            <h2>Buy Token</h2>
            <?php
            if (isset($error_message)) {
                echo "<div class='alert alert-danger'>" . $error_message . '</div>';
            }
            ?>
            <?php
            if (isset($success_message)) {
                echo "<div class='alert alert-success'>" . $success_message . '</div>';
            }
            ?>
        </center>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="" method="post">
                        <table class="tbl1">
                            <tr>
                                <td>
                                    Student ID:
                                </td>
                                <td>
                                    <input type="text" name="student_id" class="form-control" placeholder=""/>
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td>
                                    No Of Token want to buy?
                                </td>
                                <td><input type="number" name="quantity" class="form-control" placeholder=""/></td>
                            </tr>

                            <tr>
                                <td><input type="submit" class="btn btn-success" name="buy_token" value="Buy Token"/>
                                </td>

                            </tr>

                        </table>
                        <br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('footer.php');
?>
