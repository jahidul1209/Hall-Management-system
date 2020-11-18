<?php
include("config.php");
?>

<?php
if (isset($_POST['payment'])) {
    try {
        if (empty($_POST['name'])) {
            throw new Exception('Name can not be empty');
        } 
        else if (empty($_POST['student_id'])) {
            throw new Exception('student_id can not be empty');
        }
         else if (empty($_POST['registration_no'])) {
            throw new Exception('registration_no can not be empty');
        }
         else if (empty($_POST['faculty'])) {
            throw new Exception('faculty no can not be empty');
        } 
        else if (empty($_POST['phone'])) {
            throw new Exception('phone can not be empty');
        } 
        else if (empty($_POST['email'])) {
            throw new Exception('email can not be empty');
        } 
        else if (empty($_POST['session'])) {
            throw new Exception('session can not be empty');
        }
         else if (empty($_POST['semester'])) {
            throw new Exception('semester can not be empty');
        }
         else if (empty($_POST['amount'])) {
            throw new Exception('amount can not be empty');
        }
         else if (empty($_POST['transaction_id'])) {
            throw new Exception('transaction_id can not be empty');
        }


        $statement = $db->prepare("insert into tbl_payment (name, student_id, registration_no, faculty,phone,email, session, semester, amount, transaction_id) values(?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array($_POST['name'], $_POST['student_id'], $_POST['registration_no'], $_POST['faculty'], $_POST['phone'],$_POST['email'], $_POST['session'], $_POST['semester'], $_POST['amount'], $_POST['transaction_id']));

        $success_message = 'Payment has added successfully. Check your email for confirmation.';
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
        <center><h2>Pay Hall Fees</h2></center>
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

                <div class="col-5">
                    
                </div>
                <div class="col-5">
                    <form action="" method="post" enctype="multipart/form-data">
                    <table class="tbl1">
                        <tr>
                            <th>Your Name</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="name" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Student ID</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="student_id" class="form-control"/></td>
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
                            <td><input type="text" name="phone" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Your Email</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="email" class="form-control"/></td>
                        </tr>


                        <tr>
                            <th>Your Session</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="session" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Semesters</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="semester" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Amount</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="amount" class="form-control"/></td>
                        </tr>

                        <tr>
                            <th>Transaction ID</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="transaction_id" class="form-control"/></td>
                        </tr>
                        
                        <tr>
                            <td><input type="submit" class="btn btn-success" name="payment" value="Submit Payment"/></td>
                        </tr>
                    </table>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
include('footer.php');
?>
