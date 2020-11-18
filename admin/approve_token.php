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
    header('location: view_dining.php');
} else {
    $id = $_REQUEST['id'];
}
?>

<?php
if ($id != null) {

    $statement = $db->prepare("UPDATE tbl_token_buy SET is_paid=? where id=?");
            $statement->execute(array(1, $id));
    
    }

    //email end now
    header('location: view_dining.php');
?>




